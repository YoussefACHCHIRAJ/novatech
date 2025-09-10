<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = 'vaximo_opt';
    
    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'opt_name/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'vaximo-toolkit' ),
        'page_title'           => __( 'Theme Options', 'vaximo-toolkit' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 3,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'vaximo_opt',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p></p>', 'vaximo-toolkit' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'vaximo-toolkit' );
    }

    Redux::setArgs( $opt_name, $args );
    

// Preloader Options
Redux::setSection( $opt_name, array(
    'title'            => __( 'Preloader', 'vaximo-toolkit' ),
    'id'               => 'preloader_opt',
    'icon'             => 'dashicons dashicons-controls-repeat',
    'fields'           => array(
        array(
            'id'      => 'enable_preloader',
            'type'    => 'switch',
            'title'   => __( 'Pre-loader', 'vaximo-toolkit' ),
            'on'      => __( 'Enable', 'vaximo-toolkit' ),
            'off'     => __( 'Disable', 'vaximo-toolkit' ),
            'default' => true,
        ),
        array(
            'required' => array( 'enable_preloader', '=', '1' ),
            'id'       => 'preloader_style',
            'type'     => 'select',
            'title'    => __( 'Pre-loader Style', 'vaximo-toolkit' ),
            'default'  => 'circle-spin',
            'options'  => array(
                'circle-spin'   => __( 'Circle Spin Preloader', 'vaximo-toolkit' ),
                'text'          => __( 'Text Preloader', 'vaximo-toolkit' ),
                'image'         => __( 'Image Preloader', 'vaximo-toolkit' )
            )
        ),
        array(
            'title'       => __( 'Background Color', 'vaximo-toolkit' ),
            'id'          => 'preloader_bgcolor',
            'type'        => 'color',
            'default'     => '#ffffff',
            'validate'    => 'color',
            'transparent' => false,
            'required'    => array( 'preloader_style', '!=', 'image' ),
        ),
        array(
            'title'       => __( 'Background Color', 'vaximo-toolkit' ),
            'id'          => 'preloader_imgbgcolor',
            'type'        => 'color',
            'default'     => '#ffffff',
            'validate'    => 'color',
            'transparent' => false,
            'required'    => array( 'preloader_style', '=', 'image' ),
        ),

        array(
            'title'       => __( '1st Circle Background Color', 'vaximo-toolkit' ),
            'id'          => 'preloader_circle1',
            'type'        => 'color',
            'default'     => '#16a085',
            'validate'    => 'color',
            'transparent' => false,
            'required'    => array( 'preloader_style', '=', 'circle-spin' ),
        ),
        array(
            'title'       => __( '2nd Circle Background Color', 'vaximo-toolkit' ),
            'id'          => 'preloader_circle2',
            'type'        => 'color',
            'default'     => '#e74c3c',
            'validate'    => 'color',
            'transparent' => false,
            'required'    => array( 'preloader_style', '=', 'circle-spin' ),
        ),
        array(
            'title'       => __( '3rd Circle Background Color', 'vaximo-toolkit' ),
            'id'          => 'preloader_circle3',
            'type'        => 'color',
            'default'     => '#f9c922',
            'validate'    => 'color',
            'transparent' => false,
            'required'    => array( 'preloader_style', '=', 'circle-spin' ),
        ),
        array(
            'title'       => __( 'Text Color', 'vaximo-toolkit' ),
            'id'          => 'preloader_color',
            'type'        => 'color',
            'default'     => '#000000',
            'validate'    => 'color',
            'transparent' => false,
            'required'    => array( 'preloader_style', '=', 'text' ),
        ),    
        array(
            'id'       => 'loading_text',
            'type'     => 'text',
            'title'    => __( 'Loading Text', 'vaximo-toolkit' ),
            'default'  => __( 'Loading', 'vaximo-toolkit' ),
            'required' => array( 'preloader_style', '=', 'text' ),
        ),

        array(
            'title'         => __( 'Loading Text Typography', 'vaximo-toolkit' ),
            'id'            => 'preloader_small_typo',
            'type'          => 'typography',
            'text-align'    => false,
            'color'         => false,
            'output'        => '.loader-wrapper p',
            'required'      => array( 'preloader_style', '=', 'text' ),
        ),

        /**
         * Image Preloader
         */
        array(
            'required' => array( 'preloader_style', '=', 'image' ),
            'id'       => 'preloader_image',
            'type'     => 'media',
            'title'    => __( 'Pre-loader image', 'vaximo-toolkit' ),
            'compiler' => true,
            'default'  => array(
                'url'  => get_template_directory_uri() .'/assets/img/status.gif'
            ),
        ),
    )
));

// -> START General Options
Redux::setSection( $opt_name, array(
    'title'            => __( 'General Options', 'vaximo-toolkit' ),
    'id'               => 'general_options',
    'customizer' => false,
    'icon'             => ' el el-home',
    'fields'     => array(
        array(
            'id'       => 'vaximo_due_date',
            'type'     => 'date',
            'title'    => esc_html__( 'Date Option', 'vaximo-toolkit' ),
            'subtitle' => esc_html__('This date option is required only for Coming soon page', 'vaximo-toolkit'),
            'desc'     => esc_html__( 'Choose a Date', 'vaximo-toolkit' ),
            'default' => '12/07/2022'
        ),

        array(
            'id'       => 'main_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Vaximo Site Logo', 'vaximo-toolkit' ),
        ),
        array(
            'title'     => __( 'Main Logo dimensions', 'vaximo-toolkit' ),
            'id'        => 'main_logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.navbar-brand img'
        ),
        array(
            'id'       => 'black_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Black Logo', 'vaximo-toolkit' ),
        ),
        array(
            'title'     => __( 'Black Logo dimensions', 'vaximo-toolkit' ),
            'id'        => 'black_logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.footer-area .single-footer-widget .logo img, .sidebar-modal .modal-title-logo img'
        ),

        array(
            'id'       => 'white_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'White Logo', 'vaximo-toolkit' ),
        ),
        array(
            'title'     => __( 'White Logo dimensions', 'vaximo-toolkit' ),
            'id'        => 'white_logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.navbar-brand img'
        ),

        array(
            'id'       => 'mobile_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Logo For Mobile (optional)', 'vaximo-toolkit' ),
        ),
        array(
            'title'     => __( 'Mobile Logo dimensions', 'vaximo-toolkit' ),
            'id'        => 'mobile_logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.navbar-area .mobile-nav .logo img'
        ),

        array(
            'id'        => 'disable_sticky_header',
            'type'      => 'switch',
            'title'     => __('Disable Sticky Header', 'vaximo-toolkit'),
            'desc'      => __('', 'vaximo-toolkit'),
            'default'   => '0'
        ),
        array(
            'id'        => 'enable_back_to_top',
            'type'      => 'switch',
            'title'     => __('Enable back-to-top Button', 'vaximo-toolkit'),
            'default'   => '1'
        ),
        array(
            'id'      => 'vaximo_enable_rtl',
            'type'    => 'select',
            'options' => array(
                'enable'        => 'Enable',
                'disable'       => 'Disable',
            ),
            'title'     => __( 'RTL', 'vaximo-toolkit' ),
            'default'   => 'disable',
        ),
        array(
            'id'      => 'enable_cart_btn',
            'type'    => 'switch',
            'title'   => __('Enable Woocommerce Cart', 'dasas-toolkit'),
            'default' => '1'
        ),

        array(
            'id'      => 'enable_lazyloader',
            'type'    => 'switch',
            'title'   => __( 'Lazy Loader', 'vaximo-toolkit' ),
            'on'      => __( 'Enable', 'vaximo-toolkit' ),
            'off'     => __( 'Disable', 'vaximo-toolkit' ),
            'default' => false,
        ),
        array(
            'id'      => 'enable_minify_css_js',
            'type'    => 'switch',
            'title'   => __( 'Minify CSS and JS', 'vaximo-toolkit' ),
            'on'      => __( 'Enable', 'vaximo-toolkit' ),
            'off'     => __( 'Disable', 'vaximo-toolkit' ),
            'default' => false,
        ), 
    )
) );

