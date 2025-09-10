<?php
/**
 * Services Widget
 */

namespace Elementor;
class Vaximo_ServicesCS extends Widget_Base {

	public function get_name() {
        return 'VaximoServicesCS';
    }

	public function get_title() {
        return __( 'Cloud Security Services', 'vaximo-toolkit' );
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
                'read_more',
                [
                    'label'   => __( 'Read More Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Read More', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'arrow_icon',
                [
                    'label' => __( 'Arrow Icon', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
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
                'cat_name',
                [
                    'label' => __( 'Choose Category', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => vaximo_toolkit_get_page_services_cat_el(),
                ]
            );

            $this->add_control(
                'bottom_text',
                [
                    'label'   => __( 'Bottom Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __('Secure Your Network, Secure Your Future', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'bottom_link_text',
                [
                    'label'   => __( 'Bottom Link Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('View All Services', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'bottom_link',
                [
                    'label'   => __( 'Bottom Link', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('#', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'arrow_icon2',
                [
                    'label' => __( 'Arrow Icon Two', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'show_card_icon',
                [
                    'label'        => __( 'Show Card Icon?', 'vaximo-toolkit' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'vaximo-toolkit' ),
                    'label_off'    => __( 'Hide', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
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
                'icon_bg_color',
                [
                    'label'     => __( 'Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-services-card .image .icon' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-services-card .content h3 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_hcolor',
                [
                    'label'     => __( 'Title Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-services-card .content h3 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .ns-services-card .content h3',
                ]
            );
            $this->add_control(
                'content_color',
                [
                    'label'     => __( 'Excerpt Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-services-card .content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'content_typography',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .ns-services-card .content p',
                ]
            );
            $this->add_control(
                'read_color',
                [
                    'label'     => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-services-card .content .services-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btn_typography',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .ns-services-card .content .services-btn',
                ]
            );

            $this->add_control(
                'cardbg_color',
                [
                    'label'     => __( 'Card Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-services-card' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'btm_text_color',
                [
                    'label'     => __( 'Bottom Text Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-services-bottom-link li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btm_txt_typography',
                    'label'    => __( 'Bottom Text Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .ns-services-bottom-link li',
                ]
            );
            $this->add_control(
                'btm_linktext_color',
                [
                    'label'     => __( 'Bottom Link Text Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-services-bottom-link li a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btm_linktxt_typography',
                    'label'    => __( 'Bottom Link Text Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .ns-services-bottom-link li a',
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

        global $vaximo_opt;

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

        // Services Query
        if( $settings['cat_name'] != '' ) {
            $args = array(
                'post_type'         => 'service',
                'posts_per_page'    => $settings['count'],
                'order'             => $settings['order'],
                'paged'             => get_query_var('paged') ? get_query_var('paged') : 1,
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
                'paged'               => get_query_var('paged') ? get_query_var('paged') : 1
            );
        } 
        $services_array = new \WP_Query( $args );
        ?>

        <div class="container">
            <div class="row justify-content-center">
                <?php $loop = 1; 
                while( $services_array->have_posts() ): 
                $services_array->the_post();

                if( function_exists('acf_add_options_page') ) {
                    $ns_icon  = get_field( 'ns_icon' );

                } else {
                    $ns_icon  = '';
                }

                if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                    $post_link = get_the_permalink();
                } else {
                    $post_link = get_field('external_link');
                } ?>
                <div class="col-xl-4 col-md-6">
                    <div class="ns-services-card <?php echo $alignment; ?>">
                        <?php if(get_the_post_thumbnail_url() != ''): ?>
                            <div class="image">
                                <a href="<?php echo esc_url( $post_link ); ?>">
                                    <img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php echo esc_attr__("image", 'vaximo-toolkit'); ?>">
                                </a>

                                <?php if ( $settings['show_card_icon'] == 'yes' ) : ?>
                                    <div class="icon">
                                        <?php if ( $ns_icon != '') { ?>
                                            <img src="<?php echo esc_url( $ns_icon ); ?>" alt="<?php echo esc_attr__("icon", 'vaximo-toolkit'); ?>">
                                        <?php } ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="content">
                            <h3>
                                <a href="<?php echo esc_url( $post_link ); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p><?php the_excerpt(); ?></p>

                            <?php if( $settings['read_more'] != '' ): ?>
                                <a href="<?php echo esc_url( $post_link ); ?>" class="services-btn">
                                    <span class="link-text"><?php echo esc_html( $settings['read_more'] ); ?></span>

                                    <?php if($settings['arrow_icon']['url'] != ''): ?>
                                        <span class="link-icon">
                                            <img src="<?php echo esc_url( $settings['arrow_icon']['url']); ?>" alt="<?php echo esc_attr__("icon", "vaximo-toolkit"); ?>">
                                        </span>
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php $loop++; endwhile;
                wp_reset_postdata(); ?>
            </div>

            <?php if($settings['bottom_link_text'] != '' || $settings['bottom_text'] != ''): ?>
                <ul class="ns-services-bottom-link">
                    <li>
                        <?php echo esc_html( $settings['bottom_text'] ); ?>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( $settings['bottom_link'] ); ?>">
                            <?php echo esc_html( $settings['bottom_link_text'] ); ?>

                            <?php if($settings['arrow_icon2']['url'] != ''): ?>
                                <img src="<?php echo esc_url( $settings['arrow_icon2']['url']); ?>" alt="<?php echo esc_attr__("icon", "vaximo-toolkit"); ?>">
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_ServicesCS );