<?php
namespace Elementor;
class Vaximo_SecurityApproach extends Widget_Base{
    public function get_name(){
        return "security-approach";
    }
    public function get_title(){
        return "Security Approach";
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
            'section_content',
            [
                'label'=>esc_html__('Content', 'vaximo-toolkit'),
                'tab'=> Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'choose_style',
            [
                'label' => __( 'Choose Style', 'vaximo-toolkit' ),
                'type'  => Controls_Manager::SELECT,
                'options' => [
                    '1'   => __( 'Style One', 'vaximo-toolkit' ),
                    '2'   => __( 'Style Two', 'vaximo-toolkit' ),
                ],
                'default' => '1',
            ]
        );
        $this->add_control(
            'image',
            [
                'label'     => __('Upload Image One', 'vaximo-toolkit' ),
                'type'      => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'image_shape',
            [
                'label'     => __('Upload Shape Image', 'vaximo-toolkit' ),
                'type'      => Controls_Manager::MEDIA,
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
                'label' => __( 'Title', 'vaximo-toolkit' ),
                'type'  => Controls_Manager::TEXT,
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
                'label' => __( 'Description', 'vaximo-toolkit' ),
                'type'  => Controls_Manager::WYSIWYG,
                'label_block' => true,
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
                'default' => '4',
            ]
        );
        $card_items = new Repeater();

        $card_items->add_control(
            'icon_type',
            [
                'label' => __( 'Icon Type', 'vaximo-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'font-awesome' 	=> __( 'Font Awesome', 'vaximo-toolkit' ),
                    'flaticon' 		=> __( 'Flaticon', 'vaximo-toolkit' ),
                ],
                'default' => 'flaticon',
            ]
        );
        $card_items->add_control(
            'card_flat_icon',
            [
                'label' => __( 'Card Icon', 'vaximo-toolkit' ),
                'type' 	=> Controls_Manager::ICON,
                'options'    => vaximo_flaticons(),
                'include'    => vaximo_include_flaticons(),
                'condition' => [
                    'icon_type' => 'flaticon'
                ]
            ]
        );
        $card_items->add_control(
            'card_fa_icon',
            [
                'label' => __( 'Card Icon', 'vaximo-toolkit' ),
                'type' 	=> Controls_Manager::ICON,
                'condition' => [
                    'icon_type' => 'font-awesome'
                ]
            ]
        );
        $card_items->add_control(
            'card_title',
            [
                'label' => __('Title', 'vaximo-toolkit'),
                'type'  => Controls_Manager:: TEXT,
                'label_block' => true,
            ]
        );
        $card_items->add_control(
            'header_size',
            [
                'label' => __('Title Heading Tag', 'vaximo-toolkit'),
                'type' => Controls_Manager::SELECT,
                    'options' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                    ],
                'default'     => 'h3',
                'label_block' => true,
            ]
        );
        $card_items->add_control(
            'card_desc',
            [
                'label'  => __('Description', 'vaximo-toolkit'),
                'type' => Controls_Manager::WYSIWYG,
            ]
        );
        $this->add_control(
            'approach_content',
            [
                'label'       => __( 'Add Card Content', 'vaximo-toolkit' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $card_items->get_controls(),
            ]
        );
        $this-> end_controls_section();

        // End Tab content controls

        // Start style1 content controls
        $this-> start_controls_section(
            'content_style',
            [
                'label'     => esc_html__('Card Style', 'vaximo-toolkit'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'choose_style' => '1',
                ]
            ]
        );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .approach-content h2, .approach-content h1, .approach-content h3, .approach-content h4, .approach-content h5, .approach-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .approach-content h2, .approach-content h1, .approach-content h3, .approach-content h4, .approach-content h5, .approach-content h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => esc_html__( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .approach-content p, .approach-content ul li, .approach-content ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .approach-content p, .approach-content ul li, .approach-content ol li',
                ]
            );
            $this->add_control(
                'card_title_color',
                [
                    'label'     => esc_html__( 'Card Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .approach-content ul li h3, .approach-content ul li h1, .approach-content ul li h2, .approach-content ul li h4, .approach-content ul li h5, .approach-content ul li h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_card_title',
                    'label' => __( 'Card Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .approach-content ul li h3, .approach-content ul li h1, .approach-content ul li h2, .approach-content ul li h4, .approach-content ul li h5, .approach-content ul li h6',
                ]
            );
            $this->add_control(
                'card_desc_color',
                [
                    'label' => esc_html__( 'Card Description Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .approach-content ul li p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_carddesc',
                    'label' => __( 'Card Description Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .approach-content ul li p',
                ]
            );
            $this->add_control(
                'card_bg_color',
                [
                    'label' => esc_html__( 'Card Background Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .approach-content ul li' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_hbg_color',
                [
                    'label' => esc_html__( 'Card Hover Background Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .approach-content ul li:hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_hicon_color',
                [
                    'label' => esc_html__( 'Card Hover Icon Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .approach-content ul li:hover i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_hti_color',
                [
                    'label' => esc_html__( 'Card Hover Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .approach-content ul li:hover h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_hdesc_color',
                [
                    'label' => esc_html__( 'Card Hover Description Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .approach-content ul li:hover p' => 'color: {{VALUE}}',
                    ],
                ]
            );
        $this-> end_controls_section();

        // Style Two
        $this-> start_controls_section(
            'content_style2',
            [
                'label'=>esc_html__('Card Style', 'vaximo-toolkit'),
                'tab'=> Controls_Manager::TAB_STYLE,
                'condition' => [
                    'choose_style' => '2',
                ]
            ]
        );
            $this->add_control(
                'title_color2',
                [
                    'label' => esc_html__( 'Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title h2, .section-title h1, .section-title h3, .section-title h4, .section-title h5, .section-title h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_title2',
                    'label' => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .section-title h2, .section-title h1, .section-title h3, .section-title h4, .section-title h5, .section-title h6',
                ]
            );
            $this->add_control(
                'desc_color2',
                [
                    'label' => esc_html__( 'Description Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title p, .section-title ul li, .section-title ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_desc2',
                    'label' => __( 'Description Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .section-title p, .section-title ul li, .section-title ol li',
                ]
            );
            $this->add_control(
                'card_title_color2',
                [
                    'label' => esc_html__( 'Card Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-security h3, .single-security h1, .single-security h2, .single-security h4, .single-security h5, .single-security h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_card_title2',
                    'label' => __( 'Card Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .single-security h3, .single-security h1, .single-security h2, .single-security h4, .single-security h5, .single-security h6',
                ]
            );
            $this->add_control(
                'card_desc_color2',
                [
                    'label' => esc_html__( 'Card Description Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-security p, .single-security ul li, .single-security ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_carddesc2',
                    'label' => __( 'Card Description Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .single-security p, .single-security ul li, .single-security ol li',
                ]
            );
            $this->add_control(
                'card_bg_color2',
                [
                    'label' => esc_html__( 'Card Background Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-security' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_icon_color2',
                [
                    'label' => esc_html__( 'Card Icon Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-security i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_icon_hcolor2',
                [
                    'label' => esc_html__( 'Card Icon Hover Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-security:hover i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_icon_hbgcolor2',
                [
                    'label' => esc_html__( 'Card Icon Hover Background', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-security:hover i' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_htitlecolor2',
                [
                    'label' => esc_html__( 'Card Hover Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-security:hover h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_hdesccolor2',
                [
                    'label' => esc_html__( 'Card Hover Description Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-security:hover p' => 'color: {{VALUE}}',
                    ],
                ]
            );
        $this-> end_controls_section();
    }

    protected function render()
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display();

        // Card Columns
        $columns = $settings['columns'];
        if ( $columns == '2' ) {
            $column = 'col-lg-6 col-sm-6';
        } elseif ( $columns == '3' ) {
            $column = 'col-lg-4 col-sm-6';
        } elseif ( $columns == '4' ) {
            $column = 'col-lg-3 col-sm-6';
        } else {
            $column = 'col-lg-4 col-sm-6';
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

        // Text Alignment
        if( $settings['security_text_alignment' ] == '1') {
            $alignment = 'text-center';
        } 
        elseif( $settings['security_text_alignment' ] == '2') {
            $alignment = 'text-right';
        } else {
            $alignment = 'text-left';
        }

        $lists    = $settings['approach_content']; ?>

        <?php if ( $settings['choose_style']  == '1' ) : ?>
        <div class="approach-area">
			<div class="container">
				<div class="row align-items-center">
                    <?php if( !empty( $settings['image']['url'] ) ){ ?>
                        <div class="col-lg-6">
                            <div class="approach-img">
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                            </div> 
                        </div>
                    <?php } ?>

                    <?php if( $settings['image']['url'] != '' ) : ?>
                        <div class="col-lg-6">
                    <?php else: ?>
                        <div class="col-lg-12 fullwidth">
                    <?php endif; ?>
						<div class="approach-content <?php echo esc_attr( $alignment); ?>">
                            <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                            <?php echo wp_kses_post( $settings['desc'] ); ?>

							<ul>
                                <?php if ( $lists != '' ) :
                                    foreach ( $lists as $item ) :
                                        // Card Icon
                                        $card_icon = '';
                                        if( $item['icon_type'] == 'flaticon' ):
                                            $card_icon = $item['card_flat_icon'];
                                        else:
                                            $card_icon = $item['card_fa_icon'];
                                        endif;
                                    ?>
                                    <li>
                                        <?php if( !empty( $card_icon ) ) { ?>
                                            <i class="<?php echo esc_attr( $card_icon ); ?>"></i>
                                        <?php } ?>

                                        <<?php echo esc_attr( $item['header_size'] ); ?>><?php echo esc_html( $item['card_title'] ); ?></<?php echo esc_attr( $item['header_size'] ); ?>>

                                        <p><?php echo wp_kses_post( $item['card_desc'] ); ?></p>
                                    </li>
                                    <?php endforeach;
                                endif; ?>
							</ul>
						</div>
                    </div>
				</div>
            </div>
            <?php if ( !empty( $settings['image_shape']['url'] ) ) { ?>
                <div class="approach-shape">
                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image_shape']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'vaximo-toolkit' ); ?>">
                </div>
            <?php } ?>
        </div>
        <?php else : ?>
            <div class="complete-area style pt-100 pb-70">
                <div class="container">
                    <div class="section-title">
                        <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                        <?php echo wp_kses_post( $settings['desc'] ); ?>
                    </div>

                    <div class="row">
                        <?php if ( $lists != '' ) :
                            $loop = 1;
                            foreach ( $lists as $item ) :
                                // Card Icon
                                $card_icon = '';
                                if( $item['icon_type'] == 'flaticon' ):
                                    $card_icon = $item['card_flat_icon'];
                                else:
                                    $card_icon = $item['card_fa_icon'];
                                endif;
                            ?>
                            <div class="<?php echo esc_attr( $column ); ?>">
                                <div class="single-security <?php echo esc_attr( $alignment); ?>">
                                    <?php if( !empty( $card_icon ) ) { ?>
                                        <i class="<?php echo esc_attr( $card_icon ); ?>"></i>
                                    <?php } ?>

                                    <<?php echo esc_attr( $item['header_size'] ); ?>><?php echo esc_html( $item['card_title'] ); ?></<?php echo esc_attr( $item['header_size'] ); ?>>

                                    <p><?php echo wp_kses_post( $item['card_desc'] ); ?></p>
                                </div>
                            </div>
                            <?php $loop++; endforeach;
                        endif; ?>
                    </div>
                </div>

                <?php if ( !empty( $settings['image_shape']['url'] ) ) { ?>
                    <div class="complete-shape">
                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image_shape']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'vaximo-toolkit' ); ?>">
                    </div>
                <?php } ?>

                <?php if ( !empty( $settings['image']['url'] ) ) { ?>
                    <div class="complete-shape-2">
                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'vaximo-toolkit' ); ?>">
                    </div>
                <?php } ?>
            </div>
        <?php endif; ?>
        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new Vaximo_SecurityApproach );