<?php
require_once __DIR__ . '/includes/bootstrap.php';

define('MAIL_TO', 'paulo.pereira@duovozz.com.br');
define('MAX_ATTACHMENT_SIZE', 8 * 1024 * 1024); // 8MB
define('MAIL_DEBUG_LOG', __DIR__ . '/mail-debug.log');

function redirect_with_status($page, $status)
{
    $safePage = preg_replace('/[^a-z0-9_\\-]/i', '', (string) $page);
    if ($safePage === '' || $safePage === null) {
        $safePage = 'contato';
    }

    header('Location: /' . $safePage . '?status=' . rawurlencode((string) $status));
    exit;
}

function clean_header_value($value)
{
    return trim(str_replace(array("\r", "\n"), '', (string) $value));
}

function normalize_text($value)
{
    return trim((string) $value);
}

function get_extension($filename)
{
    $ext = pathinfo((string) $filename, PATHINFO_EXTENSION);
    return strtolower(trim((string) $ext));
}

function debug_log($message)
{
    $line = '[' . date('Y-m-d H:i:s') . '] ' . (string) $message . PHP_EOL;
    @file_put_contents(MAIL_DEBUG_LOG, $line, FILE_APPEND);
}

function get_resend_api_key()
{
    $fromConfig = isset(MZB_SITE_CONFIG['resend_api_key']) ? (string) MZB_SITE_CONFIG['resend_api_key'] : '';
    $fromEnv = (string) getenv('RESEND_API_KEY');
    return trim($fromConfig !== '' ? $fromConfig : $fromEnv);
}

function get_resend_from()
{
    $fromConfig = isset(MZB_SITE_CONFIG['resend_from']) ? (string) MZB_SITE_CONFIG['resend_from'] : '';
    if (trim($fromConfig) !== '') {
        return trim($fromConfig);
    }
    return 'MZB Brasil <onboarding@resend.dev>';
}

function resend_request($payload, $apiKey)
{
    $url = 'https://api.resend.com/emails';
    $json = json_encode($payload);
    if ($json === false) {
        return array(false, 'Falha ao serializar payload', 0, '');
    }

    $headers = array(
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json',
    );

    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        $response = curl_exec($ch);
        $httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlErr = curl_error($ch);
        curl_close($ch);

        if ($response === false) {
            return array(false, 'cURL falhou: ' . $curlErr, $httpCode, '');
        }

        $ok = ($httpCode >= 200 && $httpCode < 300);
        return array($ok, $ok ? 'ok' : 'HTTP ' . $httpCode, $httpCode, (string) $response);
    }

    $context = stream_context_create(array(
        'http' => array(
            'method' => 'POST',
            'header' => "Authorization: Bearer {$apiKey}\r\nContent-Type: application/json\r\n",
            'content' => $json,
            'timeout' => 20,
            'ignore_errors' => true,
        ),
    ));

    $response = @file_get_contents($url, false, $context);
    $statusLine = isset($http_response_header[0]) ? $http_response_header[0] : '';
    preg_match('/\\s(\\d{3})\\s/', $statusLine, $matches);
    $httpCode = isset($matches[1]) ? (int) $matches[1] : 0;
    $ok = ($httpCode >= 200 && $httpCode < 300);

    return array($ok, $ok ? 'ok' : 'HTTP ' . $httpCode, $httpCode, (string) $response);
}

