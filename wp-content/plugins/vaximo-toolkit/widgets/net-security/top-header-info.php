<?php
/**
 * Top Header Info Widget
 */

namespace Elementor;
class Vaximo_NSTopHeaderInfo extends Widget_Base {

	public function get_name() {
        return 'VaximoNSTopHeaderInfo';
    }

	public function get_title() {
        return __( 'Top Header Info', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-call-to-action';
    }

	public function get_categories() {
        return ['vaximocategory'];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Contact_CTA_Area',
			[
				'label' => __( ' Controls', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
			$repeater = new Repeater();
            $repeater->add_control(
                'label_text',
                [
                    'label' => __( 'Label', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::TEXT,
                ]
            );
			$repeater->add_control(
				'content',
				[
					'label'   => __( 'Content', 'vaximo-toolkit' ),
					'type'    => Controls_Manager::WYSIWYG,
				]
			);

			$this->add_control(
                'con_items',
                [
                    'label'  => esc_html__('Add Info', 'vaximo-toolkit'),
                    'type'   => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'contact_cta_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
			
			$this->add_control(
				'adlabel_color',
				[
					'label'     => __( 'Label Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .top-header-relative-info li span' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'adlabel_typography',
					'label'    => __( 'Label Typography', 'vaximo-toolkit' ),
					 
					'selector' => '{{WRAPPER}} .top-header-relative-info li span',
				]
			);
			$this->add_control(
				'address_color',
				[
					'label'     => __( 'Address Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .top-header-relative-info li a' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'add_typography',
					'label'    => __( 'Address Typography', 'vaximo-toolkit' ),
					 
					'selector' => '{{WRAPPER}} .top-header-relative-info li a',
				]
			);
        $this->end_controls_section();

    }

	protected function render() {

		$settings = $this->get_settings_for_display(); 
		?>
			<ul class="top-header-relative-info">
				<?php foreach( $settings['con_items'] as $item ): ?>
					<li>
						<?php if($item['label_text'] != ''): ?>
							<span><?php echo esc_html( $item['label_text'] ); ?></span>
						<?php endif; ?>

						<?php echo wp_kses_post( $item['content'] ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_NSTopHeaderInfo );