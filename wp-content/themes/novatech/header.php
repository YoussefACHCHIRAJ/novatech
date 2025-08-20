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
            <nav aria-label="Global" class="tw:flex tw:items-center tw:justify-between tw:p-6 tw:lg:px-8">
                <div class="tw:flex-1">
                    <a href="#" class="tw:-m-1.5 tw:p-1.5">
                        <?php
                        $logo = wp_get_attachment_Image_src(get_theme_mod('custom_logo'));

                        ?>
                        <img src="<?= $logo ? $logo[0] : "https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" ?>" alt="" class="tw:h-8 tw:w-auto" />
                    </a>
                </div>

                <?php get_template_part('template-parts/header/navigation') ?>

                <div class="tw:lg:flex tw:hidden tw:flex-1 tw:justify-end">
                    <a href="#" class="tw:text-sm/6 tw:font-semibold tw:text-white">Log in <span aria-hidden="true">&rarr;</span></a>
                </div>
            </nav>

        </header> Your Company 