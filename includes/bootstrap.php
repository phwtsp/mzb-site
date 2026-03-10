<?php
declare(strict_types=1);

if (!defined('MZB_SITE_ROOT')) {
    define('MZB_SITE_ROOT', dirname(__DIR__));
}

if (!defined('MZB_SITE_CONFIG')) {
    $defaultConfig = [
        'ga4_id' => '',
    ];

    $configPath = MZB_SITE_ROOT . '/config/site.php';
    $customConfig = [];

    if (is_file($configPath)) {
        $loadedConfig = require $configPath;
        if (is_array($loadedConfig)) {
            $customConfig = $loadedConfig;
        }
    }

    define('MZB_SITE_CONFIG', array_merge($defaultConfig, $customConfig));
}

if (!defined('MZB_GA4_ID')) {
    $gaFromConfig = MZB_SITE_CONFIG['ga4_id'] ?? '';
    $gaFromEnv = getenv('MZB_GA4_ID');

    $analyticsId = is_string($gaFromConfig) && trim($gaFromConfig) !== ''
        ? $gaFromConfig
        : (is_string($gaFromEnv) ? $gaFromEnv : '');

    define('MZB_GA4_ID', trim($analyticsId));
}

if (!function_exists('asset')) {
    function asset(string $path): string
    {
        $cleanPath = ltrim($path, '/');
        $absolute = MZB_SITE_ROOT . '/' . $cleanPath;
        $version = is_file($absolute) ? (string) filemtime($absolute) : '1';

        return $cleanPath . '?v=' . $version;
    }
}
