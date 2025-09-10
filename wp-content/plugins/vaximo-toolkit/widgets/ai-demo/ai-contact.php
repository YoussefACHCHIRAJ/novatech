<?php
/**
 * Contact items Widget
 */

namespace Elementor;
class Vaximo_Ai_Contact extends Widget_Base {

	public function get_name() {
        return 'Ai_Contact';
    }

	public function get_title() {
        return __( 'AI Powered Security Contact', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-form-horizontal';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Contact',
			[
				'label' => __( 'Contact Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'contact_id',
                [
                    'label'   => __( 'Contact Content Id', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'request', 'vaximo-toolkit' ),
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
                    'default' => __( 'REQUEST DEMO', 'vaximo-toolkit' ),
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
                    'default' => __( 'Schedule A Custom Demo Today', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'f_img',
                [
                    'type'    => Controls_Manager::MEDIA,
                    'label'   => __( 'Images', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'shortcode',
                [
                    'label'   => __( 'Form Shortcode', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'ai_contact_style',
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
                    'selector' => '{{WRAPPER}} .ai-request-demo-content .content .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-request-demo-content .content .sub span',
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

        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

    ?>

        <!-- Start AI Request Demo Area -->
        <div <?php if( !empty( $settings['contact_id']) ){ ?> id="<?php echo esc_attr( $settings['contact_id'] ); ?>" <?php } ?> class="ai-request-demo-area teachers-fonts-home">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="ai-request-demo-content">
                        <div class="content">
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
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="ai-request-demo-form">
                        <?php echo do_shortcode( $settings['shortcode'] ); ?>
                    </div>
                </div>
            </div>
            <div class="ellipse1"></div>
            <div class="ellipse2"></div>
        </div>
        <!-- End AI Request Demo Area -->

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Ai_Contact );