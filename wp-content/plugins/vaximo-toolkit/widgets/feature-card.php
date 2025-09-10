<?php
namespace Elementor;
class Vaximo_FeatureCard extends Widget_Base{
    public function get_name(){
        return "Vaximo_FeatureCard";
    }
    public function get_title(){
        return "Feature Card";
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
                'cards_style',
                [
                    'label' => __( 'Choose Style', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => __( 'Style One', 'vaximo-toolkit' ),
                        '2'   => __( 'Style Two', 'vaximo-toolkit' ),
                    ],
                    'default' => '1',
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
                    'condition' => [
                        'cards_style' => '1',
                    ]
                ]
            );
            $this->add_control(
                'add_columns',
                [
                    'label' => __( 'Choose Columns', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '2'   => __( '2', 'vaximo-toolkit' ),
                        '3'   => __( '3', 'vaximo-toolkit' ),
                        '4'   => __( '4', 'vaximo-toolkit' ),
                    ],
                    'default' => '3',
                    'condition' => [
                        'cards_style' => '2',
                    ]
                ]
            );

            $card_items = new Repeater();
            $card_items->add_control(
                'feature_text_alignment',
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
                    'label'   => __( 'Icon Type', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'font-awesome' 	  => __( 'Font Awesome', 'vaximo-toolkit' ),
                        'bxicon' 		  => __( 'Box Icon', 'vaximo-toolkit' ),
                    ],
                    'default' => 'bxicon',
                ]
            );
            $card_items->add_control(
                'card_bx_icon',
                [
                    'label'         => __( 'Card Icon', 'vaximo-toolkit' ),
                    'type' 	        => Controls_Manager::TEXT,
                    'condition'     => [
                        'icon_type' => 'bxicon'
                    ],
                    'description'   =>  __( 'Here you can use box icon class name. Ex:bx bx-check-shield', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'card_fa_icon',
                [
                    'label'     => __( 'Card Icon', 'vaximo-toolkit' ),
                    'type' 	    => Controls_Manager::ICON,
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
                'card_desc',
                [
                    'label'  => __('Card Content', 'vaximo-toolkit'),
                    'type' => Controls_Manager::WYSIWYG,
                ]
            );
            $this->add_control(
                'card_content',
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
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            // Card Styling
            $this->add_control(
                'card_title_color',
                [
                    'label'     => __( 'Card Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_card_title',
                    'label'    => __( 'Card Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .single-features h3',
                ]
            );
            $this->add_control(
                'card_icon_color',
                [
                    'label'     => __( 'Card Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features h3 i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_desc_color',
                [
                    'label'     => __( 'Card Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_card_desc',
                    'label'    => __( 'Card Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .single-features p',
                ]
            );
            $this->add_control(
                'card_bg_color',
                [
                    'label'     => __( 'Card Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .features-area .single-features, .single-features' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_hbg_color',
                [
                    'label'     => __( 'Card Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .features-area .single-features:hover::after, .single-features::after' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_hicon_color',
                [
                    'label'     => __( 'Card Hover Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .features-area .single-features:hover h3 i, .single-features:hover h3 i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_htitle_color',
                [
                    'label'     => __( 'Card Hover Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .single-features:hover h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_hdesc_color',
                [
                    'label'     => __( 'Card Hover Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .single-features:hover p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'card_hborder_color',
                [
                    'label'     => __( 'Card Hover Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features::before' => 'background: {{VALUE}}',
                    ],
                    'condition' => [
                        'cards_style' => '2',
                    ]
                ]
            );
            $this->add_control(
                'card_border_color',
                [
                    'label'     => __( 'Card Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features::before' => 'background: {{VALUE}}',
                    ],
                    'condition' => [
                        'cards_style' => '1',
                    ]
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
            $column = 'col-lg-4 col-sm-6 offset-sm-3 offset-lg-0';
        } elseif ( $columns == '4' ) {
            $column = 'col-lg-3 col-sm-6';
        } else {
            $column = 'col-lg-4 col-sm-6';
        }

        $add_columns = $settings['add_columns'];
        if ( $add_columns  == '2' ) {
            $add_column = 'col-lg-6 col-sm-6';
            $margin     =  'mb-4';
        } elseif ( $add_columns  == '3' ) {
            $add_column = 'col-lg-4 col-sm-6 offset-sm-3 offset-lg-0 p-0';
            $margin     =  '';
        } elseif ( $add_columns == '4' ) {
            $add_column = 'col-lg-3 col-sm-6';
            $margin     =  'mb-4';
        } else {
            $add_column = 'col-lg-4 col-sm-6 p-0';
            $margin     =  '';
        }

        $lists = $settings['card_content']; ?>

        <?php if ( $settings['cards_style'] == '1' ) : ?>
            <section class="features-area-page pt-100 pb-70">
                <div class="container">
                    <div class="row">
                        <?php $columns = 1;
                        if ( $lists != '' ) :
                            foreach ( $lists as $item ) :

                                // Text Alignment
                                if( $item['feature_text_alignment' ] == '1') {
                                    $alignment = 'text-center';
                                } 
                                elseif( $item['feature_text_alignment' ] == '2') {
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
                                <?php if ( !empty( $item['card_title'] || $item['card_desc'] || $card_icon ) ) : ?>
                                    <div class="single-features <?php echo esc_attr( $alignment); ?>">
                                        <h3><i class="<?php echo esc_attr( $card_icon ); ?>"></i> <?php echo esc_html( $item['card_title'] ); ?></h3>
                                        <p><?php echo wp_kses_post( $item['card_desc'] ); ?></p>
                                        <span class="<?php echo esc_attr( $card_icon ); ?>"></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php $columns++;
                            endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="features-area pb-100">
                <div class="container">
                    <div class="row">
                        <?php $add_columns = 1;
                        if ( $lists != '' ) :
                            foreach ( $lists as $item ) :

                                // Text Alignment
                                if( $item['feature_text_alignment' ] == '1') {
                                    $alignment = 'text-center';
                                } 
                                elseif( $item['feature_text_alignment' ] == '2') {
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
                            <div class="<?php echo esc_attr( $add_column ); ?>">
                                <?php if ( !empty( $item['card_title'] || $item['card_desc'] || $card_icon ) ) : ?>
                                    <div class="single-features <?php echo esc_attr( $alignment); ?> <?php echo esc_attr( $margin); ?>">
                                        <h3><i class="<?php echo esc_attr( $card_icon ); ?>"></i> <?php echo esc_html( $item['card_title'] ); ?></h3>
                                        <p><?php echo wp_kses_post( $item['card_desc'] ); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php $add_columns++;
                            endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new Vaximo_FeatureCard );