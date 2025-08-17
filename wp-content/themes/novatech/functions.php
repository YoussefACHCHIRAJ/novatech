<?php


/**
 * Theme Functions
 * 
 * @package NovaTech
 */



function enqueueStyleSheets()
{
    wp_enqueue_style('novatech_styles', get_stylesheet_uri());
    wp_enqueue_style('tw_novatech_styles', get_stylesheet_directory_uri() . '/assets/styles/output.css');
    wp_enqueue_script('novatech_scripts', get_stylesheet_directory_uri() . '/assets/app.js');
}

add_action('wp_enqueue_scripts', 'enqueueStyleSheets');
