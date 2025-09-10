<?php
/**
 * Services Widget
 */

namespace Elementor;
class Vaximo_Sidebar_Services extends Widget_Base {

	public function get_name() {
        return 'Vaximo_SidebarServices';
    }

	public function get_title() {
        return __( 'Sidebar Services', 'vaximo-toolkit' );
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
				'label' => __( 'Sidebar Services', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
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
                'order_by',
                [
                    'label'   => __( 'Order By', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'date'          => __( 'Date', 'vaximo-toolkit' ),
                        'title'         => __( 'Title', 'vaximo-toolkit' ),
                        'menu_order'    => __( 'Menu Order', 'vaximo-toolkit' ),
                        'rand'          => __( 'Random', 'vaximo-toolkit' ),
                        'ID'            => __( 'Post ID', 'vaximo-toolkit' ),
                    ],
                    'default' => 'date',
                ]
            );

            $this->add_control(
                'count',
                [
                    'label'   => __( 'Post Per Page', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => 7,
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
                        '{{WRAPPER}} .services-list li a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'box_back_color',
                [
                    'label'     => __( 'Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-list li a' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'box_border_color',
                [
                    'label'     => __( 'Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-list li a, .services-list' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_hcolor',
                [
                    'label'     => __( 'Title Active/Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-list li a:hover, .services-list li a.active' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_hbg_color',
                [
                    'label'     => __( 'Title Active/Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-list li a:hover, .services-list li a.active' => 'background-color: {{VALUE}}',
                    ],

                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .services-list li a',
                ]
            );
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        // Services Query
        if( $settings['cat_name'] != '' ) {
            $args = array(
                'post_type'         => 'service',
                'posts_per_page'    => $settings['count'],
                'orderby'           => $settings['order_by'],
                'order'             => $settings['order'],
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
                'orderby'             => $settings['order_by'],
                'order'               => $settings['order']
            );
        }
        $services_array = new \WP_Query( $args );
        ?>
            <ul class="services-list">
                <?php while( $services_array->have_posts() ): 
                    $services_array->the_post();
                    if( class_exists('ACF') ) {
                        if(get_field('choose_link_type') == 1){
                            $post_link = get_the_permalink();
                        }else {
                            $post_link = get_field('external_link');
                        }
                    }else{
                        $post_link = '#';
                    }
                ?>
                    <li>
                        <a href="<?php echo esc_url( $post_link ); ?>" class="<?php vaximo_if_current('active'); ?>">
                            <?php the_title(); ?>     
                        </a>
                    </li>
                <?php endwhile;
                 wp_reset_postdata(); ?>
            </ul>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Sidebar_Services );