<?php
if( function_exists('acf_add_local_field_group') ):

    // Header Style
    acf_add_local_field_group(array(
        'key'    => 'group_5f22836bc7219',
        'title'  => esc_html__('Page Navigation Option', 'vaximo-toolkit'),
        'fields' => array(
            array(
                'key'   => 'field_5e5797be82ee3',
                'label' => esc_html__('Choose Navigation Style', 'vaximo-toolkit'),
                'name'  => 'choose_navigation_style',
                'type'  => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'choices' => array(
                    1 => 'Style One',
                    2 => 'Style Two',
                    3 => 'Style Three',
                    4 => 'Style Four',
                    5 => 'Style Five',
                    6 => 'Style Six',
                    7 => 'Style Seven',
                    8 => 'Style Eight',
                ),
                'allow_null'    => 0,
                'other_choice'  => 0,
                'default_value' => 1,
                'layout'        => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'default',
                ),
            ),
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'elementor_header_footer',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    // Footer Style
    acf_add_local_field_group(array(
        'key'    => 'group_5f22836bc7220',
        'title'  => esc_html__('Page Footer Option', 'vaximo-toolkit'),
        'fields' => array(
            array(
                'key'   => 'field_5e5797be82ee5',
                'label' => esc_html__('Choose Footer Style', 'vaximo-toolkit'),
                'name'  => 'choose_footer_style',
                'type'  => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'choices' => array(
                    1 => 'Style One',
                    2 => 'Style Two',
                    3 => 'Style Three',
                    4 => 'Style Four',
                    5 => 'Style Five',
                ),
                'allow_null'    => 0,
                'other_choice'  => 0,
                'default_value' => '',
                'layout'        => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'default',
                ),
            ),
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'elementor_header_footer',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    // Page Banner Option
    acf_add_local_field_group(array(
        'key'    => 'group_5e0c6851b0a0b',
        'title'  => esc_html__('Page Banner Option', 'vaximo-toolkit'),
        'fields' => array(
            array(
                'key' => 'field_5e0c685e71de2',
                'label' => esc_html__('Hide Page Banner', 'vaximo-toolkit'),
                'name' => 'enable_page_banner',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_5e0c689071de3',
                'label' => esc_html__('Hide Breadcrumb', 'vaximo-toolkit'),
                'name' => 'hide_breadcrumb',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5e0c685e71de2',
                            'operator' => '!=',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    //'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'default',
                    //'value' => 'page',
                ),
            ),
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'default',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    // Single Post BG Image
    acf_add_local_field_group(array(
        'key' => 'group_5e89b10ass134f4',
        'title' => esc_html__('Single Post', 'vaximo-toolkit'),
        'fields' => array(
            array(
                'key' => 'field_5e89b1ss1b50ccf',
                'label' => esc_html__('Banner Background Image', 'vaximo-toolkit'),
                'name' => 'post_banner_background_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    // Single Service BG Image
    acf_add_local_field_group(array(
        'key' => 'group_5e89dsb10ass134f4',
        'title' => esc_html__('Single Service/Project', 'vaximo-toolkit'),
        'fields' => array(
            array(
                'key' => 'field_5e89b1ss1b50csscf',
                'label' => esc_html__('Banner Background Image', 'vaximo-toolkit'),
                'name' => 'service_banner_background_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'project',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    // Custom Post Link
    acf_add_local_field_group(array(
        'key' => 'group_5ee06d3c580d8',
        'title' => esc_html__('Custom Posts Custom Link', 'vaximo-toolkit'),
        'fields' => array(
            array(
                'key' => 'field_5ee06e1c55813',
                'label' => esc_html__('Choose Link Type', 'vaximo-toolkit'),
                'name' => 'choose_link_type',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    1 => 'Post Details Page',
                    2 => 'External Link',
                ),
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5ee06ec78bf72',
                'label' => esc_html__('External Link', 'vaximo-toolkit'),
                'name' => 'external_link',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5ee06e1c55813',
                            'operator' => '==',
                            'value' => '2',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'project',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    // Services Icon
    acf_add_local_field_group(array(
        'key' => 'group_5f1681fd85289',
        'title' => 'Choose Icon',
        'fields' => array(
            array(
                'key' => 'field_5f16820ed4740',
                'label' => 'Choose Icon Type',
                'name' => 'choose_icon_type',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'flaticon' => 'Flat Icon',
                    'iconclass' => 'Font Awesome',
                ),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5f16826bd4741',
                'label' => 'Choose FlatIcon',
                'name' => 'service_flaticon',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f16820ed4740',
                            'operator' => '==',
                            'value' => 'flaticon',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => vaximo_flaticons(),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5f1682acd4742',
                'label' => esc_html__('Choose Fontawesome', 'vaximo'),
                'name' => 'choose_fontawesome',
                'type' => 'font-awesome',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f16820ed4740',
                            'operator' => '==',
                            'value' => 'iconclass',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),

            array(
                'key' => 'field_5e89b1ss1b50ccg',
                'label' => esc_html__('NS Icon', 'vaximo-toolkit'),
                'name' => 'ns_icon',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    // Single WooCommerce Bg Image
    acf_add_local_field_group(array(
        'key'    => 'group_5e89b10a134f4',
        'title'  => esc_html__('Single Product', 'vaximo-toolkit'),
        'fields' => array(
            array(
                'key'   => 'field_5e89b11b50ccf',
                'label' => esc_html__('Banner Background Image', 'vaximo-toolkit'),
                'name'  => 'product_banner_background_image',
                'type'  => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'product',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;