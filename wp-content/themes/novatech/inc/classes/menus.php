<?php


/**
 * Register Menus
 * 
 * @package NovaTech
 */

namespace NovaTech\Inc;

use NovaTech\Inc\Traits\Singleton;

class Menus
{
    use Singleton;

    public function __construct()
    {
        $this->register_hooks();
    }

    public function register_hooks()
    {
        add_action('init', [$this, 'register_menus']);
    }


    public function register_menus()
    {
        register_nav_menus([
            'novatech-header-menu' => esc_html__("Header Menu", 'novatech'),
            'novatech-footer-menu' => esc_html__("Footer Menu", 'novatech')
        ]);
    }

    public static function get_menu_items_by_location(string $location)
    {
        $locations = get_nav_menu_locations();

        if (!isset($locations[$location])) {
            return null;
        }


        return wp_get_nav_menu_items($locations[$location]);
    }
}
