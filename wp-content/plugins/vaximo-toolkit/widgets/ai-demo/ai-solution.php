<?php
/**
 * Solution Widget
 */

namespace Elementor;
class Vaximo_SolutionSlider extends Widget_Base {

	public function get_name() {
        return 'VaximoSolutionSlider';
    }

	public function get_title() {
        return __( 'Ai Solution Slider', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-tools';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'single_pro_section',
			[
				'label' => __( 'Solution', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'solution_id',
                [
                    'label'   => __( 'Solution Content Id', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'solution', 'vaximo-toolkit' ),
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
                    'default' => __( 'SOLUTIONS OVERVIEW', 'vaximo-toolkit' ),
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
                    'default' => __( 'AI drives modern security use cases', 'vaximo-toolkit' ),
                ]
            );
            
            $this->add_control(
                'order',
                [
                    'label'   => __( 'Posts Order By', 'vaximo-toolkit' ),
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
                    'options' => vaximo_toolkit_get_page_projects_cat_el(),
                ]
            );

            $this->add_control(
                'bottom_text',
                [
                    'label'   => __( 'Bottom Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __('View Case Study', 'vaximo-toolkit'),
                ]
            );
           
            $this->add_control(
                'arrow_icon',
                [
                    'label' => __( 'Bottom Icon', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('bx bx-right-arrow-alt', 'vaximo-toolkit'),
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
                    'selector' => '{{WRAPPER}} .gcd-section-title h2, {{WRAPPER}} .gcd-section-title h3, {{WRAPPER}} .gcd-section-title h1, {{WRAPPER}} .gcd-section-title h4, {{WRAPPER}} .gcd-section-title h5, {{WRAPPER}} .gcd-section-title h6',
                ]
            );

            $this->add_control(
                'cd_title_color',
                [
                    'label'     => __( 'Card Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-solutions-card .content h3 a, {{WRAPPER}} .ai-solutions-card .content h2 a, {{WRAPPER}} .ai-solutions-card .content h4 a, {{WRAPPER}} .ai-solutions-card .content h1 a, {{WRAPPER}} .ai-solutions-card .content h5 a, {{WRAPPER}} .ai-solutions-card .content h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'cd_title_hcolor',
                [
                    'label'     => __( 'Card Title Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-solutions-card .content:hover h3 a, {{WRAPPER}} .ai-solutions-card .content:hover h2 a, {{WRAPPER}} .ai-solutions-card .content:hover h4 a, {{WRAPPER}} .ai-solutions-card .content:hover h1 a, {{WRAPPER}} .ai-solutions-card .content:hover h5 a, {{WRAPPER}} .ai-solutions-card .content:hover h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'cdtitle_typography',
                    'label'    => __( 'Card Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .ai-solutions-card .content h3,  {{WRAPPER}} .ai-solutions-card .content h1,  {{WRAPPER}} .ai-solutions-card .content h2,  {{WRAPPER}} .ai-solutions-card .content h4,  {{WRAPPER}} .ai-solutions-card .content h5,  {{WRAPPER}} .ai-solutions-card .content h6',
                ]
            );

            $this->add_control(
                'cd_content_color',
                [
                    'label'     => __( 'Card Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-solutions-card .content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'cd_content_typography',
                    'label'    => __( 'Card Content Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .ai-solutions-card .content p',
                ]
            );
           
           
            $this->add_control(
                'read_heading',
                [
                    'label' => esc_html__( 'Button Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
        
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'read_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .ai-solutions-card .content .case-btn',
                ]
            );

            $this->add_control(
                'read_h_heading',
                [
                    'label' => esc_html__( 'Button Hover Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
        
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'read_hbackground',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .ai-solutions-card .content .case-btn:hover',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btn_typography',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .ai-solutions-card .content .case-btn',
                ]
            );

        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        // Projects Query
        if( $settings['cat_name'] != '' ) {
            $args = array(
                'post_type'         => 'project',
                'posts_per_page'    => $settings['count'],
                'order'             => $settings['order'],
                'tax_query'         => array(
                    array(
                        'taxonomy'      => 'project_cat',
                        'field'         => 'slug',
                        'terms'         => $settings['cat_name'],
                        'hide_empty'    => false,
                    )
                )
            );
        } else {
            $args = array(
                'post_type'           => 'project',
                'posts_per_page'      => $settings['count'],
                'order'               => $settings['order'],
            );
        } 
        $projects_array = new \WP_Query( $args );
        ?>

        <!-- Start AI Solutions Area -->
        <div <?php if( !empty( $settings['solution_id']) ){ ?> id="<?php echo esc_attr( $settings['solution_id'] ); ?>" <?php } ?> class="ai-solutions-area teachers-fonts-home pb-120">
            <div class="gcd-section-title text-start">
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
            <div class="swiper ai-solutions-slider">
                <div class="swiper-wrapper">
                    <?php $loop = 1; 
                        while( $projects_array->have_posts() ): 
                        $projects_array->the_post();

                        if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                            $post_link = get_the_permalink();
                        } else {
                            $post_link = get_field('external_link');
                        } 
                    ?>
                        <div class="swiper-slide">
                            <div class="ai-solutions-card">
                                <?php if(get_the_post_thumbnail_url() != ''): ?>
                                    <div class="image">
                                        <a href="<?php echo esc_url( $post_link ); ?>">
                                            <img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="image">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="content">
                                    <h3>
                                        <a href="<?php echo esc_url( $post_link ); ?>"><?php the_title(); ?>
                                    </h3>
                                    <p><?php the_excerpt(); ?></p>
                                    <?php if($settings['bottom_text'] != '' || $settings['arrow_icon'] != ''): ?>
                                        <a href="<?php echo esc_url( $post_link ); ?>" class="case-btn"><?php echo esc_html( $settings['bottom_text'] ); ?> <i class="<?php echo esc_attr( $settings['arrow_icon']); ?>"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php 
                        $loop++; endwhile;
                        wp_reset_postdata(); 
                    ?>
                </div>
            </div>
            <div class="ai-solutions-pagination"></div>
            <div class="ellipse"></div>
        </div>
        <!-- End AI Solutions Area -->

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_SolutionSlider );