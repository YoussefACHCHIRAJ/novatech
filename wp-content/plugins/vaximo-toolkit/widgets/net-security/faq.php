<?php
/**
 * FAQ Widget
 */

namespace Elementor;
class Vaximo_NS_FAQ extends Widget_Base {

	public function get_name() {
        return 'Vaximo_NS_FAQ';
    }

	public function get_title() {
        return __( 'NS FAQ', 'vaximo-toolkit' );
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
				'label' => __( 'FAQ Controls', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'top_title', 
                [
                    'label'       => __( 'Top Title', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'title', 
                [
                    'label'       => __( 'Title', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'label_block' => true,
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
                'desc', 
                [
                    'label'       => __( 'Description', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );

            $faq_items = new Repeater();
            $faq_items->add_control(
                'title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'Expertise You Can Trust', 'vaximo-toolkit' ),
                ]
            );
            $faq_items->add_control(
                'content',
                [
                    'label'   => __( 'Description', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => __( 'At Vaximo, our team of cybersecurity professionals brings years of experience and industry knowledge to the table. We stay at the forefront of the latest security trends and technologies, ensuring that your business is protected by cutting-edge solutions that evolve with the threat landscape.', 'vaximo-toolkit' ),
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
                'top_title_color',
                [
                    'label' => __( 'Top Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-choose-content .sub' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'toptitle_typography',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .ns-choose-content .sub',
                     
                ]
            );
            $this->add_control(
                'sec_title_color',
                [
                    'label' => __( 'Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-choose-content .htitle' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .ns-choose-content .htitle',
                ]
            );
           
            $this->add_control(
                'desc_color',
                [
                    'label' => __( 'Content Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-choose-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
           
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'desc_typography',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .ns-choose-content p',
                ]
            );
		
            $this->add_control(
                'faqbg_color',
                [
                    'label'     => __( 'FAQ Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-choose-content .faq-accordion .accordion .accordion-item' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'faq_padding',
                [
                    'label' => esc_html__( 'FAQ Padding', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .ns-choose-content .faq-accordion .accordion .accordion-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'faq_border',
                [
                    'label' => esc_html__( 'FAQ Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .ns-choose-content .faq-accordion .accordion .accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'faqtitle_color',
                [
                    'label'     => __( 'FAQ Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .faq-accordion .accordion .accordion-title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_faqtitle',
                    'label'    => __( 'FAQ Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .faq-accordion .accordion .accordion-title',
                ]
            );
            $this->add_control(
                'faqdesc_color',
                [
                    'label'     => __( 'FAQ Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .faq-accordion .accordion .accordion-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_faqdesc',
                    'label'    => __( 'FAQ Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .faq-accordion .accordion .accordion-content p',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        global $vaximo_opt;

        $faq_item = $settings['faq_item'];
        ?>
        <div class="ns-choose-content">
            <?php if( $settings['top_title'] != '' ||  $settings['title'] != '' ||  $settings['desc'] != '') : ?>
                <span class="sub"><?php echo esc_html( $settings['top_title'] ); ?></span>
                <<?php echo esc_attr( $settings['heading_tag'] ); ?> class="htitle"><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
                <p><?php echo wp_kses_post( $settings['desc'] ); ?></p>
            <?php endif; ?>

            <div class="faq-accordion">
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
                            <i class='bx bx-chevron-right'></i>
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

        <?php
    }
}

Plugin::instance()->widgets_manager->register( new Vaximo_NS_FAQ );