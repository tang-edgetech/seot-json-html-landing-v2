<?php
header("Content-Type: text/css");

require_once __DIR__ . '/../../config.php';

$colors = getColorConfig();
?>
:root {
    --primary-main: <?= $colors['primary'] ?>;
    --primary-sub: <?= $colors['secondary'] ?>;
    --primary-black: #1f1f1f;
    --primary-white: #fff;
    --text-default: #636363;
    --fw-light: 300;
    --fw-regular: 400;
    --fw-medium: 500;
    --fw-semi-bold: 600;
    --fw-bold: 700;
    --fw-extra-bold: 800;
    --fw-black: 900;
    --font-poppins: "Poppins", sans-serif;
}