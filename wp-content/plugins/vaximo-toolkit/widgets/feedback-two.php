<?php
/**
 * Testimonials Widget
 */

namespace Elementor;
class Vaximo_Feed_Two extends Widget_Base {

	public function get_name() {
        return 'Vaximo_FeedTwo';
    }

	public function get_title() {
        return __( 'Feedback Two', 'vaximo-toolkit' );
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
                'title', 
                [
                    'label'       => __( 'Title', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
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
                ]
            );
            $this->add_control(
                'desc', 
                [
                    'label' => __( 'Description', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::WYSIWYG,
                    'label_block' => true,
                ]
            );
            $items = new Repeater();
            $items->add_control(
                'feedback',
                [
                    'label'  => __( 'Feedback', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::WYSIWYG,
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
                    'raw'             => __( 'Rating would be within 1 to 5', 'vaximo-toolkit' ),
                    'content_classes' => 'elementor-warning',
                ]
            );
            $items->add_control(
                'shape',
                [
                    'label' => __( 'Shape', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
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
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .section-title.white-title h2, .section-title.white-title h1, .section-title.white-title h3, .section-title.white-title h4, .section-title.white-title h5, .section-title.white-title h6, .section-title-six h2, .section-title-six h1, .section-title-six h3, .section-title-six h4, .section-title-six h5, .section-title-six h6',
                     
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
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'description_typography',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .section-title.white-title p, .section-title.white-title ul li, .section-title.white-title ol li',
                ]
            );
            $this->add_control(
                'feed_color',
                [
                    'label' => __( 'Feedback Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonials-card p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'feed_hcolor',
                [
                    'label' => __( 'Feedback Hover Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonials-card:hover p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'feedback_typography',
                    'label'    => __( 'Feedback Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .single-testimonials-card p',
                ]
            );
			$this->add_control(
				'name_color',
				[
					'label' => __( 'Name Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-testimonials-card h3' => 'color: {{VALUE}}',
					],
				]
            );
			$this->add_control(
				'name_hcolor',
				[
					'label' => __( 'Name Hover Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-testimonials-card:hover h3' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'name_typo',
                    'label'    => __( 'Name Typography', 'vaximo-toolkit' ),
                     
					'selector' => '{{WRAPPER}} .single-testimonials-card h3',
                ]
            );
            $this->add_control(
				'des_color',
				[
					'label' => __( 'Designation Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-testimonials-card span' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'des_hcolor',
				[
					'label' => __( 'Designation Hover Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-testimonials-card:hover span' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'des_typography',
                    'label'    => __( 'Designation Typography', 'vaximo-toolkit' ),
                     
					'selector' => '{{WRAPPER}} .single-testimonials-card span',
                ]
            );
            $this->add_control(
				'rating_color',
				[
					'label' => __( 'Rating Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-testimonials-card i' => 'color: {{VALUE}}',
                    ],
				]
            );
            $this->add_control(
				'secbg_color',
				[
					'label' => __( 'Card Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-testimonials-card' => 'background-color: {{VALUE}}',
                    ],
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
                    'selector' => '{{WRAPPER}} .single-testimonials-card::after',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        global $vaximo_opt;

        $slider = $settings['list_items'];
        ?>

        <div class="container">
            <?php if( $settings['desc'] != '' ||  $settings['title'] != '' ) : ?>
            <div class="section-title white-title">
                <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
                <p><?php echo wp_kses_post( $settings['desc'] ); ?></p>
            </div>
            <?php endif; ?> 

            <div class="testimonials-wrap-slides owl-carousel owl-theme">
                <?php foreach( $slider as $item ): 
                    
                ?>
                <div class="single-testimonials-card ">
                    <p><?php echo wp_kses_post( $item['feedback'] ); ?></p> 

                    <?php if( $item['designation'] != '' || $item['title'] != '') : ?>
                    <div class="client-info">
                        <h3><?php echo esc_html( $item['title'] ); ?></h3>
                        <span><?php echo esc_html( $item['designation'] ); ?></span>
                    </div>
                    <?php endif; ?>

                    <ul class="rating">
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

                    <?php if( $item['shape']['url'] != '' ): ?>
                        <div class="quote-shape">
                            <img src="<?php echo esc_url( $item['shape']['url'] ); ?>" alt="<?php echo esc_attr__('shape', 'vaximo-toolkit' ); ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register( new Vaximo_Feed_Two );