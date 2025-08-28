<?php


/**
 * Theme Styles and Scripts
 * 
 * @package NovaTech
 */

namespace NovaTech\Inc;

use NovaTech\Inc\Traits\Singleton;

class Dashboard
{
    use Singleton;

    public function __construct()
    {
        $this->register_hooks();
    }

    public function register_hooks()
    {
        add_action('init', [$this, 'register_dashboard_page']);

        add_filter('query_vars', [$this, 'dashboard_query_var']);
        add_filter('template_include', [$this, 'dashboard_template']);
    }

    public function register_dashboard_page()
    {
        add_rewrite_rule("^dashboard/?$", "index.php?dashboard_page=1", 'top');
    }

    public function dashboard_query_var($vars)
    {
        $vars[] = 'dashboard_page';
        return $vars;
    }

    public function dashboard_template($template)
    {
        $dashboard = get_query_var('dashboard_page');

        var_dump($dashboard);
        wp_die();
        
        if ($dashboard) {
            $new_template = get_template_directory() . '/dashboard-template.php';
            if (file_exists($new_template)) {
                return $new_template;
            }
        }

        return $template;
    }
}
