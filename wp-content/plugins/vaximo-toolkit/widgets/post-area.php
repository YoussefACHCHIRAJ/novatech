<?php 
namespace Elementor;
class Post_Area extends Widget_Base{
    public function get_name(){
        return "Vaximo_Post";
    }
    public function get_title(){
        return "Posts";
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
                'choose_style',
                [
                    'label' => __( 'Choose Style', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => __( 'Style one', 'vaximo-toolkit' ),
                        '2'   => __( 'Style two', 'vaximo-toolkit' ),
                        '3'   => __( 'Style three', 'vaximo-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );
            $this->add_control(
                'columns',
                [
                    'label' => __( 'Choose Columns', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        2   => __( '2', 'vaximo-toolkit' ),
                        3   => __( '3', 'vaximo-toolkit' ),
                        4   => __( '4', 'vaximo-toolkit' ),
                    ],
                    'default' => 3,
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
                'excerpt', [
                    'label'       => __( 'Excerpt Character Limit', 'vaximo-toolkit' ),
                    'description' => __( 'Leave the field empty to show the full excerpt. And if excerpt not found in a post, then the excerpt will take from the post content.', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::NUMBER,
                    'default'     => '20',
                    'condition'   => [
                        'choose_style'    => '1',
                    ]
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
                'title_color',
                [
                    'label' => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog .blog-content h3 a, .single-blog .blog-content h1 a, .single-blog .blog-content h2 a, .single-blog .blog-content h4 a, .single-blog .blog-content h5 a, .single-blog .blog-content h6 a, .single-blog-post-area .blog-content-area h3 a, .single-blog-post-area .blog-content-area h1 a, .single-blog-post-area .blog-content-area h2 a, .single-blog-post-area .blog-content-area h4 a, .single-blog-post-area .blog-content-area h5 a, .single-blog-post-area .blog-content-area h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .single-blog .blog-content h3, .single-blog .blog-content h1, .single-blog .blog-content h2, .single-blog .blog-content h4, .single-blog .blog-content h5, .single-blog .blog-content h6, .single-blog-post-area .blog-content-area h3, .single-blog-post-area .blog-content-area h1, .single-blog-post-area .blog-content-area h2, .single-blog-post-area .blog-content-area h4, .single-blog-post-area .blog-content-area h5, .single-blog-post-area .blog-content-area h6',
                ]
            );
            $this->add_control(
                'content_color',
                [
                    'label' => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog .blog-content p, .single-blog .blog-content .date, .single-blog-post-area .blog-content-area ul li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'content_typography',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .single-blog .blog-content p, .single-blog .blog-content .date, .single-blog-post-area .blog-content-area ul li',
                ]
            );
        $this-> end_controls_section();
    }

    protected function render() 
    {
        global $vaximo_opt;
        
        $settings = $this->get_settings_for_display(); 

        // Text Alignment
        if( $settings['post_text_alignment' ] == '1') {
            $alignment = 'text-center';
        } 
        elseif( $settings['post_text_alignment' ] == '2') {
            $alignment = 'text-right';
        } else {
            $alignment = 'text-left';
        }

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

        $columns = $settings['columns'];
        if ( $columns == 2 ) {
            $column = 'col-lg-6 col-sm-6';
        } elseif ( $columns == 4 ) {
            $column = 'col-lg-3 col-sm-6';
        } else {
            $column = 'col-lg-4 col-sm-6';
        } 
        
        
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

        <?php if ( $settings['choose_style'] == '1' ) : ?>
            <div class="container">
                <div class="row">
                    <?php 

                    $loop = 1;
                    while ( $post_array->have_posts() ): $post_array->the_post();
                        $id    = get_the_ID();
                        $title = get_the_title( get_the_ID() );

                        if ( $columns == 3 ) {
                            if( $loop == 3 && $settings['count'] == 3 ){ 
                                $column = "col-lg-4 col-sm-6 offset-sm-3 offset-lg-0";
                            } else {
                                $column = "col-lg-4 col-sm-6";
                            } 
                        }
                    ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <div class="single-blog <?php echo esc_attr( $alignment); ?>">
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url(get_the_post_thumbnail_url($id, 'vaximo_el_post_thumb')); ?>" alt="<?php echo esc_attr__('blog image','vaximo-toolkit'); ?>">

                                <div class="blog-content">
                                    <<?php echo esc_attr($settings['post_title_size']); ?>>
                                        <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    </<?php echo esc_attr($settings['post_title_size']); ?>>

                                    <p><?php echo esc_html(wp_trim_words( get_the_excerpt(), $settings['excerpt'], '' )); ?></p>

                                    <a href="<?php echo esc_url(get_the_permalink($id)); ?>" class="read-more">
                                        <?php if(isset($vaximo_opt['post_read_more'] ) && !$vaximo_opt['post_read_more'] == ''){ echo esc_html($vaximo_opt['post_read_more']); }else { echo esc_html__('Read More','vaximo-toolkit'); } ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    $loop++;
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        <?php elseif ( $settings['choose_style'] == '3' ) : ?>
            <div class="container">
                <div class="row">
                    <?php 

                    $loop = 1;
                    while ( $post_array->have_posts() ): $post_array->the_post();
                        $categories = get_the_category();
                        $id    = get_the_ID();
                        $title = get_the_title( get_the_ID() );

                        if ( $columns == 3 ) {
                            if( $loop == 3 && $settings['count'] == 3 ){ 
                                $column = "col-lg-4 col-sm-6 offset-sm-3 offset-lg-0";
                            } else {
                                $column = "col-lg-4 col-sm-6";
                            } 
                        }
                    ?>
                        <div class="<?php echo esc_attr( $column ); ?>">

                            <div class="single-blog-post-area <?php echo esc_attr( $alignment); ?>">
                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url(get_the_post_thumbnail_url($id, 'vaximo_post_thumb_550x500')); ?>" alt="<?php echo esc_attr__('blog image','vaximo-toolkit'); ?>">
                                </a>
                                
                                <div class="blog-content-area">
                                    <ul>
                                        <?php if ( ! empty( $categories ) ) { ?>
                                            <li>
                                                <i class="bx bx-purchase-tag"></i>
                                                <?php echo esc_html( $categories[0]->name ) ?>
                                            </li>
                                        <?php } ?>
                                        <li>
                                            <i class="bx bx-calendar"></i>
                                            <?php echo get_the_date( 'Y-m-d' ); ?>
                                        </li>
                                    </ul>
                                    <<?php echo esc_attr($settings['post_title_size']); ?>>
                                        <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    </<?php echo esc_attr($settings['post_title_size']); ?>>
                                </div>
                            </div>

                        </div>
                    <?php
                    $loop++;
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        <?php else : ?>
            <div class="container">
                <div class="row">
                    <?php
                    $loop = 1;
                    while ( $post_array->have_posts() ): $post_array->the_post();
                        $id    = get_the_ID();
                        $title = get_the_title( get_the_ID() );

                        if ( $columns == 3 ) {
                            if( $loop == 3 && $settings['count'] == 3 ){ 
                                $column = "col-lg-4 col-md-6 offset-md-3 offset-lg-0";
                            } else {
                                $column = "col-lg-4 col-md-6";
                            } 
                        }
                    ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <div class="single-blog <?php echo esc_attr( $alignment); ?>">
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url(get_the_post_thumbnail_url($id, 'vaximo_el_post_thumb')); ?>" alt="<?php echo esc_attr__('blog image','vaximo-toolkit'); ?>">

                                <div class="blog-content">
                                    <div class="date">
                                        <i class="bx bx-calendar"></i>
                                        <?php echo esc_html__(get_the_date('F d, Y'), 'vaximo-toolkit'); ?>
                                    </div>

                                    <<?php echo esc_attr($settings['post_title_size']); ?>>
                                        <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    </<?php echo esc_attr($settings['post_title_size']); ?>>

                                    <a href="<?php echo esc_url(get_the_permalink($id)); ?>" class="read-more mt-use">
                                        <?php if(isset($vaximo_opt['post_read_more'] ) && !$vaximo_opt['post_read_more'] == ''){ echo esc_html($vaximo_opt['post_read_more']); }else { echo esc_html__('Read More','vaximo-toolkit'); } ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    $loop++;
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        <?php endif; ?>
        <?php 
    }

     
}
Plugin::instance()->widgets_manager->register( new Post_Area );