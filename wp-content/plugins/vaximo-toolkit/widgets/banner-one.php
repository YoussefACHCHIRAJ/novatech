<?php
namespace Elementor;
class BannerWidget extends Widget_Base{
    public function get_name(){
        return "banner-widget";
    }
    public function get_title(){
        return "Banner Area";
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
                    'label' => __( 'Banner Image', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
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
                    'default' => __('Modern Information Protect From Hackers', 'vaximo-toolkit'),
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

            // Video
            $this->add_control(
                'video_url',
                [
                    'label' => __('Video URL', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                ]
            );
            $this->add_control(
                'video_icon',
                [
                    'label' => __('Video Icon', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                    'default'     => 'bx bx-play',
                    'description' => __('You can use font-awesome, Box icon and Flat icon class name here. ex:bx bx-play','vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'columns',
                [
                    'label' => __( 'Choose Columns', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '2'   => __( '2', 'vaximo-toolkit' ),
                        '3'   => __( '3', 'vaximo-toolkit' ),
                        '4'   => __( '4', 'vaximo-toolkit' ),
                    ],
                    'default' => '3',
                ]
            );

            $card_items = new Repeater();

            $card_items->add_control(
                'icon_type',
                [
                    'label'   => __( 'Icon Type', 'cavie-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'font-awesome' 	  => __( 'Font Awesome', 'cavie-toolkit' ),
                        'bxicon' 		  => __( 'Box Icon', 'cavie-toolkit' ),
                    ],
                    'default' => 'bxicon',
                ]
            );
            $card_items->add_control(
                'card_bx_icon',
                [
                    'label'         => __( 'Card Icon', 'cavie-toolkit' ),
                    'type' 	        => Controls_Manager::TEXT,
                    'condition'     => [
                        'icon_type' => 'bxicon'
                    ],
                    'description'   =>  __( 'Here you can use box icon class name. Ex:bx bx-check-shield', 'cavie-toolkit' ),
                ]
            );
            $card_items->add_control(
                'card_fa_icon',
                [
                    'label'     => __( 'Card Icon', 'cavie-toolkit' ),
                    'type' 	    => Controls_Manager::ICON,
                    'condition' => [
                        'icon_type' => 'font-awesome'
                    ]
                ]
            );
            $card_items->add_control(
                'card_title',
                [
                    'label' => __('Title', 'cavie-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                    'label_block' => true,
                ]
            );
            $card_items->add_control(
                'card_desc',
                [
                    'label'  => __('Card Content', 'cavie-toolkit'),
                    'type'   => Controls_Manager:: TEXTAREA,
                ]
            );
            $this->add_control(
                'card_content',
                [
                    'label'       => __( 'Add Banner Card Content', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
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
                'show_lines',
                [
                    'label'        => __( 'Hide Lines?', 'parco-toolkit' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'parco-toolkit' ),
                    'label_off'    => __( 'Hide', 'parco-toolkit' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );
            $this->add_control(
                'top_title_color',
                [
                    'label' => __( 'Top Title Color', 'elementor' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner-area .banner-text span' => 'color: {{VALUE}};',
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
                    'label' => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
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
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
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
                'icon_color', [
                    'label'     => __( 'Video Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .video-btn i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'icon_hcolor', [
                    'label'     => __( 'Video Icon Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .video-btn:hover i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'icon_hbgcolor', [
                    'label'     => __( 'Video Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .video-btn:hover::after, .video-btn:hover::before, .video-btn:hover' => 'background: {{VALUE}};',
                    ],
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
            // Card Styling
            $this->add_control(
                'card_title_color',
                [
                    'label'     => __( 'Card Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_card_title',
                    'label'    => __( 'Card Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .single-features h3',
                ]
            );
            $this->add_control(
                'card_desc_color',
                [
                    'label'     => __( 'Card Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_card_desc',
                    'label'    => __( 'Card Description Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .single-features p',
                ]
            );
            $this->add_control(
                'card_bg_color',
                [
                    'label'     => __( 'Card Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_hivcon_color',
                [
                    'label'     => __( 'Card Hover Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features:hover h3 i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_htit_color',
                [
                    'label'     => __( 'Card Hover Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features:hover h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_hdesc_color',
                [
                    'label'     => __( 'Card Hover Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features:hover p' => 'color: {{VALUE}}',
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

        // Card Columns
        $columns = $settings['columns'];
        if ( $columns == '2' ) {
            $column = 'col-lg-6 col-sm-6';
            $cardcls = "mb-4";
        } elseif ( $columns == '3' ) {
            $column = 'col-lg-4 col-sm-6 offset-sm-3 offset-lg-0';
            $cardcls = "mb-0";
        } elseif ( $columns == '4' ) {
            $column = 'col-lg-3 col-sm-6';
            $cardcls = "";
        } else {
            $column = 'col-lg-4 col-sm-6';
            $cardcls = "";
        }
        $lists = $settings['card_content']; 
        
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

        <div class="banner-area banner-item-bg-1" style="background-image: url(<?php echo esc_url( $settings['image']['url']); ?> )">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-9">
						<div class="banner-text">
                            <span <?php if ( 'yes' === $settings['is_animation'] ) { ?> class="wow fadeInDown" data-wow-delay="1s" <?php } ?>><?php echo esc_html( $settings['top_title'] ); ?></span>

                            <<?php echo esc_attr( $settings['head_tag'] ); ?> <?php if ( 'yes' === $settings['is_animation'] ) { ?> class="wow fadeInLeft" data-wow-delay="1s" <?php } ?> ><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['head_tag'] ); ?>>

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
					
					<div class="col-lg-3">
                        <?php if( $settings['video_url'] != '') : ?>
                            <div class="video-btn-animat one <?php if ( 'yes' === $settings['is_animation'] ) { ?> wow zoomIn <?php } ?>" data-wow-delay="1s">
                                <a href="<?php echo esc_url( $settings['video_url'] ); ?>" class="video-btn popup-youtube">
                                    <i class="<?php echo esc_attr( $settings['video_icon'] ); ?>"></i>
                                </a>
                            </div>
                        <?php endif; ?>
					</div>
				</div>
			</div>

			<div class="container pt-100">
                <div class="row">
                    <?php 
                    if ( $lists != '' ) :
                        foreach ( $lists as $item ) :
                            // Card Icon
                            $card_icon = '';
                            if( $item['icon_type'] == 'bxicon' ):
                                $card_icon = $item['card_bx_icon'];
                            else:
                                $card_icon = $item['card_fa_icon'];
                            endif;
                        ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <?php if ( !empty( $item['card_title'] || $item['card_desc'] || $card_icon ) ) : ?>
                                <div class="single-features <?php echo esc_attr( $cardcls ); ?>">
                                    <h3><i class="<?php echo esc_attr( $card_icon ); ?>"></i> <?php echo esc_html( $item['card_title'] ); ?></h3>
                                    <p><?php echo esc_html( $item['card_desc'] ); ?></p>
                                    <span class="<?php echo esc_attr( $card_icon ); ?>"></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php 
                        endforeach;
                    endif; ?>
                </div>
            </div>
            <?php if ( $settings['show_lines'] == 'yes' ) : ?>
                <div class="lines">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new BannerWidget );