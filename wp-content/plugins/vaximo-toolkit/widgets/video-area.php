<?php
namespace Elementor;
class VideoAreaWidget extends Widget_Base{
    public function get_name(){
        return "Video-area-widget";
    }
    public function get_title(){
        return "Video Area";
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
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
            $this->add_control(
                'image',
                [
                    'label' => __( 'Featured Image', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Watch Video', 'vaximo-toolkit'),
                ]
            );

            // Video
            $this->add_control(
                'video_url',
                [
                    'label' => __('Video URL', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                ]
            );
            $this->add_control(
                'video_icon',
                [
                    'label' => __('Video Icon', 'vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                    'default'     => 'bx bx-play',
                    'description' => __('You can use font-awesome, Box icon and Flat icon class name here. ex:bx bx-play','vaximo-toolkit'),
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
                'title_color',
                [
                    'label' => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .video-img-six h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => ' {{WRAPPER}} .video-img-six h3',
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label' => __( 'Icon Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .video-img-six .video-btn i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_bgcolor',
                [
                    'label' => __( 'Icon Background Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .video-img-six .video-btn' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_hcolor',
                [
                    'label' => __( 'Icon Hover Color', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .video-img-six .video-btn:hover i' => 'color: {{VALUE}}',
                    ],
                ]
            );
        $this-> end_controls_section();
        // End Style content controls
    }

    protected function render()
    {
        // Retrieve all controls value
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

			<div class="container">
				<div class="video-img-six">
                    <?php if( $settings['image']['url'] != '' ): ?>
                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__('image', 'vaximo-toolkit' ); ?>">
                    <?php endif; ?>
					
                    <?php if( $settings['video_url'] != '') : ?>
                        <div class="video-button">
                            <a href="<?php echo esc_url( $settings['video_url'] ); ?>" class="video-btn popup-youtube">
                                <i class="<?php echo esc_attr( $settings['video_icon'] ); ?>"></i>
                            </a>
                        </div>
                    <?php endif; ?>

					<h3><?php echo esc_html( $settings['title'] ); ?></h3>
				</div>
			</div>
        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new VideoAreaWidget );