<?php
/**
 * Testimonials Widget
 */

namespace Elementor;
class Vaximo_NS_Feed extends Widget_Base {

	public function get_name() {
        return 'Vaximo_NSFeed';
    }

	public function get_title() {
        return __( 'NS Feedback', 'vaximo-toolkit' );
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
				'label' => __( 'Testimonials Controls', 'vaximo-toolkit' ),
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
                    'type'        => Controls_Manager::TEXT,
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
                'quote',
                [
                    'label'  => __( 'Quote Icon', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $items = new Repeater();
            $items->add_control(
                'feedback',
                [
                    'label'  => __( 'Feedback', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::WYSIWYG,
                ]
            );
            $items->add_control(
                'user_img',
                [
                    'label'  => __( 'User Image', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $items->add_control(
                'title',
                [
                    'label'   => __( 'Name', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Kilva Dew', 'vaximo-toolkit'),
                ]
            );
            $items->add_control(
                'designation',
                [
                    'label'   => __( 'Designation', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Marketing Manager', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'list_items',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $items->get_controls(),
                    'title_field' => '{{{ title }}}',
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
                        '{{WRAPPER}} .ns-testimonials-content .content .sub' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'toptitle_typography',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .ns-testimonials-content .content .sub',
                     
                ]
            );
            $this->add_control(
                'sec_title_color',
                [
                    'label' => __( 'Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-testimonials-content .content .htitle' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .ns-testimonials-content .content .htitle',
                ]
            );
           
            $this->add_control(
                'feed_color',
                [
                    'label' => __( 'Feedback Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonials-card p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'feed_boxcolor',
                [
                    'label' => __( 'Feedback Box Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-testimonials-card' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'fbox_padding',
                [
                    'label' => esc_html__( 'Box Padding', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}}  .ns-testimonials-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'fbox_bor_rad',
                [
                    'label' => esc_html__( 'Box Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}}  .ns-testimonials-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'feed_tcolor',
                [
                    'label' => __( 'Feedback Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .ns-testimonials-card' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'feedback_typography',
                    'label'    => __( 'Feedback Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}}  .ns-testimonials-card',
                ]
            );
			$this->add_control(
				'name_color',
				[
					'label' => __( 'Name Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ns-testimonials-card .info .title h3' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'name_typo',
                    'label'    => __( 'Name Typography', 'vaximo-toolkit' ),
                     
					'selector' => '{{WRAPPER}} .ns-testimonials-card .info .title h3',
                ]
            );
            $this->add_control(
				'des_color',
				[
					'label' => __( 'Designation Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ns-testimonials-card .info .title span' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'des_typography',
                    'label'    => __( 'Designation Typography', 'vaximo-toolkit' ),
                     
					'selector' => '{{WRAPPER}} .ns-testimonials-card .info .title span',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        global $vaximo_opt;

        $slider = $settings['list_items'];
        ?>

        <div class="ns-testimonials-content">
            <?php if( $settings['top_title'] != '' ||  $settings['title'] != '' ) : ?>
                <div class="content">
                    <span class="sub"><?php echo esc_html( $settings['top_title'] ); ?></span>
                    <<?php echo esc_attr( $settings['heading_tag'] ); ?> class="htitle"><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
                </div>
            <?php endif; ?>
            
            <div class="ns-testimonials-slides owl-carousel owl-theme">
                <?php foreach( $slider as $item ): ?>
                    <div class="ns-testimonials-card">
                        <p><?php echo wp_kses_post( $item['feedback'] ); ?></p>
                        <div class="info">
                            <?php if( $item['user_img']['url'] != '' ): ?>
                                <div class="image">
                                    <img src="<?php echo esc_url( $item['user_img']['url'] ); ?>" alt="<?php echo esc_attr__('user', 'vaximo-toolkit' ); ?>">
                                </div>
                            <?php endif; ?>

                            <?php if( $item['designation'] != '' || $item['title'] != '') : ?>
                                <div class="title">
                                    <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                    <span><?php echo esc_html( $item['designation'] ); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if( $settings['quote']['url'] != '' ): ?>
                            <div class="quote">
                                <img src="<?php echo esc_url( $settings['quote']['url'] ); ?>" alt="<?php echo esc_attr__('quote', 'vaximo-toolkit' ); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register( new Vaximo_NS_Feed );