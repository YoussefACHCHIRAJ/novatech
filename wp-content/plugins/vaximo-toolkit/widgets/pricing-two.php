<?php
/**
 * Pricing Widget
 */

namespace Elementor;
class Vaximo_Pricing_Two extends Widget_Base {

	public function get_name() {
        return 'Vaximo_PricingTwo';
    }

	public function get_title() {
        return __( 'Pricing Table Two', 'vaximo-toolkit' );
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
                    'default' => '3'
                ]
            );
            $pricing_items->add_control(
                'price_type',
                [
                    'label'   => __( 'Pricing Type', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Free', 'vaximo-toolkit'),
                ]
            );
            $pricing_items->add_control(
                'short_title',
                [
                    'label'   => __( 'Short Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
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
                'fea_title',
                [
                    'label'   => __( 'Feature Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('ALL FEATURES:', 'vaximo-toolkit'),
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
                ]
            );
            $this->add_control(
                'shape',
                [
                    'label'  => __( 'Shape Image', 'vaximo-toolkit' ),
                    'type'   => Controls_Manager::MEDIA,
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
				'title_color',
				[
					'label'     => __( 'Price Title Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-plans-card .pricing-header h3' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_font_size',
                    'label'    => __( 'Price Title Typography', 'vaximo-toolkit' ),
					'selector' => '{{WRAPPER}} .single-plans-card .pricing-header h3',
                ]
            );
			$this->add_control(
				'stitle_color',
				[
					'label'     => __( 'Short Title Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-plans-card .pricing-header p' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'stitle_font_size',
                    'label'    => __( 'Short Title Typography', 'vaximo-toolkit' ),
					'selector' => '{{WRAPPER}} .single-plans-card .pricing-header p',
                ]
            );
            $this->add_control(
				'price_color',
				[
					'label'     => __( 'Price Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-plans-card .price h4' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'p_font_size',
                    'label'    => __( 'Price Typography', 'vaximo-toolkit' ),
					'selector' => '{{WRAPPER}} .single-plans-card .price h4',
                ]
            );
            $this->add_control(
				'suf_color',
				[
					'label'     => __( 'Price Suffix Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-plans-card .price h4 span' => 'color: {{VALUE}}',
					],
				]
			);
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'suf_font_size',
                    'label'    => __( 'Price Suffix Typography', 'vaximo-toolkit' ),
					'selector' => '{{WRAPPER}} .single-plans-card .price h4 span',
                ]
            );
            $this->add_control(
				'list_color',
				[
					'label'     => __( 'List Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-plans-card .features-list ul li' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'list_icolor',
				[
					'label'     => __( 'List Icon Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-plans-card .features-list ul li i' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'cross_list_color',
				[
					'label'     => __( 'Cross List Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-plans-card .features-list ul li.bg-C4C4C4, .single-plans-card .features-list ul li.bg-C4C4C4 i' => 'color: {{VALUE}}',
					],
				]
			);
            $this->add_control(
				'clist_icolor',
				[
					'label'     => __( 'Cross List Icon Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  .single-plans-card .features-list ul li.bg-C4C4C4 i' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'list_font_size',
                    'label'    => __( 'List Title Typography', 'vaximo-toolkit' ),
					'selector' => '{{WRAPPER}} .single-plans-card .features-list ul li',
                ]
            );
            $this->add_control(
				'btn_color',
				[
					'label'     => __( 'Button Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-plans-card .link-btn' => 'color: {{VALUE}}',
					],
				]
			);
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btn_font_size',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
					'selector' => '{{WRAPPER}} .single-plans-card .link-btn',
                ]
            );
            $this->add_control(
                'inner_divi',
                [
                    'type'      => Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'sec_bghead',
                [
                    'label'     => esc_html__( 'Card Background Hover', 'cyarb-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'     => 'cardbg_hcolor',
                    'types'    => ['gradient' ],
                    'selector' => '{{WRAPPER}} .single-plans-card::after',
                ]
            );
            $this->add_control(
				'cardbordercolor',
				[
					'label'     => __( 'Card Border Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  .single-plans-card' => 'border-color: {{VALUE}}',
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
        }elseif ( $columns == '4' ) {
            $column = 'col-lg-3 col-sm-6';
        } else {
            $column = 'col-lg-4 col-sm-6';
        }
        ?>

        <div class="container">
            <div class="row justify-content-center">
                <?php foreach( $settings['list_items'] as $item ): ?>
                    <?php // Text Alignment
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
                        <div class="single-plans-card <?php echo esc_attr( $alignment ); ?>">
                            <div class="pricing-header">
                                <h3><?php echo esc_html( $item['price_type'] ); ?></h3>
                                <p><?php echo esc_html( $item['short_title'] ); ?></p>
                            </div>
                            <div class="price">
                                <h4>
                                    <?php echo esc_html( $item['price'] ); ?>
                                    <?php if( $item['price_suffix'] != '' ) : ?>
                                        <span><?php echo esc_html( $item['price_suffix'] ); ?></span>
                                    <?php endif; ?>
                                </h4>
                            </div>
                            <div class="features-list">
                                <h5> <?php echo esc_html( $item['fea_title'] ); ?></h5>
                                <ul>
                                    <?php $lists = explode(',', $item['features'] );
                                    foreach (  $lists as $list ) : ?>
                                    <?php if ( strpos( $list, "*" ) !== false ) : ?>
                                        <li class="bg-C4C4C4"><i class="bx bx-check-circle"></i> <?php echo str_replace('*', '', $list); ?></li>
                                    <?php else: ?>
                                        <li><i class="bx bx-check-circle"></i> <?php echo esc_html( $list ); ?></li>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php if ( $item['button'] != '' ) : ?>
                                <?php if ( 'yes' === $item['target_page'] ) { ?>
                                    <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="link-btn"><?php echo esc_html( $item['button'] ); ?></a><?php
                                } else { ?>
                                    <a href="<?php echo esc_url( $link_source ); ?>" class="link-btn"><?php echo esc_html( $item['button'] ); ?></a><?php
                                } ?>
                            <?php endif; ?>

                            <?php if( $settings['shape']['url'] != '' ) : ?>
                            <div class="plans-shape">
                                <img src="<?php echo esc_url( $settings['shape']['url'] ); ?>" alt="<?php echo esc_attr__('shape','vaximo-toolkit'); ?>">
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register( new Vaximo_Pricing_Two );