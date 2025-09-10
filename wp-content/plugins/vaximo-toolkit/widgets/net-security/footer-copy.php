<?php
namespace Elementor;
class NSFooterCopy extends Widget_Base{
    public function get_name(){
        return "NS_FooterCopy";
    }
    public function get_title(){
        return "NS Footer Copyright";
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
                'label' => __('NS Footer Copyright', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
            $this->add_control(
                'shape1',
                [
                    'label' => __( 'Shape One', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'shape2',
                [
                    'label' => __( 'Shape Two', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'copy_text',
                [
                    'label'   => __( 'Copyright Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => '
                        © Vaximo is Proudly Owned by <a href="https://envytheme.com/" target="_blank">EnvyTheme</a>
                    ',
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
                'bg_color',
                [
                    'label'     => __( 'Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .copyright-style-two-with-color' => 'background-color: {{VALUE}}',
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
                        '{{WRAPPER}} .copyright-style-two-with-color' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'ctext_color',
                [
                    'label'     => __( ' Text Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .copyright-style-two-with-color p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_ctext',
                    'label'    => __( ' Text Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .copyright-style-two-with-color p',
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

        <div class="copyright-style-two-with-color">
            <p> <?php echo wp_kses_post( $settings['copy_text'] ); ?></p>
        </div>
        <?php if($settings['shape1']['url'] != ''): ?>
            <div class="footer-shape-1">
                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['shape1']['url']); ?>" alt="<?php echo esc_attr__("shape1", "vaximo-toolkit"); ?>">
            </div>
        <?php endif; ?>

        <?php if($settings['shape2']['url'] != ''): ?>
            <div class="footer-shape-2">
                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['shape2']['url']); ?>" alt="<?php echo esc_attr__("shape2", "vaximo-toolkit"); ?>">
            </div>
        <?php endif; ?>
        <div class="lines-line">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <?php
    }
}
Plugin::instance()->widgets_manager->register( new NSFooterCopy );