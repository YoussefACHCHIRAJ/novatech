<?php
/**
 * Feedback Widget
 */

namespace Elementor;
class Feedback_Cta extends Widget_Base {

	public function get_name() {
        return 'FeedbackCta';
    }

	public function get_title() {
        return __( 'Cta Feedback', 'vaximo-toolkit' );
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

           
        $this->end_controls_section();

        $this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
                'name_ieading',
                [
                    'label' => esc_html__( 'Name Icon Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'name_i_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-testimonial-card .info .title h3 i',
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

        ?>

        <!-- Start GCD Testimonial Area -->
		<div class="gcd-testimonial-area without-bg-black">
			<div class="container">
				
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

Plugin::instance()->widgets_manager->register( new Feedback_Cta );