<?php require_once __DIR__ . '/includes/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<?php
$page_title = 'Tradição, Grão da Terra e Itambé | Marcas MZB Brasil';
require __DIR__ . '/includes/head.php';
?>

    <style>
        /* PROPRIETARY PAGE STYLES */
        body {
            background-color: #f2f2f2;
            /* Exact color from export */
            overflow-x: hidden;
        }

        main {
            padding-top: 0;
        }

        /* Typography */
        h2.brand-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 40px;
            font-style: italic;
            color: #5C5B5A;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .section-title-products {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-style: italic;
            color: #5C5B5A;
            text-align: center;
            margin: 40px 0;
            text-transform: uppercase;
        }

        .text-content {
            font-family: 'Figtree', sans-serif;
            font-size: 18px;
            line-height: 1.6;
            color: #5C5B5A;
        }

        /* Cards */
        .product-card {
            background: #fff;
            border: 1px solid #eee;
            padding: 30px;
            text-align: left;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Specific Layouts */
        .tig-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* HERO SECTION */
        .hero-tig {
            width: 100%;
            overflow: hidden;
            margin-bottom: 60px;
        }

        .hero-tig img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* TRADICAO SECTION */
        .tradicao-section {
            margin-bottom: 100px;
        }

        .tradicao-intro {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 60px;
            margin-bottom: 60px;
            flex-wrap: wrap;
        }

        .tradicao-text-block {
            max-width: 400px;
        }

        .tradicao-logo {
            max-width: 300px;
            margin-bottom: 30px;
        }

        .tradicao-trio-img {
            max-width: 600px;
            width: 100%;
        }

        /* Product Grid */
        .products-grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 40px;
        }

        .card-img {
            height: 300px;
            object-fit: contain;
            margin-bottom: 25px;
        }

        .card-title {
            font-family: 'Figtree', sans-serif;
            font-weight: 800;
            font-size: 20px;
            color: #5C5B5A;
            margin-bottom: 15px;
            align-self: flex-start;
        }

        .card-desc {
            font-family: 'Figtree', sans-serif;
            font-size: 16px;
            color: #5C5B5A;
            line-height: 1.5;
            align-self: flex-start;
        }

        /* GRAO DA TERRA SECTION */
        .grao-section {
            background-color: #fff;
            padding: 80px 0;
            margin-bottom: 100px;
        }

        .grao-content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        /* Left Col */
        .grao-left-col {
            padding-right: 20px;
        }

        .grao-logo {
            width: 280px;
            margin-bottom: 40px;
            display: block;
        }

        /* Right Col (Product Box) */
        .grao-product-box {
            background-color: #f2f2f2;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* Align text left */
            justify-content: center;
            height: 100%;
        }

        .grao-prod-img {
            width: 100%;
            max-width: 350px;
            height: auto;
            margin: 0 auto 30px auto;
            /* Center image horizontally in box */
            display: block;
        }

        .grao-prod-info {
            width: 100%;
        }

        @media (max-width: 768px) {
            .grao-content-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .grao-left-col {
                padding-right: 0;
                text-align: center;
            }

            .grao-logo {
                margin: 0 auto 30px auto;
            }

            .grao-product-box {
                align-items: center;
                text-align: center;
            }
        }

        /* ITAMBE SECTION */
        .itambe-section {
            padding-bottom: 100px;
        }

        .itambe-content {
            display: flex;
            align-items: center;
            gap: 60px;
            flex-wrap: wrap;
            margin-bottom: 60px;
        }

        .itambe-img-col {
            flex: 1;
            min-width: 300px;
        }

        .itambe-text-col {
            flex: 1;
            min-width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Mobile Adjustments */
        @media (max-width: 768px) {
            main {
                padding-top: 80px;
            }

            .tradicao-intro,
            .grao-content,
            .itambe-content {
                flex-direction: column;
                text-align: center;
                gap: 40px;
            }

            .card-title,
            .card-desc {
                align-self: center;
                text-align: center;
            }

            .tradicao-logo {
                margin: 0 auto 30px auto;
            }

            .itambe-content {
                flex-direction: column-reverse;
            }
        }

        /* FILTERS (Similar to Segafredo) */
        .itambe-products-filter {
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
            min-width: 250px;
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

        .filter-icon img {
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
$current_page = 'tradicao_itambe_grao';
require __DIR__ . '/includes/header.php';
?>

    <main>

        <!-- HERO -->
        <section class="hero-tig">
            <!-- Using the hero image mapped from aad.png -->
            <img src="assets/images/tig_tradicao_hero.png" alt="Tradição, Grão da Terra e Itambé">
        </section>

        <div class="tig-container">

            <!-- TRADIÇÃO BRAND -->
            <section id="tradicao" class="tradicao-section">
                <div class="tradicao-intro reveal-up">
                    <div class="tradicao-text-block">
                        <img src="assets/images/tig_tradicao_logo.png" alt="Café Tradição" class="tradicao-logo">
                        <p class="text-content">
                            O Café Tradição é uma marca voltada para consumidores que apreciam um café de sabor mais
                            intenso e encorpado.
                        </p>
                    </div>
                    <div class="tradicao-trio-img">
                        <img src="assets/images/tig_tradicao_intro.png" alt="Linha Tradição" style="width:100%">
                    </div>
                </div>

                <h2 class="section-title-products">PRODUTOS</h2>

                <div class="products-grid-2 reveal-up stagger-children">
                    <!-- Tradicional -->
                    <div class="product-card">
                        <img src="assets/images/tig_tradicao_prod_trad.png" alt="Tradição Tradicional" class="card-img">
                        <div class="card-title">LINHA TRADICIONAL</div>
                        <div class="card-desc">
                            Blend de café encorpado, aromático e equilibrado, com torra média e predominância de grãos
                            Arábica. Ideal para o consumo diário.
                        </div>
                    </div>
                    <!-- Extraforte -->
                    <div class="product-card">
                        <img src="assets/images/tig_tradicao_prod_extra.png" alt="Tradição Extraforte" class="card-img">
                        <div class="card-title">LINHA EXTRAFORTE</div>
                        <div class="card-desc">
                            Variante do café tradicional, com maior intensidade e sabor marcante.
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <!-- GRÃO DA TERRA BRAND -->
        <section id="grao-da-terra" class="grao-section">
            <div class="tig-container">
                <div class="grao-content-grid reveal-up">
                    <!-- Left Column: Text & Logo -->
                    <div class="grao-left-col">
                        <img src="assets/images/home_logo_graodaterra.png" alt="Café Grão da Terra" class="grao-logo">

                        <div class="grao-text-wrapper">
                            <p class="text-content">
                                O Café Grão da Terra possui cafés feitos com um blend desenvolvido para atender às
                                preferências específicas dos consumidores, destacando-se por sua acidez intensa.
                            </p>
                            <br>
                            <p class="text-content">
                                Seus cafés preservam seu sabor distintivo, aroma e pureza graças a uma cuidadosa seleção
                                de grãos (com predominância de grãos arábica), combinadas em um processo de torra média.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column: Product Box (Grey Background) -->
                    <div class="grao-right-col">
                        <div class="grao-product-box">
                            <!-- Image Trio -->
                            <img src="assets/images/tig_grao_prod.png" alt="Grão da Terra Linha Tradicional"
                                class="grao-prod-img">

                            <div class="grao-prod-info">
                                <div class="card-title">LINHA TRADICIONAL</div>
                                <div class="card-desc">
                                    Café torrado para o consumo diário, com sabor marcante e consistente, que se encaixa
                                    na sua rotina. Fácil de preparar e com um sabor familiar, é perfeito para quem busca
                                    uma xícara de café confiável a qualquer momento.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ITAMBÉ BRAND -->
        <div class="tig-container">
            <section id="itambe" class="itambe-section">
                <div class="itambe-content reveal-up">
                    <div class="itambe-img-col">
                        <img src="assets/images/tig_itambe_hero.png" alt="Café Itambé">
                    </div>
                    <div class="itambe-text-col" style="text-align: center;">
                        <img src="assets/images/aby.png" alt="Café Itambé"
                            style="width: 320px; margin-bottom: 30px; align-self:center;">

                        <p class="text-content">
                            O Café Itambé é produzido a partir de uma seleção criteriosa de grãos, resultando em uma
                            bebida de alta qualidade destinada a consumidores exigentes.
                        </p>
                        <br>
                        <p class="text-content">
                            Seus produtos podem ser preparados em diversos tipos de máquinas de filtro e cafeteiras
                            domésticas, oferecendo versatilidade no preparo.
                        </p>
                    </div>
                </div>

                <h2 class="section-title-products">PRODUTOS</h2>

                <!-- Type Filter -->
                <div class="itambe-products-filter">
                    <div class="products-filter-wrapper">
                        <div class="products-filter-trigger" id="filter-tipo-trigger">
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

                        <div class="products-filter-dropdown" id="filter-tipo-dropdown">
                            <div class="dropdown-header-line"></div>
                            <div class="filter-option" data-filter="em_grao">
                                <div class="filter-icon">
                                    <img src="assets/images/emgrao.svg" alt="Em Grão">
                                </div>
                                <span>EM GRÃO</span>
                            </div>
                            <div class="filter-option" data-filter="torrado_moido">
                                <div class="filter-icon">
                                    <img src="assets/images/novasuissa_grao_moido.svg" alt="Torrado e Moído">
                                </div>
                                <span>TORRADO E MOÍDO</span>
                            </div>
                        </div>
                    </div>
                    <button id="clear-filters-btn" class="clear-filters-btn">LIMPAR FILTROS</button>
                </div>

                <div class="products-grid-2 reveal-up stagger-children" id="itambe-products-grid">
                      <!-- Grão 1kg -->
                    <div class="product-card" data-type="em_grao">
                        <img src="assets/images/tig_itambe_prod_grao1kg.png" alt="Itambé Tradicional" class="card-img">
                        <div class="card-title">CAFÉ ITAMBÉ GRÃO 1 KG</div>
                        <div class="card-desc">
                            Um café versátil, com sabor aromático e suave, indicado para preparo em espresso. Forte presença nos canais de food service.
                        </div>
                    </div>
                    <!-- Tradicional -->
                    <div class="product-card" data-type="torrado_moido">
                        <img src="assets/images/tig_itambe_prod_trad.png" alt="Itambé Tradicional" class="card-img">
                        <div class="card-title">CAFÉ ITAMBÉ TRADICIONAL TORRADO E MOÍDO - 500 G</div>
                        <div class="card-desc">
                            Torra tradicional para uso doméstico, indicada para preparo em café filtrado ou coado.
                        </div>
                    </div>
                    <!-- Extraforte -->
                    <div class="product-card" data-type="torrado_moido">
                        <img src="assets/images/tig_itambe_prod_extra.png" alt="Itambé Extraforte" class="card-img">
                        <div class="card-title">CAFÉ ITAMBÉ EXTRAFORTE TORRADO E MOÍDO - 500 G</div>
                        <div class="card-desc">
                            Torra de maior intensidade para uso doméstico, indicada para preparo em café filtrado ou
                            coado.
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main>

    <?php
$footer_variant = '';
$page_scripts = [];
require __DIR__ . '/includes/footer.php';
?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterTrigger = document.getElementById('filter-tipo-trigger');
            const filterDropdown = document.getElementById('filter-tipo-dropdown');
            const filterOptions = document.querySelectorAll('.filter-option');
            const clearBtn = document.getElementById('clear-filters-btn');
            const productCards = document.querySelectorAll('#itambe-products-grid .product-card');
            const currentFilterLabel = document.querySelector('.current-filter-label');

            if (!filterTrigger) return;

            // Toggle Dropdown
            filterTrigger.addEventListener('click', function(e) {
                e.stopPropagation();
                this.classList.toggle('active');
                filterDropdown.classList.toggle('show');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function() {
                filterTrigger.classList.remove('active');
                filterDropdown.classList.remove('show');
            });

            // Handle Filter Selection
            filterOptions.forEach(option => {
                option.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const filterValue = this.getAttribute('data-filter');
                    
                    // Update UI
                    filterOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                    currentFilterLabel.textContent = this.querySelector('span').textContent;
                    clearBtn.classList.add('show');
                    
                    // Filter Products
                    productCards.forEach(card => {
                        if (card.getAttribute('data-type') === filterValue) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    // Close Dropdown
                    filterTrigger.classList.remove('active');
                    filterDropdown.classList.remove('show');
                });
            });

            // Clear Filters
            clearBtn.addEventListener('click', function() {
                filterOptions.forEach(opt => opt.classList.remove('active'));
                currentFilterLabel.textContent = 'FILTRAR TIPO';
                this.classList.remove('show');
                
                productCards.forEach(card => {
                    card.style.display = 'flex';
                });
            });
        });
    </script>
</body>

</html>