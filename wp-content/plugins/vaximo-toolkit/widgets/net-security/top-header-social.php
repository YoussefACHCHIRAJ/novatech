<?php
/**
 * Top Header Social Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class VaximoNS_THSocial extends Widget_Base {

	public function get_name() {
        return 'VaximoNS_THSocial';
    }

	public function get_title() {
        return esc_html__( 'Top Header Social', 'vaximo-toolkit' );
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
				'label' => esc_html__( 'Top Header Social Controls', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'social_text',
                [
                    'label'       => __('Social Text', 'vaximo-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Support Center', 'vaximo-toolkit'),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'stext_link',
                [
                    'label'       => __('Social Link', 'vaximo-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => '#',
                    'label_block' => true,
                ]
            );
            $repeater = new Repeater();
            $repeater->add_control(
                'icon_img', [
                    'label' => esc_html__( 'Icon image', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                    'label_block' => true,
                    'description'  => esc_html__( 'Icon Class field will not reflect if using Icon Image field', 'vaximo-toolkit' ),
                ]
            );
            $repeater->add_control(
                'social_icon',
                [
                    'label' => __( 'Social Icon Class', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::TEXT,
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
                        '{{WRAPPER}} .top-header-relative-social li span a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'tophead_infotypography',
					'label'    => __( 'Info Typography', 'vaximo-toolkit' ),
					 
					'selector' => '{{WRAPPER}} .top-header-relative-social li span a',
				]
			);
            $this->add_control(
                'finfo_icncolor',
                [
                    'label'     => __( 'Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .top-header-relative-social li a i' => 'color: {{VALUE}}',
                    ],
                ]
            );
          
        $this->end_controls_section();
    }

	protected function render() {

        $settings       = $this->get_settings_for_display();
        ?>

        <ul class="top-header-relative-social">
            <?php if($settings['social_text'] != ''): ?>
                <li>
                    <span><a href="<?php echo esc_url($settings['stext_link']); ?>"><?php echo esc_html($settings['social_text']); ?></a></span>
                </li>
            <?php endif; ?>

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
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new VaximoNS_THSocial );