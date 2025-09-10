<?php
/**
 * Funfacts Widget
 */

namespace Elementor;
class Vaximo_Funfacts extends Widget_Base {

	public function get_name() {
        return 'Vaximo_Funfacts';
    }

	public function get_title() {
        return __( 'Funfacts', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-counter';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'funfacts_section',
			[
				'label' => __( 'Funfacts Control', 'vaximo-toolkit' ),
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
        
            $card_items = new Repeater();

            $card_items->add_control(
                'icon_type',
                [
                    'label'   => __( 'Icon Type', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'font-awesome' 	  => __( 'Font Awesome', 'vaximo-toolkit' ),
                        'flaticon' 		  => __( 'FlatIcon', 'vaximo-toolkit' ),
                    ],
                    'default' => 'flaticon',
                ]
            );
            $card_items->add_control(
                'flat_icon',
                [
                    'label'      => __( 'Card Icon', 'vaximo-toolkit' ),
                    'type' 	     => Controls_Manager::ICON,
                    'options'    => vaximo_flaticons(),
                    'include'    => vaximo_include_flaticons(),
                    'condition'  => [
                        'icon_type' => 'flaticon'
                    ]
                ]
            );
            $card_items->add_control(
                'card_fa_icon',
                [
                    'type'      => Controls_Manager::ICON,
                    'label'     => __( 'Icon', 'vaximo-toolkit' ),
                    'condition' => [
                        'icon_type' => 'font-awesome'
                    ]
                ]
            );
            $card_items->add_control(
                'number',
                [
                    'type'    => Controls_Manager::NUMBER,
                    'label'   => __( 'Number', 'vaximo-toolkit' ),
                    'default' => 324,
                ]
            );
            $card_items->add_control(
                'number_suffix',
                [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => __( 'Number Suffix', 'vaximo-toolkit' ),
                    'default' => '+',
                ]
            );
            $card_items->add_control(
                'title',
                [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'default' => __('Clients Protection', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'items',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'counter_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'choose_style',
                [
                    'label' => __( 'Choose Style', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => __( 'Style one', 'vaximo-toolkit' ),
                        '2'   => __( 'Style two', 'vaximo-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );
            $this->add_control(
                'icon_borcolor',
                [
                    'label'     => __( 'Icon Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counters i' => 'border-color: {{VALUE}}',
                    ],
                    'condition'   => [
                        'choose_style' => '2',
                    ]
                ]
            );
            $this->add_control(
                'icon_colo2r',
                [
                    'label'     => __( 'Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counters i' => 'color: {{VALUE}}',
                    ],
                    'condition'   => [
                        'choose_style' => '2',
                    ]
                ]
            );
            $this->add_control(
                'icon_bgcolo2r',
                [
                    'label'     => __( 'Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counters i' => 'background: {{VALUE}}',
                    ],
                    'condition'   => [
                        'choose_style' => '2',
                    ]
                ]
            );
            $this->add_control(
                'icon_hcolo2r',
                [
                    'label'     => __( 'Icon Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counters:hover i' => 'color: {{VALUE}}',
                    ],
                    'condition'   => [
                        'choose_style' => '2',
                    ]
                ]
            );
            $this->add_control(
                'icon_hbgcolo2r',
                [
                    'label'     => __( 'Icon Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counters:hover i' => 'background: {{VALUE}}',
                    ],
                    'condition'   => [
                        'choose_style' => '2',
                    ]
                ]
            );
            $this->add_control(
                'right_bordercolo2r',
                [
                    'label'     => __( 'Right Side Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counters::before' => 'background: {{VALUE}}',
                    ],
                    'condition'   => [
                        'choose_style' => '2',
                    ]
                ]
            );
            $this->add_control(
                'card_bgcolor',
                [
                    'label'     => __( 'Card Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counter' => 'background-color: {{VALUE}}',
                    ],
                    'condition'   => [
                        'choose_style' => '1',
                    ]
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label'     => __( 'Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counter i' => 'color: {{VALUE}}',
                    ],
                    'condition'   => [
                        'choose_style' => '1',
                    ]
                ]
            );
            $this->add_control(
                'icon_bgcolor',
                [
                    'label'     => __( 'Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counter i' => 'background-color: {{VALUE}}',
                    ],
                    'condition'   => [
                        'choose_style' => '1',
                    ]
                ]
            );
            $this->add_control(
                'card_hicolor',
                [
                    'label'     => __( 'Card Hover Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counter:hover i' => 'color: {{VALUE}}',
                    ],
                    'condition'   => [
                        'choose_style' => '1',
                    ]
                ]
            );
            $this->add_control(
                'card_hibgcolor',
                [
                    'label'     => __( 'Card Hover Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counter:hover i' => 'background-color: {{VALUE}}',
                    ],
                    'condition'   => [
                        'choose_style' => '1',
                    ]
                ]
            );
            $this->add_control(
                'number_color',
                [
                    'label'     => __( 'Counter Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counter h2, .single-counters h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'num_typo',
                    'label'    => __( 'Counter Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .single-counter h2, .single-counters h2',
                ]
            );
            $this->add_control(
                'counter_title_color',
                [
                    'label'     => __( 'Counter Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-counter p, .single-counters p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'counter_title_typo',
                    'label'    => __( 'Counter Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .single-counter p, .single-counters p',
                ]
            );

        $this->end_controls_section();
    }

	protected function render() {
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
            $column = 'col-lg-3 col-sm-6';
        }
        
        ?>

        <?php if ( $settings['choose_style'] == '1' ) : ?>
            <div class="container">
                <div class="row">
                    <?php foreach ( $settings['items'] as $item ) : 
                        // Card Icon
                        $icon = '';
                        if( $item['icon_type'] == 'flaticon' ) :
                            $icon = $item['flat_icon'];
                        else:
                            $icon = $item['card_fa_icon'];
                        endif; ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <div class="single-counter">
                                <?php if( !empty( $icon ) ) { ?>
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                <?php } ?>
                                <h2>
                                    <span class="odometer" data-count="<?php echo esc_attr( $item['number'] ); ?>">00</span> 
                                    <span class="traget"><?php echo esc_html( $item['number_suffix'] ); ?></span>
                                </h2>

                                <p><?php echo esc_html( $item['title'] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else : ?>
            <div class="container">
                <div class="row">
                    <?php foreach ( $settings['items'] as $item ) : 
                        // Card Icon
                        $icon = '';
                        if( $item['icon_type'] == 'flaticon' ) :
                            $icon = $item['flat_icon'];
                        else:
                            $icon = $item['card_fa_icon'];
                        endif; ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <div class="single-counters">
                                <?php if( !empty( $icon ) ) { ?>
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                <?php } ?>
                                <h2>
                                    <span class="odometer" data-count="<?php echo esc_attr( $item['number'] ); ?>">00</span> 
                                    <span class="target"><?php echo esc_html( $item['number_suffix'] ); ?></span>
                                </h2>

                                <p><?php echo esc_html( $item['title'] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}
	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Funfacts );