<?php
/**
 * Section Widget
 */

namespace Elementor;
class Vaximo_NSSection extends Widget_Base {

	public function get_name() {
        return 'Vaximo_NSSection';
    }

	public function get_title() {
        return __( 'NS Section', 'vaximo-toolkit' );
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
				'label' => __( 'Vaximo Section', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
                    'type'  => Controls_Manager::TEXTAREA,
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
                        '{{WRAPPER}} .ns-section-title .sub' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'top_title_typography',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .ns-section-title .sub',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-section-title .htitle' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .ns-section-title .htitle',
                ]
            );
            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-section-title p, .ns-section-title ul li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'content_typography',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}}  .ns-section-title p, .ns-section-title ul li',
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

            <div class="container">
                <div class="ns-section-title <?php echo esc_attr( $alignment); ?>">
                    <?php if( !empty( $settings['top_title'] ) ) { ?>
                        <span class="sub"><?php echo esc_html( $settings['top_title'] ); ?></span>
                    <?php } ?>

                    <<?php echo esc_attr( $settings['heading_tag'] ); ?> class="htitle"><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                    <?php echo wp_kses_post( $settings['desc'] ); ?>
                </div>
            </div>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_NSSection );