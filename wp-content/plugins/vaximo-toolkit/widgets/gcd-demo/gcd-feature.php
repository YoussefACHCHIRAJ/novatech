<?php
namespace Elementor;
class Gcd_Feature extends Widget_Base{
    public function get_name(){
        return "Feature_Gcd";
    }
    public function get_title(){
        return "Gcd Feature";
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
                'label' => __('Gcd Feature Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
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
                    'list_title',
                    [
                        'label'   => __( 'Title', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'Comprehensive Cybersecurity Approach', 'vaximo-toolkit' ),
                    ]
                );
                $fea_items->add_control(
                    'list_content',
                    [
                        'label'   => __( 'Description', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( "Focus on prevention, detection, and response to cyber threats.", "vaximo-toolkit" ),
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
                'li_title_color',
                [
                    'label'     => __( 'Lists Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-features-card .content h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_lititle',
                    'label'    => __( 'Lists Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .gcd-features-card .content h3',
                ]
            );
            $this->add_control(
                'li_con_color',
                [
                    'label'     => __( 'Lists Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-features-card .content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_licon',
                    'label'    => __( 'Lists Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .gcd-features-card .content p',
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

        <!-- Start GCD Features Area -->
		<div class="gcd-features-area pt-120 pb-95 teachers-fonts-home">
			<div class="container">
				<div class="row justify-content-center">
                    
                    <?php $i=1; foreach( $ns_fea_item as $item  ): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="gcd-features-card">
                                <?php if($item['image']['url'] != ''): ?>
                                    <div class="image">
                                        <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__("icon", "vaximo-toolkit"); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="content">
                                    <h3> <?php echo wp_kses_post( $item['list_title'] ); ?></h3>
                                    <p> <?php echo wp_kses_post( $item['list_content'] ); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php 
                        $i++; endforeach; 
                    ?>
					
				</div>
			</div>
		</div>
		<!-- End GCD Features Area -->

        <?php
    }
}
Plugin::instance()->widgets_manager->register( new Gcd_Feature );