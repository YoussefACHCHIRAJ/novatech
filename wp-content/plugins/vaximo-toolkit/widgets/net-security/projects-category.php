<?php
/**
 * Projects Category Widget
 */

namespace Elementor;
class Vaximo_ProjectsCat extends Widget_Base {

	public function get_name() {
        return 'Vaximo_ProjectsCat';
    }

	public function get_title() {
        return __( 'Projects Category', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-menu-toggle';
    }

	public function get_categories() {
        return ['vaximocategory'];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Vaximo_Sidebar_Service',
			[
				'label' => __( 'Vaximo Projects Category', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'title',
                [
                    'label'   => __( ' Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default'     => __('Project Categories', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'count',
                [
                    'label' => __( 'Number of Category Show', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 5,
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'section_style',
			[
				'label' => __( ' Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'alltile_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .widget .widget-title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'tite_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .widget-area .widget .widget-title',
                ]
            );
            $this->add_control(
                'catlist_color',
                [
                    'label'     => __( 'Category Lists Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .widget_categories ul li a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'catlist_hcolor',
                [
                    'label'     => __( 'Category Lists Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .widget_categories ul li a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'catlist_typography',
                    'label'    => __( 'Category Lists Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .widget-area .widget_categories ul li a',
                ]
            );
        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        ?>

        <?php $posts_cats = wp_get_post_terms(get_the_ID(), 'project_cat');
        if ( $posts_cats ) : ?>
            <div class="widget widget_categories">
                <h3 class="widget-title"><?php echo esc_html(  $settings['title'] ); ?></h3>
                <div class="post-wrap">
                    <ul>
                        <?php $i = 1; foreach ( $posts_cats as $cat ) {  ?>
                            <li><a href="<?php echo esc_url(get_category_link( $cat->term_id )); ?>">
                                <?php echo esc_html( $cat->name ) ?>  <span>(<?php echo esc_html( $cat->count )?>)</span></a>
                            </li>
                        <?php 
                            if($i == $settings['count']){
                                break;
                            }
                        $i++;} ?>

                    </ul>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Vaximo_ProjectsCat );