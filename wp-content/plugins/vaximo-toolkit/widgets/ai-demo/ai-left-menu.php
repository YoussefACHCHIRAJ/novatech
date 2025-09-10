<?php
/**
 * Menu Widget
 */

namespace Elementor;
class Ai_Menu_List extends Widget_Base {

	public function get_name() {
        return 'Ai_Menu';
    }

	public function get_title() {
        return __( 'Ai Menu', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-menu-bar';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'menu_section',
			[
				'label' => __( 'Menu Logo', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
        
            $card_items = new Repeater();

                $card_items->add_control(
                    'menu_link',
                    [
                        'type'    => Controls_Manager:: TEXT,
                        'label'   => __( 'Menu Id Link', 'vaximo-toolkit' ),
                       'default' => __('#overview', 'vaximo-toolkit'),
                    ]
                );

                $card_items->add_control(
                    'menu_title',
                    [
                        'label'   => __('Menu Title','vaximo-toolkit'),
                        'type'    => Controls_Manager:: TEXT,
                        'default' => __('1. Overview', 'vaximo-toolkit'),
                    ]
                );
        
            $this->add_control(
                'menu_item',
                [
                    'label'       => __( 'Add Menu Item', 'vaximo-toolkit' ),
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
                'menu_title',
                [
                    'label'     => __( 'Menu Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-sidebar li .scroll-link' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_menu',
                    'label'    => __( 'Menu Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-powered-security-sidebar li .scroll-link',
                ]
            );

            $this->add_control(
                'menu_bg_color',
                [
                    'label'     => __( 'Menu Title Active Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-sidebar li .scroll-link:hover, {{WRAPPER}} .ai-powered-security-sidebar li .scroll-link.active' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'menu_border_radius',
                [
                    'label' => esc_html__( 'Menu Title Active Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} {{WRAPPER}} .ai-powered-security-sidebar li .scroll-link:hover, {{WRAPPER}} .ai-powered-security-sidebar li .scroll-link.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        
        $this-> end_controls_section();
      
    }

	protected function render() {
        $settings = $this->get_settings_for_display(); 
        
        ?>

        <div class="teachers-fonts-home">
            <ul class="ai-powered-security-sidebar">
                <?php $i=1; foreach( $settings['menu_item'] as $item ): ?>
                    <?php if( $item['menu_title'] && $item['menu_link']): ?>
                        <li>
                            <a href="<?php echo esc_attr( $item['menu_link'] ); ?>" class="scroll-link <?php if($i==1): ?> active  <?php endif; ?>"><?php echo wp_kses_post( $item['menu_title'] ); ?></a>
                        </li>
                    <?php endif; ?>
                <?php $i++; endforeach; ?>
            </ul>
        </div>
       
        <?php
	}
	 

}

Plugin::instance()->widgets_manager->register( new Ai_Menu_List );