<?php
/**
 * About Inner items Widget
 */

namespace Elementor;
class Vaximo_Gsd_About extends Widget_Base {

	public function get_name() {
        return 'Gsd_About';
    }

	public function get_title() {
        return __( 'Government Cyber Defense About', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-help-o';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Gsd',
			[
				'label' => __( 'About Us Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'f_img',
                [
                    'label'     => __('Feature Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
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
                    'default' => __( 'Who We Are: Protecting the Nations <strong>Digital Landscape,</strong> ensuring a secure, resilient cyber space for citizens, and government.', 'vaximo-toolkit' ),
                ]
            );
           
            $fea_items = new Repeater();
            
                $fea_items->add_control(
                    'list_title',
                    [
                        'label'   => __( 'Title', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'Our Mission', 'vaximo-toolkit' ),
                    ]
                );
                $fea_items->add_control(
                    'list_content',
                    [
                        'label'   => __( 'Description', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::WYSIWYG,
                        'default' => __( "To safeguard the nation's digital infrastructure by detecting, preventing, and responding to cyber threats.", "vaximo-toolkit" ),
                    ]
                );

            $this->add_control(
                'ns_fea_item',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $fea_items->get_controls(),
                ]
            );

            $this->add_control(
                'badge_img',
                [
                    'label'     => __('Badge Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'icon_count',
                [
                    'label' => esc_html__('Badge Star Count', 'kapa-toolkit'),
                    'type' => Controls_Manager::NUMBER,
                ]
            );

            $this->add_control(
                'badge_icon',
                [
                    'label'   => __( 'Badge Star Icon', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'bx bxs-star', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'badge_title',
                [
                    'label'   => __( 'Badge Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'Governments First Choice Since 2010', 'vaximo-toolkit' ),
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

            $this->add_control(
                'line_img',
                [
                    'label'     => __('Line Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'gsd_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'toptitle_op_heading',
                [
                    'label' => esc_html__( 'Top Title Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'toptitle_op_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-about-content .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle_op',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-about-content .sub span',
                ]
            );
            
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-about-content h2, {{WRAPPER}} .gcd-about-content h3, {{WRAPPER}} .gcd-about-content h1, {{WRAPPER}} .gcd-about-content h4, {{WRAPPER}} .gcd-about-content h5, {{WRAPPER}} .gcd-about-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .gcd-about-content h2, {{WRAPPER}} .gcd-about-content h3, {{WRAPPER}} .gcd-about-content h1, {{WRAPPER}} .gcd-about-content h4, {{WRAPPER}} .gcd-about-content h5, {{WRAPPER}} .gcd-about-content h6',
                ]
            );
            
            $this->add_control(
                'li_title_color',
                [
                    'label'     => __( 'Lists Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-about-content .inner .top .left h4' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_lititle',
                    'label'    => __( 'Lists Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .gcd-about-content .inner .top .left h4',
                ]
            );
            $this->add_control(
                'li_con_color',
                [
                    'label'     => __( 'Lists Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-about-content .inner .top .left p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_licon',
                    'label'    => __( 'Lists Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .gcd-about-content .inner .top .left p',
                ]
            );

            $this->add_control(
                'badge_con_color',
                [
                    'label'     => __( 'Badge Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-about-content .inner .top .right .rating .list li i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_badgeicon',
                    'label'    => __( 'Badge Icon Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-about-content .inner .top .right .rating .list li i',
                ]
            );

            $this->add_control(
                'libg_color',
                [
                    'label'     => __( 'Badge Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-about-content .inner .top .right .rating h5' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_libg',
                    'label'    => __( 'Badge Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .gcd-about-content .inner .top .right .rating h5',
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
                'btn_honecolor', [
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
                    'label' => esc_html__( 'Button Background Hover Color', 'textdomain' ),
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

        $ns_fea_item  = $settings['ns_fea_item'];

        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
		endif;
    ?>

        <!-- Start GCD About Area -->
		<div class="gcd-about-area ptb-120 teachers-fonts-home">
			<div class="container-fluid">
				<div class="row justify-content-center g-5">
                    <?php if( !empty( $settings['f_img']['url'] ) ){ ?>
                        <div class="col-lg-4 col-md-12">
                            <div class="gcd-about-image" style="background-image: url(<?php echo esc_url( $settings['f_img']['url'] ); ?>)"></div>
                        </div>
                    <?php } ?>
					<div class="col-lg-8 col-md-12">
						<div class="gcd-about-content">
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
							
							<div class="inner">
								<div class="top">
                                    <?php $i=1; foreach( $ns_fea_item as $item  ): 
                                        if($i==1):
                                    ?>
                                        <div class="left">
                                            <h4> <?php echo wp_kses_post( $item['list_title'] ); ?></h4>
                                            <p> <?php echo wp_kses_post( $item['list_content'] ); ?></p>
                                        </div>
                                    <?php 
                                        endif; 
                                    $i++; endforeach; 
                                    ?>

									<div class="right">
                                        <?php if( !empty( $settings['badge_img']['url'] ) ){ ?>
                                            <div class="image">
                                                <img src="<?php echo esc_url( $settings['badge_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                            </div>
                                        <?php } ?>
                                       
                                      
										<div class="rating">
											<ul class="list">
                                                <?php for ($x = 0; $x < $settings['icon_count']; $x++) { ?>
                                                    <?php if($settings['badge_icon']):  ?>
                                                        <li><i class='bx bxs-star'></i></li>
                                                    <?php endif; ?>
                                                <?php } ?>
											</ul>
           
                                            <?php if($settings['badge_title'] != ''): ?>
											    <h5><?php echo wp_kses_post($settings['badge_title']); ?></h5>
                                            <?php endif; ?>
										</div>
									</div>
								</div>

                                <?php if( !empty( $settings['line_img']['url'] ) ){ ?>
                                    <div class="line">
                                        <img src="<?php echo esc_url( $settings['line_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    </div>
                                <?php } ?>

								
								<div class="bottom">
									
                                    <?php if ( $settings['button_text'] != '' ) : ?>
                                        <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                            <div class="about-btn"><a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                                            <?php echo esc_html( $settings['button_text'] ); ?><i class='bx bx-right-arrow-alt'></i>
                                            </a></div><?php
                                        } else { ?>
                                            <div class="about-btn"><a href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                                            <?php echo esc_html( $settings['button_text'] ); ?><i class='bx bx-right-arrow-alt'></i>
                                            </a></div><?php
                                        } ?>
                                    <?php endif; ?>
									

                                    <?php $i=1; foreach( $ns_fea_item as $item  ): 
                                        if($i==2):
                                    ?>
                                        <div class="left">
                                            <h4> <?php echo wp_kses_post( $item['list_title'] ); ?></h4>
                                            <p> <?php echo wp_kses_post( $item['list_content'] ); ?></p>
                                        </div>
                                    <?php 
                                        endif; 
                                    $i++; endforeach; 
                                    ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End GCD About Area -->


        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Gsd_About );