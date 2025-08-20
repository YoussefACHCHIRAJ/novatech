<?php

/**
 * 
 * Bootstraps The NovaTech Theme
 * 
 * @package NovaTech 
 */


namespace NovaTech\Inc;

use NovaTech\Inc\Traits\Singleton;

class NovaTech_Theme
{
    use Singleton;


    public function __construct()
    {
        Assets::get_instance();

        $this->register_hooks();
    }

    private function register_hooks()
    {
        add_action("after_setup_theme", [$this, 'setup_theme']);
    }

    public function setup_theme()
    {
        add_theme_support('title-tag');

        add_theme_support('custom-logo', [
            'header-text' => ['site-title', 'site-description'],
            'width' => 400,
            'height' => 100,
            'flex-width' => true,
            'flex-height' => true
        ]);

        add_theme_support("post-thumbnails");

        add_theme_support("html5", [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style'
        ]);

        add_theme_support("align-wide"); 
    }
}
