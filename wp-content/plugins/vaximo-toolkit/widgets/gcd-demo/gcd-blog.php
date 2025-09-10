<?php 
namespace Elementor;
class Gcd_Post_Area extends Widget_Base{
    public function get_name(){
        return "Vaximo_Gcd_Post";
    }
    public function get_title(){
        return "Gcd_Posts";
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
                'sec_title_color',
                [
                    'label'     => __( 'Section Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-section-title h2, {{WRAPPER}} .gcd-section-title h3, {{WRAPPER}} .gcd-section-title h1, {{WRAPPER}} .gcd-section-title h4, {{WRAPPER}} .gcd-section-title h5, {{WRAPPER}} .gcd-section-title h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_sectitle',
                    'label'    => __( 'Section Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .gcd-section-title h2, {{WRAPPER}} .gcd-section-title h3, {{WRAPPER}} .gcd-section-title h1, {{WRAPPER}} .gcd-section-title h4, {{WRAPPER}} .gcd-section-title h5, {{WRAPPER}} .gcd-section-title h6',
                ]
            );

            $this->add_control(
                'meta_color',
                [
                    'label' => __( 'Meta Tags Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-blog-card .content span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'meta_typography',
                    'label'    => __( 'Meta Tags Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-blog-card .content span',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-blog-card .content h3 a, {{WRAPPER}} .gcd-blog-card .content h1 a, {{WRAPPER}} .gcd-blog-card .content h2 a, {{WRAPPER}} .gcd-blog-card .content h4 a, {{WRAPPER}} .gcd-blog-card .content h5 a, {{WRAPPER}} .gcd-blog-card .content h6 a, {{WRAPPER}} .single-blog-post-area .blog-content-area h3 a, {{WRAPPER}} .single-blog-post-area .blog-content-area h1 a, {{WRAPPER}} .single-blog-post-area .blog-content-area h2 a, {{WRAPPER}} .single-blog-post-area .blog-content-area h4 a, {{WRAPPER}} .single-blog-post-area .blog-content-area h5 a, {{WRAPPER}} .single-blog-post-area .blog-content-area h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .gcd-blog-card .content h3, {{WRAPPER}} .gcd-blog-card .content h1, {{WRAPPER}} .gcd-blog-card .content h2, {{WRAPPER}} .gcd-blog-card .content h4, {{WRAPPER}} .gcd-blog-card .content h5, {{WRAPPER}} .gcd-blog-card .content h6, {{WRAPPER}} .single-blog-post-area .blog-content-area h3, {{WRAPPER}} .single-blog-post-area .blog-content-area h1, {{WRAPPER}} .single-blog-post-area .blog-content-area h2, {{WRAPPER}} .single-blog-post-area .blog-content-area h4, {{WRAPPER}} .single-blog-post-area .blog-content-area h5, {{WRAPPER}} .single-blog-post-area .blog-content-area h6',
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

        <div class="gcd-blog-area pt-120 pb-95 teachers-fonts-home">
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
                    <?php
                        $loop = 1;
                        while ( $post_array->have_posts() ): $post_array->the_post();
                            $id    = get_the_ID();
                            $title = get_the_title( get_the_ID() );
                    ?>
                    <div class="<?php echo esc_attr( $column ); ?>">
                        <div class="gcd-blog-card">
                            <div class="image">
                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>">
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url($id, 'vaximo_el_post_img')); ?>" alt="<?php echo esc_attr__('blog image','vaximo-toolkit'); ?>">
                                </a>
                            </div>
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
Plugin::instance()->widgets_manager->register( new Gcd_Post_Area );