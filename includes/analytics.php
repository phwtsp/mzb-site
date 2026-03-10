<?php
declare(strict_types=1);

if (!isset($analyticsId)) {
    $analyticsId = MZB_GA4_ID;
}

if (!is_string($analyticsId)) {
    $analyticsId = '';
}

$analyticsId = trim($analyticsId);

if ($analyticsId === '') {
    return;
}
?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= htmlspecialchars($analyticsId, ENT_QUOTES, 'UTF-8') ?>"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', '<?= htmlspecialchars($analyticsId, ENT_QUOTES, 'UTF-8') ?>');
</script>
