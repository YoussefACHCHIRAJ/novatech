<?php
/**
 * Button Widget
 */

namespace Elementor;
class Vaximo_Help_Button extends Widget_Base {

	public function get_name() {
        return 'Help_Button';
    }

	public function get_title() {
        return __( 'Vaximo Help Button', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-button';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Vaximo_Button',
			[
				'label' => __( 'Vaximo Button', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::TEXT,
                    'default' => __('Get In Touch', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'button_icon',
                [
                    'label'   => __( 'Button Icon', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::TEXT,
                    'default' => __('bx bx-right-arrow-alt', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'link_type',
                [
                    'label' 		=> esc_html__( 'Button Link Type', 'vaximo-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' => [
                        '1'  	=> esc_html__( 'Link To Page', 'vaximo-toolkit' ),
                        '2' 	=> esc_html__( 'External Link', 'vaximo-toolkit' ),
                    ],
                ]
            );

            $this->add_control(
                'link_to_page',
                [
                    'label' 		=> esc_html__( 'Button Link Page', 'vaximo-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' 		=> vaximo_toolkit_get_page_as_list(),
                    'condition' => [
                        'link_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'ex_link',
                [
                    'label'		=> esc_html__('Button External Link', 'vaximo-toolkit'),
                    'type'		=> Controls_Manager::TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'Button_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'btn_onecolor', [
                    'label'     => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .help-btn-ara .help-btn' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->add_control(
                'btn_onebgcolor', [
                    'label'     => __( 'Button Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .help-btn-ara .help-btn' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_onehcolor', [
                    'label'     => __( 'Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .help-btn-ara .help-btn:hover' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->add_control(
                'btn_onehbgcolor', [
                    'label'     => __( 'Button Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .help-btn-ara .help-btn:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_btn2',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .help-btn-ara .help-btn',
                ]
            );

            $this->add_responsive_control(
                'border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .help-btn-ara .help-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .help-btn-ara .help-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        // Get Button Link
         if( $settings['link_type'] == 1 ){
            $link = get_page_link( $settings['link_to_page'] );
        } else {
            $link = $settings['ex_link'];
        }

        ?>

            <?php if( $settings['button_text'] && $link): ?>
                <div class="help-btn-ara">
                    <a href="<?php echo esc_url( $link ); ?>" class="help-btn">
                        <?php echo esc_html( $settings['button_text'] ); ?>
                        <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i>
                    </a>
                </div> 
            <?php endif; ?>

        <?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Vaximo_Help_Button );