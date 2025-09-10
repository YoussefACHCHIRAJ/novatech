<?php
/**
 * Projects Tag Widget
 */

namespace Elementor;
class Vaximo_ProjectsTag extends Widget_Base {

	public function get_name() {
        return 'Vaximo_ProjectsTag';
    }

	public function get_title() {
        return __( 'Projects Tags', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-menu-toggle';
    }

	public function get_categories() {
        return ['vaximocategory'];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Vaximo_Sidebar_Projects',
			[
				'label' => __( 'Vaximo Projects Tag', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'tag_title',
                [
                    'label'   => __( ' Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default'     => __('Taglist', 'vaximo-toolkit'),
                ]
            );

            $this->add_control(
                'choose_tag',
                [
                    'label'       => esc_html__( 'Tag From', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => [
                        'post'           => esc_html__( 'Posts', 'vaximo-toolkit' ),
                        'services-post'  => esc_html__( 'Services Posts', 'vaximo-toolkit' ),
                        'projects-post'  => esc_html__( 'Projects Posts', 'vaximo-toolkit' ),
                    ], 
                    'default' => 'services-post'
                ]
            );
           
        $this->end_controls_section();

        $this->start_controls_section(
			'section_sidebarstyle',
			[
				'label' => __( 'Sidebar Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'widtitle_color',
                [
                    'label' => esc_html__( 'Widget Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .widget .widget-title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'wid_title_typography',
                    'label' => __( 'Widget Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .widget-area .widget .widget-title',
                ]
            );

            $this->add_control(
                'tagcolor',
                [
                    'label' => esc_html__( 'Tag Text Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .tagcloud a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tagbg_color',
                [
                    'label' => esc_html__( 'Tag Background Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .tagcloud a' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tagbor_color',
                [
                    'label' => esc_html__( 'Tag Border Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .tagcloud a' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'tag_padding',
                [
                    'label' => esc_html__( 'Tag Padding', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .tagcloud a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'tag_border',
                [
                    'label' => esc_html__( 'Tag Border Radius', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .tagcloud a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'tagtext_hcolor',
                [
                    'label' => esc_html__( 'Tag Hover Text Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .tagcloud a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tagbg_hcolor',
                [
                    'label' => esc_html__( 'Tag Hover Background Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .tagcloud a:hover' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tagboer_hcolor',
                [
                    'label' => esc_html__( 'Tag Hover Border Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .tagcloud a:hover' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'tag_typography',
                    'label' => __( 'Tag Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .widget-area .tagcloud a',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        if($settings['choose_tag'] == 'post'){
            $ser_tags = wp_get_post_terms(get_the_ID(), 'post_tag');
        }elseif($settings['choose_tag'] == 'projects-post'){
            $ser_tags = wp_get_post_terms(get_the_ID(), 'project_tag');
        }else {
            $ser_tags = wp_get_post_terms(get_the_ID(), 'service_tag');
        }
   
        ?>

        <?php 
        if ( $ser_tags ) : ?>
            <div class="widget widget_tag_cloud">
                <h3 class="widget-title"><?php echo esc_html( $settings['tag_title'] ); ?></h3>
                <div class="post-wrap">
                    <div class="tagcloud">
                        <?php foreach ( $ser_tags as $tag ) {  ?>
                            <a href="<?php echo esc_url(get_tag_link( $tag->term_id )); ?>">
                                <?php echo esc_html( $tag->name ) ?> (<?php echo esc_html( $tag->count )?>)</a>
                        <?php } ?>
                    </div>
                </div>
            </div>    
        <?php endif; ?>
        <?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Vaximo_ProjectsTag );