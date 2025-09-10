<?php 
namespace Elementor;
class Vax_Post_AreaTwo extends Widget_Base{
    public function get_name(){
        return "Vaximo_Post_Two";
    }
    public function get_title(){
        return "Posts Two";
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
                        '1'   => __( 'Style 1', 'vaximo-toolkit' ),
                        '2'   => __( 'Style 2', 'vaximo-toolkit' ),
                    ],
                    'default' => '1',
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
                        '{{WRAPPER}} .latest-news-card .news-content h3 a, .latest-news-card .news-content h1 a, .latest-news-card .news-content h2 a, .latest-news-card .news-content h4 a, .latest-news-card .news-content h5 a, .latest-news-card .news-content h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}}  .latest-news-card .news-content h3 a, .latest-news-card .news-content h1 a, .latest-news-card .news-content h2 a, .latest-news-card .news-content h4 a, .latest-news-card .news-content h5 a, .latest-news-card .news-content h6 a',
                ]
            );
            $this->add_control(
                'content_color',
                [
                    'label' => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .latest-news-card .news-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'content_typography',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .latest-news-card .news-content p',
                ]
            );
            $this->add_control(
                'arrow_bprdercolor',
                [
                    'label' => __( 'Arrow Border Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .latest-news-slides.owl-theme .owl-nav [class*=owl-]' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'arrow_iconrcolor',
                [
                    'label' => __( 'Arrow Icon Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .latest-news-slides.owl-theme .owl-nav [class*=owl-], .latest-news-slides.owl-theme .owl-nav [class*=owl-]' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'arrow_iconrhcolor',
                [
                    'label' => __( 'Arrow Icon Hover Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .latest-news-slides.owl-theme .owl-nav [class*=owl-]:hover' => 'color: {{VALUE}}',
                    ],
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

        <?php if ( $settings['choose_style']  == '1' ) : ?>
            <div class="container">
                <div class="latest-news-slides owl-carousel owl-theme">
                    <?php
                    while ( $post_array->have_posts() ): $post_array->the_post();
                        $id    = get_the_ID();
                        $title = get_the_title( get_the_ID() );
                    ?>
                    <div class="latest-news-card <?php echo $alignment; ?>">
                        <?php if( has_post_thumbnail() ){ ?>
                        <div class="news-image">
                            <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url(get_the_post_thumbnail_url($id, 'vaximo_standard_card')); ?>" alt="<?php echo esc_attr__('blog image','vaximo-toolkit'); ?>">
                            </a>
                        </div>
                        <?php } ?>

                        <div class="news-content">
                            <<?php echo esc_attr($settings['post_title_size']); ?>>
                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                    <?php echo esc_html($title); ?>
                                </a>
                            </<?php echo esc_attr($settings['post_title_size']); ?>>
                            <p><?php echo esc_html(wp_trim_words( get_the_excerpt(), $settings['excerpt'], '' )); ?></p>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        <?php elseif ( $settings['choose_style']  == '2' ) : ?>
            <div class="container-fluid">
                <div class="latest-news-slides owl-carousel owl-theme">
                    <?php
                    while ( $post_array->have_posts() ): $post_array->the_post();
                        $id    = get_the_ID();
                        $title = get_the_title( get_the_ID() );
                    ?>
                    <div class="latest-news-card white-color-content <?php echo $alignment; ?>">
                        <?php if( has_post_thumbnail() ){ ?>
                        <div class="news-image">
                            <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url(get_the_post_thumbnail_url($id, 'vaximo_standard_card')); ?>" alt="<?php echo esc_attr__('blog image','vaximo-toolkit'); ?>">
                            </a>
                        </div>
                        <?php } ?>

                        <div class="news-content">
                            <<?php echo esc_attr($settings['post_title_size']); ?>>
                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                    <?php echo esc_html($title); ?>
                                </a>
                            </<?php echo esc_attr($settings['post_title_size']); ?>>
                            <p><?php echo esc_html(wp_trim_words( get_the_excerpt(), $settings['excerpt'], '' )); ?></p>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        <?php endif; ?>
        <?php 
    }

     
}
Plugin::instance()->widgets_manager->register( new Vax_Post_AreaTwo );