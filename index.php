<?php require_once __DIR__ . '/includes/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<?php
$page_title = 'MZB Brasil | Indústria de Café, Marcas e Soluções';
require __DIR__ . '/includes/head.php';
?>
</head>

<body>

<?php
$current_page = 'index';
require __DIR__ . '/includes/header.php';
?>

    <main>
        <!-- 1. Hero Section -->
        <section class="hero">
            <div class="hero-bg">
                <img src="assets/images/aae.png" alt="Background">
                <div class="hero-overlay"></div> <!-- Darken if needed -->
            </div>
            <div class="hero-text-container hero-animate">
                <h1 class="hero-headline">
                    Nós valorizamos cada etapa<br>
                    da experiência <span class="italic">com o</span> <strong>café.</strong>
                </h1>
            </div>
        </section>

        <!-- 2. About Section -->
        <section class="about">
            <!-- Cup & Logo Divider -->
            <div class="divider-container reveal-up">
                <div class="divider-cup">
                    <img src="assets/images/home_abg.png" alt="Coffee Cup">
                </div>
                <div class="divider-logo">
                    <img src="assets/images/aas.png" alt="Massimo Zanetti Signature">
                </div>
            </div>

            <div class="about-container reveal-up">
                <div class="about-header">
                    <!-- Badge removed as per new layout focus on cup/signature -->
                    <h2 class="section-title">SOBRE A <strong>MZB BRASIL</strong></h2>
                </div>

                <div class="about-text">
                    <p>A MZB Brasil é uma das maiores indústrias de torrefação e moagem de café do país, figurando entre
                        as 10 maiores do setor no ranking nacional, segundo a ABIC. Com sede no Estado de São Paulo,
                        somos a terceira maior indústria cafeeira da região e atuamos tanto no mercado interno quanto no
                        segmento de exportação.</p>
                    <p>Integrante da holding italiana Massimo Zanetti Beverage Group, referência global no setor de
                        alimentos e bebidas, a MZB Brasil alia tradição e inovação em um processo produtivo de café 100%
                        automatizado, garantindo excelência em qualidade e eficiência operacional</p>
                    <p>Com logística própria, forte investimento em tecnologia e práticas sustentáveis e sociais em sua
                        cadeia de valor, a empresa se destaca como referência em inovação no setor cafeeiro brasileiro.
                    </p>
                </div>
            </div>
        </section>

        <!-- 3. Process Section (Images Strip) -->
        <section class="process">
            <div class="process-grid reveal-up stagger-children">
                <div class="process-img"><img src="assets/images/abt.png" alt="Tasting"></div>
                <div class="process-img"><img src="assets/images/abp.png" alt="Sacks"></div>
                <div class="process-img"><img src="assets/images/abl.png" alt="Pouring"></div>
            </div>
        </section>

        <!-- 4. Products Section -->
        <section class="products">
            <div class="products-container reveal-up">
                <!-- Left Title -->
                <div class="products-title-col">
                    <h2 class="section-title-products">
                        NOSSOS<br>
                        <strong>PRINCIPAIS</strong><br>
                        PRODUTOS
                    </h2>
                </div>

                <!-- Right Content -->
                <div class="products-content-col">
                    <!-- Logos Grid -->
                    <div class="logos-grid">
                        <div class="logo-item"><img src="assets/images/home_logo_segafredo.png" alt="Segafredo"></div>
                        <div class="logo-item"><img src="assets/images/abx.png" alt="Pacaembu"></div>
                        <div class="logo-item"><img src="assets/images/home_logo_novasuissa.png" alt="Nova Suissa">
                        </div>
                        <div class="logo-item"><img src="assets/images/aby.png" alt="Itambé"></div>
                        <div class="logo-item"><img src="assets/images/abz.png" alt="Tradição"></div>
                        <div class="logo-item"><img src="assets/images/home_logo_graodaterra.png" alt="Grao da Terra">
                        </div>

                    </div>
                </div>
            </div>

            <!-- Packshots - Full Width & Centered -->
            <div class="products-full-width reveal-scale">
                <img src="assets/images/ace.png" alt="Product Range">
            </div>
        </section>

        <!-- 5. Values Section -->
        <section class="values">
            <div class="values-bg">
                <img src="assets/images/values_bg.png" alt="Values">
                <div class="values-overlay"></div>
            </div>
            <div class="values-content reveal">
                <h2 class="values-title">NA MZB BRASIL, ACREDITAMOS QUE UM BOM CAFÉ COMEÇA COM <strong>VALORES
                        SÓLIDOS.</strong></h2>
                <p>Nossa jornada é guiada pela honestidade nas relações, pelo respeito a cada pessoa e processo, e pela
                    união de esforços que move nossa equipe todos os dias.</p>
            </div>
        </section>

        <!-- 6. Sustainability Section -->
        <section class="sustainability">
            <div class="sust-bg">
                <img src="assets/images/act.png" alt="Sustainability">
            </div>
            <div class="sust-content-wrapper">
                <div class="sust-box reveal-up">
                    <p>Valorizamos o ser humano em todas as etapas e investimos em práticas que garantem a
                        sustentabilidade do negócio, cuidando do presente sem comprometer o futuro.</p>
                    <br>
                    <p>Mais do que produzir café de qualidade, queremos cultivar relações duradouras, baseadas em
                        confiança, ética e propósito.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php
$footer_variant = 'footer-home';
$page_scripts = [];
require __DIR__ . '/includes/footer.php';
?>
</body>

</html>