<?php
namespace Elementor;
class Vaximo_TransformProgress extends Widget_Base {
    public function get_name(){
        return "Transform-Progress";
    }
    public function get_title(){
        return "Transform Progress";
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
        // Shape Image
        $this->add_control(
            'shape_img1',
            [
                'label'     => __('Upload Shape Image', 'vaximo-toolkit' ),
                'type'      => Controls_Manager::MEDIA,
                'condition' => [
                    'choose_style' => '1',
                ]
            ]
        );
        $this->add_control(
            'shape_img2',
            [
                'label'     => __('Upload Shape Image Two', 'vaximo-toolkit' ),
                'type'      => Controls_Manager::MEDIA,
                'condition' => [
                    'choose_style' => '1',
                ]
            ]
        );

        $this->add_control(
            'transform_text_alignment',
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
                'label'       => __( 'Title', 'vaximo-toolkit' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Transform Your Digital Workflow Be Productive Reduce Risk', 'vaximo-toolkit'),
            ]
        );
        $this->add_control(
            'heading_tag',
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
                'default' => __('Lorem ipsum dolor sit elit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse Workflow Be productive consectetur adipiscing elit, sed', 'vaximo-toolkit'),
            ]
        );

            $card_items = new Repeater();

            $card_items->add_control(
                'progress_title',
                [
                    'label'       => __('Title', 'vaximo-toolkit'),
                    'type'        => Controls_Manager:: TEXT,
                    'label_block' => true,
                ]
            );
            $card_items->add_control(
                'progress_percentage',
                [
                    'label'  => __('Progress Percentage', 'vaximo-toolkit'),
                    'type'   => Controls_Manager:: NUMBER,
                ]
            );
            $this->add_control(
                'progress_lists',
                [
                    'label'       => __( 'Add List', 'vaximo-toolkit' ),
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
                'label' => __('Style', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .transform-content h2, .transform-content h1, .transform-content h3, .transform-content h4, .transform-content h5, .transform-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .transform-content h2, .transform-content h1, .transform-content h3, .transform-content h4, .transform-content h5, .transform-content h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .transform-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .transform-content p',
                ]
            );
            $this->add_control(
                'card_title_color',
                [
                    'label'     => __( 'Progress Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .transform-content .skill-bar .progress-title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_card_title',
                    'label'    => __( 'Progress Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .transform-content .skill-bar .progress-title',
                ]
            );
            $this->add_control(
                'pro_percentage_color',
                [
                    'label'     => __( 'Progress Percentage Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .transform-content .skill-bar .percent' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_propercentage',
                    'label'    => __( 'Progress Percentage Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .transform-content .skill-bar .percent',
                ]
            );
        $this-> end_controls_section();
    }

    protected function render()
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display();

        // Text Alignment
        if( $settings['transform_text_alignment' ] == '1') {
            $alignment = 'text-center';
        } 
        elseif( $settings['transform_text_alignment' ] == '2') {
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

        $lists    = $settings['progress_lists']; ?>

        <?php if ( $settings['choose_style']  == '1' ) : ?>
            <section class="transform-area pb-100">
                <div class="container">
                    <div class="row">
                        <?php if( !empty( $settings['image']['url'] ) ){ ?>
                            <div class="col-lg-6 pr-0">
                                <div class="transform-img">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            </div>
                        <?php } ?>
                    
                        <?php if( $settings['image']['url'] != '' ) : ?>
                            <div class="col-lg-6 pl-0">
                        <?php else: ?>
                            <div class="col-lg-12 pl-0 fullwidth">
                        <?php endif; ?>
                            <div class="transform-content <?php echo esc_attr( $alignment); ?>">
                                <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                                <?php echo wp_kses_post( $settings['desc'] ); ?>

                                <?php if ( $lists != '' ) :
                                    foreach ( $lists as $item ) : ?>
                                        <div class="skill-bar" data-percentage="<?php echo esc_attr( $item['progress_percentage'] ); ?>%">
                                            <h4 class="progress-title-holder clearfix">
                                                <span class="progress-title"><?php echo esc_html( $item['progress_title'] ); ?></span>
                                                <span class="progress-number-wrapper">
                                                    <span class="progress-number-mark">
                                                        <span class="percent"></span>
                                                        <span class="down-arrow"></span>
                                                    </span>
                                                </span>
                                            </h4>

                                            <div class="progress-content-outter">
                                                <div class="progress-content"></div>
                                            </div>
                                        </div>
                                    <?php endforeach;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if( !empty( $settings['shape_img1']['url'] ) ){ ?>
                    <div class="shape-1">
                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['shape_img1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'vaximo-toolkit' ); ?>">
                    </div>
                <?php } ?>

                <?php if( !empty( $settings['shape_img2']['url'] ) ){ ?>
                    <div class="shape-2">
                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['shape_img2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'vaximo-toolkit' ); ?>">
                    </div>
                <?php } ?>
            </section>
        <?php else : ?>
            <section class="transform-area-five pb-100">
                <div class="container">
                    <div class="row">
                        <?php if( !empty( $settings['image']['url'] ) ){ ?>
                            <div class="col-lg-6">
                                <div class="transform-img" style="background-image: url(<?php echo esc_url( $settings['image']['url']); ?> )">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            </div>
                        <?php } ?>
                        
                        <?php if( $settings['image']['url'] != '' ) : ?>
                            <div class="col-lg-6">
                        <?php else: ?>
                            <div class="col-lg-12  fullwidth">
                        <?php endif; ?>
                            <div class="transform-content transform-content-five <?php echo esc_attr( $alignment); ?>">
                                <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                                <?php echo wp_kses_post( $settings['desc'] ); ?>

                                <?php if ( $lists != '' ) :
                                    foreach ( $lists as $item ) : ?>
                                        <div class="skill-bar" data-percentage="<?php echo esc_attr( $item['progress_percentage'] ); ?>%">
                                            <h4 class="progress-title-holder clearfix">
                                                <span class="progress-title"><?php echo esc_html( $item['progress_title'] ); ?></span>
                                                <span class="progress-number-wrapper">
                                                    <span class="progress-number-mark">
                                                        <span class="percent"></span>
                                                        <span class="down-arrow"></span>
                                                    </span>
                                                </span>
                                            </h4>

                                            <div class="progress-content-outter">
                                                <div class="progress-content"></div>
                                            </div>
                                        </div>
                                    <?php endforeach;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>


        <script>
            jQuery(document).ready(function() {

                <?php if ( vaximo_rtl() == true ) {
                    echo("jQuery('.skill-bar').each(function() {
                        jQuery(this).find('.progress-content').animate({
                        width:jQuery(this).attr('data-percentage')
                        },2000);
                        jQuery(this).find('.progress-number-mark').animate(
                        {right:jQuery(this).attr('data-percentage')},
                        {
                            duration: 2000,
                            step: function(now, fx) {
                            var data = Math.round(now);
                            jQuery(this).find('.percent').html(data + '%');
                            }
                        });
        
                    });");
                } else {
                    echo("jQuery('.skill-bar').each(function() {
                        jQuery(this).find('.progress-content').animate({
                        width:jQuery(this).attr('data-percentage')
                        },2000);
                        jQuery(this).find('.progress-number-mark').animate(
                        {left:jQuery(this).attr('data-percentage')},
                        {
                            duration: 2000,
                            step: function(now, fx) {
                            var data = Math.round(now);
                            jQuery(this).find('.percent').html(data + '%');
                            }
                        });
        
                    });");
                } ?>
            });
        </script>
        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new Vaximo_TransformProgress );