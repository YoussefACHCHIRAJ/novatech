<?php
namespace Elementor;
class Vaximo_Choose_Tab extends Widget_Base{
    public function get_name(){
        return "choose-us-tab";
    }
    public function get_title(){
        return "Choose Us Tab";
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

            $card_items = new Repeater();
            $card_items->add_control(
                'choose_text_alignment',
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
                'tab_title',
                [
                    'label' => __('Tab Title', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                    'default' => __('Industry Experts', 'vaximo-toolkit'),
                    'label_block' => true,
                ]
            );
            $card_items->add_control(
                'title',
                [
                    'label' => __('Title', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                    'default' => __('Industry Experts', 'vaximo-toolkit'),
                    'label_block' => true,
                ]
            );
            $card_items->add_control(
                'desc',
                [
                    'label'  => __('Description', 'vaximo-toolkit'),
                    'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore', 'vaximo-toolkit'),
                    'type' => Controls_Manager::WYSIWYG,
                ]
            );
            $card_items->add_control(
                'image',
                [
                    'label'  => __('Featured Image', 'vaximo-toolkit'),
                    'type'   => Controls_Manager:: MEDIA,
                ]
            );
            $card_items->add_control(
                'shape_img1',
                [
                    'label'  => __('Shape Image 1', 'vaximo-toolkit'),
                    'type'   => Controls_Manager:: MEDIA,
                ]
            );
            $card_items->add_control(
                'shape_img2',
                [
                    'label'  => __('Shape Image 2', 'vaximo-toolkit'),
                    'type'   => Controls_Manager:: MEDIA,
                ]
            );
            $card_items->add_control(
                'shape_img3',
                [
                    'label'  => __('Shape Image 3', 'vaximo-toolkit'),
                    'type'   => Controls_Manager:: MEDIA,
                ]
            );
            $this->add_control(
                'choose_tab_content',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
                ]
            );
        $this-> end_controls_section();

        $this->start_controls_section(
			'feature_tab_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'title_actcolor',
                [
                    'label'     => __( 'Tab Active Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-us-six-content .tabs .current' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_actbgcolor',
                [
                    'label'     => __( 'Tab Active Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-us-six-content .tabs .current' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Tab Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-us-six-content .tabs li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'title_typography',
                    'label'    => __( 'Tab Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .choose-us-six-content .tabs li',
                ]
            );
            $this->add_control(
                'title_bgcolor',
                [
                    'label'     => __( 'Tab Title Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-us-six-content .tabs li' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'cir_bgcolor',
                [
                    'label'     => __( 'Circle Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-us-content' => 'background: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'circletitle_color',
                [
                    'label'     => __( 'Circle Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-us-content .choose-us h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'cir_title_typography',
                    'label'    => __( 'Circle Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .choose-us-content .choose-us h3',
                ]
            );
            $this->add_control(
                'circledesc_color',
                [
                    'label'     => __( 'Circle Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-us-content .choose-us p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'cir_desc_typography',
                    'label'    => __( 'Circle Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .choose-us-content .choose-us p',
                ]
            );
        $this->end_controls_section();

        // End Tab content controls
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
        endif;

        $lists = $settings['choose_tab_content']; ?>

        <div class="container">
            <div class="choose-us-six-content">
                <div class="tab">
                    <div class="row align-items-center">
                        <div class="col-lg-9">
                            <div class="tab_content">
                                <?php if ( $lists != '' ) :
                                    foreach ( $lists as $item ) : 
                                    
                                        // Text Alignment
                                        if( $item['choose_text_alignment' ] == '1') {
                                            $alignment = 'text-center';
                                        } 
                                        elseif( $item['choose_text_alignment' ] == '2') {
                                            $alignment = 'text-right';
                                        } else {
                                            $alignment = 'text-left';
                                        }
                                    ?>
                                        <div class="tabs_item">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="choose-us-content">
                                                        <div class="choose-us <?php echo esc_attr( $alignment); ?>">
                                                            <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                                            <p><?php echo wp_kses_post( $item['desc'] ); ?></p>
                                                        </div>
                                                        
                                                        <?php if( $item['shape_img1']['url'] != '' ): ?>
                                                            <div class="shape-1">
                                                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['shape_img1']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if( $item['shape_img3']['url'] != '' ): ?>
                                                            <div class="shape-3">
                                                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['shape_img3']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
        
                                                <div class="col-lg-6">
                                                    <div class="choose-us-img">
                                                        <?php if( $item['image']['url'] != '' ): ?>
                                                            <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                                                        <?php endif; ?>

                                                        <?php if( $item['shape_img2']['url'] != '' ): ?>
                                                            <div class="shape-2">
                                                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['shape_img2']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php endforeach;
                                endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <ul class="tabs">
                                <?php if ( $lists != '' ) :
                                    foreach ( $lists as $item ) : ?>
                                    <li>
                                        <i class="bx bx-chevron-left"></i>
                                        <?php echo esc_html( $item['tab_title'] ); ?>
                                    </li>
                                    <?php endforeach;
                                endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new Vaximo_Choose_Tab );