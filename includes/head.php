<?php
declare(strict_types=1);

$pageTitle = isset($page_title) && is_string($page_title) && trim($page_title) !== ''
    ? trim($page_title)
    : 'MZB Brasil';

$headExtraLinks = isset($head_extra_links) && is_array($head_extra_links)
    ? $head_extra_links
    : [];
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>

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

    <link rel="stylesheet" href="<?= htmlspecialchars(asset('assets/css/style.css'), ENT_QUOTES, 'UTF-8') ?>">
<?php require __DIR__ . '/analytics.php'; ?>
