<?php
/**
 * Contact CTA Widget
 */

namespace Elementor;
class Vaximo_Contact_CTA extends Widget_Base {

	public function get_name() {
        return 'Vaximo_Contact_CTA';
    }

	public function get_title() {
        return __( 'Contact Info', 'vaximo-toolkit' );
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
				'label' => __( 'Contact Lists Controls', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'contact_text_alignment',
			[
				'label' => __( 'Choose Title Alignment', 'vaximo-toolkit' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1'     => __( 'Text Align Center', 'vaximo-toolkit' ),
					'2'     => __( 'Text Align Right', 'vaximo-toolkit' ),
					'3'     => __( 'Text Align Left', 'vaximo-toolkit' ),
				],
				'default' => '1'
			]
		);
			$this->add_control(
				'icon_name',
				[
					'label'   => __( 'Icon', 'vaximo-toolkit' ),
					'type'    => Controls_Manager::TEXT,
					'default' => __('bx bx-location-plus', 'vaximo-toolkit' ),
				]
			);
			$this->add_control(
				'title',
				[
					'label'   => __( 'Title', 'vaximo-toolkit' ),
					'type'    => Controls_Manager::TEXT,
					'default' => __('New York', 'vaximo-toolkit' ),
				]
			);
			$this->add_control(
				'content',
				[
					'label'   => __( 'Content', 'vaximo-toolkit' ),
					'type'    => Controls_Manager::WYSIWYG,
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
						'{{WRAPPER}} .single-contact-info h3' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'title_typography',
					'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
					 
					'selector' => '{{WRAPPER}} .single-contact-info h3',
				]
			);
			$this->add_control(
				'address_color',
				[
					'label'     => __( 'Address Color', 'vaximo-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-contact-info p' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'add_typography',
					'label'    => __( 'Address Typography', 'vaximo-toolkit' ),
					 
					'selector' => '{{WRAPPER}} .single-contact-info p',
				]
			);
        $this->end_controls_section();

    }

	protected function render() {

		$settings = $this->get_settings_for_display(); 
		
		// Text Alignment
		if( $settings['contact_text_alignment' ] == '1') {
			$alignment = 'text-center';
		} 
		elseif( $settings['contact_text_alignment' ] == '2') {
			$alignment = 'text-right';
		} else {
			$alignment = 'text-left';
		}
		?>
			<div class="single-contact-info <?php echo esc_attr( $alignment); ?>">
				<i class="<?php echo esc_attr( $settings['icon_name'] ); ?>"></i>
				<h3><?php echo esc_html( $settings['title'] ); ?></h3>
				<?php echo wp_kses_post( $settings['content'] ); ?>
			</div>
        <?php
	}

	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Contact_CTA );