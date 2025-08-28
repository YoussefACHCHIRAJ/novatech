<?php
//about theme info
add_action( 'admin_menu', 'plant_nest_gettingstarted_page' );
function plant_nest_gettingstarted_page() {      
    add_theme_page( esc_html__('Plant Nest', 'plant-nest'), esc_html__('All About Plant Nest', 'plant-nest'), 'edit_theme_options', 'plant_nest_mainpage', 'plant_nest_content_main');   
}


// Add a Custom CSS file to WP Admin Area
function plant_nest_admin_page_theme_style() {
   wp_enqueue_style('plant-nest-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstarted/getstarted.css');
}
add_action('admin_enqueue_scripts', 'plant_nest_admin_page_theme_style');

//About Theme Info
function plant_nest_content_main() { 

    //custom function about theme customizer

    $return = add_query_arg( array()) ;
    $theme = wp_get_theme( 'plant-nest' );
?>

<div class="theme-discount-banner">
    <h2><?php esc_html_e('🚀 Limited Time Offer – Flat 15% OFF on All Premium WordPress Themes! 🎉', 'plant-nest'); ?></h2>
    <p><?php esc_html_e('Upgrade your website with our stunning, high-performance WordPress themes at an exclusive 15% discount! 💰✨', 'plant-nest'); ?></p>
    
    <ul class="discount-benefits">
        <li>✅ <?php esc_html_e('SEO Optimized & Speed Fast 🚀', 'plant-nest'); ?></li>
        <li>✅ <?php esc_html_e('Fully Responsive & Mobile-Friendly 📱', 'plant-nest'); ?></li>
        <li>✅ <?php esc_html_e('Customizer Support for Easy Customization 🎨', 'plant-nest'); ?></li>
        <li>✅ <?php esc_html_e('Premium Features & Regular Updates 🔥', 'plant-nest'); ?></li>
    </ul>
    
    <p class="discount-code"><?php esc_html_e('👉 Use Code: ', 'plant-nest'); ?> <span>SAVE15</span> <?php esc_html_e(' at Checkout', 'plant-nest'); ?></p>
    
    <a href="https://cawpthemes.com/plant-nest-premium-wordpress-theme/" class="cta-button"><?php esc_html_e('Shop Now 🚀', 'plant-nest'); ?></a>
    
    <p class="offer-expiry"><?php esc_html_e('📅 Hurry! Offer ends soon.', 'plant-nest'); ?></p>
</div>


<div class="admin-main-box">
    <div class="admin-left-box">
        <h2><?php esc_html_e( 'Welcome to Plant Nest Theme', 'plant-nest' ); ?> <span class="version"><?php $theme_info = wp_get_theme();
echo $theme_info->get( 'Version' );?></span></h2>
        <p><?php esc_html_e('CA WP Themes is a premium WordPress theme development company that provides high-quality themes for various types of websites. They specialize in creating themes for businesses, eCommerce, portfolios, blogs, and many more. Their themes are easy to use and customize, making them perfect for those who want to create a professional-looking website without any coding skills.','plant-nest'); ?></p>
        <p><?php esc_html_e('CA WP Themes offers a wide range of themes that are designed to be responsive and compatible with the latest versions of WordPress. Our themes are also SEO optimized, ensuring that your website will rank well on search engines. They come with a variety of features such as customizable widgets, social media integration, and custom page templates.','plant-nest'); ?></p>
        <p><?php esc_html_e('One of the unique things about CA WP Themes is their focus on providing excellent customer support. They have a dedicated team of support staff who are available 24/7 to help customers with any issues they may encounter. Their support team is knowledgeable and friendly, ensuring that customers receive the best possible experience.','plant-nest'); ?></p>
    </div>
    <div class="admin-right-boxt">
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Buy Plant Nest Premium Theme','plant-nest'); ?></h4>
             <p><?php esc_html_e('Now the Premium Version is only at $39.99 with Lifetime Access!Grab the deal now!', 'plant-nest'); ?></p>
            <div class="info-link">
                <a href="<?php echo esc_url( plant_nest_PRO_URL ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'plant-nest' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Premium Theme Demo','plant-nest'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( plant_nest_PRO_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Demo', 'plant-nest' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Need Support? / Contact Us','plant-nest'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( plant_nest_PRO_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Contact Us', 'plant-nest' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Documentation','plant-nest'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( plant_nest_PRO_DOCUMENTATION ); ?>" target="_blank"> <?php esc_html_e( 'Docs', 'plant-nest' ); ?></a>
            </div>
        </div>
    </div>
</div>


<?php } ?>