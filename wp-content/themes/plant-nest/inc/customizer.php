<?php
/**
 * Add custom settings and controls to the WordPress Customizer
 */


//---------------------Code to add the Upgrade to Pro button in the Customizer----------

function plant_nest_customize_register_btn( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    get_template_part('inc/customizer-button/upsell-section');

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'plant_nest_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'plant_nest_customize_partial_blogdescription',
        ) );
    }

    $wp_customize->register_section_type( 'plant_nest_Customize_Upsell_Section' );

    // Register section.
    $wp_customize->add_section(
        new plant_nest_Customize_Upsell_Section(
            $wp_customize,
            'theme_upsell',
            array(
                'title'    => esc_html__( 'Plant Nest Pro', 'plant-nest' ),
                'pro_text' => esc_html__( 'Upgrade To Pro', 'plant-nest' ),
                'pro_url'  => 'https://cawpthemes.com/plant-nest-premium-wordpress-theme/',
                'priority' => 1,
            )
        )
    );
}
add_action( 'customize_register', 'plant_nest_customize_register_btn' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function plant_nest_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function plant_nest_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function plant_nest_customize_preview_js() {
    wp_enqueue_script( 'plant-nest-customizer', get_template_directory_uri() . '/inc/customizer-button/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'plant_nest_customize_preview_js' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.0
 */
function plant_nest_customizer_control_scripts() {

    wp_enqueue_style( 'plant-nest-customize-controls', get_template_directory_uri() . '/inc/customizer-button/customize-controls.css', '', '1.0.0' );

    wp_enqueue_script( 'plant-nest-customize-controls', get_template_directory_uri() . '/inc/customizer-button/customize-controls.js', array( 'customize-controls' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'plant_nest_customizer_control_scripts', 0 );


//-----Code to add the Upgrade to Pro button in the Customizer End----------


//------------------Theme Information--------------------

function plant_nest_customize_register( $wp_customize ) {


      // Add a custom setting for the Site Identity color
  $wp_customize->add_setting( 'plant_nest_site_identity_color', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plant_nest_site_identity_color', array(
    'label' => __( 'Site Identity Color', 'plant-nest' ),
    'section' => 'title_tagline',
    'settings' => 'plant_nest_site_identity_color',
  ) ) );


  // Add a custom setting for the Site Identity color
  $wp_customize->add_setting( 'plant_nest_site_identity_tagline_color', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plant_nest_site_identity_tagline_color', array(
    'label' => __( 'Tagline Color', 'plant-nest' ),
    'section' => 'title_tagline',
    'settings' => 'plant_nest_site_identity_tagline_color',
  ) ) );

//------------------Site Identity Ends---------------------


  
  // Add a custom setting for the primary color
  $wp_customize->add_setting( 'plant_nest_primary_color', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plant_nest_primary_color', array(
    'label' => __( 'Primary Color', 'plant-nest' ),
    'section' => 'colors',
    'settings' => 'plant_nest_primary_color',
  ) ) );

  //----------Home Front Page-----------------

  $wp_customize->add_panel( 'plant_nest_panel', array(
    'title'    => __( 'Front Page Settings', 'plant-nest' ),
    'priority' => 6,
  ) );

  $wp_customize->add_section( 'aether_topbar_section', array(
        'title' => __( 'Top Bar Settings', 'plant-nest' ),
        'panel' => 'plant_nest_panel',
    ) );

    // Email
    $wp_customize->add_setting( 'aether_topbar_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'aether_topbar_email', array(
        'label' => __( 'Email Address', 'plant-nest' ),
        'section' => 'aether_topbar_section',
        'type' => 'text',
    ) );

    // Phone
    $wp_customize->add_setting( 'aether_topbar_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'aether_topbar_phone', array(
        'label' => __( 'Phone Number', 'plant-nest' ),
        'section' => 'aether_topbar_section',
        'type' => 'text',
    ) );

    // Facebook
    $wp_customize->add_setting( 'aether_topbar_facebook', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'aether_topbar_facebook', array(
        'label' => __( 'Facebook URL', 'plant-nest' ),
        'section' => 'aether_topbar_section',
        'type' => 'url',
    ) );

    // Twitter
    $wp_customize->add_setting( 'aether_topbar_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'aether_topbar_twitter', array(
        'label' => __( 'Twitter URL', 'plant-nest' ),
        'section' => 'aether_topbar_section',
        'type' => 'url',
    ) );

    // Instagram
    $wp_customize->add_setting( 'aether_topbar_instagram', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'aether_topbar_instagram', array(
        'label' => __( 'Instagram URL', 'plant-nest' ),
        'section' => 'aether_topbar_section',
        'type' => 'url',
    ) );

  // -----------------Hero Section----------

