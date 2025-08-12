<?php
require_once __DIR__ . '/config.php';
$slug = $_GET['slug'] ?? 'home';
$data = json_decode(file_get_contents(__DIR__ . '/data/pages.json'), true);
$page = null;

if (!is_array($data) || (!isset($data['pages']) && !isset($data['disclaimers']))) {
    header("HTTP/1.0 500 Internal Server Error");
    echo "Invalid data structure in pages.json";
    exit;
}

$page = null;

if (!is_array($data) || (!isset($data['pages']) && !isset($data['disclaimer']))) {
    header("HTTP/1.0 500 Internal Server Error");
    echo "Invalid data structure in pages.json";
    exit;
}

$page = null;

function find_page_by_slug(array $items, string $slug): ?array {
    foreach ($items as $item) {
        if (isset($item['page_slug']) && $item['page_slug'] === $slug) {
            return $item;
        }
    }
    return null;
}

// Search in pages first
if (!empty($data['pages'])) {
    $page = find_page_by_slug($data['pages'], $slug);
}

// If not found in pages, search disclaimer (singular key)
if (!$page && !empty($data['disclaimer'])) {
    $page = find_page_by_slug($data['disclaimer'], $slug);
}

if (!$page) {
    header("HTTP/1.0 404 Not Found");
    echo "Page not found";
    exit;
}

include __DIR__ . '/includes/header.php';
if (!empty($page['body']) ) {
    $body = $page['body'];
    foreach( $page['body'] as $id => $data ) {
        include __DIR__ . "/shortcodes/".$id.'.php';
    }
}
include __DIR__ . '/includes/footer.php';