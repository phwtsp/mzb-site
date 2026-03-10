<?php
require_once __DIR__ . '/includes/bootstrap.php';

$form_status = $_GET['status'] ?? '';
$form_message = '';
$form_message_class = '';

if ($form_status === 'ok') {
    $form_message = 'Mensagem enviada com sucesso. Obrigado pelo contato.';
    $form_message_class = 'is-success';
} elseif ($form_status === 'erro') {
    $form_message = 'Nao foi possivel enviar sua mensagem. Tente novamente em instantes.';
    $form_message_class = 'is-error';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<?php
$page_title = 'Contato - MZB Brasil';
require __DIR__ . '/includes/head.php';
?>

    <style>
        /* Contact Page specific styles */
        body {
            background-color: #f9f9f9;
        }

        main {
            padding-top: 0;
            /* Overlap header */
        }

        /* HERO SECTION */
        .hero-contact {
            position: relative;
            width: 100%;
            height: 60vh;
            /* Reduced height */
            min-height: 400px;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            /* Align text to bottom area? Or allow overlay? */
            justify-content: center;
        }

        .hero-contact-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .hero-contact-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            /* Center the coffee pot */
        }

        /* Hero Text Overlay "Contato" */
        .hero-contact-text {
            position: absolute;
            z-index: 2;
            bottom: 15%;
            /* Positioned lower in the image */
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 100%;
        }

        .hero-contact-title {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 80px;
            color: #fff;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            font-weight: 300;
        }

        /* CONTACT FORM SECTION */
        .contact-content-section {
            background-color: #036398;
            /* Brand Blue */
            color: #fff;
            padding: 80px 0;
        }

        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
        }

        /* Left Column: Info */
        .contact-info-col {
            padding-top: 40px;
        }

        .contact-logo {
            width: 250px;
            margin-bottom: 60px;
            filter: brightness(0) invert(1);
            /* Make logo white */
        }

        .contact-details p {
            font-family: 'Figtree', sans-serif;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 25px;
            opacity: 0.9;
        }

        .contact-details strong {
            font-weight: 700;
        }

        /* Right Column: Form */
        .contact-form-col {
            background: transparent;
        }

        .contact-form .form-group {
            margin-bottom: 20px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            background-color: #014F7A;
            /* Darker blue shade for input bg */
            border: none;
            padding: 15px 20px;
            color: #fff;
            font-family: 'Figtree', sans-serif;
            font-size: 16px;
            outline: none;
            border-radius: 4px;
            /* Slight radius */
        }

        .contact-form input::placeholder,
        .contact-form textarea::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .contact-form textarea {
            height: 180px;
            resize: vertical;
        }

        .form-feedback {
            margin-bottom: 16px;
            padding: 12px 14px;
            border-radius: 6px;
            font-family: 'Figtree', sans-serif;
            font-size: 14px;
            line-height: 1.4;
        }

        .form-feedback.is-success {
            background-color: rgba(125, 255, 173, 0.18);
            border: 1px solid rgba(125, 255, 173, 0.45);
            color: #d9ffe8;
        }

        .form-feedback.is-error {
            background-color: rgba(255, 120, 120, 0.18);
            border: 1px solid rgba(255, 120, 120, 0.45);
            color: #ffe4e4;
        }

        .btn-send {
            background-color: #fff;
            color: #036398;
            border: none;
            padding: 15px 60px;
            font-family: 'Figtree', sans-serif;
            font-weight: 800;
            font-size: 16px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            margin-top: 20px;
            display: inline-block;
        }

        .btn-send:hover {
            background-color: #eee;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-contact {
                height: 60vh;
                min-height: 400px;
            }

            .hero-contact-title {
                font-size: 50px;
            }

            .contact-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .contact-logo {
                margin-bottom: 40px;
                width: 200px;
            }
        }
    </style>
</head>

<body>

<?php
$current_page = 'contato';
require __DIR__ . '/includes/header.php';
?>

    <main>

        <!-- HERO -->
        <section class="hero-contact">
            <div class="hero-contact-bg">
                <img src="assets/images/header_contato.jpg" alt="Contato Header Coffee">
                <div class="hero-contact-overlay"
                    style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.2);"></div>
            </div>

            <div class="hero-contact-text hero-animate">
                <h1 class="hero-contact-title">Contato</h1>
            </div>
        </section>

        <!-- CONTACT CONTENT -->
        <section class="contact-content-section">
            <div class="contact-container">
                <!-- Left: Info -->
                <div class="contact-info-col reveal-left">
                    <!-- Using standard logo add.png but inverted to white via CSS -->
                    <img src="assets/images/add.png" alt="Massimo Zanetti Beverage Brasil" class="contact-logo">

                    <div class="contact-details">
                        <p>
                            <strong>Endereço:</strong><br>
                            R. Sargento Cassiano, 2281 - Chácara Primavera, Vargem Grande do Sul
                        </p>

                        <p>
                            <strong>Horário de funcionamento:</strong><br>
                            Segunda a Sexta-feira das 8h às 17h30
                        </p>
                    </div>
                </div>

                <!-- Right: Form -->
                <div class="contact-form-col reveal-right">
                    <form class="contact-form" action="send-email.php" method="POST">
                        <input type="hidden" name="form_type" value="contato">
                        <input type="hidden" name="return_to" value="contato">
                        <?php if ($form_message !== ''): ?>
                        <div class="form-feedback <?= htmlspecialchars($form_message_class, ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($form_message, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <input type="text" name="nome" placeholder="Nome" required>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" placeholder="E-mail" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="assunto" placeholder="Assunto" required>
                        </div>

                        <div class="form-group">
                            <textarea name="mensagem" placeholder="Mensagem" required></textarea>
                        </div>

                        <button type="submit" class="btn-send">ENVIAR</button>
                    </form>
                </div>
            </div>
        </section>

    </main>

    <?php
$footer_variant = '';
$page_scripts = [];
require __DIR__ . '/includes/footer.php';
?>
</body>

</html>
