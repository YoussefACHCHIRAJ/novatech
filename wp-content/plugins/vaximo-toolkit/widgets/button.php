<?php
/**
 * Button Widget
 */

namespace Elementor;
class Vaximo_Button extends Widget_Base {

	public function get_name() {
        return 'VaximoButton';
    }

	public function get_title() {
        return __( 'Vaximo Button', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-handle';
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
                'choose_style',
                [
                    'label' => __( 'Choose Style', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => __( 'Style one', 'vaximo-toolkit' ),
                        '2'   => __( 'Style two', 'vaximo-toolkit' ),
                    ],
                    'default' => '1',
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
                'button_link',
                [
                    'label'   => __( 'Button Link', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::URL,
                ]
            );

            $this->add_control(
                'button_alignment',
                [
                    'label'   => __( 'Button Alignment', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        'text-start'                => __( 'Left', 'vaximo-toolkit' ),
                        'text-center'              => __( 'Center', 'vaximo-toolkit' ),
                        'text-end'               => __( 'Right', 'vaximo-toolkit' ),
                    ],
                    'default' => 'text-start',
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
				'btn_text_color',
				[
					'label'     => __( 'Button Text Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .default-btn' => 'color: {{VALUE}}',
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
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .default-btn',
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
                    'types' => [ 'classic', 'gradient' ],
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

	protected function render() {

        $settings = $this->get_settings_for_display();
        if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_link_attributes( 'button_link', $settings['button_link'] );
		}

        if( $settings['choose_style'] == '1' ):
            if( $settings['button_text'] != '' ): ?>
                <div class="vax-button <?php echo esc_attr($settings['button_alignment']); ?>">
                    <a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> class="default-btn"><?php echo esc_html( $settings['button_text'] ); ?></a>
                </div>
            <?php endif; ?>
        <?php else:
            if( $settings['button_text'] != '' ): ?>
                <div class="vax-button <?php echo esc_attr($settings['button_alignment']); ?>">
                    <a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> class="default-btn active"><?php echo esc_html( $settings['button_text'] ); ?></a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Button );