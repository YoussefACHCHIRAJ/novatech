<?php
/**
 * Take Control items Widget
 */

namespace Elementor;
class Vaximo_Gcd_TakeControl extends Widget_Base {

	public function get_name() {
        return 'Gcd_TakeControl';
    }

	public function get_title() {
        return __( 'Gcd Take Control', 'vaximo-toolkit' );
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
				'label' => __( 'Take Control Control', 'vaximo-toolkit' ),
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

            $card_items = new Repeater();

                $card_items->add_control(
                    'number',
                    [
                        'type'    => Controls_Manager::NUMBER,
                        'label'   => __( 'Number', 'vaximo-toolkit' ),
                        'default' => 212,
                    ]
                );
                $card_items->add_control(
                    'number_suffix',
                    [
                        'type'    => Controls_Manager::TEXT,
                        'label'   => __( 'Number Suffix', 'vaximo-toolkit' ),
                        'default' => 'M',
                    ]
                );
                $card_items->add_control(
                    'title',
                    [
                        'type'    => Controls_Manager::TEXT,
                        'label'   => __( 'Title', 'vaximo-toolkit' ),
                        'default' => __('Total World-wide User', 'vaximo-toolkit'),
                    ]
                );
                $card_items->add_control(
                    'content',
                    [
                        'type'    => Controls_Manager::TEXT,
                        'label'   => __( 'Title', 'vaximo-toolkit' ),
                        'default' => __('Join the global fight against cyber threats.', 'vaximo-toolkit'),
                    ]
                );

            $this->add_control(
                'items',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
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
                        '{{WRAPPER}} .gcd-control-content .sub span' => 'color: {{VALUE}}',
                    ],
                ]
            );
        

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle_op',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-control-content .sub span',
                ]
            ); 

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-control-content h2, {{WRAPPER}} .gcd-control-content h3, {{WRAPPER}} .gcd-control-content h1, {{WRAPPER}} .gcd-control-content h4, {{WRAPPER}} .gcd-control-content h5, {{WRAPPER}} .gcd-control-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
             
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-control-content h2, {{WRAPPER}} .gcd-control-content h3, {{WRAPPER}} .gcd-control-content h1, {{WRAPPER}} .gcd-control-content h4, {{WRAPPER}} .gcd-control-content h5, {{WRAPPER}} .gcd-control-content h6',
                ]
            );
            
            $this->add_control(
                'number_color',
                [
                    'label'     => __( 'Counter Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-control-content .control-box .item .top h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'num_typo',
                    'label'    => __( 'Counter Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .gcd-control-content .control-box .item .top h3',
                ]
            );
            $this->add_control(
                'counter_title_color',
                [
                    'label'     => __( 'Counter Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-control-content .control-box .item .top p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'counter_title_typo',
                    'label'    => __( 'Counter Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .gcd-control-content .control-box .item .top p',
                ]
            );

            $this->add_control(
                'counter_con_color',
                [
                    'label'     => __( 'Counter Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-control-content .control-box .item p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'counter_con_typo',
                    'label'    => __( 'Counter Content Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-control-content .control-box .item p',
                ]
            );

        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

    ?>

        <div class="gcd-overview-in-item purpleGradient teachers-fonts-home">
            <div class="container">
                <div class="row justify-content-center align-items-center g-5">
                    <div class="col-lg-7 col-md-12">
                        <div class="gcd-control-content">
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

                            <div class="control-box">
                                <div class="row justify-content-center g-5">
                                    <?php foreach ( $settings['items'] as $item ) : ?>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="item">
                                                <div class="top">
                                                    <?php if ( $item['number'] && $item['number_suffix'] != '' ) : ?>
                                                        <h3><span class="odometer" data-count="<?php echo esc_attr( $item['number'] ); ?>">00</span><span class="sign"><?php echo esc_html( $item['number_suffix'] ); ?></span></h3>
                                                    <?php endif; ?>
                                                    <?php if ( $item['title'] != '' ) : ?>
                                                        <p><?php echo esc_html( $item['title'] ); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if ( $item['content'] != '' ) : ?>
                                                    <p><?php echo esc_html( $item['content'] ); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php if( !empty( $settings['f_img']['url'] ) ){ ?>
                        <div class="col-lg-5 col-md-12">
                            <div class="gcd-control-image">
                                <img src="<?php echo esc_url( $settings['f_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                <?php if( !empty( $settings['s_img1']['url'] ) ){ ?>
                                    <div class="vector">
                                        <img src="<?php echo esc_url( $settings['s_img1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
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

Plugin::instance()->widgets_manager->register( new Vaximo_Gcd_TakeControl );