<?php
/**
 * Footer Social Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class VaximoNS_FooterInfo extends Widget_Base {

	public function get_name() {
        return 'VaximoNSFooterInfo';
    }

	public function get_title() {
        return esc_html__( 'Footer Info/Social', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-info-box';
    }

	public function get_categories() {
        return ['vaximocategory'];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Footer_Wid_Area',
			[
				'label' => esc_html__( 'Footer Controls', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'footer_logo',
                [
                    'label' => esc_html__( 'Footer Logo', 'vaximo-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'footer_info',
                [
                    'label'       => __('Footer Info', 'vaximo-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => __('Lorem ipsum dolor sit amet consectetur sed do eiusmod tempor incididunt ut labore et dolore magna aliqua minim veniam.', 'vaximo-toolkit'),
                    'label_block' => true,
                ]
            );
            $repeater = new Repeater();
            $repeater->add_control(
                'social_icon',
                [
                    'label' => __( 'Social Icon', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'icon_img', [
                    'label' => esc_html__( 'Icon', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                    'label_block' => true,
                    'description'  => esc_html__( 'Icon Class field will not reflect if using Icon Image field', 'vaximo-toolkit' ),
                ]
            );
            $repeater->add_control(
                'social_link',
                [
                    'label' => __('External Link', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                ]
            );
            $this->add_control(
                'social_items',
                [
                    'label'  => esc_html__('Add Social Items', 'vaximo-toolkit'),
                    'type'   => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),

                    'default' => [
                        [
                            'social_icon' => 'bx bxl-facebook',
                            'social_link' => '#',
                        ],
                        [
                            'social_icon' => 'bx bxl-twitter',
                            'social_link' => '#',
                        ],
                        [
                            'social_icon' => 'bx bxl-instagram',
                            'social_link' => '#',
                        ],
                        [
                            'social_icon' => 'bx bxl-linkedin',
                            'social_link' => '#',
                        ],
                    ],
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
                'finfo_color',
                [
                    'label'     => __( 'Info Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-footer-widget-card p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'finfo_typography',
                    'label'    => __( 'Info Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-footer-widget-card p',
                ]
            );
            $this->add_control(
                'iconbg_color',
                [
                    'label'     => __( 'Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-footer-widget-card .social-links li a' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label'     => __( 'Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-footer-widget-card .social-links li a' => 'color: {{VALUE}}',
                    ],
                ]
            );
        $this->end_controls_section();
    }

	protected function render() {

        $settings       = $this->get_settings_for_display();
        ?>
        <div class="single-footer-widget-card">
            <?php if( $settings['footer_logo']['url'] != ''): ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo d-inline-block">
                    <img src="<?php echo esc_url( $settings['footer_logo']['url'] ); ?>" alt="<?php echo esc_attr__('footer logo', 'vaximo-toolkit'); ?>">
                </a>
            <?php endif; ?>

            <?php if($settings['footer_info'] != ''): ?>
                <p><?php echo esc_html( $settings['footer_info'] ); ?></p>
            <?php endif; ?>

            <ul class="social-links">
                <?php foreach( $settings['social_items'] as $item ): ?>
                    <li><a href="<?php echo esc_url($item['social_link']); ?>" target="_blank">
                        <?php if($item['icon_img']['url'] != ''): ?> 
                            <img src="<?php echo esc_url( $item['icon_img']['url'] );?>" alt="<?php echo esc_attr__('icon', 'vaximo-toolkit'); ?>">
                        <?php else: ?>
                            <i class="<?php echo esc_attr($item['social_icon']); ?>"></i>
                        <?php endif; ?>     

                    </a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new VaximoNS_FooterInfo );