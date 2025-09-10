<?php
/**
 * Funfacts Two Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Vaximo_Funfacts_Two extends Widget_Base {

	public function get_name() {
        return 'Vaximo_FunfactsTwo';
    }

	public function get_title() {
        return __( 'Funfacts Two', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-counter';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'funfacts_section',
			[
				'label' => __( 'Funfacts Two Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$repeater = new Repeater();
			$repeater->add_control(
				'icon_class', [
					'label' => __( 'Icon Class', 'vaximo-toolkit' ),
					'type' => Controls_Manager::TEXT,
				]
			);
            $repeater->add_control(
                'number', [
					'type'    => Controls_Manager::NUMBER,
					'label'   => esc_html__( 'Ending Number', 'vaximo-toolkit' ),
                ]
            );
            $repeater->add_control(
                'number_suffix', [
					'type'    => Controls_Manager::TEXT,
					'label'   => esc_html__( 'Ending Number Suffix', 'vaximo-toolkit' ),
                ]
            );
            $repeater->add_control(
                'title', [
					'type'    => Controls_Manager::TEXT,
					'label'   => esc_html__( 'Title', 'vaximo-toolkit' ),
                ]
            );
            $this->add_control(
                'items',
                [
                    'label'  => esc_html__( 'Add Counter Item', 'vaximo-toolkit' ),
                    'type'   => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'counter_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'  => 'sec_bg_color',
                    'label' => esc_html__( 'Section Background Color', 'vaximo-toolkit' ),
                    'types' => ['gradient' ],
                    'selector' => '{{WRAPPER}} .funfacts-style-two-area',
                ]
            );
            $this->add_control(
                'top_td',
                [
                    'type'      => Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label'     => __( 'Icon Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-funfacts-card .icon i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_hcolor',
                [
                    'label'     => __( 'Icon Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-funfacts-card:hover .icon i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_bg_color',
                [
                    'label'     => __( 'Icon Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-funfacts-card .icon i' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_bg_hcolor',
                [
                    'label'     => __( 'Icon Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-funfacts-card:hover .icon i' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'counter_color',
                [
                    'label'     => __( 'Number Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-funfacts-card h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'counter_typography',
                    'label'    => __( 'Number Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-funfacts-card h3',
                ]
            );
            $this->add_control(
				'title_color',
				[
					'label'     => __( 'Title Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-funfacts-card p' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-funfacts-card p',
                ]
            );
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        ?>
        <div class="funfacts-style-two-area pt-100 pb-75">
            <div class="container">
                <div class="row">
                    <?php foreach( $settings['items'] as $item ): ?>
                    <div class="col-lg-3 col-sm-3 col-6 col-md-3">
                        <div class="single-funfacts-card">
                            <?php if( $item['icon_class'] != '' ) : ?>
                            <div class="icon">
                                <i class="<?php echo esc_attr( $item['icon_class'] ); ?>"></i>
                            </div>
                            <?php endif; ?>

                            <h3><span class="odometer" data-count="<?php echo esc_attr( $item['number'] ); ?>"><?php echo esc_attr__( '00' ); ?></span><span class="sign"><?php echo esc_html( $item['number_suffix'] ); ?></span></h3>
                            <p><?php echo esc_html( $item['title'] ); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Vaximo_Funfacts_Two );