<?php
/**
 * About Inner items Widget
 */

namespace Elementor;
class Vaximo_CTA_Why_Us extends Widget_Base {

	public function get_name() {
        return 'CTA_Why';
    }

	public function get_title() {
        return __( 'Cyber Training & Awareness Why Us', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-help-o';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_CTA',
			[
				'label' => __( 'Why Us Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'top_title_op',
                [
                    'label' => __( 'Choose Top Title Option', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'     => __( 'Top Title With Images', 'vaximo-toolkit' ),
                        '2'     => __( 'Only Top Title', 'vaximo-toolkit' ),
                    ],
                    'default' => '1'
                ]
            );

            $this->add_control(
                'top_img',
                [
                    'label'     => __('Top Tile Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                    'condition' => [
                        'top_title_op' => '1',
                    ],
                ]
            );

            $this->add_control(
                'top_title',
                [
                    'label'   => __( 'Top Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'About Vaximo', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'heading_tag', [
                    'label'   => __( 'Title Heading Tag', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                    ],
                    'default'     => 'h2',
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'sec_title',
                [
                    'label'   => __( ' Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( '<strong>Educate</strong> and <strong>motivate</strong> your people so they can become part of your security solution', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'content',
                [
                    'label'   => __( 'Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'Security awareness training alone is not enough. To drive behavior change and build a security-minded culture.', 'vaximo-toolkit' ),
                ]
            );

            $fea_items = new Repeater();

                $fea_items->add_control(
                    'image',
                    [
                        'label' => __( 'Feature Image', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::MEDIA,
                    ]
                );

                $fea_items->add_control(
                    'number',
                    [
                        'type'    => Controls_Manager::NUMBER,
                        'label'   => __( 'Ending Number', 'vaximo-toolkit' ),
                        'default' => 92,
                    ]
                );
                $fea_items->add_control(
                    'suffix',
                    [
                        'type'    => Controls_Manager::TEXT,
                        'label'   => __( 'Number Suffix', 'vaximo-toolkit' ),
                        'default' => __('%', 'vaximo-toolkit'),
                    ]
                );

                $fea_items->add_control(
                    'list_content',
                    [
                        'label'   => __( 'Description', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( "Engaging, scenario-based lessons on topics like phishing.", "vaximo-toolkit" ),
                    ]
                );

            $this->add_control(
                'ns_fea_item',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $fea_items->get_controls(),
                ]
            );

            $this->add_control(
                'patner_show_hide',
                [
                    'label'        => __( 'Partner Logo Hide / Show', 'vaximo-toolkit' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'vaximo-toolkit' ),
                    'label_off'    => __( 'Hide', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );
    
            $card_items = new Repeater();
    
                $card_items->add_control(
                    'logo',
                    [
                        'type'    => Controls_Manager::MEDIA,
                        'label'   => __( 'Logo', 'vaximo-toolkit' ),
                    ]
                );
           
            $this->add_control(
                'logos',
                [
                    'label'       => __( 'Add Logo', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
                    'condition' => [
                        'patner_show_hide' => 'yes',
                    ],
                ]
            );
    
            $this->add_control(
                'f_img',
                [
                    'label'     => __('Feature Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                's_img',
                [
                    'label'     => __('Shape Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'cta_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'toptitle_heading',
                [
                    'label' => esc_html__( 'Top Title Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'toptitle_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .cta-overview-content .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-overview-content .sub span',
                ]
            );
            

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-overview-content h2, {{WRAPPER}} .cta-overview-content h3, {{WRAPPER}} .cta-overview-content h1, {{WRAPPER}} .cta-overview-content h4, {{WRAPPER}} .cta-overview-content h5, {{WRAPPER}} .cta-overview-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .cta-overview-content h2, {{WRAPPER}} .cta-overview-content h3, {{WRAPPER}} .cta-overview-content h1, {{WRAPPER}} .cta-overview-content h4, {{WRAPPER}} .cta-overview-content h5, {{WRAPPER}} .cta-overview-content h6',
                ]
            );
            
            $this->add_control(
                'content_color',
                [
                    'label'     => __( 'Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-overview-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_content',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-overview-content p',
                ]
            );

            $this->add_control(
                'cardbg_heading',
                [
                    'label' => esc_html__( 'Card Background Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'cardbg_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .cta-overview-content .overview-count-items .count-item',
                ]
            );

            $this->add_control(
                'li_title_color',
                [
                    'label'     => __( 'Lists Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-overview-content .overview-count-items .count-item h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_lititle',
                    'label'    => __( 'Lists Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-overview-content .overview-count-items .count-item h3',
                ]
            );
            $this->add_control(
                'li_con_color',
                [
                    'label'     => __( 'Lists Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-overview-content .overview-count-items .count-item p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_licon',
                    'label'    => __( 'Lists Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-overview-content .overview-count-items .count-item p',
                ]
            );




        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

        $ns_fea_item  = $settings['ns_fea_item'];
    ?>

        <!-- Start CTA Overview Area -->
		<div class="cta-overview-area teachers-fonts-home pt-100">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-12">
						<div class="cta-overview-content">
                            <?php if ( $settings['top_title_op'] == '1' ) : ?>
                                <div class="sub">
                                    <?php if( !empty( $settings['top_img']['url'] ) ){ ?>
                                        <img src="<?php echo esc_url( $settings['top_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                    <?php } ?>

                                    <span><?php echo wp_kses_post($settings['top_title']); ?></span>
                                </div>
                            <?php else: ?>

                                <div class="sub">
                                    <span><?php echo wp_kses_post($settings['top_title']); ?></span>
                                </div>

                            <?php endif; ?>
                           
                            <<?php echo esc_attr( $settings['heading_tag'] ); ?>><?php echo wp_kses_post( $settings['sec_title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>

                            <?php if($settings['content'] != ''): ?>
							    <p><?php echo wp_kses_post($settings['content']); ?></p>
                            <?php endif; ?>

							<div class="overview-count-items">
								<div class="row justify-content-center g-4">
									
                                    <?php $i=1; foreach( $ns_fea_item as $item  ): ?>
                                       
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="count-item">
                                                <?php if($item['image']['url'] != ''): ?>
                                                    <div class="image">
                                                        <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__("icon", "vaximo-toolkit"); ?>">
                                                    </div>
                                                <?php endif; ?>
                                               
                                                <?php if( $item['number']): ?>
                                                    <h3 class="counter"></h3>
                                                    <h3><span class="odometer" data-count="<?php echo esc_html( $item['number'] ); ?>">00</span> <?php if($item['suffix'] ): ?><span class="sign"><?php echo esc_html( $item['suffix'] ); ?></span><?php endif; ?></h3>
                                                <?php endif; ?>
                                               
                                                <?php if( $item['list_content'] ): ?>
                                                    <p><?php echo wp_kses_post( $item['list_content'] ); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    <?php 
                                        $i++; endforeach; 
                                    ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="cta-overview-image">
                            
                            <?php if( !empty( $settings['f_img']['url'] ) ){ ?>
                                <div class="image">
                                    <img src="<?php echo esc_url( $settings['f_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            <?php } ?>

                            <?php if ( $settings['patner_show_hide'] == 'yes' ) : ?>
                                <ul class="list">
                                    <?php foreach( $settings['logos'] as $item ): ?>
                                        <li>
                                            <img src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Logo', 'vaximo-toolkit' ); ?>">
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
            
            <?php if($settings['s_img']['url'] != ''): ?>
                <div class="cta-overview-rectangle">
                    <img src="<?php echo esc_url( $settings['s_img']['url'] ); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>">
                </div>
            <?php endif; ?>
		</div>
		<!-- End CTA Overview Area -->

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_CTA_Why_Us );