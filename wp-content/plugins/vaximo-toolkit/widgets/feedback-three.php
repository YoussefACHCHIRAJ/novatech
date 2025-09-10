<?php
/**
 * Testimonials Three Widget
 */

namespace Elementor;
class Vaximo_Testimonials_Three extends Widget_Base {

	public function get_name() {
        return 'Vaximo_Testimonials_Three';
    }

	public function get_title() {
        return __( 'Testimonials Three', 'vaximo-toolkit' );
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
            
            $items = new Repeater();
            $items->add_control(
                'image',
                [
                    'label' => __( 'Quote Image', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
            $items->add_control(
                'feedback_text_alignment',
                [
                    'label' => __( 'Choose Title Alignment', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'     => __( 'Text Align Center', 'vaximo-toolkit' ),
                        '2'     => __( 'Text Align Right', 'vaximo-toolkit' ),
                        '3'     => __( 'Text Align Left', 'vaximo-toolkit' ),
                    ],
                    'default' => '1'
                ]
            );
            $items->add_control(
                'feedback',
                [
                    'label'  => __( 'Feedback Content', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::TEXTAREA,
                ]
            );
            
            $items->add_control(
                'user_img',
                [
                    'label'   => __( 'User Image', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::MEDIA,
                ]
            );
            $items->add_control(
                'name',
                [
                    'label'   => __( 'Name', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Sarah L.', 'vaximo-toolkit'),
                ]
            );
            $items->add_control(
                'designation',
                [
                    'label'   => __( 'Designation', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('CTO of Tech', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'list_items',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $items->get_controls(),
                    'title_field' => '{{{ name }}}',
                ]
            );

            $this->add_control(
                'shape1',
                [
                    'label'   => __( 'Shape Group One', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'shape2',
                [
                    'label'   => __( 'Shape Group Two', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::MEDIA,
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
                        '{{WRAPPER}} .ns-section-title h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .ns-section-title h2',
                ]
            );
            $this->add_control(
                'feed_color',
                [
                    'label' => __( 'Feedback Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cs-testimonials-card p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'feedback_typography',
                    'label'    => __( 'Feedback Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .cs-testimonials-card p',
                ]
            );
			$this->add_control(
				'name_color',
				[
					'label' => __( 'Name Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cs-testimonials-card p' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'name_typo',
                    'label'    => __( 'Name Typography', 'vaximo-toolkit' ),
                     
					'selector' => '{{WRAPPER}} .cs-testimonials-card p',
                ]
            );
            $this->add_control(
				'des_color',
				[
					'label' => __( 'Designation Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cs-testimonials-card .info .title span' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'des_typography',
                    'label'    => __( 'Designation Typography', 'vaximo-toolkit' ),
                     
					'selector' => '{{WRAPPER}} .cs-testimonials-card .info .title span',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        global $vaximo_opt;

        if( isset( $vaximo_opt['enable_lazyloader'] ) ):
            $is_lazyloader = $vaximo_opt['enable_lazyloader'];
        else:
            $is_lazyloader = true;
        endif;

        if( $is_lazyloader == true ):
            $lazy_class = 'smartify';
            $lazy_attr = 'sm-';
        else:
            $lazy_class = '';
            $lazy_attr = '';
        endif;

        $slider = $settings['list_items'];
        $count = 0;
        foreach ( $slider as $value ) {
            $count++;
        } ?>

            <!-- Start CS Testimonials Area -->
            <div class="cs-testimonials-area">
                <div class="container">
                    <div class="ns-section-title">
                        <span class="sub"><?php echo wp_kses_post( $settings['top_title'] ); ?></span>
                        <h2><?php echo wp_kses_post( $settings['title'] ); ?></h2>
                    </div>
                    <div class="cs-testimonials-slides owl-carousel owl-theme">
                        <?php foreach( $slider as $item ): 
                            // Text Alignment
                            if( $item['feedback_text_alignment' ] == '1') {
                                $alignment = 'text-center';
                            } 
                            elseif( $item['feedback_text_alignment' ] == '2') {
                                $alignment = 'text-right';
                            } else {
                                $alignment = 'text-left';
                            }
                        ?>
                        <div class="cs-testimonials-card <?php echo esc_attr( $alignment); ?>">
                            <?php if( $item['image']['url'] != '' ): ?>
                                <div class="quote">
                                    <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                                </div>
                            <?php endif; ?>
                            <p><?php echo wp_kses_post( $item['feedback'] ); ?></p>
                            <div class="info">
                                <?php if( $item['user_img']['url'] != '' ): ?>
                                    <div class="image">
                                        <img src="<?php echo esc_url( $item['user_img']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="title">
                                    <h3><?php echo wp_kses_post( $item['name'] ); ?></h3>
                                    <span><?php echo esc_html( $item['designation'] ); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?> 
                    </div>
                    <?php if( $settings['shape1']['url'] != '' ): ?>
                        <div class="cs-testimonials-wrap1">
                            <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="image">
                        </div>
                    <?php endif; ?>
                    <?php if( $settings['shape2']['url'] != '' ): ?>
                        <div class="cs-testimonials-wrap2">
                            <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="image">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- End CS Testimonials Area -->

        <?php
    }

	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Testimonials_Three );