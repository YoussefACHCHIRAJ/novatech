<?php
/**
 * Footer Menu Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class VaximoNS_FooterMenu extends Widget_Base {

	public function get_name() {
        return 'NS_FooterMenu';
    }

	public function get_title() {
        return esc_html__( 'Footer Menu', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-info-box';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Footer_Wid_Area',
			[
				'label' => esc_html__( 'Footer Widgets Control', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'fmenu_title',
                [
                    'label'       => __('Footer Menu Title', 'vaximo-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Company', 'vaximo-toolkit'),
                    'label_block' => true,
                ]
            );
            $repeater = new Repeater();
            $repeater->add_control(
                'btn_text',
                [
                    'label' => __( 'Link Text', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'link_type',
                [
                    'label' => __( 'Link Type', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'   => __( 'Link To Page', 'vaximo-toolkit' ),
                        '2'   => __( 'External Link', 'vaximo-toolkit' ),
                    ],
                ]
            );
            $repeater->add_control(
                'link_to_page',
                [
                    'label' => __( 'Link Page', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => vaximo_toolkit_get_page_as_list(),
                    'condition'   => [
                        'link_type'   => '1',
                    ]
                ]
            );
            $repeater->add_control(
                'external_link',
                [
                    'label' => __('External Link', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type'   => '2',
                    ]
                ]
            );
            $this->add_control(
                'button_items',
                [
                    'label'  => esc_html__('Add Link', 'vaximo-toolkit'),
                    'type'   => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );
        $this-> end_controls_section();
        
        $this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'ftitle_color',
                [
                    'label'     => __( 'Footer Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-footer-widget-card h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'ftitle_typography',
                    'label'    => __( 'Footer Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-footer-widget-card h3',
                ]
            );
            $this->add_control(
                'flists_color',
                [
                    'label'     => __( 'Footer Lists Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .single-footer-widget-card .custom-links li a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'flists_typography',
                    'label'    => __( 'Footer Lists Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-footer-widget-card .custom-links li a',
                ]
            );
        $this->end_controls_section();
    }

	protected function render() {

        $settings       = $this->get_settings_for_display();
        ?>

        <div class="single-footer-widget-card ps-5">
            <h3><?php echo esc_html($settings['fmenu_title']); ?></h3>

            <ul class="custom-links">
                <?php foreach( $settings['button_items'] as $item ): 
                    $link_one = '';
                    if( $item['link_type'] == 1 ){
                        $link_one = get_page_link($item['link_to_page']); 
                    } else {
                        $link_one = $item['external_link'];
                    }
                ?>
                    <li><a href="<?php echo esc_url($link_one); ?>"><?php echo esc_html($item['btn_text']); ?></a></li>

                <?php endforeach; ?>
            </ul>
        </div>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new VaximoNS_FooterMenu );