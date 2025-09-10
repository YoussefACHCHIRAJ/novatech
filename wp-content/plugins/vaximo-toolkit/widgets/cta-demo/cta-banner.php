<?php
namespace Elementor;
class CTABanner extends Widget_Base{
    public function get_name(){
        return "CTA_Banner";
    }
    public function get_title(){
        return "Cyber Training & Awareness Banner";
    }
    public function get_icon(){
        return "eicon-banner";
    }
    public function get_categories(){
        return ['vaximocategory'];
    }

    protected function register_controls(){
        // Tab content controls
        $this-> start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'We are Vaximo: Your Trusted Partner in Cyber Awareness and Digital Safety', 'vaximo-toolkit' ),
                ]
            );
            $this->add_control(
                'head_tag',
                [
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
                    'default' => 'h2',
                ]
            );

            $this->add_control(
                'content',
                [
                    'label'   => __( 'Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'Empower yourself with expert-led courses, interactive resources, and the latest security strategies to stay protected in the ever-evolving digital world.', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'info_icon',
                [
                    'label'   => __( 'Info Icon', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('bx bxs-info-circle', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'info_tit',
                [
                    'label'   => __( 'Info Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('New Training Module has released today', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'info_content',
                [
                    'label'   => __( 'Info Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('We update our module everymonth to cope up with the new world.', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'info_licon',
                [
                    'label'   => __( 'Info Left Icon', 'vaximo-toolkit' ),
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

            $this->add_control(
                'bg_video',
                [
                    'label' => esc_html__( 'Background Video', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'play_icon',
                [
                    'label'   => __( 'Play Icon', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('bx bx-play', 'vaximo-toolkit'),
                ]
            );
        
            $this->add_control(
                'video_url',
                [
                    'label' => esc_html__( 'Video Url', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('https://www.youtube.com/watch?v=T7MelADka-I', 'vaximo-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'bottom_top_title',
                [
                    'label'   => __( 'Bottom Content Top Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'BEST SELLING IN 2024', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'bottom_title',
                [
                    'label'   => __( 'Bottom Content Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'Password Power: Creating and Managing Strong Passwords', 'vaximo-toolkit' ),
                ]
            );
        
            $this->add_control(
                'bg_img',
                [
                    'label' => __( 'Background Image', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
           

        $this-> end_controls_section();

        // Start style content controls
        $this-> start_controls_section(
            'content_style',
            [
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content h1, {{WRAPPER}} .cyber-training-awareness-banner-content h2, {{WRAPPER}} .cyber-training-awareness-banner-content h3, {{WRAPPER}} .cyber-training-awareness-banner-content h4, {{WRAPPER}} .cyber-training-awareness-banner-content h5, {{WRAPPER}} .cyber-training-awareness-banner-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cyber-training-awareness-banner-content h1, {{WRAPPER}} .cyber-training-awareness-banner-content h2, {{WRAPPER}} .cyber-training-awareness-banner-content h3, {{WRAPPER}} .cyber-training-awareness-banner-content h4, {{WRAPPER}} .cyber-training-awareness-banner-content h5, {{WRAPPER}} .cyber-training-awareness-banner-content h6',
                ]
            );
           
            $this->add_control(
                'content_title',
                [
                    'label'     => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_content',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cyber-training-awareness-banner-content p',
                ]
            );

            $this->add_control(
                'info_bg_color',
                [
                    'label'     => __( 'Info Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap::before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'info_border_radius',
                [
                    'label' => esc_html__( 'Info Card Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'info_icon_color',
                [
                    'label'     => __( 'Info Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap .info .icon i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_info_icon_sz',
                    'label'    => __( 'Info Icon Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap .info .icon i',
                ]
            );

            $this->add_control(
                'info_btit',
                [
                    'label'     => __( 'Info Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap .info .title h5' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_info_btit',
                    'label'    => __( 'Info Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap .info .title h5',
                ]
            );

            $this->add_control(
                'info_bcontent',
                [
                    'label'     => __( 'Info Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap .info .title span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_info_bcontent',
                    'label'    => __( 'Info Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap .info .title span',
                ]
            );

            $this->add_control(
                'info_ar_icon',
                [
                    'label'     => __( 'Info Right Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap .arrow-btn a i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'info_ar_h_icon',
                [
                    'label'     => __( 'Info Right Icon Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap .arrow-btn a i:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'info_ar_bg_icon',
                [
                    'label'     => __( 'Info Right Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap .arrow-btn a i' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'info_ar_h_bg_icon',
                [
                    'label'     => __( 'Info Right Icon Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap .arrow-btn a i:hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_ar_icon',
                    'label'    => __( 'Info Right Icon Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cyber-training-awareness-banner-content .info-wrap .arrow-btn a i',
                ]
            );

            $this->add_control(
                'play_bticon',
                [
                    'label'     => __( 'Play Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .banner-video-wrap .image .cta-video-btn i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'play_h_bticon',
                [
                    'label'     => __( 'Play Icon Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .banner-video-wrap .image .cta-video-btn i:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_play_bticon',
                    'label'    => __( 'Play Icon Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cyber-training-awareness-banner-content .banner-video-wrap .image .cta-video-btn i',
                ]
            );


            $this->add_control(
                'buttom_con_top',
                [
                    'label'     => __( 'Bottom Top Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .banner-video-wrap .content span' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'buttom_con_top_bg',
                [
                    'label'     => __( 'Bottom Top Title Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .banner-video-wrap .content span' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_buttom_con_top',
                    'label'    => __( 'Bottom Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cyber-training-awareness-banner-content .banner-video-wrap .content span',
                ]
            );

            $this->add_control(
                'buttom_con_tit',
                [
                    'label'     => __( 'Bottom Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cyber-training-awareness-banner-content .banner-video-wrap .content h5' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_buttom_con_tit',
                    'label'    => __( 'Bottom Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cyber-training-awareness-banner-content .banner-video-wrap .content h5',
                ]
            );
            
        $this-> end_controls_section();
    }

    protected function render()
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display();

        
        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
		endif;

        ?>
        
        <!-- Start Cyber Training & Awareness Banner Area -->
		<div class="cyber-training-awareness-banner-area teachers-fonts-home" <?php if($settings['bg_img']['url']): ?> style="background-image: url(<?php echo esc_url( $settings['bg_img']['url'] ); ?> )" <?php endif; ?>>
			<div class="container-fluid">
				<div class="cyber-training-awareness-banner-content">
                    <<?php echo esc_attr( $settings['head_tag'] ); ?>> 
                        <?php echo wp_kses_post( $settings['title'] ); ?>
                    </<?php echo esc_attr( $settings['head_tag'] ); ?>>
                    <?php if( $settings['content']): ?>
					    <p><?php echo wp_kses_post( $settings['content'] ); ?></p>
                    <?php endif; ?>
					
					<div class="info-wrap">
                        <div class="info">
                            <?php if($settings['info_icon']): ?>
                                <div class="icon">
                                    <i class='<?php echo esc_attr( $settings['info_icon'] ); ?>'></i>
                                </div>
                            <?php endif; ?>

                            <div class="title">
                                <?php if( $settings['info_tit']): ?>
                                    <h5><?php echo wp_kses_post( $settings['info_tit'] ); ?></h5>
                                <?php endif; ?>
                                <?php if( $settings['info_content']): ?>
                                    <span><?php echo wp_kses_post( $settings['info_content'] ); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($settings['info_licon']): ?>
                            <div class="arrow-btn">
                               
                                <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                    <a target="_blank" href="<?php echo esc_url( $link_source ); ?>">
                                        <i class='<?php echo esc_attr( $settings['info_licon'] ); ?>'></i>
                                    </a><?php
                                } else { ?>
                                    <a href="<?php echo esc_url( $link_source ); ?>">
                                        <i class='<?php echo esc_attr( $settings['info_licon'] ); ?>'></i>
                                    </a><?php
                                } ?>

                            </div>
                        <?php endif; ?>
                    </div>

					<div class="banner-video-wrap">
						<div class="image">
                            <?php if($settings['bg_video']): ?>
                                <video loop="" muted="" autoplay="" class="video-wrap">
                                    <source src="<?php echo esc_attr( $settings['bg_video'] ); ?>" type="video/mp4">
                                </video>
                            <?php endif; ?>
                            <?php if( $settings['play_icon'] && $settings['video_url']): ?>
                                <a href="<?php echo esc_url( $settings['video_url'] ); ?>" class="cta-video-btn popup-youtube">
                                    <i class="<?php echo esc_attr( $settings['play_icon'] ); ?>"></i>
                                </a>
                            <?php endif; ?>
						</div>
						<div class="content">
                            <?php if( $settings['bottom_top_title']): ?>
							    <span><?php echo wp_kses_post( $settings['bottom_top_title'] ); ?></span>
                            <?php endif; ?>
                            <?php if( $settings['bottom_title']): ?>
							    <h5><?php echo wp_kses_post( $settings['bottom_title'] ); ?></h5>
                            <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Cyber Training & Awareness Banner Area -->

        <?php
    }  
}
Plugin::instance()->widgets_manager->register( new CTABanner );