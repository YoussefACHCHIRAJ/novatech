<?php
/**
 * Feedback Widget
 */

namespace Elementor;
class Feedback_Gcd extends Widget_Base {

	public function get_name() {
        return 'FeedbackGcd';
    }

	public function get_title() {
        return __( 'Gcd Feedback', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-testimonial';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'top_title_op',
                [
                    'label' => __( 'Choose Top Title Option', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'     => __( 'Top Title With Images', 'vaximo-toolkit' ),
                        '2'     => __( 'Only Top Title', 'vaximo-toolkit' ),
                    ],
                    'default' => '1'
                ]
            );

            $this->add_control(
                'top_img',
                [
                    'label'     => __('Top Tile Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                    'condition' => [
                        'top_title_op' => '1',
                    ],
                ]
            );

            $this->add_control(
                'top_title',
                [
                    'label'   => __( 'Top Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'TESTIMONIAL', 'vaximo-toolkit' ),
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
                'sec_title',
                [
                    'label'   => __( ' Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'Who We Are: Protecting the Nations <strong>Digital Landscape,</strong> ensuring a secure, resilient cyber space for citizens, and government.', 'vaximo-toolkit' ),
                ]
            );

           
            $feedback_items = new Repeater();

                $feedback_items->add_control(
                    'u_img',
                    [
                        'label' 	=> esc_html__( 'User Images', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::MEDIA,
                    ]
                );

                $feedback_items->add_control(
                    'name',
                    [
                        'label' => esc_html__('Name', 'vaximo-toolkit'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('Brad Traversy', 'vaximo-toolkit'),
                        'label_block' => true,
                    ]
                );

                $feedback_items->add_control(
                    'user_icon',
                    [
                        'label'   => __( 'Star Icon', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('bx bxs-badge-check', 'vaximo-toolkit'),
                        'label_block' => true,
                    ]
                );

                $feedback_items->add_control(
                    'user_desi',
                    [
                        'label' => esc_html__('Designation', 'vaximo-toolkit'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('Car Owner', 'vaximo-toolkit'),
                        'label_block' => true,
                    ]
                );

                $feedback_items->add_control(
                    'feedback',
                    [
                        'label' => esc_html__('Feedback', 'vaximo-toolkit'),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Their quick response saved our organization from a ransomware attack. The guidance was clear, timely, and effective.', 'vaximo-toolkit'),
                        'label_block' => true,
                    ]
                );

                $feedback_items->add_control(
                    'icon_count',
                    [
                        'label' => esc_html__('Feedback Rating Count', 'vaximo-toolkit'),
                        'type' => Controls_Manager::NUMBER,
                    ]
                );

                $feedback_items->add_control(
                    'feed_icon',
                    [
                        'label'   => __( 'Star Icon', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('bx bxs-star', 'vaximo-toolkit'),
                        'label_block' => true,
                    ]
                );

                $feedback_items->add_control(
                    'review_text',
                    [
                        'label' => esc_html__('Review On Text', 'vaximo-toolkit'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('REVIEWED ON', 'vaximo-toolkit'),
                        'label_block' => true,
                    ]
                );
               
                $feedback_items->add_control(
                    'r_img',
                    [
                        'label' 	=> esc_html__( 'Review On Images', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::MEDIA,
                    ]
                );

            $this->add_control(
                'feedback_items',
                [
                    'label'   => __( 'Add Feedback Item', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $feedback_items->get_controls(),
                ]
            );

            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Bottom Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('See All Reviews', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'button_icon',
                [
                    'label'   => __( 'Bottom Button Icon', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('bx bx-right-arrow-alt', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
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
            $this->add_control(
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
            $this->add_control(
                'external_link',
                [
                    'label'     => __('External Link', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

            //Target Page
            $this->add_control(
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

        $this->end_controls_section();

        $this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'sec_color',
                [
                    'label'     => __( 'Section Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-testimonial-area' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'border_radius',
                [
                    'label' => esc_html__( 'Section Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .gcd-testimonial-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'toptitle_op_heading',
                [
                    'label' => esc_html__( 'Top Title Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'toptitle_op_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-section-title .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle_op',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-section-title .sub span',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-section-title  h2, {{WRAPPER}} .gcd-section-title  h3, {{WRAPPER}} .gcd-section-title  h1, {{WRAPPER}} .gcd-section-title  h4, {{WRAPPER}} .gcd-section-title  h5, {{WRAPPER}} .gcd-section-title  h6, {{WRAPPER}}text-white' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-section-title  h2, {{WRAPPER}} .gcd-section-title  h3, {{WRAPPER}} .gcd-section-title  h1, {{WRAPPER}} .gcd-section-title  h4, {{WRAPPER}} .gcd-section-title  h5, {{WRAPPER}} .gcd-section-title  h6',
                ]
            );

            $this->add_control(
                'btn_op_heading',
                [
                    'label' => esc_html__( 'Review Button Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'btne_op_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-section-title .see-btn',
                ]
            );

            $this->add_control(
                'btn_op_h_heading',
                [
                    'label' => esc_html__( 'Review Button Hover Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'btne_op_h_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-section-title .see-btn:hover',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_btn_op',
                    'label'    => __( 'Review Button Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-section-title .see-btn',
                ]
            );

            $this->add_control(
                'fb_bg_color',
                [
                    'label'     => __( 'Feedback Card Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-testimonial-card' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'fb_radius',
                [
                    'label' => esc_html__( 'Feedback Card Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .gcd-testimonial-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'fb_padding',
                [
                    'label' => esc_html__( 'Feedback Card Padding', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .gcd-testimonial-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'name_color',
                [
                    'label' => esc_html__( 'Name Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-testimonial-card .info .title h3' => 'color: {{VALUE}} !important',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography',
                    'label' => __( 'Name Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-testimonial-card .info .title h3',
                ]
            );
            
            $this->add_control(
                'name_icolor',
                [
                    'label' => esc_html__( 'Name Icon Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-testimonial-card .info .title h3 i' => 'color: {{VALUE}} !important',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'namei_typography',
                    'label' => __( 'Name Icon Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-testimonial-card .info .title h3 i',
                ]
            );

            $this->add_control(
                'des_color',
                [
                    'label' => esc_html__( 'Designation Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-testimonial-card .info .title span' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'des_typography',
                    'label' => __( 'Designation Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-testimonial-card .info .title span',
                ]
            );

            $this->add_control(
                'feedback_color',
                [
                    'label' => esc_html__( 'Feedback Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-testimonial-card p' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'feedback_typography',
                    'label' => __( 'Feedback Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-testimonial-card p',
                ]
            );

            $this->add_control(
                'star_color',
                [
                    'label' => esc_html__( 'Star Icon Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-testimonial-card .bottom .rating li i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'star_typography',
                    'label' => __( 'Quote Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-testimonial-card .bottom .rating li i',
                ]
            );

            $this->add_control(
                'review_no_color',
                [
                    'label' => esc_html__( 'Review No Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-testimonial-card .bottom .right span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'review_no_typography',
                    'label' => __( 'Quote Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-testimonial-card .bottom .right span',
                ]
            );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this-> add_inline_editing_attributes('title','none'); 

        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
        endif;
        
        ?>

        <!-- Start GCD Testimonial Area -->
		<div class="gcd-testimonial-area ptb-120 teachers-fonts-home">
			<div class="container">
				<div class="gcd-section-title">
					<div class="row justify-content-center align-items-end">
						<div class="col-lg-7 col-md-7">

                            <?php if ( $settings['top_title_op'] == '1' ) : ?>
                                <div class="sub">
                                    <?php if( !empty( $settings['top_img']['url'] ) ){ ?>
                                        <img src="<?php echo esc_url( $settings['top_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    <?php } ?>

                                    <span><?php echo wp_kses_post($settings['top_title']); ?></span>
                                </div>
                            <?php else: ?>

                                <div class="sub">
                                    <span><?php echo wp_kses_post($settings['top_title']); ?></span>
                                </div>

                            <?php endif; ?>
                           
                            <<?php echo esc_attr( $settings['heading_tag'] ); ?> class="text-white"><?php echo wp_kses_post( $settings['sec_title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
							
						</div>

						<div class="col-lg-5 col-md-5 text-end">
                            <?php if ( $settings['button_text'] != '' ) : ?>
                                <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                    <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="see-btn"><?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i> <?php endif; ?></a>
                                <?php } else { ?>
                                    <a href="<?php echo esc_url(  $link_source ); ?>" class="see-btn"><?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i> <?php endif; ?></a><?php
                                } ?>
                            <?php endif; ?>
						</div>
					</div>
				</div>
				<div class="swiper gcd-testimonial-slider">
                    <div class="swiper-wrapper">
                        <?php $i=1; foreach( $settings['feedback_items'] as $item ): ?>
                            <div class="swiper-slide">
                                <div class="gcd-testimonial-card">
                                    <div class="info">
                                        <?php if($item['u_img']['url']): ?>
                                            <div class="image">
                                                <img src="<?php echo esc_url( $item['u_img']['url'] ); ?>" class="rounded-circle" alt="<?php echo esc_attr__( 'images', 'vaximo-toolkit' ); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <div class="title">
                                            <?php if( $item['name']): ?>
                                                <h3><?php echo wp_kses_post( $item['name'] ); ?> <?php if( $item['user_icon'] != '' ): ?> <i class="<?php echo esc_attr( $item['user_icon'] ); ?>"></i> <?php endif; ?></h3>
                                            <?php endif; ?>
                                            <?php if( $item['user_desi']): ?>
                                                <span><?php echo wp_kses_post( $item['user_desi'] ); ?></span>
                                            <?php endif; ?> 
                                        </div>
                                    </div>
                                    <?php if( $item['feedback'] != '' ): ?>
                                        <p><?php echo wp_kses_post( $item['feedback'] ); ?></p>
                                    <?php endif; ?>
                                   
                                    <div class="bottom">
                                        <ul class="rating">
                                            <?php for ($x = 0; $x < $item['icon_count']; $x++) { ?>
                                                <li>
                                                    <?php if($item['feed_icon']):  ?>
                                                        <i class="<?php echo esc_attr( $item['feed_icon'] ); ?>"></i>
                                                    <?php endif; ?>
                                                </li>
                                            <?php } ?>
                                        </ul>

                                        <?php if( $item['review_text'] && $item['r_img']['url']): ?>
                                            <div class="right">
                                                <span><?php echo wp_kses_post( $item['review_text'] ); ?></span>
                                                <img src="<?php echo esc_url( $item['r_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'images', 'vaximo-toolkit' ); ?>">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php $i++; endforeach; ?>
                    </div>
                </div>
				<div class="gcd-testimonial-pagination"></div>
			</div>
		</div>
		<!-- End GCD Testimonial Area -->
          
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Feedback_Gcd );