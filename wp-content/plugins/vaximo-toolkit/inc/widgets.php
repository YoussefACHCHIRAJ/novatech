<?php

class Vaximo_posts_thumbs extends WP_Widget{

    function __construct(){
        $widget_ops = array('description' => esc_html__('Display Random or Recent posts with a small image.', 'vaximo-toolkit'));
        parent::__construct( false, esc_html__('Vaximo Recent Posts With Image', 'vaximo-toolkit'), $widget_ops);
    }

    function widget($args, $instance){
        global $vaximo_theme, $vaximo_opt;
        extract($args); //it receives an associative array

        $title = apply_filters('widget_title', $instance['title']);
        $args = array(
            'posts_per_page' => $instance['number'],
            'post_type' => 'post',
            'order' => 'DESC',
            'orderby' => $instance['orderby']
        );
       
        $query = new WP_Query($args);

        if( !$query->have_posts() ) return;
        echo $before_widget;
        if($title) echo $before_title.$title.$after_title;
        if(!$instance['number']) $instance['number'] = 4;

        if($query->have_posts()):
            $c = 0;
            
            while($query->have_posts()): $query->the_post(); ?>
                <?php
                $class = 'item';
                $post_id = get_the_ID();
                $thumb_size = 'vaximo_widget_thumb';
                ?>
                <?php if( !has_post_thumbnail() ) $class .= ' no-thumb'; ?>
                <article <?php post_class($class); ?>>

                    <?php if( has_post_thumbnail() ): ?>
                        <?php
                        $thumb_id   = get_post_thumbnail_id($post_id);
                        $thumb_type = get_post_mime_type($thumb_id);
                        $image_alt  = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
                        if( !$image_alt ){
                            $image_alt = get_the_title($post_id);
                        }
                        if($thumb_type == 'image/gif'){
                            $thumb_size = '';
                        }
                        ?>
                        <a href="<?php the_permalink(); ?>" class="thumb hover-effect" aria-label="<?php the_title(); ?>">
                            <?php if( !empty($vaximo_theme) && $vaximo_theme['enable_lazyload'] == '1' ): ?>
                                <span class="fullimage cover lazy" role="img" aria-label="<?php echo esc_attr($image_alt); ?>" data-src="<?php the_post_thumbnail_url($thumb_size); ?>"></span>
                            <?php else: ?>
                                <span class="fullimage cover" role="img" aria-label="<?php echo esc_attr($image_alt); ?>" style="background: url('<?php the_post_thumbnail_url($thumb_size); ?>');"></span>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>

                    <div class="info gradient-effect">
                        <?php if( isset( $vaximo_opt['is_post_meta'] ) && $vaximo_opt['is_post_meta'] == true ) { ?>
                            <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( get_option('date_format') ); ?></time>
                        <?php } ?>
                        <h4 class="title usmall"><a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words( get_the_title(), 6, '...' )); ?></a></h4>								
                    </div>

