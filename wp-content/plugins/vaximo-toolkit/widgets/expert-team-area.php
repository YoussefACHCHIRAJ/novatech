<?php
/**
 * Expert Team Area Section
 */

namespace Elementor;
class Vaximo_Expert_TeamArea extends Widget_Base {

	public function get_name() {
        return 'Vaximo_Ex_area';
    }

	public function get_title() {
        return __( 'Expert Team Area', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-tabs';
    }

	public function get_categories() {
        return ['vaximocategory'];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'feature_tabs',
			[
				'label' => __( 'Section Control', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'title', [
                    'label'       => __( 'Title', 'cavie-toolkit' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'heading_tag', [
                    'label'   => __( 'Title Heading Tag', 'cavie-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
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
            $this->add_control(
                'desc', [
                    'label' => __( 'Description', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::WYSIWYG,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'btn_title',
                [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => __( 'Button Title', 'vaximo-toolkit' ),
                ]
            );
            $this->add_control(
                'link_type',
                [
                    'label'       => __( 'Link Type', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'   => __( 'Link To Page', 'vaximo-toolkit' ),
                        '2'   => __( 'External Link', 'vaximo-toolkit' ),
                    ],
                ]
            );
            $this->add_control(
                'link_to_page',
                [
                    'label'       => __( 'Link Page', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => vaximo_toolkit_get_page_as_list(),
                    'condition'   => [
                        'link_type'     => '1',
                    ]
                ]
            );
            $this->add_control(
                'external_link',
                [
                    'label'     => __('External Link', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type'  => '2',
                    ]
                ]
            );
            $this->add_control(
                'target_page',
                [
                    'label' => __( 'Link Open In New Tab?', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'vaximo-toolkit' ),
                    'label_off' => __( 'No', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'img_position',
                [
                    'label'       => __( 'Image Position', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => [
                        'left'  => __( 'Left', 'cavie-toolkit' ),
                        'right' => __( 'Right', 'cavie-toolkit' ),
                    ],
                    'default'   => 'left',
                ]
            );
            $this->add_control(
                'image',
                [
                    'label' => __('Image', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'feature_tab_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .expert-team-content h3, .expert-team-content h1, .expert-team-content h2, .expert-team-content h4, .expert-team-content h5, .expert-team-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .expert-team-content h3, .expert-team-content h1, .expert-team-content h2, .expert-team-content h4, .expert-team-content h5, .expert-team-content h6',
                ]
            );
            $this->add_control(
                'secp_color',
                [
                    'label'     => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .expert-team-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'secp_typography',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .expert-team-content p',
                ]
            );
            $this->add_control(
                'btn_color',
                [
                    'label'     => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn_bgcolor',
                [
                    'label'     => __( 'Button Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn_bghcolor',
                [
                    'label'     => __( 'Button Background Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn::before, .default-btn::after' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'btn_typography',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .default-btn',
                ]
            );
        $this->end_controls_section();
    }

	protected function render() {
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

        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link($settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
        endif;

        if ( 'left' == $settings['img_position'] ) {
            $divcls = 'expert-team-content with-left';
        }else {
            $divcls = 'expert-team-content';
        }

        ?>

        <div class="expert-team-area ptb-100">
			<div class="container">
				<div class="row align-items-center">
                    <?php if ( 'left' == $settings['img_position'] ) { ?>
                        <?php if ( $settings['image']['url'] != '' ) { ?>
                            <div class="col-lg-6 col-md-12">
                                <div class="expert-team-image">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <?php if( $settings['image']['url'] != '' ) : ?>
                        <div class="col-lg-6 col-md-12">
                    <?php else: ?>
                        <div class="col-lg-12 col-md-12 fullwidth">
                    <?php endif; ?>
						<div class="<?php echo $divcls; ?>">
                            <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                            <p><?php echo wp_kses_post( $settings['desc'] ); ?></p>

                            <?php if( $settings['btn_title'] != '') { ?>
                                <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                    <a class="default-btn" target="_blank" href="<?php echo esc_url( $link_source ); ?>">
                                        <?php echo esc_html( $settings['btn_title'] ); ?>
                                    </a><?php
                                } else { ?>
                                    <a class="default-btn" href="<?php echo esc_url( $link_source ); ?>">
                                        <?php echo esc_html( $settings['btn_title'] ); ?>
                                    </a><?php
                                } ?>
                            <?php } ?>
						</div>
					</div>

                    <?php if ( 'right' == $settings['img_position'] ) { ?>
                        <?php if ( $settings['image']['url'] != '' ) { ?>
                            <div class="col-lg-6 col-md-12">
                                <div class="expert-team-image">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
				</div>
			</div>
		</div>
        <?php
	}
	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Expert_TeamArea );