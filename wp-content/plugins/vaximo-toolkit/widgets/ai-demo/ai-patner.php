<?php
/**
 * Partner Logo Slider Widget
 */

namespace Elementor;
class Ai_Partner_Logo extends Widget_Base {

	public function get_name() {
        return 'Ai_Partner_Logo';
    }

	public function get_title() {
        return __( 'Ai Partner Logo', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-logo';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'partner_section',
			[
				'label' => __( 'Partner Logo', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
           
            $this->add_control(
                'patner_title',
                [
                    'label'   => __('Partner Title','vaximo-toolkit'),
                    'type'    => Controls_Manager:: TEXT,
                    'default' => __('Trusted by over 2500+ organisations since 1984', 'vaximo-toolkit'),
                ]
            );

            $card_items = new Repeater();

                $card_items->add_control(
                    'logo',
                    [
                        'type'    => Controls_Manager::MEDIA,
                        'label'   => __( 'Logo', 'vaximo-toolkit' ),
                    ]
                );
        
            $this->add_control(
                'logos',
                [
                    'label'       => __( 'Add Logo', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
                ]
            );

        $this->end_controls_section();

        // Start style1 content controls
        $this-> start_controls_section(
            'content_style',
            [
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'partnar_title',
                [
                    'label'     => __( 'Partner Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-trust-inner h5' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_partnar',
                    'label'    => __( 'Partner Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-trust-inner h5',
                ]
            );

            $this->add_control(
                'partnar_bg_color',
                [
                    'label'     => __( 'Partner Card Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-trust-inner' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'partnar_border_radius',
                [
                    'label' => esc_html__( 'Partner Card Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .ai-trust-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        
        $this-> end_controls_section();
      
    }

	protected function render() {
        $settings = $this->get_settings_for_display(); 
        
        ?>

        <!-- Start AI Trust Area -->
        <div class="teachers-fonts-home ai-whole-bg-black">
            <div class="ai-trust-area">
                <div class="container">
                    <div class="ai-trust-inner">
                        <?php if( $settings['patner_title']): ?>
                            <h5><?php echo wp_kses_post( $settings['patner_title'] ); ?></h5>
                        <?php endif; ?>
                        <ul class="list">
                    
                            <?php foreach( $settings['logos'] as $item ): ?>
                                <li>
                                    <img src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Logo', 'vaximo-toolkit' ); ?>">
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<!-- End AI Trust Area -->
       
        <?php
	}
	 

}

Plugin::instance()->widgets_manager->register( new Ai_Partner_Logo );