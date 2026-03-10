<?php require_once __DIR__ . '/includes/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<?php
$page_title = 'Segafredo Zanetti - MZB Brasil';
$head_extra_links = [
    'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap',
    'https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&display=swap',
];
require __DIR__ . '/includes/head.php';
?>

    <style>
        /* Page Specific Styles for Segafredo */

        /* Typography specifics similar to reference */
        .montserrat-bold {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        .jost-regular {
            font-family: 'Jost', sans-serif;
            font-weight: 400;
        }

        /* 1. HERO SECTION */
        .segafredo-hero {
            position: relative;
            width: 100%;
            height: 90vh;
            /* Adjust as needed */
            min-height: 600px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            /* Align content to the right per layout */
        }

        .segafredo-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .hero-logo-container {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translateY(-50%);
            z-index: 2;
        }

        .hero-logo-container img {
            max-width: 300px;
            /* Adjust size as needed */
            height: auto;
        }

        .segafredo-hero-content {
            padding-right: 10%;
            /* Adjust for right alignment */
            text-align: left;
            color: #fff;
            max-width: 600px;
            z-index: 2;
        }

        .segafredo-hero h1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 3rem;
            line-height: 1.2;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .segafredo-hero h2 {
            font-family: 'Jost', sans-serif;
            font-weight: 400;
            font-size: 2.5rem;
            color: #E42B1B;
            /* Red color from Segafredo */
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .segafredo-hero p {
            font-family: 'Figtree', sans-serif;
            font-size: 1.2rem;
            line-height: 1.6;
        }

        /* 2. HISTORY SECTION (Red Shape) */
        .section-segafredo-history {
            position: relative;
            padding: 100px 0;
            background-color: #F8F8F8;
            /* Light grey background */
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .red-shape-container {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 55%;
            /* Adjust width of the left container */
            z-index: 1;
            /* Ensure image is contained and visible */
            display: flex;
            align-items: center;
            /* Center vertically if needed, or top */
            justify-content: flex-start;
        }

        .red-shape-img {
            max-width: 100%;
            height: 100%;
            /* Fill the container height */
            max-height: 100%;
            object-fit: cover;
            /* Cover the area, likely cropping sides effectively to fill height */
            margin-left: 0;
        }

        .history-content {
            position: relative;
            z-index: 2;
            margin-left: 50%;
            /* Push text to the right of the image container */
            max-width: 600px;
            padding: 0 40px;
        }

        .history-content p {
            font-family: 'Figtree', sans-serif;
            font-size: 1rem;
            line-height: 1.8;
            color: #5C5B5A;
            margin-bottom: 20px;
        }

        /* 3. MISSION SECTION */
        .section-segafredo-mission {
            text-align: center;
            padding: 80px 0;
            background-color: #fff;
        }

        .mission-header {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 2.5rem;
            color: #5C5B5A;
            margin-bottom: 50px;
            text-transform: uppercase;
            font-weight: 300;
        }

        .mission-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0;
            /* No gap per design */
            width: 100%;
        }

        .mission-item {
            position: relative;
            height: 400px;
            overflow: hidden;
            background-color: #000;
            /* Dark background behind image */
        }

        .mission-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
            opacity: 0.6;
            /* Darker image */
        }

        .mission-item:hover img {
            transform: scale(1.05);
            opacity: 0.8;
            /* Lighter on hover */
        }

        .mission-text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* Centered absolute */
            width: 100%;
            text-align: center;
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .mission-text-overlay h3 {
            font-family: 'Figtree', sans-serif;
            font-weight: 400;
            /* Regular */
            font-size: 1.2rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* 4. PRODUCTS SECTION */
        .section-segafredo-products {
            padding: 80px 0;
            background-color: #F2F2F2;
            text-align: center;
        }

        .products-title {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 3rem;
            color: #5C5B5A;
            margin-bottom: 40px;
        }

        /* Dynamic Filter Wrappers */
        .products-filter {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto 40px auto;
            padding: 0 20px;
        }

        .products-filter-wrapper {
            position: relative;
            display: inline-block;
            text-align: left;
        }

        .products-filter-trigger {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            border: 1px solid #5C5B5A;
            padding: 10px 20px;
            cursor: pointer;
            font-family: 'Figtree', sans-serif;
            font-size: 0.85rem;
            color: #5C5B5A;
            letter-spacing: 1px;
            text-transform: uppercase;
            background: #fff;
            transition: all 0.3s ease;
            min-width: 180px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .products-filter-trigger:hover,
        .products-filter-trigger.active {
            background: #f9f9f9;
            border-color: #333;
        }

        .clear-filters-btn {
            background: none;
            border: 1px solid #5C5B5A;
            color: #5C5B5A;
            padding: 10px 20px;
            cursor: pointer;
            font-family: 'Figtree', sans-serif;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            display: none;
            align-items: center;
            justify-content: center;
            height: auto;
        }

        .clear-filters-btn.show {
            display: flex;
        }

        .clear-filters-btn:hover {
            background-color: #f9f9f9;
            border-color: #333;
            color: #333;
        }

        .products-filter-trigger svg.chevron-icon {
            transition: transform 0.3s ease;
        }

        .products-filter-trigger.active svg.chevron-icon {
            transform: rotate(180deg);
        }

        .products-filter-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            width: 250px;
            background-color: #ffffff;
            border: 1px solid #5C5B5A;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
            z-index: 100;
            padding: 15px 0;
            margin-top: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .products-filter-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-header-line {
            border-bottom: 1px solid #5C5B5A;
            margin: 0 20px 10px;
            width: calc(100% - 40px);
        }

        .filter-option {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 25px;
            cursor: pointer;
            transition: background 0.2s;
            font-family: 'Figtree', sans-serif;
            font-size: 0.8rem;
            color: #5C5B5A;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .filter-option:hover {
            background: #f0f0f0;
        }

        .filter-option.active {
            background: #e0e0e0;
            font-weight: 700;
        }

        .filter-icon {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .filter-icon svg {
            width: 100%;
            height: 100%;
        }

        .filter-icon-main {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 5px;
            width: 24px;
            height: 24px;
        }

        .filter-icon-main svg {
            width: 100%;
            height: 100%;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .product-card {
            background: #fff;
            padding: 30px;
            text-align: left;
            /* Text aligns left */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .product-card:hover {
            background-color: transparent;
            box-shadow: none;
        }

        .product-img-wrapper {
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .product-img-wrapper img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        .product-card h3 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            color: #1F1A16;
            /* Dark color */
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .product-card p {
            font-family: 'Figtree', sans-serif;
            font-size: 0.9rem;
            color: #5C5B5A;
            line-height: 1.5;
        }

        .btn-shop {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background-color: #E42B1B;
            color: #fff;
            padding: 15px 50px;
            margin-top: 60px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: none;
            letter-spacing: 1px;
            border: 2px solid #E42B1B;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-shop:hover {
            background-color: #fff;
            color: #E42B1B;
        }

        @media (max-width: 768px) {

            .mission-grid,
            .products-grid {
                grid-template-columns: 1fr;
            }

            .red-shape-bg {
                width: 100%;
                height: 300px;
                clip-path: none;
                position: relative;
            }

            .section-segafredo-history {
                padding-top: 0;
            }

            .history-content {
                margin-left: 0;
                padding-top: 40px;
            }

            .segafredo-hero-content {
                padding-right: 20px;
                padding-left: 20px;
                text-align: center;
                margin: 0 auto;
            }

            .segafredo-hero {
                justify-content: center;
                flex-direction: column;
            }

            .hero-logo-container {
                position: relative;
                top: auto;
                left: auto;
                transform: none;
                margin-bottom: 20px;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .hero-logo-container img {
                max-width: 180px;
                /* Slightly smaller for better proportion */
                display: block;
            }
        }
    </style>
</head>

<body>

<?php
$current_page = 'segafredo';
require __DIR__ . '/includes/header.php';
?>

    <main>

        <!-- 1. HERO SECTION -->
        <section class="segafredo-hero">
            <!-- Background Image with logo and text already embedded -->
            <img src="assets/images/HEADER_Segafredo.jpg" alt="Segafredo - Torne Cada Momento Único"
                class="segafredo-hero-bg">
        </section>

        <!-- 2. HISTORY SECTION -->
        <section class="section-segafredo-history">
            <!-- Red Shape Container -->
            <div class="red-shape-container">
                <!-- Using the red shape image -->
                <img src="assets/images/segafredo_red_shape.png" alt="Segafredo History Shape" class="red-shape-img">
            </div>

            <div class="history-content reveal-right">
                <p>A Segafredo Zanetti nasceu na Itália nos anos 1970, quando Massimo Zanetti comprou a tradicional
                    torrefação Segafredo, em Bolonha.</p>
                <p>Sua rica história e marca ganhou força e se expandiu rapidamente. Em pouco tempo, foi consolidada
                    como sinônimo de café expresso italiano em praticamente todo o mundo.</p>
                <p>Atualmente, a Segafredo Zanetti é reconhecida como líder no café expresso na Itália e no mundo, com
                    uma vasta rede de clientes em todos os continentes e com um legado que brilha em cada xícara.</p>
            </div>
        </section>

        <!-- 3. MISSION SECTION -->
        <section class="section-segafredo-mission">
            <h2 class="mission-header reveal-up">A MARCA TEM A MISSÃO DE DIFUNDIR:</h2>
            <div class="mission-grid reveal-up stagger-children">
                <!-- Sabor Italiano -->
                <div class="mission-item">
                    <img src="assets/images/segafredo_aax.png" alt="Sabor Italiano">
                    <div class="mission-text-overlay">
                        <h3>SABOR<br>ITALIANO</h3>
                    </div>
                </div>
                <!-- Cultura -->
                <div class="mission-item">
                    <img src="assets/images/segafredo_abc.png" alt="Cultura">
                    <div class="mission-text-overlay">
                        <h3>CULTURA</h3>
                    </div>
                </div>
                <!-- Preparação -->
                <div class="mission-item">
                    <img src="assets/images/segafredo_abh.png" alt="Preparação do Verdadeiro Espresso">
                    <div class="mission-text-overlay">
                        <h3>PREPARAÇÃO DO<br>VERDADEIRO EXPRESSO</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. PRODUCTS SECTION -->
        <section class="section-segafredo-products">
            <h2 class="products-title reveal-up">PRODUTOS</h2>

            <div class="products-filter">

                <!-- Filter USO -->
                <div class="products-filter-wrapper">
                    <div class="products-filter-trigger" id="filter-uso-trigger">
                        <div class="filter-icon-main">
                            <!-- Custom Slider Icon representing 'Filter' similar to design -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="4" y1="6" x2="20" y2="6" stroke="#5C5B5A" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <circle cx="8" cy="6" r="2.5" fill="#f2f2f2" stroke="#5C5B5A" stroke-width="1.5" />

                                <line x1="4" y1="12" x2="20" y2="12" stroke="#5C5B5A" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <circle cx="16" cy="12" r="2.5" fill="#f2f2f2" stroke="#5C5B5A" stroke-width="1.5" />

                                <line x1="4" y1="18" x2="20" y2="18" stroke="#5C5B5A" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <circle cx="8" cy="18" r="2.5" fill="#f2f2f2" stroke="#5C5B5A" stroke-width="1.5" />
                            </svg>
                        </div>
                        <span class="current-filter-label">FILTRAR USO</span>
                        <svg class="chevron-icon" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="#5C5B5A" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>

                    <div class="products-filter-dropdown" id="filter-uso-dropdown">
                        <div class="dropdown-header-line"></div>

                        <div class="filter-option filter-option-uso" data-filter="domestico">
                            <div class="filter-icon">
                                <img src="assets/images/DOMESTICO.svg" alt="Uso Doméstico"
                                    style="width: 100%; height: 100%;">
                            </div>
                            <span>DOMÉSTICO</span>
                        </div>
                        <div class="filter-option filter-option-uso" data-filter="profissional">
                            <div class="filter-icon">
                                <img src="assets/images/PROFISSIONAL.svg" alt="Uso Profissional"
                                    style="width: 100%; height: 100%;">
                            </div>
                            <span>PROFISSIONAL</span>
                        </div>
                    </div>
                </div>

                <!-- Filter TIPO -->
                <div class="products-filter-wrapper">
                    <div class="products-filter-trigger" id="filter-tipo-trigger">
                        <div class="filter-icon-main">
                            <!-- Custom Slider Icon representing 'Filter' similar to design -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="4" y1="6" x2="20" y2="6" stroke="#5C5B5A" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <circle cx="8" cy="6" r="2.5" fill="#f2f2f2" stroke="#5C5B5A" stroke-width="1.5" />

                                <line x1="4" y1="12" x2="20" y2="12" stroke="#5C5B5A" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <circle cx="16" cy="12" r="2.5" fill="#f2f2f2" stroke="#5C5B5A" stroke-width="1.5" />

                                <line x1="4" y1="18" x2="20" y2="18" stroke="#5C5B5A" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <circle cx="8" cy="18" r="2.5" fill="#f2f2f2" stroke="#5C5B5A" stroke-width="1.5" />
                            </svg>
                        </div>
                        <span class="current-filter-label">FILTRAR TIPO</span>
                        <svg class="chevron-icon" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="#5C5B5A" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>

                    <div class="products-filter-dropdown" id="filter-tipo-dropdown">
                        <div class="dropdown-header-line"></div>

                        <div class="filter-option filter-option-tipo" data-filter="em_grao">
                            <div class="filter-icon">
                                <img src="assets/images/emgrao.svg" alt="Em Grão" style="width: 100%; height: 100%;">
                            </div>
                            <span>EM GRÃO</span>
                        </div>

                        <div class="filter-option filter-option-tipo" data-filter="torrado_moido">
                            <div class="filter-icon">
                                <img src="assets/images/novasuissa_grao_moido.svg" alt="Torrado e Moído"
                                    style="width: 100%; height: 100%;">
                            </div>
                            <span>TORRADO E MOÍDO</span>
                        </div>

                        <div class="filter-option filter-option-tipo" data-filter="capsula">
                            <div class="filter-icon">
                                <img src="assets/images/CAPSULA.svg" alt="Cápsula" style="width: 100%; height: 100%;">
                            </div>
                            <span>CÁPSULA</span>
                        </div>

                        <div class="filter-option filter-option-tipo" data-filter="instantaneo">
                            <div class="filter-icon">
                                <img src="assets/images/INSTANTANEO.svg" alt="Instantâneo"
                                    style="width: 100%; height: 100%;">
                            </div>
                            <span>INSTANTÂNEO</span>
                        </div>
                    </div>
                </div>

                <button id="clear-filters-btn" class="clear-filters-btn">LIMPAR FILTROS</button>

            </div>

            <div class="products-grid reveal-up stagger-children">
                <!-- Products will be loaded here dynamically by segafredo-products.js -->
            </div>

            <a href="https://www.lojasegafredo.com.br/" target="_blank" class="btn-shop">
                <svg class="cart-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1" />
                    <circle cx="20" cy="21" r="1" />
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                </svg>
                ACESSE A LOJA ONLINE
            </a>
        </section>

    </main>

    <!-- Footer -->
    <?php
$footer_variant = 'footer-light-blue';
$page_scripts = ['assets/js/segafredo-products.js'];
require __DIR__ . '/includes/footer.php';
?>
</body>

</html>