// -> START Top Header
Redux::setSection( $opt_name, array(
    'title'            => __( 'Top Header', 'vaximo-toolkit' ),
    'id'               => 'top_header',
    'customizer'       => false,
    'icon'             => 'el el-website',
    'fields'     => array(
        array(
            'id'       => 'hide_top_header',
            'type'     => 'checkbox',
            'title'    => __( 'Top Header Hide?', 'vaximo-toolkit' ),
        ),
        array(
            'id'       => 'email',
            'type'     => 'text',
            'title'    => __('Email', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),
        array(
            'id'       => 'email_link',
            'type'     => 'text',
            'title'    => __('Email Link', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),
        array(
            'id'       => 'email_icon',
            'type'     => 'text',
            'title'    => __('Email Icon', 'vaximo-toolkit'),
            'desc'     => __('Here you can use font awesome, flaticon, box icon. e.x: bx bx-envelope', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),
        array(
            'id'       => 'address',
            'type'     => 'text',
            'title'    => __('Address', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),
        array(
            'id'       => 'address_icon',
            'type'     => 'text',
            'title'    => __('Address Icon', 'vaximo-toolkit'),
            'desc'     => __('Here you can use font-awesome, flaticon, box icon. e.x: bx bx-location-plus', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),
        array(
            'id'       => 'top_social_link',
            'type'     => 'checkbox',
            'title'    => __( 'Hide Social Link?', 'vaximo-toolkit' ),
            'required' => array('hide_top_header','!=','1'),
        ),

        // Header Six
        array(
            'id'       => 'phone_tit',
            'type'     => 'text',
            'title'    => __('Phone Title', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),
        array(
            'id'       => 'phone_num',
            'type'     => 'text',
            'title'    => __('Phone Number', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),
        array(
            'id'       => 'phone_link',
            'type'     => 'text',
            'title'    => __('Phone Link', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),
        array(
            'id'       => 'phone_icon',
            'type'     => 'text',
            'title'    => __('Phone Icon', 'vaximo-toolkit'),
            'desc'     => __('Here you can use font awesome, flaticon, box icon. e.x: bx bx-envelope', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),

        array(
            'id'       => 'get_free_tit',
            'type'     => 'text',
            'title'    => __('Get Free Title', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),
        array(
            'id'       => 'get_free_btn',
            'type'     => 'text',
            'title'    => __('Get Free Learn More Button', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),
        array(
            'id'       => 'get_free_link',
            'type'     => 'text',
            'title'    => __('Get Free Learn More Link', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),
        array(
            'id'       => 'get_free_icon',
            'type'     => 'text',
            'title'    => __('Get Free Icon', 'vaximo-toolkit'),
            'desc'     => __('Here you can use font awesome, flaticon, box icon. e.x: bx bx-envelope', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
        ),


        array(
            'id' => 'login_btn_text',
            'type' => 'text',
            'title' => __('Login Button Text', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
            'default' => __("Log In", 'vaximo-toolkit'),
        ),
        array(
            'id'    => 'login_link_type',
            'type'  => 'select',
            'options' => array (
                'external_link'     => 'External Link',
                'internal_link'     => 'Internal Link',
            ),
            'title'     => esc_html__( 'Login/Profile Link Type', 'teciva-toolkit' ),
            'default'   => 'internal_link',
        ),
        array(
			'id'        => 'login_link_external',
            'type'      => 'text',
			'title'     => esc_html__('Login Link', 'teciva-toolkit'),
            'required'  => array('login_link_type','equals','external_link'),
        ),
        array(
			'id'        => 'login_link_internal',
            'type'      => 'text',
			'title'     => esc_html__('Login Link', 'teciva-toolkit'),
            'required'  => array('login_link_type','equals','internal_link'),
            'desc'      => 'This link work from your site root directory',
        ),

        array(
            'id' => 'logout_btn_text',
            'type' => 'text',
            'title' => __('Logout Button Text', 'vaximo-toolkit'),
            'required' => array('hide_top_header','!=','1'),
            'default' => __("Logout", 'vaximo-toolkit'),
        ),


        
    )
) );

// -> START Header
Redux::setSection( $opt_name, array(
    'title'            => __( 'Header', 'vaximo-toolkit' ),
    'id'               => 'header',
    'customizer'       => false,
    'icon'             => 'el el-website',
    'fields'     => array(
        array(
            'id' => 'enable_header_btn',
            'type' => 'switch',
            'title' => __('Enable Header Button', 'vaximo-toolkit'),
            'default' => '1'
        ),
        array(
            'id' => 'header_btn_text',
            'type' => 'text',
            'title' => __('Header Button Text', 'vaximo-toolkit'),
            'required' => array('enable_header_btn','equals','1'),
            'default' => __("Get A Quote", 'vaximo-toolkit'),
        ),
        array(
            'id' => 'btn_link_type',
            'type' => 'select',
            'options' => array(
                'link_to_page'        => 'Link To Page',
                'external_link'       => 'External Link',
            ),
            'title'     => __( 'Choose Link Type', 'vaximo-toolkit' ),
            'default'   => 'link_to_page',
            'required'  => array('enable_header_btn','equals','1'),
        ),
        // array(
        //     'id'        => 'btn_page_link',
        //     'type'      => 'select',
        //     'options'   => vaximo_toolkit_get_page_as_list(),
        //     'title'     => __( 'Button Link', 'vaximo-toolkit' ),
        //     'required'  => array( 'btn_link_type', '=', 'link_to_page' ),
        // ),

        array(
            'id'        => 'btn_page_link',
            'type'      => 'text',
            'title'     => __( 'Button Link', 'vaximo-toolkit' ),
            'required'  => array( 'btn_link_type', '=', 'link_to_page' ),
        ),
        array(
            'id'       => 'btn_ex_link',
            'type'     => 'text',
            'title'    => __( 'Button Link', 'vaximo-toolkit' ),
            'required' => array( 'btn_link_type', '=', 'external_link' ),
            'default'  => __('#', 'vaximo-toolkit'),
        ),
        array(
            'id' => 'enable_header_contact',
            'type' => 'switch',
            'title' => __('Enable Header Contact Number', 'vaximo-toolkit'),
            'default' => '1'
        ),
        array(
            'id'        => 'header_contact',
            'type'      => 'text',
            'title'     => __( 'Contact Number', 'vaximo-toolkit' ),
            'required'  => array('enable_header_contact','equals','1'),
        ),
        array(
            'id'        => 'header_contact_link',
            'type'      => 'text',
            'title'     => __( 'Contact Link', 'vaximo-toolkit' ),
            'required'  => array('enable_header_contact','equals','1'),
        ),
        array(
			'id'        => 'search_placeholder_text',
            'type'      => 'text',
			'title'     => esc_html__('Search Placeholder Text', 'vaximo-toolkit'),
        ),

        array(
            'id'      => 'choose_header_style',
            'type'    => 'select',
            'options' => array(
                'style_01'   => 'Style One',
                'style_02'   => 'Style Two',
                'style_03'   => 'Style Three',
                'style_04'   => 'Style Four',
                'style_05'   => 'Style Five',
            ),
            'title'     => esc_html__( 'Choose Header Style', 'vaximo-toolkit' ),
            'desc'     => esc_html__( 'The option is for blog, single blog and all custom post single', 'vaximo-toolkit' ),
            'default'   => 'style_02',
        ),

    )
) );

// -> Header Modal
Redux::setSection( $opt_name, array(
    'title'            => __( 'Modal', 'vaximo-toolkit' ),
    'id'               => 'header_modal',
    'customizer'       => false,
    'icon'             => 'el el-website',
    'fields'     => array(
        array(
            'id'        => 'enable_burger_menu',
            'type'      => 'switch',
            'title'     => __('Enable Modal?', 'vaximo-toolkit'),
            'default'   => '1'
        ),
        array(
            'id'        => 'enable_burger_memu_mob',
            'type'      => 'switch',
            'title'     => __('Enable Modal in Mobile Device?', 'vaximo-toolkit'),
            'required'  => array('enable_burger_menu','equals','1'),
            'default'   => '1'
        ),
        array(
            'id'        => 'enable_burger_memu_ipad',
            'type'      => 'switch',
            'title'     => __('Enable Modal in Tablet?', 'vaximo-toolkit'),
            'required'  => array('enable_burger_menu','equals','1'),
            'default'   => '1'
        ),
        array(
            'id'        => 'modal_info',
            'type'      => 'textarea',
            'title'     => __( 'Modal Information', 'vaximo-toolkit' ),
            'required'  => array('enable_burger_menu','equals','1'),
        ),
        array(
            'id'        => 'modal_contact',
            'type'      => 'text',
            'title'     => __( 'Contact Us', 'vaximo-toolkit' ),
            'required'  => array('enable_burger_menu','equals','1'),
        ),
        array(
            'id'       => 'modal_contact_info',
            'type'     => 'editor',
            'title'    => __('Modal Contact Information', 'vaximo-toolkit'),
            'subtitle' => __('HTML and Shortcodes are allowed', 'vaximo-toolkit'),
            'desc'     => '',
            'args'     => array(
                'teeny' => true,
                'media_buttons' => false
            ),
            'required'  => array('enable_burger_menu','equals','1'),
        ),

        array(
            'id'      => 'social_link',
            'type'    => 'switch',
            'title'   => __( 'Social Link', 'vaximo-toolkit' ),
            'on'      => __( 'Enable', 'vaximo-toolkit' ),
            'off'     => __( 'Disable', 'vaximo-toolkit' ),
            'default' => false,
            'required' => array('enable_burger_menu','equals','1'),
        ),
        array(
            'id'        => 'follow_text',
            'type'      => 'text',
            'title'     => __( 'Follow Text', 'vaximo-toolkit' ),
            'required'  => array('social_link','equals','1'),
        ),
    )
) );

// Banner
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Banner', 'vaximo-toolkit' ),
    'id'                => 'banner_options',
    'customizer'        => false,
    'icon'              => 'el el-website',
    'fields'     => array(  
        array(
            'id'        => 'page_title_tag',
            'type'      => 'select',
            'title'     => esc_html__( 'Banner Title Tag', 'vaximo-toolkit' ),
            'options' => array(
                'h1'         => esc_html__( 'h1', 'vaximo-toolkit' ),
                'h2'         => esc_html__( 'h2', 'vaximo-toolkit' ),
                'h3'         => esc_html__( 'h3', 'vaximo-toolkit' ),
                'h4'         => esc_html__( 'h4', 'vaximo-toolkit' ),
                'h5'         => esc_html__( 'h5', 'vaximo-toolkit' ),
                'h6'         => esc_html__( 'h6', 'vaximo-toolkit' ),
            ),
            'default' => 'h2',
            'output'    => '.page-title-area .page-title-content h1, .page-title-area .page-title-content h2, .page-title-area .page-title-content h3, .page-title-area .page-title-content h4, .page-title-area .page-title-content h5, .page-title-area .page-title-content h6'
        ),
        array(
            'id'        => 'titlebar_title_typo',
            'type'      => 'typography',
            'text-align'    => false,
            'title'     => esc_html__( 'Title Typography', 'vaximo-toolkit' ),
            'output'    => '.page-title-area .page-title-content h1, .page-title-area .page-title-content h2, .page-title-area .page-title-content h3, .page-title-area .page-title-content h4, .page-title-area .page-title-content h5, .page-title-area .page-title-content h6'
        ),
        array(
            'id'        => 'titlebar_desc_typo',
            'type'      => 'typography',
            'text-align'    => false,
            'title'     => esc_html__( 'Breadcumb Typography', 'vaximo-toolkit' ),
            'output'    => '.page-title-area .page-title-content ul li a, .page-title-area .page-title-content ul li'
        ),
        array(
            'title'     => esc_html__( 'Banner Padding', 'vaximo-toolkit' ),
            'subtitle'  => esc_html__( 'Padding around the Banner.', 'vaximo-toolkit' ),
            'id'        => 'banner_padding',
            'type'      => 'spacing',
            'output'    => array( '.page-title-area' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),
            'units_extended' => 'true',
        ), 
    ),
) );

// Custom Post
Redux::setSection( $opt_name, array(
    'title'         => __( 'Custom Posts Settings', 'vaximo-toolkit' ),
    'id'            => 'vaximo_custom_posts',
    'customizer'    => false,
    'icon'          => 'el el-file-edit',
    'desc'          => 'Manage your services and projects settings.',
    'fields' => array(
        array(
			'id'        => 'hide_service_banner',
            'type'      => 'switch',
            'title'     => __('Hide Single Services Banner', 'vaximo-toolkit'),
            'default'   => '0'
        ),
        array(
			'id'          => 'hide_services_breadcrumb',
            'type'        => 'switch',
			'title'       => __('Hide Single Services Breadcrumb', 'vaximo-toolkit'),
            'default'     => '0',
            'required'    => array('hide_service_banner','equals','0'),
        ),
        array(
			'id'        => 'hide_project_banner',
            'type'      => 'switch',
            'title'     => __('Hide Single Projects Banner', 'vaximo-toolkit'),
            'default'   => '0'
        ),
        array(
			'id'          => 'hide_projects_breadcrumb',
            'type'        => 'switch',
			'title'       => __('Hide Single Projects Breadcrumb', 'vaximo-toolkit'),
            'default'     => '0',
            'required'    => array('hide_project_banner','equals','0'),
        ),

        array(
            'id'        => 'vaximo_slug_note',
            'type'      => 'info',
            'style'     => 'warning',
            'title'     => esc_html__( 'Slug Re-write:', 'vaximo-toolkit' ),
            'icon'      => 'dashicons dashicons-info',
            'desc'      => sprintf (
                '%1$s <a href="%2$s"> %3$s</a> %4$s',
                esc_html__( "These are the custom post's slugs offered by vaximo. You can customize the permalink structure (site_domain/post_type_slug/post_lug) by changing the slug from here. Don't forget to save the permalinks settings from", 'vaximo-toolkit' ),
                get_admin_url( null, 'options-permalink.php' ),
                esc_html__( 'Settings > Permalinks', 'vaximo-toolkit' ),
                esc_html__( 'after changing the slug value.', 'vaximo-toolkit' )
            )
        ),
        
        array(
            'id'       => 'service_permalink',
            'type'     => 'text',
            'title'    => __( 'Services Slug', 'vaximo-toolkit' ),
            'default'  => __('service-post', 'vaximo-toolkit'),
            'desc'     => '<p>After changing the permalink go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
        ),
        array(
            'id'       => 'project_permalink',
            'type'     => 'text',
            'title'    => __( 'Projects Slug', 'vaximo-toolkit' ),
            'default'  => __('project-post', 'vaximo-toolkit'),
            'desc'     => '<p>After changing the permalink go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
        ),
    ) 
));

Redux::setSection( $opt_name, array(
	'title'     => esc_html__( 'Services', 'vaximo-toolkit' ),
	'id'        => 'services_settings',
	'icon'      => '',
    'subsection' => true,
	'fields'    => array(
        
        array(
            'title'     => esc_html__( 'Related Services ', 'vaximo-toolkit' ),
            'id'        => 'is_services_related_posts',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'vaximo-toolkit' ),
            'off'       => esc_html__( 'Hide', 'vaximo-toolkit' ),
        ),
		array(
			'title'     => esc_html__( 'Services Related Title', 'vaximo-toolkit' ),
			'id'        => 'services_related_posts_title',
			'type'      => 'text',
			'default'   => esc_html__( 'Related Post', 'vaximo-toolkit' ),
            'required'  => array( 'is_services_related_posts', '=', '1' )
        ),
		array(
			'title'     => esc_html__( 'Services Related Read More Text', 'vaximo-toolkit' ),
			'id'        => 'service_readmore_label',
			'type'      => 'text',
			'default'   => esc_html__( 'Read More ', 'vaximo-toolkit' ),
            'required'  => array( 'is_services_related_posts', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'Related Services Count', 'vaximo-toolkit' ),
            'id'        => 'related_services_post',
            'type'      => 'slider',
            'default'       => 3,
            'min'           => 3,
            'step'          => 1,
            'max'           => 50,
            'display_value' => 'label',
            'required'      => array( 'is_services_related_posts', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'Related Services Excerpt', 'vaximo-toolkit' ),
            'id'        => 'related_services_excerpt',
            'type'      => 'slider',
            'default'       => 15,
            'min'           => 10,
            'step'          => 1,
            'max'           => 200,
            'display_value' => 'label',
            'required'      => array( 'is_services_related_posts', '=', '1' )
        ),
        array(
			'title'     => esc_html__( 'Number Of Post Title in Sidebar', 'vaximo-toolkit' ),
			'id'        => 'title_number',
			'type'      => 'text',
			'default'   => esc_html__( '7', 'vaximo-toolkit' ),
        ),
        array(
			'id' => 'ser_side_orderby',
			'type' => 'select',
			'options' => array(
				'date'            => 'Date',
				'title'           => 'Title',
				'menu_order'      => 'Menu Order',
				'rand'            => 'Random',
			),
			'title'     => __( 'Services Sidebar Posts Order By', 'vaximo-toolkit' ),
			'default'   => 'date',
		),
		array(
			'id' => 'ser_side_order',
			'type' => 'select',
			'options' => array(
				'ASC'            => 'Ascending',
				'DESC'           => 'Descending',
			),
			'title'     => __( 'Services Sidebar Posts Order', 'vaximo-toolkit' ),
			'default'   => 'DESC',
		),
        array(
            'title'     => esc_html__( 'Contact Info', 'vaximo-toolkit' ),
            'id'        => 'is_service_contact_info',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'vaximo-toolkit' ),
            'off'       => esc_html__( 'Hide', 'vaximo-toolkit' ),
        ),
        array(
			'title'     => esc_html__( 'Title', 'vaximo-toolkit' ),
			'id'        => 'contact_info_title',
			'type'      => 'text',
			'default'   => esc_html__( 'Contact Info', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_contact_info', '=', '1' )
        ),
        array(
			'title'     => esc_html__( 'Phone Label', 'vaximo-toolkit' ),
			'id'        => 'phone_label',
			'type'      => 'text',
			'default'   => esc_html__( 'Phone:', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_contact_info', '=', '1' )
        ),
        array(
			'title'     => esc_html__( 'Phone Number', 'vaximo-toolkit' ),
			'id'        => 'phone_number',
			'type'      => 'text',
			'default'   => esc_html__( '+1-202-555-0122', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_contact_info', '=', '1' )
        ),
        array(
			'title'     => esc_html__( 'Phone Number Link', 'vaximo-toolkit' ),
			'id'        => 'phone_number_link',
			'type'      => 'text',
			'default'   => esc_html__( 'tel:+1-202-555-0122', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_contact_info', '=', '1' )
        ),
        array(
			'title'     => esc_html__( 'Location Label', 'vaximo-toolkit' ),
			'id'        => 'location_label',
			'type'      => 'text',
			'default'   => esc_html__( 'Location:', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_contact_info', '=', '1' )
        ),
        array(
			'title'     => esc_html__( 'Location', 'vaximo-toolkit' ),
			'id'        => 'location_number',
			'type'      => 'text',
			'default'   => esc_html__( 'New York, USA', 'vaximo-toolkit' ),
            'desc'     => '<p>You can add several locations here. Use * to add a new location</p>',
            'required'  => array( 'is_service_contact_info', '=', '1' ),
        ),
        array(
			'title'     => esc_html__( 'Email Label', 'vaximo-toolkit' ),
			'id'        => 'email_label',
			'type'      => 'text',
			'default'   => esc_html__( 'Email:', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_contact_info', '=', '1' )
        ),
        array(
			'title'     => esc_html__( 'Email Number', 'vaximo-toolkit' ),
			'id'        => 'email_address',
			'type'      => 'text',
			'default'   => esc_html__( 'hello@vaximo.com', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_contact_info', '=', '1' )
        ),
        array(
			'title'     => esc_html__( 'Email Number Link', 'vaximo-toolkit' ),
			'id'        => 'email_address_link',
			'type'      => 'text',
			'default'   => esc_html__( 'mailto:hello@vaximo.com', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_contact_info', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'Brochures', 'vaximo-toolkit' ),
            'id'        => 'is_service_brochures',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'vaximo-toolkit' ),
            'off'       => esc_html__( 'Hide', 'vaximo-toolkit' ),
        ),
        array(
			'title'     => esc_html__( 'Brochures Title', 'vaximo-toolkit' ),
			'id'        => 'brochures_title',
			'type'      => 'text',
			'default'   => esc_html__( 'Brochures', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_brochures', '=', '1' )
        ),
        array(
			'title'     => esc_html__( '1st Brochure Title', 'vaximo-toolkit' ),
			'id'        => '1st_brochure_title',
			'type'      => 'text',
			'default'   => esc_html__( 'PDF Download', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_brochures', '=', '1' )
        ),
        array(
			'title'     => esc_html__( '1st Brochure Link', 'vaximo-toolkit' ),
			'id'        => '1st_brochure_link',
			'type'      => 'text',
			'default'   => esc_html__( 'http://www.africau.edu/images/default/sample.pdf', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_brochures', '=', '1' )
        ),

        array(
			'title'     => esc_html__( '2nd Brochure Title', 'vaximo-toolkit' ),
			'id'        => '2nd_brochure_title',
			'type'      => 'text',
			'default'   => esc_html__( 'Services Details.txt', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_brochures', '=', '1' )
        ),
        array(
			'title'     => esc_html__( '2nd Brochure Link', 'vaximo-toolkit' ),
			'id'        => '2nd_brochure_link',
			'type'      => 'text',
			'default'   => esc_html__( 'http://www.africau.edu/images/default/sample.pdf', 'vaximo-toolkit' ),
            'required'  => array( 'is_service_brochures', '=', '1' )
        ),

        array(
            'id' => 'vaximo_service_sidebar',
            'type' => 'select',
            'options' => array(
                'vaximo_with_sidebar'              => 'With Sidebar',
                'vaximo_without_sidebar'           => 'Without Sidebar ( full width )',
                'vaximo_without_sidebar_center'    => 'Without Sidebar( center )',
            ),
            'title'     => __( 'Services Sidebar', 'vaximo-toolkit' ),
            'default'   => 'vaximo_with_sidebar',
        ),
        array(
            'id' => 'vaximo_ser_sidebar_position',
            'type' => 'select',
            'options' => array(
                'vaximo_with_right'          => 'Right Sidebar',
                'vaximo_with_left'           => 'Left Sidebar',
            ),
            'title'     => __( 'Services Sidebar Position', 'vaximo-toolkit' ),
            'default'   => 'vaximo_with_right',
            'required'  => array( 'vaximo_service_sidebar', '=', 'vaximo_with_sidebar' )
        ),

	)
));

// Social Profiles
Redux::setSection( $opt_name, array(
	'title' => __('Social Profiles', 'vaximo-toolkit'),
	'desc'  => 'Social profiles are used in different places inside the theme.',
	'icon'  => 'el-icon-user',
	'customizer' => false,
	'fields' => array(
        array(
            'id' => 'vaximo_social_target',
            'type' => 'select',
            'options' => array(
                '_blank'    => 'Load in a new window. ( _blank )',
                '_self'     => 'Load in the same frame as it was clicked. ( _self )',
                '_parent'   => 'Load in the parent frameset. ( _parent )',
                '_top'      => 'Load in the full body of the window ( _top )',
            ),
            'title'     => __( 'Social Link Target', 'vaximo-toolkit' ),
            'default'   => '_blank',
        ),
        
        array(
			'id'    => 'twitter_url',
            'type'  => 'text',
			'title' => __('Twitter URL', 'vaximo-toolkit')
		),
		array(
			'id'    => 'facebook_url',
			'type'  => 'text',
			'title' => __('Facebook URL', 'vaximo-toolkit')
		),
		array(
			'id'    => 'instagram_url',
			'type'  => 'text',
			'title' => __('Instagram URL', 'vaximo-toolkit')
		),
		array(
			'id'    => 'linkedin_url',
			'type'  => 'text',
			'title' => __('Linkedin URL', 'vaximo-toolkit')
		),
		array(
			'id'    => 'pinterest_url',
			'type'  => 'text',
			'title' => __('Pinterest URL', 'vaximo-toolkit')
		),
		array(
			'id'    => 'dribbble_url',
			'type'  => 'text',
			'title' => __('Dribbble URL', 'vaximo-toolkit')
		),
		array(
			'id'    => 'tumblr_url',
			'type'  => 'text',
			'title' => __('Tumblr URL', 'vaximo-toolkit')
		),
		array(
			'id'    => 'youtube_url',
			'type'  => 'text',
			'title' => __('Youtube URL', 'vaximo-toolkit')
		),
		array(
			'id'    => 'flickr_url',
			'type'  => 'text',
			'title' => __('Flickr URL', 'vaximo-toolkit')
		),
		array(
			'id'    => 'behance_url',
			'type'  => 'text',
			'title' => __('Behance URL', 'vaximo-toolkit'),
		),
		array(
			'id'    => 'github_url',
			'type'  => 'text',
			'title' => __('Github URL', 'vaximo-toolkit'),
		),
		array(
			'id'    => 'skype_url',
			'type'  => 'text',
			'title' => __('Skype URL', 'vaximo-toolkit'),
		),
		array(
			'id'    => 'rss_url',
			'type'  => 'text',
			'title' => __('RSS URL', 'vaximo-toolkit')
		),
	)
) );

// START Styling 
Redux::setSection( $opt_name, array(
    'title'            =>  __( 'Styling Options', 'vaximo-toolkit' ),
    'id'               => 'styling_options',
    'customizer' => false,
    'icon'             => ' el el-magic',
    'fields'     => array(
        array(
            'id' => 'primary_color',
            'type' => 'color',
            'title' => __('Primary Color', 'vaximo-toolkit'),
            'default' => '#d80650',
            'output'      => array(
                '--mainColor' => ':root',
            ),
            'validate' => 'color',
            'transparent' => false
        ),

        array(
            'id'            => 'theme_gradient_bg_color',
            'type'          => 'color_gradient',
            'title'         => __('Theme Gradient Background Color', 'vaximo-toolkit'),
            'transparent'   => false,
            'validate'      => 'color',
            'default'  => array(
                'from' => '#d2044d',
                'to'   => '#ff5e68', 
            ),
        ),
        array(
            'id'            => 'theme_gradient_bg2_color',
            'type'          => 'color_gradient',
            'title'         => __('Theme Gradient Background Color Two', 'vaximo-toolkit'),
            'transparent'   => false,
            'validate'      => 'color',
            'default'  => array(
                'from' => '#603364',
                'to'   => '#7F3668', 
            ),
        ),
        array(
            'id'            => 'theme_gradient_bg3_color',
            'type'          => 'color_gradient',
            'title'         => __('Theme Gradient Background Color Three', 'vaximo-toolkit'),
            'transparent'   => false,
            'validate'      => 'color',
            'default'  => array(
                'from' => '#2A82D9',
                'to'   => '#5AD1E6', 
            ),
        ),

        array(
            'id'          => 'top_header_textcolor',
            'type'        => 'color',
            'title'       => __('Top Header One Text Color', 'vaximo-toolkit'),
            'default'     => '#ffffff',
            'validate'    => 'color',
            'transparent' => false,
        ),
        array(
            'id'          => 'top_header_one_bg',
            'type'        => 'color',
            'title'       => __('Top Header One Background Color', 'vaximo-toolkit'),
            'validate'    => 'color',
            'transparent' => true,
            'output'      => array(
                'background-color' => '.header-area .top-header-area',
            ),
        ),

        array(
            'id'          => 'nav_item',
            'type'        => 'color',
            'title'       => __('Nav Item Color', 'vaximo-toolkit'),
            'default'     => '#ffffff',
            'validate'    => 'color',
            'transparent' => false
        ),

        array(
            'id'          => 'header_one_bg',
            'type'        => 'color',
            'title'       => __('Header One Background Color', 'vaximo-toolkit'),
            'validate'    => 'color',
            'transparent' => true,
            'output'      => array(
                'background-color' => '.nav-area .navbar-area .main-nav',
            ),
        ),

        array(
            'id'          => 'header_bg',
            'type'        => 'color',
            'title'       => __('Header Two Background Color', 'vaximo-toolkit'),
            'validate'    => 'color',
            'default'     => '#010414',
            'transparent' => true,
        ),

        array(
            'id'          => 'top_headerbg',
            'type'        => 'color',
            'title'       => __('Top Header Background(Style 3)', 'vaximo-toolkit'),
            'default'     => '#f9f9f9',
            'validate'    => 'color',
            'output'      => array(
                'background-color' => '.header-area-six .top-header-area',
            ),
            'transparent' => false,
        ),

        array(
            'id'          => 'top_header3_textcolor',
            'type'        => 'color',
            'title'       => __('Top Header Text Color(Style 3)', 'vaximo-toolkit'),
            'default'     => '#0e0129',
            'validate'    => 'color',
            'output'      => array(
                'color' => '.header-area-six .top-header-area .header-content-left li a, .header-area-six .top-header-area .header-content-right .log-in-sign-up li a',
            ),
            'transparent' => false,
        ),

        array(
            'id'          => 'header_bg3',
            'type'        => 'color',
            'title'       => __('Header Three Background Color', 'vaximo-toolkit'),
            'validate'    => 'color',
            'output'      => array(
                'background-color' => '.nav-area-six .navbar-area .main-nav',
            ),
            'transparent' => true,
        ),
        array(
            'id'          => 'nav_item2',
            'type'        => 'color',
            'title'       => __('Nav Item Color( Style 3)', 'vaximo-toolkit'),
            'default'     => '#0e0129',
            'validate'    => 'color',
            'output'      => array(
                'color' => '.nav-area-six .navbar-area .main-nav nav .navbar-nav .nav-item a',
            ),
            'transparent' => false
        ),
        array(
            'id' => 'sticky_header_bg',
            'type' => 'color',
            'title' => __('Sticky Header Background Color', 'vaximo-toolkit'),
            'default' => '#0e0129',
            'validate' => 'color',
            'transparent' => true
        ),
        array(
            'id'          => 'page_bg',
            'type'        => 'color',
            'title'       => __('Page Background Color', 'vaximo-toolkit'),
            'validate'    => 'color',
            'default'     => '#0e0129',
            'transparent' => true,
        ),
       
        array(
            'id'          => 'top_header_bg_one',
            'type'        => 'color',
            'title'       => __('Mobile Nav Top Header Background Color', 'vaximo-toolkit'),
            'validate'    => 'color',
            'default'     => '#25245e',
            'transparent' => true,
        ),
        array(
            'id'          => 'top_header_bg_six',
            'type'        => 'color',
            'title'       => __('Mobile Nav Top Header Six Background Color', 'vaximo-toolkit'),
            'validate'    => 'color',
            'default'     => '#f9f9f9',
            'transparent' => true,
        ),
        array(
            'id'          => 'mobile_nav_bg',
            'type'        => 'color',
            'title'       => __('Mobile Nav Background Color', 'vaximo-toolkit'),
            'validate'    => 'color',
            'default'     => '#25245e',
            'transparent' => true,
        ),

        array(
            'id' => 'mobile_click_color',
            'type' => 'color',
            'title' => __('Clickable Menu Color(Mobile Device)', 'vaximo-toolkit'),
            'validate' => 'color',
            'output'      => array(
                'background-color' => '.mean-container a.meanmenu-reveal span',
                'color' => '.mean-container a.meanmenu-reveal',
            ),
            'transparent' => false
        ),

        array(
            'id' => 'theme_pink_bg',
            'type' => 'color',
            'title' => __('Pink Color Change', 'vaximo-toolkit'),
            'validate' => 'color',
            'output'      => array(
                'background-color' => '.performance-area .single-security span::after, .performance-area .single-security span::before, .services-details .choose-wrap',
            ),
            'transparent' => false
        ),
    )
) );

// Navbar style four
Redux::setSection( $opt_name, array(
	'title'     => esc_html__( 'Navbar Style Four', 'vaximo-toolkit' ),
	'id'        => 'head_stl4_settings',
	'icon'      => '',
    'subsection' => true,
	'fields'    => array(
        array(
            'id'            => 'header4_bg',
            'type'          => 'color',
            'title'         => esc_html__('Header Background Color.', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'background-color' => '.seku-new-nav-area .navbar-area .main-nav',
            ),
        ),
        array(
            'id'            => 'nav_item4_color',
            'type'          => 'color',
            'title'         => esc_html__('Nav Item Color', 'cyarb-toolkit'),
            'default'       => '#0e0129',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.seku-new-nav-area .navbar-area .main-nav nav .navbar-nav .nav-item a, .seku-new-nav-area .others-option .option-item .search-btn, .seku-new-nav-area .navbar-brand h2',
            ),
        ),
        array(
            'id'            => 'nav_item4_hover_color',
            'type'          => 'color',
            'title'         => esc_html__('Nav Item Hover Color', 'cyarb-toolkit'),
            'default'       => '#d80650',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.seku-new-nav-area .navbar-area .main-nav nav .navbar-nav .nav-item a:hover, .seku-new-nav-area .others-option .option-item .search-btn:hover',
            ),
        ),
        
	)
));
// Navbar style five
Redux::setSection( $opt_name, array(
	'title'     => esc_html__( 'Navbar Style Five', 'vaximo-toolkit' ),
	'id'        => 'head_stl5_settings',
	'icon'      => '',
    'subsection' => true,
	'fields'    => array(
        array(
            'id'            => 'top5_bg',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Background Color.', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'background-color' => '.new-top-header-area',
            ),
        ),
        array(
            'id'            => 'top5_text_color',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Text Color', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.new-top-header-area .header-content-left li a, .new-top-header-area .header-content-left li, .new-top-header-area .header-content-right li a, .new-top-header-area .header-content-left li i',
            ),
        ),
        array(
            'id'            => 'top5_text_hcolor',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Text Hover Color', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.new-top-header-area .header-content-left li a:hover, .new-top-header-area .header-content-right li a:hover, .new-top-header-area .header-content-right li:hover a i, .new-top-header-area .header-content-left li:hover a, .new-top-header-area .header-content-left li:hover a i',
            ),
        ),
        array(
            'id'            => 'header5_bg',
            'type'          => 'color',
            'title'         => esc_html__('Header Background Color.', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'background-color' => '.seku-new-nav-area.nav-with-black-color .navbar-area .main-nav',
            ),
        ),
        array(
            'id'            => 'nav_item5_color',
            'type'          => 'color',
            'title'         => esc_html__('Nav Item Color', 'cyarb-toolkit'),
            'default'       => '#fff',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.seku-new-nav-area.nav-with-black-color .navbar-area .main-nav nav .navbar-nav .nav-item a, .seku-new-nav-area.nav-with-black-color .others-option .option-item .search-btn, .seku-new-nav-area.nav-with-black-color .navbar-brand h2',
            ),
        ),
        array(
            'id'            => 'nav_item5_hover_color',
            'type'          => 'color',
            'title'         => esc_html__('Nav Item Hover Color', 'cyarb-toolkit'),
            'default'       => '#fff',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.seku-new-nav-area.nav-with-black-color .navbar-area .main-nav nav .navbar-nav .nav-item a:hover, .seku-new-nav-area.nav-with-black-color .others-option .option-item .search-btn:hover',
            ),
        ),
        
	)
));
//  New Navbar style 
Redux::setSection( $opt_name, array(
	'title'     => esc_html__( 'Navbar Style Six And Eight', 'vaximo-toolkit' ),
	'id'        => 'head_stl6_settings',
	'icon'      => '',
    'subsection' => true,
	'fields'    => array(
        array(
            'id'            => 'top6_bg',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Background Color.', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'background' => '.gradient-top-header-area, .gradient-top-header-area.wrap2, .gradient-top-header-area',
            ),
        ),
        array(
            'id'            => 'top6_text_color',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Text Color', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.gradient-top-header-info li span a, .gradient-top-header-info li span',
            ),
        ),
        array(
            'id'            => 'top6_text_ic_color',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Icon Color', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.gradient-top-header-info li i',
            ),
        ),
        array(
            'id'            => 'top6_text_hcolor',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Text Hover Color', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.gradient-top-header-info li span a:hover',
            ),
        ),
        array(
            'id'            => 'top6_text_mcolor',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Midle Text Color', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.gradient-top-header-middle span',
            ),
        ),
        array(
            'id'            => 'top6_text_micolor',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Midle Text Icon Color', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.gradient-top-header-middle i',
            ),
        ),
        array(
            'id'            => 'top6_text_btncolor',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Midle Btn Color', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.gradient-top-header-middle span a',
            ),
        ),
        array(
            'id'            => 'top6_text_btn_hcolor',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Midle Btn Hover Color', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.gradient-top-header-middle span a:hover',
            ),
        ),
        array(
            'id'            => 'top6_s_icon_color',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Social Icon Color', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.gradient-top-header-social li a i',
            ),
        ),
        array(
            'id'            => 'top6_s_icon_hcolor',
            'type'          => 'color',
            'title'         => esc_html__('Top Header Social Icon  Hove Color', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.gradient-top-header-social li a i:hover',
            ),
        ),
        array(
            'id'            => 'header6_bg',
            'type'          => 'color',
            'title'         => esc_html__('Header Background Color.', 'cyarb-toolkit'),
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'background-color' => '.government-cyber-defense-navbar .navbar-area .main-nav',
            ),
        ),
        array(
            'id'            => 'nav_item6_color',
            'type'          => 'color',
            'title'         => esc_html__('Nav Item Color', 'cyarb-toolkit'),
            'default'       => '#fff',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.government-cyber-defense-navbar .navbar-area .main-nav nav .navbar-nav .nav-item a',
            ),
        ),
        array(
            'id'            => 'nav_item6_hover_color',
            'type'          => 'color',
            'title'         => esc_html__('Nav Item Hover Color', 'cyarb-toolkit'),
            'default'       => '#48b3e1',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                'color' => '.government-cyber-defense-navbar .navbar-area .main-nav nav .navbar-nav .nav-item.active a, .government-cyber-defense-navbar .navbar-area .main-nav nav .navbar-nav .nav-item.active a:hover, .ai-navbar .navbar-area .main-nav nav .navbar-nav .nav-item.active a, .ai-navbar .navbar-area .main-nav nav .navbar-nav .nav-item a:hover',
            ),
        ),
        
	)
));

// Button Styling 
Redux::setSection( $opt_name, array(
    'title'            =>  __( 'Button Styling', 'vaximo-toolkit' ),
    'id'               => 'btnstyling_options',
    'customizer'       => false,
    'icon'             => ' el el-magic',
    'fields'     => array(
        array(
            'id'          => 'default_btn_color',
            'type'        => 'color',
            'title'       => __('Default Button Color', 'vaximo-toolkit'),
            'validate'    => 'color',
            'output'      => array(
                'color' => '.default-btn',
            ),
            'transparent' => false
        ),
        array(
            'id'          => 'default_btn_hcolor',
            'type'        => 'color',
            'title'       => __('Default Button Hover Color', 'vaximo-toolkit'),
            'validate'    => 'color',
            'output'      => array(
                'color' => '.default-btn:hover',
            ),
            'transparent' => false
        ),
        array(
            'id'          => 'btn_bg_color',
            'type'        => 'color',
            'title'       => __('Default Button Background Color', 'vaximo-toolkit'),
            'output'      => array(
                'background' => '.default-btn, .seku-new-nav-area .others-option .option-item .default-btn',
            ),
            'transparent' => false
        ),
        array(
            'id'          => 'btn_bg_hcolor',
            'type'        => 'color',
            'title'       => __('Default Button Background Hoover Color', 'vaximo-toolkit'),
            'output'      => array(
                'background' => '.default-btn::before,.default-btn::after',
            ),
            'transparent' => false
        ),
        array(
            'title'     => esc_html__( 'Default Button Padding', 'vaximo-toolkit' ),
            'subtitle'  => esc_html__( 'Padding around the Button', 'vaximo-toolkit' ),
            'id'        => 'def_btn_padding',
            'type'      => 'spacing',
            'output'    => array( '.default-btn, .nav-area .others-option .get-quote .default-btn, .seku-new-nav-area .others-option .option-item .default-btn' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),
            'units_extended' => 'true',
        ), 
        array(
            'id'        => 'vaximo_blcbutton_note',
            'type'      => 'info',
            'style'     => 'warning',
            'title'     => esc_html__( 'Button Two Styling', 'vaximo-toolkit' ),
        ),
        array(
            'id'            => 'btn_gradient_bg_color',
            'type'          => 'color_gradient',
            'title'         => __('Button Gradient Background Color', 'vaximo-toolkit'),
            'transparent'   => false,
            'validate'      => 'color',
            'default'  => array(
                'from' => '#d2044d',
                'to'   => '#ff5e68', 
            ),
        ),

    )
) );

// START Blog Area
Redux::setSection( $opt_name, array(
    'title'            => __( 'Blog', 'vaximo-toolkit' ),
    'id'               => 'vaximo_blog',
    'customizer' => false,
    'icon'             => 'el el-file-edit',
    'fields' => array(
        array(
            'id'       => 'post_read_more',
            'type'     => 'text',
            'title'    => __( 'Posts Read More Button Text', 'vaximo-toolkit' ),
        ),
        array(
			'id'    => 'vaximo_search_page',
            'type'  => 'switch',
            'title' => __('Enable Pages on Search Result Page', 'vaximo-toolkit'),
        ),
        array(
			'id'    => 'hide_blog_banner',
            'type'  => 'switch',
            'title' => __('Hide Blog Banner', 'vaximo-toolkit'),
            'default'   => '0'
        ),
        array(
            'id'       => 'blog_title',
            'type'     => 'text',
            'title'    => __( 'Posts Page Banner Title', 'vaximo-toolkit' ),
            'required' => array('hide_blog_banner','equals','0'),
        ),

        array(
			'id'    => 'hide_breadcrumb',
            'type'  => 'switch',
			'title' => __('Hide Blog Breadcrumb', 'vaximo-toolkit'),
            'default'   => '0',
            'required'      => array('hide_blog_banner','equals','0'),
        ),

        array(
            'id' => 'vaximo_blog_layout',
            'type' => 'select',
            'options' => array(
                'container'                 => esc_html__( 'Container', 'vaximo-toolkit' ),
                'container-fluid'           => esc_html__( 'Container Fluid', 'vaximo-toolkit' ),
            ),
            'title'     => esc_html__( 'Blog Width', 'vaximo-toolkit' ),
            'default'   => 'container',
        ),
        array(
            'id' => 'vaximo_blog_single_layout',
            'type' => 'select',
            'options' => array(
                'container'                 => esc_html__( 'Container', 'vaximo-toolkit' ),
                'container-fluid'           => esc_html__( 'Container Fluid', 'vaximo-toolkit' ),
            ),
            'title'     => esc_html__( 'Single Blog Width', 'vaximo-toolkit' ),
            'default'   => 'container',
        ),
        array(
            'id' => 'vaximo_blog_grid',
            'type' => 'select',
            'options' => array(
                'col-lg-12 col-md-12'       => esc_html__( 'One Column', 'vaximo-toolkit' ),
                'col-lg-6 col-md-6'         => esc_html__( 'Two Column', 'vaximo-toolkit' ),
                'col-lg-4 col-md-6'         => esc_html__( 'Three Column', 'vaximo-toolkit' ),
                'col-lg-3 col-md-6'         => esc_html__( 'Four Column', 'vaximo-toolkit' ),
            ),
            'title'     => esc_html__( 'Blog Grid System', 'vaximo-toolkit' ),
            'default'   => 'col-lg-12 col-md-12',
        ),

        array(
            'id' => 'vaximo_blog_sidebar',
            'type' => 'select',
            'options' => array(
                'vaximo_with_sidebar'              => 'With Sidebar',
                'vaximo_without_sidebar'           => 'Without Sidebar ( full width )',
                'vaximo_without_sidebar_center'    => 'Without Sidebar( center )',
            ),
            'title'     => __( 'Blog Sidebar', 'vaximo-toolkit' ),
            'default'   => 'vaximo_with_sidebar',
        ),
        array(
            'id'       => 'blog_bg',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Posts Page Banner Background Image', 'vaximo-toolkit' ),
            'required' => array('hide_blog_banner','equals','0'),
        ),
        array(
            'id'       => 'archive_bg',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Archive Page Banner Background Image', 'vaximo-toolkit' ),
        ),
        array(
            'id'       => 'search_bg',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Search Page Banner Background Image', 'vaximo-toolkit' ),
        ),
        array(
			'title'     => __( 'Post meta', 'vaximo-toolkit' ),
			'subtitle'  => __( 'Show/hide post meta', 'vaximo-toolkit' ),
			'id'        => 'is_post_meta',
			'type'      => 'switch',
            'on'        => __( 'Show', 'vaximo-toolkit' ),
            'off'       => __( 'Hide', 'vaximo-toolkit' ),
            'default'   => '1',
        ),
    ) 
));

// WooCommerce Product
Redux::setSection( $opt_name, array(
    'title'         => __( 'WooCommerce Product', 'vaximo-toolkit' ),
    'desc'          => __( 'Manage product page settings.', 'vaximo-toolkit' ),
    'icon'          => 'el-icon-list-alt',
    'customizer'    => false,
    'fields' => array(
        array(
            'id'        => 'enable_shop_pages_banner',
            'type'      => 'switch',
            'title'     => __('Enable WooCommerce Page Banner', 'vaximo-toolkit'),
            'default'   => '0'
        ),
        array(
			'id'    => 'hide_woo_breadcrumb',
            'type'  => 'switch',
			'title' => __('Hide WooCommerce Breadcrumb', 'edali-toolkit'),
            'default'   => '0',
            'required'  => array('enable_shop_pages_banner','equals','1'),
        ),
        array(
            'id'       => 'product_bg_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'WooCommerce Page Background Image', 'vaximo-toolkit' ),
            'required' => array('enable_shop_pages_banner','equals','1'),
        ),
        array(
            'id'        => 'products_page_count',
            'desc'      => __( 'Number of products per page on product pages.', 'vaximo-toolkit' ),
            'type'      => 'text',
            'title'     => __( 'Products per page', 'vaximo-toolkit' ),
            'default'   => '6',
        ),

        array(
            'id' => 'vaximo_product_layout',
            'type' => 'select',
            'options' => array(
                'container'                 => esc_html__( 'Container', 'vaximo-toolkit' ),
                'container-fluid'           => esc_html__( 'Container Fluid', 'vaximo-toolkit' ),
            ),
            'title'     => esc_html__( 'Product Width', 'vaximo-toolkit' ),
            'default'   => 'container',
        ),
        array(
            'id' => 'vaximo_single_product_layout',
            'type' => 'select',
            'options' => array(
                'container'                 => esc_html__( 'Container', 'vaximo-toolkit' ),
                'container-fluid'           => esc_html__( 'Container Fluid', 'vaximo-toolkit' ),
            ),
            'title'     => esc_html__( 'Single Product Width', 'vaximo-toolkit' ),
            'default'   => 'container',
        ),
        array(
            'id'    => 'vaximo_product_sidebar',
            'type'  => 'select',
            'options' => array(
                'vaximo_product_no_sidebar'       => 'None',
                'vaximo_product_left_sidebar'     => 'Sidebar on the left',
                'vaximo_product_right_sidebar'    => 'Sidebar on the right',
            ),
            'title'     => __( 'Product Sidebar Position', 'vaximo-toolkit' ),
            'default'   => 'vaximo_product_no_sidebar',
        ),
        array(
            'id'    => 'vaximo_related_product_count',
            'type'  => 'text',
            'title' => __( 'Product Details Related Product Count', 'vaximo-toolkit' ),
            'desc'  => __( 'e.g. 3', 'vaximo-toolkit' ),
            'default' => '3',
        ),
    ),
));

// Courses Post
Redux::setSection( $opt_name, array(
    'title'         => esc_html__( 'Course Settings', 'vaximo-toolkit' ),
    'id'            => 'vaximo_course',
    'customizer'    => false,
    'icon'          => 'el el-file-edit',
    'desc'          => 'Manage your Course settings.',
    'fields' => array(
        array(
			'id'    => 'hide_course_banner',
            'type'  => 'switch',
            'title' => esc_html__('Hide Course Banner', 'vaximo-toolkit'),
            'default'   => '0'
        ),
        array(
			'id'    => 'hide_course_breadcrumb',
            'type'  => 'switch',
			'title' => esc_html__('Hide Course Breadcrumb', 'vaximo-toolkit'),
            'default'   => '0',
            'required'  => array('hide_course_banner','equals','0'),
        ),
        array(
            'id'       => 'course_banner',
            'type'     => 'media',
            'title'    => esc_html__( 'Course Page Banner Img', 'vaximo-toolkit' ),
            'compiler' => true,
            'required'  => array('hide_course_banner','equals','0'),
        ),
        array(
			'id'    => 'hide_course_title',
            'type'  => 'switch',
			'title' => esc_html__('Hide Course Banner Title', 'vaximo-toolkit'),
            'default'   => '0',
            'required'      => array('hide_course_banner','equals','0'),
        ),
        array(
            'id'       => 'tutor_course_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Tutor Lms Course Page Title Text', 'vaximo-toolkit' ),
            'default'  => esc_html__( 'Courses', 'vaximo-toolkit' ),
            'compiler' => true,
            'required'  => array('hide_course_title','equals','0'),
        ),

        array(
            'id'       => 'tutor_overview',
            'type'     => 'text',
            'title'    => esc_html__( 'Tutor Lms Course Feature Overview', 'vaximo-toolkit' ),
            'desc'     => __('To edit the content of this shortcode card, please go to Dashboard > UAE > Elementor Header & Footer Builder > Courses Feature Overview You can make the necessary changes for your need.', 'vaximo-toolkit'),
        ),

        array(
			'id'    => 'hide_single_course_banner',
            'type'  => 'switch',
            'title' => esc_html__('Hide Single Course Banner', 'vaximo-toolkit'),
            'default'   => '0'
        ),
        array(
			'id'    => 'hide_single_course_breadcrumb',
            'type'  => 'switch',
			'title' => esc_html__('Hide Single Course Breadcrumb', 'vaximo-toolkit'),
            'default'   => '0',
            'required'  => array('hide_single_course_banner','equals','0'),
        ),
        array(
            'id'       => 'single_course_banner',
            'type'     => 'media',
            'title'    => esc_html__( 'Single Course Banner Img', 'vaximo-toolkit' ),
            'compiler' => true,
            'required'  => array('hide_single_course_banner','equals','0'),
        ),
        array(
			'id'    => 'hide_single_course_title',
            'type'  => 'switch',
			'title' => esc_html__('Hide Single Course Banner Title', 'vaximo-toolkit'),
            'default'   => '0',
            'required'      => array('hide_single_course_banner','equals','0'),
        ),

        array(
            'id'       => 'course_tit_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Course Title Text', 'vaximo-toolkit' ),
        ),
        array(
            'id'       => 'price_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Price Label Title', 'vaximo-toolkit' ),
            'default'  => esc_html__( 'Price', 'vaximo-toolkit' ),
        ),
        array(
            'id'       => 'course_level',
            'type'     => 'text',
            'title'    => esc_html__( 'Course Level Title', 'vaximo-toolkit' ),
            'default'  => esc_html__( 'Course Level', 'vaximo-toolkit' ),
        ),
        array(
            'id'       => 'lessons_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Lessons Label Text', 'vaximo-toolkit' ),
        ),
        array(
            'id'       => 'duration_label',
            'type'     => 'text',
            'title'    => esc_html__( ' Duration Label Text', 'vaximo-toolkit' ),
        ),
        array(
            'id'       => 'enrolled_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Enrolled Label Text', 'vaximo-toolkit' ),
        ),
        array(
            'id'       => 'last_updated_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Updated Label Text', 'vaximo-toolkit' ),
        ),
        
        array(
            'id'        => 'enable_course_share',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Course Social share', 'vaximo-toolkit'),
            'default'   => '0'
        ),
        array(
            'id'        => 'course_share_title',
            'type'      => 'text',
            'title'     => esc_html__('Share Title', 'vaximo-toolkit'),
            'default'   => 'Share:',
            'required'  => array('enable_course_share','equals','1'),
        ),
        array(
            'id'        => 'enable_course_fb',
            'type'      => 'switch',
            'title'     => esc_html__('Share on Facebook', 'vaximo-toolkit'),
            'default'   => '0',
            'required'  => array('enable_course_share','equals','1'),
        ),

        array(
            'id'        => 'enable_course_tw',
            'type'      => 'switch',
            'title'     => esc_html__('Share on Twitter', 'vaximo-toolkit'),
            'default'   => '0',
            'required'  => array('enable_course_share','equals','1'),
        ),

        array(
            'id'        => 'enable_course_ista',
            'type'      => 'switch',
            'title'     => esc_html__('Share on Instragram', 'vaximo-toolkit'),
            'default'   => '0',
            'required'  => array('enable_course_share','equals','1'),
        ),

        array(
            'id'        => 'enable_course_ld',
            'type'      => 'switch',
            'title'     => esc_html__('Share on Linkedin', 'vaximo-toolkit'),
            'default'   => '0',
            'required'  => array('enable_course_share','equals','1'),
        ),
        array(
            'id'        => 'enable_course_wp',
            'type'      => 'switch',
            'title'     => esc_html__('Share on Whatsapp', 'vaximo-toolkit'),
            'default'   => '0',
            'required'  => array('enable_course_share','equals','1'),
        ),
        
    )
));

