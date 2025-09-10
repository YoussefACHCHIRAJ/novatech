<?php
/**
 * Services Widget
 */

namespace Elementor;
class Vaximo_Services extends Widget_Base {

	public function get_name() {
        return 'Services_Area';
    }

	public function get_title() {
        return __( 'Services', 'vaximo-toolkit' );
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
                'cards_style',
                [
                    'label' => __( 'Choose Style', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => __( 'Post style one with image', 'vaximo-toolkit' ),
                        '2'   => __( 'Post style two with icon', 'vaximo-toolkit' ),
                        '3'   => __( 'Slider style one', 'vaximo-toolkit' ),
                        '4'   => __( 'Slider style two', 'vaximo-toolkit' ),
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
                        'cards_style' => '2'
                    ]
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
                'image',
                [
                    'label' => __( 'Upload Card Corner Image', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                    'condition' => [
                        'cards_style' => '2'
                    ]
                ]
            );

            $this->add_control(
				'pagination_show',
				[
					'label'        => __( 'Show Pagination?', 'vaximo-toolkit' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'Show', 'vaximo-toolkit' ),
					'label_off'    => __( 'Hide', 'vaximo-toolkit' ),
					'return_value' => 'yes',
                    'default'      => 'no',
                    'condition' => [
                        'cards_style!' => ['3','4']
                    ]
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
                        '{{WRAPPER}} .single-solutions h3, .single-solutions h1, .single-solutions h2, .single-solutions h4, .single-solutions h5, .single-solutions h6, .single-security h3,  .single-security h1, .single-security h2, .single-security h4,  .single-security h5, .single-security h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_hcolor',
                [
                    'label'     => __( 'Title Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-security:hover h3, .single-security:hover h1, .single-security:hover h2, .single-security:hover h4, .single-security:hover h5, .single-security:hover h6,  .single-solutions:hover h3, .single-solutions:hover h4, .single-solutions:hover h5, .single-solutions:hover h2, .single-solutions:hover h1' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .single-solutions h3, .single-solutions h1, .single-solutions h2, .single-solutions h4, .single-solutions h5, .single-solutions h6,  .single-security h3, .single-security h1,  .single-security h2, .single-security h4,  .single-security h5, .single-security h6',
                ]
            );
            $this->add_control(
                'content_color',
                [
                    'label'     => __( 'Excerpt Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-solutions p, .single-solutions ul li, .single-solutions ol li, .single-security p, .single-security ul li, .single-security ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'content_hcolor',
                [
                    'label'     => __( 'Excerpt Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-security:hover p, .single-security:hover ul li, .single-security:hover ol li, .single-solutions:hover p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'content_typography',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .single-solutions p, .single-solutions ul li, .single-solutions ol li, .performance-area .single-security p, .performance-area .single-security ul li, .performance-area .single-security ol li',
                ]
            );
            $this->add_control(
                'read_color',
                [
                    'label'     => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .read-more' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'readh_color',
                [
                    'label'     => __( 'Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-solutions:hover .read-more, .single-security:hover .read-more' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btn_typography',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .read-more',
                ]
            );

            $this->add_control(
                'cardbg_color',
                [
                    'label'     => __( 'Card Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-security' => 'background-color: {{VALUE}}',
                    ],

                    'condition' => [
                        'cards_style' => ['2','4'],
                    ]
                ]
            );
            $this->add_control(
                'cardbg_hcolor',
                [
                    'label'     => __( 'Card Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .single-security::before' => 'background: {{VALUE}}',
                    ],

                    'condition' => [
                        'cards_style' => ['2','4'],
                    ]
                ]
            );
            $this->add_control(
                'iconbg_hcolor',
                [
                    'label'     => __( 'Icon Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .single-security:hover span i' => 'background: {{VALUE}}',
                    ],

                    'condition' => [
                        'cards_style' => ['2','4'],
                    ]
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

        <?php if ( $settings['cards_style'] == '1' ) : ?>
            <div class="container">
                <div class="row">
                    <?php
                    if( $settings['count'] == 6 ){
                        if( $currentpost >= $settings['count'] ){
                            $i = 1;
                            while( $services_array->have_posts() ): 
                            $services_array->the_post();

                            if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                                $post_link = get_the_permalink();
                            } else {
                                $post_link = get_field('external_link');
                            } ?>

                                <?php if( $i == 1 ){ ?>
                                    <div class="col-lg-5">
                                        <div class="single-solutions" style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>);">
                                            <div class="solutions-content <?php echo esc_attr( $alignment); ?>">
                                                <<?php echo esc_attr( $settings['header_size'] ); ?>><?php the_title(); ?></<?php echo esc_attr( $settings['header_size'] ); ?>>
                                                
                                                <p>
                                                    <?php echo esc_html(get_the_excerpt()); ?>
                                                </p>

                                                <?php if( $settings['read_more'] != '' ): ?>
                                                    <a href="<?php echo esc_url( $post_link ); ?>" class="read-more"><?php echo esc_html( $settings['read_more'] ); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                
                            <?php
                            if( $i == 1 ){
                                break;
                            }
                            $i++; endwhile; ?>
                            <?php wp_reset_postdata(); ?>

                            <div class="col-lg-7">
                                <div class="row">
                                    <?php $i = 2;
                                    while( $services_array->have_posts() ): 
                                    $services_array->the_post();

                                    if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                                        $post_link = get_the_permalink();
                                    } else {
                                        $post_link = get_field('external_link');
                                    } ?>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="single-solutions" style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>);">
                                                <div class="solutions-content <?php echo esc_attr( $alignment); ?>">
                                                    <<?php echo esc_attr( $settings['header_size'] ); ?>><?php the_title(); //echo $currentpost; ?></<?php echo esc_attr( $settings['header_size'] ); ?>>

                                                    <p>
                                                        <?php echo esc_html(get_the_excerpt()); ?>
                                                    </p>

                                                    <?php if( $settings['read_more'] != '' ): ?>
                                                        <a href="<?php echo esc_url( $post_link ); ?>" class="read-more"><?php echo esc_html( $settings['read_more'] ); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    if( $i == 3 ){
                                        break;
                                    }
                                    $i++; endwhile; ?>
                                    <?php wp_reset_postdata(); ?>

                                </div>
                            </div>

                            <!-- 3rd loop for card 4,5 -->
                            <div class="col-lg-7">
                                <div class="row">
                                    <?php $i = 4;
                                    while( $services_array->have_posts() ): 
                                    $services_array->the_post();

                                    if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                                        $post_link = get_the_permalink();
                                    } else {
                                        $post_link = get_field('external_link');
                                    } ?>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="single-solutions" style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>);">
                                                <div class="solutions-content <?php echo esc_attr( $alignment); ?>">
                                                    <<?php echo esc_attr( $settings['header_size'] ); ?>><?php the_title(); ?></<?php echo esc_attr( $settings['header_size'] ); ?>>

                                                    <p>
                                                        <?php echo esc_html(get_the_excerpt()); ?>
                                                    </p>

                                                    <?php if( $settings['read_more'] != '' ): ?>
                                                        <a href="<?php echo esc_url( $post_link ); ?>" class="read-more"><?php echo esc_html( $settings['read_more'] ); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                    if( $i == 5 ){
                                        break;
                                    }
                                    $i++; endwhile; ?>
                                    <?php wp_reset_postdata(); ?>

                                </div>
                            </div>
                            
                            <!-- 4th loop for card 6 -->

                            <?php $i = 6; 
                            while( $services_array->have_posts() ): 
                            $services_array->the_post();

                            if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                                $post_link = get_the_permalink();
                            } else {
                                $post_link = get_field('external_link');
                            } ?>

                                <?php if( $i == 6 ){ ?>
                                    <div class="col-lg-5">
                                        <div class="single-solutions" style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>);">
                                            <div class="solutions-content <?php echo esc_attr( $alignment); ?>">
                                                <<?php echo esc_attr( $settings['header_size'] ); ?>><?php the_title(); ?></<?php echo esc_attr( $settings['header_size'] ); ?>>

                                                <p>
                                                    <?php echo esc_html(get_the_excerpt()); ?>
                                                </p>

                                                <?php if( $settings['read_more'] != '' ): ?>
                                                    <a href="<?php echo esc_url( $post_link ); ?>" class="read-more"><?php echo esc_html( $settings['read_more'] ); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php 
                            if( $i == 6 ){
                                break;
                            }
                            $i++; endwhile; ?>
                            <?php wp_reset_postdata();
                        } else {
                            $i = 1;
                            while( $services_array->have_posts() ): 
                            $services_array->the_post();
    
                            if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                                $post_link = get_the_permalink();
                            } else {
                                $post_link = get_field('external_link');
                            } ?>
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-solutions" style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>);">
                                        <div class="solutions-content <?php echo esc_attr( $alignment); ?>">
                                            <<?php echo esc_attr( $settings['header_size'] ); ?>><?php the_title(); ?></<?php echo esc_attr( $settings['header_size'] ); ?>>
    
                                            <p>
                                                <?php echo esc_html(get_the_excerpt()); ?>
                                            </p>
    
                                            <?php if( $settings['read_more'] != '' ): ?>
                                                <a href="<?php echo esc_url( $post_link ); ?>" class="read-more"><?php echo esc_html( $settings['read_more'] ); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++; endwhile; ?>
                            <?php wp_reset_postdata();
                        } 
                    } else {
                        $i = 1;
                        while( $services_array->have_posts() ): 
                        $services_array->the_post();

                        if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                            $post_link = get_the_permalink();
                        } else {
                            $post_link = get_field('external_link');
                        } ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-solutions" style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>);">
                                    <div class="solutions-content <?php echo esc_attr( $alignment); ?>">
                                        <<?php echo esc_attr( $settings['header_size'] ); ?>><?php the_title(); ?></<?php echo esc_attr( $settings['header_size'] ); ?>>

                                        <p>
                                            <?php echo esc_html(get_the_excerpt()); ?>
                                        </p>

                                        <?php if( $settings['read_more'] != '' ): ?>
                                            <a href="<?php echo esc_url( $post_link ); ?>" class="read-more"><?php echo esc_html( $settings['read_more'] ); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php $i++; endwhile; ?>
                        <?php wp_reset_postdata();
                    } ?>

                    <?php if ( $settings['pagination_show'] == 'yes' ) { ?>
                        <div class="col-lg-12 col-md-12">
                            <div class="pagination-area">
                                <nav aria-label="navigation">
                                <?php 
                                $big = 999999999; // need an unlikely integer
                                echo paginate_links( array(
                                    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                    'format' => '?paged=%#%',
                                    'current' => max(1, get_query_var('paged') ),
                                    'total' => $services_array->max_num_pages,
                                    //'format' => '?paged=%#%',
                                    'prev_text' => '<i class="bx bx-chevrons-left"></i>',
                                    'next_text' => '<i class="bx bx-chevrons-right"></i>',
                                ) ); ?>  
                                </nav>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php elseif( $settings['cards_style'] == '2' ): ?>
            <div class="container">
                <div class="row">
                    <?php $loop = 1; 
                    while( $services_array->have_posts() ): 
                        $services_array->the_post();

                        if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                            $post_link = get_the_permalink();
                        } else {
                            $post_link = get_field('external_link');
                        } 
                        ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <div class="single-security <?php echo esc_attr( $alignment); ?>">
                                <span>
                                    <?php if ( class_exists( 'ACF') && get_field('choose_icon_type') == 'flaticon' || class_exists( 'ACF') && get_field('choose_icon_type') == 'iconclass' ) { ?>
                                        <?php if ( get_field('choose_icon_type') == 'flaticon' ) { ?>
                                            <i class="<?php echo esc_attr( get_field('service_flaticon') ); ?>"></i> <?php
                                        }elseif (get_field('choose_icon_type') == 'iconclass' ){
                                            echo get_field('choose_fontawesome'); 
                                        }?>
                                    <?php } ?>
                                </span>
                                <<?php echo esc_attr( $settings['header_size'] ); ?>><?php the_title(); ?></<?php echo esc_attr( $settings['header_size'] ); ?>>

                                <p><?php the_excerpt(); ?></p>

                                <?php if( $settings['read_more'] != '' ): ?>
                                    <a href="<?php echo esc_url( $post_link ); ?>" class="read-more"><?php echo esc_html( $settings['read_more'] ); ?></a>
                                <?php endif; ?>

                                <?php if( $settings['image']['url'] != '' ): ?>
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr('image', 'vaximo-toolkit' ); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php $loop++; endwhile;
                    wp_reset_postdata(); ?>

                    <?php if ( $settings['pagination_show'] == 'yes' ) { ?>
                        <div class="col-lg-12 col-md-12">
                            <div class="pagination-area">
                                <nav aria-label="navigation">
                                <?php 
                                $big = 999999999; // need an unlikely integer
                                echo paginate_links( array(
                                    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                    'format' => '?paged=%#%',
                                    'current' => max(1, get_query_var('paged') ),
                                    'total' => $services_array->max_num_pages,
                                    //'format' => '?paged=%#%',
                                    'prev_text' => '<i class="bx bx-chevrons-left"></i>',
                                    'next_text' => '<i class="bx bx-chevrons-right"></i>',
                                ) ); ?>  
                                </nav>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        <?php elseif( $settings['cards_style'] == '4' ) : ?>
            <div class="container">
                <?php if ( $settings['count'] == 1 ) { ?>
                    <div class="col-lg-6 col-md-12 offset-lg-3"><?php
                    } elseif ( $settings['count'] == 2 || $settings['count'] == 3 ) { ?>
                    <div class="row"><?php
                    } else { ?>
                    <div class="single-security-wrap owl-carousel owl-theme"><?php
                    } ?>
                        <?php $loop = 1; 
                        while( $services_array->have_posts() ): 
                            $services_array->the_post();

                            if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                                $post_link = get_the_permalink();
                            } else {
                                $post_link = get_field('external_link');
                            } ?>

                            <?php if ( $settings['count'] == 2 ) { ?>
                            <div class="col-lg-6 col-md-6">
                            <?php } elseif( $settings['count'] == 3 ){ ?>
                            <div class="col-lg-4 col-md-6"> <?php
                            } ?>
                                <div class="single-security <?php echo esc_attr( $alignment); ?>">
                                    <span>
                                        
                                        <?php if ( class_exists( 'ACF') && get_field('choose_icon_type') == 'flaticon' || class_exists( 'ACF') && get_field('choose_icon_type') == 'iconclass' ) { ?>
                                            <?php if ( get_field('choose_icon_type') == 'flaticon' ) { ?>
                                                <i class="<?php echo esc_attr( get_field('service_flaticon') ); ?>"></i> <?php
                                            }elseif (get_field('choose_icon_type') == 'iconclass' ){
                                                echo get_field('choose_fontawesome'); 
                                            }?>
                                        <?php } ?>
                                
                                    </span>
                                    <<?php echo esc_attr( $settings['header_size'] ); ?>><?php the_title(); ?></<?php echo esc_attr( $settings['header_size'] ); ?>>

                                    <p><?php the_excerpt(); ?></p>

                                    <?php if( $settings['read_more'] != '' ): ?>
                                        <a href="<?php echo esc_url( $post_link ); ?>" class="read-more"><?php echo esc_html( $settings['read_more'] ); ?></a>
                                    <?php endif; ?>
                                </div>
                            <?php if ( $settings['count'] == 2 || $settings['count'] == 3 ) { ?>
                            </div>
                            <?php } ?>
                        <?php $loop++; endwhile;
                        wp_reset_postdata(); ?>

                    <?php if ( $settings['count'] == 2 || $settings['count'] == 3 ) { ?>
                    </div>
                    <?php } ?>
                    
                    </div>
                </div>
            </div>
        <?php else : ?>
			<div class="container-fluid">

                <?php if ( $settings['count'] == 1 ) { ?>
                    <div class="col-lg-6 col-md-12 offset-lg-3"><?php
                    } elseif ( $settings['count'] == 2 || $settings['count'] == 3 ) { ?>
                    <div class="row"><?php
                    } else { ?>
                    <div class="solutions-wrap owl-carousel owl-theme"><?php
                    } ?>
                        <?php while( $services_array->have_posts() ): 
                            $services_array->the_post();

                            if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                                $post_link = get_the_permalink();
                            } else {
                                $post_link = get_field('external_link');
                            } ?>

                                <?php if ( $settings['count'] == 2 ) { ?>
                                <div class="col-lg-6 col-md-6">
                                <?php } elseif( $settings['count'] == 3 ){ ?>
                                <div class="col-lg-4 col-md-6"> <?php
                                } ?>
                                    <div class="single-solutions" style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>);">
                                        <div class="solutions-content <?php echo esc_attr( $alignment); ?>">
                                            <<?php echo esc_attr( $settings['header_size'] ); ?>><?php the_title(); ?></<?php echo esc_attr( $settings['header_size'] ); ?>>

                                            <p><?php the_excerpt(); ?></p>

                                            <?php if( $settings['read_more'] != '' ): ?>
                                                <a href="<?php echo esc_url( $post_link ); ?>" class="read-more"><?php echo esc_html( $settings['read_more'] ); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php if ( $settings['count'] == 2 || $settings['count'] == 3 ) { ?>
                                </div>
                                <?php } ?>

                            <?php endwhile;
                        wp_reset_postdata(); ?>

                    </div>
                        
			</div>
        <?php endif; ?>

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Services );