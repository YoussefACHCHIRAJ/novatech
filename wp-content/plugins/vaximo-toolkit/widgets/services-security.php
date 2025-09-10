<?php
/**
 * Services Security Widget
 */

namespace Elementor;
class Vaximo_Services_Security extends Widget_Base {

	public function get_name() {
        return 'Services_Security_Area';
    }

	public function get_title() {
        return __( 'Services Security', 'vaximo-toolkit' );
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
				'label' => __( 'Services', 'vaximo-toolkit' ),
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
                'service_text_alignment',
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
                    'default' => 6,
                ]
            );

            $this->add_control(
                'excerpt_num',
                [
                    'label'   => esc_html__( 'Excerpt', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => 16,
                ]
            );

            $this->add_control(
                'cat_name',
                [
                    'label'   => __( 'Choose Category', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => vaximo_toolkit_get_page_services_cat_el(),
                ]
            );

            $this->add_control(
                'shape',
                [
                    'label' => __( 'Shape', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
        $this->end_controls_section();
        
        // Style 1 & 2
        $this->start_controls_section(
			'service_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
                'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'card_bgcolor',
                [
                    'label'     => __( 'Card Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .complete-website-security-card' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label'     => __( 'Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .complete-website-security-card .icon i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_bghead',
                [
                    'label'     => esc_html__( 'Icon Background Color', 'cyarb-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'     => 'iconbg_color',
                    'types'    => ['gradient' ],
                    'selector' => '{{WRAPPER}} .complete-website-security-card .icon i',
                ]
            );
            $this->add_control(
                'inner_divi',
                [
                    'type'      => Controls_Manager::DIVIDER,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .complete-website-security-card h3 a, .complete-website-security-card h1 a, .complete-website-security-card h2 a, .complete-website-security-card h4 a, .complete-website-security-card h5 a, .complete-website-security-card h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_hcolor',
                [
                    'label'     => __( 'Title Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .complete-website-security-card:hover h1 a, .complete-website-security-card:hover h2 a, .complete-website-security-card:hover h3 a, .complete-website-security-card:hover h4 a, .complete-website-security-card:hover h5 a, .complete-website-security-card:hover h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .complete-website-security-card h3 a, .complete-website-security-card h1 a, .complete-website-security-card h2 a, .complete-website-security-card h4 a, .complete-website-security-card h5 a, .complete-website-security-card h6 a',
                ]
            );
            $this->add_control(
                'content_color',
                [
                    'label'     => __( 'Excerpt Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .complete-website-security-card p, .complete-website-security-card ol li, .complete-website-security-card  ul li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'content_hcolor',
                [
                    'label'     => __( 'Excerpt Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .complete-website-security-card:hover p, .complete-website-security-card:hover ul li, .complete-website-security-card:hover ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'content_typography',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .complete-website-security-card p, .complete-website-security-card ol li, .complete-website-security-card  ul li',
                ]
            );
            $this->add_control(
                'inner_div2',
                [
                    'type'      => Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'card_bghead',
                [
                    'label'     => esc_html__( 'Card Background Hover Color', 'cyarb-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'     => 'cardbg_hcolor',
                    'types'    => ['gradient' ],
                    'selector' => '{{WRAPPER}} .complete-website-security-card::after',
                ]
            );
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        // Text Alignment
        if( $settings['service_text_alignment' ] == '1') {
            $alignment = 'text-center';
        } 
        elseif( $settings['service_text_alignment' ] == '2') {
            $alignment = 'text-right';
        } else {
            $alignment = 'text-left';
        }
        
        // Services Query
        if( $settings['cat_name'] != '' ) {
            $args = array(
                'post_type'         => 'service',
                'posts_per_page'    => $settings['count'],
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
                'order'               => $settings['order'],
            );
        } 

        $services_array = new \WP_Query( $args );
        ?>
        <?php if ( $settings['choose_style']  == '1' ) : ?>
        <div class="container">
            <div class="complete-website-security-slides owl-carousel owl-theme">
                <?php while( $services_array->have_posts() ): 
                $services_array->the_post();

                if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                    $post_link = get_the_permalink();
                } else {
                    $post_link = get_field('external_link');
                } ?>
                <div class="complete-website-security-card <?php echo $alignment; ?>">
                    <?php if ( class_exists( 'ACF') && get_field('choose_icon_type') == 'flaticon' || class_exists( 'ACF') && get_field('choose_icon_type') == 'iconclass' ) {
                        if ( get_field('choose_icon_type') == 'flaticon' ) { ?>
                            <div class="icon"><i class="<?php echo esc_attr( get_field('service_flaticon') ); ?>"></i> </div>
                        <?php } elseif (get_field('choose_icon_type') == 'iconclass' ){ ?>
                            <div class="icon"> <?php echo get_field('choose_fontawesome'); ?> </div>
                        <?php }
                    } ?>

                    <<?php echo esc_attr( $settings['header_size'] ); ?>>
                    <a href="<?php echo esc_url( $post_link ); ?>"><?php the_title(); ?></a>
                    </<?php echo esc_attr( $settings['header_size'] ); ?>>

                    <p><?php echo esc_html(wp_trim_words( get_the_excerpt(), $settings['excerpt_num'], '' )); ?></p>

                    <?php if( $settings['shape']['url'] != '' ): ?>
                        <div class="security-shape">
                            <img src="<?php echo esc_url( $settings['shape']['url'] ); ?>" alt="<?php echo esc_attr('shape', 'vaximo-toolkit' ); ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>
        <?php elseif ( $settings['choose_style']  == '2' ) : ?>
        <div class="container">
            <div class="complete-website-security-slides owl-carousel owl-theme">
                <?php while( $services_array->have_posts() ): 
                $services_array->the_post();

                if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                    $post_link = get_the_permalink();
                } else {
                    $post_link = get_field('external_link');
                } ?>
                <div class="complete-website-security-card with-white-color <?php echo $alignment; ?>">
                    <?php if ( class_exists( 'ACF') && get_field('choose_icon_type') == 'flaticon' || class_exists( 'ACF') && get_field('choose_icon_type') == 'iconclass' ) {
                        if ( get_field('choose_icon_type') == 'flaticon' ) { ?>
                            <div class="icon"><i class="<?php echo esc_attr( get_field('service_flaticon') ); ?>"></i> </div>
                        <?php } elseif (get_field('choose_icon_type') == 'iconclass' ){ ?>
                            <div class="icon"> <?php echo get_field('choose_fontawesome'); ?> </div>
                        <?php }
                    } ?>

                    <<?php echo esc_attr( $settings['header_size'] ); ?>>
                    <a href="<?php echo esc_url( $post_link ); ?>"><?php the_title(); ?></a>
                    </<?php echo esc_attr( $settings['header_size'] ); ?>>

                    <p><?php echo esc_html(wp_trim_words( get_the_excerpt(), $settings['excerpt_num'], '' )); ?></p>

                    <?php if( $settings['shape']['url'] != '' ): ?>
                        <div class="security-shape">
                            <img src="<?php echo esc_url( $settings['shape']['url'] ); ?>" alt="<?php echo esc_attr('shape', 'vaximo-toolkit' ); ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>	
        </div>
        <?php endif; ?>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Services_Security );