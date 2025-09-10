<?php
/**
 * Section Widget
 */

namespace Elementor;
class Vaximo_Section_Two extends Widget_Base {

	public function get_name() {
        return 'SectionTwo';
    }

	public function get_title() {
        return __( 'Section Two', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-handle';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Section',
			[
				'label' => __( 'vaximo Section', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
                'section_text_alignment',
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
            
            $this->add_control(
                'top_title_op',
                [
                    'label' => __( 'Choose Top Title Option', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'     => __( 'Top Title With Images', 'vaximo-toolkit' ),
                        '2'     => __( 'Only Top Title', 'vaximo-toolkit' ),
                    ],
                    'default' => '1'
                ]
            );

            $this->add_control(
                'top_img',
                [
                    'label'     => __('Top Tile Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                    'condition' => [
                        'top_title_op' => '1',
                    ],
                ]
            );

            $this->add_control(
                'top_title',
                [
                    'label'   => __( 'Top Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'FEATURES', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'heading_tag', [
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
                    'default'     => 'h2',
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'sec_title',
                [
                    'label'   => __( ' Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'We Believe in <strong>Quality</strong>', 'vaximo-toolkit' ),
                ]
            );

            $card_items = new Repeater();

                $card_items->add_control(
                    'logo',
                    [
                        'type'    => Controls_Manager::MEDIA,
                        'label'   => __( 'Logo', 'vaximo-toolkit' ),
                    ]
                );
       
            $this->add_control(
                'logos',
                [
                    'label'       => __( 'Add Logo', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
                    'condition' => [
                        'choose_style' => '2',
                    ],
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
                'toptitle_heading',
                [
                    'label' => esc_html__( 'Top Title Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
        
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'toptitle_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-section-title .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-section-title .sub span',
                ]
            );
            

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-section-title h2, {{WRAPPER}} .gcd-section-title h3, {{WRAPPER}} .gcd-section-title h1, {{WRAPPER}} .gcd-section-title h4, {{WRAPPER}} .gcd-section-title h5, {{WRAPPER}} .gcd-section-title h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .gcd-section-title h2, {{WRAPPER}} .gcd-section-title h3, {{WRAPPER}} .gcd-section-title h1, {{WRAPPER}} .gcd-section-title h4, {{WRAPPER}} .gcd-section-title h5, {{WRAPPER}} .gcd-section-title h6',
                ]
            );
        

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display(); 
        
        // Text Alignment
        if( $settings['section_text_alignment' ] == '1') {
            $alignment = 'text-center';
        } 
        elseif( $settings['section_text_alignment' ] == '2') {
            $alignment = 'text-right';
        } else {
            $alignment = 'text-left';
        }
        ?>

        <?php if ( $settings['choose_style'] == '1' ) : ?>
            <div class="container">
                <div class="gcd-section-title <?php echo esc_attr( $alignment); ?> teachers-fonts-home">
                    <?php if ( $settings['top_title_op'] == '1' ) : ?>
                        <div class="sub">
                            <?php if( !empty( $settings['top_img']['url'] ) ){ ?>
                                <img src="<?php echo esc_url( $settings['top_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                            <?php } ?>

                            <span><?php echo wp_kses_post($settings['top_title']); ?></span>
                        </div>
                    <?php else: ?>

                        <div class="sub">
                            <span><?php echo wp_kses_post($settings['top_title']); ?></span>
                        </div>

                    <?php endif; ?>
                    
                    <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo wp_kses_post( $settings['sec_title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
                
                </div>
            </div>
        <?php else : ?>
            <div class="container">
				<div class="gcd-section-title <?php echo esc_attr( $alignment); ?> teachers-fonts-home">
					<div class="row justify-content-center align-items-center">
						<div class="col-lg-7 col-md-7">
                            <?php if ( $settings['top_title_op'] == '1' ) : ?>
                                <div class="sub">
                                    <?php if( !empty( $settings['top_img']['url'] ) ){ ?>
                                        <img src="<?php echo esc_url( $settings['top_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    <?php } ?>

                                    <span><?php echo wp_kses_post($settings['top_title']); ?></span>
                                </div>
                            <?php else: ?>

                                <div class="sub">
                                    <span><?php echo wp_kses_post($settings['top_title']); ?></span>
                                </div>

                            <?php endif; ?>
                            
                            <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo wp_kses_post( $settings['sec_title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
                    
						</div>
						<div class="col-lg-5 col-md-5 text-end">
							<ul class="certified-list">
                                <?php foreach( $settings['logos'] as $item ): ?>
                                    <li>
                                        <img src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Logo', 'vaximo-toolkit' ); ?>">
                                    </li>
                                <?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
            </div>

        <?php endif; ?>
        <?php
	}

	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Section_Two );