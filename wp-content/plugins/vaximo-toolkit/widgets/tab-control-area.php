<?php
/**
 * Tab Control Section
 */

namespace Elementor;
class Vaximo_Control_Tabs extends Widget_Base {

	public function get_name() {
        return 'Tabs_Controls_Section';
    }

	public function get_title() {
        return __( 'Tabs Control Area', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-tabs';
    }

	public function get_categories() {
        return ['vaximocategory'];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'feature_tabs',
			[
				'label' => __( 'Feature Tabs Logo', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'title', [
                    'label'       => __( 'Title', 'cavie-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'heading_tag', [
                    'label'   => __( 'Title Heading Tag', 'cavie-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                    ],
                    'default'     => 'h3',
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'desc', [
                    'label' => __( 'Description', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::WYSIWYG,
                    'label_block' => true,
                ]
            );
            $card_items = new Repeater();
            $card_items->add_control(
                'tab_title',
                [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => __( 'Tab Title', 'vaximo-toolkit' ),
                    'default' => __('Intercom System', 'vaximo-toolkit'),
                ]
            );
            $card_items->add_control(
                'content',
                [
                    'type'    => Controls_Manager::WYSIWYG,
                    'label'   => __( 'Inner Content', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'btn_title',
                [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => __( 'Button Title', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'link_type',
                [
                    'label'       => __( 'Link Type', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'   => __( 'Link To Page', 'vaximo-toolkit' ),
                        '2'   => __( 'External Link', 'vaximo-toolkit' ),
                    ],
                ]
            );
            $card_items->add_control(
                'link_to_page',
                [
                    'label'       => __( 'Link Page', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => vaximo_toolkit_get_page_as_list(),
                    'condition'   => [
                        'link_type'     => '1',
                    ]
                ]
            );
            $card_items->add_control(
                'external_link',
                [
                    'label'     => __('External Link', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type'  => '2',
                    ]
                ]
            );
            $card_items->add_control(
                'target_page',
                [
                    'label' => __( 'Link Open In New Tab?', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'vaximo-toolkit' ),
                    'label_off' => __( 'No', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'tab_items',
                [
                    'label'       => __( 'Add Card Content', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
                ]
            );

            $this->add_control(
                'image',
                [
                    'label' => __('Image', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'feature_tab_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .home-control-content h3, .home-control-content h1, .home-control-content h2, .home-control-content h4, .home-control-content h5, .home-control-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .home-control-content h3, .home-control-content h1, .home-control-content h2, .home-control-content h4, .home-control-content h5, .home-control-content h6',
                ]
            );
            $this->add_control(
                'secp_color',
                [
                    'label'     => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .home-control-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'secp_typography',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .home-control-content p',
                ]
            );
            $this->add_control(
                'tab_title_bgcolor',
                [
                    'label'     => __( 'Tab Title Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .home-control-content .home-control-tab-wrap .home-control-tab .tabs li' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tab_title_borcolor',
                [
                    'label'     => __( 'Tab Title Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .home-control-content .home-control-tab-wrap .home-control-tab .tabs li::before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_title_active_color',
                [
                    'label'     => __( 'Tab Title Active Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .home-control-content .home-control-tab-wrap .home-control-tab .tabs .current a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_title_color',
                [
                    'label'     => __( 'Tab Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .home-control-content .home-control-tab-wrap .home-control-tab .tabs li a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'card_title_typography',
                    'label'    => __( 'Tab Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .home-control-content .home-control-tab-wrap .home-control-tab .tabs li a',
                ]
            );
            $this->add_control(
                'card_desc_color',
                [
                    'label'     => __( 'Tab Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .home-control-content .home-control-tab-wrap .tab_content .tabs_item p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'card_desc_typography',
                    'label'    => __( 'Tab Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .home-control-content .home-control-tab-wrap .tab_content .tabs_item p',
                ]
            );
            $this->add_control(
                'card_descli_iconcolor',
                [
                    'label'     => __( 'Tab Lists Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .home-control-content .home-control-tab-wrap .tab_content .tabs_item .list li i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_descli_iconbgcolor',
                [
                    'label'     => __( 'Tab Lists Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .home-control-content .home-control-tab-wrap .tab_content .tabs_item .list li i' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_descli_color',
                [
                    'label'     => __( 'Tab Lists Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .home-control-content .home-control-tab-wrap .tab_content .tabs_item .list li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'card_descli_typography',
                    'label'    => __( 'Tab Lists Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .home-control-content .home-control-tab-wrap .tab_content .tabs_item .list li',
                ]
            );
            $this->add_control(
                'card_btn_color',
                [
                    'label'     => __( 'Tab Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'card_btn_typography',
                    'label'    => __( 'Tab Button Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .default-btn',
                ]
            );
            $this->add_control(
                'btn_bg_head',
                [
                    'label'     => esc_html__( 'Button Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_bg2_color',
                    'types'    => ['gradient' ],
                    'selector' => '{{WRAPPER}}  .home-control-content .home-control-tab-wrap .tab_content .tabs_item .default-btn',
                ]
            );
            $this->add_control(
				'fivedivider',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);
            $this->add_control(
                'btn_hbgcolor',
                [
                    'label'     => esc_html__( 'Button Background Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .home-control-content .home-control-tab-wrap .tab_content .tabs_item .default-btn:hover, .home-control-content .home-control-tab-wrap .tab_content .tabs_item .default-btn::before, .home-control-content .home-control-tab-wrap .tab_content .tabs_item .default-btn::after' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn_hcolor',
                [
                    'label'     => esc_html__( 'Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .home-control-content .home-control-tab-wrap .tab_content .tabs_item .default-btn:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        global $vaximo_opt;

        if( isset( $vaximo_opt['enable_lazyloader'] ) ):
            $is_lazyloader = $vaximo_opt['enable_lazyloader'];
        else:
            $is_lazyloader = true;
        endif;

        if( $is_lazyloader == true ):
            $lazy_class = 'smartify';
            $lazy_attr = 'sm-';
        else:
            $lazy_class = '';
            $lazy_attr = '';
        endif;

        ?>
            <div class="home-control-area ptb-100">
                <div class="container">
                    <div class="row align-items-center">
                        <?php if( $settings['image']['url'] != '' ) : ?>
                            <div class="col-lg-6 col-md-12">
                        <?php else: ?>
                            <div class="col-lg-12 col-md-12 fullwidth">
                        <?php endif; ?>
                            <div class="home-control-content">
                                <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                                <p><?php echo wp_kses_post( $settings['desc'] ); ?></p>

                                <div class="home-control-tab-wrap">
                                    <div class="tab home-control-tab">
                                        <ul class="tabs">
                                            <?php foreach( $settings['tab_items'] as $item ): ?>
                                                <li>
                                                    <a href="#">
                                                        <?php echo esc_html( $item['tab_title'] ); ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <div class="tab_content">
                                            <?php foreach ( $settings['tab_items'] as $item ) : 
                                                $link_source = '';
                                                if ( $item['link_type'] == 1 ) :
                                                    $link_source = get_page_link($item['link_to_page']); 
                                                else :
                                                    $link_source = $item['external_link'];
                                                endif; ?>

                                                <div class="tabs_item">
                                                    <?php echo wp_kses_post( $item['content'] ); ?>

                                                    <?php if( $item['btn_title'] != '') { ?>
                                                        <?php if ( 'yes' === $item['target_page'] ) { ?>
                                                            <a class="default-btn" target="_blank" href="<?php echo esc_url( $link_source ); ?>">
                                                                <?php echo esc_html( $item['btn_title'] ); ?>
                                                            </a><?php
                                                        } else { ?>
                                                            <a class="default-btn" href="<?php echo esc_url( $link_source ); ?>">
                                                                <?php echo esc_html( $item['btn_title'] ); ?>
                                                            </a><?php
                                                        } ?>
                                                    <?php } ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if( !empty( $settings['image']['url'] ) ){ ?>
                            <div class="col-lg-6 col-md-12">
                                <div class="home-control-image">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'cavie-toolkit' ); ?>">
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        <?php
	}
	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Control_Tabs );