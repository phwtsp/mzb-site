<?php
require_once __DIR__ . '/includes/bootstrap.php';

$form_status = $_GET['status'] ?? '';
$form_message = '';
$form_message_class = '';

if ($form_status === 'ok') {
    $form_message = 'Curriculo enviado com sucesso. Obrigado pelo interesse!';
    $form_message_class = 'is-success';
} elseif ($form_status === 'erro') {
    $form_message = 'Nao foi possivel enviar seu curriculo. Tente novamente em instantes.';
    $form_message_class = 'is-error';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<?php
$page_title = 'Trabalhe Conosco - MZB Brasil';
require __DIR__ . '/includes/head.php';
?>

    <style>
        /* Specific Styles for Trabalhe Conosco */
        body {
            background-color: #034f7a;
            /* Fallback color from image */
        }

        main {
            padding-top: 0;
            min-height: 100vh;
        }

        /* HERO / MAIN SECTION */
        .work-hero {
            position: relative;
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 120px 0 80px 0;
            /* Space for fixed header */
            box-sizing: border-box;
        }

        .work-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .work-hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .work-hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(3, 79, 122, 0.4);
            /* Blue overlay to unsure text readability over image */
            z-index: 2;
        }

        .work-container {
            position: relative;
            z-index: 3;
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: flex-start;
            /* Align top */
        }

        /* Left Column: Text */
        .work-text-col {
            padding-top: 40px;
            color: #fff;
        }

        .work-title {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 64px;
            margin-bottom: 10px;
            line-height: 1.1;
            font-weight: 300;
        }

        .work-subtitle {
            font-family: 'Figtree', sans-serif;
            font-size: 18px;
            color: #fff;
            opacity: 0.9;
            font-weight: 300;
        }

        /* Right Column: Form */
        .work-form-col {
            /* No background on column itself, form inputs have style */
        }

        .work-form .form-group {
            margin-bottom: 15px;
        }

        .work-form input {
            width: 100%;
            background-color: #0d5f8a;
            /* Blue shade matching design */
            border: none;
            padding: 15px 20px;
            color: #fff;
            font-family: 'Figtree', sans-serif;
            font-size: 16px;
            outline: none;
            border-radius: 4px;
        }

        .work-form input::placeholder {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Specific input for file upload simulation */
        .file-upload-wrapper {
            position: relative;
        }

        .file-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            pointer-events: none;
        }

        .btn-send-work {
            background-color: #fff;
            color: #034f7a;
            /* Dark Blue Text */
            border: none;
            padding: 15px 0;
            width: 100%;
            /* Full Width Button */
            font-family: 'Figtree', sans-serif;
            font-weight: 800;
            font-size: 16px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            margin-top: 20px;
            border-radius: 4px;
        }

        .btn-send-work:hover {
            background-color: #f0f0f0;
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

        /* Responsive */
        @media (max-width: 900px) {
            .work-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .work-text-col {
                text-align: center;
                padding-top: 0;
            }

            .work-title {
                font-size: 48px;
            }
        }
    </style>
</head>

<body>

<?php
$current_page = 'trabalhe_conosco';
require __DIR__ . '/includes/header.php';
?>

    <main>

        <section class="work-hero">
            <div class="work-hero-bg">
                <img src="assets/images/header_trabalhe_conosco.jpg" alt="Background Coffee">
                <!-- Overlay optional depending on image darkness -->
                <div class="work-hero-overlay"></div>
            </div>

            <div class="work-container">
                <!-- Left: Texts -->
                <div class="work-text-col hero-animate">
                    <h1 class="work-title">Trabalhe conosco</h1>
                    <p class="work-subtitle">Venha fazer parte do nosso time!</p>
                </div>

                <!-- Right: Form -->
                <div class="work-form-col hero-animate-delay">
                    <form class="work-form" action="/send-email.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="form_type" value="trabalhe_conosco">
                        <input type="hidden" name="return_to" value="trabalhe_conosco">
                        <?php if ($form_message !== ''): ?>
                        <div class="form-feedback <?= htmlspecialchars($form_message_class, ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($form_message, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <input type="text" name="nome" placeholder="Nome completo" required>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" placeholder="E-mail" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="linkedin" placeholder="LinkedIn">
                        </div>

                        <div class="form-group">
                            <input type="tel" name="telefone" placeholder="Telefone" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="cargo" placeholder="Cargo" required>
                        </div>

                        <div class="form-group file-upload-wrapper">
                            <input type="text" id="curriculo-filename" placeholder="Curriculo (PDF, DOC, DOCX)" readonly
                                onclick="document.getElementById('file-input').click();" style="cursor:pointer;">
                            <input type="file" id="file-input" name="curriculo" accept=".pdf,.doc,.docx" style="display: none;">
                            <span class="file-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48">
                                    </path>
                                </svg>
                            </span>
                        </div>

                        <button type="submit" class="btn-send-work">ENVIAR</button>
                    </form>
                </div>
            </div>
        </section>

    </main>

    <script>
        (function () {
            const fileInput = document.getElementById('file-input');
            const filenameField = document.getElementById('curriculo-filename');

            if (!fileInput || !filenameField) return;

            fileInput.addEventListener('change', () => {
                const fileName = fileInput.files && fileInput.files[0] ? fileInput.files[0].name : '';
                filenameField.value = fileName || 'Curriculo (PDF, DOC, DOCX)';
            });
        })();
    </script>

    <?php
$footer_variant = '';
$page_scripts = [];
require __DIR__ . '/includes/footer.php';
?>
</body>

</html>
