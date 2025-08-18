<?php

/**
 * 
 * Bootstraps The NovaTech Theme
 * 
 * @package NovaTech 
 */


namespace NovaTech\Inc;

use NovaTech\Inc\Traits\Singleton;

class NovaTechTheme
{
    use Singleton;


    public function __construct()
    {
        $this->registerHooks();
    }

    public function registerHooks()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueStyleSheets']);
    }


    public function enqueueStyleSheets()
    {
        wp_enqueue_style('novatech_styles', get_stylesheet_uri());
        wp_enqueue_style('tw_novatech_styles', get_stylesheet_directory_uri() . '/assets/styles/output.css');
        wp_enqueue_script('novatech_scripts', get_stylesheet_directory_uri() . '/assets/app.js');
    }
}