if (!isset($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Metodo nao permitido.');
}

$resendApiKey = get_resend_api_key();
$resendFrom = get_resend_from();

if ($resendApiKey === '') {
    debug_log('RESEND_API_KEY ausente');
    redirect_with_status('contato', 'erro');
}

$formType = isset($_POST['form_type']) ? normalize_text($_POST['form_type']) : '';
$returnTo = isset($_POST['return_to']) ? normalize_text($_POST['return_to']) : '';

if ($formType === 'contato') {
    debug_log('POST contato iniciado');
    $nome = isset($_POST['nome']) ? normalize_text($_POST['nome']) : '';
    $email = isset($_POST['email']) ? normalize_text($_POST['email']) : '';
    $assunto = isset($_POST['assunto']) ? normalize_text($_POST['assunto']) : '';
    $mensagem = isset($_POST['mensagem']) ? normalize_text($_POST['mensagem']) : '';

    if ($nome === '' || $email === '' || $assunto === '' || $mensagem === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        debug_log('Contato invalido: campos ausentes ou email invalido');
        redirect_with_status($returnTo !== '' ? $returnTo : 'contato', 'erro');
    }

    $subject = clean_header_value('[Contato Site] ' . $assunto);
    $text = "Novo contato recebido pelo site:\n\n"
        . "Nome: {$nome}\n"
        . "Email: {$email}\n"
        . "Assunto: {$assunto}\n\n"
        . "Mensagem:\n{$mensagem}\n";
    $html = nl2br(htmlspecialchars($text, ENT_QUOTES, 'UTF-8'));

    $payload = array(
        'from' => $resendFrom,
        'to' => array(MAIL_TO),
        'subject' => $subject,
        'text' => $text,
        'html' => $html,
        'reply_to' => clean_header_value($email),
    );

    list($sent, $reason, $httpCode, $response) = resend_request($payload, $resendApiKey);
    if (!$sent) {
        debug_log('Falha Resend contato: ' . $reason . ' | HTTP=' . $httpCode . ' | response=' . $response);
    } else {
        debug_log('Contato enviado via Resend com sucesso');
    }
    redirect_with_status('contato', $sent ? 'ok' : 'erro');
}

if ($formType === 'trabalhe_conosco') {
    debug_log('POST trabalhe_conosco iniciado');
    $nome = isset($_POST['nome']) ? normalize_text($_POST['nome']) : '';
    $email = isset($_POST['email']) ? normalize_text($_POST['email']) : '';
    $linkedin = isset($_POST['linkedin']) ? normalize_text($_POST['linkedin']) : '';
    $telefone = isset($_POST['telefone']) ? normalize_text($_POST['telefone']) : '';
    $cargo = isset($_POST['cargo']) ? normalize_text($_POST['cargo']) : '';

    if ($nome === '' || $email === '' || $telefone === '' || $cargo === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        debug_log('Trabalhe invalido: campos obrigatorios ausentes ou email invalido');
        redirect_with_status('trabalhe_conosco', 'erro');
    }

    $subject = clean_header_value('[Trabalhe Conosco] ' . $nome . ' - ' . $cargo);
    $text = "Nova candidatura recebida pelo site:\n\n"
        . "Nome: {$nome}\n"
        . "Email: {$email}\n"
        . "Telefone: {$telefone}\n"
        . "Cargo: {$cargo}\n"
        . "LinkedIn: " . ($linkedin !== '' ? $linkedin : 'Nao informado') . "\n";
    $html = nl2br(htmlspecialchars($text, ENT_QUOTES, 'UTF-8'));

    $payload = array(
        'from' => $resendFrom,
        'to' => array(MAIL_TO),
        'subject' => $subject,
        'text' => $text,
        'html' => $html,
        'reply_to' => clean_header_value($email),
    );

    if (isset($_FILES['curriculo']) && is_array($_FILES['curriculo'])) {
        $uploadError = isset($_FILES['curriculo']['error']) ? (int) $_FILES['curriculo']['error'] : UPLOAD_ERR_NO_FILE;
        if ($uploadError === UPLOAD_ERR_OK) {
            $tmpName = isset($_FILES['curriculo']['tmp_name']) ? (string) $_FILES['curriculo']['tmp_name'] : '';
            $originalName = isset($_FILES['curriculo']['name']) ? clean_header_value($_FILES['curriculo']['name']) : 'curriculo';
            $size = isset($_FILES['curriculo']['size']) ? (int) $_FILES['curriculo']['size'] : 0;
            $extension = get_extension($originalName);
            $allowed = array('pdf', 'doc', 'docx');

            if (
                $tmpName !== ''
                && is_uploaded_file($tmpName)
                && $size > 0
                && $size <= MAX_ATTACHMENT_SIZE
                && in_array($extension, $allowed, true)
            ) {
                $content = @file_get_contents($tmpName);
                if ($content !== false) {
                    $mimeType = 'application/octet-stream';
                    if (function_exists('mime_content_type')) {
                        $detectedMime = mime_content_type($tmpName);
                        if (is_string($detectedMime) && trim($detectedMime) !== '') {
                            $mimeType = $detectedMime;
                        }
                    }

                    $safeFilename = mb_convert_encoding($originalName, 'UTF-8', 'UTF-8');
                    // Ensure the filename is compatible and doesn't break JSON encoding
                    if ($safeFilename === '') {
                        $safeFilename = 'curriculo.' . $extension;
                    }

                    $payload['attachments'] = array(
                        array(
                            'filename' => $safeFilename,
                            'content' => base64_encode($content),
                            'content_type' => $mimeType,
                        ),
                    );
                } else {
                    debug_log('Falha leitura do anexo curriculo');
                }
            } else {
                debug_log('Anexo invalido/fora da politica: ' . $originalName . ' size=' . $size);
            }
        }
    }

    list($sent, $reason, $httpCode, $response) = resend_request($payload, $resendApiKey);
    if (!$sent) {
        debug_log('Falha Resend trabalhe: ' . $reason . ' | HTTP=' . $httpCode . ' | response=' . $response);
    } else {
        debug_log('Trabalhe enviado via Resend com sucesso');
    }
    redirect_with_status('trabalhe_conosco', $sent ? 'ok' : 'erro');
}

debug_log('Form type invalido: ' . $formType);
redirect_with_status($returnTo !== '' ? $returnTo : 'contato', 'erro');
