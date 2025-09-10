<?php
namespace Elementor;
class Vaximo_SecurityArea extends Widget_Base{
    public function get_name(){
        return "security-area";
    }
    public function get_title(){
        return "Cyber Security";
    }
    public function get_icon(){
        return "eicon-info-box";
    }
    public function get_categories(){
        return ['vaximocategory'];
    }

    protected function register_controls(){
        // Tab content controls
        $this-> start_controls_section(
            'section_content_cs',
            [
                'label' => __('Sec Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'choose_style',
            [
                'label' => __( 'Choose Style', 'vaximo-toolkit' ),
                'type'  => Controls_Manager::SELECT,
                'options' => [
                    '1'   => __( 'Style 1', 'vaximo-toolkit' ),
                    '2'   => __( 'Style 2', 'vaximo-toolkit' ),
                ],
                'default' => '1',
            ]
        );
        $this->add_control(
            'security_text_alignment',
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
            'title', [
                'label'       => __( 'Title', 'vaximo-toolkit' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'heading_tag', [
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
                'default'     => 'h2',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'desc', [
                'label'       => __( 'Description', 'vaximo-toolkit' ),
                'type'        => Controls_Manager::WYSIWYG,
                'label_block' => true,
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
        
        $card_items = new Repeater();

        $card_items->add_control(
            'icon_type',
            [
                'label'   => __( 'Icon Type', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'font-awesome' 	  => __( 'Font Awesome', 'vaximo-toolkit' ),
                    'bxicon' 		  => __( 'Box Icon', 'vaximo-toolkit' ),
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
                'default'       => __('bx bx-check', 'vaximo-toolkit'),
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
            'list_title',
            [
                'label' => __('Title', 'vaximo-toolkit'),
                'type'  => Controls_Manager:: TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'security_content',
            [
                'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $card_items->get_controls(),
            ]
        );
        
        $this->add_control(
            'img_position',
            [
                'label'       => __( 'Image Position', 'vaximo-toolkit' ),
                'type'        => Controls_Manager::SELECT,
                'label_block' => true,
                'options'     => [
                    'left'  => __( 'Left', 'cavie-toolkit' ),
                    'right' => __( 'Right', 'cavie-toolkit' ),
                ],
                'default'   => 'right',
            ]
        );
        $this->add_control(
            'image',
            [
                'label'     => __('Upload Image', 'vaximo-toolkit' ),
                'type'      => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'shape_image',
            [
                'label'     => __('Upload Shape Image', 'vaximo-toolkit' ),
                'type'      => Controls_Manager::MEDIA,
                'condition' => [
                    'choose_style' => '1'
                ]
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Know Details', 'vaximo-toolkit'),
                'condition'   => [
                    'choose_style' => '2',
                ]
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
                'condition'   => [
                    'choose_style' => '2',
                ]
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
                    'link_type'    => '1',
                    'choose_style' => '2',
                ]
            ]
        );
        $this->add_control(
            'external_link',
            [
                'label'     => __('External Link', 'vaximo-toolkit'),
                'type'      => Controls_Manager:: TEXT,
                'condition' => [
                    'link_type'    => '2',
                    'choose_style' => '2',
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
        $this-> end_controls_section();

        // End Tab content controls

        // Start style1 content controls
        $this-> start_controls_section(
            'content_style',
            [
                'label'     => __('Style', 'vaximo-toolkit'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'choose_style' => '1',
                ]
            ]
        );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cybersecurity-content h2, .cybersecurity-content h1, .cybersecurity-content h3, .cybersecurity-content h4, .cybersecurity-content h5, .cybersecurity-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .cybersecurity-content h2, .cybersecurity-content h1, .cybersecurity-content h3, .cybersecurity-content h4, .cybersecurity-content h5, .cybersecurity-content h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cybersecurity-content p, .cybersecurity-content ul li, .cybersecurity-content ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .cybersecurity-content p, .cybersecurity-content ul li, .cybersecurity-content ol li',
                ]
            );
            // List
            $this->add_control(
                'list_color',
                [
                    'label'     => __( 'List Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cybersecurity-content ul li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list',
                    'label'    => __( 'List Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .cybersecurity-content ul li',
                ]
            );
            $this->add_control(
                'list_bgcolor',
                [
                    'label'     => __( 'List Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cybersecurity-content ul li' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list_iconcolor',
                [
                    'label'     => __( 'List Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cybersecurity-content ul li i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list_iconhcolor',
                [
                    'label'     => __( 'List Icon Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cybersecurity-content ul li:hover i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list_iconbgcolor',
                [
                    'label'     => __( 'List Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cybersecurity-content ul li i' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list_iconhbgcolor',
                [
                    'label'     => __( 'List Icon Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cybersecurity-content ul li:hover i' => 'background: {{VALUE}}',
                    ],
                ]
            );
        $this-> end_controls_section();

        // Start Style2 content controls
        $this-> start_controls_section(
            'content_style_two',
            [
                'label'      => __('Style', 'vaximo-toolkit'),
                'tab'        => Controls_Manager::TAB_STYLE,
                'condition'  => [
                    'choose_style' => '2',
                ]
            ]
        );
            $this->add_control(
                'title2_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .manual-content h2, .manual-content h1, .manual-content h3, .manual-content h4, .manual-content h5, .manual-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title2',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .manual-content h2, .manual-content h1, .manual-content h3, .manual-content h4, .manual-content h5, .manual-content h6',
                ]
            );
            $this->add_control(
                'desc2_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .manual-content p, .manual-content ul li, .manual-content ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc2',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .manual-content p, .manual-content ul li, .manual-content ol li',
                ]
            );
            // List
            $this->add_control(
                'list2_color',
                [
                    'label'     => __( 'List Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .manual-content ul li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list2_hcolor',
                [
                    'label'     => __( 'List Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .manual-content ul li:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list2',
                    'label'    => __( 'List Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .manual-content ul li',
                ]
            );
            $this->add_control(
                'list2_bgcolor',
                [
                    'label'     => __( 'List Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .manual-content ul li' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list2_iconcolor',
                [
                    'label'     => __( 'List Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .manual-content ul li i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list2_iconhcolor',
                [
                    'label'     => __( 'List Icon Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .manual-content ul li:hover i' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'btn_onecolor', [
                    'label'     => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_onehcolor', [
                    'label'     => __( 'Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_onehbgcolor', [
                    'label'     => __( 'Button Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn::before, .default-btn::after' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
        $this-> end_controls_section();
    }

    protected function render()
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display();

        // Text Alignment
        if( $settings['security_text_alignment' ] == '1') {
            $alignment = 'text-center';
        } 
        elseif( $settings['security_text_alignment' ] == '2') {
            $alignment = 'text-right';
        } else {
            $alignment = 'text-left';
        }

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

        $lists    = $settings['security_content']; 
        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
        endif; ?>

        <?php if ( $settings['choose_style'] == '1' ) : ?>
            <div class="cybersecurity-area pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <?php if ( 'left' == $settings['img_position'] ) { ?>
                            <?php if ( $settings['image']['url']  != '' ) { ?>
                                <div class="col-lg-6 pl-0">
                                    <div class="cybersecurity-img bg-2" style="background-image: url(<?php echo esc_url( $settings['image']['url']); ?> )"></div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                            <?php if( $settings['image']['url'] != '' ) : ?>
                                <div class="col-lg-6">
                            <?php else: ?>
                                <div class="col-lg-12 fullwidth">
                            <?php endif; ?>
                                <div class="cybersecurity-content <?php echo esc_attr( $alignment); ?>">
                                    <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                                    <?php echo wp_kses_post( $settings['desc'] ); ?>

                                    <div class="row">
                                        <?php $i = 1; ?>
                                        <div class="col-lg-6 col-sm-6">
                                            <ul class="cybersecurity-item">
                                                <?php foreach ( $lists as $item ) :

                                                    // Social Icon
                                                    $social_icon = '';
                                                    if( $item['icon_type'] == 'bxicon' ):
                                                        $social_icon = $item['social_bx_icon'];
                                                    else:
                                                        $social_icon = $item['social_fa_icon'];
                                                    endif;
                                                    if ( $i % 2 != 0 ) : ?>
                                                        <li>
                                                            <i class="<?php echo esc_attr( $social_icon ); ?>"></i>
                                                            <?php echo esc_html( $item['list_title'] ); ?>
                                                        </li>
                                                        <?php
                                                    endif;
                                                    $i++;          
                                                endforeach; ?>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <ul>
                                                <?php $i = 1;
                                                    foreach ( $lists as $item ) :
                                                        // Social Icon
                                                        $social_icon = '';
                                                        if( $item['icon_type'] == 'bxicon' ):
                                                            $social_icon = $item['social_bx_icon'];
                                                        else:
                                                            $social_icon = $item['social_fa_icon'];
                                                        endif;
                                                        if ( $i % 2 == 0 ) : ?>
                                                        <li>
                                                            <i class="<?php echo esc_attr( $social_icon ); ?>"></i>
                                                            <?php echo esc_html( $item['list_title'] ); ?>
                                                        </li>
                                                        <?php
                                                    endif;
                                                    $i++;          
                                                endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php if ( 'right' == $settings['img_position'] ) { ?>
                            <?php if ( $settings['image']['url']  != '' ) { ?>
                                <div class="col-lg-6 pr-0">
                                    <div class="cybersecurity-img" style="background-image: url(<?php echo esc_url( $settings['image']['url']); ?> )"></div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <?php if ( !empty( $settings['shape_image']['url'] ) ) { ?>
                    <div class="cybersecurity-shape">
                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['shape_image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'vaximo-toolkit' ); ?>">
                    </div>
                <?php } ?>
            </div>
        <?php else : ?>
            <div class="container">
                <div class="row align-items-center">
                    <?php if ( 'left' == $settings['img_position'] ) { ?>
                        <?php if ( $settings['image']['url']  != '' ) { ?>
                            <div class="col-lg-6">
                                <div class="manual-img">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <?php if( $settings['image']['url'] != '' ) : ?>
                        <div class="col-lg-6">
                    <?php else: ?>
                        <div class="col-lg-12 fullwidth">
                    <?php endif; ?>
                        <div class="manual-content mr-auto ml-0 <?php echo esc_attr( $alignment); ?>">
                            <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                            <?php echo wp_kses_post( $settings['desc'] ); ?>

                            <div class="row">
                                <?php $i = 1; ?>
                                <div class="col-lg-6 col-sm-6">
                                    <ul class="cybersecurity-item">
                                        <?php foreach ( $lists as $item ) :
                                            // Social Icon
                                            $social_icon = '';
                                            if( $item['icon_type'] == 'bxicon' ):
                                                $social_icon = $item['social_bx_icon'];
                                            else:
                                                $social_icon = $item['social_fa_icon'];
                                            endif;
                                            if ( $i % 2 != 0 ) : ?>
                                                <li>
                                                    <i class="<?php echo esc_attr( $social_icon ); ?>"></i>
                                                    <?php echo esc_html( $item['list_title'] ); ?>
                                                </li>
                                                <?php
                                            endif;
                                            $i++;          
                                        endforeach; ?>
                                    </ul>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <ul>
                                        <?php $i = 1;
                                            foreach ( $lists as $item ) :
                                                // Social Icon
                                                $social_icon = '';
                                                if( $item['icon_type'] == 'bxicon' ):
                                                    $social_icon = $item['social_bx_icon'];
                                                else:
                                                    $social_icon = $item['social_fa_icon'];
                                                endif;
                                                if ( $i % 2 == 0 ) : ?>
                                                <li>
                                                    <i class="<?php echo esc_attr( $social_icon ); ?>"></i>
                                                    <?php echo esc_html( $item['list_title'] ); ?>
                                                </li>
                                                <?php
                                            endif;
                                            $i++;          
                                        endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <?php if ( $settings['button_text'] != '' ) : ?>
                                <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                    <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="default-btn mt-30">
                                    <?php echo esc_html( $settings['button_text'] ); ?>
                                    </a><?php
                                } else { ?>
                                    <a href="<?php echo esc_url( $link_source ); ?>" class="default-btn mt-30">
                                    <?php echo esc_html( $settings['button_text'] ); ?>
                                    </a><?php
                                } ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if ( 'right' == $settings['img_position'] ) { ?>
                        <?php if ( $settings['image']['url']  != '' ) { ?>
                            <div class="col-lg-6">
                                <div class="manual-img">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new Vaximo_SecurityArea );