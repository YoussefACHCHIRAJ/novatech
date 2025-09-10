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
        $this->load_classes();

        $this->register_hooks();

    }

    private function load_classes()
    {
        Assets::get_instance();
        Menus::get_instance();
        Dashboard::get_instance();
    }
     
    private function register_hooks()
    {
        add_action("after_setup_theme", [$this, 'setup_theme']);
        add_action( 'widgets_init', [$this, 'register_sidebars'] );

        add_action('after_switch_theme', [$this, 'theme_activate']);
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

    public function theme_activate() {
        flush_rewrite_rules();
    }

    public function register_sidebars()
    {
        register_sidebar(
		array(
			'id'            => 'novatech-primary',
			'name'          => __( 'Primary Sidebar', 'novatech' ),
			'description'   => __( 'Left Sidebar for Admin panel.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
    }
}
