<?php
namespace Elementor;
class Vaximo_SWArea extends Widget_Base{
    public function get_name(){
        return "safer_world_area";
    }
    public function get_title(){
        return "Safer World Area";
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
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title', [
                'label'       => __( 'Title', 'vaximo-toolkit' ),
                'type'        => Controls_Manager::TEXTAREA,
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
            'list_title',
            [
                'label' => __('Title', 'vaximo-toolkit'),
                'type'  => Controls_Manager:: TEXTAREA,
                'label_block' => true,
            ]
        );
        $card_items->add_control(
            'list_desc',
            [
                'label' => __('Description', 'vaximo-toolkit'),
                'type'  => Controls_Manager:: TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'safer_world_item',
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
            'button_text',
            [
                'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Know Details', 'vaximo-toolkit'),
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
                    'link_type'    => '1',
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
                ]
            ]
        );
        //Target Page
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
        $this-> end_controls_section();

        // Start style1 content controls
        $this-> start_controls_section(
            'content_style',
            [
                'label'     => __('Style', 'vaximo-toolkit'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .safer-world-content h2, .safer-world-content h1, .safer-world-content h3, .safer-world-content h4, .safer-world-content h5, .safer-world-content h6,  .safer-world-area-without-color.body-with-black-color .safer-world-content h3, .safer-world-area-without-color.body-with-black-color .safer-world-content h1, .safer-world-area-without-color.body-with-black-color .safer-world-content h2, .safer-world-area-without-color.body-with-black-color .safer-world-content h4, .safer-world-area-without-color.body-with-black-color .safer-world-content h5, .safer-world-area-without-color.body-with-black-color .safer-world-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .safer-world-content h2, .safer-world-content h1, .safer-world-content h3, .safer-world-content h4, .safer-world-content h5, .safer-world-content h6,  .safer-world-area-without-color.body-with-black-color .safer-world-content h3, .safer-world-area-without-color.body-with-black-color .safer-world-content h1, .safer-world-area-without-color.body-with-black-color .safer-world-content h2, .safer-world-area-without-color.body-with-black-color .safer-world-content h4, .safer-world-area-without-color.body-with-black-color .safer-world-content h5, .safer-world-area-without-color.body-with-black-color .safer-world-content h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .safer-world-content p, .safer-world-content ul li, .safer-world-content ol li, .safer-world-area-without-color.body-with-black-color .safer-world-content p, .safer-world-area-without-color.body-with-black-color .safer-world-content ul li, .safer-world-area-without-color.body-with-black-color .safer-world-content ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .safer-world-content p, .safer-world-content ul li, .safer-world-content ol li, .safer-world-area-without-color.body-with-black-color .safer-world-content p, .safer-world-area-without-color.body-with-black-color .safer-world-content ul li, .safer-world-area-without-color.body-with-black-color .safer-world-content ol li',
                ]
            );
            // List
            $this->add_control(
                'list_color',
                [
                    'label'     => __( 'List Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .safer-world-content .safer-world-inner-box h4, .safer-world-area-without-color.body-with-black-color .safer-world-content .safer-world-inner-box h4' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list',
                    'label'    => __( 'List Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .safer-world-content .safer-world-inner-box h4, .safer-world-area-without-color.body-with-black-color .safer-world-content .safer-world-inner-box h4',
                ]
            );
            $this->add_control(
                'list_concolor',
                [
                    'label'     => __( 'List Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .safer-world-content .safer-world-inner-box p, .safer-world-area-without-color.body-with-black-color .safer-world-content .safer-world-inner-box p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list_desc',
                    'label'    => __( 'List Description Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .safer-world-content .safer-world-inner-box p, .safer-world-area-without-color.body-with-black-color .safer-world-content .safer-world-inner-box p',
                ]
            );
            $this->add_control(
                'btncolor',
                [
                    'label'     => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .safer-world-content .safer-world-btn .default-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_btn',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .safer-world-content .safer-world-btn .default-btn',
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
                    'label'     => esc_html__( 'Button Background', 'cyarb-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_bg_color',
                    'types'    => ['gradient' ],
                    'selector' => '{{WRAPPER}} .safer-world-content .safer-world-btn .default-btn',
                ]
            );
            $this->add_control(
                'inner_div2',
                [
                    'type'      => Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'btnhcolor',
                [
                    'label'     => __( 'Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .safer-world-content .safer-world-btn .default-btn:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btnhbgcolor',
                [
                    'label'     => __( 'Button Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn::before, .default-btn::after' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
        $this-> end_controls_section();
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

        $lists    = $settings['safer_world_item'];
        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
        endif; ?>

			<div class="container">
				<div class="row align-items-center">
                    <?php if ( 'left' == $settings['img_position'] ) { ?>
                        <?php if( $settings['image']['url'] != ''){ ?>
                    	<div class="col-lg-6 col-md-12">
                            <div class="safer-world-image">
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url']); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>">
                            </div>
                        </div>
                    <?php } } ?>

                    <?php if( $settings['image']['url'] != '' ) : ?>
                        <div class="col-lg-6 col-md-12">
                    <?php else: ?>
                        <div class="col-lg-12 col-md-12 fullwidth">
                    <?php endif; ?>
						<div class="safer-world-content">
                            <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                            <p><?php echo wp_kses_post( $settings['desc'] ); ?></p>

							<div class="row justify-content-center">
                                <?php foreach ( $lists as $item ) : ?>
								<div class="col-lg-6 col-md-6">
									<div class="safer-world-inner-box">
										<h4><?php echo esc_html( $item['list_title'] ); ?></h4>
                                        
										<p><?php echo esc_html( $item['list_desc'] ); ?></p>
									</div>
								</div>
                                <?php endforeach; ?>
							</div>

                            <?php if ( $settings['button_text'] != '' ) : ?>
                                <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                    <div class="safer-world-btn">
                                        <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                                            <?php echo esc_html( $settings['button_text'] ); ?>
                                        </a>
                                    </div>
                                <?php } else { ?>
                                    <div class="safer-world-btn">
                                        <a href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                                            <?php echo esc_html( $settings['button_text'] ); ?>
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php endif; ?>
						</div>
					</div>

                    <?php if ( 'right' == $settings['img_position'] ) { 
                        if( $settings['image']['url'] != ''){ ?>
                            <div class="col-lg-6 col-md-12">
                                <div class="safer-world-image">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url']); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>">
                                </div>
                            </div>
                        <?php }
                    } ?>

				</div>
			</div>

        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new Vaximo_SWArea );