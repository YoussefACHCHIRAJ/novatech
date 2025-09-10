<?php
/**
 * Explore items Widget
 */

namespace Elementor;
class Vaximo_Ai_Explore extends Widget_Base {

	public function get_name() {
        return 'Ai_Explore';
    }

	public function get_title() {
        return __( 'AI Powered Security Explore', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-help-o';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_AI_EXPLORE',
			[
				'label' => __( 'Explore Control', 'vaximo-toolkit' ),
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
                    'default' => __( 'EXPLORE', 'vaximo-toolkit' ),
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
                    'default' => __( 'With cyber attackers harnessing the power of AI, organizations must respond by adopting zero trust architecture enhanced with AI.', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'content',
                [
                    'label'   => __( 'Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'If you suspect or experience a cyber attack, its crucial to act quickly. Our Incident Reporting Portal is designed to assist individuals, businesses, and government agencies in reporting cyber incidents.', 'vaximo-toolkit' ),
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
                'f_img',
                [
                    'label'     => __('Feature Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
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
			'ai_explore_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'sec_bgcolor', [
                    'label'     => __( 'Section Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-explore-inner' => 'background: {{VALUE}};',
                    ],
                ]
            );
           
            $this->add_control(
                'toptitle_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-explore-content .sub span' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-explore-content .sub span',
                ]
            );
        
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-explore-content h2, {{WRAPPER}} .ai-explore-content h3, {{WRAPPER}} .ai-explore-content h1, {{WRAPPER}} .ai-explore-content h4, {{WRAPPER}} .ai-explore-content h5, {{WRAPPER}} .ai-explore-content h6' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .ai-explore-content h2, {{WRAPPER}} .ai-explore-content h3, {{WRAPPER}} .ai-explore-content h1, {{WRAPPER}} .ai-explore-content h4, {{WRAPPER}} .ai-explore-content h5, {{WRAPPER}} .ai-explore-content h6',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label'     => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-explore-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_content',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-explore-content p',
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
                'btn_onebgcolor', [
                    'label'     => __( 'Button Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-default-btn' => 'background: {{VALUE}};',
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
                'btn_onehbgcolor', [
                    'label'     => __( 'Button Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-default-btn::before, {{WRAPPER}} .gcd-default-btn::after' => 'background: {{VALUE}};',
                    ],
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

        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
		endif;

    ?>

        <!-- Start AI Explore Area -->
		<div class="ai-explore-area teachers-fonts-home">
			<div class="container">
				<div class="ai-explore-inner">
					<div class="row justify-content-center align-items-center g-5">
						<div class="col-xl-5 col-md-12">
                            <?php if( !empty( $settings['f_img']['url'] ) ){ ?>
                                <div class="ai-explore-image">
                                    <img src="<?php echo esc_url( $settings['f_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    <?php if( !empty( $settings['s_img']['url'] ) ){ ?>
                                        <div class="vector">
                                            <img src="<?php echo esc_url( $settings['s_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                        </div>
                                    <?php } ?>   
                                </div>
                            <?php } ?>       
						</div>
						<div class="col-xl-7 col-md-12">
							<div class="ai-explore-content">
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

                                <?php if($settings['content'] != ''): ?>
                                    <p><?php echo wp_kses_post( $settings['content'] ); ?></p>
                                <?php endif; ?>

                                <?php if ( $settings['button_text'] && $link_source != '' ) : ?>
                                    <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                        <div class="explore-btn"><a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                                        <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                                        </a></div><?php
                                    } else { ?>
                                        <div class="explore-btn"><a href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                                        <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                                        </a></div><?php
                                    } ?>
                                <?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End AI Explore Area -->

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Ai_Explore );