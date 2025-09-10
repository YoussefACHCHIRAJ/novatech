<?php
/* 
 * Plugin Name: Vaximo Toolkit
 * Author: EnvyTheme
 * Author URI: envytheme.com
 * Description: A Light weight and easy toolkit for Elementor page builder widgets.
 * Version: 3.5
 */

if (!defined('ABSPATH')) {
    exit; //Exit if accessed directly
}

define('VAXIMO_TOOLKIT_VERSION', '3.5');
define('VAXIMO_ACC_PATH', plugin_dir_path(__FILE__));

if( !defined('VAXIMO_FRAMEWORK_VAR') ) define('VAXIMO_FRAMEWORK_VAR', 'vaximo_opt');

// Disable Elementor's Default Colors and Default Fonts
update_option( 'elementor_disable_color_schemes', 'yes' );
update_option( 'elementor_disable_typography_schemes', 'yes' );

require_once(VAXIMO_ACC_PATH . 'theme-rt.php');
require_once(VAXIMO_ACC_PATH . 'inc/functions.php');

// Select page for link
function vaximo_toolkit_get_page_as_list() {
    $args = wp_parse_args(array(
        'post_type' => 'page',
        'numberposts' => -1,
    ));

    $posts = get_posts($args);
    $post_options = array(esc_html__('--Select Page--', 'vaximo-toolkit') => '');

    if ($posts) {
        foreach ($posts as $post) {
            $post_options[$post->post_title] = $post->ID;
        }
    }
    $flipped = array_flip($post_options);
    return $flipped;
}

function vaximo_toolkit_get_page_services_cat_el()
{
    $arg = array(
        'taxonomy' => 'service_cat',
        'orderby' => 'name',
        'order'   => 'ASC'
    );
    $args = get_categories($arg);
    $args_options = array(esc_html__('', 'vaximo-toolkit') => '');
    if ($args) {
        foreach ($args as $args) {
            $args_options[$args->name] = $args->slug;
        }
    }
    return $args_options;
}

function vaximo_toolkit_get_page_projects_cat_el()
{
    $arg = array(
        'taxonomy' => 'project_cat',
        'orderby' => 'name',
        'order'   => 'ASC'
    );
    $args = get_categories($arg);
    $args_options = array(esc_html__('', 'vaximo-toolkit') => '');
    if ($args) {
        foreach ($args as $args) {
            $args_options[$args->name] = $args->slug;
        }
    }
    return $args_options;
}

/**
 * Post category list
*/
function vaximo_toolkit_get_post_cat_list() {
	$post_category_id = get_queried_object_id();
	$args = array(
		'parent' => $post_category_id
	);

	$terms = get_terms( 'category', get_the_ID());
	$cat_options = array(esc_html__('', 'vaximo-toolkit') => '');

	if ($terms) {
		foreach ($terms as $term) {
			$cat_options[$term->name] = $term->name;
		}
	}
	return $cat_options;
}

//Custom Post
function vaximo_toolkit_custom_post()
{
	global $vaximo_opt;
	if(isset($vaximo_opt['service_permalink'])) {
		$ser_post_type = $vaximo_opt['service_permalink'];
	} else {
		$ser_post_type = 'service-post';
	}
	if(isset($vaximo_opt['project_permalink'])) {
		$pro_post_type = $vaximo_opt['project_permalink'];
	} else {
		$pro_post_type = 'project-post';
	}
	// Services Custom Post
 	register_post_type('service',
        array(
            'labels' => array(
                'name' => esc_html__('Services', 'vaximo-toolkit'),
                'singular_name' => esc_html__('Service', 'vaximo-toolkit'),
            ),
            'menu_icon' => 'dashicons-images-alt',
            'supports' => array('title', 'thumbnail', 'editor', 'page-attributes','excerpt'),
            'has_archive' => true,
			'public'   => true,
			'rewrite' => array( 'slug' => $ser_post_type ),
        )
	);
	// Projects Custom Post
 	register_post_type('project',
        array(
            'labels' => array(
                'name' => esc_html__('Projects', 'vaximo-toolkit'),
                'singular_name' => esc_html__('Project', 'vaximo-toolkit'),
            ),
            'menu_icon' => 'dashicons-images-alt',
            'supports' => array('title', 'thumbnail', 'editor', 'page-attributes','excerpt'),
            'has_archive' => true,
			'public'   => true,
			'rewrite' => array( 'slug' => $pro_post_type ),
        )
	);
}

