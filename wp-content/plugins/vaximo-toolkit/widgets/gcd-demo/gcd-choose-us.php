<?php
namespace Elementor;
class Gcd_Choose extends Widget_Base{
    public function get_name(){
        return "Choose_Gcd";
    }
    public function get_title(){
        return "Gcd Choose Us";
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
                'label' => __('Gcd Choose Us Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'video_url',
                [
                    'label'   => __( 'Video Url', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                ]
            );

            $this->add_control(
                'mask_img',
                [
                    'label'     => __('Mask Images', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
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
                    'default' => __( 'Who We Are: Protecting the Nations <strong>Digital Landscape,</strong> ensuring a secure, resilient cyber space for citizens, and government.', 'vaximo-toolkit' ),
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
                'toptitle_op_heading',
                [
                    'label' => esc_html__( 'Top Title Color', 'textdomain' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
           
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'toptitle_op_background',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .gcd-section-title .sub span',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_toptitle_op',
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
                        '{{WRAPPER}} .gcd-about-content h2, {{WRAPPER}} .gcd-about-content h3, {{WRAPPER}} .gcd-about-content h1, {{WRAPPER}} .gcd-about-content h4, {{WRAPPER}} .gcd-about-content h5, {{WRAPPER}} .gcd-about-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} {{WRAPPER}} .gcd-about-content h2, {{WRAPPER}} .gcd-about-content h3, {{WRAPPER}} .gcd-about-content h1, {{WRAPPER}} .gcd-about-content h4, {{WRAPPER}} .gcd-about-content h5, {{WRAPPER}} .gcd-about-content h6',
                ]
            );
            
            $this->add_control(
                'li_title_color',
                [
                    'label'     => __( 'Lists Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-choose-card h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_lititle',
                    'label'    => __( 'Lists Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-choose-card h3',
                ]
            );
            $this->add_control(
                'li_con_color',
                [
                    'label'     => __( 'Lists Content Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gcd-choose-card p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_licon',
                    'label'    => __( 'Lists Content Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .gcd-choose-card p',
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

        <!-- Start GCD Choose Area -->
		<div class="gcd-choose-area ptb-120 teachers-fonts-home">
			<div class="container">
				<div class="gcd-section-title">
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
				</div>
				<div class="row justify-content-center align-items-center g-5">

                    <?php $i=1; foreach( $ns_fea_item as $item  ): 

                        if($i==1):
                        
                    ?>
                        <div class="col-lg-3 col-md-12">
                            <div class="gcd-choose-card">
                                <?php if($item['image']['url'] != ''): ?>
                                    <div class="icon">
                                        <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__("icon", "vaximo-toolkit"); ?>">
                                    </div>
                                <?php endif; ?>
                                <h3> <?php echo wp_kses_post( $item['list_title'] ); ?></h3>
                                <p> <?php echo wp_kses_post( $item['list_content'] ); ?></p>
                            </div>
                        </div>
                    <?php 
                        endif;
                        $i++; endforeach; 
                    ?>
					<div class="col-lg-6 col-md-12">

						<div class="gcd-choose-image">
                            <?php if($settings['video_url']!= ''): ?>
                                <video loop="" muted="" autoplay="" class="choose-video">
                                    <source src="<?php echo esc_attr( $settings['video_url']); ?>" type="video/mp4">
                                </video>
                            <?php endif; ?>

                            <?php if($settings['mask_img']['url'] != ''): ?>
                                <div class="mask">
                                    <img src="<?php echo esc_url( $settings['mask_img']['url'] ); ?>" alt="<?php echo esc_attr__("icon", "vaximo-toolkit"); ?>">
                                </div>
                            <?php endif; ?>
						</div>

						<div class="row justify-content-center g-5">
                            <?php $i=1; foreach( $ns_fea_item as $item  ): 

                                if($i==2 OR $i==3):
                            ?>
                                <div class="col-lg-6 col-md-6">
                                    <div class="gcd-choose-card">
                                        <?php if($item['image']['url'] != ''): ?>
                                            <div class="icon">
                                                <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__("icon", "vaximo-toolkit"); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <h3> <?php echo wp_kses_post( $item['list_title'] ); ?></h3>
                                        <p> <?php echo wp_kses_post( $item['list_content'] ); ?></p>
                                    </div>
                                </div>
                            <?php 
                                endif;
                                $i++; endforeach; 
                            ?>
						</div>
					</div>

                    <?php $i=1; foreach( $ns_fea_item as $item  ): 

                        if($i==4):
                    ?>
                        <div class="col-lg-3 col-md-12">
                            <div class="gcd-choose-card">
                                <?php if($item['image']['url'] != ''): ?>
                                    <div class="icon">
                                        <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__("icon", "vaximo-toolkit"); ?>">
                                    </div>
                                <?php endif; ?>
                                <h3> <?php echo wp_kses_post( $item['list_title'] ); ?></h3>
                                <p> <?php echo wp_kses_post( $item['list_content'] ); ?></p>
                            </div>
                        </div>
                    <?php 
                        endif;
                    $i++; endforeach; 
                    ?>
                    
				</div>
			</div>
		</div>
		<!-- End GCD Choose Area -->

        <?php
    }
}
Plugin::instance()->widgets_manager->register( new Gcd_Choose );