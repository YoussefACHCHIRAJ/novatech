<?php
namespace Elementor;
class BannerNine extends Widget_Base{
    public function get_name(){
        return "banner_nine";
    }
    public function get_title(){
        return "Banner Nine";
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
                'label'  => __( 'Banner Image', 'vaximo-toolkit' ),
                'type'   => Controls_Manager::MEDIA,
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
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __( 'Cyber Security & IT Management', 'vaximo-toolkit' ),
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
                'label'   => __( 'Description', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::WYSIWYG,
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'vaximo-toolkit' ),
            ]
        );
        $this->add_control(
            'desc_note1',
            [
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
        $this->add_control(
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
                'label'       => __('External Link', 'vaximo-toolkit'),
                'type'        => Controls_Manager:: TEXT,
                'condition'   => [
                    'link_type2' => '2',
                ]
            ]
        );
        $this->add_control(
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
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-black-content h1, .new-main-banner-black-content h2, .new-main-banner-black-content h3, .new-main-banner-black-content h4, .new-main-banner-black-content h5, .new-main-banner-black-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .new-main-banner-black-content h1, .new-main-banner-black-content h2, .new-main-banner-black-content h3, .new-main-banner-black-content h4, .new-main-banner-black-content h5, .new-main-banner-black-content h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-black-content p,  .new-main-banner-black-content ul li, .new-main-banner-black-content ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), 
                [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .new-main-banner-black-content p,  .new-main-banner-black-content ul li, .new-main-banner-black-content ol li',
                ]
            );

            // Button One
            $this->add_control(
                'btn1_color',
                [
                    'label'     => __( 'Button One Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-black-content .banner-btn li .default-btn' => 'color: {{VALUE}}',
                    ],
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
                    'label'     => esc_html__( 'Button One Background', 'cyarb-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'     => 'btn1bg_color',
                    'types'    => ['gradient' ],
                    'selector' => '{{WRAPPER}} .new-main-banner-black-content .banner-btn li .default-btn',
                ]
            );
            $this->add_control(
                'inner_div2',
                [
                    'type'      => Controls_Manager::DIVIDER,
                ]
            ); 
            $this->add_control(
                'btn1_hcolor',
                [
                    'label'     => __( 'Button One Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-black-content .banner-btn li .default-btn:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn1_hbgcolor',
                [
                    'label'     => __( 'Button One Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-black-content .banner-btn li .default-btn::before, .new-main-banner-black-content .banner-btn li .default-btn::after' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), 
                [
                    'name'     => 'typography_btn1',
                    'label'    => __( 'Button One Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .new-main-banner-black-content .banner-btn li .default-btn',
                ]
            );

            // Button Two
            $this->add_control(
                'btn2_color',
                [
                    'label'     => __( 'Button Two Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-black-content .banner-btn li .default-btn.color-two' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn2borderolor',
                [
                    'label'     => __( 'Button Two Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .new-main-banner-black-content .banner-btn li .default-btn.color-two' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn2_bgcolor',
                [
                    'label'     => __( 'Button Two Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-black-content .banner-btn li .default-btn.color-two' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn2_hcolor',
                [
                    'label'     => __( 'Button Two Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-black-content .banner-btn li .default-btn.color-two:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn2_hbgcolor',
                [
                    'label'     => __( 'Button Two Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .new-main-banner-black-content .banner-btn li .default-btn.color-two::before, .new-main-banner-black-content .banner-btn li .default-btn.color-two::after' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), 
                [
                    'name'     => 'typography_btn2',
                    'label'    => __( 'Button Two Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .new-main-banner-black-content .banner-btn li .default-btn.color-two',
                ]
            );
            
        $this-> end_controls_section();
    }

    protected function render()
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display();

        // Text Alignment
        if( $settings['banner_text_alignment' ] == '1') {
            $alignment = 'text-center';
        }elseif( $settings['banner_text_alignment' ] == '2') {
            $alignment = 'text-right';
        }else {
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
        endif; 
        ?>
        <section class="new-main-banner-area-with-black-color">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-lg-6 col-md-12">
						<div class="new-main-banner-black-content <?php echo $alignment; ?>">
                            <<?php echo esc_attr( $settings['head_tag'] ); ?> <?php if ( 'yes' === $settings['is_animation'] ) { ?> class="wow fadeInLeft" data-wow-delay="1s" <?php } ?> > <?php echo esc_html( $settings['title'] ); ?> </<?php echo esc_attr( $settings['head_tag'] ); ?>>

                            <p <?php if ( 'yes' === $settings['is_animation'] ) { ?> class="wow fadeInRight" data-wow-delay="1s" <?php } ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                            <?php if ( $settings['button_text'] != '' || $settings['button_text2'] != '' ) : ?>
                                <ul class="banner-btn <?php if ( 'yes' === $settings['is_animation'] ) { ?> wow fadeInUp <?php } ?>" data-wow-delay="1s">
                                    <?php if ( $settings['button_text'] != '' ) : ?>
                                        <li>
                                            <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                                <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                                                <?php echo esc_html( $settings['button_text'] ); ?>
                                                </a><?php
                                            } else { ?>
                                                <a href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                                                <?php echo esc_html( $settings['button_text'] ); ?>
                                                </a><?php
                                            } ?>
                                        </li>
                                    <?php endif; ?>

                                    <?php if ( $settings['button_text2'] != '' ) : ?>
                                        <li>
                                            <?php if ( 'yes' === $settings['target_page2'] ) { ?>
                                                <a target="_blank" href="<?php echo esc_url( $link_source2 ); ?>" class="default-btn color-two">
                                                <?php echo esc_html( $settings['button_text2'] ); ?>
                                                </a><?php
                                            } else { ?>
                                                <a href="<?php echo esc_url( $link_source2 ); ?>" class="default-btn color-two">
                                                <?php echo esc_html( $settings['button_text2'] ); ?>
                                                </a><?php
                                            } ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>
						</div>
					</div>

                    <?php if( $settings['image']['url'] != '') : ?>
					<div class="col-lg-6 col-md-12">
						<div class="new-main-banner-black-image">
							<img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>">
						</div>
					</div>
                    <?php endif; ?>
				</div>
			</div>
		</section>
        <?php
    }  
}
Plugin::instance()->widgets_manager->register( new BannerNine );