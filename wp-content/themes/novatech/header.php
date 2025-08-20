<?php

/**
 * Header Template 
 * 
 * @package NovaTech
 */

?>

<!DOCTYPE html>
<html <?= language_attributes() ?>>

<head>
    <meta charset="<?= blogInfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body>
    <?php wp_body_open() ?>

    <div class="tw:bg-gray-900 tw:h-screen">
        <header class="tw:absolute tw:inset-x-0 tw:top-0 tw:z-50">
            <?php get_template_part('template-parts/header/navigation') ?>
        </header>