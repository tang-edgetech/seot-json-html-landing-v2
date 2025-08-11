<?php
require_once __DIR__ . '/config.php';

$page = get_page_by_slug('home') ?? ['page_title' => 'Page not found'];
include __DIR__ . '/includes/header.php';
if( $page['marquee'] === 1 || $page['marquee'] === 'on' ) {
    include __DIR__ . '/shortcodes/marquee.php';
}

$body = $page['body'];
foreach( $body as $key => $item ) {
    if( $key == "quick-enquiry" ) {

    }
    else {

    }
}

if (!empty($page['content']) ) {
    $content = $page['content'];
    include __DIR__ . '/includes/text-editor.php';
}

if (!empty($page['faq']) && is_array($page['faq'])) {
    $faq = $page['faq'];
    include __DIR__ . '/includes/faq.php';
}
include __DIR__ . '/includes/footer.php';