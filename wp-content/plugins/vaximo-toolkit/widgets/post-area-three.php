<?php 
namespace Elementor;
class Vax_Post_AreaThree extends Widget_Base{
    public function get_name(){
        return "Vaximo_Post_Three";
    }
    public function get_title(){
        return "Posts Three";
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

            $this->add_control(
                'btn_text',
                [
                    'label'   => __('Button Text','vaximo-toolkit'),
                    'type'    => Controls_Manager:: TEXT,
                    'default' => __('Learn More', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'btn_icon',
                [
                    'label'   => __('Button Icon','vaximo-toolkit'),
                    'type'    => Controls_Manager:: MEDIA,
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
                        '{{WRAPPER}} .cs-blog-card .content h3 a, .cs-blog-card .content h1 a, .cs-blog-card .content h2 a, .cs-blog-card .content h4 a, .cs-blog-card .content h5 a, .cs-blog-card .content h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .cs-blog-card .content h3 a, .cs-blog-card .content h1 a, .cs-blog-card .content h2 a, .cs-blog-card .content h4 a, .cs-blog-card .content h5 a, .cs-blog-card .content h6 a',
                ]
            );
            $this->add_control(
                'btn_color',
                [
                    'label' => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cs-blog-card .content .blog-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btn_typography',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .cs-blog-card .content .blog-btn',
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

            <!-- Start CS Blog Area -->
            <div class="cs-blog-area pb-100">
                <div class="container">
                    <div class="row justify-content-center g-5">
                        <?php
                        while ( $post_array->have_posts() ): $post_array->the_post();
                            $id    = get_the_ID();
                            $title = get_the_title( get_the_ID() );
                        ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="cs-blog-card <?php echo $alignment; ?>">
                                <?php if( has_post_thumbnail() ){ ?>
                                    <div class="image">
                                        <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                            <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url(get_the_post_thumbnail_url($id, 'vaximo_standard_card')); ?>" alt="<?php echo esc_attr__('blog image','vaximo-toolkit'); ?>">
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="content">
                                    <<?php echo esc_attr($settings['post_title_size']); ?>>
                                        <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    </<?php echo esc_attr($settings['post_title_size']); ?>>
                                    <?php if ( $settings['btn_text'] != '' ) : ?>
                                        <a href="<?php echo esc_url(get_the_permalink($id)); ?>" class="blog-btn">
                                            <span class="link-text"><?php echo esc_html( $settings['btn_text'] ); ?></span>
                                            <?php if( $settings['btn_icon']['url'] != '' ): ?>
                                                <span class="link-icon">
                                                    <img src="<?php echo esc_url( $settings['btn_icon']['url'] ); ?>" alt="right-arrow">
                                                </span>
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        endwhile;
                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </div>
            <!-- End CS Blog Area -->

        <?php 
    }

     
}
Plugin::instance()->widgets_manager->register( new Vax_Post_AreaThree );