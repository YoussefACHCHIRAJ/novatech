<?php
/**
 * Expert Support items Widget
 */

namespace Elementor;
class Vaximo_Gcd_ExpertSupport extends Widget_Base {

	public function get_name() {
        return 'Gcd_ExpertSupport';
    }

	public function get_title() {
        return __( 'Gcd Expert Support', 'vaximo-toolkit' );
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
				'label' => __( 'Expert Support Control', 'vaximo-toolkit' ),
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

            $faq_items = new Repeater();
                $faq_items->add_control(
                    'title',
                    [
                        'label'   => __( 'Title', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( '1. Vaximo Responder', 'vaximo-toolkit' ),
                    ]
                );
                $faq_items->add_control(
                    'content',
                    [
                        'label'   => __( 'Description', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::WYSIWYG,
                        'default' => __( 'Improve your security posture across hybrid environments using built-in, natively integrated security controls.', 'vaximo-toolkit' ),
                    ]
                );
            $this->add_control(
                'faq_item',
                [
                    'label'       => __( 'Faq Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $faq_items->get_controls(),
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
                        '{{WRAPPER}} .gcd-support-content .sub span' => 'color: {{VALUE}}',
                    ],
                ]
            );
           

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle_op',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-support-content .sub span',
                ]
            );
            
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-support-content h2, {{WRAPPER}} .gcd-support-content h3, {{WRAPPER}} .gcd-support-content h1, {{WRAPPER}} .gcd-support-content h4, {{WRAPPER}} .gcd-support-content h5, {{WRAPPER}} .gcd-support-content h6, {{WRAPPER}} .gcd-support-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
             
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .gcd-support-content h2, {{WRAPPER}} .gcd-support-content h3, {{WRAPPER}} .gcd-support-content h1, {{WRAPPER}} .gcd-support-content h4, {{WRAPPER}} .gcd-support-content h5, {{WRAPPER}} .gcd-support-content h6',
                ]
            );
            
            $this->add_control(
                'faqtitle_color',
                [
                    'label'     => __( 'FAQ Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-support-content .faq-accordion .accordion .accordion-title, {{WRAPPER}} .gcd-support-content .faq-accordion .accordion .accordion-title i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_faqtitle',
                    'label'    => __( 'FAQ Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-support-content .faq-accordion .accordion .accordion-title',
                ]
            );
            $this->add_control(
                'faqdesc_color',
                [
                    'label'     => __( 'FAQ Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-support-content .faq-accordion .accordion .accordion-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_faqdesc',
                    'label'    => __( 'FAQ Description Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-support-content .faq-accordion .accordion .accordion-content p',
                ]
            );

        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

        $faq_item = $settings['faq_item'];

    ?>

        <div class="gcd-overview-in-item blueGradient teachers-fonts-home">
            <div class="container">
                <div class="row justify-content-center align-items-center g-5">
                    
                    <?php if( !empty( $settings['f_img']['url'] ) ){ ?>
                        <div class="col-lg-5 col-md-12">
                            <div class="gcd-support-image">
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
                        <div class="gcd-support-content">
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

                            <div class="faq-accordion">
                                <ul class="accordion">
                            
                                    <?php $loop = 1; foreach( $faq_item as $item ): 
                                        if ($loop == 1) {
                                            $active = 'active';
                                            $show = 'show';
                                        } else {
                                            $active = '';
                                            $show = '';
                                        } 
                                    ?>
                                        <li class="accordion-item">
                                            <a class="accordion-title <?php echo esc_attr( $active ); ?>" href="javascript:void(0)">
                                                <i class='bx bx-plus'></i>
                                                <?php echo esc_html( $item['title'] ); ?>
                                            </a>
                                            <div class="accordion-content <?php echo esc_attr( $show ); ?>">
                                                <p><?php echo wp_kses_post($item['content'] ); ?></p>
                                            </div>
                                        </li>
                                    <?php $loop++; endforeach; ?>
                                </ul>
                            </div>
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

Plugin::instance()->widgets_manager->register( new Vaximo_Gcd_ExpertSupport );