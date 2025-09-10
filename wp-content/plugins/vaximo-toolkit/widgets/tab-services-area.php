<?php
/**
 * Tab Section
 */

namespace Elementor;
class Vaximo_Services_Tabs extends Widget_Base {

	public function get_name() {
        return 'Tabs_Services_Section';
    }

	public function get_title() {
        return __( 'Tabs Services Area', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-tabs';
    }

	public function get_categories() {
        return ['vaximocategory'];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'ser_tabs',
			[
				'label' => __( 'Services Tabs', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'tab_text_alignment',
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
        
            $card_items = new Repeater();

            $card_items->add_control(
                'tab_title',
                [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => __( 'Tab Title', 'vaximo-toolkit' ),
                    'default' => __('Security Advisory', 'vaximo-toolkit'),
                ]
            );
            $card_items->add_control(
                'tab_note1',
                [
                    'type'    => Controls_Manager::RAW_HTML,
                    'label'   => '',
                    'raw'   => __( 'Elementor has no option for repeater inside repeater. Here you can add 3 slides for per tab.', 'vaximo-toolkit' ),
                    'content_classes' => 'elementor-warning',
                ]
            );
            $card_items->add_control(
                'content1',
                [
                    'type' => Controls_Manager::WYSIWYG,
                    'label'   => __( 'Inner Content One', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'btn_title1',
                [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => __( 'Button Title One', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'link_type1',
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
                'link_to_page1',
                [
                    'label'       => __( 'Link Page', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => vaximo_toolkit_get_page_as_list(),
                    'condition'   => [
                        'link_type1'     => '1',
                    ]
                ]
            );
            $card_items->add_control(
                'external_link1',
                [
                    'label'     => __('External Link', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type1'  => '2',
                    ]
                ]
            );
            $card_items->add_control(
                'target_page1',
                [
                    'label' => __( 'Link Open In New Tab?', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'vaximo-toolkit' ),
                    'label_off' => __( 'No', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $card_items->add_control(
                'image1',
                [
                    'label'     => __('Image Slide One', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: MEDIA,
                ]
            );
            $card_items->add_control(
                'hr1',
                [
                    'type'      => Controls_Manager:: DIVIDER,
                ]
            );
            // slide two
            $card_items->add_control(
                'content2',
                [
                    'type' => Controls_Manager::WYSIWYG,
                    'label'   => __( 'Inner Content Two', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'btn_title2',
                [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => __( 'Button Title Two', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'link_type2',
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
                'link_to_page2',
                [
                    'label'       => __( 'Link Page', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => vaximo_toolkit_get_page_as_list(),
                    'condition'   => [
                        'link_type2'     => '1',
                    ]
                ]
            );
            $card_items->add_control(
                'external_link2',
                [
                    'label'     => __('External Link', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type2'  => '2',
                    ]
                ]
            );
            $card_items->add_control(
                'target_page2',
                [
                    'label' => __( 'Link Open In New Tab?', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'vaximo-toolkit' ),
                    'label_off' => __( 'No', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $card_items->add_control(
                'image2',
                [
                    'label'     => __('Image Slide One', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: MEDIA,
                ]
            );
            $card_items->add_control(
                'hr2',
                [
                    'type'      => Controls_Manager:: DIVIDER,
                ]
            );

            // Slider three
            $card_items->add_control(
                'content3',
                [
                    'type' => Controls_Manager::WYSIWYG,
                    'label'   => __( 'Inner Content Three', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'btn_title3',
                [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => __( 'Button Title Three', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'link_type3',
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
                'link_to_page3',
                [
                    'label'       => __( 'Link Page', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => vaximo_toolkit_get_page_as_list(),
                    'condition'   => [
                        'link_type3'     => '1',
                    ]
                ]
            );
            $card_items->add_control(
                'external_link3',
                [
                    'label'     => __('External Link', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type3'  => '2',
                    ]
                ]
            );
            $card_items->add_control(
                'target_page3',
                [
                    'label' => __( 'Link Open In New Tab?', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'vaximo-toolkit' ),
                    'label_off' => __( 'No', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $card_items->add_control(
                'image3',
                [
                    'label'     => __('Image Slide Three', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: MEDIA,
                ]
            );
            $this->add_control(
                'tab_items',
                [
                    'label'       => __( 'Add Content', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'ser_tab_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'tabacttitle_color',
                [
                    'label'     => __( 'Tab Active Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-content .services-tab-wrap .services-tab .tabs .current' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tabtitle_color',
                [
                    'label'     => __( 'Tab Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-content .services-tab-wrap .services-tab .tabs li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'tabtitle_typography',
                    'label'    => __( 'Tab Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .services-content .services-tab-wrap .services-tab .tabs li',
                ]
            );
            $this->add_control(
                'tabactborder_color',
                [
                    'label'     => __( 'Tab Active Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-content .services-tab-wrap .services-tab .tabs li::before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tabborder_color',
                [
                    'label'     => __( 'Tab Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-content .services-tab-wrap .services-tab .tabs li' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Inner Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-content .services-tab-wrap .services-tab h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'title_typography',
                    'label'    => __( 'Inner Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .services-content .services-tab-wrap .services-tab h3',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label'     => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-content .services-tab-wrap .services-tab p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'content_typography',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .services-content .services-tab-wrap .services-tab p',
                ]
            );

            $this->add_control(
                'slider_arrow_color',
                [
                    'label'     => __( 'Slider Arrow Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-tab-slider .owl-nav .owl-prev i, {{WRAPPER}} .services-tab-slider .owl-nav .owl-next i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'slider_arrow_bcolor',
                [
                    'label'     => __( 'Slider Arrow Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-tab-slider .owl-nav .owl-prev i, {{WRAPPER}} .services-tab-slider .owl-nav .owl-next i' => 'border-color: {{VALUE}}',
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
                'btn_headingbgcolor', [
                    'label'     => __( 'Button Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'btn_onebgcolor',
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .default-btn, {{WRAPPER}} .default-btn',
                ]
            );

            $this->add_control(
                'btn_headinghbgcolor', [
                    'label'     => __( 'Button Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'btn_onehbgcolor',
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .default-btn::before, {{WRAPPER}} .default-btn::after',
                ]
            );
            
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        // Text Alignment
        if( $settings['tab_text_alignment' ] == '1') {
            $alignment = 'text-center';
        } 
        elseif( $settings['tab_text_alignment' ] == '2') {
            $alignment = 'text-right';
        } else {
            $alignment = 'text-left';
        }

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

            <div class="container">
				<div class="services-content">
					<div class="services-tab-wrap">
						<div class="tab services-tab">
							<ul class="tabs">
                                <?php foreach( $settings['tab_items'] as $item ): ?>
                                    <li>
                                        <?php echo esc_html( $item['tab_title'] ); ?>
                                    </li>
                                <?php endforeach; ?>
							</ul>

							<div class="tab_content <?php echo esc_attr( $alignment); ?>">
                                <?php foreach( $settings['tab_items'] as $item ): ?>
                                    <div class="tabs_item">
                                        <div class="services-tab-slider owl-carousel owl-theme">
                                            <?php if( $item['content1'] != '' || $item['image1']['url'] != '' ) {

                                                $link_source1 = '';
                                                if ( $item['link_type1'] == 1 ) :
                                                    $link_source1 = get_page_link($item['link_to_page1']); 
                                                else :
                                                    $link_source1 = $item['external_link1'];
                                                endif;
                                             ?>
                                                <div class="row align-items-center">
                                                    <?php if( $item['image1']['url'] != '' ) : ?>
                                                        <div class="col-lg-6">
                                                    <?php else: ?>
                                                        <div class="col-lg-12  fullwidth">
                                                    <?php endif; ?>
                                                        <?php echo wp_kses_post( $item['content1'] ); ?>

                                                        <?php if( $item['btn_title1'] != '') { ?>
                                                            <?php if ( 'yes' === $item['target_page1'] ) { ?>
                                                                <a target="_blank" class="default-btn six" href="<?php echo esc_url( $link_source1 ); ?>">
                                                                    <i class="bx bx-file"></i>
                                                                    <?php echo esc_html( $item['btn_title1'] ); ?>
                                                                </a><?php
                                                            } else { ?>
                                                                <a class="default-btn six" href="<?php echo esc_url( $link_source1 ); ?>">
                                                                    <i class="bx bx-file"></i>
                                                                    <?php echo esc_html( $item['btn_title1'] ); ?>
                                                                </a><?php
                                                            } ?>
                                                        <?php } ?>
                                                    </div>
            
                                                    <?php if( !empty( $item['image1']['url'] ) ){ ?>
                                                        <div class="col-lg-6">
                                                            <div class="services-img">
                                                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>

                                            <?php if( $item['content2'] != '' || $item['image2']['url'] != '' ) {
                                                $link_source2 = '';
                                                if ( $item['link_type2'] == 1 ) :
                                                    $link_source2 = get_page_link($item['link_to_page2']); 
                                                else :
                                                    $link_source2 = $item['external_link2'];
                                                endif;
                                            ?>
                                                <div class="row align-items-center">
                                        
                                                    <?php if( $item['image2']['url'] != '' ) : ?>
                                                        <div class="col-lg-6">
                                                    <?php else: ?>
                                                        <div class="col-lg-12  fullwidth">
                                                    <?php endif; ?>
                                                        <?php echo wp_kses_post( $item['content2'] ); ?>

                                                        <?php if( $item['btn_title2'] != '') { ?>
                                                            <?php if ( 'yes' === $item['target_page2'] ) { ?>
                                                                <a target="_blank" class="default-btn six" href="<?php echo esc_url( $link_source2 ); ?>">
                                                                    <i class="bx bx-file"></i>
                                                                    <?php echo esc_html( $item['btn_title2'] ); ?>
                                                                </a><?php
                                                            } else { ?>
                                                                <a class="default-btn six" href="<?php echo esc_url( $link_source2 ); ?>">
                                                                    <i class="bx bx-file"></i>
                                                                    <?php echo esc_html( $item['btn_title2'] ); ?>
                                                                </a><?php
                                                            } ?>
                                                        <?php } ?>
                                                    </div>
            
                                                    <?php if( !empty( $item['image2']['url'] ) ){ ?>
                                                        <div class="col-lg-6">
                                                            <div class="services-img">
                                                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>

                                            <?php if( $item['content3'] != '' || $item['image3']['url'] != '' ) { 
                                                $link_source3 = '';
                                                if ( $item['link_type3'] == 1 ) :
                                                    $link_source3 = get_page_link($item['link_to_page3']); 
                                                else :
                                                    $link_source3 = $item['external_link3'];
                                                endif;
                                            ?>
                                                <div class="row align-items-center">
                                                    <?php if( $item['image3']['url'] != '' ) : ?>
                                                        <div class="col-lg-6">
                                                    <?php else: ?>
                                                        <div class="col-lg-12  fullwidth">
                                                    <?php endif; ?>

                                                        <?php echo wp_kses_post( $item['content3'] ); ?>

                                                        <?php if( $item['btn_title3'] != '') { ?>
                                                            <?php if ( 'yes' === $item['target_page3'] ) { ?>
                                                                <a target="_blank" class="default-btn six" href="<?php echo esc_url( $link_source3 ); ?>">
                                                                    <i class="bx bx-file"></i>
                                                                    <?php echo esc_html( $item['btn_title3'] ); ?>
                                                                </a><?php
                                                            } else { ?>
                                                                <a class="default-btn six" href="<?php echo esc_url( $link_source3 ); ?>">
                                                                    <i class="bx bx-file"></i>
                                                                    <?php echo esc_html( $item['btn_title3'] ); ?>
                                                                </a><?php
                                                            } ?>
                                                        <?php } ?>
                                                    </div>
            
                                                    <?php if( !empty( $item['image3']['url'] ) ){ ?>
                                                    <div class="col-lg-6">
                                                        <div class="services-img">
                                                            <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['image3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>

        <?php
	}
	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Services_Tabs );