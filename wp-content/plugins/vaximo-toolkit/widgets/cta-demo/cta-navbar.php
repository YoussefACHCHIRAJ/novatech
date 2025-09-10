<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Vaximo_Bootstrap_Navwalker;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Cta_Navbar extends Widget_Base {

    public function get_name() {
        return 'vaximo-navbar';
    }

    public function get_title() {
        return __( 'Navbar', 'vaximo-toolkit' );
    }

    public function get_icon() {
        return 'eicon-menu-bar';
    }

    public function get_keywords() {
        return [ 'Menu', 'Navigation' ];
    }

    public function get_categories() {
        return [ 'vaximocategory' ];
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
            $this->add_control(
				'navbar_bg',
				[
					'label' => esc_html__( 'Navbar Background Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cyber-training-awareness-navbar .cta-navbar .main-nav nav .navbar-nav' => 'background-color: {{VALUE}} !important',
					],
				]
            );

            $this->add_control(
                'sec_padding', [
                    'label' => __( 'Navbar Padding', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-navbar .cta-navbar .main-nav nav .navbar-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'unit' => 'px', // The selected CSS Unit. 'px', '%', 'em',

                    ],
                ]
            );

        $this->end_controls_section();


        // Mobile Logo
        $this->start_controls_section(
            'section_mobile_logo',
            [
                'label' => __( 'Mobile Logo', 'vaximo-toolkit' ),
            ]
        );

            $this->add_control(
                'mobile_logo',
                [
                    'label' => __( 'Main Logo', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'mobile_logomax_width',
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
                        '{{WRAPPER}} .mobile-nav .logo' => 'max-width: {{SIZE}}{{UNIT}};',
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
                    'label' => __( 'Navbar box layout', 'vaximo-toolkit' ),
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
                    'default' => 'right',
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

        // Navbar Settings
        $this->start_controls_section(
            'navbar_settings',
            [
                'label' => __( 'Navbar Settings', 'vaximo-toolkit' ),
            ]
        );
           
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'label' => __( 'Menu Item Typography', 'vaximo-toolkit' ),
                    'name' => 'typography_menu_item',
                    'selector' => '{{WRAPPER}} .cyber-training-awareness-navbar .cta-navbar .main-nav nav .navbar-nav .nav-item a',
                ]
            );
            $this->add_control(
				'menu_item_color',
				[
					'label' => esc_html__( 'Menu Item Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cyber-training-awareness-navbar .cta-navbar .main-nav nav .navbar-nav .nav-item a, {{WRAPPER}} .cyber-training-awareness-navbar .cta-navbar .main-nav nav .navbar-nav .nav-item .dropdown-menu li a, {{WRAPPER}} .cyber-training-awareness-navbar .cta-navbar .main-nav nav .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a, {{WRAPPER}}.cyber-training-awareness-navbar .cta-navbar .main-nav nav .navbar-nav .nav-item .nav-link.dropdown-icon::after' => 'color: {{VALUE}} !important',
					],
				]
            );
            $this->add_control(
				'menu_item_hover_color',
				[
					'label' => esc_html__( 'Menu Item Active/Hover Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cyber-training-awareness-navbar .cta-navbar .main-nav nav .navbar-nav .nav-item a:hover, {{WRAPPER}} .cyber-training-awareness-navbar .cta-navbar .main-nav nav .navbar-nav .nav-item .dropdown-menu li a.active' => 'color: {{VALUE}} !important',
					],
				]
            );
           
            $this->add_control(
				'dropdown_menu_bg_color',
				[
					'label' => esc_html__( 'Dropdown Menu Background Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cyber-training-awareness-navbar .cta-navbar .main-nav nav .navbar-nav .nav-item .dropdown-menu' => 'background-color: {{VALUE}} !important',
					],
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

        $logo           = !empty($settings['main_logo']['url']) ? $settings['main_logo']['url'] : '';
        $mobile_logo    = !empty($settings['mobile_logo']['url']) ? $settings['mobile_logo']['url'] : '';

        switch ( $settings['menu_alignment'] ) {
            case 'right':
                $ul_class = 'navbar-nav ms-auto right';
                break;
            case 'left':
                $ul_class = 'navbar-nav mr-auto left'; 
                break;
            case 'center':
                $ul_class = 'navbar-nav m-auto';
                break;
        }

        $hide_adminbar 				= 'vaximo-hide-adminbar';

        ?>

        <!-- Start Navbar Area -->
		<div class="nav-area cyber-training-awareness-navbar teachers-fonts-home <?php if ( is_user_logged_in() ) { echo esc_attr( $hide_adminbar ); } ?>">
			<div class="cta-navbar">
				<!-- Menu For Mobile Device -->
				<div class="mobile-nav">
                    <a href="<?php echo esc_url( home_url( '/' ) );?>" class="logo">
                        <?php if( $mobile_logo != '' ): ?>
                            <img src="<?php echo esc_url( $mobile_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                        <?php elseif( $logo != '' ): ?>
                            <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                        <?php else: ?>
                            <h2><?php bloginfo( 'name' ); ?></h2>
                        <?php endif; ?>
                    </a>
				</div>
				<!-- Menu For Desktop Device -->
				<div class="main-nav">
					<nav class="navbar navbar-expand-md">  
						<div class="<?php echo esc_attr( $settings['nav_box_layout'] ); ?>">
                            <a class="navbar-brand d-none" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php if( $logo != '' ): ?>
                                    <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                <?php else: ?>
                                    <h2><?php bloginfo( 'name' ); ?></h2>
                                <?php endif; ?>
                            </a>
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
								
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<!-- End Navbar Area -->

        <?php
    }

}
Plugin::instance()->widgets_manager->register( new Cta_Navbar );