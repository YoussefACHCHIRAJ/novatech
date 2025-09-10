<?php
/**
 * fade Text Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Vaximo_Slide_Text extends Widget_Base {

	public function get_name() {
        return 'Slide_Text';
    }

	public function get_title() {
        return __( 'Text Slide', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-t-letter';
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
                'text_title', [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => esc_html__( 'Text Slider Title', 'vaximo-toolkit' ),
                    'default' => esc_html__( 'Best Car Detailing And Get A New Car * Best Car Detailing And Get A New Car', 'vaximo-toolkit' ),
                ]
            );
            $this->add_control(
                'text_slider',
                [
                    'label'   => esc_html__( 'Add Text Slide', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );
        $this->end_controls_section();

         // Start Style content controls
         $this-> start_controls_section(
            'heading_style',
            [
                'label' => __('Posts Style', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-advertise-content h1' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-advertise-content h1',
                ]
            );
            
        $this-> end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        ?>
       
        <!-- Start GCD Advertise Area -->
		<div class="gcd-advertise-area pt-120 teachers-fonts-home">
			<div class="container-fluid">
				<div class="gcd-advertise-content">
                    <div class="top">
						<h1>
                            <?php 
                            $i=1; foreach( $settings['text_slider'] as $item ): 
                               if ($i >= 4):
                            ?>
                                <?php if($item['text_title']): ?>
                                    <span><?php echo wp_kses_post( $item['text_title'] ); ?></span>
                                    <?php if( $i==1 OR $i==2 OR $i==3 ): ?>
                                        <span class="gap"></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php 
                                endif;
                            $i++; endforeach; 
                            ?>
						</h1>
					</div>
					<div class="bottom">
						<h1>
                        <?php 
                            $i=1; foreach( $settings['text_slider'] as $item ): 
                               if ($i <= 5):
                            ?>
                                <?php if($item['text_title']): ?>
                                    <span><?php echo wp_kses_post( $item['text_title'] ); ?></span>
                                    <?php if( $i==5 OR $i==6): ?>
                                        <span class="gap"></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php 
                                endif;
                            $i++; endforeach; 
                            ?>
						</h1>
					</div>
                </div>
			</div>
		</div>
		<!-- End GCD Advertise Area -->

        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Vaximo_Slide_Text );