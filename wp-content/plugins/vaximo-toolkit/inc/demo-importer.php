<?php

use \FW_Ext_Backups_Demo as HB_FW_Ext_Backups_Demo;

if (! defined('ABSPATH')) {
    exit;
}

class Demo_Importer
{

    protected static $instance;

    public function __construct()
    {
        add_filter('plugin_action_links_envy-demo-importer/envy-demo-importer.php', array( $this, 'add_action_links' )); // Link from plugins page
        add_filter('rt_demo_installer_warning', array( $this, 'data_loss_warning' ));
        add_filter('fw:ext:backups-demo:demos', array( $this, 'demo_config' ));
        add_action('fw:ext:backups:tasks:success:id:demo-content-install', array( $this, 'after_demo_install' ));
    }

    public static function instance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function add_action_links($links)
    {
        $mylinks = array(
            '<a href="' . esc_url(admin_url('tools.php?page=fw-backups-demo-content')) . '">'.__('Install Demo Contents', 'vaximo-toolkit').'</a>',
        );
        return array_merge($links, $mylinks);
    }

    public function data_loss_warning($links)
    {
        $html  = '<div style="margin-top:20px;color:#856404;font-size:18px;line-height:1.3;font-weight:600;margin-bottom:40px;background-color: #ffeeba;padding:10px 10px;border-radius: 10px;">';
        $html .= __('All of your existing data will be erased if you install/import One Click demo data from here, so we recommend importing demo data only for a new website.', 'vaximo-toolkit');
        $html .= '</div>';
        return $html;
    }

    public function demo_config($demos)
    {
        $demos_array = array(
            'demo1' => array(
                'title' => __('Cyber Security Company', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home1.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/',
            ),
            'demo2' => array(
                'title' => __('Internet Security Agency', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home2.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-two',
            ),
            'demo3' => array(
                'title' => __('Website Security Agency', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home3.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-three',
            ),
            'demo4' => array(
                'title' => __('Data Security Company ', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home4.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-four',
            ),
            'demo5' => array(
                'title' => __('IT Security Company', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home5.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-five',
            ),
            'demo6' => array(
                'title' => __('Information Security Agency ', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home6.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-six',
            ),
            'demo7' => array(
                'title' => __('Hacking Security Agency', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home7.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-seven/',
            ),
            'demo8' => array(
                'title' => __('Dark Web Security Company', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home8.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-eight',
            ),
            'demo9' => array(
                'title' => __('Blockchain Security Agency ', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home9.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-nine/',
            ),
            'demo10' => array(
                'title' => __('Cyber Security Video Home ', 'vaximo-toolkit'),
                'screenshot' => get_template_directory_uri().'/assets/img/screenshot10.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-ten/',
            ),
            'demo11' => array(
                'title' => __('Network Security Company ', 'vaximo-toolkit'),
                'screenshot' => get_template_directory_uri().'/assets/img/screenshot11.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-eleven/',
            ),
            'demo12' => array(
                'title' => __('Cloud Security Agency ', 'vaximo-toolkit'),
                'screenshot' => get_template_directory_uri().'/assets/img/screenshot12.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-twelve/',
            ),
            'demo13' => array(
                'title' => __('Government Cyber Defense ', 'vaximo-toolkit'),
                'screenshot' => get_template_directory_uri().'/assets/img/screenshot13.png',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-thirteen/',
            ),
            'demo14' => array(
                'title' => __('Cyber Training & Awareness', 'vaximo-toolkit'),
                'screenshot' => get_template_directory_uri().'/assets/img/screenshot14.png',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-fourteen/',
            ),
            'demo15' => array(
                'title' => __('AI Powered Security', 'vaximo-toolkit'),
                'screenshot' => get_template_directory_uri().'/assets/img/screenshot15.png',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-fifteen/',
            ),
        );

        $download_url	 = 'https://themes.envytheme.com/tools/vaximo/';

        foreach ($demos_array as $id => $data) {
            $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
                'url' => $download_url,
                'file_id' => $id,
            ));
            $demo->set_title($data['title']);
            $demo->set_screenshot($data['screenshot']);
            $demo->set_preview_link($data['preview_link']);

            $demos[ $demo->get_id() ] = $demo;

            unset($demo);
        }

        return $demos;
    }

    public function after_demo_install($collection)
    {
        // Update front page id
        $demos = array(
            'demo1'  => 19,
            'demo2'  => 482,
            'demo3'  => 572,
            'demo4'  => 626,
            'demo5'  => 655,
            'demo6'  => 695,
            'demo7'  => 1081,
            'demo8'  => 1423,
            'demo9'  => 1508,
            'demo10'  => 1693,
            'demo11'  => 1725,
            'demo12'  => 2022,
            'demo13'  => 2207,
            'demo14'  => 2339,
            'demo15'  => 2446,
        );

        $data = $collection->to_array();
        foreach ($data['tasks'] as $task) {
            if ($task['id'] == 'demo:demo-download') {
                $demo_id = $task['args']['demo_id'];
                $page_id = $demos[$demo_id];
                update_option('page_on_front', $page_id);
                flush_rewrite_rules();
                break;
            }
        }

        // Update WooCommerce email options //todo
        $email = get_option('admin_email');
        $name  = get_bloginfo('name', 'display');

        update_option('woocommerce_stock_email_recipient', $admin_email);
        update_option('woocommerce_email_from_address', $admin_email);
        update_option('woocommerce_email_from_name', $name);

        // Update post author id
        global $wpdb;
        $id = get_current_user_id();
        $query = "UPDATE $wpdb->posts SET post_author = $id";
        $wpdb->query($query);

        vaximo_function_pcs();
    }
}

Demo_Importer::instance();