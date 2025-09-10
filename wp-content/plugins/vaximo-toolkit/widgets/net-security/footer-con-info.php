<?php
/**
 * Contact Widget
 */

namespace Elementor;
class Vaximo_NSConInfo extends Widget_Base {

	public function get_name() {
        return 'VaximoNSConInfo';
    }

	public function get_title() {
        return __( 'Footer Contact Info', 'vaximo-toolkit' );
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
				'label' => __( 'Contact Controls', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'fmenu_title',
				[
					'label'       => __('Footer Menu Title', 'vaximo-toolkit'),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('Contact Us', 'vaximo-toolkit'),
					'label_block' => true,
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
                    'label'  => esc_html__('Add Contact', 'vaximo-toolkit'),
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
				'title_color',
				[
					'label'     => __( 'Title Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-footer-widget-card h3' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'title_typography',
					'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
					 
					'selector' => '{{WRAPPER}} .single-footer-widget-card h3',
				]
			);
			$this->add_control(
				'adlabel_color',
				[
					'label'     => __( 'Label Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-footer-widget-card .footer-contact-info li span' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'adlabel_typography',
					'label'    => __( 'Label Typography', 'vaximo-toolkit' ),
					 
					'selector' => '{{WRAPPER}} .single-footer-widget-card .footer-contact-info li span',
				]
			);
			$this->add_control(
				'address_color',
				[
					'label'     => __( 'Address Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-footer-widget-card .footer-contact-info li, .single-footer-widget-card .footer-contact-info li a' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'add_typography',
					'label'    => __( 'Address Typography', 'vaximo-toolkit' ),
					 
					'selector' => '{{WRAPPER}} .single-footer-widget-card .footer-contact-info li, .single-footer-widget-card .footer-contact-info li a',
				]
			);
        $this->end_controls_section();

    }

	protected function render() {

		$settings = $this->get_settings_for_display(); 
		?>
			<div class="single-footer-widget-card">
				<h3><?php echo esc_html($settings['fmenu_title']); ?></h3>
				<ul class="footer-contact-info">
					<?php foreach( $settings['con_items'] as $item ): ?>
						<li>
							<span><?php echo esc_html( $item['label_text'] ); ?></span>
							<?php echo wp_kses_post( $item['content'] ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_NSConInfo );