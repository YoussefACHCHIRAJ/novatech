<?php
/**
 * Team Widget
 */

namespace Elementor;
class Vaximo_Team extends Widget_Base {

	public function get_name() {
        return 'Vaximo_Team';
    }

	public function get_title() {
        return __( 'Team', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-gallery-group';
    }

	public function get_categories() {
        return ['vaximocategory'];
	}
	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Team',
			[
				'label' => __( 'vaximo Team', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'image',
			[
				'label' => __( 'Upload Team Member Image', 'vaximo-toolkit' ),
				'type'  => Controls_Manager::MEDIA,
			]
        );

        $this->add_control(
            'name',
            [
                'label'   => __( 'Name', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __('John Smith', 'vaximo-toolkit'),
            ]
        );

        $this->add_control(
            'designation',
            [
                'label'   => __( 'Designation', 'vaximo-toolkit' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Web Developer', 'vaximo-toolkit'),
            ]
		);
		
		$this->add_control(
			'show_social',
			[
				'label'        => __( 'Show Social Link', 'vaximo-toolkit' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'vaximo-toolkit' ),
				'label_off'    => __( 'Hide', 'vaximo-toolkit' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

			$card_items = new Repeater();

            $card_items->add_control(
                'icon_type',
                [
					'label' => __( 'Icon Type', 'vaximo-toolkit' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'font-awesome' 	=> __( 'Font Awesome', 'vaximo-toolkit' ),
						'bxicon' 		=> __( 'Box Icon', 'vaximo-toolkit' ),
						'img-icon' 		=> __( 'Image', 'vaximo-toolkit' ),
					],
					'default' => 'bxicon',
                ]
            );
            $card_items->add_control(
                'card_bx_icon',
                [
					'label' => __( 'Card Icon', 'vaximo-toolkit' ),
					'type' 	=> Controls_Manager::TEXT,
					'condition' => [
						'icon_type' => 'bxicon'
					]
                ]
            );
            $card_items->add_control(
                'card_fa_icon',
                [
					'label' => __( 'Card Icon', 'vaximo-toolkit' ),
					'type' 	=> Controls_Manager::ICON,
					'condition' => [
						'icon_type' => 'font-awesome'
					]
                ]
            );
			$card_items->add_control(
				'icon_img', [
					'label' => esc_html__( 'Image Icon', 'vaximo-toolkit' ),
					'type' => Controls_Manager::MEDIA,
					'label_block' => true,
					'description'  => esc_html__( 'Icon Class field will not reflect if using Icon Image field', 'vaximo-toolkit' ),
					'condition' => [
						'icon_type' => 'img-icon'
					]
				]
			);
            $card_items->add_control(
                'link',
                [
					'label' => __( 'Link', 'vaximo-toolkit' ),
					'type'  => Controls_Manager::URL,
					'show_external' => true,
					'default' => [
						'url' => '#',
					],
                ]
            );
            $this->add_control(
                'social_link',
                [
                    'label'       => __( 'Add Social', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),

					'condition' => [
						'show_social' => 'yes',
					]
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'team_sec_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'name_color',
				[
					'label' => __( 'Name Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-team .content h3' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_name',
                    'label' => __( 'Name Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .single-team .content h3',
                ]
            );
			$this->add_control(
				'designation_color',
				[
					'label' => esc_html__( 'Designation Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-team .content span' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_desc',
                    'label' => __( 'Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .single-team .content span',
                ]
            );
			$this->add_control(
				'cardbg_color',
				[
					'label' => esc_html__( 'Box Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-team .content' => 'background-color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'iconbg_color',
				[
					'label' => esc_html__( 'Icon Background Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-team .image .social li a' => 'background-color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Icon Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-team .image .social li a' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'iconbg_hcolor',
				[
					'label' => esc_html__( 'Icon Background Hover Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-team .image .social li a:hover' => 'background-color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'icon_hcolor',
				[
					'label' => esc_html__( 'Icon Hover Color', 'vaximo-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-team .image .social li a:hover' => 'color: {{VALUE}}',
					],
				]
			);
        $this->end_controls_section();

    }

	protected function render() {

		$settings = $this->get_settings_for_display();
		
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

        $social_array = $settings['social_link']; ?>

		<div class="single-team">
			<div class="image">
				<?php if( $settings['image']['url'] != '' ): ?>
					<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['name'] ); ?>">
				<?php endif; ?>

				<?php if( $settings['show_social'] == 'yes' ):
					global $socialclass;
					foreach( $social_array as $social_link ){
						if ( $social_link['link']['url'] !='' || $social_link['icon'] !='' ) {
							$socialclass = "social";
						} else {
							$socialclass = "";
						}
					}
					?>
					<?php if( $social_array ): ?>
						<ul class="<?php echo esc_attr( $socialclass ); ?>">
							<?php foreach( $social_array as $social_link ) {
								// Card Icon
								$card_icon = '';
								if( $social_link['icon_type'] == 'bxicon' ):
									$card_icon = $social_link['card_bx_icon'];
								elseif( $social_link['icon_type'] == 'img-icon' ):
									$card_icon = $social_link['icon_img']['url'];
								else:
									$card_icon = $social_link['card_fa_icon'];
								endif;

								if( $social_link['link']['url'] !='' ) { ?>
									<li>
										<a href="<?php echo esc_url( $social_link['link']['url'] ); ?>" target="_blank">

											<?php if( $social_link['icon_type'] == 'img-icon' && $card_icon != ''): ?> 
												<img src="<?php echo esc_url( $card_icon );?>" alt="<?php echo esc_attr__('icon', 'vaximo-toolkit'); ?>">
											<?php else: ?>
												<i class="<?php echo esc_attr( $card_icon ); ?>"></i>
											<?php endif; ?>
										</a>
									</li>
								<?php 
								}
							} ?>
						</ul>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<div class="content">
				<h3><?php echo esc_html( $settings['name'] ); ?></h3>
				<span><?php echo esc_html( $settings['designation'] ); ?></span>
			</div>
		</div>

        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Vaximo_Team );