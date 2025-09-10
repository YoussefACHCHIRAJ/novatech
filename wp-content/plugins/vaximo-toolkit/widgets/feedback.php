<?php
/**
 * Testimonials Widget
 */

namespace Elementor;
class Vaximo_Testimonials extends Widget_Base {

	public function get_name() {
        return 'Vaximo_Testimonials';
    }

	public function get_title() {
        return __( 'Testimonials', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Pricing_Area',
			[
				'label' => __( 'Testimonials Controls', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'choose_style',
                [
                    'label' => __( 'Choose Style', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => __( 'Slider Style', 'vaximo-toolkit' ),
                        '2'   => __( 'Card Style', 'vaximo-toolkit' ),
                        '3'   => __( 'Slider Style 2', 'vaximo-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );
            $this->add_control(
                'top_title', 
                [
                    'label'       => __( 'Top Title', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                    'condition'   => [
                        'choose_style' => '3',
                    ]
                ]
            );
            $this->add_control(
                'title', 
                [
                    'label'       => __( 'Title', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                    'condition'   => [
                        'choose_style' => ['1','3'],
                    ]
                ]
            );
            $this->add_control(
                'heading_tag', [
                    'label'   => __( 'Title Heading Tag', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                    ],
                    'default'     => 'h2',
                    'label_block' => true,
                    'condition'   => [
                        'choose_style' => ['1','3'],
                    ]
                ]
            );
            $this->add_control(
                'desc', 
                [
                    'label' => __( 'Description', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::WYSIWYG,
                    'label_block' => true,
                    'condition'   => [
                        'choose_style' => '1',
                    ]
                ]
            );
            $items = new Repeater();
            $items->add_control(
                'image',
                [
                    'label' => __( 'Upload Image', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
            $items->add_control(
                'feedback_text_alignment',
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
            $items->add_control(
                'feedback',
                [
                    'label'  => __( 'Feedback', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::WYSIWYG,
                ]
            );
            $items->add_control(
                'feed_rating',
                [
                    'label'   => __( 'Rating', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '5',
                ]
            );
            $items->add_control(
                'feed_rating_note', [
                    'label'           => '',
                    'type'            => Controls_Manager::RAW_HTML,
                    'raw'             => __( 'Rating would be within 1 to 5. Keep this field empty for slider style 2', 'vaximo-toolkit' ),
                    'content_classes' => 'elementor-warning',
                ]
            );
            $items->add_control(
                'title',
                [
                    'label'   => __( 'Name', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Kilva Dew', 'vaximo-toolkit'),
                ]
            );
            $items->add_control(
                'designation',
                [
                    'label'   => __( 'Designation', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Marketing Manager', 'vaximo-toolkit'),
                ]
            );
            $items->add_control(
                'quote_icon',
                [
                    'label'   => __( 'Quote Icon', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                ]
            );
            $items->add_control(
                'quote_note', [
                    'label'           => '',
                    'type'            => Controls_Manager::RAW_HTML,
                    'raw'             => __( 'Keep this field empty for slider style 2', 'vaximo-toolkit' ),
                    'content_classes' => 'elementor-warning',
                ]
            );
            $this->add_control(
                'list_items',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $items->get_controls(),
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
                'sec_title_color',
                [
                    'label' => __( 'Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title.white-title h2, .section-title.white-title h1, .section-title.white-title h3, .section-title.white-title h4, .section-title.white-title h5, .section-title.white-title h6, .section-title-six h2, .section-title-six h1, .section-title-six h3, .section-title-six h4, .section-title-six h5, .section-title-six h6' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'choose_style' => ['1','3'],
                    ]
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .section-title.white-title h2, .section-title.white-title h1, .section-title.white-title h3, .section-title.white-title h4, .section-title.white-title h5, .section-title.white-title h6, .section-title-six h2, .section-title-six h1, .section-title-six h3, .section-title-six h4, .section-title-six h5, .section-title-six h6',
                    'condition' => [
                        'choose_style' => ['1','3'],
                    ]
                ]
            );
            $this->add_control(
                'sec_desc_color',
                [
                    'label' => __( 'Description Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title.white-title p, .section-title.white-title ul li, .section-title.white-title ol li' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'choose_style' => '1',
                    ]
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'description_typography',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .section-title.white-title p, .section-title.white-title ul li, .section-title.white-title ol li',
                    'condition' => [
                        'choose_style' => '1',
                    ]
                ]
            );
            $this->add_control(
                'quote_bgcolor',
                [
                    'label' => __( 'Quote Background Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-client .quotes' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'choose_style' => ['1','2'],
                    ]
                ]
            );
            $this->add_control(
                'feedbg_color',
                [
                    'label' => __( 'Feedback Background Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-client' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'choose_style' => ['1','2'],
                    ]
                ]
            );
            $this->add_control(
                'feed_color',
                [
                    'label' => __( 'Feedback Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-client p, .testimonials-item p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'act_feed_color',
                [
                    'label' => __( 'Active Card Feedback Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .owl-item.active.center .single-client p' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'choose_style' => '1',
                    ]
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'feedback_typography',
                    'label'    => __( 'Feedback Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .single-client p, .testimonials-item p',
                ]
            );
			$this->add_control(
				'name_color',
				[
					'label' => __( 'Name Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-client h3, .testimonials-item .testimonials-view h3' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'name_typo',
                    'label'    => __( 'Name Typography', 'vaximo-toolkit' ),
                     
					'selector' => '{{WRAPPER}} .single-client h3, .testimonials-item .testimonials-view h3',
                ]
            );
            $this->add_control(
				'des_color',
				[
					'label' => __( 'Designation Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-client span, .testimonials-item .testimonials-view span' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'des_typography',
                    'label'    => __( 'Designation Typography', 'vaximo-toolkit' ),
                     
					'selector' => '{{WRAPPER}} .single-client span, .testimonials-item .testimonials-view span',
                ]
            );
            $this->add_control(
				'rating_color',
				[
					'label' => __( 'Rating Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-client ul li i' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'choose_style!' => '3',
                    ]
				]
            );
            $this->add_control(
				'act_rating_color',
				[
					'label' => __( 'Active Card Rating Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-item.active.center .single-client ul li i' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'choose_style' => '1',
                    ]
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

        $slider = $settings['list_items'];
        $count = 0;
        foreach ( $slider as $value ) {
            $count++;
        } ?>
        <?php if ( $settings['choose_style']  == '1' ) : ?>
            <div class="container">
                <div class="section-title white-title">
                    <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                    <?php echo wp_kses_post( $settings['desc'] ); ?>
                </div>

                    <?php if ( $count == '1' ) { ?>
                        <div class="col-lg-6 col-md-12 offset-lg-3"><?php
                    } elseif ( $count == '2' ) { ?>
                        <div class="row"><?php
                    } else { ?>
                        <div class="client-wrap owl-carousel owl-theme"><?php
                    } ?>
                    <?php foreach( $slider as $item ): 
                        
                        // Text Alignment
                        if( $item['feedback_text_alignment' ] == '1') {
                            $alignment = 'text-center';
                        } 
                        elseif( $item['feedback_text_alignment' ] == '2') {
                            $alignment = 'text-right';
                        } else {
                            $alignment = 'text-left';
                        }
                        ?>
                        <?php if( $count == 2 ){ ?>
                        <div class="col-lg-6 col-md-6"> <?php
                        } ?>
                            <div class="single-client <?php echo esc_attr( $alignment); ?>">
                                <?php if( $item['quote_icon'] != '' ) { ?>
                                    <i class="quotes <?php echo esc_attr( $item['quote_icon'] ); ?>"></i>
                                <?php } ?>
                                <p><?php echo wp_kses_post( $item['feedback'] ); ?></p>

                                <ul>
                                    <?php if( $item['feed_rating'] == '1' ){ ?>
                                        <li><i class="bx bxs-star"></i></li> <?php
                                    } ?>
                                    <?php if( $item['feed_rating'] == '2' ){ ?>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li> <?php
                                    } ?>
                                    <?php if( $item['feed_rating'] == '3' ){ ?>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li> <?php
                                    } ?>
                                    <?php if( $item['feed_rating'] == '4' ){ ?>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li> <?php
                                    } ?>
                                    <?php if( $item['feed_rating'] == '5' ){ ?>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li> <?php
                                    } ?>
                                </ul>

                                <div class="client-img">
                                    <?php if( $item['image']['url'] != '' ): ?>
                                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                                    <?php endif; ?>
                                    <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                    <span><?php echo esc_html( $item['designation'] ); ?></span>
                                </div>
                            </div>
                        <?php if( $count == 2 ){ ?>
                        </div> <?php
                        } ?>

                    <?php endforeach; ?>
                        </div>
            </div>
        <?php elseif ( $settings['choose_style']  == '3' ) : ?>
            <div class="container">
                <div class="section-title-six">
                    <span><?php echo esc_html( $settings['top_title'] ); ?></span>
                    <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
                </div>

                <div class="testimonials">
					<div class="testimonials-slider owl-carousel owl-theme">
                        <?php foreach( $slider as $item ): 
                            
                            // Text Alignment
                            if( $item['feedback_text_alignment' ] == '1') {
                                $alignment = 'text-center';
                            } 
                            elseif( $item['feedback_text_alignment' ] == '2') {
                                $alignment = 'text-right';
                            } else {
                                $alignment = 'text-left';
                            }
                            ?>
                            <div class="testimonials-item <?php echo esc_attr( $alignment); ?>">
                                <p><?php echo wp_kses_post( $item['feedback'] ); ?></p> 

                                <div class="testimonials-view">
                                    <?php if( $item['image']['url'] != '' ): ?>
                                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                                    <?php endif; ?>
                                    <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                    <span><?php echo esc_html( $item['designation'] ); ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?> 
					</div>

					<i class='quote bx bxs-quote-alt-right'></i>
				</div>
            </div>
        <?php else : ?>
			<div class="container">
				<div class="row">
                    <?php foreach( $settings['list_items'] as $item ): 
                        
                        // Text Alignment
                        if( $item['feedback_text_alignment' ] == '1') {
                            $alignment = 'text-center';
                        } 
                        elseif( $item['feedback_text_alignment' ] == '2') {
                            $alignment = 'text-right';
                        } else {
                            $alignment = 'text-left';
                        }
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-client <?php echo esc_attr( $alignment); ?>">
                                <?php if( $item['quote_icon'] != '' ) { ?>
                                    <i class="quotes <?php echo esc_attr( $item['quote_icon'] ); ?>"></i>
                                <?php } ?>
                                <p><?php echo wp_kses_post( $item['feedback'] ); ?></p>

                                <ul>
                                    <?php if( $item['feed_rating'] == '1' ){ ?>
                                        <li><i class="bx bxs-star"></i></li> <?php
                                    } ?>
                                    <?php if( $item['feed_rating'] == '2' ){ ?>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li> <?php
                                    } ?>
                                    <?php if( $item['feed_rating'] == '3' ){ ?>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li> <?php
                                    } ?>
                                    <?php if( $item['feed_rating'] == '4' ){ ?>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li> <?php
                                    } ?>
                                    <?php if( $item['feed_rating'] == '5' ){ ?>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li> <?php
                                    } ?>
                                </ul>

                                <div class="client-img">
                                    <?php if( $item['image']['url'] != '' ): ?>
                                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                                    <?php endif; ?>
                                    <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                    <span><?php echo esc_html( $item['designation'] ); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>	
				</div>
			</div>
        <?php endif; ?>

        <?php
    }

	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Testimonials );