<?php
namespace Elementor;
class Vaximo_SecurityCard2 extends Widget_Base{
    public function get_name(){
        return "Vaximo_Sec_Card";
    }
    public function get_title(){
        return "Security Card Two";
    }
    public function get_icon(){
        return "eicon-info-box";
    }
    public function get_categories(){
        return ['vaximocategory'];
    }

    protected function register_controls(){
        // Tab content controls
        $this-> start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'columns',
            [
                'label' => __( 'Choose Columns', 'vaximo-toolkit' ),
                'type'  => Controls_Manager::SELECT,
                'options' => [
                    '2'   => __( '2', 'vaximo-toolkit' ),
                    '3'   => __( '3', 'vaximo-toolkit' ),
                    '4'   => __( '4', 'vaximo-toolkit' ),
                ],
                'default' => '4',
            ]
        );
        
        $feature_items = new Repeater();
        $feature_items->add_control(
            'image',
            [
                'label'  => __( 'Card Image', 'vaximo-toolkit' ),
                'type'   => Controls_Manager::MEDIA,
            ]
        );
        $feature_items->add_control(
            'card_title',
            [
                'label'       => __('Title', 'vaximo-toolkit'),
                'type'        => Controls_Manager:: TEXT,
                'label_block' => true,
            ]
        );
        $feature_items->add_control(
            'header_size',
            [
                'label' => __('Title Heading Tag', 'vaximo-toolkit'),
                'type'  => Controls_Manager::SELECT,
                    'options' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                    ],
                'default'     => 'h3',
                'label_block' => true,
            ]
        );
        $feature_items->add_control(
            'desc',
            [
                'label'  => __('Description', 'vaximo-toolkit'),
                'type'   => Controls_Manager::WYSIWYG,
            ]
        );
        $this->add_control(
            'feature_content',
            [
                'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $feature_items->get_controls(),
            ]
        );
        $this-> end_controls_section();

        // Start style1 content controls
        $this-> start_controls_section(
            'content_style',
            [
                'label'=>esc_html__('Card Style', 'vaximo-toolkit'),
                'tab'=> Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'card_color',
                [
                    'label' => esc_html__( 'Card Background Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-seku-features-card' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-seku-features-card h3, .single-seku-features-card h1, .single-seku-features-card h2, .single-seku-features-card h4, .single-seku-features-card h5, .single-seku-features-card h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_title',
                    'label' => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .single-seku-features-card h3, .single-seku-features-card h1, .single-seku-features-card h2, .single-seku-features-card h4, .single-seku-features-card h5, .single-seku-features-card h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label' => esc_html__( 'Description Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-seku-features-card p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_desc',
                    'label' => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .single-seku-features-card p',
                ]
            );
            $this->add_control(
                'inner_divi',
                [
                    'type'      => Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'sec_bghead',
                [
                    'label'     => esc_html__( 'Card Background Hover', 'cyarb-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'     => 'cardbg_hcolor',
                    'types'    => ['gradient' ],
                    'selector' => '{{WRAPPER}} .single-seku-features-card::after',
                ]
            );
            $this->add_control(
                'inner_div2',
                [
                    'type'      => Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'titleh_color',
                [
                    'label' => esc_html__( 'Title Hover Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-seku-features-card:hover h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'desch_color',
                [
                    'label' => esc_html__( 'Description Hover Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-seku-features-card:hover p' => 'color: {{VALUE}}',
                    ],
                ]
            );
        $this-> end_controls_section();
    }

    protected function render()
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display();

        // Card Columns
        $columns = $settings['columns'];
        if ( $columns == '2' ) {
            $column = 'col-lg-6 col-sm-6';
        } elseif ( $columns == '3' ) {
            $column = 'col-lg-4 col-sm-6';
        } elseif ( $columns == '4' ) {
            $column = 'col-lg-3 col-sm-6';
        } else {
            $column = 'col-lg-4 col-sm-6';
        }
        $lists = $settings['feature_content']; ?>

        <div class="container">
            <div class="row justify-content-center">
                <?php if( $lists != '' ) :
                    foreach($lists as $item) : ?>
                    <div class="<?php echo esc_attr( $column ); ?>">
                        <div class="single-seku-features-card">
                            <?php if( $item['image']['url'] != '' ) : ?>
                            <<?php echo esc_attr( $item['header_size'] ); ?>>
                                <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>">

                                <?php echo esc_html( $item['card_title'] ); ?>
                            </<?php echo esc_attr( $item['header_size'] ); ?>>
                            <?php endif; ?>
                            <p><?php echo wp_kses_post( $item['desc'] ); ?></p>
                        </div>
                    </div>
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new Vaximo_SecurityCard2 );