                    <div class="clear"></div>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
        endif;
        echo $after_widget;
    }

    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['orderby'] = $new_instance['orderby'];
        return $instance;
    }

    function form($instance){
        $defaults = array(
            'title' => 'Recent posts',
            'number' => 4,
            'orderby' => 'date'
        );
        $instance = wp_parse_args((array)$instance, $defaults);
        $number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php esc_html_e('Title:', 'vaximo-toolkit'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e( 'Number of posts to show:', 'vaximo-toolkit'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('orderby'); ?>"><?php esc_html_e('Mode:', 'vaximo-toolkit') ?> </label>
            <select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>">
                <option <?php if ($instance['orderby'] == 'date') echo 'selected="selected"'; ?> value="date"><?php esc_html_e('Recent Posts', 'vaximo-toolkit'); ?></option>
                <option <?php if ($instance['orderby'] == 'rand') echo 'selected="selected"'; ?> value="rand"><?php esc_html_e('Random Posts', 'vaximo-toolkit'); ?></option>
                <?php if( function_exists('get_field') ): // By views ?>
                    <option <?php if ($instance['orderby'] == 'views') echo 'selected="selected"'; ?> value="views"><?php esc_html_e('Post views', 'vaximo-toolkit'); ?></option>
                <?php endif; ?>
            </select>
        </p>
        <?php
    }

}

function vaximo_register_posts_thumbs() {
    register_widget('Vaximo_posts_thumbs');
}

add_action('widgets_init', 'vaximo_register_posts_thumbs');

/**
 * Newsletter Widget
 */
class vaximo_newsletter extends WP_Widget{

    function __construct(){
        $widget_ops = array('description' => esc_html__('Display Contact Info', 'vaximo-toolkit'));
        parent::__construct( false, esc_html__('Vaximo Footer Newsletter', 'vaximo-toolkit'), $widget_ops);
    }

    function widget($args, $instance){
        extract($args);

        global $vaximo_theme;

        $footer_style = function_exists( 'get_field' ) ? get_field( 'footer_style' ) : '';

        echo $before_widget;
        ?>

            <div class="single-footer-wrap-widget width-350">
                <?php if( $instance['logo'] != '' ): ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo d-inline-block">
                        <img src="<?php echo esc_url( $instance['logo'] ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                <?php endif; ?>
                <?php if( $instance['newsletter_text'] != '' ): ?>
                    <p><?php echo esc_attr($instance['newsletter_text']); ?></p>
                <?php endif; ?>
                <?php if( $instance['newsletter_sp'] != '' ): ?>
                    <span><?php echo esc_attr($instance['newsletter_sp']); ?></span>
                <?php endif; ?>

                <?php if( $instance['email_url'] != '' ): ?>
                    <form class="mailchimp newsletter-form" method="post">
                        <input type="email" class="form-control memail" placeholder="<?php echo esc_attr($instance['email_placeholder']); ?>" name="EMAIL" required>

                        <?php if( $instance['button_text'] != '' ): ?>
                            <button type="submit" class="gcd-default-btn">
                                <?php echo esc_attr($instance['button_text']); ?>
                                <i class='bx bx-right-arrow-alt'></i>
                            </button>
                        <?php endif; ?>
                        
                        <div class="mchimp-errmessage alert alert-danger" style="display: none;"></div>
                        <div class="mchimp-sucmessage alert alert-primary" style="display: none;"></div>

                    </form>
                <?php endif; ?>
            </div>

        <script>
            ;(function($){
                "use strict";
                $(document).ready(function () {
                    // MAILCHIMP
                    $(".mailchimp").ajaxChimp({
                        callback: mailchimpCallback,
                        url: "<?php echo esc_js($instance['email_url']) ?>"
                    });
                    $(".memail").on("focus", function () {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("keydown", function () {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("click", function () {
                        $(".memail").val("");
                    });

                    function mailchimpCallback(resp) {
                        if (resp.result === "success") {
                            $(".mchimp-sucmessage").html(resp.msg).fadeIn(1000);
                            $(".mchimp-sucmessage").fadeOut(3000);
                        } else if (resp.result === "error") {
                            $(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
                        }
                    }
                });
            })(jQuery)
        </script>

        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance){
        $instance                       = $old_instance;
        $instance['logo']               = $new_instance['logo'];
        $instance['newsletter_text']    = $new_instance['newsletter_text'];
        $instance['newsletter_sp']      = $new_instance['newsletter_sp'];
        $instance['email_url']          = $new_instance['email_url'];
        $instance['email_placeholder']  = $new_instance['email_placeholder'];
        $instance['button_text']        = $new_instance['button_text'];
        
        return $instance;
    }

    function form($instance){
        $defaults = array(
            'Logo'                      => '',
            'newsletter_text'           => 'Their quick response saved our organization from a ransomware attack. The guidance was clear, timely, and effective.',
            'newsletter_sp'             => 'SUBSCRIBE OUR NEWSLETTER',
            'email_url'                 => 'https://envytheme.us20.list-manage.com/subscribe/post?u=60e1ffe2e8a68ce1204cd39a5&amp;id=42d6d188d9',
            'email_placeholder'         => 'Your email here',
            'button_text'               => 'Subscribe',
        );
        $instance = wp_parse_args((array)$instance, $defaults);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('logo'); ?>">
                <?php esc_html_e('Logo:', 'vaximo-toolkit'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('logo'); ?>" name="<?php echo $this->get_field_name('logo'); ?>" type="text" value="<?php echo $instance['logo']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('newsletter_text'); ?>">
                <?php esc_html_e('Newsletter Title:', 'vaximo-toolkit'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('newsletter_text'); ?>" name="<?php echo $this->get_field_name('newsletter_text'); ?>" type="text" value="<?php echo $instance['newsletter_text']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('newsletter_sp'); ?>">
                <?php esc_html_e('Newsletter Bottom Content:', 'vaximo-toolkit'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('newsletter_sp'); ?>" name="<?php echo $this->get_field_name('newsletter_sp'); ?>" type="text" value="<?php echo $instance['newsletter_sp']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('email_url'); ?>">
                <?php esc_html_e('Action URL:', 'vaximo-toolkit'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('email_url'); ?>" name="<?php echo $this->get_field_name('email_url'); ?>" type="text" value="<?php echo $instance['email_url']; ?>" />
            </label>
            <i>Enter here your MailChimp action URL. <a href="https://www.docs.envytheme.com/docs/vaximo-theme-documentation/tips-guides-troubleshoots/get-mailchimp-newsletter-form-action-url/" target="_blank"> How to </a></i>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('email_placeholder'); ?>">
                <?php esc_html_e('Placeholder Title:', 'vaximo-toolkit'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('email_placeholder'); ?>" name="<?php echo $this->get_field_name('email_placeholder'); ?>" type="text" value="<?php echo $instance['email_placeholder']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('button_text'); ?>">
                <?php esc_html_e('Submit Button Text:', 'vaximo-toolkit'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo $instance['button_text']; ?>" />
            </label>
        </p>
        
        <?php
    }

}

function vaximo_register_newsletter() {
    register_widget('vaximo_newsletter');
}

add_action('widgets_init', 'vaximo_register_newsletter');