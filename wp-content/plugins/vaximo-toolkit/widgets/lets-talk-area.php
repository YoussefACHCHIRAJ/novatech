<?php
namespace Elementor;
class LetsTalkWidget extends Widget_Base{
    public function get_name(){
        return "lets-talk-widget";
    }
    public function get_title(){
        return "Lets Talk Area";
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
                    'label' => __( 'Banner Image', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'banner_text_alignment',
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
                'title',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Modern Information Protect From Hackers', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'head_tag',
                [
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
                    'default' => 'h2',
                ]
            );
            $this->add_control(
                'content',
                [
                    'label'   => __( 'Content', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::WYSIWYG,
                    'default' => __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil architecto laborum eaque! Deserunt maxime, minus quas molestiae reiciendis esse natus nisi iure.', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'desc_note1', [
                    'label' => '',
                    'type'  => Controls_Manager::RAW_HTML,
                    'raw'   => __( 'In description editor use a class in p tag. When editing the editor its remove existing p, span tag', 'vaximo-toolkit' ),
                    'content_classes' => 'elementor-warning',
                ]
            );
            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Button Text', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Get Started', 'vaximo-toolkit'),
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
                        '{{WRAPPER}} .lats-talk-area .lats-talk-content h2, .lats-talk-area .lats-talk-content h1, .lats-talk-area .lats-talk-content h3, .lats-talk-area .lats-talk-content h4, .lats-talk-area .lats-talk-content h5, .lats-talk-area .lats-talk-content h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .lats-talk-area .lats-talk-content h2, .lats-talk-area .lats-talk-content h1, .lats-talk-area .lats-talk-content h3, .lats-talk-area .lats-talk-content h4, .lats-talk-area .lats-talk-content h5, .lats-talk-area .lats-talk-content h6',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .lats-talk-area .lats-talk-content p, .lats-talk-area .lats-talk-content ul li, .lats-talk-area .lats-talk-content ol li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Content Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .lats-talk-area .lats-talk-content p, .lats-talk-area .lats-talk-content ul li, .lats-talk-area .lats-talk-content ol li',
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
                        '{{WRAPPER}} .default-btn::before, .default-btn::after' => 'background-color: {{VALUE}};',
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

        // Text Alignment
        if( $settings['banner_text_alignment' ] == '1') {
            $alignment = 'text-center';
        } 
        elseif( $settings['banner_text_alignment' ] == '2') {
            $alignment = 'text-right';
        } else {
            $alignment = 'text-left';
        }
        
        // Button link
        $link_source = '';
        if ( $settings['link_type'] == 1 ) :
            $link_source = get_page_link( $settings['link_to_page']); 
        else :
            $link_source = $settings['external_link'];
		endif; ?>

        <div class="lats-talk-area ptb-100" style="background-image: url(<?php echo esc_url( $settings['image']['url']); ?> )">
			<div class="container">
				<div class="lats-talk-content <?php echo esc_attr( $alignment); ?>">
                    <<?php echo esc_attr( $settings['head_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['head_tag'] ); ?>>
                    
                    <?php echo wp_kses_post( $settings['content'] ); ?>

                    <?php if ( $settings['button_text'] != '' ) : ?>
                        <?php if ( 'yes' === $settings['target_page'] ) { ?>
                            <a target="_blank" href="<?php echo esc_url( $link_source ); ?>" class="default-btn six">
                            <i class="bx bx-file"></i>
                            <?php echo esc_html( $settings['button_text'] ); ?>
                            </a><?php
						} else { ?>
                            <a href="<?php echo esc_url( $link_source ); ?>" class="default-btn six">
                            <i class="bx bx-file"></i>
                            <?php echo esc_html( $settings['button_text'] ); ?>
                            </a><?php
                        } ?>
                    <?php endif; ?>
				</div>
			</div>
        </div>
        <?php
    }

     
}
Plugin::instance()->widgets_manager->register( new LetsTalkWidget );