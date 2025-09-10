<?php
/**
 * Section Widget
 */

namespace Elementor;
class Vaximo_Section extends Widget_Base {

	public function get_name() {
        return 'Section';
    }

	public function get_title() {
        return __( 'Section', 'vaximo-toolkit' );
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
                'top_title', [
                    'label' => __( 'Top Title', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'title', [
                    'label' => __( 'Title', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => __( 'Complete Website Security', 'vaximo-toolkit' ),
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
                'desc', [
                    'label' => __( 'Description', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::WYSIWYG,
                    'label_block' => true,
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
        $this->end_controls_section();

        $this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'top_title_color',
                [
                    'label' => esc_html__( 'Top Title Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title span, .section-title-six span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'top_title_typography',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .section-title span, .section-title-six span',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title h2, .section-title h1, .section-title h3, .section-title h4, .section-title h5, .section-title h6, .section-title-six h2, .section-title-six h1, .section-title-six h3, .section-title-six h4, .section-title-six h5, .section-title-six h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .section-title h2, .section-title h1, .section-title h3, .section-title h4, .section-title h5, .section-title h6, .section-title-six h2, .section-title-six h1, .section-title-six h3, .section-title-six h4, .section-title-six h5, .section-title-six h6',
                ]
            );
            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title p, .section-title ul li, .section-title-six p, .section-title-six ul li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'content_typography',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .section-title p, .section-title ul li, .section-title-six p, .section-title-six ul li',
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
                <div class="section-title <?php echo esc_attr( $alignment); ?>">
                    <?php if( !empty( $settings['top_title'] ) ) { ?>
                        <span class="top-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                    <?php } ?>

                    <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                    <?php echo wp_kses_post( $settings['desc'] ); ?>
                </div>
            </div>
        <?php else : ?>
            <div class="container">
                <div class="section-title-six <?php echo esc_attr( $alignment); ?>">
                    <?php if( !empty( $settings['top_title'] ) ) { ?>
                        <span class="top-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                    <?php } ?>

                    <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                    <?php echo wp_kses_post( $settings['desc'] ); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}

	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Section );