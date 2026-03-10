<?php
declare(strict_types=1);

$pageTitle = isset($page_title) && is_string($page_title) && trim($page_title) !== ''
    ? trim($page_title)
    : 'MZB Brasil';

$headExtraLinks = isset($head_extra_links) && is_array($head_extra_links)
    ? $head_extra_links
    : [];

$siteBaseUrlRaw = MZB_SITE_CONFIG['site_url'] ?? 'https://www.mzb.com.br';
$siteBaseUrl = is_string($siteBaseUrlRaw) && trim($siteBaseUrlRaw) !== ''
    ? rtrim(trim($siteBaseUrlRaw), '/')
    : 'https://www.mzb.com.br';

$currentScript = basename((string) ($_SERVER['SCRIPT_NAME'] ?? 'index.php'));

$seoPages = [
    'index.php' => [
        'path' => '/',
        'description' => 'MZB Brasil: indústria cafeeira com marcas reconhecidas, soluções para food service, private label, exportação e compromisso com qualidade e sustentabilidade.',
        'image' => '/assets/images/HEADER_Segafredo.jpg',
    ],
    'sobre.php' => [
        'path' => '/sobre',
        'description' => 'Conheça a história da MZB Brasil, integrante do Massimo Zanetti Beverage Group, referência em torrefação, moagem e inovação no mercado de café.',
        'image' => '/assets/images/aak.png',
    ],
    'marcas.php' => [
        'path' => '/marcas',
        'description' => 'Descubra as marcas e linhas de produtos da MZB Brasil para varejo, food service e private label, com qualidade e consistência em cada xícara.',
        'image' => '/assets/images/aaf.png',
    ],
    'segafredo.php' => [
        'path' => '/segafredo',
        'description' => 'Conheça a linha Segafredo Zanetti no Brasil, com tradição italiana, blends selecionados e soluções completas para diferentes perfis de consumo.',
        'image' => '/assets/images/segafredo_hero_new.jpg',
    ],
    'pacaembu.php' => [
        'path' => '/pacaembu',
        'description' => 'Explore a linha Café Pacaembu da MZB Brasil, com opções em grão, moído, cápsulas e soluções para consumo doméstico e profissional.',
        'image' => '/assets/images/pacaembu_abc.png',
    ],
    'novasuissa.php' => [
        'path' => '/novasuissa',
        'description' => 'Conheça os produtos Café Nova Suissa da MZB Brasil, com tradição, qualidade e variedade para diferentes momentos e métodos de preparo.',
        'image' => '/assets/images/novasuissa_hero.png',
    ],
    'tradicao_itambe_grao.php' => [
        'path' => '/tradicao_itambe_grao',
        'description' => 'Conheça as linhas Tradição, Grão da Terra e Itambé da MZB Brasil, com portfólio diversificado para varejo e consumidores de todo o país.',
        'image' => '/assets/images/tig_tradicao_hero.png',
    ],
    'exportacao.php' => [
        'path' => '/exportacao',
        'description' => 'Exportação de café brasileiro com padrão internacional: a MZB Brasil conecta qualidade, escala produtiva e logística para mercados globais.',
        'image' => '/assets/images/header_exportacao.jpg',
    ],
    'sustentabilidade.php' => [
        'path' => '/sustentabilidade',
        'description' => 'Saiba como a MZB Brasil aplica práticas sustentáveis e responsabilidade socioambiental em toda a cadeia do café, do campo ao consumidor.',
        'image' => '/assets/images/sustentabilidade/hero_sustentabilidade.jpg',
    ],
    'contato.php' => [
        'path' => '/contato',
        'description' => 'Entre em contato com a MZB Brasil para dúvidas, informações comerciais e oportunidades de parceria em soluções de café para diferentes canais.',
        'image' => '/assets/images/header_contato.jpg',
    ],
    'trabalhe_conosco.php' => [
        'path' => '/trabalhe_conosco',
        'description' => 'Trabalhe conosco na MZB Brasil. Veja oportunidades e envie seu currículo para fazer parte de uma das maiores indústrias de café do país.',
        'image' => '/assets/images/header_trabalhe_conosco.jpg',
    ],
];

$seoData = $seoPages[$currentScript] ?? [];
$defaultDescription = 'MZB Brasil: qualidade, inovação e tradição na indústria de café, com marcas reconhecidas no mercado nacional e internacional.';

$metaDescription = isset($meta_description) && is_string($meta_description) && trim($meta_description) !== ''
    ? trim($meta_description)
    : (is_string($seoData['description'] ?? null) ? (string) $seoData['description'] : $defaultDescription);

