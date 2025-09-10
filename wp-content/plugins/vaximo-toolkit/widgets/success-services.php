<?php
/**
 * Success Services Widget
 */

namespace Elementor;
class Vaximo_success_Services extends Widget_Base {

	public function get_name() {
        return 'Vaximo_Success_Services';
    }

	public function get_title() {
        return __( 'Success Services', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-tools';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'services_section',
			[
				'label' => __( 'Success Services', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'title', [
                    'label'       => __( 'Title', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'label_block' => true,
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
                    'label'       => __( 'Description', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::WYSIWYG,
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
            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Know Details', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'link_type',
                [
                    'label'       => __( 'Link Type', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => [
                        '1'  => __( 'Link To Page', 'vaximo-toolkit' ),
                        '2'  => __( 'External Link', 'vaximo-toolkit' ),
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
                        'link_type'    => '1',
                    ]
                ]
            );
            $this->add_control(
                'external_link',
                [
                    'label'     => __('External Link', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type'    => '2',
                    ]
                ]
            );
            //Target Page
            $this->add_control(
                'target_page',
                [
                    'label'        => __( 'Link Open In New Tab?', 'vaximo-toolkit' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Yes', 'vaximo-toolkit' ),
                    'label_off'    => __( 'No', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );
            
            $this->add_control(
                'service_text_alignment',
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

            $this->add_control(
                'header_size',
                [
                    'label' => __( 'Title Heading Tag', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
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
                'order',
                [
                    'label'   => __( 'Services Order By', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'DESC'      => __( 'DESC', 'vaximo-toolkit' ),
                        'ASC'       => __( 'ASC', 'vaximo-toolkit' ),
                    ],
                    'default' => 'DESC',
                ]
            );

            $this->add_control(
                'count',
                [
                    'label'   => __( 'Post Per Page', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => 6,
                ]
            );

            $this->add_control(
                'cat_name',
                [
                    'label' => __( 'Choose Category', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => vaximo_toolkit_get_page_services_cat_el(),
                ]
            );
        $this->end_controls_section();
        
        // Style 1 & 2
        $this->start_controls_section(
			'service_style',
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
                        '{{WRAPPER}} .success-projects-section-content h3, .success-projects-section-content h1, .success-projects-section-content h2, .success-projects-section-content h4, .success-projects-section-content h5, .success-projects-section-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .success-projects-section-content h3, .success-projects-section-content h1, .success-projects-section-content h2, .success-projects-section-content h4, .success-projects-section-content h5, .success-projects-section-content h6',
                ]
            );
            $this->add_control(
                'content_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .success-projects-section-content p, .success-projects-section-content ul li, .success-projects-section-content ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'content_typography',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .success-projects-section-content p, .success-projects-section-content ul li, .success-projects-section-content ol li',
                ]
            );
            $this->add_control(
                'post_t_color',
                [
                    'label'     => __( 'Post Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-success-projects-card .projects-content h3 a, .single-success-projects-card .projects-content h1 a, .single-success-projects-card .projects-content h2 a, .single-success-projects-card .projects-content h4 a, .single-success-projects-card .projects-content h5 a, .single-success-projects-card .projects-content h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'postt_typography',
                    'label'    => __( 'Post Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-success-projects-card .projects-content h3 a, .single-success-projects-card .projects-content h1 a, .single-success-projects-card .projects-content h2 a, .single-success-projects-card .projects-content h4 a, .single-success-projects-card .projects-content h5 a, .single-success-projects-card .projects-content h6 a',
                ]
            );
            $this->add_control(
                'btncolor',
                [
                    'label'     => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .success-projects-section-content .default-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_btn',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .success-projects-section-content .default-btn',
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
                    'label'     => esc_html__( 'Button Background', 'cyarb-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_bg_color',
                    'types'    => ['gradient' ],
                    'selector' => '{{WRAPPER}} .success-projects-section-content .default-btn',
                ]
            );
            $this->add_control(
                'inner_div2',
                [
                    'type'      => Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'btnhcolor',
                [
                    'label'     => __( 'Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .success-projects-section-content .default-btn:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btnhbgcolor',
                [
                    'label'     => __( 'Button Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn::before, .default-btn::after' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        // Text Alignment
        if( $settings['service_text_alignment' ] == '1') {
            $alignment = 'text-center';
        } 
        elseif( $settings['service_text_alignment' ] == '2') {
            $alignment = 'text-right';
        } else {
            $alignment = 'text-left';
        }

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

        // Services Query
        if( $settings['cat_name'] != '' ) {
            $args = array(
                'post_type'         => 'service',
                'posts_per_page'    => $settings['count'],
                'order'             => $settings['order'],
                'tax_query'         => array(
                    array(
                        'taxonomy'      => 'service_cat',
                        'field'         => 'slug',
                        'terms'         => $settings['cat_name'],
                        'hide_empty'    => false,
                    )
                )
            );
        } else {
            $args = array(
                'post_type'           => 'service',
                'posts_per_page'      => $settings['count'],
                'order'               => $settings['order'],
            );
        }
        $services_array = new \WP_Query( $args );

        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
        endif;
        ?>
        <div class="success-projects-area pt-100 pb-100">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <?php if ( $settings['button_text'] != '' || $settings['title'] != '' || $settings['desc'] != '' ) : ?>
                        <div class="col-lg-4 col-md-12">
                            <div class="success-projects-section-content <?php echo $alignment; ?>">
                                <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
                                <p><?php echo wp_kses_post( $settings['desc'] ); ?></p>
                                <?php if ( $settings['button_text'] != '' ) :
                                    if ( 'yes' === $settings['target_page'] ) { ?>
                                        <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                                            <?php echo esc_html( $settings['button_text'] ); ?>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                                            <?php echo esc_html( $settings['button_text'] ); ?>
                                        </a>
                                    <?php }
                                endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="col-lg-8 col-md-12">
                        <div class="success-projects-slides owl-carousel owl-theme">
                        <?php while( $services_array->have_posts() ): 
                        $services_array->the_post();

                        if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                            $post_link = get_the_permalink();
                        } else {
                            $post_link = get_field('external_link');
                        } ?>
                            <div class="single-success-projects-card <?php echo $alignment; ?>">
                                <div class="projects-image">
                                    <a href="<?php echo esc_url( $post_link ); ?>"><img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>"></a>
                                    <div class="icon">
                                        <a href="<?php echo esc_url( $post_link ); ?>"><i class='bx bx-right-arrow-alt'></i></a>
                                    </div>
                                </div>
                                <div class="projects-content">
                                    <<?php echo esc_attr( $settings['header_size'] ); ?>>
                                    <a href="<?php echo esc_url( $post_link ); ?>"><?php the_title(); ?></a>
                                    </<?php echo esc_attr( $settings['header_size'] ); ?>>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_success_Services );