// START Footer Area
Redux::setSection( $opt_name, array(
    'title'            => __( 'Footer', 'vaximo-toolkit' ),
    'id'               => 'footer',
    'customizer'       => false,
    'icon'             => 'el el-edit',
    'fields' => array(
        array(
            'id'      => 'footer_social_text',
            'type'    => 'textarea',
            'title'   => __('Footer social text', 'vaximo-toolkit'),
            'default' => __('Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.','vaximo-toolkit')
        ),
        array(
            'title'     => __( 'Social Icon', 'vaximo-toolkit' ),
            'id'        => 'is_footer_social_icon',
            'type'      => 'switch',
            'on'        => __( 'Show', 'vaximo-toolkit' ),
            'off'       => __( 'Hide', 'vaximo-toolkit' ),
            'default'   => '1',
        ),
        array(
            'id'       => 'footer_copyright_text',
            'type'     => 'editor',
            'title'    => __('Footer copyright text', 'vaximo-toolkit'),
            'subtitle' => __('HTML and Shortcodes are allowed', 'vaximo-toolkit'),
            'desc'     => '',
            'args'     => array(
                'teeny' => true,
                'media_buttons' => false
            ),
        ),
        array(
            'id'       => 'footer_bg_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Footer Background image', 'vaximo-toolkit' ),
            'compiler' => false,
        ),
        array(
            'title'     => esc_html__( 'Footer Column', 'vaximo-toolkit' ),
            'id'        => 'footer_column',
            'type'      => 'select',
            'default'   => '4',
            'options'   => array(
                '12'    => esc_html__( 'One Column', 'vaximo-toolkit' ),
                '6'     => esc_html__( 'Two Column', 'vaximo-toolkit' ),
                '4'     => esc_html__( 'Three Column', 'vaximo-toolkit' ),
                '3'     => esc_html__( 'Four Column', 'vaximo-toolkit' ),
                '5'     => esc_html__( 'Five Column', 'vaximo-toolkit' ),
            ),
        ),


        array(
            'id' => 'footer_bg',
            'type' => 'color',
            'title' => __('Dark Footer Background Color', 'vaximo-toolkit'),
            'default' => '#0e0129',
            'validate' => 'color',
            'transparent' => false
        ),
        array(
            'id' => 'footer_text_color',
            'type' => 'color',
            'title' => __('Dark Footer Text Color', 'vaximo-toolkit'),
            'default' => '#ffffff',
            'validate' => 'color',
            'transparent' => false
        ),
        array(
            'id' => 'footer_text_hcolor',
            'type' => 'color',
            'title' => __('Dark Footer Text Hover Color', 'vaximo-toolkit'),
            'default' => '#d80650',
            'validate' => 'color',
            'transparent' => false
        ),
        array(
            'id' => 'footer_icon_color',
            'type' => 'color',
            'title' => __('Dark Footer Icon Color', 'vaximo-toolkit'),
            'default' => '#d80650',
            'validate' => 'color',
            'transparent' => false
        ),
        array(
            'id' => 'footer_bottom_bg',
            'type' => 'color',
            'title' => __('Dark Footer Bottom Background Color', 'vaximo-toolkit'),
            'default' => '#05224c',
            'validate' => 'color',
            'transparent' => false
        ),
        array(
            'id' => 'footer_bottom_text_color',
            'type' => 'color',
            'title' => __('Dark Footer Bottom Text Color', 'vaximo-toolkit'),
            'default' => '#ffffff',
            'validate' => 'color',
            'transparent' => false
        ),


        array(
            'id' => 'white_footer_bg',
            'type' => 'color',
            'title' => __('White Footer Background Color', 'vaximo-toolkit'),
            'default' => '#ffffff',
            'validate' => 'color',
            'output'      => array(
                'background-color' => '.footer-area, .copy-right-area',
            ),
            'transparent' => false
        ),
        array(
            'id' => 'whitefooter_text_color',
            'type' => 'color',
            'title' => __('White Footer Text Color', 'vaximo-toolkit'),
            'default' => '#212121',
            'validate' => 'color',
            'output'      => array(
                'color' => '.footer-area .single-footer-widget h3, .footer-area .single-footer-widget ul li a, .footer-area .single-footer-widget ul li, .footer-area .single-footer-widget p, .footer-area .single-footer-widget .logo .logo-title, .copy-right-area .footer-menu li a, .copy-right-area p ',
            ),
            'transparent' => false
        ),

        array(
            'id' => 'gcd_footer_bg',
            'type' => 'color',
            'title' => __('Footer Style Four Background Color', 'vaximo-toolkit'),
            'default' => '#0B0B22',
            'validate' => 'color',
            'output'      => array(
                'background-color' => '.footer-style-wrap-area',
            ),
            'transparent' => false
        ),

        array(
            'id' => 'ai_footer_bg',
            'type' => 'color',
            'title' => __('Footer Style Five Background Color', 'vaximo-toolkit'),
            'default' => '#151435',
            'validate' => 'color',
            'output'      => array(
                'background-color' => '.footer-style-wrap-area.bg-black-wrap',
            ),
            'transparent' => false
        ),

        array(
            'id' => 'aicp_footer_bg',
            'type' => 'color',
            'title' => __('Footer Style Four & Five Copyright Background Color', 'vaximo-toolkit'),
            'default' => '#232338',
            'validate' => 'color',
            'output'      => array(
                'background-color' => '.copyright-style-wrap-area',
            ),
            'transparent' => false
        ),

        array(
            'id' => 'fth_footer_bg',
            'type' => 'color',
            'title' => __('Footer Style Four & Five Title Color', 'vaximo-toolkit'),
            'default' => '#ffffff',
            'validate' => 'color',
            'output'      => array(
                'color' => '.single-footer-wrap-widget h3',
            ),
            'transparent' => false
        ),

        array(
            'id' => 'fth_con_cl',
            'type' => 'color',
            'title' => __('Footer Style Four & Five Content Color', 'vaximo-toolkit'),
            'default' => '#8B8AA4',
            'validate' => 'color',
            'output'      => array(
                'color' => '.single-footer-wrap-widget p, .single-footer-wrap-widget span',
            ),
            'transparent' => false
        ),

        array(
            'id' => 'fth_con_list',
            'type' => 'color',
            'title' => __('Footer Style Four & Five List Color', 'vaximo-toolkit'),
            'default' => '#ffffff',
            'validate' => 'color',
            'output'      => array(
                'color' => '.single-footer-wrap-widget ul li a',
            ),
            'transparent' => false
        ),

        array(
            'id' => 'fth_con_hlist',
            'type' => 'color',
            'title' => __('Footer Style Four & Five List Hover Color', 'vaximo-toolkit'),
            'default' => '#2A82D9',
            'validate' => 'color',
            'output'      => array(
                'color' => '.single-footer-wrap-widget ul li a:hover',
            ),
            'transparent' => false
        ),

        array(
            'id' => 'fth_cp_color',
            'type' => 'color',
            'title' => __('Footer Style Four & Five Copyright Text Color', 'vaximo-toolkit'),
            'default' => '#ffffff',
            'validate' => 'color',
            'output'      => array(
                'color' => '.copyright-style-wrap-area span',
            ),
            'transparent' => false
        ),

        array(
            'id' => 'fth_cp_ath_color',
            'type' => 'color',
            'title' => __('Footer Style Four & Five Copyright Author Color', 'vaximo-toolkit'),
            'default' => '#d80650',
            'validate' => 'color',
            'output'      => array(
                'color' => '.copyright-style-wrap-area span a',
            ),
            'transparent' => false
        ),

    ) 
));

