<?php
/**
 * Tools Inner items Widget
 */

namespace Elementor;
class Vaximo_CTA_Tools extends Widget_Base {

	public function get_name() {
        return 'CTA_Tools';
    }

	public function get_title() {
        return __( 'Cyber Training & Awareness Tools', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-icon-wrapper';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_CTA',
			[
				'label' => __( 'Tools Us Control', 'vaximo-toolkit' ),
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
                    'default' => __( 'FREE TOOLS', 'vaximo-toolkit' ),
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
                    'default' => __( 'How Our <strong>Training Tools Shops</strong> Tools For <strong>Mass People</strong>', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'content',
                [
                    'label'   => __( 'Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'Test your users and your nettools with our free IT security tools which help you to identify the problems of all kind of cyber attact.', 'vaximo-toolkit' ),
                ]
            );

            $fea_items = new Repeater();

                $fea_items->add_control(
                    'image',
                    [
                        'label' => __( 'Feature Image', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::MEDIA,
                    ]
                );

                $fea_items->add_control(
                    'list_title',
                    [
                        'label'   => __( 'Title', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'Phishing Security Test', 'vaximo-toolkit' ),
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
                'bottom_img',
                [
                    'label'     => __('Bottom Item Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'bottom_title',
                [
                    'label'   => __( 'Bottom Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( '<strong>Explore</strong> All Our Tools for <strong>Security</strong>', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Explore Now', 'vaximo-toolkit'),
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
        $this->end_controls_section();

        $this->start_controls_section(
			'cta_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'sec_bg_color',
                [
                    'label'     => __( 'Section Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-tools-inner' => 'background-color: {{VALUE}}',
                    ],
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
                    'selector' => '{{WRAPPER}} .cta-tools-content .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-tools-content .sub span',
                ]
            );
            
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-tools-content h2, {{WRAPPER}} .cta-tools-content h3, {{WRAPPER}} .cta-tools-content h1, {{WRAPPER}} .cta-tools-content h4, {{WRAPPER}} .cta-tools-content h5, {{WRAPPER}} .cta-tools-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .cta-tools-content h2, {{WRAPPER}} .cta-tools-content h3, {{WRAPPER}} .cta-tools-content h1, {{WRAPPER}} .cta-tools-content h4, {{WRAPPER}} .cta-tools-content h5, {{WRAPPER}} .cta-tools-content h6',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label'     => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-tools-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_content',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-tools-content p',
                ]
            );

            $this->add_control(
                'cd_bg_color',
                [
                    'label'     => __( 'Card Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-tools-card' => 'background: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_control(
                'li_title_color',
                [
                    'label'     => __( 'Card Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-tools-card h5' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_lititle',
                    'label'    => __( 'Card Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-tools-card h5',
                ]
            );

            $this->add_control(
                'btbg_heading',
                [
                    'label' => esc_html__( 'Bottom Card Background Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
        
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'btbg_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .cta-tools-box',
                ]
            );

            $this->add_control(
                'bt_title_color',
                [
                    'label'     => __( 'Bottom Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-tools-box h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_bttitle',
                    'label'    => __( 'Bottom Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-tools-box h3',
                ]
            );

            $this->add_control(
                'read_op_heading',
                [
                    'label' => esc_html__( 'Button Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'read_op_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .cta-tools-box .explore-btn',
                ]
            );

            $this->add_control(
                'read_hop_heading',
                [
                    'label' => esc_html__( 'Button Hover Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'read_hop_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .cta-tools-box .explore-btn:hover',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_btn2',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-tools-box .explore-btn',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
		endif;

        $ns_fea_item  = $settings['ns_fea_item'];
    ?>

        <!-- Start CTA Tools Area -->
		<div class="cta-tools-area teachers-fonts-home">
			<div class="container">
				<div class="cta-tools-inner">
					<div class="row justify-content-center align-items-center g-4">
						<div class="col-lg-7 col-md-12">
							<div class="row justify-content-center g-4">
                                <?php $i=1; foreach( $ns_fea_item as $item  ): 

                                    if($i==1 OR $i==2):
                                    
                                ?>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="cta-tools-card">
                                            <?php if($item['image']['url'] != ''): ?>
                                                <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__("secure", "vaximo-toolkit"); ?>">
                                            <?php endif; ?>
                                            <?php if($item['list_title'] != ''): ?>
                                                <h5><?php echo wp_kses_post( $item['list_title'] ); ?></h5>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php 
                                    endif;
                                $i++; endforeach; 
                                ?>
							</div>
						</div>
						<div class="col-lg-5 col-md-12">
							<div class="cta-tools-content">
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
                                <?php if( $settings['content']): ?>
                                    <p><?php echo wp_kses_post( $settings['content'] ); ?></p>
                                <?php endif; ?>
								
							</div>
						</div>
						<div class="col-lg-5 col-md-12">
							<div class="cta-tools-box">
                                <?php if($settings['bottom_title'] != ''): ?>
								    <h3><?php echo wp_kses_post($settings['bottom_title']); ?></h3>
                                <?php endif; ?>

                                <?php if ( $settings['button_text'] != '' ) : ?>
                                    <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                        <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="explore-btn">
                                        <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                                        </a><?php
                                    } else { ?>
                                        <a href="<?php echo esc_url( $link_source ); ?>" class="explore-btn">
                                        <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                                        </a><?php
                                    } ?>
                                <?php endif; ?>

                                <?php if( !empty( $settings['bottom_img']['url'] ) ){ ?>
                                    <div class="tools">
                                        <img src="<?php echo esc_url( $settings['bottom_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    </div>
                                <?php } ?>
							</div>
						</div>
						<div class="col-lg-7 col-md-12">
							<div class="row justify-content-center g-4">
								
                                <?php $i=1; foreach( $ns_fea_item as $item  ): 

                                    if($i==3 OR $i==4):

                                ?>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="cta-tools-card">
                                            <?php if($item['image']['url'] != ''): ?>
                                                <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__("secure", "vaximo-toolkit"); ?>">
                                            <?php endif; ?>
                                            <?php if($item['list_title'] != ''): ?>
                                                <h5><?php echo wp_kses_post( $item['list_title'] ); ?></h5>
                                            <?php endif; ?>
                                        </div>
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
		<!-- End CTA Tools Area -->

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_CTA_Tools );