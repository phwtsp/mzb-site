<?php
declare(strict_types=1);

const MAIL_TO = 'paulo.pereira@duovozz.com.br';
const MAIL_FROM = 'no-reply@mzb.com.br';
const MAX_ATTACHMENT_SIZE = 8 * 1024 * 1024; // 8MB
const ALLOWED_EXTENSIONS = ['pdf', 'doc', 'docx'];

function redirect_with_status(string $page, string $status): never
{
    $safePage = preg_replace('/[^a-z0-9_\\-]/i', '', $page) ?: 'contato';
    header('Location: ' . $safePage . '?status=' . rawurlencode($status));
    exit;
}

function clean_header_value(string $value): string
{
    return trim(str_replace(["\r", "\n"], '', $value));
}

function get_extension(string $filename): string
{
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    return strtolower(trim((string) $ext));
}

function normalize_text(?string $value): string
{
    return trim((string) $value);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Metodo nao permitido.');
}

$formType = normalize_text($_POST['form_type'] ?? '');
$returnTo = normalize_text($_POST['return_to'] ?? '');

if ($formType === 'contato') {
    $nome = normalize_text($_POST['nome'] ?? '');
    $email = normalize_text($_POST['email'] ?? '');
    $assunto = normalize_text($_POST['assunto'] ?? '');
    $mensagem = normalize_text($_POST['mensagem'] ?? '');

    if ($nome === '' || $email === '' || $assunto === '' || $mensagem === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirect_with_status($returnTo !== '' ? $returnTo : 'contato', 'erro');
    }

    $subject = clean_header_value('[Contato Site] ' . $assunto);
    $body = "Novo contato recebido pelo site:\n\n"
        . "Nome: {$nome}\n"
        . "Email: {$email}\n"
        . "Assunto: {$assunto}\n\n"
        . "Mensagem:\n{$mensagem}\n";

    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'From: MZB Site <' . MAIL_FROM . '>',
        'Reply-To: ' . clean_header_value($email),
    ];

    $sent = @mail(MAIL_TO, $subject, $body, implode("\r\n", $headers));
    redirect_with_status('contato', $sent ? 'ok' : 'erro');
}

if ($formType === 'trabalhe_conosco') {
    $nome = normalize_text($_POST['nome'] ?? '');
    $email = normalize_text($_POST['email'] ?? '');
    $linkedin = normalize_text($_POST['linkedin'] ?? '');
    $telefone = normalize_text($_POST['telefone'] ?? '');
    $cargo = normalize_text($_POST['cargo'] ?? '');

    if ($nome === '' || $email === '' || $telefone === '' || $cargo === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirect_with_status('trabalhe_conosco', 'erro');
    }

    $subject = clean_header_value('[Trabalhe Conosco] ' . $nome . ' - ' . $cargo);
    $messageText = "Nova candidatura recebida pelo site:\n\n"
        . "Nome: {$nome}\n"
        . "Email: {$email}\n"
        . "Telefone: {$telefone}\n"
        . "Cargo: {$cargo}\n"
        . "LinkedIn: " . ($linkedin !== '' ? $linkedin : 'Nao informado') . "\n";

    $boundary = 'mzb-boundary-' . md5((string) microtime(true));
    $headers = [
        'MIME-Version: 1.0',
        'From: MZB Site <' . MAIL_FROM . '>',
        'Reply-To: ' . clean_header_value($email),
        'Content-Type: multipart/mixed; boundary="' . $boundary . '"',
    ];

    $body = "--{$boundary}\r\n";
    $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
    $body .= $messageText . "\r\n";

    if (isset($_FILES['curriculo']) && is_array($_FILES['curriculo']) && ($_FILES['curriculo']['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_OK) {
        $tmpName = (string) ($_FILES['curriculo']['tmp_name'] ?? '');
        $originalName = clean_header_value((string) ($_FILES['curriculo']['name'] ?? 'curriculo'));
        $size = (int) ($_FILES['curriculo']['size'] ?? 0);
        $extension = get_extension($originalName);

        if (
            $tmpName !== ''
            && is_uploaded_file($tmpName)
            && $size > 0
            && $size <= MAX_ATTACHMENT_SIZE
            && in_array($extension, ALLOWED_EXTENSIONS, true)
        ) {
            $content = file_get_contents($tmpName);
            if ($content !== false) {
                $mimeType = 'application/octet-stream';
                if (function_exists('mime_content_type')) {
                    $detectedMime = mime_content_type($tmpName);
                    if (is_string($detectedMime) && trim($detectedMime) !== '') {
                        $mimeType = $detectedMime;
                    }
                }
                $encoded = chunk_split(base64_encode($content));

                $body .= "--{$boundary}\r\n";
                $body .= "Content-Type: {$mimeType}; name=\"{$originalName}\"\r\n";
                $body .= "Content-Transfer-Encoding: base64\r\n";
                $body .= "Content-Disposition: attachment; filename=\"{$originalName}\"\r\n\r\n";
                $body .= $encoded . "\r\n";
            }
        }
    }

    $body .= "--{$boundary}--";

    $sent = @mail(MAIL_TO, $subject, $body, implode("\r\n", $headers));
    redirect_with_status('trabalhe_conosco', $sent ? 'ok' : 'erro');
}

redirect_with_status($returnTo !== '' ? $returnTo : 'contato', 'erro');
