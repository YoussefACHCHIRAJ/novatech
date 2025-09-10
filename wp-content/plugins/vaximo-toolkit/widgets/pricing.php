<?php
/**
 * Pricing Widget
 */

namespace Elementor;
class Vaximo_Pricing extends Widget_Base {

	public function get_name() {
        return 'Vaximo_Pricing';
    }

	public function get_title() {
        return __( 'Pricing Table', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-price-table';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Pricing_Area',
			[
				'label' => __( 'Pricing Controls', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'choose_style',
                [
                    'label' => __( 'Choose Style', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => __( 'Style 1', 'vaximo-toolkit' ),
                        '2'   => __( 'Style 2', 'vaximo-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );
            $this->add_control(
                'columns',
                [
                    'label' => __( 'Choose Columns', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '2'   => __( '2', 'vaximo-toolkit' ),
                        '3'   => __( '3', 'vaximo-toolkit' ),
                        '4'   => __( '4', 'vaximo-toolkit' ),
                    ],
                    'default' => '3',
                    'condition'   => [
                        'choose_style' => '1',
                    ]
                ]
            );
            $pricing_items = new Repeater();
            
            $pricing_items->add_control(
                'pricing_text_alignment',
                [
                    'label' => __( 'Choose Title Alignment', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'     => __( 'Text Align Center', 'vaximo-toolkit' ),
                        '2'     => __( 'Text Align Right', 'vaximo-toolkit' ),
                        '3'     => __( 'Text Align Left', 'vaximo-toolkit' ),
                    ],
                    'default' => '1'
                ]
            );
            $pricing_items->add_control(
                'title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('One Time', 'vaximo-toolkit'),
                ]
            );
            $pricing_items->add_control(
                'price',
                [
                    'label'   => __( 'Price', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('$29', 'vaximo-toolkit'),
                ]
            );

            $pricing_items->add_control(
                'price_suffix',
                [
                    'label'   => __( 'Number Suffix', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('/ Per Year', 'vaximo-toolkit'),
                ]
            );

            $pricing_items->add_control(
                'features',
                [
                    'label'         => __( 'Features', 'vaximo-toolkit' ),
                    'type'          => Controls_Manager::TEXTAREA,
                    'default'       => __('The Departure Of The Expect, Remote Administrator,Configure Software, Special Application *,24/7 Support *', 'vaximo-toolkit'),
                    'description'   => 'Use a comma to add a new item. If you want to add disable icon on the list then add * on the list.'
                ]
            );

            // Button Text
            $pricing_items->add_control(
                'button',
                [
                    'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Get Started', 'vaximo-toolkit'),
                ]
            );
            $pricing_items->add_control(
                'link_type',
                [
                    'label'       => __( 'Link Type', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => [
                        '1'  => __( 'Link To Page', 'vaximo-toolkit' ),
                        '2'  => __( 'External Link', 'vaximo-toolkit' ),
                    ],
                ]
            );
            $pricing_items->add_control(
                'link_to_page',
                [
                    'label'       => __( 'Link Page', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => vaximo_toolkit_get_page_as_list(),
                    'condition'   => [
                        'link_type' => '1',
                    ]
                ]
            );
            $pricing_items->add_control(
                'external_link',
                [
                    'label' => __('External Link', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

            //Target Page
            $pricing_items->add_control(
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
                'list_items',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $pricing_items->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'heading_bgcolor',
                [
                    'label'     => __( 'Heading Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing .pricing-content' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
			$this->add_control(
				'title_color',
				[
					'label'     => __( 'Price Title Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-pricing .pricing-content h3' => 'color: {{VALUE}}',
					],
				]
            );
            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_font_size',
                    'label'    => __( 'Price Title Typography', 'vaximo-toolkit' ),
                     
					'selector' => '{{WRAPPER}} .single-pricing .pricing-content h3',
                ]
            );
            $this->add_control(
				'price_color',
				[
					'label'     => __( 'Price Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-pricing h1' => 'color: {{VALUE}}',
					],
				]
            );
            
			$this->add_responsive_control(
				'price_size',
				[
					'label'      => __( 'Price Font Size', 'vaximo-toolkit' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'    => [
						'px' => [
							'min'  => 1,
							'max'  => 70,
							'step' => 1,
						],
					],
					'devices'   => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .single-pricing h1' => 'font-size: {{SIZE}}px;',
					],
				]
            );
            
            $this->add_control(
				'suf_color',
				[
					'label'     => __( 'Price Suffix Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-pricing h1 sub' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'price_suf_pre_size',
				[
					'label'      => __( 'Price Suffix Font Size', 'vaximo-toolkit' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 70,
							'step' => 1,
						],
					],
					'devices'   => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .single-pricing h1 sub' => 'font-size: {{SIZE}}px;',
					],
				]
            );
            
            $this->add_control(
				'list_color',
				[
					'label'     => __( 'List Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-pricing ul li' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'list_iconcolor',
				[
					'label'     => __( 'List Icon Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-pricing ul li i' => 'color: {{VALUE}}',
					],
				]
            );
            
            $this->add_control(
				'cross_list_color',
				[
					'label'     => __( 'Cross List Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-pricing ul li span, .single-pricing ul li span i' => 'color: {{VALUE}}',
					],
				]
			);
            $this->add_control(
				'cross_list_ivcincolor',
				[
					'label'     => __( 'Cross List Icon Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-pricing ul li span i' => 'color: {{VALUE}}',
					],
				]
			);
			
			$this->add_responsive_control(
				'content_size',
				[
					'label'      => __( 'List Font Size', 'vaximo-toolkit' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 5,
							'max' => 40,
							'step' => 1,
						],
					],
					'devices'   => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .single-pricing ul li' => 'font-size: {{SIZE}}px;',
					],
				]
			);

            $this->add_control(
                'btn_onecolor', [
                    'label'     => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_onehcolor', [
                    'label'     => __( 'Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_onehbgcolor', [
                    'label'     => __( 'Button Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn::before, .default-btn::after' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        // Card Columns
        $columns = $settings['columns'];
        if ( $columns == '2' ) {
            $column = 'col-lg-6 col-sm-6';
        } elseif ( $columns == '3' ) {
            $column = 'col-lg-4 col-sm-6 offset-sm-3 offset-lg-0';
        } elseif ( $columns == '4' ) {
            $column = 'col-lg-3 col-sm-6';
        } else {
            $column = 'col-lg-4 col-sm-6';
        }

        $table_item_count = 1;
        ?>
        <?php if ( $settings['choose_style'] == '1' ) : ?>
            <div class="container">
                <div class="row">
                    <?php
                    foreach( $settings['list_items'] as $item ): ?>
                        <?php

                            // Text Alignment
                            if( $item['pricing_text_alignment' ] == '1') {
                                $alignment = 'text-center';
                            } 
                            elseif( $item['pricing_text_alignment' ] == '2') {
                                $alignment = 'text-right';
                            } else {
                                $alignment = 'text-left';
                            }

                            // Button link
                            $link_source = '';
                            if ( $item['link_type'] == 1 ) :
                                $link_source = get_page_link( $item['link_to_page']); 
                            else :
                                $link_source = $item['external_link'];
                            endif;
                        ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <div class="single-pricing <?php echo esc_attr( $alignment); ?>">
                                <div class="pricing-content">
                                    <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                    <h1>
                                        <?php echo esc_html( $item['price'] ); ?>
                                        <?php if( $item['price_suffix'] != '' ) : ?>
                                            <sub><?php echo esc_html( $item['price_suffix'] ); ?></sub>
                                        <?php endif; ?>
                                    </h1>
                                </div>

                                <ul>
                                    <?php $lists = explode(',', $item['features'] );
                                    foreach (  $lists as $list ) : ?>
                                        <?php if ( strpos( $list, "*" ) !== false ) : ?>
                                            <li><span><i class="bx bx-x"></i> <?php echo str_replace('*', '', $list); ?></span></li>
                                        <?php else: ?>
                                            <li><i class="bx bx-check"></i> <?php echo esc_html( $list ); ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                                <?php if ( $item['button'] != '' ) : ?>
                                    <?php if ( 'yes' === $item['target_page'] ) { ?>
                                        <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="default-btn"><?php echo esc_html( $item['button'] ); ?></a><?php
                                    } else { ?>
                                        <a href="<?php echo esc_url( $link_source ); ?>" class="default-btn"><?php echo esc_html( $item['button'] ); ?></a><?php
                                    } ?>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else : ?>
            <div class="container">
                <div class="row">
                    <?php
                    foreach( $settings['list_items'] as $item ): ?>
                        <?php

                            // Text Alignment
                            if( $item['pricing_text_alignment' ] == '1') {
                                $alignment = 'text-center';
                            } 
                            elseif( $item['pricing_text_alignment' ] == '2') {
                                $alignment = 'text-right';
                            } else {
                                $alignment = 'text-left';
                            }
                            if( $table_item_count == 3 ):
                                $item_class = 'col-lg-4 col-sm-6 offset-sm-3 offset-lg-0';
                            else:
                                $item_class = 'col-lg-4 col-sm-6';
                            endif;

                            if( $table_item_count == 2 ):
                                $active_class = ' active';
                            else:
                                $active_class = '';
                            endif;

                            // Button link
                            $link_source = '';
                            if ( $item['link_type'] == 1 ) :
                                $link_source = get_page_link( $item['link_to_page']); 
                            else :
                                $link_source = $item['external_link'];
                            endif;
                        ?>
                        <div class="<?php echo esc_attr( $item_class ); ?>">
                            <div class="single-pricing <?php echo esc_attr( $active_class ); ?> <?php echo esc_attr( $alignment); ?>">
                                <div class="pricing-content">
                                    <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                    <h1>
                                        <?php echo esc_html( $item['price'] ); ?>
                                        <?php if( $item['price_suffix'] != '' ) : ?>
                                            <sub><?php echo esc_html( $item['price_suffix'] ); ?></sub>
                                        <?php endif; ?>
                                    </h1>
                                </div>

                                <ul>
                                    <?php $lists = explode(',', $item['features'] );
                                    foreach (  $lists as $list ) : ?>
                                        <?php if ( strpos( $list, "*" ) !== false ) : ?>
                                            <li><span><i class="bx bx-x"></i> <?php echo str_replace('*', '', $list); ?></span></li>
                                        <?php else: ?>
                                            <li><i class="bx bx-check"></i> <?php echo esc_html( $list ); ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                                <?php if ( $item['button'] != '' ) : ?>
                                    <?php if ( 'yes' === $item['target_page'] ) { ?>
                                        <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="default-btn"><?php echo esc_html( $item['button'] ); ?></a><?php
                                    } else { ?>
                                        <a href="<?php echo esc_url( $link_source ); ?>" class="default-btn"><?php echo esc_html( $item['button'] ); ?></a><?php
                                    } ?>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    <?php $table_item_count++; endforeach; ?>
                </div>
            </div>
        <?php endif; ?> 
        <?php
    }

	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Pricing );