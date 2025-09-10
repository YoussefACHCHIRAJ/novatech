<?php
namespace Elementor;
class CTA_Feature extends Widget_Base{
    public function get_name(){
        return "Feature_CTA";
    }
    public function get_title(){
        return "CTA Feature";
    }
    public function get_icon(){
        return "eicon-banner";
    }
    public function get_categories(){
        return ['vaximocategory'];
    }

    protected function register_controls(){
        // Tab content controls
        $this-> start_controls_section(
            'section_content',
            [
                'label' => __('CTA Feature Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'image',
                [
                    'label' => __( 'Feature Image', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $fea_items = new Repeater();

                $fea_items->add_control(
                    'list_title',
                    [
                        'label'   => __( 'Title', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'Interactive Training Modules', 'vaximo-toolkit' ),
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

        $this-> end_controls_section();

        // End Tab content controls

        // Start style1 content controls
        $this-> start_controls_section(
            'content_style',
            [
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'topbr_heading',
                [
                    'label' => esc_html__( 'Top Border Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
        
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'topbar_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .cta-features-card .bar',
                ]
            );
            
            $this->add_control(
                'li_title_color',
                [
                    'label'     => __( 'Lists Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-features-card h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_lititle',
                    'label'    => __( 'Lists Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .cta-features-card h3',
                ]
            );
            $this->add_control(
                'li_con_color',
                [
                    'label'     => __( 'Lists Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-features-card p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_licon',
                    'label'    => __( 'Lists Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .cta-features-card p',
                ]
            );
            
         
        $this-> end_controls_section();
        // End Style content controls
    }

    protected function render()
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display();

        $ns_fea_item  = $settings['ns_fea_item'];

        ?>

        <!-- Start CTA Features Area -->
		<div class="cta-features-area teachers-fonts-home">
			<div class="container">

                <?php if($settings['image']['url'] != ''): ?>
                    <div class="cta-features-large-image">
                        <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__('image','vaximo-toolkit'); ?>">
                    </div>
                <?php endif; ?>
				<div class="row justify-content-center g-5">
                    <?php $i=1; foreach( $ns_fea_item as $item  ): ?>
                        <?php if($item['list_title'] && $item['list_content']): ?>
                            <div class="col-xl-3 col-sm-6">
                                <div class="cta-features-card">
                                    <div class="bar"></div>
                                    <h3> <?php echo wp_kses_post( $item['list_title'] ); ?></h3>
                                    <p> <?php echo wp_kses_post( $item['list_content'] ); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php 
                        $i++; endforeach; 
                    ?>
                        
				</div>
			</div>
		</div>
		<!-- End CTA Features Area -->

        <?php
    }
}
Plugin::instance()->widgets_manager->register( new CTA_Feature );