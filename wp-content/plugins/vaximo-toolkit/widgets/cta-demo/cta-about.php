<?php
/**
 * About Inner items Widget
 */

namespace Elementor;
class Vaximo_CTA_About extends Widget_Base {

	public function get_name() {
        return 'CTA_About';
    }

	public function get_title() {
        return __( 'Cyber Training & Awareness About', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-help-o';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_CTA',
			[
				'label' => __( 'About Us Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'top_title_op',
                [
                    'label' => __( 'Choose Top Title Option', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'     => __( 'Top Title With Images', 'vaximo-toolkit' ),
                        '2'     => __( 'Only Top Title', 'vaximo-toolkit' ),
                    ],
                    'default' => '1'
                ]
            );

            $this->add_control(
                'top_img',
                [
                    'label'     => __('Top Tile Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                    'condition' => [
                        'top_title_op' => '1',
                    ],
                ]
            );

            $this->add_control(
                'top_title',
                [
                    'label'   => __( 'Top Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'About Vaximo', 'vaximo-toolkit' ),
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
                'sec_title',
                [
                    'label'   => __( ' Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( '<strong>Educate</strong> and <strong>motivate</strong> your people so they can become part of your security solution', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'content',
                [
                    'label'   => __( 'Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'Security awareness training alone is not enough. To drive behavior change and build a security-minded culture.', 'vaximo-toolkit' ),
                ]
            );
        
            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('More About Us', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'button_icon',
                [
                    'label'   => __( 'Button Icon', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('bx bx-right-arrow-alt', 'vaximo-toolkit'),
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

            $repeater = new Repeater();
            
                $repeater->add_control(
                    'text_title', [
                        'type'    => Controls_Manager::TEXT,
                        'label'   => esc_html__( 'Text Slider Title', 'vaximo-toolkit' ),
                        'default' => esc_html__( 'Best Car Detailing And Get A New Car * Best Car Detailing And Get A New Car', 'vaximo-toolkit' ),
                    ]
                );

            $this->add_control(
                'text_slider',
                [
                    'label'   => esc_html__( 'Add Text Slide', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );

            $this->add_control(
                'f_img1',
                [
                    'label'     => __('Feature Images One', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'f_img2',
                [
                    'label'     => __('Feature Images Two', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'circle_img',
                [
                    'label'     => __('Circle Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'cta_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'toptitle_heading',
                [
                    'label' => esc_html__( 'Top Title Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'toptitle_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .cta-about-content .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-about-content .sub span',
                ]
            );
            

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-about-content h2, {{WRAPPER}} .cta-about-content h3, {{WRAPPER}} .cta-about-content h1, {{WRAPPER}} .cta-about-content h4, {{WRAPPER}} .cta-about-content h5, {{WRAPPER}} .cta-about-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .cta-about-content h2, {{WRAPPER}} .cta-about-content h3, {{WRAPPER}} .cta-about-content h1, {{WRAPPER}} .cta-about-content h4, {{WRAPPER}} .cta-about-content h5, {{WRAPPER}} .cta-about-content h6',
                ]
            );
            
            $this->add_control(
                'content_color',
                [
                    'label'     => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-about-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_content',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-about-content p',
                ]
            );

            $this->add_control(
                'btn_onecolor', [
                    'label'     => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-default-btn' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_control(
                'btn_onehcolor', [
                    'label'     => __( 'Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-default-btn:hover' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_control(
                'btn_one_heading',
                [
                    'label' => esc_html__( 'Button Background Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'btn_one_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-default-btn',
                ]
            );

            $this->add_control(
                'btn_one_h_heading',
                [
                    'label' => esc_html__( 'Button Hover Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'btn_one_h_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-default-btn::before, .gcd-default-btn::after',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_btn2',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-default-btn',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

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

        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
		endif;
    ?>

        <!-- Start CTA About Area -->
		<div class="cta-about-area teachers-fonts-home">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-xxl-4 col-md-12">
						<div class="cta-about-content">
                            <?php if ( $settings['top_title_op'] == '1' ) : ?>
                                <div class="sub">
                                    <?php if( !empty( $settings['top_img']['url'] ) ){ ?>
                                        <img src="<?php echo esc_url( $settings['top_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    <?php } ?>

                                    <span><?php echo wp_kses_post($settings['top_title']); ?></span>
                                </div>
                            <?php else: ?>

                                <div class="sub">
                                    <span><?php echo wp_kses_post($settings['top_title']); ?></span>
                                </div>

                            <?php endif; ?>
                           
                            <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo wp_kses_post( $settings['sec_title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                            <?php if($settings['content'] != ''): ?>
							    <p><?php echo wp_kses_post($settings['content']); ?></p>
                            <?php endif; ?>

                            <?php if ( $settings['button_text'] != '' ) : ?>
                                <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                    <div class="about-btn"><a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                                    <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                                    </a></div><?php
                                } else { ?>
                                    <div class="about-btn"><a href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                                    <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                                    </a></div><?php
                                } ?>
                            <?php endif; ?>
						</div>
					</div>
					<div class="col-xxl-8 col-md-12">
						<div class="cta-about-image">
							<div class="row justify-content-center align-items-end">
                                <?php if( !empty( $settings['f_img1']['url'] ) ){ ?>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="image1">
                                            <img src="<?php echo esc_url( $settings['f_img1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if( !empty( $settings['f_img2']['url'] ) ){ ?>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="image2">
                                            <img src="<?php echo esc_url( $settings['f_img2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                        </div>
                                    </div>
                                <?php } ?>
							</div>
                            <?php if( !empty( $settings['circle_img']['url'] ) ){ ?>
                                <div class="wrap-shape">
                                    <img src="<?php echo esc_url( $settings['circle_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="cta-about-advertise">
				<h1>
                    <?php 
                        $i=1; foreach( $settings['text_slider'] as $item ): 
                        ?>
                            <?php if($item['text_title']): ?>
                                <span><?php echo wp_kses_post( $item['text_title'] ); ?></span>
                                <?php if( $i==1 OR $i==2 OR $i==3 ): ?>
                                    <span class="gap"></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php 
                        $i++; 
                        endforeach; 
                    ?>
				</h1>
			</div>
		</div>
		<!-- End CTA About Area -->

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_CTA_About );