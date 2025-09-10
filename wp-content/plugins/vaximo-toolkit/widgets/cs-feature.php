<?php
/**
 * Feature Cs Widget
 */

namespace Elementor;
class Vaximo_Feature_Cs extends Widget_Base {

	public function get_name() {
        return 'Vaximo_Feature_Cs';
    }

	public function get_title() {
        return __( 'Cloud Security Feature', 'vaximo-toolkit' );
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
				'label' => __( 'Feature Controls', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            
            $items = new Repeater();
            $items->add_control(
                'image',
                [
                    'label' => __( 'Feature Icon', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
            $items->add_control(
                'feature_title',
                [
                    'label'  => __( 'Feature Title', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );
            $items->add_control(
                'feature',
                [
                    'label'  => __( 'Feature Content', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::TEXTAREA,
                ]
            );
            
            $this->add_control(
                'list_items',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $items->get_controls(),
                    'title_field' => '{{{ feature_title }}}',
                ]
            );

            $this->add_control(
                'bottom_content', 
                [
                    'label'       => __( 'Bottom Content', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'btn_text', 
                [
                    'label'       => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'btn_url', 
                [
                    'label'       => __( 'Button Url', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'btn_arrow', 
                [
                    'label'       => __( 'btn_arrow', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::MEDIA,
                    'label_block' => true,
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
                'sec_title_color',
                [
                    'label' => __( 'Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cs-features-card .title h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .cs-features-card .title h3',
                ]
            );
            $this->add_control(
                'feed_color',
                [
                    'label' => __( 'Feature Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cs-features-card p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'feature_typography',
                    'label'    => __( 'Feature Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .cs-features-card p',
                ]
            );
			$this->add_control(
				'con_bg_color',
				[
					'label' => __( 'Content Background Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cs-features-inner' => 'background-color: {{VALUE}}',
					],
				]
            );
			$this->add_control(
				'bottom_con_color',
				[
					'label' => __( 'Bottom Content Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cs-features-bottom-link li, .cs-features-bottom-link li a' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'bottom_con_typo',
                    'label'    => __( 'Bottom Content Typography', 'vaximo-toolkit' ),
                     
					'selector' => '{{WRAPPER}} .cs-features-bottom-link li, .cs-features-bottom-link li a',
                ]
            );
            $this->add_control(
				'area_bg_color',
				[
					'label' => __( 'Area Background Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cs-features-area' => 'background-color: {{VALUE}}',
					],
				]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        global $vaximo_opt;

        $slider = $settings['list_items'];
        $count = 0;
        foreach ( $slider as $value ) {
            $count++;
        } ?>

        <!-- Start CS Features Area -->
		<div class="cs-features-area pb-100">
			<div class="container">
				<div class="cs-features-inner">
					<div class="row justify-content-center g-5">
                        <?php foreach( $slider as $item ): ?>
                            <div class="col-xl-4 col-sm-6">
                                <div class="cs-features-card">
                                    <div class="title">
                                        <?php if( $item['image']['url'] != '' ): ?>
                                            <div class="icon">
                                                <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <h3><?php echo wp_kses_post( $item['feature_title'] ); ?></h3>
                                    </div>
                                    <p><?php echo wp_kses_post( $item['feature'] ); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?> 
					</div>
				</div>
				<ul class="cs-features-bottom-link">
					<li>
                        <?php echo wp_kses_post( $settings['bottom_content'] ); ?>
					</li>
					<li>
						<a href="<?php echo wp_kses_post( $settings['btn_url'] ); ?>">
                            <?php echo wp_kses_post( $settings['btn_text'] ); ?>
                            <?php if( $settings['btn_arrow']['url'] != '' ): ?>
							    <img src="<?php echo esc_url( $settings['btn_arrow']['url'] ); ?>" alt="arrow">
                            <?php endif; ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- End CS Features Area -->

        <?php
    }

	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Feature_Cs );