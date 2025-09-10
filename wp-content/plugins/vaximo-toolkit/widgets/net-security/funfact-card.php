<?php
namespace Elementor;
class NS_FunFactCard extends Widget_Base{
    public function get_name(){
        return "NSFunFactCard";
    }
    public function get_title(){
        return "NS Funfact Card";
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
                'label' => __('Funfact Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
            $this->add_control(
                'image',
                [
                    'label' => __( 'Icon Image', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'c_num',
                [
                    'label'   => __( 'Counter', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                ]
            );
            $this->add_control(
                'sign',
                [
                    'label'   => __( 'Sign', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '+',
                ]
            );
            $this->add_control(
                'head_tag',
                [
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
                    'default' => 'h3',
                ]
            );
            $this->add_control(
                'content',
                [
                    'label'   => __( 'Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::WYSIWYG,
                    'default' => __('<p class="p">Cyber Projects</p>', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'desc_note1', [
                    'label' => '',
                    'type'  => Controls_Manager::RAW_HTML,
                    'raw'   => __( 'In description editor use a class in p tag. When editing the editor its remove existing p, span tag', 'vaximo-toolkit' ),
                    'content_classes' => 'elementor-warning',
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
                    'label'     => __( 'Icon Box Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-fun-facts-card .icon' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'box_hcolor',
                [
                    'label'     => __( 'Icon Box Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-fun-facts-card:hover .icon' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_bor_radius',
                [
                    'label' => esc_html__( 'Box Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .ns-fun-facts-card .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'counter_color',
                [
                    'label'     => __( 'Counter Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-fun-facts-card .title .htitle' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_counter',
                    'label'    => __( 'Counter Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}}  .ns-fun-facts-card .title .htitle',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-fun-facts-card .title p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} ..ns-fun-facts-card .title p',
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

        <div class="ns-fun-facts-card">
            <?php if($settings['image']['url'] != ''): ?>
                <div class="icon">
                    <img src="<?php echo esc_url( $settings['image']['url']); ?>" alt="<?php echo esc_attr__("icon", "vaximo-toolkit"); ?>">
                </div>
            <?php endif; ?>

            <div class="title">
                <<?php echo esc_attr( $settings['head_tag'] ); ?> class="htitle"><span class="odometer" data-count="<?php echo esc_attr( $settings['c_num'] ); ?>">00</span>
                <?php if( $settings['sign'] != ''): ?>
                    <span class="sign"><?php echo esc_html( $settings['sign'] ); ?></span>
                <?php endif; ?>
                </<?php echo esc_attr( $settings['head_tag'] ); ?>>
                <?php echo wp_kses_post( $settings['content'] ); ?>
            </div>
        </div>

        <?php
    }
}
Plugin::instance()->widgets_manager->register( new NS_FunFactCard );