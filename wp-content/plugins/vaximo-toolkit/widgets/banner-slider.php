<?php
namespace Elementor;
class BannerSlider extends Widget_Base{
    public function get_name(){
        return "banner_slider";
    }
    public function get_title(){
        return "Banner Slider";
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
                'title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
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

            // Video URL
            $card_items->add_control(
                'video_url',
                [
                    'label' => __('Video URL', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                ]
            );
            $card_items->add_control(
                'video_icon',
                [
                    'label' => __('Video Icon', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                    'default'     => 'bx bx-play',
                    'description' => __('You can use font-awesome, Box icon and Flat icon class name here. ex:bx bx-play','vaximo-toolkit'),
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

        // Slider Settings
        $this->start_controls_section(
            'slides_settings', [
                'label' => __( 'Slider Settings', 'vaximo-toolkit' ),
            ]
        );
            $this->add_control(
                'slide_loop',
                [
                    'label'   => __( 'Loop', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'true'  => __( 'True', 'vaximo-toolkit' ),
                        'false' => __( 'False', 'vaximo-toolkit' ),
                    ],
                    'default'   => 'true'
                ]
            );
            $this->add_control(
                'slide_nav',
                [
                    'label'   => __( 'Nav', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'true'  => __( 'True', 'vaximo-toolkit' ),
                        'false' => __( 'False', 'vaximo-toolkit' ),
                    ],
                    'default'   => 'true'
                ]
            );
            $this->add_control(
                'slide_autoplay',
                [
                    'label'   => __( 'Auto Play', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'true'  => __( 'True', 'vaximo-toolkit' ),
                        'false' => __( 'False', 'vaximo-toolkit' ),
                    ],
                    'default'   => 'true'
                ]
            );
        $this->end_controls_section();
        // End Slider Settings

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
                        '{{WRAPPER}} .hero-slider-area .slider-item .slider-text h1, .hero-slider-area .slider-item .slider-text h2, .hero-slider-area .slider-item .slider-text h3, .hero-slider-area .slider-item .slider-text h4, .hero-slider-area .slider-item .slider-text h5, .hero-slider-area .slider-item .slider-text h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .hero-slider-area .slider-item .slider-text h1, .hero-slider-area .slider-item .slider-text h2, .hero-slider-area .slider-item .slider-text h3, .hero-slider-area .slider-item .slider-text h4, .hero-slider-area .slider-item .slider-text h5, .hero-slider-area .slider-item .slider-text h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hero-slider-area .slider-item .slider-text p, .hero-slider-area .slider-item .slider-text ul li, .hero-slider-area .slider-item .slider-text ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), 
                [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .hero-slider-area .slider-item .slider-text p, .hero-slider-area .slider-item .slider-text ul li, .hero-slider-area .slider-item .slider-text ol li',
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
        
        $lists = $settings['slider_content']; 
        ?>
        <div class="hero-slider-area">
			<div class="hero-slider-wrap owl-carousel owl-theme">
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
                        <div class="slider-item slider-item-bg-1" style="background-image: url(<?php echo esc_url( $item['image']['url']); ?> )">
                            <div class="d-table">
                                <div class="d-table-cell">
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-lg-9">
                                                <div class="slider-text <?php if ( 'yes' === $settings['is_animation'] ) { ?> one <?php } ?> <?php echo esc_attr( $alignment); ?>">
                                                    <<?php echo esc_attr( $item['head_tag'] ); ?>> <?php echo esc_html( $item['title'] ); ?> </<?php echo esc_attr( $item['head_tag'] ); ?>>

                                                    <?php echo wp_kses_post( $item['content'] ); ?>
                
                                                    <div class="slider-btn">
                                                        <?php if ( $item['button_text'] != '' ) : ?>
                                                            <?php if ( 'yes' === $item['target_page'] ) { ?>
                                                                <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                                                                <?php echo esc_html( $item['button_text'] ); ?>
                                                                </a><?php
                                                            } else { ?>
                                                                <a href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                                                                <?php echo esc_html( $item['button_text'] ); ?>
                                                                </a><?php
                                                            } ?>
                                                        <?php endif; ?>

                                                        <?php if ( $item['button_text2'] != '' ) : ?>
                                                            <?php if ( 'yes' === $item['target_page2'] ) { ?>
                                                                <a target="_blank" href="<?php echo esc_url( $link_source2 ); ?>" class="default-btn active">
                                                                <?php echo esc_html( $item['button_text2'] ); ?>
                                                                </a><?php
                                                            } else { ?>
                                                                <a href="<?php echo esc_url( $link_source2 ); ?>" class="default-btn active">
                                                                <?php echo esc_html( $item['button_text2'] ); ?>
                                                                </a><?php
                                                            } ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-3">
                                                <?php if( $item['video_url'] != '') : ?>
                                                    <div class="video-btn-animat one">
                                                        <a href="<?php echo esc_url( $item['video_url'] ); ?>" class="video-btn popup-youtube">
                                                            <i class="<?php echo esc_attr( $item['video_icon'] ); ?>"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                endif; ?>
                
			</div>
        </div>

        <script>
            ;(function($){
                "use strict";
                $(document).ready(function () {
                    //  Hero Slider Wrap JS
                    $('.hero-slider-wrap').owlCarousel({
                        loop: <?php echo esc_js($settings['slide_loop']) ?>,
                        margin:0,
                        nav: <?php echo esc_js($settings['slide_nav']) ?>,
                        mouseDrag: true,
                        items:1,
                        dots: false,
                        autoHeight: true,
                        autoplay: <?php echo esc_js($settings['slide_autoplay']) ?>,
                        smartSpeed:800,
                        autoplayHoverPause: true,
                        navText: [
                            "<i class='bx bx-chevrons-left'></i>",
                            "<i class='bx bx-chevrons-right'></i>",
                        ],
                    });
                })
            })(jQuery)
        </script>
        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new BannerSlider );