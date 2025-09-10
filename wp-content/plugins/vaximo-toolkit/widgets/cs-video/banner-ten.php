<?php
namespace Elementor;
class BannerTen extends Widget_Base{
    public function get_name(){
        return "banner-ten";
    }
    public function get_title(){
        return "Banner ten";
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
                'banner_text_alignment',
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

            $this->add_control(
                'top_title',
                [
                    'label'   => __('Top Title','vaximo-toolkit'),
                    'type'    => Controls_Manager:: TEXT,
                    'default' => __('All Research Up to Blockchain Interoperability is Completed', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Cyber Security Is Not Optional', 'vaximo-toolkit'),
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
                    'default' => __('<p class="p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil architecto laborum eaque! Deserunt maxime, minus quas molestiae reiciendis esse natus nisi iure.</p>', 'vaximo-toolkit'),
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
                    'label'     => __('External Link', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: TEXT,
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
                'social_text',
                [
                    'label'   => __( 'Social Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Follow Us On Facebook', 'vaximo-toolkit'),
                ]
            );

                $card_items = new Repeater();

                $card_items->add_control(
                    'icon_type',
                    [
                        'label'   => __( 'Icon Type', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::SELECT,
                        'options' => [
                            'font-awesome' 	  => __( 'Font Awesome', 'vaximo-toolkit' ),
                            'bxicon' 		  => __( 'Box Icon', 'vaximo-toolkit' ),
                            'img-icon' 		  => __( 'Image', 'vaximo-toolkit' ),
                        ],
                        'default' => 'bxicon',
                    ]
                );
                $card_items->add_control(
                    'social_bx_icon',
                    [
                        'label'         => __( 'Social Icon', 'vaximo-toolkit' ),
                        'type' 	        => Controls_Manager::TEXT,
                        'condition'     => [
                            'icon_type' => 'bxicon'
                        ],
                        'description'   =>  __( 'Here you can use box icon class name. Ex:bx bxl-twitter', 'vaximo-toolkit' ),
                    ]
                );
                $card_items->add_control(
                    'social_fa_icon',
                    [
                        'label'     => __( 'Social Icon', 'vaximo-toolkit' ),
                        'type' 	    => Controls_Manager::ICON,
                        'condition' => [
                            'icon_type' => 'font-awesome'
                        ]
                    ]
                );
                $card_items->add_control(
                    'icon_img', [
                        'label' => esc_html__( 'Image Icon', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::MEDIA,
                        'label_block' => true,
                        'description'  => esc_html__( 'Icon Class field will not reflect if using Icon Image field', 'vaximo-toolkit' ),
                        'condition' => [
                            'icon_type' => 'img-icon'
                        ]
                    ]
                );
                $card_items->add_control(
                    'social_link',
                    [
                        'label' => __('Social Link', 'vaximo-toolkit'),
                        'type'  => Controls_Manager:: TEXT,
                        'label_block' => true,
                    ]
                );
                $this->add_control(
                    'social_icon',
                    [
                        'label'       => __( 'Add Social', 'vaximo-toolkit' ),
                        'type'        => Controls_Manager::REPEATER,
                        'fields'      => $card_items->get_controls(),
                    ]
                );

            $this->add_control(
                'shape_img1',
                [
                    'label' => __( 'Shape Image One', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'shape_img2',
                [
                    'label' => __( 'Shape Image Two', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'shape_img3',
                [
                    'label' => __( 'Shape Image Three', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
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

            $this->add_control(
                'banner_video',
                [
                    'label' => __( 'Background Video', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::TEXT,
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
                'top_title_color',
                [
                    'label'     => __( 'Top Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner-area .banner-text span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_top_title',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .banner-area .banner-text span',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner-area .banner-text h1, .banner-area .banner-text h2, .banner-area .banner-text h3, .banner-area .banner-text h4, .banner-area .banner-text h5, .banner-area .banner-text h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .banner-area .banner-text h1, .banner-area .banner-text h2, .banner-area .banner-text h3, .banner-area .banner-text h4, .banner-area .banner-text h5, .banner-area .banner-text h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner-area .banner-text p, .banner-area .banner-text ul li, .banner-area .banner-text ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .banner-area .banner-text p, .banner-area .banner-text ul li, .banner-area .banner-text ol li',
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
 
            $this->add_control(
                'social_color',
                [
                    'label'     => __( 'Social Text Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner-area.banner-area-three .follow-us ul li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_social',
                    'label'    => __( 'Social Text Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .banner-area.banner-area-three .follow-us ul li',
                ]
            );

            $this->add_control(
                'siconcolor', [
                    'label'     => __( 'Social Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner-area.banner-area-three .follow-us ul li i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'sicnbgcolor', [
                    'label'     => __( 'Social Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner-area.banner-area-three .follow-us ul li a' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'siconhcolor', [
                    'label'     => __( 'Social Icon Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner-area.banner-area-three .follow-us ul li:hover i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'sicnnhbgcolor', [
                    'label'     => __( 'Social Icon Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner-area.banner-area-three .follow-us ul li:hover a' => 'background-color: {{VALUE}};',
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

        $lists = $settings['social_icon']; 
        
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


        <section class="banner-area banner-area-three banner-area-ten jarallax">
            <?php if( $settings['banner_video'] != ''): ?>
                <video loop="" muted="" autoplay="" poster="#" class="background-video">
                    <source src="<?php echo esc_url( $settings['banner_video'] ); ?>" type="video/mp4">
                </video>
            <?php endif; ?>

			<div class="d-table">
				<div class="d-table-cell">
					<div class="container">
						<div class="banner-text <?php echo esc_attr( $alignment); ?>">
                            <span <?php if ( 'yes' === $settings['is_animation'] ) { ?> class="wow fadeInDown" data-wow-delay="1s" <?php } ?>><?php echo esc_html( $settings['top_title'] ); ?></span>
                            <<?php echo esc_attr( $settings['head_tag'] ); ?> <?php if ( 'yes' === $settings['is_animation'] ) { ?> class="wow fadeInLeft" data-wow-delay="1s" <?php } ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['head_tag'] ); ?>>

                            <?php echo wp_kses_post( $settings['content'] ); ?>

                            <div class="banner-btn <?php if ( 'yes' === $settings['is_animation'] ) { ?> wow fadeInUp <?php } ?>" data-wow-delay="1s">
                                <?php if ( $settings['button_text'] != '' ) : ?>
                                    <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                        <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                                        <?php echo esc_html( $settings['button_text'] ); ?>
                                        </a><?php
                                    } else { ?>
                                        <a href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                                        <?php echo esc_html( $settings['button_text'] ); ?>
                                        </a><?php
                                    } ?>
                                <?php endif; ?>

                                <?php if ( $settings['button_text2'] != '' ) : ?>
                                    <?php if ( 'yes' === $settings['target_page2'] ) { ?>
                                        <a target="_blank" href="<?php echo esc_url( $link_source2 ); ?>" class="default-btn active">
                                        <?php echo esc_html( $settings['button_text2'] ); ?>
                                        </a><?php
                                    } else { ?>
                                        <a href="<?php echo esc_url( $link_source2 ); ?>" class="default-btn active">
                                        <?php echo esc_html( $settings['button_text2'] ); ?>
                                        </a><?php
                                    } ?>
                                <?php endif; ?>
                            </div>
						</div>
					</div>
				</div>
			</div>

            <div class="follow-us">
				<ul>
					<li>
						<span><?php echo esc_html( $settings['social_text'] ); ?></span>
                    </li>
                    <?php
                    if ( $lists != '' ) :
                        foreach ( $lists as $item ) :

                            $social_icon = '';
                            if( $item['icon_type'] == 'bxicon' ):
                                $social_icon = $item['social_bx_icon'];
                            elseif( $item['icon_type'] == 'img-icon' ):
                                $social_icon = $item['icon_img']['url'];
                            else:
                                $social_icon = $item['social_fa_icon'];
                            endif;
                        ?>
                            <li>
                                <a href="<?php echo esc_url( $item['social_link'] ); ?>" target="_blank">

                                    <?php if( $item['icon_type'] == 'img-icon' && $social_icon != ''): ?> 
                                        <img src="<?php echo esc_url( $social_icon );?>" alt="<?php echo esc_attr__('icon', 'vaximo-toolkit'); ?>">
                                    <?php else: ?>
                                        <i class="<?php echo esc_attr( $social_icon ); ?>"></i>
                                    <?php endif; ?> 
                                </a>
                            </li>
                            <?php
                        endforeach;
                    endif; ?>
				</ul>
			</div>

            <?php if( !empty( $settings['shape_img1']['url'] ) ) { ?>
                <div class="banner-shape-1">
                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['shape_img1']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit'); ?>">
                </div>
            <?php } ?>

            <?php if( !empty( $settings['shape_img2']['url'] ) ) { ?>
                <div class="banner-shape-2">
                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['shape_img2']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit'); ?>">
                </div>
            <?php } ?>

            <?php if( !empty( $settings['shape_img3']['url'] ) ) { ?>
                <div class="banner-shape-3">
                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['shape_img3']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit'); ?>">
                </div>
            <?php } ?>
		</section>
        <?php
    }
}
Plugin::instance()->widgets_manager->register( new BannerTen );