add_action('init', 'vaximo_toolkit_custom_post');

//Taxonomy Custom Post
function vaximo_custom_post_taxonomy(){
    register_taxonomy(
        'service_cat',
        'service',
            array(
            'hierarchical'      => true,
            'label'             => esc_html__('Service Category', 'vaximo-toolkit' ),
            'query_var'         => true,
            'show_admin_column' => true,
                'rewrite'       => array(
                'slug'          => 'service-category',
                'with_front'    => true
            )
        )
    );
    register_taxonomy(
        'project_cat',
        'project',
            array(
            'hierarchical'      => true,
            'label'             => esc_html__('Project Category', 'vaximo-toolkit' ),
            'query_var'         => true,
            'show_admin_column' => true,
                'rewrite'       => array(
                'slug'          => 'project-category',
                'with_front'    => true
            )
        )
    );

	register_taxonomy( 
        'project_tag', //taxonomy 
        'project', //post-type
        array( 
            'hierarchical'  => false, 
            'label'         => esc_html__( 'Tags','vaximo-toolkit'), 
            'singular_name' => esc_html__( 'Tag', 'vaximo-toolkit' ), 
            'rewrite'       => true, 
            'query_var'     => true,
            'show_admin_column' => true,
		)
	);
}
add_action('init', 'vaximo_custom_post_taxonomy');

// Main vaximo Toolkit Class

final class Elementor_Vaximo_Extension {

	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION = '7.0';

	// Instance
    private static $_instance = null;
    
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	// Constructor
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	// init
	public function init() {
        load_plugin_textdomain( 'vaximo-toolkit' );

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
        
        add_action('elementor/elements/categories_registered',[ $this, 'register_new_category'] );
        
    }

    public function register_new_category($manager){
        $manager->add_category('vaximocategory',[
            'title'=>esc_html__('Vaximo Category','vaximo-toolkit'),
            'icon'=> 'fa fa-image'
        ]);
    }

