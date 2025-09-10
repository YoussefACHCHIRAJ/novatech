<?php
namespace Elementor;
class AiBanner extends Widget_Base{
    public function get_name(){
        return "Ai_Banner";
    }
    public function get_title(){
        return "AI Powered Security Banner";
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
                    'default' => __('https://www.youtube.com/watch?v=sdpxddDzXfE', 'vaximo-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'video_top_title',
                [
                    'label'   => __('Video Top Title','vaximo-toolkit'),
                    'type'    => Controls_Manager:: TEXT,
                    'default' => __('What is Vaximo AI?', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'video_top_con',
                [
                    'label'   => __('Video Top Content','vaximo-toolkit'),
                    'type'    => Controls_Manager:: TEXT,
                    'default' => __('The Future of <strong>Cybersecurity</strong> Is <span>Data</span> and <span>AI</span>', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'top_title',
                [
                    'label'   => __('Top Title','vaximo-toolkit'),
                    'type'    => Controls_Manager:: TEXT,
                    'default' => __('SECURING YOUR DIGITAL TRANSFORMATION', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'title',
                [
                    'label'   => __( 'Title One', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'AI Powered Cyber Security for the Next Gen Future', 'vaximo-toolkit' ),
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
                'button_text',
                [
                    'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('More About Us', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'button_icon',
                [
                    'label'   => __( 'Button Icon', 'vaximo-toolkit' ),
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
                'bt_right_con',
                [
                    'label'   => __('Button RIght Content','vaximo-toolkit'),
                    'type'    => Controls_Manager:: TEXT,
                    'default' => __('We provide to our clients the most <span>resilient, securing</span> and <span>digital authority.</span>', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'f_img',
                [
                    'label' => __( 'Feature Image', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'right_con1',
                [
                    'label'   => __('Feature Tags One','vaximo-toolkit'),
                    'type'    => Controls_Manager:: TEXT,
                    'default' => __('Vaximo', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'right_con2',
                [
                    'label'   => __('Feature Tags Two','vaximo-toolkit'),
                    'type'    => Controls_Manager:: TEXT,
                    'default' => __('Security', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'shape_img',
                [
                    'label' => __( 'Shape Image', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

        $this-> end_controls_section();

        // Start style1 content controls
        $this-> start_controls_section(
            'content_style',
            [
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'sec_bg_color',
                [
                    'label'     => __( 'Section Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-whole-bg-black' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'play_bticon',
                [
                    'label'     => __( 'Play Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-banner-content .video-wrap .ai-video-btn i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'play_h_bticon',
                [
                    'label'     => __( 'Play Icon Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-banner-content .video-wrap .ai-video-btn i:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'play_bg_bticon',
                [
                    'label'     => __( 'Play Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-banner-content .video-wrap .ai-video-btn i' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'play_bg_h_bticon',
                [
                    'label'     => __( 'Play Icon Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-banner-content .video-wrap .ai-video-btn i:hover' => 'background: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_play_bticon',
                    'label'    => __( 'Play Icon Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-powered-security-banner-content .video-wrap .ai-video-btn i',
                ]
            );

            $this->add_control(
                'vd_top_title',
                [
                    'label'     => __( 'Video Top Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-banner-content .video-wrap .title h5' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_vd_top_title',
                    'label'    => __( 'Video Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-powered-security-banner-content .video-wrap .title h5',
                ]
            );

            $this->add_control(
                'vd_top_con',
                [
                    'label'     => __( 'Video Top Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-banner-content .video-wrap .title p, {{WRAPPER}} .ai-powered-security-banner-content .video-wrap .title p span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_vd_top_con',
                    'label'    => __( 'Video Top Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-powered-security-banner-content .video-wrap .title p',
                ]
            );

            $this->add_control(
                'top_title_bg_color',
                [
                    'label'     => __( 'Top Title Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-banner-content .sub' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
           
            $this->add_responsive_control(
                'top_title_border_radius',
                [
                    'label' => esc_html__( 'Top Title Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-banner-content .sub' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'top_title_color',
                [
                    'label'     => __( 'Top Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-banner-content .sub' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_top_title_op',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-powered-security-banner-content .sub',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-banner-content h1, {{WRAPPER}} .ai-powered-security-banner-content h2, {{WRAPPER}} .ai-powered-security-banner-content h3, {{WRAPPER}} .ai-powered-security-banner-content h4, {{WRAPPER}} .ai-powered-security-banner-content h5, {{WRAPPER}} .ai-powered-security-banner-content h6 span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-powered-security-banner-content h1, {{WRAPPER}} .ai-powered-security-banner-content h2, {{WRAPPER}} .ai-powered-security-banner-content h3, {{WRAPPER}} .ai-powered-security-banner-content h4, {{WRAPPER}} .ai-powered-security-banner-content h5, {{WRAPPER}} .ai-powered-security-banner-content h6',
                ]
            );

            $this->add_control(
                'btn_onecolor', [
                    'label'     => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-default-btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'btn_honecolor', [
                    'label'     => __( 'Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-default-btn:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'btn_one_heading',
                [
                    'label' => esc_html__( 'Button Background Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'btn_one_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-default-btn',
                ]
            );

            $this->add_control(
                'btn_one_h_heading',
                [
                    'label' => esc_html__( 'Button Background Hover Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'btn_one_h_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-default-btn::before, .gcd-default-btn::after',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_btn2',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-default-btn',
                ]
            );

            $this->add_control(
                'btn_con',
                [
                    'label'     => __( 'Button Right Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-banner-content .wrap-btn li p, {{WRAPPER}} .ai-powered-security-banner-content .wrap-btn li p span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_btn_con',
                    'label'    => __( 'Button Right Content Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .ai-powered-security-banner-content .wrap-btn li p, {{WRAPPER}} .ai-powered-security-banner-content .wrap-btn li p span',
                ]
            );

            $this->add_control(
                'tag_cl_con',
                [
                    'label'     => __( 'Tag Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-powered-security-banner-image .security' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'tag_op_heading',
                [
                    'label' => esc_html__( 'Tag Background Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'tag_op_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .ai-powered-security-banner-image .security',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle_op',
                    'label'    => __( 'Tag Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-powered-security-banner-image .security',
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
        
        <!-- Start AI Powered Security Banner Area -->
        <div class="teachers-fonts-home ai-whole-bg-black">
            <div class="ai-powered-security-banner-area">
                <div class="container-fluid">
                    <div class="row justify-content-center align-items-center g-5">
                        <div class="col-xl-7 col-md-12">
                            <div class="ai-powered-security-banner-content">
                                <div class="video-wrap">
                                    <?php if( $settings['play_icon'] && $settings['video_url']): ?>
                                        <a href="<?php echo esc_url( $settings['video_url'] ); ?>" class="ai-video-btn popup-youtube">
                                            <i class="<?php echo esc_attr( $settings['play_icon'] ); ?>"></i>
                                        </a>
                                    <?php endif; ?>
                                
                                    <div class="title">
                                        <?php if( $settings['video_top_title']): ?>
                                            <h5><?php echo wp_kses_post( $settings['video_top_title'] ); ?></h5>
                                        <?php endif; ?>
                                        <?php if( $settings['video_top_con']): ?>
                                            <p><?php echo wp_kses_post( $settings['video_top_con'] ); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php if( $settings['top_title']): ?>
                                    <span class="sub"><?php echo wp_kses_post( $settings['top_title'] ); ?></span>
                                <?php endif; ?>

                                <<?php echo esc_attr( $settings['head_tag'] ); ?>> 
                                    <?php echo wp_kses_post( $settings['title'] ); ?>
                                </<?php echo esc_attr( $settings['head_tag'] ); ?>>

                                <ul class="wrap-btn">
                                    <?php if ( $settings['button_text'] && $link_source != '' ) : ?>
                                        <li>
                                            <?php if ( $settings['button_text'] != '' ) : ?>
                                                <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                                    <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                                                    <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                                                    </a><?php
                                                } else { ?>
                                                    <a href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                                                    <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                                                    </a><?php
                                                } ?>
                                            <?php endif; ?>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($settings['bt_right_con'] != ''): ?>
                                        <li>
                                            <?php if($settings['bt_right_con'] != ''): ?>
                                                <p><?php echo wp_kses_post($settings['bt_right_con']); ?></p>
                                            <?php endif; ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <?php if($settings['f_img']['url'] != ''): ?>
                            <div class="col-xl-5 col-md-12">
                                <div class="ai-powered-security-banner-image">
                                    <img src="<?php echo esc_url( $settings['f_img']['url'] ); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>">
                                    <?php if( $settings['right_con1']): ?>
                                        <span class="sub"><?php echo wp_kses_post( $settings['right_con1'] ); ?></span>
                                    <?php endif; ?>
                                    <?php if( $settings['right_con2']): ?>
                                        <span class="security"><?php echo wp_kses_post( $settings['right_con2'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            
                <?php if($settings['shape_img']['url'] != ''): ?>
                    <div class="ai-powered-security-banner-line">
                        <img src="<?php echo esc_url( $settings['shape_img']['url'] ); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>">
                    </div>
                <?php endif; ?>
                <div class="ai-powered-security-banner-ellipse1"></div>
                <div class="ai-powered-security-banner-ellipse2"></div>
            </div>
        </div>
		<!-- End AI Powered Security Banner Area -->


        <?php
    }  
}
Plugin::instance()->widgets_manager->register( new AiBanner );