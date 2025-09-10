<?php
/**
 * Choose Wrap Lists Widget
 */

namespace Elementor;
class Vaximo_ChooseWrapLists extends Widget_Base {

	public function get_name() {
        return 'VaximoChooseWrapLists';
    }

	public function get_title() {
        return __( 'NS Choose Wrap Lists', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-help-o';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Faq',
			[
				'label' => __( ' Lists Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'sec_title',
                [
                    'label'   => __( ' Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'Why Choose Us', 'vaximo-toolkit' ),
                ]
            );
            $this->add_control(
                'sec_content',
                [
                    'label'   => __( 'Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'show_lists',
                [
                    'label'        => __( 'Show Lists Items?', 'vaximo-toolkit' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'vaximo-toolkit' ),
                    'label_off'    => __( 'Hide', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );
            $fea_items = new Repeater();
            $fea_items->add_control(
                'icon',
                [
                    'label'     => __('Icon', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => 'bx bx-check',
                ]
            );
            $fea_items->add_control(
                'list_title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'Extemly low response time at all time', 'vaximo-toolkit' ),
                ]
            );
            $this->add_control(
                'ns_fea_item',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $fea_items->get_controls(),
                    'condition' => [
                        'show_lists' => 'yes',
                    ]
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'faq_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'sec_color',
                [
                    'label'     => __( 'Section Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}   .choose-wrap' => 'background-color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_responsive_control(
                'sec_padd',
                [
                    'label' => esc_html__( 'Section Padding', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}}   .choose-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'sec_rad',
                [
                    'label' => esc_html__( 'Section Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}}   .choose-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}   .choose-wrap h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}}   .choose-wrap h2',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}   .choose-wrap p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}}   .choose-wrap p',
                ]
            );
            $this->add_control(
                'li_icon_color',
                [
                    'label'     => __( 'Lists Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-wrap ul li i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'li_icon_bgcolor',
                [
                    'label'     => __( 'Lists Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-wrap ul li i' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'li_icon_hbgcolor',
                [
                    'label'     => __( 'Lists Icon Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-wrap ul li:hover i' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'li_title_color',
                [
                    'label'     => __( 'Lists Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}   .choose-wrap ul li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'li_bor_radius',
                [
                    'label' => esc_html__( 'Lists Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .choose-wrap ul li i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_lititle',
                    'label'    => __( 'Lists Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}}  .choose-wrap ul li',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

        $ns_fea_item  = $settings['ns_fea_item'];
    ?>

        <div class="choose-wrap">
            <?php if($settings['sec_title'] != ''): ?>
                <h2><?php echo wp_kses_post($settings['sec_title']); ?></h2>
            <?php endif; ?>

            <?php if($settings['sec_content'] != ''): ?>
                <p><?php echo wp_kses_post($settings['sec_content']); ?></p>
            <?php endif; ?>

            <?php if($settings['show_lists'] == 'yes'): ?>
                <ul>
                    <?php foreach( $ns_fea_item as $item ): ?>
                        <li>
                            <?php if($item['icon'] != ''): ?>
                                <i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
                            <?php endif; ?>

                            <?php echo esc_html( $item['list_title'] ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_ChooseWrapLists );