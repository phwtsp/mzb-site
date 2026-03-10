<?php require_once __DIR__ . '/includes/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café Pacaembu | Massimo Zanetti Beverage Brasil</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Jost:wght@300;400;500;600;700&family=Figtree:wght@300;400;500;600;700;800&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Raleway:wght@400;500;700&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= htmlspecialchars(asset('assets/css/style.css'), ENT_QUOTES, 'UTF-8') ?>">

    <style>
        /* Specific Styles for Pacaembu Page */

        .pacaembu-wrapper {
            width: 100%;
            overflow-x: hidden;
        }

        /* Hero Section */
        .section-pacaembu-hero {
            position: relative;
            width: 100%;
            line-height: 0;
        }

        .section-pacaembu-hero img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* About Section (History) */
        .section-pacaembu-about {
            position: relative;
            width: 100%;
        }

        .about-bg-img {
            width: 100%;
            height: auto;
            display: block;
        }

        .pacaembu-about-text {
            position: absolute;
            top: 25%;
            left: 13%;
            width: 38%;
            color: #5C5B5A;
            font-family: 'Figtree', sans-serif;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .pacaembu-about-text p {
            margin-bottom: 25px;
        }

        .text-bold {
            font-weight: 700;
        }

        /* Products Section */
        .section-pacaembu-products {
            padding: 80px 20px;
            background-color: #f5f5f5;
            text-align: center;
        }

        .products-header-actions {
            max-width: 1400px;
            margin: 0 auto 40px auto;
            display: flex;
            justify-content: flex-end;
            padding-right: 20px;
        }

        .products-title {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 3.5rem;
            color: #5C5B5A;
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: -1px;
        }

        /* Dynamic filter styles */
        .products-filter-wrapper {
            position: relative;
            display: inline-block;
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
            background: transparent;
            transition: all 0.3s ease;
            min-width: 180px;
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
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 1400px;
            margin: 0 auto;
        }

        .product-card {
            width: 380px;
            text-align: left;
            background-color: #ffffff;
            padding: 0 40px 50px 40px;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            background-color: transparent;
            box-shadow: none;
        }

        .product-image-container {
            position: relative;
            width: 100%;
            height: 350px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .product-full-img {
            max-width: 100%;
            height: auto;
            max-height: 100%;
            object-fit: contain;
            display: block;
            margin: auto;
            position: relative !important;
        }

        .product-name {
            font-family: 'Figtree', sans-serif;
            font-weight: 800;
            font-size: 1.4rem;
            color: #5C5B5A;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .product-desc {
            font-family: 'Figtree', sans-serif;
            font-weight: 300;
            font-size: 0.95rem;
            color: #777;
            line-height: 1.5;
        }

        .btn-shop-pacaembu {
            display: inline-flex;
            background-color: #E96F14;
            color: #fff;
            padding: 15px 40px;
            margin-top: 60px;
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            border: 2px solid #E96F14;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
            align-items: center;
            gap: 15px;
            border-radius: 0;
        }

        .btn-shop-pacaembu:hover {
            background-color: #fff;
            color: #E96F14;
        }

        /* Responsive Fixes */
        @media (max-width: 992px) {
            .pacaembu-about-text {
                position: relative;
                top: auto;
                left: auto;
                width: 100%;
                padding: 40px 20px;
                background-color: #fff;
            }

            .section-pacaembu-about {
                display: flex;
                flex-direction: column;
            }

            .about-bg-img {
                order: 1;
                /* Image below text on mobile? Usually image first or text first. Let's put image first. */
            }

            .section-pacaembu-about {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            .products-grid {
                gap: 60px;
            }

            .product-card {
                width: 100%;
                max-width: 300px;
                text-align: center;
            }

            .product-image-container {
                height: 300px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            /* Simplify layout for mobile if layers break */
            .product-image-container img {
                position: absolute;
                transform: scale(0.9);
            }

            .products-title {
                font-size: 2.5rem;
            }

            .btn-shop-pacaembu {
                padding: 15px 30px;
                font-size: 0.9rem;
            }
        }
    </style>
<?php require __DIR__ . '/includes/analytics.php'; ?>

</head>

<body>

<?php
$current_page = 'pacaembu';
require __DIR__ . '/includes/header.php';
?>

    <!-- MAIN CONTENT -->
    <div class="pacaembu-wrapper">

        <!-- Hero Section -->
        <section class="section-pacaembu-hero">
            <img src="assets/images/pacaembu_aae.png" alt="Café Pacaembu">
        </section>

        <!-- About Section -->
        <section class="section-pacaembu-about">
            <img src="assets/images/pacaembu_aac.png" alt="História Pacaembu" class="about-bg-img">
            <div class="pacaembu-about-text reveal-right">
                <p>O Café Pacaembu é uma marca tradicional brasileira, fundada em 1957 por Michel Halla, em Vargem
                    Grande do Sul, São Paulo.</p>
                <p>Em 2019, a empresa foi adquirida pelo Massimo Zanetti Beverage Group, com o intuito de expandir sua
                    presença no mercado brasileiro.</p>
                <p><span class="text-bold">Com mais de seis décadas de tradição</span>, o Café Pacaembu continua a ser
                    uma <span class="text-bold">referência</span> no mercado brasileiro, unindo <span
                        class="text-bold">qualidade, inovação e compromisso</span> com a sustentabilidade em seus
                    produtos, reciclando 100% do plástico e papelão utilizados nas embalagens e reutilizando a água da
                    chuva em seu ciclo industrial.</p>
            </div>
        </section>

        <!-- Products Section -->
        <section class="section-pacaembu-products">
            <h2 class="products-title reveal-up">PRODUTOS</h2>

            <div class="products-header-actions">
                <div class="products-filter-wrapper">
                    <div class="products-filter-trigger">
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

                    <div class="products-filter-dropdown">
                        <div class="dropdown-header-line"></div>

                        <div class="filter-option" data-filter="em_grao">
                            <div class="filter-icon">
                                <img src="assets/images/emgrao.svg" alt="Em Grão" style="width: 100%; height: 100%;">
                            </div>
                            <span>EM GRÃO</span>
                        </div>

                        <div class="filter-option" data-filter="torrado_moido">
                            <div class="filter-icon">
                                <img src="assets/images/novasuissa_grao_moido.svg" alt="Torrado e Moído"
                                    style="width: 100%; height: 100%;">
                            </div>
                            <span>TORRADO E MOÍDO</span>
                        </div>

                        <div class="filter-option" data-filter="capsula">
                            <div class="filter-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" style="width: 80%; height: 80%;">
                                    <path d="M6 8L7 6C8 4.5 10 4 12 4C14 4 16 4.5 17 6L18 8" stroke="#5C5B5A"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M5 8H19L17.5 18C17.2 19 15 20 12 20C9 20 6.8 19 6.5 18L5 8Z"
                                        stroke="#5C5B5A" stroke-width="1.5" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <span>CÁPSULA</span>
                        </div>

                        <div class="filter-option" data-filter="instantaneo">
                            <div class="filter-icon">
                                <img src="assets/images/INSTANTANEO.svg" alt="Instantâneo"
                                    style="width: 100%; height: 100%;">
                            </div>
                            <span>INSTANTÂNEO</span>
                        </div>

                        <div class="filter-option" data-filter="filtro">
                            <div class="filter-icon">
                                <img src="assets/images/novasuissa_filtro.svg" alt="Filtro"
                                    style="width: 80%; height: 80%;">
                            </div>
                            <span>FILTRO</span>
                        </div>
                    </div>
                </div>
                <button id="clear-filters-btn" class="clear-filters-btn">LIMPAR FILTROS</button>
            </div>

            <div id="pacaembu-products-grid" class="products-grid reveal-up stagger-children">
                <!-- Products will be loaded here dynamically by pacaembu-products.js -->
            </div>

            <a href="https://www.lojacafepacaembu.com.br/" target="_blank" class="btn-shop-pacaembu">
                <svg class="cart-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1" />
                    <circle cx="20" cy="21" r="1" />
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                </svg>
                ACESSE A LOJA ONLINE
            </a>
        </section>

    </div>

    <!-- Footer -->
<?php
$footer_variant = 'footer-blue';
$page_scripts = ['assets/js/pacaembu-products.js'];
require __DIR__ . '/includes/footer.php';
?>
</body>

</html>
