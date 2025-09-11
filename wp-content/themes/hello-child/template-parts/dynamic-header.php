<?php
/**
 * The template for displaying header.
 *
 * @package Hello Elementor Child
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (!hello_get_header_display()) {
	return;
}

$is_editor = isset($_GET['elementor-preview']);
$site_name = get_bloginfo('name');
$tagline = get_bloginfo('description', 'display');
$header_class = did_action('elementor/loaded') ? hello_get_header_layout_class() : '';
$menu_args = [
	'theme_location' => 'menu-1',
	'fallback_cb' => false,
	'container' => false,
	'echo' => false,
];
$header_nav_menu = wp_nav_menu($menu_args);
$header_mobile_nav_menu = wp_nav_menu($menu_args); // The same menu but separate call to avoid duplicate ID attributes.
?>
<div class="child-sub-header">
	<div class="emergency">
		<span class="badge">Emergency</span>
		<span>24/7 urgent site assistance & rapid response</span>
	</div>
	<div class="phone">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
			stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" data-lucide="phone"
			class="lucide lucide-phone edit-mode-selected w-[24px] h-[24px]" id="aura-emfffv41t"
			style="width: 24px; height: 24px; color: rgb(154, 52, 18);" data-icon-replaced="true">
			<path
				d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"
				class=""></path>
		</svg>
		<span>+33 6 00 00 00 00</span>
	</div>
</div>
<hr class="child-header-separator" />
<header id="site-header" class="site-header dynamic-header <?php echo esc_attr($header_class); ?>">

	<div class="header-inner">
		<div
			class="site-branding show-<?php echo esc_attr(hello_elementor_get_setting('hello_header_logo_type')); ?>">
			<?php if (has_custom_logo() && ('title' !== hello_elementor_get_setting('hello_header_logo_type') || $is_editor)): ?>
				<div class="site-logo <?php echo esc_attr(hello_show_or_hide('hello_header_logo_display')); ?>">
					<?php the_custom_logo(); ?>
				</div>
			<?php endif;

			if ($site_name && ('logo' !== hello_elementor_get_setting('hello_header_logo_type') || $is_editor)): ?>
				<div class="site-title <?php echo esc_attr(hello_show_or_hide('hello_header_logo_display')); ?>">
					<a href="<?php echo esc_url(home_url('/')); ?>"
						title="<?php echo esc_attr__('Home', 'hello-elementor'); ?>" rel="home">
						<?php echo esc_html($site_name); ?>
					</a>
				</div>
			<?php endif;

			if ($tagline && (hello_elementor_get_setting('hello_header_tagline_display') || $is_editor)): ?>
				<p class="site-description <?php echo esc_attr(hello_show_or_hide('hello_header_tagline_display')); ?>">
					<?php echo esc_html($tagline); ?>
				</p>
			<?php endif; ?>
		</div>

		<?php if ($header_nav_menu): ?>
			<nav class="site-navigation <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>"
				aria-label="<?php echo esc_attr__('Main menu', 'hello-elementor'); ?>">
				<?php
				// PHPCS - escaped by WordPress with "wp_nav_menu"
				echo $header_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</nav>
		<?php endif; ?>
		<?php if ($header_mobile_nav_menu): ?>
			<div
				class="site-navigation-toggle-holder <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>">
				<button type="button" class="site-navigation-toggle"
					aria-label="<?php echo esc_attr('Menu', 'hello-elementor'); ?>">
					<span class="site-navigation-toggle-icon" aria-hidden="true"></span>
				</button>
			</div>
			<nav class="site-navigation-dropdown <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>"
				aria-label="<?php echo esc_attr__('Mobile menu', 'hello-elementor'); ?>" aria-hidden="true" inert>
				<?php
				// PHPCS - escaped by WordPress with "wp_nav_menu"
				echo $header_mobile_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</nav>
		<?php endif; ?>
	</div>
</header>