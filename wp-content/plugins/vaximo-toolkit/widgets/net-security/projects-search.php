<?php
/**
 * Projects Search Widget
 */

namespace Elementor;
class Vaximo_ProjectsSearch extends Widget_Base {

	public function get_name() {
        return 'Vaximo_ProjectsSearch';
    }

	public function get_title() {
        return __( 'Projects Search', 'vaximo-toolkit' );
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
				'label' => __( 'Vaximo Projects Search', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                's_title',
                [
                    'label'   => __( ' Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default'     => __('Search Now', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                's_ph_text',
                [
                    'label'   => __( 'Placeholder Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default'     => __('Search...', 'vaximo-toolkit'),
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
                    'label' => esc_html__( 'Form Text Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .widget-area .widget_search form .search-field' => 'color: {{VALUE}}',
                    ],
                ]
            );
         
        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();
   
        ?>

        <div class="widget widget_search">
            <h3 class="widget-title"><?php echo esc_html( $settings['s_title'] ); ?></h3>
            <div class="post-wrap">
                <form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form">
                    <label>
                        <input type="hidden" name="post_type" value="project" />
                        <input type="text" class="search-field" placeholder="<?php echo esc_attr( $settings['s_ph_text'] ); ?>" name="s" required>
                    </label>
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
        </div>
        <?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Vaximo_ProjectsSearch );