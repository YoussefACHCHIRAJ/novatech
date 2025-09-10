<?php
namespace Elementor;
class Vaximo_Operation_Area extends Widget_Base{
    public function get_name(){
        return "Operationarea";
    }
    public function get_title(){
        return "Operation Center";
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
                'label' => __('Section Content', 'vaximo-toolkit'),
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
                        '{{WRAPPER}} .operation-center-content h3, .operation-center-content h1, .operation-center-content h2, .operation-center-content h4, .operation-center-content h5, .operation-center-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .operation-center-content h3, .operation-center-content h1, .operation-center-content h2, .operation-center-content h4, .operation-center-content h5, .operation-center-content h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .operation-center-content p, .operation-center-content ul li, .operation-center-content ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .operation-center-content p, .operation-center-content ul li, .operation-center-content ol li',
                ]
            );
            // List
            $this->add_control(
                'list_color',
                [
                    'label'     => __( 'List Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .operation-center-content .operation-list li span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list',
                    'label'    => __( 'List Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .operation-center-content .operation-list li span',
                ]
            );
            $this->add_control(
                'list_bcolor',
                [
                    'label'     => __( 'List Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .operation-center-content .operation-list li span' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list_bgcolor',
                [
                    'label'     => __( 'List Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .operation-center-content .operation-list li' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'list_iconcolor',
                [
                    'label'     => __( 'List Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .operation-center-content .operation-list li span i' => 'color: {{VALUE}}',
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

        $lists    = $settings['security_content']; 
        ?>

        <?php if ( $settings['choose_style']  == '1' ) : ?>
            <div class="operation-center-area ptb-100">
                <div class="container">
                    <div class="row align-items-center">
                        <?php if ( 'left' == $settings['img_position'] ) { ?>
                            <?php if ( $settings['image']['url'] != '' ) { ?>
                            <div class="col-lg-6 col-md-12">
                                <div class="operation-center-image">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            </div>
                            <?php } ?>
                        <?php } ?>

                        <?php if( $settings['image']['url'] != '' ) : ?>
                            <div class="col-lg-6 col-md-12">
                        <?php else: ?>
                            <div class="col-lg-12 col-md-12 fullwidth">
                        <?php endif; ?>
                            <div class="operation-center-content">
                                <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
                                <p><?php echo wp_kses_post( $settings['desc'] ); ?></p>

                                <div class="row">
                                    <?php $i = 1; ?>
                                    <div class="col-lg-6 col-sm-6">
                                        <ul class="operation-list">
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
                                                        <span><i class="<?php echo esc_attr( $social_icon ); ?>"></i>
                                                        <?php echo esc_html( $item['list_title'] ); ?></span>
                                                    </li>
                                                    <?php
                                                endif;
                                                $i++;          
                                            endforeach; ?>
                                        </ul>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <ul class="operation-list">
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
                                                        <span><i class="<?php echo esc_attr( $social_icon ); ?>"></i>
                                                        <?php echo esc_html( $item['list_title'] ); ?></span>
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
                            <?php if ( $settings['image']['url'] != '' ) { ?>
                                <div class="col-lg-6 col-md-12">
                                    <div class="operation-center-image">
                                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php elseif ( $settings['choose_style']  == '2' ) : ?>
            <div class="operation-center-area pb-100">
                <div class="container">
                    <div class="row align-items-center">
                        <?php if ( 'left' == $settings['img_position'] ) { ?>
                            <?php if ( $settings['image']['url'] != '' ) { ?>
                            <div class="col-lg-6 col-md-12">
                                <div class="operation-center-image">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            </div>
                            <?php } ?>
                        <?php } ?>
                        <?php if( $settings['image']['url'] != '' ) : ?>
                            <div class="col-lg-6 col-md-12">
                        <?php else: ?>
                            <div class="col-lg-12 col-md-12 fullwidth">
                        <?php endif; ?>
                            <div class="operation-center-content white-color-content">
                                <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
                                <p><?php echo wp_kses_post( $settings['desc'] ); ?></p>

                                <div class="row">
                                    <?php $i = 1; ?>
                                    <div class="col-lg-6 col-sm-6">
                                        <ul class="operation-list">
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
                                                        <span><i class="<?php echo esc_attr( $social_icon ); ?>"></i>
                                                        <?php echo esc_html( $item['list_title'] ); ?></span>
                                                    </li>
                                                    <?php
                                                endif;
                                                $i++;          
                                            endforeach; ?>
                                        </ul>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <ul class="operation-list">
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
                                                        <span><i class="<?php echo esc_attr( $social_icon ); ?>"></i>
                                                        <?php echo esc_html( $item['list_title'] ); ?></span>
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
                            <?php if ( $settings['image']['url'] != '' ) { ?>
                                <div class="col-lg-6 col-md-12">
                                    <div class="operation-center-image">
                                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
    }
}
Plugin::instance()->widgets_manager->register( new Vaximo_Operation_Area );