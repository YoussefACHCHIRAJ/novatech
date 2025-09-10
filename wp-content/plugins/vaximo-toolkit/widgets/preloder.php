<?php
/**
 * Preloder Widget
 */

namespace Elementor;
class Vaximo_Preloder extends Widget_Base {

	public function get_name() {
        return 'Pre_Top';
    }

	public function get_title() {
        return __( 'Preloder', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-pojome';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        global $vaximo_opt;

		if( isset( $vaximo_opt['enable_preloader'] ) ):
			$is_preloader = $vaximo_opt['enable_preloader'];
		else:
			$is_preloader = true;
		endif;
		
        $preloader_style    = !empty($vaximo_opt['preloader_style']) ? $vaximo_opt['preloader_style'] : 'circle-spin';

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');

        ?>

        <?php 
            global $vaximo_opt;
            if( isset( $vaximo_opt['enable_preloader'] )):
                $enable_preloader 	= $vaximo_opt['enable_preloader'];
            else:
                $enable_preloader 	= true;
            endif;
		?>
		<?php  if( $is_preloader == true ): 

            if ( $preloader_style == 'text' ) :
                if (!empty( $vaximo_opt['loading_text'] ) ) : ?>
                    <div class="loader-wrapper">
                        <p class="text-center"> <?php echo esc_html( $vaximo_opt['loading_text'] ) ?> </p>
                    </div>
                <?php endif;
            elseif( $preloader_style == 'circle-spin' ) :
                ?>
                <div class="loader-wrapper">
                    <div class="loader"></div>
                    <div class="loader-section section-left"></div>
                    <div class="loader-section section-right"></div>
                </div>
            <?php else : ?>
                <div class="loader-wrapper preloader-img">
                </div>
                <?php 
            endif;
           
        endif; ?>

        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Vaximo_Preloder );


       
       