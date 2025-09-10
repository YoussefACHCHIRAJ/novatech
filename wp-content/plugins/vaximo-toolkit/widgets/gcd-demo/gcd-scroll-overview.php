<?php
/**
 * fade Text Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Vaximo_Scroll_Overview extends Widget_Base {

	public function get_name() {
        return 'Scroll_Overview';
    }

	public function get_title() {
        return __( 'Scroll Overview', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-slider-vertical';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Vaximo_partner_Section',
			[
				'label' => __( 'Section', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );

            $repeater = new Repeater();
            
            $repeater->add_control(
                'card_short', [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => esc_html__( 'Card Shortcode', 'vaximo-toolkit' ),
                    'description' => esc_html__( 'To edit the content of this shortcode card, please go to Dashboard > UAE > Elementor Header & Footer Builder. You will see three templates named: Expert Support Overview, Take Control Overview, and Report Overview. You can make the necessary changes to them for your need.', 'vaximo-toolkit'  ),
                ]
            );
            $this->add_control(
                'scroll_slider',
                [
                    'label'   => esc_html__( 'Add Card Scroll Item', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'card_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'cd_bgcolor1', [
                    'label'     => __( 'Card One Background Color ', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-overview-items .gcd-overview-in-item' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'cd_bgcolor2', [
                    'label'     => __( 'Card Two Background Color ', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-overview-items .gcd-overview-in-item.purpleGradient' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'cd_bgcolor3', [
                    'label'     => __( 'Card Three Background Color ', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-overview-items .gcd-overview-in-item.blueGradient' => 'background: {{VALUE}};',
                    ],
                ]
            );
           
            $this->add_responsive_control(
                'border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .gcd-overview-items .gcd-overview-in-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .gcd-overview-items .gcd-overview-in-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

        $this->end_controls_section();



    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        ?>

        <!-- Start GCD Overview Area -->
        <div class="gcd-overview-area">
            <div class="container-fluid">
                <div class="gcd-overview-items">
                    
                    <?php 
                        $i=1; foreach( $settings['scroll_slider'] as $item ): 
                    ?>
                        <?php if($item['card_short']): ?>
                            <div class="gcd-overview-item">
                                <?php echo do_shortcode( $item['card_short'] ); ?>
                            </div>
                        <?php endif; ?>
                    <?php 
                        $i++; endforeach; 
                    ?>

                </div>
            </div>
        </div>
        <!-- End GCD Overview Area -->

        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Vaximo_Scroll_Overview );