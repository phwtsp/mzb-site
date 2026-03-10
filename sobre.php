<?php require_once __DIR__ . '/includes/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<?php
$page_title = 'Sobre a MZB Brasil | História e Tradição em Café';
require __DIR__ . '/includes/head.php';
?>
</head>

<body>

<?php
$current_page = 'sobre';
require __DIR__ . '/includes/header.php';
?>

    <main class="about-page-content">
        <!-- 1. HERO SECTION -->
        <section class="about-hero-section">
            <div class="hero-image-wrapper">
                <img src="assets/images/aak.png" alt="História da Empresa" class="hero-img-cover">
                <div class="hero-text-overlay hero-animate">
                    <h1><em><strong>História</strong> da Empresa</em></h1>
                    <p>A Massimo Zanetti Beverage Group é uma das empresas mais importantes do mundo em produção,
                        processamento e comercialização de café torrado em grãos e café torrado e moído, oferecendo
                        qualidade de alto nível em todo o mundo.</p>
                </div>
            </div>
        </section>

        <!-- 2. HISTORY SECTION (Images Left, Text Right) -->
        <section class="history-section">
            <div class="history-bg-block"></div>
            <div class="container history-grid">
                <!-- Left: Images -->
                <div class="history-images-col reveal-left">
                    <div class="img-container img-top">
                        <img src="assets/images/abo.png" alt="Sacks of Coffee">
                        <div class="circle-left-overlap"></div>
                    </div>
                    <div class="img-container img-bottom">
                        <img src="assets/images/abs.png" alt="Coffee Plantation">
                    </div>

                </div>

                <!-- Right: Text -->
                <div class="history-text-col reveal-right">
                    <p>
                        Fundada e presidida por Massimo Zanetti, a holding é composta por uma grande rede de marcas, que
                        está em constante e rápido crescimento a nível global. O grupo conta com uma ampla variedade de
                        produtos: do café ao chá e do cacau às especiarias.
                    </p>
                    <br>
                    <p>
                        O core business do grupo é representado pelo café em todas as suas formas e expressões, portanto
                        todas as empresas que o compõem desempenham um papel fundamental em cada fase do ciclo de vida
                        do café desde a aquisição da matéria-prima, torrefação, industrialização e comercialização.
                    </p>
                </div>
            </div>
        </section>

        <!-- 3. GLOBAL STRUCTURE -->
        <section class="structure-section" id="estrutura-global">
            <div class="container structure-header reveal-up">
                <h2>ESTRUTURA <strong>GLOBAL</strong></h2>
                <p>Uma holding que reúne tradição e inovação, com presença consolidada em diferentes
                    continentes.<br><strong>Fundada por Massimo Zanetti, a MZB faz parte de um dos maiores grupos de
                        café do
                        mundo.</strong></p>
            </div>

            <div class="container stats-row reveal-up stagger-children">
                <div class="stat-box">
                    <span class="stat-num">110</span>
                    <span class="stat-label">países</span>
                    <p>Presente em 110 países, levando o café italiano para diferentes culturas e paladares.</p>
                </div>
                <div class="stat-box">
                    <span class="stat-num">40</span>
                    <span class="stat-label">marcas</span>
                    <p>40 marcas que atendem desde o consumo em casa até cafeterias e grandes redes de distribuição.</p>
                </div>
                <div class="stat-box">
                    <span class="stat-num">3 mil</span>
                    <span class="stat-label">colaboradores</span>
                    <p>Mais de 3 mil colaboradores que compartilham da mesma paixão pelo café.</p>
                </div>
            </div>

            <!-- Map -->
            <div class="structure-map-container reveal-scale">
                <img src="assets/images/MAPA.jpg" alt="Mapa Global" class="map-img">
            </div>
        </section>

        <!-- 4. VALUES / QUALITY (Blue Section) -->
        <section class="mvq-blue-section">
            <div class="mvq-divider-img">
                <img src="assets/images/aaq.png" alt="Divider">
            </div>

            <div class="mvq-grid-layout reveal-up">
                <!-- Left Content -->
                <div class="mvq-left-content">
                    <!-- Top Row: Mission & Vision -->
                    <div class="mvq-top-row">
                        <div class="mvq-box outlined">
                            <h3>Nossa<br><strong>Missão</strong></h3>
                            <p>Nosso objetivo é levar nossos cafés, em todas as suas formas, com a qualidade e o serviço
                                que nos definem, para pessoas ao redor do mundo.</p>
                        </div>
                        <div class="mvq-box outlined">
                            <h3>Nossa<br><strong>Visão</strong></h3>
                            <p>Transformar os clientes em parceiros de negócios, entendendo suas necessidades e
                                entregando o melhor de nossos produtos e serviços.</p>
                        </div>
                    </div>

                    <!-- Bottom Row: Quality -->
                    <div class="mvq-bottom-row">
                        <div class="mvq-box wide outlined">
                            <h3>Comprometimento com<br><strong>a qualidade</strong></h3>
                            <p>Na MZB Brasil, qualidade é o nosso compromisso diário.</p>
                            <p>Buscamos o desenvolvimento sustentável por meio da melhoria contínua de produtos,
                                processos e pessoas, com o objetivo de entregar um café de excelência.</p>
                            <p>Cada etapa do nosso trabalho é pensada para garantir a satisfação de todas as partes
                                interessadas, promovendo valor de forma ética, eficiente e duradoura.</p>
                        </div>
                    </div>
                </div>

                <!-- Right Content: Image -->
                <div class="mvq-right-image">
                    <!-- Cup Image Overflows Up -->
                    <img src="assets/images/fileteabg.png" alt="Coffee Cup" class="cup-overflow-img">
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php
$footer_variant = 'footer-blue';
$page_scripts = [];
require __DIR__ . '/includes/footer.php';
?>
</body>

</html>