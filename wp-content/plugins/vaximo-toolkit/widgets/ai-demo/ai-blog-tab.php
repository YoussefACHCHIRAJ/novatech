<?php

/**
 * PostTab Filter Widget
 */

namespace Elementor;

class Vaximo_AiPostTab extends Widget_Base
{

    public function get_name()
    {
        return 'AiPostTab';
    }

    public function get_title()
    {
        return __('Ai Post Tab', 'vaximo-toolkit');
    }

    public function get_icon()
    {
        return 'eicon-map-pin';
    }

    public function get_categories()
    {
        return ['vaximocategory'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'posttab_section',
            [
                'label' => __('Post Tab Area', 'vaximo-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'resources_id',
                [
                    'label'   => __( 'Resources Content Id', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'resources', 'vaximo-toolkit' ),
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
                    'default' => __( 'OUR NEWEST AI INNOVATION', 'vaximo-toolkit' ),
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
                    'default' => __( 'AI delivers better security and more efficient IT', 'vaximo-toolkit' ),
                ]
            );


            $repeater = new Repeater();

            $repeater->add_control(
                'cat_name', [
                    'label' => esc_html__( 'Select Category', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => vaximo_toolkit_get_post_cat_list(),
                ]
            );

            $repeater->add_control(
                'count',
                [
                    'label' => __( 'Post Per Tab', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::NUMBER,
                    'label_block' => true,
                    'default' => 10,
                ]
            );

            $repeater->add_control(
                'order',
                [
                    'label' => __( 'Post Order By', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'DESC'      => __( 'DESC', 'vaximo-toolkit' ),
                        'ASC'       => __( 'ASC', 'vaximo-toolkit' ),
                    ],
                    'default' => 'DESC',
                ]
            );

            $this->add_control(
                'post_cat_item',
                [
                    'label' => esc_html__('Add filter nav item', 'vaximo-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'separator' => 'before',
                    'fields' => $repeater->get_controls(),
                ]
            );

            $this->add_control(
                'card_button_text',
                [
                    'label'   => __( 'Card Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Read More', 'vaximo-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'card_button_icon',
                [
                    'label'   => __( 'Card Button Icon', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('bx bx-right-arrow-alt', 'vaximo-toolkit'),
                    'label_block' => true,
                ]
            );

        $this->end_controls_section();


        $this->start_controls_section(
            'posttab_style',
            [
                'label' => __('Style', 'vaximo-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
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
                        '{{WRAPPER}} .gcd-section-title h2, {{WRAPPER}} .gcd-section-title h3, {{WRAPPER}} .gcd-section-title h1, {{WRAPPER}} .gcd-section-title h4, {{WRAPPER}} .gcd-section-title h5, {{WRAPPER}} .gcd-section-title h6, {{WRAPPER}} .text-white' => 'color: {{VALUE}} !important',
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


            $this->add_control(
                'tab_title_color',
                [
                    'label' => esc_html__( 'Tab Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-blog-tabs .nav-item .nav-link' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'a_tab_title_color',
                [
                    'label' => esc_html__( 'Hover / Active Tab Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-blog-tabs .nav-link.active, {{WRAPPER}} .ai-blog-tabs .nav-item.show .nav-link, {{WRAPPER}} .ai-blog-tabs .nav-link:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'tab_title_bg_color',
                [
                    'label' => esc_html__( 'Tab Title Background Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-blog-tabs .nav-item .nav-link' => 'background: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'a_tab_title_bg_color',
                [
                    'label' => esc_html__( 'Hover / Active Tab Title Background Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-blog-tabs .nav-item .nav-link::before' => 'background: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'tab_typography',
                    'label' => __( 'Tab Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .post-menu .ai-blog-tabs .nav-link',
                ]
            );


           
            $this->add_control(
				'card_bg_color',
				[
					'label'     => __( 'Blog Card Background Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ai-blog-left-card, {{WRAPPER}} .ai-blog-middle-card, {{WRAPPER}} .ai-blog-right-card' => 'background: {{VALUE}} !important',
					],
				]
			);

            $this->add_control(
				'card_tg_bg_color',
				[
					'label'     => __( 'Blog Card Catagory Background Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ai-blog-left-card .tag, {{WRAPPER}} .ai-blog-middle-card .image .tag, {{WRAPPER}} .ai-blog-right-card .tag' => 'background-color: {{VALUE}}',
					],
				]
			);

            $this->add_control(
				'card_tg_color',
				[
					'label'     => __( 'Blog Catagory Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ai-blog-left-card .tag, {{WRAPPER}} .ai-blog-middle-card .image .tag, {{WRAPPER}} .ai-blog-right-card .tag' => 'color: {{VALUE}}',
					],
				]
			);

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'card_tg_typography',
                    'label'    => __( 'Blog Catagory Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .ai-blog-left-card .tag, {{WRAPPER}} .ai-blog-middle-card .image .tag, {{WRAPPER}} .ai-blog-right-card .tag',
                ]
            );

            $this->add_control(
				'card_dt_color',
				[
					'label'     => __( 'Blog Date Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ai-blog-left-card .content span, {{WRAPPER}} .ai-blog-middle-card .content span' => 'color: {{VALUE}}',
					],
				]
			);

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'card_dt_typography',
                    'label'    => __( 'Blog Date Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .ai-blog-left-card .content span, {{WRAPPER}} .ai-blog-middle-card .content span',
                ]
            );

            $this->add_control(
				'card_title_color',
				[
					'label'     => __( 'Blog Title Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ai-blog-left-card .content h3 a, {{WRAPPER}} .ai-blog-middle-card .content h3 a, {{WRAPPER}} .ai-blog-right-card .content h3 a' => 'color: {{VALUE}}',
					],
				]
			);

            $this->add_control(
				'card_title_h_color',
				[
					'label'     => __( 'Blog Title Hover Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ai-blog-left-card .content h3 a:hover, {{WRAPPER}} .ai-blog-middle-card .content h3 a:hover, {{WRAPPER}} .ai-blog-right-card .content h3 a:hover' => 'color: {{VALUE}}',
					],
				]
			);
            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'card_title_typography',
                    'label'    => __( 'Blog Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .ai-blog-left-card .content h3, {{WRAPPER}} .ai-blog-middle-card .content h3, {{WRAPPER}} .ai-blog-right-card .content h3',
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
                    'selector' => '{{WRAPPER}} .ai-blog-left-card .blog-btn, {{WRAPPER}} .ai-blog-right-card .content .blog-btn',
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
                    'selector' => '{{WRAPPER}} .ai-blog-left-card .blog-btn:hover, {{WRAPPER}} .ai-blog-right-card .content .blog-btn:hover',
                ]
            );
            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'card_btn_typography',
                    'label'    => __( 'Blog Card Button Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .ai-blog-left-card .blog-btn, {{WRAPPER}} .ai-blog-right-card .content .blog-btn',
                ]
            );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $cat_item = $settings['post_cat_item'];

        ?>

        <!-- Start AI Blog Area -->
        <div <?php if( !empty( $settings['resources_id']) ){ ?> id="<?php echo esc_attr( $settings['resources_id'] ); ?>" <?php } ?> class="ai-blog-area teachers-fonts-home pb-120">
            <div class="gcd-section-title text-start">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-7 col-md-7">
                        <?php if ( $settings['top_title_op'] == '1' ) : ?>
                            <div class="sub sub justify-content-start">
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
                        
                        <<?php echo esc_attr( $settings['heading_tag'] ); ?> class="text-white"><?php echo wp_kses_post( $settings['sec_title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
                    </div>
                    <div class="col-lg-5 col-md-5 text-end">
                        <ul class="nav nav-tabs ai-blog-tabs" id="blogTab" role="tablist">
                            <?php
                            $i = 1;
                            foreach ($cat_item as $key => $cat):
                                if( !$cat['cat_name'] == '' ) {
                                    $term = get_term_by('slug', $cat['cat_name'], 'category');
                                    $cat_count = get_category($term);
                                    if($i == 1){
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link active" id="<?php echo esc_attr($term->slug); ?>-tab" data-bs-toggle="tab" href="#<?php echo esc_attr($term->slug); ?>" role="tab" aria-controls="<?php echo esc_attr($term->slug); ?>">
                                        <?php echo esc_html($cat['cat_name']); ?>
                                    </a>
                                </li>
                            <?php
                                }else{ 
                            ?>

                                <li class="nav-item">
                                    <a class="nav-link" id="<?php echo esc_attr($term->slug); ?>-tab" data-bs-toggle="tab" href="#<?php echo esc_attr($term->slug); ?>" role="tab" aria-controls="<?php echo esc_attr($term->slug); ?>">
                                        <?php echo esc_html($cat['cat_name']); ?>
                                    </a>
                                </li>
                            <?php 
                                }
                            }
                                $i++;
                                endforeach;
                            ?> 
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="blogTabContent">

                <?php $i = 1; foreach ($cat_item as $key => $cat):
                    $term = get_term_by('slug', $cat['cat_name'], 'category');
                    if( !$cat['cat_name'] == '' ) {
                        $args_options = get_term_by('slug', $cat['cat_name'], 'category')->term_id;
                    }

                    $term = get_term_by('slug', $cat['cat_name'], 'category');

                    $args = array(
                        'post_type'     => 'post',
                        'posts_per_page'=> $cat['count'],
                        'order'         => $cat['order'],
                        'tax_query'     => array(
                            array(
                                'taxonomy'      => 'category',
                                'field'         => 'slug',
                                'terms'         => $cat['cat_name'],
                                'hide_empty'    => false
                            )
                        )
                    );

                    $post_array = new \WP_Query( $args );
                ?>

                    <div class="tab-pane fade <?php if($i == 1): ?> show active <?php endif; ?>" id="<?php echo esc_attr($term->slug); ?>" role="tabpanel">
                        <div class="row justify-content-center g-4">
                            <?php
                                $i=1;
                                while($post_array->have_posts()):
                                $post_array->the_post();

                                $id    = get_the_ID();

                                // Category 
                                $vaximo_blog_category = get_the_terms(get_the_ID(), 'category');
                                    
                                if($vaximo_blog_category && ! is_wp_error( $vaximo_blog_category )) {
                                    $blog_cat_list = array();
                                    
                                    foreach($vaximo_blog_category as $category) {
                                        $blog_cat_list[] = $category->name; 
                                        $category_link = get_category_link($category);
                                        $category_ass ='<a href="' . esc_url($category_link) .'" class="tag">' . esc_html($category->name) . ' </a>';
                                    }
                                } 

                                if($i==1):
                            ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="ai-blog-left-card">
                                        <?php if($category_ass !=''){?>
                                            <?php echo wp_kses_post($category_ass); ?>
                                        <?php } ?>
                                        <div class="content">
                                            <span>
                                                <i class='bx bx-calendar'></i>
                                                <?php echo esc_html(get_the_date()); ?>
                                            </span>
                                            <h3>
                                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </div>
                                        <?php if( $settings['card_button_text']): ?>
                                            <a href="<?php echo esc_url(get_the_permalink($id)); ?>" class="blog-btn"> <?php echo esc_html( $settings['card_button_text'] ); ?>     
                                                <?php if($settings['card_button_icon']): ?> 
                                                    <i class="<?php echo esc_attr( $settings['card_button_icon'] ); ?>"></i>
                                                <?php endif; ?>  
                                            
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php elseif($i==2): ?>

                                <div class="col-lg-4 col-md-6">
                                    <div class="ai-blog-middle-card">
                                        <div class="image">
                                            
                                            <?php if(has_post_thumbnail()): ?>
                                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>" class="d-block">
                                                    <img src="<?php the_post_thumbnail_url('vaximo_post_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                </a>
                                            <?php endif; ?>
                                            <?php if($category_ass !=''){?>
                                                <?php echo wp_kses_post($category_ass); ?>
                                            <?php } ?>
                                        </div>
                                        <div class="content">
                                            <span>
                                                <i class='bx bx-calendar'></i>
                                                <?php echo esc_html(get_the_date()); ?>
                                            </span>
                                            <h3>
                                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            
                            <?php else: ?>

                                <div class="col-lg-4 col-md-6">
                                    <div class="ai-blog-right-card">
                                        <?php if($category_ass !=''){?>
                                            <?php echo wp_kses_post($category_ass); ?>
                                        <?php } ?>
                                        <div class="content">
                                            <h3>
                                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <?php if( $settings['card_button_text']): ?>
                                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>" class="blog-btn"> <?php echo esc_html( $settings['card_button_text'] ); ?>     
                                                    <?php if($settings['card_button_icon']): ?> 
                                                        <i class="<?php echo esc_attr( $settings['card_button_icon'] ); ?>"></i>
                                                    <?php endif; ?>  
                                                
                                                </a>
                                            <?php endif; ?>
                                            
                                        </div>
                                        <?php if(has_post_thumbnail()): ?>
                                            <div class="image">
                                                <?php if(has_post_thumbnail()): ?>
                                                    <a href="<?php echo esc_url(get_the_permalink($id)); ?>" class="d-block">
                                                        <img src="<?php the_post_thumbnail_url('vaximo_post_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php endif; $i++; endwhile; ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    </div>

                <?php $i++;  endforeach; ?>
                
            </div>
            <div class="ellipse1"></div>
            <div class="ellipse2"></div>
        </div>
        <!-- End AI Blog Area -->

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Vaximo_AiPostTab);