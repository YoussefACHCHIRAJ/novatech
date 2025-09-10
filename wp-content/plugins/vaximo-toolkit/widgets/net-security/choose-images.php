<?php
namespace Elementor;
class NS_ChooseImages extends Widget_Base{
    public function get_name(){
        return "NS_ChooseImages";
    }
    public function get_title(){
        return "NS Choose Images";
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
                'label' => __('Choose Images', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
            $this->add_control(
                'image',
                [
                    'label' => __( ' Image One', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'image2',
                [
                    'label' => __( ' Image Two', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
        $this-> end_controls_section();
      
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
        endif; ?>

        <div class="ns-choose-images">
            <div class="row justify-content-center">
                <?php if($settings['image']['url'] != ''): ?>
                    <div class="col-lg-6 col-sm-6 col-6">
                        <div class="image1">
                            <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url']); ?>" alt="<?php echo esc_attr__("image", "vaximo-toolkit"); ?>">
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($settings['image2']['url'] != ''): ?>
                    <div class="col-lg-6 col-sm-6 col-6">
                        <div class="image2">
                            <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image2']['url']); ?>" alt="<?php echo esc_attr__("image2", "vaximo-toolkit"); ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register( new NS_ChooseImages );