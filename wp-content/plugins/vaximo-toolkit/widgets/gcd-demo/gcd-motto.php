<?php
/**
 * About Inner items Widget
 */

namespace Elementor;
class Vaximo_Gsd_Motto extends Widget_Base {

	public function get_name() {
        return 'Gsd_Motto';
    }

	public function get_title() {
        return __( 'Government Cyber Defense Motto', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-help-o';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Motto',
			[
				'label' => __( 'Motto Us Control', 'vaximo-toolkit' ),
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
                    'tab_title',
                    [
                        'label'   => __( 'Tab Title', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'Control', 'vaximo-toolkit' ),
                    ]
                );
            
                $fea_items->add_control(
                    'list_title',
                    [
                        'label'   => __( 'Title', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'Control', 'vaximo-toolkit' ),
                    ]
                );
                $fea_items->add_control(
                    'list_content',
                    [
                        'label'   => __( 'Description', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( "Ensure Business Continuity, Maintain Stakeholder's Trust & Keep your Customers Happy. Trust is the foundation of a secure and resilient digital ecosystem. At our core, we are committed to fostering trust by ensuring transparency.", "vaximo-toolkit" ),
                    ]
                );

                $fea_items->add_control(
                    'counter_num1',
                    [
                        'label'   => __( 'Counter Number One', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::NUMBER,
                        'default' => __( '552', 'vaximo-toolkit' ),
                    ]
                );
                $fea_items->add_control(
                    'number_suffix1', [
                        'type'    => Controls_Manager::TEXT,
                        'label'   => esc_html__( 'Ending Number Suffix One', 'vaximo-toolkit' ),
                    ]
                );
                $fea_items->add_control(
                    'counter_content1',
                    [
                        'label'   => __( 'Counter Content One', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( "Experts", "vaximo-toolkit" ),
                    ]
                );

                $fea_items->add_control(
                    'counter_num2',
                    [
                        'label'   => __( 'Counter Number Two', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::NUMBER,
                        'default' => __( '552', 'vaximo-toolkit' ),
                    ]
                );
                $fea_items->add_control(
                    'number_suffix2', [
                        'type'    => Controls_Manager::TEXT,
                        'label'   => esc_html__( 'Ending Number Suffix Two', 'vaximo-toolkit' ),
                    ]
                );
                $fea_items->add_control(
                    'counter_content2',
                    [
                        'label'   => __( 'Counter Content Two', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( "Experts", "vaximo-toolkit" ),
                    ]
                );

                $fea_items->add_control(
                    'counter_num3',
                    [
                        'label'   => __( 'Counter Number Three', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::NUMBER,
                        'default' => __( '552', 'vaximo-toolkit' ),
                    ]
                );
                $fea_items->add_control(
                    'number_suffix3', [
                        'type'    => Controls_Manager::TEXT,
                        'label'   => esc_html__( 'Ending Number Suffix Three', 'vaximo-toolkit' ),
                    ]
                );
                $fea_items->add_control(
                    'counter_content3',
                    [
                        'label'   => __( 'Counter Content Three', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( "Experts", "vaximo-toolkit" ),
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
                's_img',
                [
                    'label'     => __('Shape Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'motto_style',
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
                    'selector' => '{{WRAPPER}} .gcd-motto-content .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle_op',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-motto-content .sub span',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-motto-content  h2, {{WRAPPER}} .gcd-motto-content  h3, {{WRAPPER}} .gcd-motto-content  h1, {{WRAPPER}} .gcd-motto-content  h4, {{WRAPPER}} .gcd-motto-content  h5, {{WRAPPER}} .gcd-motto-content  h6, .gcd-motto-content .text-white' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .gcd-motto-content  h2, {{WRAPPER}} .gcd-motto-content  h3, {{WRAPPER}} .gcd-motto-content  h1, {{WRAPPER}} .gcd-motto-content  h4, {{WRAPPER}} .gcd-motto-content  h5, {{WRAPPER}} .gcd-motto-content  h6',
                ]
            );

            $this->add_control(
                'tabtitle_color',
                [
                    'label'     => __( 'Tab Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-motto-content .gcd-motto-tab .tabs li a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'tabtitle_h_color',
                [
                    'label'     => __( 'Tab Title Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-motto-content .gcd-motto-tab .tabs li:hover, {{WRAPPER}} .gcd-motto-tab .tabs li.current a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'tabtitle_bg_color',
                [
                    'label'     => __( 'Tab Title Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-motto-content .gcd-motto-tab .tabs li a' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'tabtitle_op_heading',
                [
                    'label' => esc_html__( 'Tab Title Background Hover Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'tabtitle_op_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-motto-content .gcd-motto-tab .tabs li a::before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_tabtitle',
                    'label'    => __( 'Tab Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-motto-content .gcd-motto-tab .tabs li a',
                ]
            );
            
            $this->add_control(
                'li_title_color',
                [
                    'label'     => __( 'Lists Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-motto-content .gcd-motto-tab .inner-content .content h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_lititle',
                    'label'    => __( 'Lists Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .gcd-motto-content .gcd-motto-tab .inner-content .content h3',
                ]
            );
            $this->add_control(
                'li_con_color',
                [
                    'label'     => __( 'Lists Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-motto-content .gcd-motto-tab .inner-content .content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_licon',
                    'label'    => __( 'Lists Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-motto-content .gcd-motto-tab .inner-content .content p',
                ]
            );

            $this->add_control(
                'fanfact_num_color',
                [
                    'label'     => __( 'Funfact Number Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-motto-content .gcd-motto-tab .inner-content .count-item h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_fanfact_num',
                    'label'    => __( 'Funfact Number Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-motto-content .gcd-motto-tab .inner-content .count-item h3',
                ]
            );

            $this->add_control(
                'fanfact_con_color',
                [
                    'label'     => __( 'Funfact Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-motto-content .gcd-motto-tab .inner-content .count-item p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_fanfact_con',
                    'label'    => __( 'Funfact Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-motto-content .gcd-motto-tab .inner-content .count-item p',
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
                    'label' => esc_html__( 'Button Hover Background Color', 'textdomain' ),
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

        $ns_fea_item  = $settings['ns_fea_item'];

        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
		endif;
    ?>

        <!-- Start GCD Motto Area -->
		<div class="gcd-motto-area teachers-fonts-home">
			<div class="container-fluid">
				<div class="row justify-content-center">
					
                    <?php if( !empty( $settings['f_img']['url'] ) ){ ?>
                        <div class="col-lg-5 col-md-12">
                            <div class="gcd-motto-image" style="background-image: url(<?php echo esc_url( $settings['f_img']['url'] ); ?>)"></div>
                        </div>
                    <?php } ?>
					<div class="col-lg-7 col-md-12">
						<div class="gcd-motto-content">

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
                           
                            <<?php echo esc_attr( $settings['heading_tag'] ); ?> class="text-white"><?php echo wp_kses_post( $settings['sec_title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>


							<div class="tab gcd-motto-tab">
								<ul class="tabs">
                                    <?php $i=1; foreach( $ns_fea_item as $item  ): ?>
                                        <?php if($item['tab_title'] != ''): ?>
                                            <li>
                                                <a href="javascript:;">
                                                    <?php echo wp_kses_post($item['tab_title']); ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php 
                                    $i++; endforeach; 
                                    ?>
								</ul>
								<div class="tab_content">

                                    <?php $i=1; foreach( $ns_fea_item as $item  ): ?>
                                        <div class="tabs_item">
                                            <div class="inner-content">
                                                <div class="content">
                                                    <?php if($item['list_title'] != ''): ?>
                                                        <h3><?php echo wp_kses_post($item['list_title']); ?></h3>
                                                    <?php endif; ?>
                                                    <?php if($item['list_content'] != ''): ?>
                                                        <p><?php echo wp_kses_post($item['list_content']); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="row justify-content-center g-4">
                                                    
                                                    <div class="col-lg-4 col-sm-4">
                                                        <div class="count-item">
                                                            <?php if($item['counter_num1'] != ''): ?>
                                                                <h3><span class="odometer" data-count="<?php echo esc_attr($item['counter_num1']); ?>">00</span> <?php if($item['number_suffix1'] != ''): ?><span class="sign"><?php echo wp_kses_post($item['number_suffix1']); ?></span><?php endif; ?></h3>
                                                            <?php endif; ?>
                                                            <?php if($item['counter_content1'] != ''): ?>
                                                                <p><?php echo wp_kses_post($item['counter_content1']); ?></p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-sm-4">
                                                        <div class="count-item">
                                                            <?php if($item['counter_num2'] != ''): ?>
                                                                <h3><span class="odometer" data-count="<?php echo esc_attr($item['counter_num2']); ?>">00</span> <?php if($item['number_suffix2'] != ''): ?><span class="sign"><?php echo wp_kses_post($item['number_suffix2']); ?></span><?php endif; ?></h3>
                                                            <?php endif; ?>
                                                            <?php if($item['counter_content2'] != ''): ?>
                                                                <p><?php echo wp_kses_post($item['counter_content2']); ?></p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-sm-4">
                                                        <div class="count-item">
                                                            <?php if($item['counter_num3'] != ''): ?>
                                                                <h3><span class="odometer" data-count="<?php echo esc_attr($item['counter_num3']); ?>">00</span> <?php if($item['number_suffix3'] != ''): ?><span class="sign"><?php echo wp_kses_post($item['number_suffix3']); ?></span><?php endif; ?></h3>
                                                            <?php endif; ?>
                                                            <?php if($item['counter_content3'] != ''): ?>
                                                                <p><?php echo wp_kses_post($item['counter_content3']); ?></p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if ( $settings['button_text'] != '' ) : ?>
                                                    <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                                        <div class="motto-btn"><a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                                                        <?php echo esc_html( $settings['button_text'] ); ?><i class='bx bx-right-arrow-alt'></i>
                                                        </a></div><?php
                                                    } else { ?>
                                                        <div class="motto-btn"><a href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                                                        <?php echo esc_html( $settings['button_text'] ); ?><i class='bx bx-right-arrow-alt'></i>
                                                        </a></div><?php
                                                    } ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php 
                                        $i++; endforeach; 
                                    ?>
									
								</div>
							</div>

                            <?php if( !empty( $settings['s_img']['url'] ) ){ ?>
                                <div class="wrap-shape1">
                                    <img src="<?php echo esc_url( $settings['s_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End GCD Motto Area -->

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Gsd_Motto );