<?php
namespace Elementor;
class BannerSeven extends Widget_Base{
    public function get_name(){
        return "banner_seven";
    }
    public function get_title(){
        return "Banner Seven";
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
            $card_items = new Repeater();
            $card_items->add_control(
                'image',
                [
                    'label'  => __( 'Banner Image', 'vaximo-toolkit' ),
                    'type'   => Controls_Manager::MEDIA,
                ]
            );
            $card_items->add_control(
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
            $card_items->add_control(
                'top_title',
                [
                    'label'   => __( 'Top Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'All Research Up to Blockchain Interoperability is Completed', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'Cyber Security & IT Management', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
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
            $card_items->add_control(
                'content',
                [
                    'label'   => __( 'Description', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::WYSIWYG,
                    'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'desc_note1',
                [
                    'label' => '',
                    'type'  => Controls_Manager::RAW_HTML,
                    'raw'   => __( 'In description editor use a class in p tag. When editing the editor its remove existing p, span tag', 'vaximo-toolkit' ),
                    'content_classes' => 'elementor-warning',
                ]
            );
            $card_items->add_control(
                'button_text',
                [
                    'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Get Started', 'vaximo-toolkit'),
                ]
            );
            $card_items->add_control(
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
            $card_items->add_control(
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
            $card_items->add_control(
                'external_link',
                [
                    'label'     => __('External Link', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );
            $card_items->add_control(
                'target_page',
                [
                    'label'        => __( 'Link Open In New Tab?', 'vaximo-toolkit' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Yes', 'vaximo-toolkit' ),
                    'label_off'    => __( 'No', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );
            // Button Text Two
            $card_items->add_control(
                'button_text2',
                [
                    'label'   => __( 'Button Text Two', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('About Us', 'vaximo-toolkit'),
                ]
            );
            $card_items->add_control(
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
            $card_items->add_control(
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
            $card_items->add_control(
                'external_link2',
                [
                    'label'       => __('External Link', 'vaximo-toolkit'),
                    'type'        => Controls_Manager:: TEXT,
                    'condition'   => [
                        'link_type2' => '2',
                    ]
                ]
            );
            $card_items->add_control(
                'target_page2',
                [
                    'label'        => __( 'Link Open In New Tab?', 'vaximo-toolkit' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Yes', 'vaximo-toolkit' ),
                    'label_off'    => __( 'No', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );
            $this->add_control(
                'slider_content',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
                ]
            );
            $this->add_control(
                'shape',
                [
                    'label'  => __( 'Shape Image', 'vaximo-toolkit' ),
                    'type'   => Controls_Manager::MEDIA,
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

        // Start style1 content controls
        $this-> start_controls_section(
            'content_style',
            [
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'toptitle_color',
                [
                    'label'     => __( 'Top Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-content span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_toptitle',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .new-main-banner-content span',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-content h1, .new-main-banner-content h2, .new-main-banner-content h3, .new-main-banner-content h4, .new-main-banner-content h5, .new-main-banner-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .new-main-banner-content h1, .new-main-banner-content h2, .new-main-banner-content h3, .new-main-banner-content h4, .new-main-banner-content h5, .new-main-banner-content h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-content p,  .new-main-banner-content ul li, .hero-slider-area .slider-item .slider-text ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), 
                [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .new-main-banner-content p,  .new-main-banner-content ul li, .hero-slider-area .slider-item .slider-text ol li',
                ]
            );

            // Button One
            $this->add_control(
                'btn1_color',
                [
                    'label'     => __( 'Button One Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-content .banner-btn li .default-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn1_bgcolor',
                [
                    'label'     => __( 'Button One Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-content .banner-btn li .default-btn' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn1_hcolor',
                [
                    'label'     => __( 'Button One Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-content .banner-btn li .default-btn:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn1_hbgcolor',
                [
                    'label'     => __( 'Button One Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-content .banner-btn li .default-btn::before, .new-main-banner-content .banner-btn li .default-btn::after' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), 
                [
                    'name'     => 'typography_btn1',
                    'label'    => __( 'Button One Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .new-main-banner-content .banner-btn li .default-btn',
                ]
            );

            // Button Two
            $this->add_control(
                'btn2_color',
                [
                    'label'     => __( 'Button Two Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-content .banner-btn li .default-btn.color-two' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn2_bordercolor',
                [
                    'label'     => __( 'Button Two Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-content .banner-btn li .default-btn.color-two' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn2_bgcolor',
                [
                    'label'     => __( 'Button Two Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-content .banner-btn li .default-btn.color-two' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn2_hcolor',
                [
                    'label'     => __( 'Button Two Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-content .banner-btn li .default-btn.color-two:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn2_hbgcolor',
                [
                    'label'     => __( 'Button Two Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-content .banner-btn li .default-btn.color-two:hover, .new-main-banner-content .banner-btn li .default-btn.color-two::before, .new-main-banner-content .banner-btn li .default-btn.color-two::after' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), 
                [
                    'name'     => 'typography_btn2',
                    'label'    => __( 'Button Two Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .new-main-banner-content .banner-btn li .default-btn.color-two',
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
                    'label'     => esc_html__( 'Section Background', 'cyarb-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'     => 'secbg_color',
                    'types'    => ['gradient' ],
                    'selector' => '{{WRAPPER}} .new-main-banner-slides-item',
                ]
            );
        $this-> end_controls_section();
    }

    protected function render()
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display();
        
        $lists    = $settings['slider_content']; 
        ?>

        <section class="new-main-banner-area">
			<div class="new-main-home-slides owl-carousel owl-theme">
                <?php if ( $lists != '' ) :
                foreach ( $lists as $item ) : 
                    // Text Alignment
                    if( $item['banner_text_alignment' ] == '1') {
                        $alignment = 'text-center';
                    } 
                    elseif( $item['banner_text_alignment' ] == '2') {
                        $alignment = 'text-right';
                    } else {
                        $alignment = 'text-left';
                    }
                    // Button link
                    $link_source = '';
                    if ( $item['link_type'] == 1 ) :
                        $link_source = get_page_link( $item['link_to_page']); 
                    else :
                        $link_source = $item['external_link'];
                    endif;
                    
                    // Button link Two
                    $link_source2 = '';
                    if ( $item['link_type2'] == 1 ) :
                        $link_source2 = get_page_link( $item['link_to_page2'] ); 
                    else :
                        $link_source2 = $item['external_link2'];
                    endif; 
                ?>
                    <div class="new-main-banner-slides-item">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-5 col-md-12">
                                    <div class="new-main-banner-content <?php echo esc_attr( $alignment); ?>">
                                        <?php if( $item['top_title'] != '') : ?>
                                            <span><?php echo esc_html( $item['top_title'] ); ?></span>
                                        <?php endif; ?>

                                        <<?php echo esc_attr( $item['head_tag'] ); ?> <?php if ( 'yes' === $settings['is_animation'] ) { ?> class="wow fadeInLeft" data-wow-delay="1s" <?php } ?>> <?php echo esc_html( $item['title'] ); ?> </<?php echo esc_attr( $item['head_tag'] ); ?>>

                                        <?php echo wp_kses_post( $item['content'] ); ?>

                                        <?php if ( $item['button_text'] != '' || $item['button_text2'] != '' ) : ?>
                                            <ul class="banner-btn <?php if ( 'yes' === $settings['is_animation'] ) { ?> wow fadeInUp <?php } ?>" data-wow-delay="1s">
                                                <?php if ( $item['button_text'] != '' ) : ?>
                                                    <li>
                                                        <?php if ( 'yes' === $item['target_page'] ) { ?>
                                                            <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                                                            <?php echo esc_html( $item['button_text'] ); ?>
                                                            </a><?php
                                                        } else { ?>
                                                            <a href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                                                            <?php echo esc_html( $item['button_text'] ); ?>
                                                            </a><?php
                                                        } ?>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if ( $item['button_text2'] != '' ) : ?>
                                                    <li>
                                                        <?php if ( 'yes' === $item['target_page2'] ) { ?>
                                                            <a target="_blank" href="<?php echo esc_url( $link_source2 ); ?>" class="default-btn color-two">
                                                            <?php echo esc_html( $item['button_text2'] ); ?>
                                                            </a><?php
                                                        } else { ?>
                                                            <a href="<?php echo esc_url( $link_source2 ); ?>" class="default-btn color-two">
                                                            <?php echo esc_html( $item['button_text2'] ); ?>
                                                            </a><?php
                                                        } ?>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="col-lg-7 col-md-12">
                                    <div class="new-main-banner-image" style="background-image: url(<?php echo esc_url( $item['image']['url']); ?> )"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                endif; ?>
			</div>

            <?php if( $settings['shape']['url'] != '' ) : ?>
			<div class="new-main-banner-shape">
				<img src="<?php echo esc_url( $settings['shape']['url'] ); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>">
			</div>
            <?php endif; ?>
		</section>
        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new BannerSeven );