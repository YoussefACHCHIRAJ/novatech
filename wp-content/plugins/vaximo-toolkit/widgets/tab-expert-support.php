<?php
/**
 * Tab Section
 */

namespace Elementor;
class Vaximo_Experts_Tabs extends Widget_Base {

	public function get_name() {
        return 'CExperts_Tabs';
    }

	public function get_title() {
        return __( 'Expert Support Tabs', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-tabs';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'feature_tabs',
			[
				'label' => __( 'Expert Support Tabs', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'title_tag',
                [
                    'label' => esc_html__( 'Title Tag', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'h1'         => esc_html__( 'h1', 'vaximo-toolkit' ),
                        'h2'         => esc_html__( 'h2', 'vaximo-toolkit' ),
                        'h3'         => esc_html__( 'h3', 'vaximo-toolkit' ),
                        'h4'         => esc_html__( 'h4', 'vaximo-toolkit' ),
                        'h5'         => esc_html__( 'h5', 'vaximo-toolkit' ),
                        'h6'         => esc_html__( 'h6', 'vaximo-toolkit' ),
                    ],
                    'default' => 'h2',
                ]
            );
            $repeater = new Repeater();
            $repeater->add_control(
                'image', [
                    'label' => __( 'Image', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
            $repeater->add_control(
                'tab_title', [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => esc_html__( 'Tab Title', 'vaximo-toolkit' ),
                    'default' => esc_html__('Banking', 'vaximo-toolkit'),
                ]
            );
            $repeater->add_control(
                'title', [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => esc_html__( 'Content Title', 'vaximo-toolkit' ),
                    'default' => esc_html__('Banking Security', 'vaximo-toolkit'),
                ]
            );
            $repeater->add_control(
                'content', [
                    'type'    => Controls_Manager::WYSIWYG,
                    'label'   => esc_html__( 'Content', 'vaximo-toolkit' ),
                    'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'vaximo-toolkit'),
                ]
            );
            $repeater->add_control(
                'button_text_one', [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => esc_html__( 'Button Text', 'vaximo-toolkit' ),
                    'default' => esc_html__('Get Started Now', 'vaximo-toolkit'),
                ]
            );	
            $repeater->add_control(
                'link_type_one', [
                    'type'    => Controls_Manager::SELECT,
                    'label'   => esc_html__( 'Link Type', 'vaximo-toolkit' ),
                    'label_block' => true,
                    'options' => [
                        '1'  => __( 'Link To Page', 'vaximo-toolkit' ),
                        '2'  => __( 'External Link', 'vaximo-toolkit' ),
                    ],
                ]
            );
            $repeater->add_control(
                'link_to_page_one', [
                    'type'    => Controls_Manager::SELECT,
                    'label'   => esc_html__( 'Link Page', 'vaximo-toolkit' ),
                    'label_block' => true,
                    'options'     => vaximo_toolkit_get_page_as_list(),
                    'condition'   => [
                        'link_type_one' => '1',
                    ]
                ]
            );	
            $repeater->add_control(
                'external_link_one', [
                    'type'=>Controls_Manager:: TEXT,
                    'label'   => esc_html__( 'External Link', 'vaximo-toolkit' ),
                    'condition' => [
                        'link_type_one' => '2',
                    ]
                ]
            );	
            $repeater->add_control(
                'target_page_one', [
                    'type'         => Controls_Manager::SWITCHER,
                    'label'        => esc_html__( 'Link Open In New Tab?', 'vaximo-toolkit' ),
                    'label_on'     => __( 'Yes', 'vaximo-toolkit' ),
                    'label_off'    => __( 'No', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );
            $this->add_control(
                'tab_items',
                [
                    'label'  => esc_html__( 'Add Item', 'vaximo-toolkit' ),
                    'type'   => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );

            //Shape Images
            $this->add_control(
                'shape1', [
                    'label'     => __( 'Shape', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );
        $this->end_controls_section();


        $this->start_controls_section(
			'style',
			[
				'label' => esc_html__( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'sec_title_color',
                [
                    'label'     => esc_html__( 'Section Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title h2, .section-title h3, .section-title h4, .section-title h5, .section-title h6, .section-title h1' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'sec_title_typography',
                    'label'    => __( 'Section Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .section-title h2, .section-title h3, .section-title h4, .section-title h5, .section-title h6, .section-title h1',
                ]
            );
            $this->add_control(
				'onedivider',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);
            $this->add_control(
                'tabtitle_color',
                [
                    'label'     => esc_html__( 'Tab Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-defenses-list-tabs .nav .nav-item .nav-link, .expert-support-tabs .nav-tabs .nav-item .nav-link' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'tabtitle_typography',
                    'label' => esc_html__( 'Tab Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .cyber-defenses-list-tabs .nav .nav-item .nav-link, .expert-support-tabs .nav-tabs .nav-item .nav-link',
                ]
            );
            $this->add_control(
                'tabtitle_actcolor',
                [
                    'label'     => esc_html__( 'Tab Title Active Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-defenses-list-tabs .nav .nav-item .nav-link:hover, .cyber-defenses-list-tabs .nav .nav-item .nav-link.active, .expert-support-tabs .nav-tabs .nav-item .nav-link:hover, .expert-support-tabs .nav-tabs .nav-item .nav-link.active' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_control(
                'tabbordercolor',
                [
                    'label'     => esc_html__( 'Tab Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-defenses-list-tabs .nav .nav-item .nav-link' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tab_bg_head',
                [
                    'label'     => esc_html__( 'Tab Button Active Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'     => 'tabbtn_bg2_color',
                    'types'    => ['gradient' ],
                    'selector' => '{{WRAPPER}} .cyber-defenses-list-tabs .nav .nav-item .nav-link::before, .expert-support-tabs .nav-tabs .nav-item .nav-link:hover, .expert-support-tabs .nav-tabs .nav-item .nav-link.active',
                ]
            );
            $this->add_control(
				'twodivider',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-defenses-content h3, .expert-support-tabs .content h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => esc_html__( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .cyber-defenses-content h3, .expert-support-tabs .content h3',
                ]
            );
            $this->add_control(
                'con_color',
                [
                    'label' => esc_html__( 'Description Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-defenses-content p, .expert-support-tabs .content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'ex_typography',
                    'label' => esc_html__( 'Excerpt Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .cyber-defenses-content p, .expert-support-tabs .content p',
                ]
            );
            $this->add_control(
                'con_list_color',
                [
                    'label' => esc_html__( 'Lists Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-defenses-content .cyber-list li, .expert-support-tabs .content .features-list li span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'lists_typography',
                    'label' => esc_html__( 'Lists Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .cyber-defenses-content .cyber-list li, .expert-support-tabs .content .features-list li span',
                ]
            );
            $this->add_control(
				'threedivider',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);
            $this->add_control(
                'icon_list_color',
                [
                    'label' => esc_html__( 'Lists Icon Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-defenses-content .cyber-list li i, .expert-support-tabs .content .features-list li span i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'lists_icon_head',
                [
                    'label'     => esc_html__( 'Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'     => 'list_icon_bg_color',
                    'types'    => ['gradient' ],
                    'selector' => '{{WRAPPER}} .cyber-defenses-content .cyber-list li i, .expert-support-tabs .content .features-list li span i',
                ]
            );
            $this->add_control(
				'fourdivider',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);
            $this->add_control(
                'btn_color',
                [
                    'label'     => esc_html__( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .default-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btn_typography',
                    'label'    => esc_html__( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}}  .default-btn',
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
                    'selector' => '{{WRAPPER}}  .default-btn',
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
                        '{{WRAPPER}} .default-btn:hover, .default-btn::before, .default-btn::after' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn_hcolor',
                [
                    'label'     => esc_html__( 'Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
  
        ?>
        <div class="cyber-defenses-area pb-100">
            <div class="container">
                <?php if( $settings['title'] != '' ) : ?>
                    <div class="section-title">
                        <<?php echo esc_attr($settings['title_tag']);?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr($settings['title_tag']);?>>
                    </div>
                <?php endif; ?>

                <div class="cyber-defenses-list-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php $i = 0;
                        foreach( $settings['tab_items'] as $item ): 
                            if ($i == 0) {
                                $act          = 'active';
                            } else {
                                $act          = '';
                            }
                        ?>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link <?php echo esc_attr($act); ?>" id="oilgas<?php echo esc_attr($i); ?>" data-bs-toggle="tab" href="#manufacturing<?php echo esc_attr( $i); ?>" role="tab" aria-controls="manufacturing<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $item['tab_title'] ); ?></a>
                            </li>
                        <?php $i++; endforeach; ?>
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                        <?php $i = 0;
                        foreach ( $settings['tab_items'] as $item ) : 
                            $btn1_text  = $item['button_text_one'];

                            // Button Link
                            $link_source = '';
                            if( $item['link_type_one'] == 1 ){
                                $link_source = get_page_link($item['link_to_page_one']); 
                            } else {
                                $link_source = $item['external_link_one'];
                            }

                            if ($i == 0) {
                                $active = 'show active';
                            } else {
                                $active = '';
                            }
                        ?>
                            <div class="tab-pane fade  <?php echo esc_attr($active); ?>" id="manufacturing<?php echo esc_attr($i); ?>" role="tabpanel">
                                <div class="row align-items-center">

                                <?php if( $item['image']['url'] != '' ) : ?>
                                    <div class="col-lg-6 col-md-12">
                                <?php else: ?>
                                    <div class="col-lg-12 col-md-12 fullwidth">
                                <?php endif; ?>

                                        <div class="cyber-defenses-content">
                                            <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                            <?php echo wp_kses_post( $item['content'] ); ?>
                                            <?php if($btn1_text != '') { ?>
                                                <div class="cyber-btn">
                                                    <?php if ( 'yes' === $item['target_page_one'] ) { ?>
                                                        <a target="_blank" href="<?php echo esc_url($link_source); ?>" class="default-btn"><?php echo esc_html($btn1_text); ?>
                                                        </a> <?php
                                                    } else { ?>
                                                        <a href="<?php echo esc_url($link_source); ?>" class="default-btn"><?php echo esc_html($btn1_text); ?>
                                                        </a><?php
                                                    } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <?php if( $item['image']['url'] != '' ) : ?>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="cyber-defenses-image">
                                            <img src="<?php echo esc_url( $item['image']['url']); ?>" class="rounded-circle" alt="<?php echo esc_attr__('expert-image','vaximo-toolkit'); ?>">
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php $i++; endforeach; ?>
                    </div>
                </div>
            </div>

            <?php if ( $settings['shape1']['url'] != '' ) : ?>
                <div class="cyber-defenses-shape"><img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape', 'vaximo-toolkit' ); ?>"></div>
            <?php endif; ?>
        </div>
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Vaximo_Experts_Tabs );