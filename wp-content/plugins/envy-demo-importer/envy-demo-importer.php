<?php
/*
Plugin Name: Envy Demo Importer
Plugin URI: http://envytheme.com
Description: Uninstall this plugin after you've finished importing demo contents
Version: 1.0.0
Author: EnvyTheme
Author URI: http://envytheme.com
*/

if ( is_admin() && !defined( 'FW' ) ) {
	require_once dirname(__FILE__) . '/envy/framework/bootstrap.php';

	add_filter( 'fw_framework_directory_uri', 'htdi_fw_framework_directory_uri' );
	add_action( 'admin_menu',                 'htdi_remove_unyson_menus', 12 );
	add_action( 'network_admin_menu',         'htdi_remove_unyson_menus', 12 );
	add_action( 'after_setup_theme',          'htdi_remove_unyson_footer_version', 12 );
	add_action( 'admin_enqueue_scripts',      'htdi_fw_admin_styles', 20 );
	//add_filter( 'fw:ext:backups:add-restore-task:image-sizes-restore', '__return_false' ); // Enable it to skip image restore step
	add_action( 'after_plugin_row_' . plugin_basename( __FILE__ ), 'show_demo_plugin_notification', 10, 3 );
}

function htdi_fw_framework_directory_uri() {
	return plugin_dir_url( __FILE__ ) . 'envy/framework';
}

function htdi_remove_unyson_menus() {
	remove_menu_page( 'fw-extensions' );
}

function htdi_remove_unyson_footer_version() {
	$fw_obj = fw();
	remove_filter( 'update_footer', array( $fw_obj->backend, '_filter_footer_version'), 11 );
}

function htdi_fw_admin_styles(){
	$css = "#fw-ext-backups-demo-list .fw-ext-backups-demo-item.active .theme-actions {display: block !important;}";
	wp_add_inline_style( 'fw-ext-backups-demo', $css );
}

function show_demo_plugin_notification( $plugin_file, $plugin_data, $status ) {
	?>
	<tr class="plugin-update-tr">
		<td colspan="4">
			<div class="notice inline notice-warning notice-alt">
				<p>
					<strong>
						<?php esc_html_e("Please, deactivate and delete this plugin after importing the demo data.", 'envy-demo-importer'); ?>
					</strong>
				</p>
		</td>
	</tr>
	<?php
}