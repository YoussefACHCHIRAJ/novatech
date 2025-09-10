<?php
/**
 * Platform items Widget
 */

namespace Elementor;
class Vaximo_Ai_Platform extends Widget_Base {

	public function get_name() {
        return 'Ai_Platform';
    }

	public function get_title() {
        return __( 'AI Powered Security Platform', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-table';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Platform',
			[
				'label' => __( 'Platform Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'platform_id',
                [
                    'label'   => __( 'platform Content Id', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'platform', 'vaximo-toolkit' ),
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
                    'default' => __( 'PLATFORMS THAT WE SERVE', 'vaximo-toolkit' ),
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
                    'default' => __( 'Our AI capabilities have empowered us to serve diverse sectors with precision and expertise', 'vaximo-toolkit' ),
                ]
            );

            $fea_items = new Repeater();

                $fea_items->add_control(
                    'tab_title',
                    [
                        'label'   => __( 'Tab Title', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'BANKS & FINANCIAL', 'vaximo-toolkit' ),
                    ]
                );

                $fea_items->add_control(
                    'tab_icon',
                    [
                        'label'   => __( 'Tab Icon', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'bx bxs-bank', 'vaximo-toolkit' ),
                    ]
                );

                $fea_items->add_control(
                    'f_img',
                    [
                        'type'    => Controls_Manager::MEDIA,
                        'label'   => __( 'Images', 'vaximo-toolkit' ),
                    ]
                );

                $fea_items->add_control(
                    'list_title',
                    [
                        'label'   => __( 'Title', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'Pivot to proactive security', 'vaximo-toolkit' ),
                    ]
                );

                $fea_items->add_control(
                    'list_content',
                    [
                        'label'   => __( 'Content', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXTAREA,
                        'default' => __( 'Engaging, scenario-based lessons on topics like phishing.', 'vaximo-toolkit' ),
                    ]
                );

                $fea_items->add_control(
                    'list_list',
                    [
                        'label'   => __( 'Content List', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXTAREA,
                        'default' => __( '<ul class="list"><li><i class="bx bx-check-circle"></i><span>Fraud Detection and Prevention</span></li><li><i class="bx bx-check-circle"></i><span>Identity Verification and Access Control</span></li><li><i class="bx bx-check-circle"></i><span>Customer Data Protection</span></li></ul>', 'vaximo-toolkit' ),
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

        $this->end_controls_section();

        $this->start_controls_section(
			'ai_platform_style',
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
                'tab_title_color',
                [
                    'label'     => __( 'Tab Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-platforms-tabs .nav .nav-item .nav-link, {{WRAPPER}} .ai-platforms-tabs .nav .nav-item .nav-link i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tab_title_h_color',
                [
                    'label'     => __( 'Tab Hover / Active Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-platforms-tabs .nav .nav-item .nav-link:hover, {{WRAPPER}} .ai-platforms-tabs .nav .nav-item .nav-link.active, {{WRAPPER}} .ai-platforms-tabs .nav .nav-item .nav-link:hover 1, {{WRAPPER}} .ai-platforms-tabs .nav .nav-item .nav-link.active i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tab_title_br_h_color',
                [
                    'label'     => __( 'Tab Hover / Active Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-platforms-tabs .nav .nav-item .nav-link::before' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_tab_title',
                    'label'    => __( 'Tab Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-platforms-tabs .nav .nav-item .nav-link, {{WRAPPER}} .ai-platforms-tabs .nav .nav-item .nav-link i',
                ]
            );

            $this->add_control(
                'list_title_color',
                [
                    'label'     => __( 'Tab Content Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-platforms-tabs .ai-platforms-content .content h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list_title',
                    'label'    => __( 'Tab Content Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-platforms-tabs .ai-platforms-content .content h3',
                ]
            );
            
            $this->add_control(
                'list_content_color',
                [
                    'label'     => __( 'Tab Content Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-platforms-tabs .ai-platforms-content .content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list_content',
                    'label'    => __( 'Tab Content Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-platforms-tabs .ai-platforms-content .content p',
                ]
            );

            $this->add_control(
                'list_ul_color',
                [
                    'label'     => __( 'Tab Content List Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-platforms-tabs .ai-platforms-content .list li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list_ul',
                    'label'    => __( 'Tab Content List Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-platforms-tabs .ai-platforms-content .list li',
                ]
            );

        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

        $ns_fea_item  = $settings['ns_fea_item'];

    ?>

        <!-- Start AI Platforms Area -->
        <div <?php if( !empty( $settings['platform_id']) ){ ?> id="<?php echo esc_attr( $settings['platform_id'] ); ?>" <?php } ?> class="ai-platforms-area teachers-fonts-home pb-120">
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
            <div class="ai-platforms-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php $i=1; foreach( $ns_fea_item as $item  ):  ?>
                        <?php if ( $item['tab_icon'] &&  $item['tab_title']) : ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if($i==1): ?> active <?php endif; ?>" id="one-tab<?php echo $i; ?>" data-bs-toggle="tab" href="#one<?php echo $i; ?>" role="tab" aria-controls="one<?php echo $i; ?>">
                                    <i class='<?php echo esc_attr($item['tab_icon']); ?>'></i>
                                    <?php echo wp_kses_post($item['tab_title']); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php 
                        $i++; endforeach; 
                    ?>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <?php $i=1; foreach( $ns_fea_item as $item  ):  ?>
                        <div class="tab-pane fade <?php if($i==1): ?> show active <?php endif; ?>" id="one<?php echo $i; ?>" role="tabpanel">
                            <div class="ai-platforms-content">
                                <?php if( !empty( $item['f_img']['url'] ) ){ ?>
                                    <div class="image">
                                        <img src="<?php echo esc_url( $item['f_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    </div>
                                <?php } ?>
                                
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-7">
                                        <div class="content">
                                            <?php if($item['list_title'] != ''): ?>
                                                <h3><?php echo wp_kses_post( $item['list_title'] ); ?></h3>
                                            <?php endif; ?>
                                            <?php if($item['list_content'] != ''): ?>
                                                <p><?php echo wp_kses_post( $item['list_content'] ); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php if($item['list_list'] != ''): ?>
                                            <?php echo wp_kses_post( $item['list_list'] ); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                        $i++; endforeach; 
                    ?>
                    
                </div>
            </div>
            <div class="ellipse1"></div>
            <div class="ellipse2"></div>
        </div>
        <!-- End AI Platforms Area -->

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Ai_Platform );