<?php
namespace Elementor;
class NS_AboutImages extends Widget_Base{
    public function get_name(){
        return "NSAboutImages";
    }
    public function get_title(){
        return "NS About Images";
    }
    public function get_icon(){
        return "eicon-banner";
    }
    public function get_categories(){
        return ['vaximocategory'];
    }

    protected function register_controls(){
        // Tab content controls
        $this-> start_controls_section(
            'section_content',
            [
                'label' => __('About Images', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
            $this->add_control(
                'image',
                [
                    'label' => __( ' Image One', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'image2',
                [
                    'label' => __( ' Image Two', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'c_num',
                [
                    'label'   => __( 'Counter Number', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '25',
                ]
            );
            $this->add_control(
                'c_title',
                [
                    'label'   => __( 'Counter Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __('Years of experience', 'vaximo-toolkit'),
                ]
            );
           
        $this-> end_controls_section();

        // End Tab content controls

        // Start style1 content controls
        $this-> start_controls_section(
            'content_style',
            [
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'box_color',
                [
                    'label'     => __( 'Box Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-about-image .fun-facts-wrap' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_padding',
                [
                    'label' => esc_html__( 'Box Padding', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .ns-about-image .fun-facts-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'box_bor_radius',
                [
                    'label' => esc_html__( 'Box Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .ns-about-image .fun-facts-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'cnum_color',
                [
                    'label'     => __( 'Number Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-about-image .fun-facts-wrap h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_cnum',
                    'label'    => __( 'Number Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ns-about-image .fun-facts-wrap h3',
                ]
            );
            $this->add_control(
                'ctext_color',
                [
                    'label'     => __( 'Counter Text Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-about-image .fun-facts-wrap h3 .sign' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_ctext',
                    'label'    => __( 'Counter Text Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ns-about-image .fun-facts-wrap h3 .sign',
                ]
            );
         
        $this-> end_controls_section();
        // End Style content controls
    }

    protected function render()
    {
        // Retrieve all controls value
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
        endif; ?>


        <div class="ns-about-image">
            <?php if($settings['image']['url'] != ''): ?>
                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url']); ?>" alt="<?php echo esc_attr__("image", "vaximo-toolkit"); ?>">
            <?php endif; ?>

            <?php if($settings['image2']['url'] != ''): ?>
                <div class="wrap-image">
                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image2']['url']); ?>" alt="<?php echo esc_attr__("image2", "vaximo-toolkit"); ?>">
                </div>
            <?php endif; ?>

            <?php if( $settings['c_title'] != '' ||  $settings['c_num'] != ''): ?>
                <div class="fun-facts-wrap">
                    <h3>
                        <span class="odometer" data-count="<?php echo esc_attr( $settings['c_num'] ); ?>">00</span>
                        <span class="sign"> <?php echo wp_kses_post( $settings['c_title'] ); ?></span>
                    </h3>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register( new NS_AboutImages );