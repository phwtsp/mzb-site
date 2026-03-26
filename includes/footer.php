<?php
declare(strict_types=1);

$footerVariant = isset($footer_variant) && is_string($footer_variant) ? trim($footer_variant) : '';
$footerClass = 'footer' . ($footerVariant !== '' ? ' ' . $footerVariant : '');

$pageScripts = [];
if (isset($page_scripts) && is_array($page_scripts)) {
    $pageScripts = $page_scripts;
}

$currentPage = isset($current_page) && is_string($current_page) ? $current_page : '';
$whiteFooterLogoPages = ['sobre', 'pacaembu', 'novasuissa'];
$footerLogo = in_array($currentPage, $whiteFooterLogoPages, true) ? 'assets/images/Logo_Menu.png' : 'assets/images/01_MZB_logo01.webp';
?>
<!-- Footer -->
<footer class="<?= htmlspecialchars($footerClass, ENT_QUOTES, 'UTF-8') ?>">
    <div class="footer-container">
        <div class="copyright">
            <p>@<span class="current-year">2025</span> Massimo Zanetti Beverage Brasil.</p>
            <p class="rights">Todos os direitos reservados.</p>
        </div>
        <div class="footer-center">
            <img src="<?= htmlspecialchars($footerLogo, ENT_QUOTES, 'UTF-8') ?>" alt="MZB">
        </div>
        <div class="footer-right">
            <a href="contato" class="btn-contact-footer">CONTATO</a>
        </div>
    </div>
</footer>

<script src="<?= htmlspecialchars(asset('assets/js/script.js'), ENT_QUOTES, 'UTF-8') ?>" defer></script>
<script src="<?= htmlspecialchars(asset('assets/js/performance.js'), ENT_QUOTES, 'UTF-8') ?>" defer></script>
<?php foreach ($pageScripts as $scriptPath): ?>
<?php if (is_string($scriptPath) && trim($scriptPath) !== ''): ?>
<script src="<?= htmlspecialchars(asset($scriptPath), ENT_QUOTES, 'UTF-8') ?>" defer></script>
<?php endif; ?>
<?php endforeach; ?>
