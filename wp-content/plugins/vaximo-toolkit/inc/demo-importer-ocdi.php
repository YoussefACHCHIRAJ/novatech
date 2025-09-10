<?php
/**
 * Demo Import with One Click Demo Importer Plugin
 */


if (! defined('ABSPATH')) {
    exit;
}

class Demo_Importer_OCDI
{

    public function __construct()
    {
        add_filter('pt-ocdi/import_files', array( $this, 'demo_config' ));
        add_filter('pt-ocdi/after_import', array( $this, 'after_import' ));
        add_filter('pt-ocdi/disable_pt_branding', '__return_true');
    }

    public function demo_config()
    {

        $demos_array = array(
            'demo1' => array(
                'title' => __('Cyber Security Company', 'vaximo-toolkit'),
                'page' => __('Home One', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home1.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/',
            ),
            'demo2' => array(
                'title' => __('Internet Security Agency', 'vaximo-toolkit'),
                'page' => __('Home Two', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home2.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-two',
            ),
            'demo3' => array(
                'title' => __('Website Security Agency', 'vaximo-toolkit'),
                'page' => __('Home Three', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home3.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-three',
            ),
            'demo4' => array(
                'title' => __('Data Security Company ', 'vaximo-toolkit'),
                'page' => __('Home Four', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home4.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-four',
            ),
            'demo5' => array(
                'title' => __('IT Security Company', 'vaximo-toolkit'),
                'page' => __('Home Five', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home5.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-five',
            ),
            'demo6' => array(
                'title' => __('Information Security Agency ', 'vaximo-toolkit'),
                'page' => __('Home Six', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home6.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-six',
            ),
            'demo7' => array(
                'title' => __('Hacking Security Agency', 'vaximo-toolkit'),
                'page' => __('Home Seven', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home7.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-seven/',
            ),
            'demo8' => array(
                'title' => __('Dark Web Security Company', 'vaximo-toolkit'),
                'page' => __('Home Eight', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home8.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-eight',
            ),
            'demo9' => array(
                'title' => __('Blockchain Security Agency ', 'vaximo-toolkit'),
                'page' => __('Home Nine', 'vaximo-toolkit'),
                'screenshot' => 'https://preview.envytheme.com/vaximo-wp/images/demos/home9.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-nine/',
            ),
            'demo10' => array(
                'title' => __('Cyber Security Video Home ', 'vaximo-toolkit'),
                'page' => __('Home Ten', 'vaximo-toolkit'),
                'screenshot' => get_template_directory_uri().'/assets/img/screenshot10.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-ten/',
            ),
            'demo11' => array(
                'title' => __('Network Security Company ', 'vaximo-toolkit'),
                'page' => __('Home Eleven', 'vaximo-toolkit'),
                'screenshot' => get_template_directory_uri().'/assets/img/screenshot11.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-eleven/',
            ),
            'demo12' => array(
                'title' => __('Cloud Security Agency ', 'vaximo-toolkit'),
                'page' => __('Home Twelve', 'vaximo-toolkit'),
                'screenshot' => get_template_directory_uri().'/assets/img/screenshot12.jpg',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-twelve/',
            ),
            'demo13' => array(
                'title' => __('Government Cyber Defense ', 'vaximo-toolkit'),
                'page' => __('Home Thirteen', 'vaximo-toolkit'),
                'screenshot' => get_template_directory_uri().'/assets/img/screenshot13.png',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-thirteen/',
            ),
            'demo14' => array(
                'title' => __('Cyber Training & Awareness', 'vaximo-toolkit'),
                'page' => __('Home Fourteen', 'vaximo-toolkit'),
                'screenshot' => get_template_directory_uri().'/assets/img/screenshot14.png',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-fourteen/',
            ),
            'demo15' => array(
                'title' => __('AI Powered Security', 'vaximo-toolkit'),
                'page' => __('Home Fifteen', 'vaximo-toolkit'),
                'screenshot' => get_template_directory_uri().'/assets/img/screenshot15.png',
                'preview_link' => 'https://themes.envytheme.com/vaximo/home-fifteen/',
            ),
        );

        $config = array();
        $import_path  = trailingslashit(get_template_directory()) . 'lib/sample-data/';
        $redux_option = 'vaximo_opt';

        foreach ($demos_array as $key => $demo) {
            $config[] = array(
                'import_file_id'               => $key,
                'import_page_name'             => $demo['page'],
                'import_file_name'             => $demo['title'],
                'local_import_file'            => $import_path . 'contents.xml',
                'local_import_widget_file'     => $import_path . 'widgets.wie',
                'local_import_customizer_file' => $import_path . 'customizer.dat',
                'local_import_redux'           => array(
                    array(
                        'file_path'   => $import_path . 'options.json',
                        'option_name' => $redux_option,
                    ),
                ),
                'import_preview_image_url'   => $demo['screenshot'],
                'preview_url'                => $demo['preview_link'],
            );
        }

        return $config;
    }

    public function after_import($selected_import)
    {
        $this->assign_menu();
        $this->assign_frontpage($selected_import);
        $this->assign_woocommerce_pages();
        $this->update_permalinks();
    }

    private function assign_menu()
    {
        $primary  = get_term_by('name', 'Header Menu', 'nav_menu');

        set_theme_mod('nav_menu_locations', array(
            'primary'  => $primary->term_id,
        ));
    }

    private function assign_frontpage($selected_import)
    {
        $blog_page  = get_page_by_title('Blog');
        $front_page = get_page_by_title($selected_import['import_page_name']);

        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page->ID);
        update_option('page_for_posts', $blog_page->ID);
    }

    private function assign_woocommerce_pages()
    {
        $shop     = get_page_by_title('Shop');
        $cart     = get_page_by_title('Cart');
        $checkout = get_page_by_title('Checkout');
        $account  = get_page_by_title('My Account');

        update_option('woocommerce_shop_page_id', $shop->ID);
        update_option('woocommerce_cart_page_id', $cart->ID);
        update_option('woocommerce_checkout_page_id', $checkout->ID);
        update_option('woocommerce_myaccount_page_id', $account->ID);
    }

    private function update_permalinks()
    {
        update_option('permalink_structure', '/%postname%/');
    }
}

new Demo_Importer_OCDI;
