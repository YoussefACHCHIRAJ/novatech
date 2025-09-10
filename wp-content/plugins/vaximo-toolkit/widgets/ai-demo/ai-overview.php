<?php
/**
 * Overview items Widget
 */

namespace Elementor;
class Vaximo_Ai_Overview extends Widget_Base {

	public function get_name() {
        return 'Ai_Overview';
    }

	public function get_title() {
        return __( 'AI Powered Security Overview', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-help-o';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_AI_OVERVIEW',
			[
				'label' => __( 'Overview Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'overview_id',
                [
                    'label'   => __( 'Overview Content Id', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'overview', 'vaximo-toolkit' ),
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
                    'default' => __( 'OVERVIEW', 'vaximo-toolkit' ),
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
                'f_img',
                [
                    'label'     => __('Feature Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
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
                        'label'   => __( 'Content', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'To safeguard the nations digital infrastructure by detecting, preventing, and responding to cyber threats.', 'vaximo-toolkit' ),
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
			'ai_overview_style',
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
                    'selector' => '{{WRAPPER}} .gcd-section-title .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-section-title .sub span',
                ]
            );
            
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-section-title h2, {{WRAPPER}} .gcd-section-title h3, {{WRAPPER}} .gcd-section-title h1, {{WRAPPER}} .gcd-section-title h4, {{WRAPPER}} .gcd-section-title h5, {{WRAPPER}} .gcd-section-title h6, {{WRAPPER}} .text-white' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .gcd-section-title h2, {{WRAPPER}} .gcd-section-title h3, {{WRAPPER}} .gcd-section-title h1, {{WRAPPER}} .gcd-section-title h4, {{WRAPPER}} .gcd-section-title h5, {{WRAPPER}} .gcd-section-title h6',
                ]
            );

            $this->add_control(
                'list_title_color',
                [
                    'label'     => __( 'List Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-overview-content .content h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list_title',
                    'label'    => __( 'List Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-overview-content .content h3',
                ]
            );
            
            $this->add_control(
                'list_content_color',
                [
                    'label'     => __( 'List Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-overview-content .content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list_content',
                    'label'    => __( 'List Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-overview-content .content p',
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

        $ns_fea_item  = $settings['ns_fea_item'];
    ?>

        <!-- Start AI Overview Area -->
        <div <?php if( !empty( $settings['overview_id']) ){ ?> id="<?php echo esc_attr( $settings['overview_id'] ); ?>" <?php } ?> class="ai-overview-area teachers-fonts-home pb-120">
            <div class="ai-overview-content">
                <div class="gcd-section-title text-start">
                    <?php if ( $settings['top_title_op'] == '1' ) : ?>
                        <div class="sub sub justify-content-start">
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

                </div>
                
                <?php if( !empty( $settings['f_img']['url'] ) ){ ?>
                    
                    <div class="image">
                        <img src="<?php echo esc_url( $settings['f_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                    </div>
                    
                <?php } ?>

                <div class="row justify-content-center">
                    <?php $i=1; foreach( $ns_fea_item as $item  ):  ?>
                        <div class="col-lg-6 col-sm-6">
                            <div class="content">
                                <?php if($item['list_title'] != ''): ?>
                                    <h3><?php echo wp_kses_post( $item['list_title'] ); ?></h3>
                                <?php endif; ?>
                                <?php if($item['list_content'] != ''): ?>
                                    <p><?php echo wp_kses_post( $item['list_content'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php 
                        $i++; endforeach; 
                    ?>
                </div>
                <?php if ( $settings['button_text'] != '' ) : ?>
                    <?php if ( 'yes' === $settings['target_page'] ) { ?>
                        <div class="overview-btn"><a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                        <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                        </a></div><?php
                    } else { ?>
                        <div class="overview-btn"><a href="<?php echo esc_url( $link_source ); ?>" class="gcd-default-btn">
                        <?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php endif; ?>
                        </a></div><?php
                    } ?>
                <?php endif; ?>
            </div>
            <div class="ellipse"></div>
        </div>
        <!-- End AI Overview Area -->

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Ai_Overview );