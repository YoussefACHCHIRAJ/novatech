<?php
/**
 * Services Widget
 */

namespace Elementor;
class Vaximo_Related_Services extends Widget_Base {

	public function get_name() {
        return 'Vaximo_RelatedServices';
    }

	public function get_title() {
        return __( 'Related Services', 'vaximo-toolkit' );
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
				'label' => __( 'Services Related Posts', 'vaximo-toolkit' ),
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
                    'default' => '3',
                ]
            );
            $this->add_control(
                'related_title',
                [
                    'label'   => __( 'Related Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Related Posts', 'vaximo-toolkit'),
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
                    'default' => 3,
                ]
            );
            $this->add_control(
                'excerpt_num',
                [
                    'label'   => __( 'Excerpt Number', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => 16,
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

         
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();


        // Card Columns
        $columns = $settings['columns'];
        if ( $columns == '2' ) {
            $column = 'col-lg-6 col-sm-6';
        } elseif ( $columns == '4' ) {
            $column = 'col-lg-3 col-sm-6';
        } else {
            $column = 'col-lg-4 col-sm-6';
        }

        $current_id = get_the_ID(); // Get the current post ID
        $categories = wp_get_post_terms( $current_id, 'service_cat', array( 'fields' => 'ids' ) ); // Get category IDs

        $args = array(
            'post_type'      => 'service',
            'posts_per_page' => $settings['count'],
            'order'          => $settings['order'],
            'post__not_in'   => array( $current_id ), // Exclude current post
            'tax_query'      => array(
                array(
                    'taxonomy' => 'service_cat',
                    'field'    => 'id',
                    'terms'    => $categories, // Get posts with the same categories
                ),
            ),
        );

        $services_array = new \WP_Query( $args );
        ?>
        
		<div class="container">
            <?php if($settings['related_title'] != ''): ?>
                <h3 class="services-related-post"><?php echo esc_html( $settings['related_title'] ) ?></h3>
            <?php endif; ?>
            <div class="row">
                <?php while( $services_array->have_posts() ): 
                    $services_array->the_post();

                    if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                        $post_link = get_the_permalink();
                    } else {
                        $post_link = get_field('external_link');
                    } ?>
                    <div class="<?php echo esc_attr($column); ?>">
                        <div class="single-solutions" style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>);">
                            <div class="solutions-content">
                                <h3><?php the_title() ?></h3>
                                <p><?php echo esc_html(wp_trim_words( get_the_excerpt(),  $settings['excerpt_num'], '' )); ?></p>

                                <?php if( $settings['read_more'] != '' ): ?>
                                    <a href="<?php echo esc_url( $post_link ); ?>" class="read-more"><?php echo esc_html( $settings['read_more'] ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Related_Services );