// Hero Split Section
$wp_customize->add_section( 'plant_nest_hero_split_section', array(
    'title'    => __( 'Hero Banner (Split)', 'plant-nest' ),
    'priority' => 5,
    'panel'    => 'plant_nest_panel',
) );

$wp_customize->add_setting( 'plant_nest_hero_image', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'plant_nest_hero_image', array(
    'label'    => __( 'Hero Plant Image', 'plant-nest' ),
    'section'  => 'plant_nest_hero_split_section',
    'settings' => 'plant_nest_hero_image',
) ) );

$wp_customize->add_setting( 'plant_nest_hero_title', array(
    'default' => __( 'Welcome to Plant Nest', 'plant-nest' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'plant_nest_hero_title', array(
    'label'   => __( 'Hero Title', 'plant-nest' ),
    'section' => 'plant_nest_hero_split_section',
    'type'    => 'text',
) );

$wp_customize->add_setting( 'plant_nest_hero_desc', array(
    'default' => __( 'We love <strong>plants</strong> and we’re dedicated to care tips, indoor plant shopping, and green stories for every home.', 'plant-nest' ),
    'sanitize_callback' => 'wp_kses_post',
) );
$wp_customize->add_control( 'plant_nest_hero_desc', array(
    'label'   => __( 'Hero Description', 'plant-nest' ),
    'section' => 'plant_nest_hero_split_section',
    'type'    => 'textarea',
) );

// Bullet Points
for ( $i = 1; $i <= 3; $i++ ) {
  $wp_customize->add_setting( "plant_nest_point_$i", array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( "plant_nest_point_$i", array(
    'label'   => sprintf( __( 'Bullet Point %d', 'plant-nest' ), $i ),
    'section' => 'plant_nest_hero_split_section',
    'type'    => 'text',
  ) );
}


// Button
$wp_customize->add_setting( 'plant_nest_hero_btn_text', array(
    'default' => __( 'Read Plant Profile', 'plant-nest' ),
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'plant_nest_hero_btn_text', array(
    'label'   => __( 'Button Text', 'plant-nest' ),
    'section' => 'plant_nest_hero_split_section',
    'type'    => 'text',
) );

$wp_customize->add_setting( 'plant_nest_hero_btn_url', array(
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'plant_nest_hero_btn_url', array(
    'label'   => __( 'Button URL', 'plant-nest' ),
    'section' => 'plant_nest_hero_split_section',
    'type'    => 'url',
) );



$wp_customize->add_section('plant_nest_cat_section', array(
  'title' => __('Featured Plant Categories', 'plant-nest'),
  'panel' => 'plant_nest_panel',
  'priority' => 20,
));

$wp_customize->add_setting('plant_nest_cat_section_title', array(
  'default' => __('Explore Plant Types', 'plant-nest'),
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('plant_nest_cat_section_title', array(
  'label' => __('Section Title', 'plant-nest'),
  'section' => 'plant_nest_cat_section',
  'type' => 'text',
));

for ($i = 1; $i <= 4; $i++) {

  $wp_customize->add_setting("plant_nest_cat{$i}_title", array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control("plant_nest_cat{$i}_title", array(
    'label' => sprintf(__('Category %d Title', 'plant-nest'), $i),
    'section' => 'plant_nest_cat_section',
    'type' => 'text',
  ));

  $wp_customize->add_setting("plant_nest_cat{$i}_url", array(
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control("plant_nest_cat{$i}_url", array(
    'label' => sprintf(__('Category %d URL', 'plant-nest'), $i),
    'section' => 'plant_nest_cat_section',
    'type' => 'url',
  ));

  $wp_customize->add_setting("plant_nest_cat{$i}_icon", array(
    'default' => '🌿',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control("plant_nest_cat{$i}_icon", array(
    'label' => sprintf(__('Category %d Icon (emoji or text)', 'plant-nest'), $i),
    'section' => 'plant_nest_cat_section',
    'type' => 'text',
  ));
}


//-----------------Product Section------------

$wp_customize->add_section('plant_nest_product_section', array(
  'title' => __('Latest Products', 'plant-nest'),
  'panel' => 'plant_nest_panel',
  'priority' => 40,
));

$wp_customize->add_setting('plant_nest_product_section_title', array(
  'default' => __('Fresh from the Shop', 'plant-nest'),
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('plant_nest_product_section_title', array(
  'label' => __('Section Title', 'plant-nest'),
  'section' => 'plant_nest_product_section',
  'type' => 'text',
));



//------------------Blog Section--------------

$wp_customize->add_section('plant_nest_blog_section', array(
  'title' => __('Latest Blog Posts', 'plant-nest'),
  'panel' => 'plant_nest_panel',
  'priority' => 30,
));

$wp_customize->add_setting('plant_nest_blog_section_title', array(
  'default' => __('Latest from the Blog', 'plant-nest'),
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('plant_nest_blog_section_title', array(
  'label' => __('Section Title', 'plant-nest'),
  'section' => 'plant_nest_blog_section',
  'type' => 'text',
));

//------------------------Blog Page Settings--------------------------


  $wp_customize->add_section( 'plant_nest_blogpage_settings', array(
        'title'    => __( 'Blog Page Settings', 'plant-nest' ),
        'panel'    => 'plant_nest_panel',
    ) );

    //--------------Section One Title-----------------------

    $wp_customize->add_setting('plant_nest_blogpage_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('plant_nest_blogpage_title',array(
      'label' => __('Blog Page Title','plant-nest'),
      'section' => 'plant_nest_blogpage_settings',
      'setting' => 'plant_nest_blogpage_title',
      'type'    => 'text'
    )
  ); 

  //-----------Category------------

  $categories = get_categories();
  $cats = array();
  $i = 0;
  foreach($categories as $category){
    if($i==0){
      $default = $category->name;
      $i++;
    }
    $cats[$category->name] = $category->name;
  }

  $wp_customize->add_setting('plant_nest_blogpage_category',array(
  'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('plant_nest_blogpage_category',array(
    'type'    => 'select',
    'choices' => $cats,
    'label' => __('Select Category to Display Post on Blog Page','plant-nest'),
    'section' => 'plant_nest_blogpage_settings',
    'sanitize_callback' => 'sanitize_text_field',
  ));



    $wp_customize->add_setting('plant_nestblog_page_category_number_of_posts_setting',array(
    'default' => '18',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('plant_nestblog_page_category_number_of_posts_setting',array(
    'label' => __('Number of Posts','plant-nest'),
    'section' => 'plant_nest_blogpage_settings',
    'setting' => 'plant_nestblog_page_category_number_of_posts_setting',
    'type'    => 'number'
  )); 




  //-------------------------Footer Settings------------------------------


    $wp_customize->add_section( 'plant_nest_footer', array(
        'title'    => __( 'Footer Settings', 'plant-nest' ),
        'panel'    => 'plant_nest_panel',
    ) );


  // Add a custom setting for the footer text
  $wp_customize->add_setting( 'plant_nest_footer_text', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add a custom control for the footer text
  $wp_customize->add_control( 'plant_nest_footer_text', array(
    'label' => __( 'Footer Text', 'plant-nest' ),
    'section' => 'plant_nest_footer',
    'type' => 'text',
  ) );



 //-------------------404 Page-----------

  $wp_customize->add_section( 'plant_nest_404page', array(
    'title'    => __( '404 Page Settings', 'plant-nest' ),
    'panel'    => 'plant_nest_panel',
    ) );


  // Add a custom setting for the footer text
  $wp_customize->add_setting( 'plant_nest_404page_title', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add a custom control for the footer text
  $wp_customize->add_control( 'plant_nest_404page_title', array(
    'label' => __( 'Page Not Found Title', 'plant-nest' ),
    'section' => 'plant_nest_404page',
    'type' => 'text',
  ) );

  // Add a custom setting for the footer text
  $wp_customize->add_setting( 'plant_nest_404page_text', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add a custom control for the footer text
  $wp_customize->add_control( 'plant_nest_404page_text', array(
    'label' => __( 'Page Not Found Text', 'plant-nest' ),
    'section' => 'plant_nest_404page',
    'type' => 'text',
  ) );

//------General Settings------------------------------------------

  $wp_customize->add_section( 'plant_nest_general', array(
        'title'    => __( 'General Settings', 'plant-nest' ),
        'panel'    => 'plant_nest_panel',
    ) );

    $wp_customize->add_setting( 'plant_nest_post_meta_toggle_switch_control', array(
        'default'   => true,
        'sanitize_callback' => 'sanitize_text_field', // Use a suitable sanitization function based on your needs
        'transport' => 'refresh', // or 'postMessage' for instant preview without page refresh
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'plant_nest_post_meta_toggle_switch_control', array(
        'label'    => __( 'Display Time/Author', 'plant-nest' ),
        'section'  => 'plant_nest_general',
        'settings' => 'plant_nest_post_meta_toggle_switch_control',
        'type'     => 'checkbox',
    ) ) );

    $wp_customize->add_setting( 'plant_nest_post_readmore_toggle_switch_control', array(
        'default'   => true,
        'sanitize_callback' => 'sanitize_text_field', // Use a suitable sanitization function based on your needs
        'transport' => 'refresh', // or 'postMessage' for instant preview without page refresh
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'plant_nest_post_readmore_toggle_switch_control', array(
        'label'    => __( 'Display Readmore Link', 'plant-nest' ),
        'section'  => 'plant_nest_general',
        'settings' => 'plant_nest_post_readmore_toggle_switch_control',
        'type'     => 'checkbox',
    ) ) );



}
add_action( 'customize_register', 'plant_nest_customize_register' );


