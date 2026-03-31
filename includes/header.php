<?php
declare(strict_types=1);

$currentPage = isset($current_page) && is_string($current_page) ? $current_page : '';

$isAboutSection = in_array($currentPage, ['sobre', 'sustentabilidade'], true);
$isBrandsSection = in_array($currentPage, ['marcas', 'segafredo', 'pacaembu', 'novasuissa', 'tradicao_itambe_grao'], true);
$isServicesSection = in_array($currentPage, ['exportacao'], true);

$estruturaLink = $currentPage === 'sobre' ? '#estrutura-global' : 'sobre#estrutura-global';
$certificacoesLink = $currentPage === 'sustentabilidade' ? '#certificacoes' : 'sustentabilidade#certificacoes';

$whiteLogoPages = ['sobre', 'pacaembu', 'novasuissa'];
$menuLogo = in_array($currentPage, $whiteLogoPages, true) ? 'assets/images/Logo_Menu.png' : 'assets/images/add.png';
?>
<!-- Header Layout: White Bar with Center Blue Logo Box -->
<header class="header">
    <div class="header-inner">
        <!-- Left: Navigation -->
        <nav class="nav-left">
            <ul>
                <li><a href="/" class="nav-item<?= $currentPage === 'index' ? ' active' : '' ?>">HOME</a></li>
                <li class="has-submenu">
                    <a href="sobre" class="nav-item<?= $isAboutSection ? ' active' : '' ?>">SOBRE NÓS</a>
                    <button class="submenu-toggle" aria-label="Toggle Submenu">
                        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $estruturaLink ?>" class="nav-item">ESTRUTURA GLOBAL</a></li>
                        <li><a href="sustentabilidade" class="nav-item<?= $currentPage === 'sustentabilidade' ? ' active' : '' ?>">SUSTENTABILIDADE</a></li>
                        <li><a href="<?= $certificacoesLink ?>" class="nav-item">CERTIFICAÇÕES</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="marcas" class="nav-item<?= $isBrandsSection ? ' active' : '' ?>">NOSSAS MARCAS</a>
                    <button class="submenu-toggle" aria-label="Toggle Submenu">
                        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="segafredo" class="nav-item<?= $currentPage === 'segafredo' ? ' active' : '' ?>">SEGAFREDO ZANETTI</a></li>
                        <li><a href="pacaembu" class="nav-item<?= $currentPage === 'pacaembu' ? ' active' : '' ?>">CAFÉ PACAEMBU</a></li>
                        <li><a href="novasuissa" class="nav-item<?= $currentPage === 'novasuissa' ? ' active' : '' ?>">NOVA SUISSA</a></li>
                        <li><a href="tradicao_itambe_grao#itambe" class="nav-item">CAFÉ ITAMBÉ</a></li>
                        <li><a href="tradicao_itambe_grao#tradicao" class="nav-item">CAFÉ TRADIÇÃO</a></li>
                        <li><a href="tradicao_itambe_grao#grao-da-terra" class="nav-item">CAFÉ GRÃO DA TERRA</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#" class="nav-item<?= $isServicesSection ? ' active' : '' ?>">PARA EMPRESAS</a>
                    <button class="submenu-toggle" aria-label="Toggle Submenu">
                        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="exportacao" class="nav-item<?= $currentPage === 'exportacao' ? ' active' : '' ?>">EXPORTAÇÃO</a></li>
                        <li><a href="marcas#food-service" class="nav-item">FOOD SERVICE</a></li>
                        <li><a href="marcas#private-label" class="nav-item">PRIVATE LABEL</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Center: Logo (Blue Box) -->
        <div class="logo-box">
            <a href="/" aria-label="MZB Brasil - Home">
                <img src="<?= htmlspecialchars($menuLogo, ENT_QUOTES, 'UTF-8') ?>" alt="MZB Brasil">
            </a>
        </div>

        <!-- Right: Contact -->
        <div class="contact-right">
            <a href="contato" class="btn-contact">CONTATO</a>
            <ul class="contact-dropdown">
                <li><a href="trabalhe_conosco">TRABALHE CONOSCO</a></li>
            </ul>
        </div>

        <!-- Mobile Toggle -->
        <button class="menu-toggle" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>
