<?php
/**
 * Contact Info Two Widget
 */

namespace Elementor;
class Vaximoservice_brochures extends Widget_Base {

	public function get_name() {
        return 'Vaximoservicebrochures';
    }

	public function get_title() {
        return __( 'Service Brochures', 'vaximo-toolkit' );
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
				'label' => __('Brochures Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'sec_title',
                [
                    'label'   => __( ' Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'Brochures', 'vaximo-toolkit' ),
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
                    'default'   => 'bx bxs-file-pdf',
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
                    'default' => __( 'PDF Download', 'vaximo-toolkit' ),
                ]
            );
            $con_items->add_control(
                'list_url',
                [
                    'label'   => __( 'List URL', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default'  => 'http://www.africau.edu/images/default/sample.pdf',
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
                        '{{WRAPPER}} .download-file' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'sec_borcolor',
                [
                    'label'     => __( 'Section Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .download-file' => 'border-color: {{VALUE}}',
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
                        '{{WRAPPER}}  .download-file' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}}  .download-file' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .download-file h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .download-file h3',
                ]
            );
            $this->add_control(
                'li_title_color',
                [
                    'label'     => __( 'Lists Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .download-file ul li a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_lititle',
                    'label'    => __( 'Lists Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .download-file ul li a',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

        $ser_fea_item  = $settings['ser_fea_item'];
    ?>

        <div class="download-file">
            <?php if($settings['sec_title'] != ''): ?>
                <h3><?php echo wp_kses_post($settings['sec_title']); ?></h3>
            <?php endif; ?>

            <?php if($settings['show_lists'] == 'yes'): ?>
                <ul>
                    <?php foreach( $ser_fea_item as $item ): ?>
                        <li>
                            <a href="<?php echo esc_url( $item['list_url'] ); ?>" target="_blank">
                                <?php echo esc_html( $item['list_title'] ); ?>

                                <?php if($item['icon_img']['url'] != ''): ?>
                                    <img src="<?php echo esc_url($item['icon_img']['url']); ?>" alt="<?php echo esc_attr__('icon', 'vaximo-toolkit'); ?>">
                                <?php else: ?>
                                    <?php if( $item['icon'] != ''): ?>
                                        <i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximoservice_brochures );