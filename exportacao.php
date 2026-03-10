<?php require_once __DIR__ . '/includes/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<?php
$page_title = 'MZB Brasil - Exportação';
require __DIR__ . '/includes/head.php';
?>

    <style>
        /* Page Specific Styles */
        .export-hero .hero-text-overlay h1 {
            font-style: italic;
            text-transform: capitalize;
            /* To match "Exportação" capital E only if needed, or uppercase depending on design. 
               The reference shows "Exportação" in Title Case/Italic. */
            font-size: 5rem;
        }

        .section-world-cup {
            padding: 100px 0;
            background-color: #F2F2F2;
            text-align: center;
        }

        .section-world-cup h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3.5rem;
            color: #5C5B5A;
            text-transform: uppercase;
            font-weight: 300;
            /* Regular/Light */
            margin-bottom: 40px;
        }

        .section-world-cup h2 strong {
            font-weight: 700;
        }

        .section-world-cup p {
            max-width: 800px;
            margin: 0 auto 20px auto;
            color: #5C5B5A;
            font-family: 'Figtree', sans-serif;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .section-export-options {
            padding: 80px 0;
            background-color: #fff;
            text-align: center;
        }

        .section-export-options h2 {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 4rem;
            color: #036398;
            margin-bottom: 30px;
            text-transform: none;
            /* "Opções de Exportação" */
        }



        .section-export-options p {
            max-width: 800px;
            margin: 0 auto 40px auto;
            color: #5C5B5A;
            font-family: 'Figtree', sans-serif;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .btn-download {
            display: inline-block;
            border: 1px solid #036398;
            color: #036398;
            padding: 15px 40px;
            text-transform: uppercase;
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .btn-download:hover {
            background-color: #036398;
            color: #fff;
        }

        .section-beans-image {
            width: 100%;
            height: 60vh;
            min-height: 400px;
            position: relative;
        }

        .section-beans-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .section-cases {
            padding: 100px 0;
            background-color: #fff;
            text-align: center;
        }

        .section-cases h2 {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            color: #036398;
            /* Blue */
            font-size: 4rem;
            margin-bottom: 40px;
        }

        .section-cases p {
            max-width: 900px;
            margin: 0 auto;
            color: #5C5B5A;
            font-family: 'Figtree', sans-serif;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .section-cases p strong {
            font-weight: 700;
        }
    </style>
</head>

<body>

<?php
$current_page = 'exportacao';
require __DIR__ . '/includes/header.php';
?>

    <main>

        <!-- 1. HERO SECTION -->
        <section class="about-hero-section export-hero">
            <div class="hero-image-wrapper">
                <!-- Values bg used for hero standard, replacing with specific header image -->
                <img src="assets/images/header_exportacao.jpg" alt="Exportação" class="hero-img-cover">
                <div class="hero-text-overlay hero-animate">
                    <h1><em>Exportação</em></h1>
                </div>
            </div>
        </section>

        <!-- 2. O MUNDO EM UMA XÍCARA -->
        <section class="section-world-cup">
            <div class="container reveal-up">
                <h2>O MUNDO EM UMA <strong>XÍCARA</strong></h2>
                <p><strong>Há mais de 50 anos comercializamos cafés de excelência <br>— seja em grãos, torrado ou
                        moído.</strong></p>
                <p>Hoje, somos referência global em produção e exportação, oferecendo <br>blends de qualidade superior
                    que conquistam mercados em todo o mundo.</p>
            </div>
        </section>

        <!-- 3. OPÇÕES DE EXPORTAÇÃO -->
        <section class="section-export-options">
            <div class="container reveal-up">
                <h2>Opções de Exportação</h2>
                <p>Importar cafés com a Massimo Zanetti Beverage Brasil é ter a garantia de tradição, <br>tecnologia e
                    sabor reconhecidos internacionalmente.</p>
                <a href="#" class="btn-download">CLIQUE E FAÇA DOWNLOAD DO CATÁLOGO COMPLETO</a>
            </div>
        </section>

        <!-- 4. BEANS IMAGE -->
        <section class="section-beans-image">
            <!-- Assuming export_aau.png is the beans image -->
            <img src="assets/images/export_aau.png" alt="Café em grãos">
        </section>

        <!-- 5. CASES DE SUCESSO -->
        <section class="section-cases">
            <div class="container reveal-up">
                <h2>Cases de Sucesso</h2>
                <p>
                    Com as marcas Alsea e Carrefour Argentina, desenvolvemos projetos amplos e muito bem estruturados de
                    cafés, o que possibilitou às empresas o aumento de sua geografia de exportação. <strong>Hoje
                        exportamos para países como: Argentina, Bolívia, Chile, Equador, EUA, Uruguais, México, Paraguai
                        e mais.</strong>
                </p>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php
$footer_variant = 'footer-light-blue';
$page_scripts = [];
require __DIR__ . '/includes/footer.php';
?>
</body>

</html>