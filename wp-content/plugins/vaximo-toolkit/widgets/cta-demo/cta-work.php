<?php
/**
 * Work Inner items Widget
 */

namespace Elementor;
class Vaximo_CTA_Work extends Widget_Base {

	public function get_name() {
        return 'CTA_Work';
    }

	public function get_title() {
        return __( 'Cyber Training & Awareness Work', 'vaximo-toolkit' );
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
				'label' => __( 'Work Us Control', 'vaximo-toolkit' ),
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
                    'default' => __( 'HOW VAXIMO WORKS', 'vaximo-toolkit' ),
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
                    'default' => __( 'How Our <strong>Training Work Shops</strong> Work For <strong>Mass People</strong>', 'vaximo-toolkit' ),
                ]
            );

            $fea_items = new Repeater();

                $fea_items->add_control(
                    'list_title',
                    [
                        'label'   => __( 'Title', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'Interactive Training Modules', 'vaximo-toolkit' ),
                    ]
                );
                $fea_items->add_control(
                    'list_content',
                    [
                        'label'   => __( 'Description', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( "Engaging, scenario-based lessons on topics like phishing.", "vaximo-toolkit" ),
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
                    'default' => __( 'Security awareness training alone is not enough to drive behavior change and build a security-minded culture.', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Try Our Security Tools', 'vaximo-toolkit'),
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

            $this->add_control(
                'shape_img',
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
                    'selector' => '{{WRAPPER}} .cta-work-content .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-work-content .sub span',
                ]
            );
            
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-work-content h2, {{WRAPPER}} .cta-work-content h3, {{WRAPPER}} .cta-work-content h1, {{WRAPPER}} .cta-work-content h4, {{WRAPPER}} .cta-work-content h5, {{WRAPPER}} .cta-work-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .cta-work-content h2, {{WRAPPER}} .cta-work-content h3, {{WRAPPER}} .cta-work-content h1, {{WRAPPER}} .cta-work-content h4, {{WRAPPER}} .cta-work-content h5, {{WRAPPER}} .cta-work-content h6',
                ]
            );
            
            $this->add_control(
                'cardbg_heading',
                [
                    'label' => esc_html__( 'Card Background Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
        
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'cardbg_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .cta-work-items .work-item',
                ]
            );

            $this->add_control(
                'li_num_color',
                [
                    'label'     => __( 'Card Number Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-work-items .work-item .number' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_num',
                    'label'    => __( 'Card Number Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-work-items .work-item .number',
                ]
            );
            
            $this->add_control(
                'li_title_color',
                [
                    'label'     => __( 'Card Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-work-items .work-item h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_lititle',
                    'label'    => __( 'Card Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-work-items .work-item h3',
                ]
            );
            $this->add_control(
                'li_con_color',
                [
                    'label'     => __( 'Card Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-work-items .work-item p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_licon',
                    'label'    => __( 'Card Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-work-items .work-item  p',
                ]
            );

            $this->add_control(
                'bt_title_color',
                [
                    'label'     => __( 'Bottom Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-work-left p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_bt_title',
                    'label'    => __( 'Bottom Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .cta-work-left p',
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
                    'selector' => '{{WRAPPER}} .cta-work-left .try-btn',
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
                    'selector' => '{{WRAPPER}} .cta-work-left .try-btn:hover',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_read_h',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-work-left .try-btn',
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

        $ns_fea_item  = $settings['ns_fea_item'];
    ?>

        <!-- Start CTA Work Area -->
		<div class="cta-work-area teachers-fonts-home ptb-120">
			<div class="container">
				<div class="cta-work-inner">
					<div class="row justify-content-center">
						<div class="col-lg-4 col-md-12">
							<div class="cta-work-left">
                                <?php if( !empty( $settings['bottom_img']['url'] ) ){ ?>
                                    <img src="<?php echo esc_url( $settings['bottom_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                <?php } ?>
								
                                <?php if($settings['bottom_title'] != ''): ?>
                                    <p><?php echo wp_kses_post($settings['bottom_title']); ?></p>
                                <?php endif; ?>

                                <?php if ( $settings['button_text'] != '' ) : ?>
                                    <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                        <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="try-btn">
                                        <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                                        </a><?php
                                    } else { ?>
                                        <a href="<?php echo esc_url( $link_source ); ?>" class="try-btn">
                                        <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                                        </a><?php
                                    } ?>
                                <?php endif; ?>
							</div>
						</div>
						<div class="col-lg-4 col-md-12">
							<div class="cta-work-items">
                                <?php $i=1; foreach( $ns_fea_item as $item  ): ?>
                                    <?php if($item['list_title'] && $item['list_content']): ?>
                                        <div class="work-item">
                                            <div class="number"><?php echo esc_attr( $i ); ?></div>
                                            <h3><?php echo wp_kses_post( $item['list_title'] ); ?></h3>
                                            <p><?php echo wp_kses_post( $item['list_content'] ); ?></p>
                                        </div>
                                    <?php endif; ?>
                                <?php 
                                    $i++; endforeach; 
                                ?>
							</div>
						</div>
						<div class="col-lg-4 col-md-12">
							<div class="cta-work-content">
								
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
							</div>
						</div>
					</div>
                    <?php if( !empty( $settings['shape_img']['url'] ) ){ ?>
                        <div class="wrap-shape">
                            <img src="<?php echo esc_url( $settings['shape_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                        </div>
                    <?php } ?>
				</div>
			</div>
		</div>
		<!-- End CTA Work Area -->



        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_CTA_Work );