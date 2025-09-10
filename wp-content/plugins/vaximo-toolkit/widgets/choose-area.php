<?php
namespace Elementor;
class Vaximo_ChooseArea extends Widget_Base{
    public function get_name(){
        return "Choose_Area";
    }
    public function get_title(){
        return "Choose Area";
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
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
            $this->add_control(
                'choose_style',
                [
                    'label' => __( 'Choose Style', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => __( 'Style one', 'vaximo-toolkit' ),
                        '2'   => __( 'Style two', 'vaximo-toolkit' ),
                    ],
                    'default' => '1',
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
                'choose_text_alignment',
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
                'desc', 
                [
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
                    'list_check_icon',
                    [
                        'label' => __( 'Icon', 'vaximo-toolkit' ),
                        'type' 	=> Controls_Manager::TEXT,
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
                    'lists_content',
                    [
                        'label'       => __( 'Add List', 'vaximo-toolkit' ),
                        'type'        => Controls_Manager::REPEATER,
                        'fields'      => $card_items->get_controls(),
                    ]
                );
            
            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('View More', 'vaximo-toolkit'),
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
            ]
        );
            $this->add_control(
                'sec_bg_color',
                [
                    'label'     => __( 'Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-area-four' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'choose_style'    => '2',
                    ]
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-wrap h2, .choose-wrap h1, .choose-wrap h3, .choose-wrap h4, .choose-wrap h5, .choose-wrap h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .choose-wrap h2, .choose-wrap h1, .choose-wrap h3, .choose-wrap h4, .choose-wrap h5, .choose-wrap h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-wrap p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .choose-wrap p',
                ]
            );
            // List
            $this->add_control(
                'list_color',
                [
                    'label'     => __( 'List Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-wrap ul li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list',
                    'label'    => __( 'List Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .choose-wrap ul li',
                ]
            );
            $this->add_control(
                'card_bg_color',
                [
                    'label'     => __( 'Card Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-wrap' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list_icolor',
                [
                    'label'     => __( 'List Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-wrap ul li i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list_ibgcolor',
                [
                    'label'     => __( 'List Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-wrap ul li i' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list_ihcolor',
                [
                    'label'     => __( 'List Icon Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-wrap ul li:hover i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list_ihbgcolor',
                [
                    'label'     => __( 'List Icon Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-wrap ul li:hover i' => 'background-color: {{VALUE}}',
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
        if( $settings['choose_text_alignment' ] == '1') {
            $alignment = 'text-center';
        } 
        elseif( $settings['choose_text_alignment' ] == '2') {
            $alignment = 'text-right';
        } else {
            $alignment = 'text-left';
        }

        $lists    = $settings['lists_content']; 
        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
        endif; ?>

        <?php if ( $settings['choose_style'] == '1' ) : ?>
            <section class="choose-area ptb-100" style="background-image: url(<?php echo esc_url( $settings['image']['url']); ?> )">
                <div class="container">
                    <div class="choose-wrap <?php echo esc_attr( $alignment); ?>">
                        <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                        <?php echo wp_kses_post( $settings['desc'] ); ?>

                        <ul>
                            <?php foreach ( $lists as $item ) : ?>
                                <li>
                                    <i class="<?php echo esc_attr( $item['list_check_icon'] ); ?>"></i>
                                    <?php echo esc_html( $item['list_title'] ); ?>
                                </li>
                                <?php         
                            endforeach; ?>
                        </ul>
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
            </section>
        <?php else : ?>
            <section class="choose-area-four ptb-100">
                <div class="container">
                    <div class="row align-items-center">
                        
                        <?php if( !empty( $settings['image']['url'] ) ){ ?>
                            <div class="col-lg-6">
                                <div class="choose-img">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            </div>
                        <?php } ?>

                        <?php if( $settings['image']['url'] != '' ) : ?>
                            <div class="col-lg-6 ">
                        <?php else: ?>
                            <div class="col-lg-12 fullwidth">
                        <?php endif; ?>
                            <div class="choose-wrap p-0 <?php echo esc_attr( $alignment); ?>">
                                <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                                <?php echo wp_kses_post( $settings['desc'] ); ?>

                                <ul>
                                    <?php foreach ( $lists as $item ) : ?>
                                        <li>
                                            <i class="<?php echo esc_attr( $item['list_check_icon'] ); ?>"></i>
                                            <?php echo esc_html( $item['list_title'] ); ?>
                                        </li>
                                        <?php         
                                    endforeach; ?>
                                </ul>
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
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new Vaximo_ChooseArea );