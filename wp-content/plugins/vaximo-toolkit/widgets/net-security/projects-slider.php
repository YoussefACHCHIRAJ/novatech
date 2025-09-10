<?php
/**
 * Projects Widget
 */

namespace Elementor;
class Vaximo_ProjectsSlider extends Widget_Base {

	public function get_name() {
        return 'VaximoProjectsSlider';
    }

	public function get_title() {
        return __( 'NS Projects Slider', 'vaximo-toolkit' );
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
				'label' => __( 'Projects', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'text_alignment',
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
                'arrow_icon',
                [
                    'label' => __( 'Arrow Icon', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
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
                    'default' => __('Secure Your Network, Secure Your Future', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'bottom_link_text',
                [
                    'label'   => __( 'Bottom Link Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('View All Case Studies', 'vaximo-toolkit'),
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
                        '{{WRAPPER}} .ns-case-studies-card .image .icon a' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-case-studies-card .content h3 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_hcolor',
                [
                    'label'     => __( 'Title Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-case-studies-card .content h3 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .ns-case-studies-card .content h3',
                ]
            );
            $this->add_control(
                'content_color',
                [
                    'label'     => __( 'Excerpt Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-case-studies-card .content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'content_typography',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => '{{WRAPPER}} .ns-case-studies-card .content p',
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
        if( $settings['text_alignment' ] == '1') {
            $alignment = 'text-center';
        } 
        elseif( $settings['text_alignment' ] == '2') {
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

        <div class="container">
            <div class="ns-case-studies-slides owl-carousel owl-theme">
                <?php $loop = 1; 
                while( $projects_array->have_posts() ): 
                $projects_array->the_post();

                if ( class_exists('ACF') && get_field('choose_link_type') == 1 ) {
                    $post_link = get_the_permalink();
                } else {
                    $post_link = get_field('external_link');
                } ?>
                    <div class="ns-case-studies-card <?php echo $alignment; ?>">
                        <?php if(get_the_post_thumbnail_url() != ''): ?>
                            <div class="image">
                                <a href="<?php echo esc_url( $post_link ); ?>">
                                    <img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php echo esc_attr__("image", 'vaximo-toolkit'); ?>">
                                </a>

                                <?php if($settings['arrow_icon']['url'] != ''): ?>
                                    <div class="icon">
                                        <a href="<?php echo esc_url( $post_link ); ?>">
                                            <img src="<?php echo esc_url( $settings['arrow_icon']['url']); ?>" alt="<?php echo esc_attr__("icon", "vaximo-toolkit"); ?>">
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="content">
                            <h3>
                                <a href="<?php echo esc_url( $post_link ); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p><?php the_excerpt(); ?></p>
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

Plugin::instance()->widgets_manager->register( new Vaximo_ProjectsSlider );