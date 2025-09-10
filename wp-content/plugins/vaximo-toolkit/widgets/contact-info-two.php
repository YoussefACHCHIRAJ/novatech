<?php
/**
 * Contact Info Two Widget
 */

namespace Elementor;
class VaximoContactInfoTwo extends Widget_Base {

	public function get_name() {
        return 'Vaximo_ContactInfoTwo';
    }

	public function get_title() {
        return __( 'Contact Info Two', 'vaximo-toolkit' );
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
				'label' => __( ' Contact Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'sec_title',
                [
                    'label'   => __( ' Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'Contact Info', 'vaximo-toolkit' ),
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
            $con_items = new Repeater();
            $con_items->add_control(
                'icon',
                [
                    'label'     => __('Icon', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => 'bx bx-check',
                ]
            );
            $con_items->add_control(
                'icon_img',
                [
                    'label'     => __('Icon Image', 'vaximo-toolkit'),
                    'type'      => Controls_Manager::MEDIA,
                    'description' => __( 'Leave the icon field empty if you want to display icon image', 'vaximo-toolkit' ),
             
                ]
            );
            $con_items->add_control(
                'list_title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'Phone: ', 'vaximo-toolkit' ),
                ]
            );
            $con_items->add_control(
                'list_content',
                [
                    'label'   => __( 'List Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default'  => '
                        <a href="tel:+1-202-555-0122" target="_blank">+1-202-555-0122</a>
                    '
                ]
            );
            $this->add_control(
                'ser_fea_item',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $con_items->get_controls(),
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
                        '{{WRAPPER}} .services-contact-info' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'sec_borcolor',
                [
                    'label'     => __( 'Section Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-contact-info' => 'border-color: {{VALUE}}',
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
                        '{{WRAPPER}}  .services-contact-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}}   .services-contact-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .services-contact-info h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .services-contact-info h3',
                ]
            );
           
            $this->add_control(
                'li_icon_color',
                [
                    'label'     => __( 'Lists Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-contact-info ul li .icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'li_title_color',
                [
                    'label'     => __( 'Lists Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .services-contact-info ul li span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_lititle',
                    'label'    => __( 'Lists Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .services-contact-info ul li span',
                ]
            );
            $this->add_control(
                'li_con_color',
                [
                    'label'     => __( 'Lists Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .services-contact-info ul li, .services-contact-info ul li a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_licontent',
                    'label'    => __( 'Lists Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .services-contact-info ul li a, .services-contact-info ul li',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

        $ser_fea_item  = $settings['ser_fea_item'];
    ?>
        <div class="services-contact-info">
            <?php if($settings['sec_title'] != ''): ?>
                <h3><?php echo wp_kses_post($settings['sec_title']); ?></h3>
            <?php endif; ?>
                               
            <?php if($settings['show_lists'] == 'yes'): ?>
                <ul>
                    <?php foreach( $ser_fea_item as $item ): ?>
                        <li>
                            <?php if($item['icon_img']['url'] != ''): ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url($item['icon_img']['url']); ?>" alt="<?php echo esc_attr__('icon', 'vaximo-toolkit'); ?>">
                                </div>
                            <?php else: ?>
                                <?php if( $item['icon'] != ''): ?>
                                    <div class="icon">
                                        <i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <span><?php echo esc_html( $item['list_title'] ); ?></span>

                            <?php echo wp_kses_post($item['list_content']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new VaximoContactInfoTwo );