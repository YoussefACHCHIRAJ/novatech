<?php
namespace Elementor;
class BannerSix extends Widget_Base{
    public function get_name(){
        return "banner-six-widget";
    }
    public function get_title(){
        return "Banner Animated Image";
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
                'image',
                [
                    'label' => __( 'Featured Image', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'shape_img1',
                [
                    'label' => __( 'Shape Image 1', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'shape_img2',
                [
                    'label' => __( 'Shape Image 2', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'banner_text_alignment',
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
        
            $this->add_control(
                'title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Cyber Security Solutions Built On Customer Trust', 'vaximo-toolkit'),
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
                    'default' => 'h1',
                ]
            );
            $this->add_control(
                'content',
                [
                    'label'   => __( 'Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::WYSIWYG,
                    'default' => __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil architecto laborum eaque! Deserunt maxime, minus quas molestiae reiciendis esse natus nisi iure.', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'desc_note1', [
                    'label' => '',
                    'type'  => Controls_Manager::RAW_HTML,
                    'raw'   => __( 'In description editor use a class in p tag. When editing the editor its remove existing p, span tag', 'vaximo-toolkit' ),
                    'content_classes' => 'elementor-warning',
                ]
            );
            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Get Started', 'vaximo-toolkit'),
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

            // Button Text Two
            $this->add_control(
                'button_text2',
                [
                    'label'   => __( 'Button Text Two', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('About Us', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'link_type2',
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
                'link_to_page2',
                [
                    'label'       => __( 'Link Page', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => vaximo_toolkit_get_page_as_list(),
                    'condition'   => [
                        'link_type2' => '1',
                    ]
                ]
            );
            $this->add_control(
                'external_link2',
                [
                    'label' => __('External Link', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type2' => '2',
                    ]
                ]
            );
            //Target Page
            $this->add_control(
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

            $this->add_control(
                'is_animation',
                [
                    'label'        => __( 'Is Animation?', 'vaximo-toolkit' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Yes', 'vaximo-toolkit' ),
                    'label_off'    => __( 'No', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );
            
        $this-> end_controls_section();

        // End Tab content controls

        // Start style1 content controls
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
                        '{{WRAPPER}} .banner-area-six .banner-text h1, .banner-area-six .banner-text h2, .banner-area-six .banner-text h3, .banner-area-six .banner-text h4, .banner-area-six .banner-text h5, .banner-area-six .banner-text h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .banner-area-six .banner-text h1, .banner-area-six .banner-text h2, .banner-area-six .banner-text h3, .banner-area-six .banner-text h4, .banner-area-six .banner-text h5, .banner-area-six .banner-text h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner-area-six .banner-text p, .banner-area-six .banner-text ul li, .banner-area-six .banner-text ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .banner-area-six .banner-text p, .banner-area-six .banner-text ul li, .banner-area-six .banner-text ol li',
                ]
            );


            $this->add_control(
                'btn_onecolor', [
                    'label'     => __( 'Button One Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_onehcolor', [
                    'label'     => __( 'Button One Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_onehbgcolor', [
                    'label'     => __( 'Button One Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn::before, .default-btn::after' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_twocolor', [
                    'label'     => __( 'Button Two Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn.active' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_twobgcolor', [
                    'label'     => __( 'Button Two Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn.active' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'btn_2hcolor', [
                    'label'     => __( 'Button Two Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn.active:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_2hbgcolor', [
                    'label'     => __( 'Button Two Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn.active::before, .default-btn.active::after' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            
        $this-> end_controls_section();
        // End Style content controls
    }

    protected function render()
    {
        // Retrieve all controls value
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

        // Text Alignment
		if( $settings['banner_text_alignment' ] == '1') {
			$alignment = 'text-center';
		} 
		elseif( $settings['banner_text_alignment' ] == '2') {
			$alignment = 'text-right';
		} else {
			$alignment = 'text-left';
		}
        
        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
		endif;
		
		// Button link Two
        $link_source2 = '';
        if ( $settings['link_type2'] == 1 ) :
            $link_source2 = get_page_link( $settings['link_to_page2'] ); 
        else :
            $link_source2 = $settings['external_link2'];
		endif; ?>

        <div class="banner-area-six">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="banner-text <?php echo esc_attr( $alignment); ?>">
                            <<?php echo esc_attr( $settings['head_tag'] ); ?> <?php if ( 'yes' === $settings['is_animation'] ) { ?> class="wow fadeInLeft" data-wow-delay="1s" <?php } ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['head_tag'] ); ?>>

                            <?php echo wp_kses_post( $settings['content'] ); ?>

                            <div class="banner-btn <?php if ( 'yes' === $settings['is_animation'] ) { ?> wow fadeInUp <?php } ?>" data-wow-delay="1s">
                                <?php if ( $settings['button_text'] != '' ) : ?>
                                    <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                        <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="default-btn six">
                                            <i class="bx bx-file"></i>
                                            <?php echo esc_html( $settings['button_text'] ); ?>
                                        </a><?php
                                    } else { ?>
                                        <a href="<?php echo esc_url( $link_source ); ?>" class="default-btn six">
                                            <i class="bx bx-file"></i>
                                            <?php echo esc_html( $settings['button_text'] ); ?>
                                        </a><?php
                                    } ?>
                                <?php endif; ?>

                                <?php if ( $settings['button_text2'] != '' ) : ?>
                                    <?php if ( 'yes' === $settings['target_page2'] ) { ?>
                                        <a target="_blank" href="<?php echo esc_url( $link_source2 ); ?>" class="default-btn active">
                                            <i class="bx bx-user"></i>
                                            <?php echo esc_html( $settings['button_text2'] ); ?>
                                        </a><?php
                                    } else { ?>
                                        <a href="<?php echo esc_url( $link_source2 ); ?>" class="default-btn active">
                                            <i class="bx bx-user"></i>
                                            <?php echo esc_html( $settings['button_text2'] ); ?>
                                        </a><?php
                                    } ?>
                                <?php endif; ?>
                            </div>
						</div>
					</div>
					
					<div class="col-lg-6"> 
                        <?php if( $settings['image']['url'] != '' ): ?>
                            <div class="banner-img">
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                            </div>
                        <?php endif; ?>
					</div>
				</div>
			</div>

            <?php if( $settings['shape_img1']['url'] != '' ): ?>
                <div class="banner-shape-1">
                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['shape_img1']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                </div>
            <?php endif; ?>
            <?php if( $settings['shape_img2']['url'] != '' ): ?>
                <div class="banner-shape-2">
                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['shape_img2']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new BannerSix );