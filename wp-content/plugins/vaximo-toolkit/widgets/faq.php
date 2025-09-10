<?php
/**
 * FAQ Widget
 */

namespace Elementor;
class Vaximo_Faq extends Widget_Base {

	public function get_name() {
        return 'FAQ';
    }

	public function get_title() {
        return __( 'Vaximo FAQ', 'vaximo-toolkit' );
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
				'label' => __( 'Faq Control', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'choose_style',
                [
                    'label' => __( 'Choose Style', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => __( 'Style One', 'vaximo-toolkit' ),
                        '2'   => __( 'Style Two (Right Image)', 'vaximo-toolkit' ),
                        '3'   => __( 'Style Three (Left Image)', 'vaximo-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'faq_text_alignment',
                [
                    'label' => __( 'Choose Title Alignment', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'     => __( 'Text Align Center', 'vaximo-toolkit' ),
                        '2'     => __( 'Text Align Right', 'vaximo-toolkit' ),
                        '3'     => __( 'Text Align Left', 'vaximo-toolkit' ),
                    ],
                    'default' => '3'
                ]
            );
                // Left FAQ
                $faq_items = new Repeater();

                $faq_items->add_control(
                    'title',
                    [
                        'label'   => __( 'Title', 'vaximo-toolkit' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => __( 'Which material types can you work with?', 'vaximo-toolkit' ),
                    ]
                );
                $faq_items->add_control(
                    'content',
                    [
                        'label'   => __( 'Description', 'vaximo-toolkit' ),
                        'type' => Controls_Manager::WYSIWYG,
                        'default' => __( 'Lorem, ipsum dolor sit amet How do you Startup? consectetur adipisicing elit. Accusamus ipsa error, excepturi, obcaecati aliquid veniam blanditiis quas voluptates maxime unde, iste minima dolores dolor perferendis facilis. How do you Startup blanditiis voluptates Lorem, ipsum dolor sit amet How do you Startup amet How do.', 'vaximo-toolkit' ),
                    ]
                );
                $this->add_control(
                    'faq_item',
                    [
                        'label'       => __( 'Faq Left Item', 'vaximo-toolkit' ),
                        'type'        => Controls_Manager::REPEATER,
                        'fields'      => $faq_items->get_controls(),
                    ]
                );

            $this->add_control(
                'image',
                [
                    'label'     => __('Upload Image One', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                    'condition' => [
                        'choose_style!' => '1'
                    ]
                ]
            );
            // Right FAQ
            $faq_items2 = new Repeater();

            $faq_items2->add_control(
                'title2',
                [
                    'label'   => __( 'Title', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'Which material types can you work with?', 'vaximo-toolkit' ),
                ]
            );
            $faq_items2->add_control(
                'content2',
                [
                    'label'   => __( 'Description', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'vaximo-toolkit' ),
                ]
            );
            $this->add_control(
                'faq_right_item',
                [
                    'label'       => __( 'Faq Right Item', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $faq_items2->get_controls(),
                    'condition'   => [
                        'choose_style' => '1'
                    ]
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
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .faq-accordion .accordion .accordion-title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_title',
                    'label'    => __( 'Title Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .faq-accordion .accordion .accordion-title',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .faq-accordion .accordion .accordion-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name'     => 'typography_desc',
                    'label'    => __( 'Description Typography', 'vaximo-toolkit' ),
                     
                    'selector' => ' {{WRAPPER}} .faq-accordion .accordion .accordion-content p',
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings  = $this->get_settings_for_display();

        // Text Alignment
        if( $settings['faq_text_alignment' ] == '1') {
            $alignment = 'text-center';
        } 
        elseif( $settings['faq_text_alignment' ] == '2') {
            $alignment = 'text-right';
        } else {
            $alignment = 'text-left';
        }

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

        $faq_item  = $settings['faq_item'];
        ?>

    <?php if ( $settings['choose_style'] == '1' ) : 
        $faq_item2 = $settings['faq_right_item']; ?>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="faq-accordion mb-used <?php echo esc_attr( $alignment); ?>">
                        <ul class="accordion">
                            <?php $loop = 1; foreach( $faq_item as $item ): 
                                if ($loop == 1) {
                                    $active = 'active';
                                    $show = 'show';
                                } else {
                                    $active = '';
                                    $show = '';
                                } ?>
                                <li class="accordion-item">
                                    <a class="accordion-title <?php echo esc_attr( $active ); ?>" href="javascript:void(0)">
                                        <i class="bx bx-plus"></i>
                                        <?php echo esc_html( $item['title'] ); ?>
                                    </a>
                                    <div class="accordion-content <?php echo esc_attr( $show ); ?>">
                                        <p><?php echo wp_kses_post($item['content'] ); ?></p>
                                    </div>
                                </li>
                            <?php $loop++; endforeach; ?>
                        </ul>
                    </div>
                </div>
                
                <!-- Right FAQ -->
                <div class="col-lg-6">
                    <div class="faq-accordion <?php echo esc_attr( $alignment); ?>">
                        <ul class="accordion">
                            <?php foreach( $faq_item2 as $item ): ?>
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="bx bx-plus"></i>
                                        <?php echo esc_html( $item['title2'] ); ?>
                                    </a>
                                    <div class="accordion-content">
                                        <p><?php echo wp_kses_post($item['content2'] ); ?></p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    <?php else : ?>
        <div class="container">
            <div class="row align-items-center">
                <?php if ( $settings['choose_style'] == '3' ) : ?>
                    <?php if( !empty( $settings['image']['url'] ) ){ ?>
                        <div class="col-lg-6">
                            <div class="faq-img-four">
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                            </div>
                        </div>
                    <?php } ?>
                <?php endif; ?>

                <?php if( $settings['image']['url'] != '' ) : ?>
                    <div class="col-lg-6 ">
                <?php else: ?>
                    <div class="col-lg-12 fullwidth">
                <?php endif; ?>
                    <div class="faq-accordion <?php echo esc_attr( $alignment); ?>">
                        <ul class="accordion">
                            <?php $loop = 1; foreach( $faq_item as $item ): 
                                if ($loop == 1) {
                                    $active = 'active';
                                    $show = 'show';
                                } else {
                                    $active = '';
                                    $show = '';
                                } ?>
                                <li class="accordion-item">
                                    <a class="accordion-title <?php echo esc_attr( $active ); ?>" href="javascript:void(0)">
                                        <i class="bx bx-plus"></i>
                                        <?php echo esc_html( $item['title'] ); ?>
                                    </a>
                                    <div class="accordion-content <?php echo esc_attr( $show ); ?>">
                                        <p><?php echo wp_kses_post($item['content'] ); ?></p>
                                    </div>
                                </li>
                            <?php $loop++; endforeach; ?>
                        </ul>
                    </div>
                </div>
                
                <?php if ( $settings['choose_style'] == '2' ) : ?>
                    <?php if( !empty( $settings['image']['url'] ) ){ ?>
                        <div class="col-lg-6">
                            <div class="faq-img">
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Image', 'vaximo-toolkit' ); ?>">
                            </div>
                        </div>
                    <?php } ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
        <?php
	}

	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Faq );