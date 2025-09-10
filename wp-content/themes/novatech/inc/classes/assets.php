<?php


/**
 * Theme Styles and Scripts
 * 
 * @package NovaTech
 */

namespace NovaTech\Inc;

use NovaTech\Inc\Traits\Singleton;

class Assets
{
    use Singleton;
    
    public function __construct()
    {
        $this->register_hooks();
    }

    public function register_hooks()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }


    public function register_styles()
    {
        wp_enqueue_style('novatech_styles', NOVATECH_DIR_URI . "/styles.css");
        wp_enqueue_style('tw_novatech_styles', NOVATECH_DIR_URI . '/assets/styles/output.css');
    }

    public function register_scripts()
    {
        wp_enqueue_script('novatech_scripts', NOVATECH_DIR_URI . '/assets/app.js');
    }
}
