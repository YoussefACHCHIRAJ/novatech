<?php
/**
 * Innovation items Widget
 */

namespace Elementor;
class Vaximo_Ai_Innovation extends Widget_Base {

	public function get_name() {
        return 'Ai_Innovation';
    }

	public function get_title() {
        return __( 'AI Powered Security Innovation', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-help-o';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_Innovation',
			[
				'label' => __( 'Innovation Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'innovation_id',
                [
                    'label'   => __( 'Innovation Content Id', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'innovation', 'vaximo-toolkit' ),
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
                    'default' => __( 'OUR NEWEST AI INNOVATION', 'vaximo-toolkit' ),
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
                    'default' => __( 'AI delivers better security and more efficient IT', 'vaximo-toolkit' ),
                ]
            );

            $fea_items = new Repeater();

                $fea_items->add_control(
                    'f_img',
                    [
                        'type'    => Controls_Manager::MEDIA,
                        'label'   => __( 'Images', 'vaximo-toolkit' ),
                    ]
                );

                $fea_items->add_control(
                    'list_title',
                    [
                        'label'   => __( 'Title', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'Pivot to proactive security', 'vaximo-toolkit' ),
                    ]
                );

                $fea_items->add_control(
                    'list_content',
                    [
                        'label'   => __( 'Content', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'Engaging, scenario-based lessons on topics like phishing.', 'vaximo-toolkit' ),
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

        $this->end_controls_section();

        $this->start_controls_section(
			'ai_innovation_style',
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
                    'selector' => '{{WRAPPER}} .gcd-section-title .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle',
                    'label'    => __( 'Top Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-section-title .sub span',
                ]
            );
            

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-section-title h2, {{WRAPPER}} .gcd-section-title h3, {{WRAPPER}} .gcd-section-title h1, {{WRAPPER}} .gcd-section-title h4, {{WRAPPER}} .gcd-section-title h5, {{WRAPPER}} .gcd-section-title h6, {{WRAPPER}} .text-white' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .gcd-section-title h2, {{WRAPPER}} .gcd-section-title h3, {{WRAPPER}} .gcd-section-title h1, {{WRAPPER}} .gcd-section-title h4, {{WRAPPER}} .gcd-section-title h5, {{WRAPPER}} .gcd-section-title h6',
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
                    'selector' => '{{WRAPPER}} .ai-innovation-card',
                ]
            );

            $this->add_control(
                'list_title_color',
                [
                    'label'     => __( 'List Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-innovation-card h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list_title',
                    'label'    => __( 'List Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-innovation-card h3',
                ]
            );
            
            $this->add_control(
                'list_content_color',
                [
                    'label'     => __( 'List Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-innovation-card p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_list_content',
                    'label'    => __( 'List Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .ai-innovation-card p',
                ]
            );

        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

        $ns_fea_item  = $settings['ns_fea_item'];

    ?>

        <!-- Start AI Innovation Area -->
        <div <?php if( !empty( $settings['innovation_id']) ){ ?> id="<?php echo esc_attr( $settings['innovation_id'] ); ?>" <?php } ?> class="ai-innovation-area teachers-fonts-home pb-120">
            <div class="gcd-section-title text-start">
                <?php if ( $settings['top_title_op'] == '1' ) : ?>
                    <div class="sub sub justify-content-start">
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
                
                <<?php echo esc_attr( $settings['heading_tag'] ); ?> class="text-white"><?php echo wp_kses_post( $settings['sec_title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
            </div>
            <div class="row justify-content-center g-4">
                <?php $i=1; foreach( $ns_fea_item as $item  ):  ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="ai-innovation-card">
                            <?php if( !empty( $item['f_img']['url'] ) ){ ?>
                                <img src="<?php echo esc_url( $item['f_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                            <?php } ?>
                            <?php if($item['list_title'] != ''): ?>
                                <h3><?php echo wp_kses_post( $item['list_title'] ); ?></h3>
                            <?php endif; ?>
                            <?php if($item['list_content'] != ''): ?>
                                <p><?php echo wp_kses_post( $item['list_content'] ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php 
                    $i++; endforeach; 
                ?>
                
            </div>
            <div class="ellipse"></div>
        </div>
        <!-- End AI Innovation Area -->

        <?php
	}
}

Plugin::instance()->widgets_manager->register( new Vaximo_Ai_Innovation );