<?php
/**
 * About Inner items Widget
 */

namespace Elementor;
class Vaximo_About_InnerItems extends Widget_Base {

	public function get_name() {
        return 'Vaximo_AboutInnerItems';
    }

	public function get_title() {
        return __( 'NS About Card Lists', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-help-o';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Faq',
			[
				'label' => __( 'About Card Lists Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
                'sec_title',
                [
                    'label'   => __( ' Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'Secure Your Business with Advanced <span>Network Security</span>', 'vaximo-toolkit' ),
                ]
            );
            $this->add_control(
                'sec_content',
                [
                    'label'   => __( 'Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __( 'At vaximo, we specialize in providing cutting-edge network security solutions that ensure your data and digital infrastructure are protected from modern threats.', 'vaximo-toolkit' ),
                ]
            );

            $this->add_control(
                'show_lists',
                [
                    'label'        => __( 'Show Lists Items?', 'vaximo-toolkit' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'vaximo-toolkit' ),
                    'label_off'    => __( 'Hide', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );
            $fea_items = new Repeater();
            $fea_items->add_control(
                'image',
                [
                    'label'     => __('Icon', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );
            $fea_items->add_control(
                'list_title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( '24/7 Monitoring and Support', 'vaximo-toolkit' ),
                ]
            );
            $fea_items->add_control(
                'list_content',
                [
                    'label'   => __( 'Description', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => __( "Monitor your network 24/7 with Seku's real-time monitoring", "vaximo-toolkit" ),
                ]
            );
            $this->add_control(
                'ns_fea_item',
                [
                    'label'       => __( 'Add Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $fea_items->get_controls(),
                    'condition' => [
                        'show_lists' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('More About Us', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'link_type',
                [
                    'label'       => __( 'Link Type', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => [
                        '1'  => __( 'Link To Page', 'vaximo-toolkit' ),
                        '2'  => __( 'External Link', 'vaximo-toolkit' ),
                    ],
                ]
            );
            $this->add_control(
                'link_to_page',
                [
                    'label'       => __( 'Link Page', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => vaximo_toolkit_get_page_as_list(),
                    'condition'   => [
                        'link_type' => '1',
                    ]
                ]
            );
            $this->add_control(
                'external_link',
                [
                    'label'     => __('External Link', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

            //Target Page
            $this->add_control(
                'target_page',
                [
                    'label' => __( 'Link Open In New Tab?', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'vaximo-toolkit' ),
                    'label_off' => __( 'No', 'vaximo-toolkit' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'faq_style',
			[
				'label' => __( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'toptitle_color',
                [
                    'label'     => __( 'Top Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-about-content .sub' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .ns-about-content .sub',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-about-content h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .ns-about-content h2',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-about-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .ns-about-content p',
                ]
            );
            $this->add_control(
                'li_icon_color',
                [
                    'label'     => __( 'Lists Icon Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-about-content .inner-items .item .icon' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'li_icon_hcolor',
                [
                    'label'     => __( 'Lists Icon Hover Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-about-content .inner-items .item:hover .icon' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'li_title_color',
                [
                    'label'     => __( 'Lists Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-about-content .inner-items .item .content h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_lititle',
                    'label'    => __( 'Lists Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .ns-about-content .inner-items .item .content h3',
                ]
            );
            $this->add_control(
                'li_con_color',
                [
                    'label'     => __( 'Lists Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ns-about-content .inner-items .item .content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_licon',
                    'label'    => __( 'Lists Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .ns-about-content .inner-items .item .content p',
                ]
            );
            $this->add_control(
                'btn_onecolor', [
                    'label'     => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_onebgcolor', [
                    'label'     => __( 'Button Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_onehcolor', [
                    'label'     => __( 'Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_onehbgcolor', [
                    'label'     => __( 'Button Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn::before, .default-btn::after' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_btn2',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .default-btn',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

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

        $ns_fea_item  = $settings['ns_fea_item'];

        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
		endif;
    ?>

        <div class="ns-about-content">
            <?php if($settings['top_title'] != ''): ?>
                <span class="sub"><?php echo esc_html($settings['top_title']); ?></span>
            <?php endif; ?>

            <?php if($settings['sec_title'] != ''): ?>
                <h2><?php echo wp_kses_post($settings['sec_title']); ?></h2>
            <?php endif; ?>

            <?php if($settings['sec_content'] != ''): ?>
                <p><?php echo wp_kses_post($settings['sec_content']); ?></p>
            <?php endif; ?>

            <?php if($settings['show_lists'] == 'yes'): ?>
                <div class="inner-items">
                    <?php foreach( $ns_fea_item as $item ): ?>
                        <div class="item">
                            <?php if( !empty( $item['image']['url'] ) ){ ?>
                                <div class="icon">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                                </div>
                            <?php } ?>

                            <div class="content">
                                <h3> <?php echo esc_html( $item['list_title'] ); ?></h3>
                                <p> <?php echo esc_html( $item['list_content'] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ( $settings['button_text'] != '' ) : ?>
                <?php if ( 'yes' === $settings['target_page'] ) { ?>
                    <div class="about-btn"><a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                    <?php echo esc_html( $settings['button_text'] ); ?>
                    </a></div><?php
                } else { ?>
                    <div class="about-btn"><a href="<?php echo esc_url( $link_source ); ?>" class="default-btn">
                    <?php echo esc_html( $settings['button_text'] ); ?>
                    </a></div><?php
                } ?>
            <?php endif; ?>
        </div>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_About_InnerItems );