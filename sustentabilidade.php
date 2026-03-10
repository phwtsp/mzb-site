<?php require_once __DIR__ . '/includes/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<?php
$page_title = 'MZB Brasil - Sustentabilidade';
require __DIR__ . '/includes/head.php';
?>
</head>

<body>

<?php
$current_page = 'sustentabilidade';
require __DIR__ . '/includes/header.php';
?>

    <main class="page-sustentabilidade">

        <!-- 1. Hero Section -->
        <section class="sust-hero">
            <div class="sust-hero-bg">
                <img src="assets/images/sustentabilidade/hero_sustentabilidade.jpg" alt="Sustentabilidade Background">
            </div>
            <!-- Gradient Overlay for readability -->
            <div class="sust-hero-overlay"></div>
            <div class="sust-hero-content hero-animate">
                <h1 class="hero-title hero-title-custom">Sustentabilidade</h1>
            </div>
        </section>

        <!-- 2. Práticas Sustentáveis (White Background) -->
        <section class="sust-praticas">
            <div class="container-sust">
                <div class="praticas-content reveal-up">
                    <h2 class="section-title-sust text-center" style="color: #5C5B5A;">PRÁTICAS
                        <strong>SUSTENTÁVEIS</strong>
                    </h2>
                    <p class="sust-text text-center text-gray">
                        Para a MZB, a sustentabilidade é uma prática diária que guia nossas decisões e impacta
                        positivamente toda a cadeia de produção do nosso café.
                    </p>
                </div>
            </div>
        </section>

        <!-- 3. Funcionamento / Qualidade (Dark/Image Background) -->
        <section class="sust-qualidade">
            <div class="sust-qualidade-bg">
                <!-- Image of woman drinking coffee -->
                <img src="assets/images/sustentabilidade/aao.png" alt="Mulher bebendo café">
            </div>
            <div class="container-sust">
                <div class="qualidade-grid">
                    <div class="qualidade-content reveal-left">
                        <h2 class="section-title-qualidade">
                            <span class="light">FUNCIONAMENTO</span><br>
                            <span class="light">DO NOSSO</span> <strong>SETOR</strong><br>
                            <span class="italic">DE QUALIDADE</span>
                        </h2>

                        <div class="qualidade-list">
                            <!-- Item 1 -->
                            <div class="qualidade-item">
                                <div class="icon-box">
                                    <img src="assets/images/sustentabilidade/star-icon.png" alt="Star Icon">
                                </div>
                                <div class="text-box">
                                    <h3>LOGÍSTICA REVERSA</h3>
                                    <p>Recolhimento e reaproveitamento de produtos ou embalagens após o consumo.</p>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="qualidade-item">
                                <div class="icon-box">
                                    <img src="assets/images/sustentabilidade/star-icon.png" alt="Star Icon">
                                </div>
                                <div class="text-box">
                                    <h3>GESTÃO DE RESÍDUOS</h3>
                                    <p>Manejo adequado dos resíduos gerados, da etapa de produção até o destino final.
                                    </p>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="qualidade-item">
                                <div class="icon-box">
                                    <img src="assets/images/sustentabilidade/star-icon.png" alt="Star Icon">
                                </div>
                                <div class="text-box">
                                    <h3>CONTROLE DE EMISSÃO DE CO2 NA ATMOSFERA</h3>
                                    <p>Contribuindo para a preservação do clima e a construção de um futuro mais
                                        sustentável.</p>
                                </div>
                            </div>

                            <!-- Item 4 -->
                            <div class="qualidade-item">
                                <div class="icon-box">
                                    <img src="assets/images/sustentabilidade/star-icon.png" alt="Star Icon">
                                </div>
                                <div class="text-box">
                                    <h3>[EM IMPLANTAÇÃO] PROJETO SUBTERRÂNEO DE REAPROVEITAMENTO DAS ÁGUAS DAS CHUVAS.
                                    </h3>
                                </div>
                            </div>

                            <!-- Item 5 (Eureciclo) -->
                            <div class="qualidade-item">
                                <div class="icon-box icon-box-noborder">
                                    <img src="assets/images/sustentabilidade/eureciclo-icon.png" alt="Eureciclo Icon">
                                </div>
                                <div class="text-box">
                                    <h3>SELO EURECICLO</h3>
                                    <p>O selo comprova que a MZB realiza a política de logística reversa, com
                                        compensação ambiental acima do exigido por lei.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Spacer for the image side (right side) -->
                    <div class="qualidade-spacer"></div>
                </div>
            </div>
        </section>

        <!-- 4. Certificações (White Background) -->
        <section class="sust-certifications" id="certificacoes">
            <div class="container-sust">
                <div class="cert-header reveal-up">
                    <h2 class="section-title-sust text-center blue-title italic-certification">Nossas certificações</h2>
                    <p class="sust-text center-text gray-text">
                        Em reconhecimento a nossa dedicação e cuidado, acumulamos durante todos esses anos vários
                        certificados que comprovam a nossa excelência em processos e produção do melhor café!
                    </p>
                </div>

                <div class="cert-grid-layout reveal-up stagger-children">
                    <!-- ISO Block (Left) -->
                    <div class="cert-block iso-block">
                        <div class="cert-img-wrapper">
                            <img src="assets/images/sustentabilidade/adf.png" alt="ISO 9001">
                        </div>
                        <p class="cert-caption">SISTEMA DE GESTÃO DA QUALIDADE<br><strong>(CERTIFICADO) ISO
                                9001:2015</strong></p>
                    </div>

                    <!-- PQC Block (Right) -->
                    <div class="cert-block pqc-block">
                        <div class="cert-img-wrapper row-logos">
                            <!-- Try to use individual images if available, or the group slice -->
                            <img src="assets/images/sustentabilidade/acv.png" alt="Tradicional">
                            <img src="assets/images/sustentabilidade/acx.png" alt="Extraforte">
                            <img src="assets/images/sustentabilidade/acz.png" alt="Gourmet">
                            <img src="assets/images/sustentabilidade/adb.png" alt="Superior">
                        </div>
                        <p class="cert-caption">PQC - PROGRAMA DE QUALIDADE<br><strong>DO CAFÉ (CERTIFICADO)</strong>
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php
$footer_variant = '';
$page_scripts = [];
require __DIR__ . '/includes/footer.php';
?>
</body>

</html>