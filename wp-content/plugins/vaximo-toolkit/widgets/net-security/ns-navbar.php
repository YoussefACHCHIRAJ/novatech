<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Vaximo_Bootstrap_Navwalker;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class NS_Navbar extends Widget_Base {

    public function get_name() {
        return 'NSNavbar';
    }

    public function get_title() {
        return __( 'NS Navbar', 'vaximo-toolkit' );
    }

    public function get_icon() {
        return 'eicon-logo';
    }

    public function get_keywords() {
        return [ 'Menu', 'Navigation' ];
    }

    public function get_categories() {
        return ['vaximocategory'];
    }

    protected function register_controls() {

        // Menu
        $this->start_controls_section(
            'menu_settings',
            [
                'label' => __( 'Menu', 'vaximo-toolkit' ),
            ]
        );

            $this->add_control(
                'menu', [
                    'label' => __( 'Menu', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => vaximo_get_menu_array()
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'label' => __( 'Menu Item Typography', 'vaximo-toolkit' ),
                    'name' => 'typography_menu_item',
                    'selector' => '{{WRAPPER}} .navbar .navbar-nav .nav-item .nav-link',
                ]
            );
            $this->add_control(
				'menu_item_color',
				[
					'label' => esc_html__( 'Menu Item Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .navbar .navbar-nav .nav-item .nav-link' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'menu_item_hover_color',
				[
					'label' => esc_html__( 'Menu Item Active/Hover Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .navbar .navbar-nav .nav-item .nav-link:hover, .navbar .navbar-nav .nav-item .nav-link:hover, {{WRAPPER}} .navbar .navbar-nav .nav-item.active a' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'drop_menu_item_color',
				[
					'label' => esc_html__( 'Dropdown Menu Item Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-area .navbar-area .main-nav nav .navbar-nav .nav-item .dropdown-menu li a' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'drop_menu_item_active_color',
				[
					'label' => esc_html__( 'Dropdown Menu Item Active Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-area .navbar-area .main-nav nav .navbar-nav .nav-item .dropdown-menu li.active a' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'drop_menu_item_hover_color',
				[
					'label' => esc_html__( 'Dropdown Menu Item Hover Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-area .navbar-area .main-nav nav .navbar-nav .nav-item .dropdown-menu li a:hover' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'drop_menu_item_hoverbg_color',
				[
					'label' => esc_html__( 'Dropdown Menu Item Hover Background Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-area .navbar-area .main-nav nav .navbar-nav .nav-item .dropdown-menu li a:hover' => 'background-color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'drp_border_color',
				[
					'label' => esc_html__( 'Dropdown Border Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-area .navbar-area .main-nav nav .navbar-nav .nav-item .dropdown-menu li a' => 'border-color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'drp_navbar_bg',
				[
					'label' => esc_html__( 'Dropdown Background Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-area .navbar-area .main-nav nav .navbar-nav .nav-item .dropdown-menu' => 'background-color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'navbar_bg',
				[
					'label' => esc_html__( 'Navbar Background Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .navbar-area-with-relative .navbar-area .main-nav' => 'background-color: {{VALUE}} !important',
					],
				]
            );

            $this->add_control(
				'sticky_navbar_bg',
				[
					'label' => esc_html__( 'Sticky Navbar Background Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .nav-area .navbar-area.is-sticky' => 'background-color: {{VALUE}} !important',
					],
				]
            );
        $this->end_controls_section();


        // Logo settings
        $this->start_controls_section(
            'section_logo',
            [
                'label' => __( 'Logo', 'vaximo-toolkit' ),
            ]
        );

            $this->add_control(
                'main_logo',
                [
                    'label' => __( 'Main Logo', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'logomax_width',
                [
                    'label' => __( 'Max Width', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'rem' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 500,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .main-nav .navbar-brand' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Layout Settings
        $this->start_controls_section(
            'layout_settings',
            [
                'label' => __( 'Layout Settings', 'vaximo-toolkit' ),
            ]
        );

            $this->add_control(
                'nav_box_layout', [
                    'label' => __( 'Navbar Layout', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'container-fluid',
                    'options' => [
                        'container' => esc_html__( 'Wide', 'vaximo-toolkit' ),
                        'container-fluid' => esc_html__( 'Full Width', 'vaximo-toolkit' ),
                    ]
                ]
            );

            $this->add_control(
                'menu_alignment', [
                    'label' => __( 'Menu Alignment', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::CHOOSE,
                    'default' => 'center',
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'vaximo-toolkit' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'vaximo-toolkit' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'vaximo-toolkit' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ]
                ]
            );

        $this->end_controls_section();

        // Addisonian Settings
        $this->start_controls_section(
            'navbar_optional_settings',
            [
                'label' => __( 'Search and Button Settings', 'vaximo-toolkit' ),
            ]
        );
           
           
            $this->add_control(
                'is_search',
                [
                    'label' => __( 'Enable Search Icon', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'             => __( 'Yes', 'vaximo-toolkit' ),
                        '2'            => __( 'NO', 'vaximo-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );
            $this->add_control(
                'search_placeholder',
                [
                    'label' => __( 'Search Placeholder Text', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Search here', 'vaximo-toolkit' ),
                    'condition' => [
                        'is_search' => '1',
                    ],
                ]
            );
            $this->add_control(
				'sicon_color',
				[
					'label'     => __( 'Search Icon Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .navbar-area-with-relative .others-option .option-item .search-btn' => 'color: {{VALUE}}',
					],
                    'condition' => [
                        'is_search' => '1',
                    ],
				]
			);

            $this->add_control(
                'nav_btn_text',
                [
                    'label' =>__('Navbar Button Text', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                    'default' => 'Get A Free Quote',
                ]
            );
            $this->add_control(
                'link_type',
                [
                    'label' => __( 'Link Type', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'   => __( 'Link To Page', 'vaximo-toolkit' ),
                        '2'   => __( 'External Link', 'vaximo-toolkit' ),
                    ],
                ]
            );
            $this->add_control(
                'link_to_page',
                [
                    'label' => __( 'Link Page', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => vaximo_toolkit_get_page_as_list(),
                    'condition'   => [
                        'link_type'   => '1',
                    ]
                ]
            );
            $this->add_control(
                'external_link',
                [
                    'label' => __('External Link', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type'   => '2',
                    ]
                ]
            );


            $this->add_control(
				'btn_text_color',
				[
					'label'     => __( 'Button Text Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .navbar-area-with-relative .others-option .option-item .default-btn' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'heading',
				[
					'label'     => __( 'Button Background Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::HEADING,
				]
			);

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Button Background Color', 'vaximo-toolkit' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .navbar-area-with-relative .others-option .option-item .default-btn',
                ]
            );

            $this->add_control(
				'h_heading',
				[
					'label'     => __( 'Button Hover Background Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::HEADING,
				]
			);

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'h_background',
                    'label' => __( 'Button Hover Background Color', 'vaximo-toolkit' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .default-btn:hover, .default-btn::before, .default-btn::after',
                ]
            );

            $this->add_control(
				'btn_hover_text_color',
				[
					'label'     => __( 'Button Hover Text Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .default-btn:hover' => 'color: {{VALUE}}',
					],
				]
			);

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btn_typography',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .default-btn',
                ]
            );

            $this->add_responsive_control(
                'border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'text_padding',
                [
                    'label' => esc_html__( 'Padding', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings();
        $hide_wp_nav = 'hide-wp-nav'; 
        
        $logo       = !empty($settings['main_logo']['url']) ? $settings['main_logo']['url'] : '';
        switch ( $settings['menu_alignment'] ) {
            case 'right':
                $ul_class = 'navbar-nav ms-auto';
                break;
            case 'left':
                $ul_class = 'navbar-nav me-auto';
                break;
            case 'center':
                $ul_class = 'navbar-nav m-auto';
                break;
        }

        $link_one = '';
        if( $settings['link_type'] == 1 ){
            $link_one = get_page_link($settings['link_to_page']); 
        } else {
            $link_one = $settings['external_link'];
        }
        ?>

        <div class="nav-area navbar-area-with-relative">
            <div class="navbar-area <?php if ( is_user_logged_in() ) { echo esc_attr( $hide_wp_nav ); } ?>">
                <?php if( $logo != '' ): ?>
                    <div class="mobile-nav">
                        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                        </a>

                        <div class="others-option d-flex align-items-center rs-display">
                            <?php if( $settings['is_search'] == '1' ):  ?>
                                <div class="option-item">
                                    <i class="search-btn bx bx-search"></i>
                                    <i class="close-btn bx bx-x"></i>
                                    
                                    <div class="search-overlay search-popup">
                                        <div class="search-box">
                                            <form role="search" method="get" class="search-form">
                                                <input type="text" class="search-input" name="s" id="search" placeholder="<?php echo esc_attr( $settings['search_placeholder'] ); ?>"/>
                                                <button type="submit" class="search-button">
                                                <i class="bx bx-search"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if($settings['nav_btn_text'] != ''): ?>
                                <div class="option-item">
                                    <a href="<?php echo esc_url($link_one); ?>" class="default-btn"><?php echo esc_html($settings['nav_btn_text']); ?></a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php else: ?>
                    <div class="mobile-nav">
                        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <h2><?php bloginfo( 'name' ); ?></h2>
                        </a>

                        <div class="others-option d-flex align-items-center rs-display">
                            <?php if( $settings['is_search'] == '1' ):  ?>
                                <div class="option-item">
                                    <i class="search-btn bx bx-search"></i>
                                    <i class="close-btn bx bx-x"></i>
                                    
                                    <div class="search-overlay search-popup">
                                        <div class="search-box">
                                            <form role="search" method="get" class="search-form">
                                                <input type="text" class="search-input" name="s" id="search" placeholder="<?php echo esc_attr( $settings['search_placeholder'] ); ?>"/>
                                                <button type="submit" class="search-button">
                                                <i class="bx bx-search"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if($settings['nav_btn_text'] != ''): ?>
                                <div class="option-item">
                                    <a href="<?php echo esc_url($link_one); ?>" class="default-btn"><?php echo esc_html($settings['nav_btn_text']); ?></a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endif; ?>

                <!-- Menu For Desktop Device -->
                <div class="main-nav">
                    <nav class="navbar navbar-expand-md">
                        <div class="<?php echo esc_attr( $settings['nav_box_layout'] ); ?>">
                            <?php if( $logo != '' ): ?>
                                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                </a>
                            <?php else: ?>
                                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <h2><?php bloginfo( 'name' ); ?></h2>
                                </a>
                            <?php endif; ?>
                            
                            <div class="collapse navbar-collapse mean-menu">
                                <?php
                                    $menu = !empty($settings['menu']) ? $settings['menu'] : '';
                                    $primary_nav_arg = [
                                        'menu'            => $menu,
                                        'theme_location'  => 'primary',
                                        'container'       => null,
                                        'menu_class'      => $ul_class,
                                        'depth'           => 3,
                                        'walker'          => new Vaximo_Bootstrap_Navwalker(),
                                        'fallback_cb'     => 'Vaximo_Bootstrap_Navwalker::fallback',
                                    ];
                                    if(has_nav_menu('primary')){ wp_nav_menu( $primary_nav_arg );  }
                                ?>
                                
                                <!-- Start Other Option -->
                                <div class="others-option d-flex align-items-center">
                                    <?php if( $settings['is_search'] == '1' ):  ?>
                                        <div class="option-item">
                                            <i class="search-btn bx bx-search"></i>
                                            <i class="close-btn bx bx-x"></i>
                                            
                                            <div class="search-overlay search-popup">
                                                <div class="search-box">
                                                    <form role="search" method="get" class="search-form">
                                                        <input type="text" class="search-input" name="s" id="search" placeholder="<?php echo esc_attr( $settings['search_placeholder'] ); ?>"/>
                                                        <button type="submit" class="search-button">
                                                        <i class="bx bx-search"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if($settings['nav_btn_text'] != ''): ?>
                                        <div class="option-item">
                                            <a href="<?php echo esc_url($link_one); ?>" class="default-btn"><?php echo esc_html($settings['nav_btn_text']); ?></a>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register( new NS_Navbar );