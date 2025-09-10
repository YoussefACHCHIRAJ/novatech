<?php
/**
 * Cta Courses Widget
 */

namespace Elementor;
class Cta_Courses extends Widget_Base {

	public function get_name() {
        return 'Courses_Cta';
    }

	public function get_title() {
        return __( 'Cta Courses', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-archive';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'courses_section',
			[
				'label' => __( 'Courses', 'vaximo-toolkit' ),
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

            $this->add_control(
                'order',
                [
                    'label'   => __( 'Courses Order By', 'vaximo-toolkit' ),
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
                    'label' => __( 'Category', 'vaximo-toolkit' ),
                    'description' => __( 'Enter the category slugs separated by commas (Eg. cat1, cat2)', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
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
                'shape_img',
                [
                    'label' => __( 'Shape Images', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'bottom_content',
                [
                    'label'   => __( 'Bottom Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('We support by training Awareness.', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Bottom Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('View All Courses', 'vaximo-toolkit'),
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
			'courses_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
                'tab'   => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'tag_text_color',
                [
                    'label'     => __( 'Tags Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-courses-item .free-btn, {{WRAPPER}} .cta-courses-item .paid-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tag_bg_color',
                [
                    'label'     => __( 'Tags Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-courses-item .free-btn, {{WRAPPER}} .cta-courses-item .paid-btn' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'tag_text_typography',
                    'label'    => __( 'Tags Text Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .cta-courses-item .free-btn, {{WRAPPER}} .cta-courses-item .paid-btn',
                ]
            );

            $this->add_control(
                'cd_title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-courses-item .content h3 a, {{WRAPPER}} .cta-courses-item .content h2 a, {{WRAPPER}} .cta-courses-item .content h4 a, {{WRAPPER}} .cta-courses-item .content h1 a, {{WRAPPER}} .cta-courses-item .content h5 a, {{WRAPPER}} .cta-courses-item .content h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'cd_title_hcolor',
                [
                    'label'     => __( 'Title Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-courses-item .content:hover h3 a, {{WRAPPER}} .cta-courses-item .content:hover h2 a, {{WRAPPER}} .cta-courses-item .content:hover h4 a, {{WRAPPER}} .cta-courses-item .content:hover h1 a, {{WRAPPER}} .cta-courses-item .content:hover h5 a, {{WRAPPER}} .cta-courses-item .content:hover h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .cta-courses-item .content h3,  {{WRAPPER}} .cta-courses-item .content h1,  {{WRAPPER}} .cta-courses-item .content h2,  {{WRAPPER}} .cta-courses-item .content h4,  {{WRAPPER}} .cta-courses-item .content h5,  {{WRAPPER}} .cta-courses-item .content h6',
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
                    'selector' => '{{WRAPPER}} .cta-courses-item .content .view-btn',
                ]
            );

            $this->add_control(
                'read_hop_heading',
                [
                    'label' => esc_html__( 'Button Hover Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'read_hop_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .cta-courses-item .content .view-btn:hover',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btn_typography',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .cta-courses-item .content .view-btn',
                ]
            );

            $this->add_control(
                'bottom_text_color',
                [
                    'label'     => __( 'Bottom Text Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .teachers-fonts-home p, {{WRAPPER}} .cta-courses-bottom p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'bottom_text_typography',
                    'label'    => __( 'Bottom Text Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .teachers-fonts-home p, {{WRAPPER}} .cta-courses-bottom p',
                ]
            );

            $this->add_control(
                'bottom_br_color',
                [
                    'label'     => __( 'Bottom Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-courses-bottom' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

           
            $this->add_control(
                'bottom_btn_color',
                [
                    'label'     => __( 'Bottom Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-courses-bottom a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'bottom_btn_h_color',
                [
                    'label'     => __( 'Bottom Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-courses-bottom a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
           
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'bottom_btn_typography',
                    'label'    => __( 'Bottom Button Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .cta-courses-bottom a',
                ]
            );
        
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

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
        
       // Coursess Query
       $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
       if( $settings['cat_name'] != '' ) {
           $args = array(
               'post_type'     => 'courses',
               'posts_per_page'=> $settings['count'],
               'order'         => $settings['order'],
               'tax_query'     => array(
                   array(
                       'taxonomy'      => 'course-category',
                       'field'         => 'slug',
                       'terms'         => explode( ',', str_replace( ' ', '', $settings['cat_name'])),
                       'hide_empty'    => false
                   )
               ),
               'paged' => get_query_var('paged') ? get_query_var('paged') : 1
           );
       } else {
           $args = array(
               'post_type'         => 'courses',
               'posts_per_page'    => $settings['count'],
               'order'             => $settings['order'],
               'paged' => get_query_var('paged') ? get_query_var('paged') : 1
           );
       }
       $courses_array = new \WP_Query( $args );
       
       ?>


        <!-- Start CTA Courses Area -->
		<div class="cta-courses-area extra-gap teachers-fonts-home">
			<div class="container">
				
				<div class="row justify-content-center">
                    <?php while( $courses_array->have_posts() ): 
                        $courses_array->the_post();

                        $idd = get_the_ID();
              
                        $course_id          = get_the_ID();
                    ?>
					<div class="col-xl-3 col-md-6">
						<div class="cta-courses-item" style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>);">
							
                            <?php
                                       
                                $is_purchasable = tutor_utils()->is_course_purchasable();
                                $price          = apply_filters( 'get_tutor_course_price', null, get_the_ID() );

                                if ( $is_purchasable && $price ) { ?>
                                    <div class="paid-btn">
                                        <?php esc_html_e( 'PAID', 'tutor' ); ?>
                                    </div>
                                <?php  } else {
                                    ?>
                                    <div class="free-btn">
                                        <?php esc_html_e( 'FREE', 'tutor' ); ?>
                                    </div>
                                    <?php
                                }
                            ?>
                            
							<div class="content">
								
                                <<?php echo esc_attr( $settings['header_size'] ); ?>><a href="<?php echo esc_url(get_the_permalink($course_id)); ?>"><?php the_title(); ?></a></<?php echo esc_attr( $settings['header_size'] ); ?>>
                                    
                                <?php if( $settings['read_more'] != '' ): ?>
                                    <a href="<?php echo esc_url(get_the_permalink($course_id)); ?>" class="view-btn"><?php echo esc_html( $settings['read_more'] ); ?><?php if( $settings['read_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['read_icon'] ); ?>"></i> <?php endif; ?></a>
                                <?php endif; ?>
							</div>

                            <?php if( !empty( $settings['shape_img']['url'] ) ){ ?>
                                <div class="shape">
                                    <img src="<?php echo esc_url( $settings['shape_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            <?php } ?>
						</div>
					</div>
                    <?php 
                        endwhile;
                    wp_reset_postdata(); 
                    
                    ?>
					
				</div>

                <?php if( $settings['bottom_content'] != '' ): ?>
                    <div class="cta-courses-bottom">
                        <p><?php echo wp_kses_post( $settings['bottom_content'] ); ?> 

                            <?php if ( $settings['button_text']  && $link_source != '' ) : ?>
                                <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                    <a target="_blank" href="<?php echo esc_url( $link_source ); ?>"><?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i> <?php endif; ?></a>
                                <?php } else { ?>
                                    <a href="<?php echo esc_url( $link_source ); ?>"><?php echo esc_html( $settings['button_text'] ); ?><?php if( $settings['button_icon'] != '' ): ?> <i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i> <?php endif; ?></a><?php
                                } ?>
                            <?php endif; ?>
                            
                        </p>
                    </div>
                <?php endif; ?>

			</div>
		</div>
		<!-- End CTA Courses Area -->


        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Cta_Courses );