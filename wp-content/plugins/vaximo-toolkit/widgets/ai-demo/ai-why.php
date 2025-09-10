<?php
/**
 * Ai Why Widget
 */

namespace Elementor;
class Vaximo_Ai_Why extends Widget_Base {

	public function get_name() {
        return 'Ai_Why';
    }

	public function get_title() {
        return __( 'Ai Why', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Pricing_Area',
			[
				'label' => __( 'Ai Why Controls', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'why_id',
                [
                    'label'   => __( 'Why Content Id', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'why', 'vaximo-toolkit' ),
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
                    'default' => __( 'WHY VAXIMO', 'vaximo-toolkit' ),
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
                    'default' => __( 'Superior AI outcomes, delivered by the worlds largest security cloud', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'f_img',
                [
                    'label'     => __('Feature Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );


            $faq_items = new Repeater();
            $faq_items->add_control(
                'title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'Prevent attacks with integrated exposure management', 'vaximo-toolkit' ),
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
        $this->end_controls_section();

        $this->start_controls_section(
			'section_style',
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
                'faqleft_brcolor',
                [
                    'label'     => __( 'FAQ Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-why-accordion .accordion .accordion-item' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_control(
                'faqtitle_color',
                [
                    'label'     => __( 'FAQ Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-why-accordion .accordion .accordion-title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_faqtitle',
                    'label'    => __( 'FAQ Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-why-accordion .accordion .accordion-title',
                ]
            );
            $this->add_control(
                'faqdesc_color',
                [
                    'label'     => __( 'FAQ Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-why-accordion .accordion .accordion-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_faqdesc',
                    'label'    => __( 'FAQ Description Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-why-accordion .accordion .accordion-content p',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $faq_item = $settings['faq_item'];
        ?>
       
        <!-- Start AI Why Area --> 
        <div <?php if( !empty( $settings['why_id']) ){ ?> id="<?php echo esc_attr( $settings['why_id'] ); ?>" <?php } ?>  class="ai-why-area teachers-fonts-home pb-120">
            <div class="gcd-section-title text-start">
                <?php if ( $settings['top_title_op'] == '1' ) : ?>
                    <div class="sub justify-content-start">
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
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="ai-why-accordion">
                        <ul class="accordion">
                           
                            <?php $loop = 1; foreach( $faq_item as $item ): 
                            if ($loop == 1) {
                                $active = 'active';
                                $show = 'show';
                            } else {
                                $active = '';
                                $show = '';
                            } ?>
                                <li class="accordion-item">
                                    <a class="accordion-title <?php echo esc_attr( $active ); ?>" href="javascript:void(0)">
                                        <i class='bx bx-caret-down'></i>
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

                <?php if( !empty( $settings['f_img']['url'] ) ){ ?>
                    <div class="col-lg-6 col-md-12">
                        <div class="ai-why-image">
                            <img src="<?php echo esc_url( $settings['f_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="ellipse"></div>
        </div>
        <!-- End AI Why Area -->

        <?php
    }
}

Plugin::instance()->widgets_manager->register( new Vaximo_Ai_Why );