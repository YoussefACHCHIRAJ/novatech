<?php
namespace Elementor;
class GcdBanner extends Widget_Base{
    public function get_name(){
        return "Gcd_Banner";
    }
    public function get_title(){
        return "Government Cyber Defense Banner";
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
            'top_title_left',
            [
                'label'   => __('Top Title Left','vaximo-toolkit'),
                'type'    => Controls_Manager:: TEXT,
                'default' => __('We help Government', 'vaximo-toolkit'),
            ]
        );

        $this->add_control(
            'top_title',
            [
                'label'   => __('Top Title','vaximo-toolkit'),
                'type'    => Controls_Manager:: TEXT,
                'default' => __('A SECURE DIGITAL FUTURE THROUGH COLLABORATION', 'vaximo-toolkit'),
            ]
        );

        $this->add_control(
            'banner_title_op',
            [
                'label' => __( 'Choose Banner Title Option', 'vaximo-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1'     => __( 'Title With Video', 'vaximo-toolkit' ),
                    '2'     => __( 'Only Title', 'vaximo-toolkit' ),
                ],
                'default' => '1'
            ]
        );

        $this->add_control(
            'title1',
            [
                'label'   => __( 'Title One', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __( 'Safeguarding Citizens,', 'vaximo-toolkit' ),
                'condition' => [
                    'banner_title_op' => '1',
                ],
            ]
        );
        $this->add_control(
            'title2',
            [
                'label'   => __( 'Title Two', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __( 'Businesses, and', 'vaximo-toolkit' ),
                'condition' => [
                    'banner_title_op' => '1',
                ],
            ]
        );
        $this->add_control(
            'title3',
            [
                'label'   => __( 'Title Three', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __( 'Government', 'vaximo-toolkit' ),
                'condition' => [
                    'banner_title_op' => '1',
                ],
            ]
        );

        $this->add_control(
            'title4',
            [
                'label'   => __( 'Title Four', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __( 'Against Evolving Digital', 'vaximo-toolkit' ),
                'condition' => [
                    'banner_title_op' => '1',
                ],
            ]
        );

        $this->add_control(
            'title5',
            [
                'label'   => __( 'Title Five', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __( 'Threats', 'vaximo-toolkit' ),
                'condition' => [
                    'banner_title_op' => '1',
                ],
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label'   => __( 'Video', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::TEXT,
                'condition' => [
                    'banner_title_op' => '1',
                ],
            ]
        );
       
        $this->add_control(
            'title',
            [
                'label'   => __( 'Title', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __( 'Safeguarding Citizens, Businesses, and Government Against Evolving Digital Threats', 'vaximo-toolkit' ),
                'condition' => [
                    'banner_title_op' => '2',
                ],
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
            'patner_show_hide',
            [
                'label'        => __( 'Partner Logo Hide / Show', 'vaximo-toolkit' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vaximo-toolkit' ),
                'label_off'    => __( 'Hide', 'vaximo-toolkit' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'patner_title',
            [
                'label'   => __('Partner Title','vaximo-toolkit'),
                'type'    => Controls_Manager:: TEXT,
                'default' => __('Trusted by over 2500+ organisations since 1984', 'vaximo-toolkit'),
                'condition' => [
                    'patner_show_hide' => 'yes',
                ],
            ]
        );


        $card_items = new Repeater();

            $card_items->add_control(
                'logo',
                [
                    'type'    => Controls_Manager::MEDIA,
                    'label'   => __( 'Logo', 'vaximo-toolkit' ),
                ]
            );
       
        $this->add_control(
            'logos',
            [
                'label'       => __( 'Add Logo', 'vaximo-toolkit' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $card_items->get_controls(),
                'condition' => [
                    'patner_show_hide' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'bg_img',
            [
                'label' => __( 'Background Image', 'vaximo-toolkit' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'shape_img1',
            [
                'label' => __( 'Shape Image One', 'vaximo-toolkit' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'shape_img2',
            [
                'label' => __( 'Shape Image Two', 'vaximo-toolkit' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'shape_img3',
            [
                'label' => __( 'Shape Image Three', 'vaximo-toolkit' ),
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
                'lt_title_left',
                [
                    'label'     => __( 'Top Title Left Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .government-cyber-defense-banner-content .sub-top' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_lt_title_left',
                    'label'    => __( 'Top Title Left Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .government-cyber-defense-banner-content .sub-top',
                ]
            );
            $this->add_control(
                'lt_title_bg_color',
                [
                    'label'     => __( 'Top Title Left Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .government-cyber-defense-banner-content .sub-top' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'lt_title_br_color',
                [
                    'label'     => __( 'Top Title Left Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .government-cyber-defense-banner-content .sub-top' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
           
            $this->add_responsive_control(
                'lt_title_border_radius',
                [
                    'label' => esc_html__( 'Top Title Left Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .government-cyber-defense-banner-content .sub-top' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'selector' => '{{WRAPPER}} .government-cyber-defense-banner-content .sub',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle_op',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .government-cyber-defense-banner-content .sub',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .government-cyber-defense-banner-content h1 span, .government-cyber-defense-banner-content h2 span, .government-cyber-defense-banner-content h3 span, .government-cyber-defense-banner-content h4 span, .government-cyber-defense-banner-content h5 span, .government-cyber-defense-banner-content h6 span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .government-cyber-defense-banner-content h1 span, .government-cyber-defense-banner-content h2 span, .government-cyber-defense-banner-content h3 span, .government-cyber-defense-banner-content h4 span, .government-cyber-defense-banner-content h5 span, .government-cyber-defense-banner-content h6 span',
                ]
            );
           
            $this->add_control(
                'partnar_title',
                [
                    'label'     => __( 'Partner Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .government-cyber-defense-banner-content .trusted-box h5' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_partnar',
                    'label'    => __( 'Partner Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .government-cyber-defense-banner-content .trusted-box h5',
                ]
            );

            $this->add_control(
                'partnar_bg_color',
                [
                    'label'     => __( 'Partner Card Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .government-cyber-defense-banner-content .trusted-box' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'partnar_border_radius',
                [
                    'label' => esc_html__( 'Partner Card Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .government-cyber-defense-banner-content .trusted-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
          
            
        $this-> end_controls_section();
    }

    protected function render()
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display();

        ?>
        
        <!-- Start Government Cyber Defense Banner Area -->
		<div class="government-cyber-defense-banner-area teachers-fonts-home" <?php if($settings['bg_img']['url']): ?> style="background-image: url(<?php echo esc_url( $settings['bg_img']['url'] ); ?> )" <?php endif; ?>>
			<div class="container">
				<div class="government-cyber-defense-banner-content">
                    <?php if( $settings['top_title_left']): ?>
					    <span class="sub-top"><?php echo wp_kses_post( $settings['top_title_left'] ); ?></span>
                    <?php endif; ?>
                    <?php if( $settings['top_title']): ?>
					    <span class="sub"><?php echo wp_kses_post( $settings['top_title'] ); ?></span>
                    <?php endif; ?>

                    <<?php echo esc_attr( $settings['head_tag'] ); ?>> 
                        <?php if ( $settings['banner_title_op'] == '1' ) : ?>
                            <span><?php echo wp_kses_post( $settings['title1'] ); ?></span>
						    <span><?php echo wp_kses_post( $settings['title2'] ); ?> 
                            <?php if( $settings['video_url']): ?>
                                <div class="video-container">
                                    <video class="scroll-video" autoplay muted loop>
                                        <source src="<?php echo esc_attr( $settings['video_url'] ); ?>" type="video/mp4">
                                    </video>
                                </div>
                            <?php endif; ?>
                            <?php echo wp_kses_post( $settings['title3'] ); ?></span>
                            <span><?php echo wp_kses_post( $settings['title4'] ); ?></span>
                            <span><?php echo wp_kses_post( $settings['title5'] ); ?></span>
                        <?php else: ?>

                            <?php echo wp_kses_post( $settings['title'] ); ?>

                        <?php endif; ?>
                    </<?php echo esc_attr( $settings['head_tag'] ); ?>>

                    <?php if($settings['shape_img1']['url'] != ''): ?>
                        <div class="middle-shape">
                            <img src="<?php echo esc_url( $settings['shape_img1']['url'] ); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>">
                        </div>
                    <?php endif; ?>
				
					<?php if ( $settings['patner_show_hide'] == 'yes' ) : ?>
                        <div class="trusted-box">
                            <?php if( $settings['patner_title']): ?>
                                <h5><?php echo wp_kses_post( $settings['patner_title'] ); ?></h5>
                            <?php endif; ?>
                            <ul class="list">
                        
                                <?php foreach( $settings['logos'] as $item ): ?>
                                    <li>
                                        <img src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Logo', 'vaximo-toolkit' ); ?>">
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    <?php endif; ?>

				</div>
			</div>

            <?php if($settings['shape_img2']['url'] != ''): ?>
                <div class="gcd-banner-shape1">
                    <img src="<?php echo esc_url( $settings['shape_img2']['url'] ); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>">
                </div>
            <?php endif; ?>

            <?php if($settings['shape_img3']['url'] != ''): ?>
                <div class="gcd-banner-shape2">
                    <img src="<?php echo esc_url( $settings['shape_img3']['url'] ); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>">
                </div>
            <?php endif; ?>
		
		</div>
		<!-- End Government Cyber Defense Banner Area -->

       


        <?php
    }  
}
Plugin::instance()->widgets_manager->register( new GcdBanner );