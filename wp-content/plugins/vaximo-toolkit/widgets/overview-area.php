<?php
/**
 * Overview Control Section
 */

namespace Elementor;
class Vaximo_overview extends Widget_Base {

	public function get_name() {
        return 'overview_Section';
    }

	public function get_title() {
        return __( 'Overview Area', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-tabs';
    }

	public function get_categories() {
        return ['vaximocategory'];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'feature_tabs',
			[
				'label' => __( 'Overview Area', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $card_items = new Repeater();
            $card_items->add_control(
                'image',
                [
                    'label' => __('Image', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
            $card_items->add_control(
                'title',
                [
                    'type'    => Controls_Manager::TEXTAREA,
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'default' => __('Intercom System', 'vaximo-toolkit'),
                ]
            );
            $card_items->add_control(
                'btn_title',
                [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => __( 'Button Title', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'link_type',
                [
                    'label'       => __( 'Link Type', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'   => __( 'Link To Page', 'vaximo-toolkit' ),
                        '2'   => __( 'External Link', 'vaximo-toolkit' ),
                    ],
                ]
            );
            $card_items->add_control(
                'link_to_page',
                [
                    'label'       => __( 'Link Page', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => vaximo_toolkit_get_page_as_list(),
                    'condition'   => [
                        'link_type'     => '1',
                    ]
                ]
            );
            $card_items->add_control(
                'external_link',
                [
                    'label'     => __('External Link', 'vaximo-toolkit'),
                    'type'      => Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type'  => '2',
                    ]
                ]
            );
            $card_items->add_control(
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
            $this->add_control(
                'overview_items',
                [
                    'label'       => __( 'Add Content', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'feature_tab_style',
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
                        '{{WRAPPER}} .overview-content-box .content h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'title_typography',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .overview-content-box .content h3',
                ]
            );
             // Button One
             $this->add_control(
                'btn1_color',
                [
                    'label'     => __( 'Button Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .overview-content-box .content .default-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'inner_divi',
                [
                    'type'      => Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'sec_bghead',
                [
                    'label'     => esc_html__( 'Button Background', 'cyarb-toolkit' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'     => 'btn1bg_color',
                    'types'    => ['gradient' ],
                    'selector' => '{{WRAPPER}} .overview-content-box .content .default-btn',
                ]
            );
            $this->add_control(
                'inner_div2',
                [
                    'type'      => Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'btn1_hcolor',
                [
                    'label'     => __( 'Button Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .overview-content-box .content .default-btn:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn1_hbgcolor',
                [
                    'label'     => __( 'Button Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .overview-content-box .content .default-btn::after, .overview-content-box .content .default-btn::before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), 
                [
                    'name'     => 'typography_btn1',
                    'label'    => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .overview-content-box .content .default-btn',
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

        ?>
            <div class="overview-area">
                <div class="container-fluid">
                    <div class="row">
                        <?php foreach( $settings['overview_items'] as $item ): 
                            $link_source = '';
                            if ( $item['link_type'] == 1 ) :
                                $link_source = get_page_link($item['link_to_page']); 
                            else :
                                $link_source = $item['external_link'];
                            endif; 
                        ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="overview-content-box">
                                <?php if( !empty( $item['image']['url'] ) ){ ?>
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'cavie-toolkit' ); ?>">   
                                <?php } ?>

                                <div class="content">
                                    <h3>  <?php echo esc_html( $item['title'] ); ?></h3>
                                    <?php if( $item['btn_title'] != '') { ?>
                                        <?php if ( 'yes' === $item['target_page'] ) { ?>
                                            <a class="default-btn" target="_blank" href="<?php echo esc_url( $link_source ); ?>">
                                                <?php echo esc_html( $item['btn_title'] ); ?>
                                            </a><?php
                                        } else { ?>
                                            <a class="default-btn" href="<?php echo esc_url( $link_source ); ?>">
                                                <?php echo esc_html( $item['btn_title'] ); ?>
                                            </a><?php
                                        } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php
	}
	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_overview );