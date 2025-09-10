<?php
/**
 * Report items Widget
 */

namespace Elementor;
class Vaximo_Gcd_Report extends Widget_Base {

	public function get_name() {
        return 'Gcd_Report';
    }

	public function get_title() {
        return __( 'Gcd Report', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-kit-details';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_AI_REPORT',
			[
				'label' => __( 'Report Control', 'vaximo-toolkit' ),
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
                    'default' => __( 'REPORT', 'vaximo-toolkit' ),
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
                    'default' => __( 'Report any <strong>Incidents</strong> if happened in your <strong>Cyber</strong> world', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'content',
                [
                    'label'   => __( 'Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'If you suspect or experience a cyber attack, its crucial to act quickly. Our Incident Reporting Portal is designed to assist individuals, businesses, and government agencies in reporting cyber incidents', 'vaximo-toolkit' ),
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

            $this->add_control(
                'call_text',
                [
                    'label'   => __( 'Call Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Call: <a href="tel:32114565678">+321 1456 5678</a>', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'call_icon',
                [
                    'label'   => __( 'Button Icon', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('bx bx-phone', 'vaximo-toolkit'),
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
                's_img1',
                [
                    'label'     => __('Shape Images One', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                's_img2',
                [
                    'label'     => __('Shape Images Two', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                's_img3',
                [
                    'label'     => __('Shape Images Three', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                's_img4',
                [
                    'label'     => __('Shape Images Four', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'ai_report_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );


            $this->add_control(
                'top_title_color',
                [
                    'label'     => __( 'Top Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-report-content .sub span' => 'color: {{VALUE}}',
                    ],
                ]
            );
           

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle_op',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-report-content .sub span',
                ]
            );
            
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-report-content h2, {{WRAPPER}} .gcd-report-content h3, {{WRAPPER}} .gcd-report-content h1, {{WRAPPER}} .gcd-report-content h4, {{WRAPPER}} .gcd-report-content h5, {{WRAPPER}} .gcd-report-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
             
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .gcd-report-content h2, {{WRAPPER}} .gcd-report-content h3, {{WRAPPER}} .gcd-report-content h1, {{WRAPPER}} .gcd-report-content h4, {{WRAPPER}} .gcd-report-content h5, {{WRAPPER}} .gcd-report-content h6',
                ]
            );
            
            $this->add_control(
                'sc_content_color',
                [
                    'label'     => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-report-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_sccontent',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-report-content p',
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

            $this->add_control(
                'call_btn_color',
                [
                    'label'     => __( 'Call Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-report-content .info li .call i, {{WRAPPER}} .gcd-report-content .info li .call span, {{WRAPPER}} .gcd-report-content .info li .call span a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'call_btn_brcolor',
                [
                    'label'     => __( 'Call Button Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-report-content .info li .call' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_call_btn',
                    'label'    => __( 'Call Button Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-report-content .info li .call i, {{WRAPPER}} .gcd-report-content .info li .call span, {{WRAPPER}} .gcd-report-content .info li .call span a',
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

    ?>

        <div class="gcd-overview-in-item teachers-fonts-home">
            <div class="container">
                <div class="row justify-content-center align-items-center g-5">
                    <?php if( !empty( $settings['f_img']['url'] ) ){ ?>
                        <div class="col-lg-5 col-md-12">
                            <div class="gcd-report-image">
                                <img src="<?php echo esc_url( $settings['f_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                <?php if( !empty( $settings['s_img1']['url'] ) ){ ?>
                                    <div class="vector">
                                        <img src="<?php echo esc_url( $settings['s_img1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col-lg-7 col-md-12">
                        <div class="gcd-report-content">
    
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
                                <p><?php echo wp_kses_post( $settings['content'] ); ?></p>
                            <?php endif; ?>

                            <ul class="info">
                                <?php if ( $settings['button_text'] && $link_source != '' ) : ?>
                                    <li>
                                        
                                        <?php if ( $settings['button_text'] != '' ) : ?>
                                            <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                                <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                                                <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                                                </a><?php
                                            } else { ?>
                                                <a href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                                                <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                                                </a><?php
                                            } ?>
                                        <?php endif; ?>

                                    </li>
                                <?php endif; ?>
                                <?php if ( $settings['call_text'] && $settings['call_icon'] != '' ) : ?>
                                    <li>
                                        <div class="call">
                                            <i class='<?php echo esc_attr( $settings['call_icon'] ); ?>'></i>
                                            <span><?php echo wp_kses_post( $settings['call_text'] ); ?></span>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php if( !empty( $settings['s_img2']['url'] ) ){ ?>
                <div class="shape1">
                    <img src="<?php echo esc_url( $settings['s_img2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                </div>
            <?php } ?>
            <?php if( !empty( $settings['s_img3']['url'] ) ){ ?>
                <div class="shape2">
                    <img src="<?php echo esc_url( $settings['s_img3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                </div>
            <?php } ?>
            <?php if( !empty( $settings['s_img4']['url'] ) ){ ?>
                <div class="shape3">
                    <img src="<?php echo esc_url( $settings['s_img4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                </div>
            <?php } ?>
           
        </div>

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Gcd_Report );