// Typography
Redux::setSection( $opt_name, array(
    'title'       => __( 'Typography', 'vaximo-toolkit' ),
    'desc'        => __( 'Manage your fonts and typefaces.', 'vaximo-toolkit' ),
    'icon'        => 'el-icon-fontsize',
    'customizer'  => false,
    'fields'      => array(
        array(
            'id'            => 'opt-typography-body',
            'type'          => 'typography',
            'title'         => __( 'Body font', 'vaximo-toolkit' ),
            'google'        => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => true, // Select a backup non-google font in addition to a google font
            'all_styles'    => false, // Enable all Google Font style/weight variations to be added to the page
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => false,
            'output' => array(
                'body',
            ), // An array of CSS selectors to apply this font style to dynamically
            'subtitle' => __( 'Typography option with each property can be called individually.', 'vaximo-toolkit' ),
            'default' => array(
                'font-family' => 'Rubik',
                'google' => true,
            ),
        ),
    )
) );

// Font Size
Redux::setSection( $opt_name, array(
    'title'       => __( 'Font Sizes', 'vaximo-toolkit' ),
    'desc'        => __( 'Manage your body default, header and footer fonts', 'vaximo-toolkit' ),
    'icon'        => 'el-icon-fontsize',
    'customizer'  => false,
    'fields'      => array(
        array(
            'id'            => 'opt-body_fontsize',
            'type'          => 'typography',
            'title'         => __( 'Body Font Size', 'vaximo-toolkit' ),
            'google'        => false, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false, // Select a backup non-google font in addition to a google font
            'all_styles'    => false, // Enable all Google Font style/weight variations to be added to the page
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => true,
            'font-family'   => false,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => false,
            'output'        => array(
                'body',
            ), // An array of CSS selectors to apply this font style to dynamically
            'default'       => array(
                'font-size' => '15px',
                'google'    => false,
            ),
        ),
        array(
            'id'            => 'opt-header_fontsize',
            'type'          => 'typography',
            'title'         => __( 'Header Menu Font Size', 'vaximo-toolkit' ),
            'google'        => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => true, // Select a backup non-google font in addition to a google font
            'all_styles'    => false, // Enable all Google Font style/weight variations to be added to the page
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'font-family'   => true,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => false,
            'output' => array(
                '.nav-area .navbar-area .main-nav nav .navbar-nav .nav-item a',
            ), // An array of CSS selectors to apply this font style to dynamically
            'default' => array(
                'font-size' => '16px',
                'google'    => false,
            ),
        ),
        array(
            'id'            => 'opt-footer_fontsize',
            'type'          => 'typography',
            'title'         => __( 'Footer Menu Font Size', 'vaximo-toolkit' ),
            'google'        => false, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false, // Select a backup non-google font in addition to a google font
            'all_styles'    => false, // Enable all Google Font style/weight variations to be added to the page
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => true,
            'font-family'   => false,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => false,
            'output' => array(
                '.footer-bottom-area .condition-privacy ul li a',
            ), // An array of CSS selectors to apply this font style to dynamically
            'default' => array(
                'font-size' => '15px',
                'google'    => false,
            ),
        ),
    )
) );

