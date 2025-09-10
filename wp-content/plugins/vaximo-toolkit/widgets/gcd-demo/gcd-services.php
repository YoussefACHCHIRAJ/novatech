<?php
/**
 * Government Cyber Defense Services Widget
 */

namespace Elementor;
class Gcd_Services extends Widget_Base {

	public function get_name() {
        return 'Services_Gcd';
    }

	public function get_title() {
        return __( 'Government Cyber Defense Services', 'vaximo-toolkit' );
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
				'label' => __( 'Services', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
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
                    'default' => __( 'About Vaximo', 'vaximo-toolkit' ),
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
                    'default' => __( 'Who We Are: Protecting the Nations <strong>Digital Landscape,</strong> ensuring a secure, resilient cyber space for citizens, and government.', 'vaximo-toolkit' ),
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
                'read_more',
                [
                    'label'   => __( 'Read More Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Read More', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'read_icon',
                [
                    'label'   => __( 'Read More Icon', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('bx bx-right-arrow-alt', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'link_icon',
                [
                    'label'   => __( 'Link Icon', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('bx bx-link-alt', 'vaximo-toolkit'),
                ]
            );
            
            $this->add_control(
                'shape_img1',
                [
                    'label' => __( 'Shape Images One', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'shape_img2',
                [
                    'label' => __( 'Shape Images Two', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'bottom_content',
                [
                    'label'   => __( 'Bottom Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('We support Government by multiple services.', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Bottom Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('More About Us', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'button_icon',
                [
                    'label'   => __( 'Bottom Button Icon', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('bx bx-right-arrow-alt', 'vaximo-toolkit'),
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
                        'link_type' => '1',
                    ]
                ]
            );
            $this->add_control(
                'external_link',
                [
                    'label'     => __('External Link', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

            //Target Page
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

        $this->end_controls_section();
        
       
        $this->start_controls_section(
			'service_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
                'tab'   => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'sec_bg_color',
                [
                    'label'     => __( 'Section Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-services-area' => 'background: {{VALUE}}',
                    ],
                ]
            );

           
            $this->add_control(
                'toptitle_op_heading',
                [
                    'label' => esc_html__( 'Top Title Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'toptitle_op_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-section-title .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle_op',
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
                    
                    'selector' => '{{WRAPPER}} .gcd-section-title h2, {{WRAPPER}} .gcd-section-title h3, {{WRAPPER}} .gcd-section-title h1, {{WRAPPER}} .gcd-section-title h4, {{WRAPPER}} .gcd-section-title h5, {{WRAPPER}} .gcd-section-title h6',
                ]
            );

            $this->add_control(
                'cd_title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-services-item h3 a, {{WRAPPER}} .gcd-services-item h2 a, {{WRAPPER}} .gcd-services-item h4 a, {{WRAPPER}} .gcd-services-item h1 a, {{WRAPPER}} .gcd-services-item h5 a, {{WRAPPER}} .gcd-services-item h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'cd_title_hcolor',
                [
                    'label'     => __( 'Title Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-services-item:hover h3 a, {{WRAPPER}} .gcd-services-item:hover h2 a, {{WRAPPER}} .gcd-services-item:hover h4 a, {{WRAPPER}} .gcd-services-item:hover h1 a, {{WRAPPER}} .gcd-services-item:hover h5 a, {{WRAPPER}} .gcd-services-item:hover h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-services-item h3,  {{WRAPPER}} .gcd-services-item h1,  {{WRAPPER}} .gcd-services-item h2,  {{WRAPPER}} .gcd-services-item h4,  {{WRAPPER}} .gcd-services-item h5,  {{WRAPPER}} .gcd-services-item h6',
                ]
            );

            $this->add_control(
                'read_op_heading',
                [
                    'label' => esc_html__( 'Button Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'read_op_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-services-item .content .learn-btn',
                ]
            );

            $this->add_control(
                'read_op_h_heading',
                [
                    'label' => esc_html__( 'Button Hover Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'read_op_h_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-services-item .content .learn-btn:hover',
                ]
            );
        
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btn_typography',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-services-item .content .learn-btn',
                ]
            );

            $this->add_control(
                'cardbg_color',
                [
                    'label'     => __( 'Card Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-services-item::before' => 'background-color: {{VALUE}}',
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

        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
        endif;

        // Card Columns
        $columns = $settings['columns'];
        if ( $columns == '2' ) {
            $column = 'col-lg-6 col-sm-6';
        } elseif ( $columns == '3' ) {
            $column = 'col-lg-4 col-sm-6';
        } elseif ( $columns == '4' ) {
            $column = 'col-lg-3 col-sm-6';
        }
        
        // Services Query
        if( $settings['cat_name'] != '' ) {
            $args = array(
                'post_type'         => 'service',
                'posts_per_page'    => $settings['count'],
                'order'             => $settings['order'],
                'paged'             => get_query_var('paged') ? get_query_var('paged') : 1,
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
                'paged'               => get_query_var('paged') ? get_query_var('paged') : 1
            );
        } 


        $services_array = new \WP_Query( $args );
        $postcount      = $services_array->found_posts;
        $currentpost    = $services_array->post_count;
       
       ?>

       
        <!-- Start GCD Services Area -->
		<div class="gcd-services-area pt-120 teachers-fonts-home">
			<div class="container">
				<div class="gcd-section-title">
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
				<div class="row justify-content-center">
                    <?php while( $services_array->have_posts() ): 
                    $services_array->the_post();

                    if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                        $post_link = get_the_permalink();
                    } else {
                        $post_link = get_field('external_link');
                    } ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <div class="gcd-services-item" style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>);">
                                <?php if( $settings['link_icon'] != '' ): ?>
                                    <a href="<?php echo esc_url( $post_link ); ?>" class="link-btn"><i class='<?php echo esc_attr( $settings['link_icon'] ); ?>'></i></a>
                                <?php endif; ?>

                                <div class="content">
                                    
                                    <<?php echo esc_attr( $settings['header_size'] ); ?>><a href="<?php echo esc_url( $post_link ); ?>"><?php the_title(); ?></a></<?php echo esc_attr( $settings['header_size'] ); ?>>
                                    
                                    <?php if( $settings['read_more'] != '' ): ?>
                                        <a href="<?php echo esc_url( $post_link ); ?>" class="learn-btn"><?php echo esc_html( $settings['read_more'] ); ?><?php if( $settings['read_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['read_icon'] ); ?>"></i> <?php endif; ?></a>
                                    <?php endif; ?>

                                </div>

                                <?php if( !empty( $settings['shape_img1']['url'] ) ){ ?>
                                    <div class="shape1">
                                        <img src="<?php echo esc_url( $settings['shape_img1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    </div>
                                <?php } ?>

                                <?php if( !empty( $settings['shape_img2']['url'] ) ){ ?>
                                    <div class="shape2">
                                        <img src="<?php echo esc_url( $settings['shape_img2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    
				</div>

                <?php if( $settings['bottom_content'] != '' ): ?>
                    <div class="gcd-services-bottom">
                        <p><?php echo wp_kses_post( $settings['bottom_content'] ); ?> 

                            <?php if ( $settings['button_text'] != '' ) : ?>
                                <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                    <a target="_blank" href="<?php echo esc_url( $post_link ); ?>"><?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i> <?php endif; ?></a>
                                <?php } else { ?>
                                    <a href="<?php echo esc_url( $post_link ); ?>"><?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i> <?php endif; ?></a><?php
                                } ?>
                            <?php endif; ?>
                            
                        </p>
                    </div>
                <?php endif; ?>
			</div>
		</div>
		<!-- End GCD Services Area -->



        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Gcd_Services );