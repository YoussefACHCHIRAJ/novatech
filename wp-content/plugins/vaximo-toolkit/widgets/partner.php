<?php
/**
 * Partner Logo Slider Widget
 */

namespace Elementor;
class Vaximo_Partner_Logo extends Widget_Base {

	public function get_name() {
        return 'Partner_Logo';
    }

	public function get_title() {
        return __( 'Partner Logo', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-logo';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'partner_section',
			[
				'label' => __( 'Partner Logo', 'vaximo-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'choose_style',
                [
                    'label' => __( 'Choose Style', 'vaximo-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => __( 'Style one', 'vaximo-toolkit' ),
                        '2'   => __( 'Style two', 'vaximo-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );
            $card_items = new Repeater();

            $card_items->add_control(
                'logo_link',
                [
                    'type'    => Controls_Manager::URL,
                    'label'   => __( 'Logo Link', 'vaximo-toolkit' ),
                    'default' => [
                        'url' => '#',
                    ],
                ]
            );
            $card_items->add_control(
                'logo',
                [
                    'type'    => Controls_Manager::MEDIA,
                    'label'   => __( 'Logo', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'overlay_logo',
                [
                    'type'    => Controls_Manager::MEDIA,
                    'label'   => __( 'Overlay Logo', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'desc_note1',
                [
                    'type'    => Controls_Manager::RAW_HTML,
                    'raw'   => __( 'Keep Overlay Logo Blank for Style Two', 'vaximo-toolkit' ),
                    'content_classes' => 'elementor-warning',
                ]
            );
            $this->add_control(
                'logos',
                [
                    'label'       => __( 'Add Logo', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
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

        $slider = $settings['logos'];
        $count = 0;
        foreach ( $slider as $item ) {
            $count++;
        }

        ?>

        <?php if ( $settings['choose_style'] == '1' ) : ?>
            <div class="partner-area ptb-100">
                <div class="container">

                    <?php if ( $count == 1 ) { ?>
                    <div class="col-lg-6 col-md-12 offset-lg-3"><?php
                    } elseif ( $count == 2 || $count == 3 ) { ?>
                    <div class="row"><?php
                    } else { ?>
                    <div class="partner-wrap owl-carousel owl-theme"><?php
                    } ?>
                        <?php foreach( $settings['logos'] as $item ): 
                                if( $count == 2 ){ ?>
                                <div class="col-lg-6 col-md-6"> <?php
                                } elseif( $count == 3 ){ ?>
                                    <div class="col-lg-4 col-md-6"> <?php
                                } ?>
                                <div class="partner-item">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Logo', 'vaximo-toolkit' ); ?>">
                                    <a class="partner-overly" href="<?php echo esc_url( $item['logo_link']['url'] ); ?>">
                                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['overlay_logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Logo', 'vaximo-toolkit' ); ?>">
                                    </a>
                                </div>
                            <?php if( $count == 2 || $count == 3 ){ ?>
                                </div> <?php
                            } ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="container">
                <div class="row">
                    <div class="partner-slider-six owl-carousel owl-theme">
                        <?php foreach( $settings['logos'] as $item ): ?>
                            <div class="partner-item">
                                <a href="<?php echo esc_url( $item['logo_link']['url'] ); ?>">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Logo', 'vaximo-toolkit' ); ?>">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}
	 

}

Plugin::instance()->widgets_manager->register( new Vaximo_Partner_Logo );