// Advanced Settings
Redux::setSection( $opt_name, array(
	'title'         => __('Advanced Settings', 'vaximo-toolkit'),
    'icon'          => 'el-icon-cogs',
    'customizer'    => false,
	'fields' => array(
		array(
			'id' => 'css_code',
			'type' => 'ace_editor',
			'title' => __('Custom CSS Code', 'vaximo-toolkit'),
			'desc' => __('e.g. .btn-primary{ background: #000; } Dont use &lt;style&gt; tags', 'vaximo-toolkit'),
			'subtitle' => __('Paste your CSS code here.', 'vaximo-toolkit'),
			'mode' => 'css',
			'theme' => 'monokai'
		),
		array(
			'id'        => 'js_code',
			'type'      => 'ace_editor',
			'title'     => __('Custom JS Code', 'vaximo-toolkit'),
			'desc'      => __('e.g. alert("Hello World!"); Dont use&lt;script&gt;tags.', 'vaximo-toolkit'),
			'subtitle'  => __('Paste your JS code here.', 'vaximo-toolkit'),
			'mode'      => 'javascript',
			'theme'     => 'monokai'
		)
	)
) );

// Slide Text Area
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Slide Text Area', 'vaximo-toolkit'),
	'desc'  => 'Slide Text Area are used in blogs & single blogs inside the theme.',
    'icon'  => 'el el-th-large',
	'customizer' => false,
	'fields' => array(
        array(
            'id'        => 'enable_slide_text',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Slide Text', 'vaximo-toolkit'),
            'default'   => '1',
        ),
        array(
			'id'    => 'slide_title1',
            'type'  => 'text',
			'title' => esc_html__('Slide Text One', 'vaximo-toolkit'),
            'compiler' => true,
            'required' => array('enable_slide_text','equals','1'),
		),
        array(
			'id'    => 'slide_title2',
            'type'  => 'text',
			'title' => esc_html__('Slide Text Two', 'vaximo-toolkit'),
            'compiler' => true,
            'required' => array('enable_slide_text','equals','1'),
		),
        array(
			'id'    => 'slide_title3',
            'type'  => 'text',
			'title' => esc_html__('Slide Text Three', 'vaximo-toolkit'),
            'compiler' => true,
            'required' => array('enable_slide_text','equals','1'),
		),
        array(
			'id'    => 'slide_title4',
            'type'  => 'text',
			'title' => esc_html__('Slide Text Four', 'vaximo-toolkit'),
            'compiler' => true,
            'required' => array('enable_slide_text','equals','1'),
		),
        array(
			'id'    => 'slide_title5',
            'type'  => 'text',
			'title' => esc_html__('Slide Star', 'vaximo-toolkit'),
            'compiler' => true,
            'required' => array('enable_slide_text','equals','1'),
		),
	)
) );

// -> START 404 Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( '404', 'vaximo-toolkit' ),
    'id'                => 'vaximo_404',
    'customizer'        => false,
    'icon'              => 'el el-question-sign',
    'fields'            => array(
        array(
            'id'        => 'img-404',
            'type'      => 'media',
            'url'       => true,
            'title'     => esc_html__('404 Image Upload', 'vaximo-toolkit' ),
            'compiler'  => 'false',
        ),
        array(
            'id'       => 'content_not_found',
            'type'     => 'textarea',
            'title'    => esc_html__( '404 Title', 'vaximo-toolkit' ),
            'default'  => esc_html__( 'Page Not Found', 'vaximo-toolkit' ),
        ),
        array(
            'id'       => 'long_content_not_found',
            'type'     => 'textarea',
            'title'    => esc_html__( '404 Content', 'vaximo-toolkit' ),
        ),
        array(
            'id'       => 'button_not_found',
            'type'     => 'text',
            'title'    => esc_html__( 'Go to Home Button Text', 'vaximo-toolkit' ),
            'default'  => esc_html__( 'Go To Home', 'vaximo-toolkit' ),
        ),
    ) 
));

      /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */


    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'vaximo-toolkit' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'vaximo-toolkit' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }