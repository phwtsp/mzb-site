<?php require_once __DIR__ . '/includes/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<?php
$page_title = 'Marcas e Soluções em Café | MZB Brasil';
require __DIR__ . '/includes/head.php';
?>
</head>

<body>

<?php
$current_page = 'marcas';
require __DIR__ . '/includes/header.php';
?>

    <main class="marcas-page-content">

        <!-- 1. HERO SECTION -->
        <section class="about-hero-section products-hero">
            <div class="hero-image-wrapper">
                <img src="assets/images/aaf.png" alt="Nossos Produtos" class="hero-img-cover">
                <div class="hero-text-overlay hero-animate">
                    <h1><em>Nossos <strong>produtos</strong></em></h1>
                </div>
            </div>
        </section>

        <!-- 2. FOOD SERVICE INTRO -->
        <section class="section-food-service-intro" id="food-service">
            <div class="container text-center reveal-up">
                <h2 class="script-title">Food Service</h2>
                <div class="intro-description">
                    <p><strong>Soluções completas em café para o seu negócio.</strong></p>
                    <p>Nosso serviço Foodservice foi desenvolvido para atender bares, restaurantes, cafeterias, hotéis e
                        outros estabelecimentos que desejam oferecer aos seus clientes uma experiência de café de alta
                        qualidade.</p>
                    <p>Mais do que um produto, entregamos soluções completas, que unem sabor, praticidade e suporte
                        técnico especializado.</p>
                </div>
            </div>
        </section>

        <!-- 3. FOOD SERVICE IMAGES GRID -->
        <section class="section-food-service-images">
            <div class="fs-grid reveal-up stagger-children">
                <!-- Left: Barista/Machine -->
                <div class="fs-item">
                    <img src="assets/images/acb.png" alt="Barista">
                </div>
                <!-- Right: Pouring/Experience -->
                <div class="fs-item">
                    <img src="assets/images/acc.png" alt="Espresso Experience">
                </div>
            </div>
        </section>

        <!-- 4. EXCELLENCE (Dark) -->
        <section class="section-excellence"
            style="background-image: url('assets/images/aay.png'); background-size: cover; background-position: center;">
            <div class="container text-center reveal">
                <h2 class="uppercase-title light">CAFÉ COM PADRÃO DE <strong>EXCELÊNCIA</strong></h2>
                <p class="excellence-desc light">
                    Oferecemos o mesmo café que carrega o nome da nossa marca — reconhecido pela qualidade, aroma e
                    sabor marcante. Cada grão é selecionado e torrado com precisão, garantindo uma bebida consistente e
                    memorável em qualquer ocasião.
                </p>

                <div class="products-showcase">
                    <!-- Right: Product Bags (aay) -->
                    <div class="showcase-item">
                        <img src="assets/images/acg.png" alt="Linha Segafredo" class="product-bags-img">
                    </div>
                    <!-- Right: Logo (acj) -->
                    <div class="showcase-item">
                        <img src="assets/images/acj.png" alt="Segafredo Zanetti" class="segafredo-logo">
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. MACHINERY -->
        <section class="section-machinery">
            <div class="container machinery-grid reveal-up">
                <div class="machinery-text">
                    <h2 class="uppercase-title text-right">MAQUINÁRIO<br><strong>PROFISSIONAL</strong></h2>
                    <p>
                        Disponibilizamos <strong>equipamentos de café profissionais</strong>, ideais para diferentes
                        volumes de consumo e tipos de preparo.
                    </p>
                    <p>
                        Além disso, nossa equipe técnica cuida de <strong>toda a instalação, manutenção preventiva e
                            corretiva</strong>, para que o seu negócio funcione sem interrupções e com a máxima
                        performance.
                    </p>
                </div>
                <div class="machinery-image">
                    <img src="assets/images/acn.png" alt="Máquina de Café Profissional">
                </div>
            </div>
        </section>

        <!-- 6. MORE THAN COFFEE (Woman Drinking) -->
        <section class="section-more-than-coffee">
            <div class="full-width-image-container">
                <img src="assets/images/aco.png" alt="Mais do que café" class="bg-img-cover">

                <div class="overlay-box-blue reveal-right">
                    <h2 class="uppercase-title white"><strong></strong>MAIS DO QUE</strong> CAFÉ</h2>
                    <p>
                        Com o mesmo cuidado e identidade da nossa marca, oferecemos também <strong>sachês de açúcar
                            personalizados</strong> e <strong>xícaras exclusivas</strong>, que complementam a
                        experiência e reforçam a presença da marca na rotina dos seus clientes.
                    </p>
                </div>
            </div>
        </section>

        <!-- 7. PARTNER -->
        <section class="section-partner">
            <div class="container text-center reveal-up">
                <h2 class="uppercase-title">SEU PARCEIRO EM <strong>TODAS AS ETAPAS</strong></h2>
                <p>Do fornecimento do café à manutenção do maquinário, estamos ao seu lado em cada detalhe. <br>Nosso
                    objetivo é garantir que <strong>cada xícara servida reflita a qualidade, o cuidado e a tradição da
                        nossa marca.</strong></p>
            </div>
        </section>

        <!-- 8. PRIVATE LABEL -->
        <section class="section-private-label" id="private-label">
            <div class="container">
                <h2 class="script-title text-center blue">Private Label</h2>
                <p class="text-center pl-intro">
                    O Private Label é um dos core business da MZB Brasil. Somos especialistas em auxiliar grandes marcas
                    e grandes players de mercado, nacionais e internacionais a aumentar o seu mix de produtos sem
                    investir em sua própria capacidade produtiva.
                </p>

            </div>
            <div class="pl-full-width-container reveal-up">
                <div class="pl-content-wrapper">
                    <div class="pl-text-box">
                        <p>No Brasil, assim como em todo o mundo, somos referência quando o assunto é tecnologia, pois
                            nosso processo de produção é minuciosamente gerenciado por um sistema integrado, trazendo
                            ainda mais controle, desde a entrada da matéria-prima até o produto final em um parque
                            industrial altamente estruturado.</p>
                        <p>Todas essas garantias, são testadas e confirmadas pela Certificação ISO 9001/2015. Com nossa
                            expertise em torrefação e moagem de café, produzimos cafés de alta qualidade para empresas
                            que desejam lançar ou fortalecer suas próprias marcas no mercado.</p>
                        <p>Do desenvolvimento do blend à embalagem final, cuidamos de cada etapa da produção para
                            garantir que cada cliente tenha um produto único, alinhado ao seu posicionamento e
                            público-alvo.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 9. MAIN BRANDS -->
        <section class="section-main-brands">
            <div class="container text-center reveal-scale">
                <h2 class="script-title blue">Principais marcas</h2>
                <div class="brands-row">
                    <img src="assets/images/aca.png" alt="Principais Marcas" class="brands-img">
                </div>
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