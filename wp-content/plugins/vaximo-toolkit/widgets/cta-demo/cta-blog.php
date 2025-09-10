<?php 
namespace Elementor;
class CTA_Post_Area extends Widget_Base{
    public function get_name(){
        return "Vaximo_Cta_Post";
    }
    public function get_title(){
        return "CTA_Posts";
    }
    public function get_icon(){
        return "eicon-post-list";
    }
    public function get_categories(){
        return ['vaximocategory'];
    }
    protected function register_controls(){

        $this-> start_controls_section(
            'layout_section',
            [
                'label' => __('Posts Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
            $this->add_control(
                'post_text_alignment',
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
                'cat_name',
                [
                    'label' => __( 'Choose Category', 'teciva-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => vaximo_toolkit_get_post_cat_list(),
                ]
            );
            $this->add_control(
                'post_title_size',
                [
                    'label'   => __( 'Post Title Heading Tag', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
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
                'count',
                [
                    'label'       => __( 'Show Post Count', 'vaximo-toolkit' ),
                    'default'     => __( '3', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'description' => __('if you went to see all post type -1','vaximo-toolkit')
                ]
            );

            $this->add_control(
                'order',
                [
                    'label'   => __( 'Select Order', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'DESC'  => __( 'DESC', 'vaximo-toolkit' ),
                        'ASC'   => __( 'ASC', 'vaximo-toolkit' ),
                    ],
                    'default'   => 'DESC',
                ]
            );
        $this-> end_controls_section();

        // Start Style content controls
        $this-> start_controls_section(
            'heading_style',
            [
                'label' => __('Posts Style', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'meta_color',
                [
                    'label' => __( 'Meta Tags Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-blog-card .content span, {{WRAPPER}} .gcd-blog-large-card .content span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'meta_typography',
                    'label'    => __( 'Meta Tags Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-blog-card .content span, {{WRAPPER}} .gcd-blog-large-card .content span',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-blog-card .content h3 a, {{WRAPPER}} .gcd-blog-card .content h1 a, {{WRAPPER}} .gcd-blog-card .content h2 a, {{WRAPPER}} .gcd-blog-card .content h4 a, {{WRAPPER}} .gcd-blog-card .content h5 a, {{WRAPPER}} .gcd-blog-card .content h6 a, {{WRAPPER}} .single-blog-post-area .blog-content-area h3 a, {{WRAPPER}} .single-blog-post-area .blog-content-area h1 a, {{WRAPPER}} .single-blog-post-area .blog-content-area h2 a, {{WRAPPER}} .single-blog-post-area .blog-content-area h4 a, {{WRAPPER}} .single-blog-post-area .blog-content-area h5 a, {{WRAPPER}} .single-blog-post-area .blog-content-area h6 a, {{WRAPPER}} .gcd-blog-large-card .content h3 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-blog-card .content h3, {{WRAPPER}} .gcd-blog-card .content h1, {{WRAPPER}} .gcd-blog-card .content h2, {{WRAPPER}} .gcd-blog-card .content h4, {{WRAPPER}} .gcd-blog-card .content h5, {{WRAPPER}} .gcd-blog-card .content h6, {{WRAPPER}} .single-blog-post-area .blog-content-area h3, {{WRAPPER}} .single-blog-post-area .blog-content-area h1, {{WRAPPER}} .single-blog-post-area .blog-content-area h2, {{WRAPPER}} .single-blog-post-area .blog-content-area h4, {{WRAPPER}} .single-blog-post-area .blog-content-area h5, {{WRAPPER}} .single-blog-post-area .blog-content-area h6, {{WRAPPER}} .gcd-blog-large-card .content h3',
                ]
            );
            
        $this-> end_controls_section();
    }

    protected function render() 
    {
        global $vaximo_opt;
        
        $settings = $this->get_settings_for_display(); 

       
        
        // Post Query
        if( $settings['cat_name'] != '' ) {
            $args = array(
                'post_type'     => 'post',
                'posts_per_page'=> $settings['count'],
                'order'         => $settings['order'],
                'meta_key'      => '_thumbnail_id',
                'ignore_sticky_posts' => 1,
                'tax_query'     => array(
                    array(
                        'taxonomy'      => 'category',
                        'field'         => 'slug',
                        'terms'         => $settings['cat_name'],
                        'hide_empty'    => false,
                    )
                )
            );
        } else {
            $args = array(
                'post_type'           => 'post',
                'posts_per_page'      => $settings['count'],
                'order'               => $settings['order'],
                'meta_key'            => '_thumbnail_id',
                'ignore_sticky_posts' => 1,
            );
        } 
        
        $post_array = new \WP_Query( $args );
        ?>

        <!-- Start GCD Blog Area -->
		<div class="gcd-blog-area teachers-fonts-home">
			<div class="container">
				<div class="row justify-content-center">
                    <?php
                        $loop = 1;
                        while ( $post_array->have_posts() ): $post_array->the_post();
                            $id    = get_the_ID();
                            $title = get_the_title( get_the_ID() );
                        if($loop==1):
                    ?>
                        <div class="col-lg-12 col-md-12">
                            <div class="gcd-blog-large-card">
								<?php if(get_the_post_thumbnail_url()): ?>
                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                    <img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php echo esc_attr__('blog image','vaximo-toolkit'); ?>">
                                </a>
                                <div class="content">
								<?php else: ?>
								 <div class="content rel">
								<?php endif; ?>
                                    <span>
                                        <i class='bx bx-calendar'></i>
                                        <?php echo esc_html__(get_the_date('F d, Y'), 'vaximo-toolkit'); ?>
                                    </span>
                                    <<?php echo esc_attr($settings['post_title_size']); ?>>
                                        <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    </<?php echo esc_attr($settings['post_title_size']); ?>>
                                    
                                </div>
                            </div>
                        </div>
                    <?php
                        endif;
                        $loop++;
                        endwhile;
                        wp_reset_query();
                    ?>

                    <?php
                        $loop = 1;
                        while ( $post_array->have_posts() ): $post_array->the_post();
                            $id    = get_the_ID();
                            $title = get_the_title( get_the_ID() );
                        if($loop!==1):
                    ?>
                    <div class="col-xl-4 col-md-6">
                        <div class="gcd-blog-card">
							<?php if(get_the_post_thumbnail_url()): ?>
                            <div class="image">
                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url($id, 'vaximo_el_post_img')); ?>" alt="<?php echo esc_attr__('blog image','vaximo-toolkit'); ?>">
                                </a>
                            </div>
							<?php endif; ?>
							
                            <div class="content">
                                <span>
                                    <i class='bx bx-calendar'></i>
                                    <?php echo esc_html__(get_the_date('F d, Y'), 'vaximo-toolkit'); ?>
                                </span>
                                <<?php echo esc_attr($settings['post_title_size']); ?>>
                                    <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                        <?php echo esc_html($title); ?>
                                    </a>
                                </<?php echo esc_attr($settings['post_title_size']); ?>>
                            </div>
                        </div>
                    </div>
                    <?php
                        endif;
                        $loop++;
                        endwhile;
                        wp_reset_query();
                    ?>
				</div>
			</div>
		</div>

        <?php 
    }
}
Plugin::instance()->widgets_manager->register( new CTA_Post_Area );