	//Admin notice
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'vaximo-toolkit' ),
			'<strong>' . esc_html__( 'Vaximo Toolkit', 'vaximo-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'vaximo-toolkit' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'vaximo-toolkit' ),
			'<strong>' . esc_html__( 'Vaximo Toolkit', 'vaximo-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'vaximo-toolkit' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'vaximo-toolkit' ),
			'<strong>' . esc_html__( 'Vaximo Toolkit', 'vaximo-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'vaximo-toolkit' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	// Toolkit Widgets
	public function init_widgets() {
		// Include Widget files
		$pcs = trim( get_option( 'vaximo_purchase_code_status' ) );
		if ( $pcs == 'valid' ) {
			require_once( __DIR__ . '/widgets/banner-one.php' );
			require_once( __DIR__ . '/widgets/banner-two.php' );
			require_once( __DIR__ . '/widgets/banner-three.php' );
			require_once( __DIR__ . '/widgets/banner-slider.php' );
			require_once( __DIR__ . '/widgets/banner-six.php' );
			require_once( __DIR__ . '/widgets/serve-card.php' );
			require_once( __DIR__ . '/widgets/choose-us-tab.php' );
			require_once( __DIR__ . '/widgets/video-area.php' );
			require_once( __DIR__ . '/widgets/lets-talk-area.php' );
			require_once( __DIR__ . '/widgets/tab-services-area.php' );
			require_once( __DIR__ . '/widgets/partner.php' );
			require_once( __DIR__ . '/widgets/security-card.php' );
			require_once( __DIR__ . '/widgets/section.php' );
			require_once( __DIR__ . '/widgets/security-approach.php' );
			require_once( __DIR__ . '/widgets/tab-electronic-area.php' );
			require_once( __DIR__ . '/widgets/feedback.php' );
			require_once( __DIR__ . '/widgets/cyber-security-area.php' );
			require_once( __DIR__ . '/widgets/post-area.php' );
			require_once( __DIR__ . '/widgets/pricing.php' );
			require_once( __DIR__ . '/widgets/team.php' );
			require_once( __DIR__ . '/widgets/faq.php' );
			require_once( __DIR__ . '/widgets/coming-soon.php' );
			require_once( __DIR__ . '/widgets/contact-box.php' );
			require_once( __DIR__ . '/widgets/services.php' );
			require_once( __DIR__ . '/widgets/feature-card.php' );
			require_once( __DIR__ . '/widgets/funfacts.php' );
			require_once( __DIR__ . '/widgets/transform-progress-area.php' );
			require_once( __DIR__ . '/widgets/choose-area.php' );
			require_once( __DIR__ . '/widgets/graph-area.php' );
			// V2.1
			require_once( __DIR__ . '/widgets/banner-seven.php' );
			require_once( __DIR__ . '/widgets/security-card-two.php' );
			require_once( __DIR__ . '/widgets/safer-world-area.php' );
			require_once( __DIR__ . '/widgets/services-security.php' );
			require_once( __DIR__ . '/widgets/funfacts-two.php' );
			require_once( __DIR__ . '/widgets/success-services.php' );
			require_once( __DIR__ . '/widgets/feedback-two.php' );
			require_once( __DIR__ . '/widgets/tab-control-area.php' );
			require_once( __DIR__ . '/widgets/pricing-two.php' );
			require_once( __DIR__ . '/widgets/operation-area.php' );
			require_once( __DIR__ . '/widgets/expert-team-area.php' );
			require_once( __DIR__ . '/widgets/post-area-two.php' );
			require_once( __DIR__ . '/widgets/banner-eight.php' );
			require_once( __DIR__ . '/widgets/overview-area.php' );
			require_once( __DIR__ . '/widgets/banner-nine.php' );
			require_once( __DIR__ . '/widgets/tab-expert-support.php' );
			// V2.6
			require_once( __DIR__ . '/widgets/button.php' );

			// V3.1
			require_once( __DIR__ . '/widgets/cs-video/banner-ten.php' );
			require_once( __DIR__ . '/widgets/net-security/top-header-info.php' );
			require_once( __DIR__ . '/widgets/net-security/top-header-social.php' );
			require_once( __DIR__ . '/widgets/net-security/ns-navbar.php' );
			require_once( __DIR__ . '/widgets/net-security/banner.php' );
			require_once( __DIR__ . '/widgets/net-security/fea-card.php' );
			require_once( __DIR__ . '/widgets/net-security/about-images.php' );
			require_once( __DIR__ . '/widgets/net-security/about-inner-items.php' );
			require_once( __DIR__ . '/widgets/net-security/funfact-card.php' );
			require_once( __DIR__ . '/widgets/net-security/section.php' );
			require_once( __DIR__ . '/widgets/net-security/services-slider.php' );
			require_once( __DIR__ . '/widgets/net-security/faq.php' );
			require_once( __DIR__ . '/widgets/net-security/choose-images.php' );
			require_once( __DIR__ . '/widgets/net-security/feedback.php' );
			require_once( __DIR__ . '/widgets/net-security/projects-slider.php' );
			require_once( __DIR__ . '/widgets/net-security/choose-wrap-lists.php' );
			require_once( __DIR__ . '/widgets/net-security/projects-category.php' );
			require_once( __DIR__ . '/widgets/net-security/projects-tag.php' );
			require_once( __DIR__ . '/widgets/net-security/projects-search.php' );

			require_once( __DIR__ . '/widgets/net-security/footer-copy.php' );
			require_once( __DIR__ . '/widgets/net-security/footer-info-social.php' );
			require_once( __DIR__ . '/widgets/net-security/footer-menu.php' );
			require_once( __DIR__ . '/widgets/net-security/footer-con-info.php' );
			require_once( __DIR__ . '/widgets/net-security/footer-newsletter.php' );

			// Cloud Security
			require_once( __DIR__ . '/widgets/cs-banner.php' );
			require_once( __DIR__ . '/widgets/post-area-three.php' );
			require_once( __DIR__ . '/widgets/feedback-three.php' );
			require_once( __DIR__ . '/widgets/cs-feature.php' );
			require_once( __DIR__ . '/widgets/cs-services.php' );

			// New
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-banner.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-about.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-services.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/slide-text.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-feature.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-choose-us.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-feedback.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-motto.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-blog.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-report.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-take-control.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-expert-support.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-scroll-overview.php' );
			require_once( __DIR__ . '/widgets/gcd-demo/gcd-help-button.php' );

			require_once( __DIR__ . '/widgets/cta-demo/cta-banner.php' );
			require_once( __DIR__ . '/widgets/cta-demo/cta-about.php' );
			require_once( __DIR__ . '/widgets/cta-demo/cta-feature.php' );
			require_once( __DIR__ . '/widgets/cta-demo/cta-why-us.php' );
			require_once( __DIR__ . '/widgets/cta-demo/cta-work.php' );
			require_once( __DIR__ . '/widgets/cta-demo/cta-tools.php' );
			require_once( __DIR__ . '/widgets/cta-demo/cta-feedback.php' );
			require_once( __DIR__ . '/widgets/cta-demo/cta-blog.php' );
			require_once( __DIR__ . '/widgets/section-two.php' );
			require_once( __DIR__ . '/widgets/cta-demo/cta-navbar.php' );
			require_once( __DIR__ . '/widgets/cta-demo/cta-cources.php' );

			require_once( __DIR__ . '/widgets/ai-demo/ai-banner.php' );
			require_once( __DIR__ . '/widgets/ai-demo/ai-patner.php' );
			require_once( __DIR__ . '/widgets/ai-demo/ai-left-menu.php' );
			require_once( __DIR__ . '/widgets/ai-demo/ai-overview.php' );
			require_once( __DIR__ . '/widgets/ai-demo/ai-why.php' );
			require_once( __DIR__ . '/widgets/ai-demo/ai-innovation.php' );
			require_once( __DIR__ . '/widgets/ai-demo/ai-solution.php' );
			require_once( __DIR__ . '/widgets/ai-demo/ai-platform-tab.php' );
			require_once( __DIR__ . '/widgets/ai-demo/ai-blog-tab.php' );
			require_once( __DIR__ . '/widgets/ai-demo/ai-contact.php' );
			require_once( __DIR__ . '/widgets/ai-demo/ai-explore.php' );
			require_once( __DIR__ . '/widgets/preloder.php' );

			// V3.5
			require_once( __DIR__ . '/widgets/contact-info-two.php' );
			require_once( __DIR__ . '/widgets/ser-brochures.php' );
			require_once( __DIR__ . '/widgets/sidebar-services-posts.php' );
			require_once( __DIR__ . '/widgets/services-related-posts.php' );
			

		}
	}

}
Elementor_Vaximo_Extension::instance();

// Redux Theme Options
$pcs = trim( get_option( 'vaximo_purchase_code_status' ) );
if ( $pcs == 'valid' ) {
	require_once(VAXIMO_ACC_PATH . 'redux/ReduxCore/framework.php');
	require_once(VAXIMO_ACC_PATH . 'redux/sample/sample-config.php');
	require_once(VAXIMO_ACC_PATH . 'redux/ReduxCore/custom-fonts/custom-fonts.php' );

	require_once(VAXIMO_ACC_PATH . 'inc/demo-importer-ocdi.php');
	require_once(VAXIMO_ACC_PATH . 'inc/demo-importer.php');

	require_once(VAXIMO_ACC_PATH . 'inc/widgets.php');
	require_once(VAXIMO_ACC_PATH . 'inc/icons.php');
	require_once(VAXIMO_ACC_PATH . 'inc/acf.php');
}

//Registering crazy toolkit files
function vaximo_toolkit_files()
{
    wp_enqueue_style('font-awesome-4.7', plugin_dir_url(__FILE__) . 'assets/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'vaximo_toolkit_files');

// Extra P tag
add_filter('the_content', 'vaximo_remove_empty_p', 20, 1);
function vaximo_remove_empty_p($content){
    $content = force_balance_tags($content);
    return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}

// Extra P tag from widget
remove_filter('widget_text_content', 'wpautop');

add_filter('script_loader_tag', 'vaximo_clean_script_tag');
function vaximo_clean_script_tag($input) {
	$input = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $input );
	return $input;
}

function vaximo_admin_css() {
	echo '<style>.#fw-ext-brizy,#fw-extensions-list-wrapper .toggle-not-compat-ext-btn-wrapper,.fw-brz-dismiss{display:none}.fw-brz-dismiss{display:none}.fw-extensions-list-item{display:none!important}#fw-ext-backups{display:block!important}#update-nag,.update-nag{display:block!important} .fw-sole-modal-content.fw-text-center .fw-text-danger.dashicons.dashicons-warning:before { content: "Almost finished! Please check with a reload." !important;}.fw-sole-modal-content.fw-text-center .fw-text-danger.dashicons.dashicons-warning {color: green !important; width:100%} .fw-modal.fw-modal-open > .media-modal-backdrop {width: 100% !important;}</style>';
  }
add_action('admin_head', 'vaximo_admin_css');

/**
 * Extend Icon pack core controls.
 *
 * @param  object $controls_manager Controls manager instance.
 * @return void
 */ 

function vaximo_icon_pack( $controls_manager ) {

	require_once(VAXIMO_ACC_PATH . 'inc/icon.php');

	$controls = array(
		$controls_manager::ICON => 'TRYO_Icon_Controler',
	);

	foreach ( $controls as $control_id => $class_name ) {
		$controls_manager->unregister_control( $control_id );
		$controls_manager->register_control( $control_id, new $class_name() );
	}
}

function vaximo_add_actual_link_to_footer(){
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	if ( strpos($actual_link, 'themes.envytheme.com/vaximo') != false ): ?>
		<div class="et-demo-options-toolbar">
			<?php
			global $wp;
			$current_url = home_url(add_query_arg(array(), $wp->request));
			$home_url = home_url(); ?>

			<?php if( vaximo_rtl() == true ): ?>
				<a href="<?php echo esc_url( $current_url ); ?>" class="hint--bounce hint--left hint--black" id="toggle-quick-options" aria-label="LTR Demo">
					<i class="fa fa-align-left"></i>
				</a>
			<?php else: ?>
				<a href="<?php echo esc_url( $current_url ); ?>/?rtl=enable" class="hint--bounce hint--left hint--black" id="toggle-quick-options" aria-label="RTL Demo">
					<i class="fa fa-align-right"></i>
				</a>
			<?php endif; ?>
			<a href="mailto:hello@envytheme.com" target="_blank" rel="nofollow" class="hint--bounce hint--left hint--black" aria-label="Reach Us">
				<i class="fa fa-life-ring"></i>
			</a>
			<a href="https://docs.envytheme.com/docs/vaximo-theme-documentation/" target="_blank" rel="nofollow" class="hint--bounce hint--left hint--black" aria-label="Documentation">
				<i class="fa fa-book"></i>
			</a>
			<a href="https://1.envato.market/K1Gq9" target="_blank" rel="nofollow" class="hint--bounce hint--left hint--black" aria-label="Purchase Vaximo">
				<i class="fa fa-shopping-cart"></i>
			</a>

		</div>
	<?php
	endif;
}

add_action( 'wp_footer', 'vaximo_add_actual_link_to_footer' );

function vaximo_toolkit_enable_svg_upload( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'vaximo_toolkit_enable_svg_upload', 10, 1 );

/**
 * Get the existing menus in array format
 * @return array
 */
function vaximo_get_menu_array() {
    $menus = wp_get_nav_menus();
    $menu_array = [];
    foreach ( $menus as $menu ) {
        $menu_array[$menu->slug] = $menu->name;
    }
    return $menu_array;
}


$opt_name = VAXIMO_FRAMEWORK_VAR;