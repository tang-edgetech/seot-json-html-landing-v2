<?php
// -----------------------------
// CONFIGURATION & GLOBAL FUNCS
// -----------------------------
define('BASE_PATH', __DIR__);
define('LOCALHOST_NAME', 'w4u.games');
$serverPath = $_SERVER['DOCUMENT_ROOT']; // "/home/seot2/public_html/gee55.info"
$domainFolder = basename($serverPath);
define('DOMAIN_NAME', $domainFolder); // gee55.info
$siteKey = 'w4u';
if( $domainFolder !== 'htdocs' ) {
    $siteKey = explode('.', $domainFolder)[0];
}
define('SITE_KEY', $siteKey); // gee55

// Detect if environment is localhost
function is_localhost(): bool {
    $whitelist = ['127.0.0.1', '::1', 'localhost'];
    return in_array($_SERVER['SERVER_NAME'], $whitelist, true);
}

function home_url(string $path = ''): string {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
    if (
        (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] === 'localhost:8080') ||
        (isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] === 'localhost' && $_SERVER['SERVER_PORT'] == 8080)
    ) {
        $domain   = is_localhost() ? "localhost:8080/".LOCALHOST_NAME : DOMAIN_NAME;
    }
    else {
        $domain   = is_localhost() ? "localhost/".LOCALHOST_NAME : DOMAIN_NAME;
    }

    $url = $protocol . "://" . $domain;

    if (!empty($path)) {
        $url .= '/' . ltrim($path, '/');
    }

    return $url;
}

function assets_url() {
    $url = home_url()."/assets/images/";
    return $url;
}

// Load pages.json into an array
function get_pages(): array {
    $file = __DIR__ . '/data/pages.json';
    if (!file_exists($file)) {
        return [];
    }
    return json_decode(file_get_contents($file), true) ?: [];
}

// Get a specific page by slug
function get_page_by_slug(string $slug): ?array {
    $pages = get_pages();
    foreach ($pages['pages'] as $page) {
        if ($page['page_slug'] === $slug) {
            return $page;
        }
    }
    return null;
}

function get_page_meta_tags(array $page): string {
    if (empty($page['meta_tags']) || !is_array($page['meta_tags'])) {
        return '';
    }

    $output = '';
    foreach ($page['meta_tags'] as $meta) {
        $output .= convert_string_url($meta) . PHP_EOL;
    }

    return $output;
}

function get_page_markup_schema(array $page): string {
    if (empty($page['schema']) || !is_array($page['schema'])) {
        return '';
    }
    
    $output = '';
    if (!empty($page['schema'])) {
        foreach( $page['schema'] as $key => $tag) {
            $output .= "<script type=\"application/ld+json\" id=\"$key\">\n";
            $output .= json_encode($tag, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
            $output .= "\n</script>\n";
        }
    }
    return $output;
}

function tags_version() {
    $version = '1.0.'.time();
    return $version;
}

function convert_string_url($data) {
    return str_replace('{{site_base_url}}', home_url(), $data);
}

function getColorConfig($key = null) {
    $configPath = __DIR__ . "/data/settings.json";
    if (file_exists($configPath)) {
        $config = json_decode(file_get_contents($configPath), true);
        return $key ? ($config['colors'][$key] ?? null) : $config['colors'];
    }
    return [];
}

function get_the_menu_items($type) {
    if( $type !== 'disclaimer' ) {
        $type = 'pages';
    }
    $pages = get_pages();
    $titlesAndSlugs = array_map(function ($page) {
        return [
            'page_title' => $page['page_title'],
            'page_slug'  => $page['page_slug']
        ];
    }, $pages[$type]);
    return $titlesAndSlugs;
}

function randomUniqueID($length = 8) {
    return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, $length);
}