$metaRobots = isset($meta_robots) && is_string($meta_robots) && trim($meta_robots) !== ''
    ? trim($meta_robots)
    : 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1';

$canonicalPath = isset($canonical_path) && is_string($canonical_path) && trim($canonical_path) !== ''
    ? trim($canonical_path)
    : (is_string($seoData['path'] ?? null) ? (string) $seoData['path'] : ($currentScript === 'index.php' ? '/' : '/' . str_replace('.php', '', $currentScript)));

if ($canonicalPath === '') {
    $canonicalPath = '/';
}

if ($canonicalPath[0] !== '/') {
    $canonicalPath = '/' . $canonicalPath;
}

$canonicalUrl = isset($canonical_url) && is_string($canonical_url) && trim($canonical_url) !== ''
    ? trim($canonical_url)
    : $siteBaseUrl . ($canonicalPath === '/' ? '/' : rtrim($canonicalPath, '/'));
$defaultLocaleUrl = $siteBaseUrl . '/';

$ogImagePath = isset($meta_image) && is_string($meta_image) && trim($meta_image) !== ''
    ? trim($meta_image)
    : (is_string($seoData['image'] ?? null) ? (string) $seoData['image'] : '/assets/images/Logo_Menu.png');

$ogImageUrl = preg_match('#^https?://#i', $ogImagePath)
    ? $ogImagePath
    : $siteBaseUrl . '/' . ltrim($ogImagePath, '/');

$organizationSchema = [
    '@type' => 'Organization',
    '@id' => $siteBaseUrl . '/#organization',
    'name' => 'MZB Brasil',
    'url' => $siteBaseUrl . '/',
    'logo' => [
        '@type' => 'ImageObject',
        'url' => $siteBaseUrl . '/assets/images/Logo_Menu.png',
    ],
    'description' => 'Indústria de torrefação e moagem de café com atuação nacional e internacional.',
];

$websiteSchema = [
    '@type' => 'WebSite',
    '@id' => $siteBaseUrl . '/#website',
    'name' => 'MZB Brasil',
    'url' => $siteBaseUrl . '/',
    'inLanguage' => 'pt-BR',
    'publisher' => [
        '@id' => $siteBaseUrl . '/#organization',
    ],
];

$webpageSchema = [
    '@type' => 'WebPage',
    '@id' => $canonicalUrl . '#webpage',
    'url' => $canonicalUrl,
    'name' => $pageTitle,
    'description' => $metaDescription,
    'inLanguage' => 'pt-BR',
    'isPartOf' => [
        '@id' => $siteBaseUrl . '/#website',
    ],
    'about' => [
        '@id' => $siteBaseUrl . '/#organization',
    ],
];

$structuredData = [
    '@context' => 'https://schema.org',
    '@graph' => [$organizationSchema, $websiteSchema, $webpageSchema],
];
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="robots" content="<?= htmlspecialchars($metaRobots, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="author" content="MZB Brasil">

    <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8') ?>">
    <link rel="alternate" hreflang="pt-BR" href="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8') ?>">
    <link rel="alternate" hreflang="x-default" href="<?= htmlspecialchars($defaultLocaleUrl, ENT_QUOTES, 'UTF-8') ?>">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="<?= htmlspecialchars($siteBaseUrl . '/sitemap.xml', ENT_QUOTES, 'UTF-8') ?>">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:site_name" content="MZB Brasil">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:image" content="<?= htmlspecialchars($ogImageUrl, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:image:alt" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($ogImageUrl, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:image:alt" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">

    <script type="application/ld+json"><?= json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Figtree:wght@300;400;500;600;700;800;900&family=Raleway:wght@400;500;600;700&display=swap"
        rel="stylesheet">
<?php foreach ($headExtraLinks as $href): ?>
<?php if (is_string($href) && trim($href) !== ''): ?>
    <link href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>" rel="stylesheet">
<?php endif; ?>
<?php endforeach; ?>

    <link rel="icon" type="image/x-icon" href="<?= htmlspecialchars($siteBaseUrl . '/favicon.ico', ENT_QUOTES, 'UTF-8') ?>">
    <link rel="icon" type="image/png" sizes="512x512" href="<?= htmlspecialchars(asset('assets/images/favicon.png'), ENT_QUOTES, 'UTF-8') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= htmlspecialchars(asset('assets/images/favicon.png'), ENT_QUOTES, 'UTF-8') ?>">

    <link rel="stylesheet" href="<?= htmlspecialchars(asset('assets/css/style.css'), ENT_QUOTES, 'UTF-8') ?>">
<?php require __DIR__ . '/analytics.php'; ?>
