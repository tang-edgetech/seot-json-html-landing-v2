<?php
require_once __DIR__ . '/config.php';

$page = get_page_by_slug('home') ?? ['page_title' => 'Page not found'];
include __DIR__ . '/includes/header.php';

if (!empty($page['body']) ) {
    $body = $page['body'];
    foreach( $page['body'] as $id => $data ) {
        include __DIR__ . "/shortcodes/".$id.'.php';
    }
}
include __DIR__ . '/includes/footer.php';