<?php
namespace Elementor;
class Vaximo_ServeCard extends Widget_Base{
    public function get_name(){
        return "serve-card";
    }
    public function get_title(){
        return "Serve Card";
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
                'label' => esc_html__('Content', 'vaximo-toolkit'),
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
                'default' => '3',
            ]
        );
            $card_items = new Repeater();

            $card_items->add_control(
                'serve_text_alignment',
                [
                    'label' => __( 'Choose Title Alignment', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'     => __( 'Text Align Center', 'vaximo-toolkit' ),
                        '2'     => __( 'Text Align Right', 'vaximo-toolkit' ),
                        '3'     => __( 'Text Align Left', 'vaximo-toolkit' ),
                    ],
                    'default' => '3'
                ]
            );
            $card_items->add_control(
                'icon_type',
                [
                    'label' => __( 'Icon Type', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'font-awesome' 	=> __( 'Font Awesome', 'vaximo-toolkit' ),
                        'bxicon' 		=> __( 'Box Icon', 'vaximo-toolkit' ),
                    ],
                    'default' => 'bxicon',
                ]
            );
            $card_items->add_control(
                'card_bx_icon',
                [
                    'label' => __( 'Card Icon Class', 'vaximo-toolkit' ),
                    'type' 	=> Controls_Manager::TEXT,
                    'condition' => [
                        'icon_type' => 'bxicon'
                    ]
                ]
            );
            $card_items->add_control(
                'card_fa_icon',
                [
                    'label' => __( 'Card Icon', 'vaximo-toolkit' ),
                    'type' 	=> Controls_Manager::ICON,
                    'condition' => [
                        'icon_type' => 'font-awesome'
                    ]
                ]
            );
            $card_items->add_control(
                'card_title',
                [
                    'label' => __('Title', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                    'label_block' => true,
                ]
            );
            $card_items->add_control(
                'header_size',
                [
                    'label' => __('Title Heading Tag', 'vaximo-toolkit'),
                    'type' => Controls_Manager::SELECT,
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
            $card_items->add_control(
                'desc',
                [
                    'label'  => __('Description', 'vaximo-toolkit'),
                    'type' => Controls_Manager::WYSIWYG,
                ]
            );
            $this->add_control(
                'serve_content',
                [
                    'label'       => __( 'Add Card Content', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
                ]
            );
        $this-> end_controls_section();

        // End Tab content controls

        // Start style1 content controls
        $this-> start_controls_section(
            'content_style',
            [
                'label' => esc_html__('Card Style', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'title_color',
                [
                    'label'  => esc_html__( 'Title Color', 'vaximo-toolkit' ),
                    'type'   => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-serve h3, .single-serve h1, .single-serve h2, .single-serve h4, .single-serve h5, .single-serve h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .single-serve h3, .single-serve h1, .single-serve h2, .single-serve h4, .single-serve h5, .single-serve h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => esc_html__( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-serve p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .single-serve p',
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label'     => esc_html__( 'Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-serve i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_bordercolor',
                [
                    'label'     => esc_html__( 'Icon Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-serve i' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_bgcolor',
                [
                    'label'     => esc_html__( 'Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-serve i' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
        $this-> end_controls_section();
        // End Style content controls
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
        }

        $lists = $settings['serve_content']; ?>

			<div class="container">
				<div class="row">
                    <?php if ( $lists != '' ) :
                        foreach ( $lists as $item ) :

                            // Text Alignment
                            if( $item['serve_text_alignment' ] == '1') {
                                $alignment = 'text-center';
                            } 
                            elseif( $item['serve_text_alignment' ] == '2') {
                                $alignment = 'text-right';
                            } else {
                                $alignment = 'text-left';
                            }
                            // Card Icon
                            $card_icon = '';
                            if( $item['icon_type'] == 'bxicon' ):
                                $card_icon = $item['card_bx_icon'];
                            else:
                                $card_icon = $item['card_fa_icon'];
                            endif;
                        ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <div class="single-serve <?php echo esc_attr( $alignment); ?>">
                                <?php if( !empty( $card_icon ) ) { ?>
                                    <i class="<?php echo esc_attr( $card_icon ); ?>"></i>
                                <?php } ?>

                                <<?php echo esc_attr( $item['header_size'] ); ?>><?php echo esc_html( $item['card_title'] ); ?></<?php echo esc_attr( $item['header_size'] ); ?>>

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
Plugin::instance()->widgets_manager->register( new Vaximo_ServeCard );