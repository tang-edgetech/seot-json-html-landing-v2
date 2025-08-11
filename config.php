<?php
// -----------------------------
// CONFIGURATION & GLOBAL FUNCS
// -----------------------------
define('BASE_PATH', __DIR__);
define('SITE_KEY', 'seot-json-html-landing-v2');

// Detect if environment is localhost
function is_localhost(): bool {
    $whitelist = ['127.0.0.1', '::1', 'localhost'];
    return in_array($_SERVER['SERVER_NAME'], $whitelist, true);
}

function home_url(string $path = ''): string {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
    $domain   = is_localhost() ? "localhost/seot-json-html-landing-v2" : "gee55.info";

    $url = $protocol . "://" . $domain;

    if (!empty($path)) {
        // Remove .php and query for clean URL
        $url .= '/' . ltrim($path, '/');
    }

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
        $output .= $meta;
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