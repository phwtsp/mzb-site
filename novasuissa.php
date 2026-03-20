<?php require_once __DIR__ . '/includes/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<?php
$page_title = 'Café Nova Suissa | Linha de Cafés MZB Brasil';
require __DIR__ . '/includes/head.php';
?>

    <style>
        /* Nova Suissa Specific Styles */

        /* Hero Section */
        .section-novasuissa-hero {
            position: relative;
            width: 100%;
            height: auto;
            /* Allow image to dictate height */
            padding: 0;
            margin: 0;
            overflow: hidden;
        }

        .novasuissa-hero-img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Intro Section with Background Image */
        .section-novasuissa-intro {
            position: relative;
            width: 100%;
            /* Use the specific background image requested */
            background-image: url('assets/images/novasuissa_mid_bg_fixed.png');
            background-repeat: no-repeat;
            background-position: top center;
            background-size: 100% auto;
            /* Ensure it fits width, height auto */
            background-color: #f2f2f2;
            /* Updated background color */
            /* Set a min-height based on aspect ratio or content, but user emphasized "height total" */
            /* Using aspect-ratio might be good, or padding-bottom hack. 
               1920x800 approx ratio is 2.4:1 -> 41.6% padding top */
            min-height: 0;
            padding-top: 41.5%;
            /* Maintain aspect ratio */

            /* Fallback for layout */
            display: flex;
            align-items: flex-start;
            /* Align text to top/center as needed */
        }

        /* Container for text overlaid on the background */
        .novasuissa-intro-content {
            position: absolute;
            top: 20%;
            /* Adjust based on design */
            left: 10%;
            width: 35%;
            /* Restrict width to the 'yellow' area */
            height: auto;
            color: #fff;
            /* Assuming white text on yellow bg */
            text-align: left;
        }

        .novasuissa-intro-title {
            /* If visual title is in image, hide this. User said "apenas ter o texto em cima" (only text on top). */
            display: none;
        }

        .novasuissa-intro-text {
            font-family: 'Figtree', sans-serif;
            font-size: 1.25rem;
            /* ~20px */
            line-height: 1.5;
            color: #FFFFFF;
            font-weight: 400;
            text-align: left;
            padding-right: 15%;
            /* Spacing from the right side */
        }

        /* Hide layout elements from previous turn */
        .novasuissa-intro-left,
        .novasuissa-intro-right,
        .novasuissa-floating-product,
        .novasuissa-hero-text {
            display: none !important;
        }

        /* Products Section */
        /* Products Section */
        .section-novasuissa-products {
            padding: 80px 20px;
            background-color: #f2f2f2;
            /* Updated background color */
            text-align: center;
        }

        .products-title-ns {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 3rem;
            color: #5C5B5A;
            margin-bottom: 40px;
            text-transform: uppercase;
            font-weight: 400;
        }

        .novasuissa-products-header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto 40px;
            position: relative;
        }

        /* Filter button styling matching Pacaembu */
        .products-filter-ns {
            /* Position absolute right or flex? visual shows title centered, filter right. 
                Let's make a container relative. */
            position: absolute;
            right: 0;
            top: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid #5C5B5A;
            padding: 8px 16px;
            cursor: pointer;
            font-family: 'Figtree', sans-serif;
            font-size: 0.8rem;
            color: #5C5B5A;
            letter-spacing: 1px;
            text-transform: uppercase;
            background: transparent;
        }

        .novasuissa-products-grid {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        .novasuissa-product-card {
            width: 48%;
            /* Two columns */
            max-width: 550px;
            background-color: #fff;
            padding: 40px 30px;
            text-align: center;
            /* Center image */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Centered content */
            transition: all 0.3s ease;
        }

        .novasuissa-product-card:hover {
            background-color: transparent;
            box-shadow: none;
        }

        .novasuissa-product-img {
            max-width: 80%;
            height: auto;
            margin-bottom: 30px;
            object-fit: contain;
        }

        .novasuissa-product-info {
            text-align: left;
            /* Text left aligned inside card as per likely design pattern or center? 
                               Screenshot shows: "LINHA TRADICIONAL" left aligned relative to text block? 
                               Actually looks like EVERYTHING is left aligned relative to the text block, 
                               but the block is centered? Or simply left aligned. 
                               Looking closely at crop 4: Title "LINHA TRADICIONAL" is left aligned with the text below it. 
                               The image is centered above. */
            width: 100%;
        }

        .novasuissa-product-title {
            font-family: 'Figtree', sans-serif;
            font-weight: 800;
            /* ExtraBold */
            font-size: 1.5rem;
            color: #5C5B5A;
            margin-bottom: 15px;
            text-transform: uppercase;
            text-align: left;
        }

        .novasuissa-product-desc {
            font-family: 'Figtree', sans-serif;
            font-size: 0.95rem;
            color: #5C5B5A;
            line-height: 1.6;
            text-align: left;
        }

        .novasuissa-bottom-text {
            max-width: 800px;
            margin: 60px auto 0;
            font-family: 'Figtree', sans-serif;
            font-size: 1rem;
            color: #5C5B5A;
            line-height: 1.6;
            text-align: center;
        }

        @media (max-width: 768px) {
            .novasuissa-product-card {
                width: 100%;
            }

            .products-filter-ns {
                position: static;
                margin: 0 auto 20px;
                width: fit-content;
            }

            .novasuissa-products-header {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            .section-novasuissa-intro {
                background-size: cover;
                background-position: left center;
                padding-top: 100px;
                /* Reset padding hack */
                padding-bottom: 100px;
                height: auto;
            }

            .novasuissa-intro-content {
                position: relative;
                width: 90%;
                left: 5%;
                top: 0;
            }

            /* Ensure filter fits on mobile */
            .products-filter-trigger {
                width: 100%;
                justify-content: space-between;
            }

            .products-filter-dropdown {
                width: 100%;
                max-width: 100%;
            }
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

        .products-filter-trigger svg {
            transition: transform 0.3s ease;
        }

        .products-filter-trigger.active svg {
            transform: rotate(180deg);
        }

        .products-filter-dropdown {
            position: absolute;
            top: 100%;
            /* flush with button */
            right: 0;
            width: 250px;
            /* wider to accommodate text */
            background: #f9f9f9;
            /* match bg color of page or white? Page is #f2f2f2 product section. Dropdown should be distinct maybe white. */
            background-color: #ffffff;
            border: 1px solid #5C5B5A;
            /* box-shadow: 0 5px 15px rgba(0,0,0,0.1); */
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
    </style>
</head>

<body>

<?php
$current_page = 'novasuissa';
require __DIR__ . '/includes/header.php';
?>

    <main>
        <!-- Hero Section -->
        <section class="section-novasuissa-hero">
            <!-- Full width image -->
            <img src="assets/images/novasuissa_hero.png" alt="Nova Suissa Hero" class="novasuissa-hero-img">
        </section>

        <!-- Intro Section -->
        <section class="section-novasuissa-intro">
            <div class="novasuissa-intro-content reveal-up">
                <p class="novasuissa-intro-text">
                    O Café Nova Suíssa é uma marca tradicional de Belo Horizonte, Minas Gerais, com mais de 40 anos de
                    história.
                    <br><br>
                    Foi originada no bairro Nova Suíça, um dos mais emblemáticos da capital mineira, e desde então tem
                    sido sinônimo de qualidade e sabor para os apreciadores de café na região.
                </p>
            </div>

            <!-- Extra Forte product - positioned or hidden if included in BG. 
                 User screenshot shows it. Assuming BG has it? 
                 If I don't see the BG, I should keep this but maybe hide it for now if logic says BG has it.
                 User said "apenas ter o texto em cima" -> suggests removing other elements.
            -->
        </section>

        <!-- Products Section -->
        <section class="section-novasuissa-products">
            <h2 class="products-title-ns reveal-up">PRODUTOS</h2>

            <div class="novasuissa-products-header">
                <!-- Filter Button -->
                <div class="products-filter-wrapper">
                    <div class="products-filter-trigger">
                        <!-- Custom Slider Icon representing 'Filter' similar to design -->
                        <div class="filter-icon-main">
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

                        <div class="filter-option" data-filter="torrado_moido">
                            <div class="filter-icon">
                                <img src="assets/images/novasuissa_grao_moido.svg" alt="Grão e Moído"
                                    style="width: 100%; height: 100%;">
                            </div>
                            <span>GRÃO E MOÍDO</span>
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

            <div id="products-grid" class="novasuissa-products-grid reveal-up stagger-children">
                <!-- Products will be loaded here dynamically -->
            </div>

            <p class="novasuissa-bottom-text">
O portfólio de produtos do Café Nova Suíssa possui diferentes tipos de café torrado e moído, incluindo as opções Tradicional e Extra Forte, ambas comercializadas em embalagens de 500g e 250g.
            </p>
        </section>
    </main>

    <!-- Footer -->
    <?php
$footer_variant = 'footer-blue';
$page_scripts = ['assets/js/novasuissa-products.js'];
require __DIR__ . '/includes/footer.php';
?>
</body>

</html>