<?php
$theme = wp_get_theme(); // gets the current theme
if ( 'Vaximo' == $theme->name || 'Vaximo' == $theme->parent_theme ) {
	/**	
	 * Classes
	 */
	require_once(VAXIMO_ACC_PATH . 'inc/admin/core.php');

    /**
     * Redirect after theme activation
     */
    add_action( 'after_switch_theme', function() {
        if ( isset( $_GET['activated'] ) ) {
            wp_safe_redirect( admin_url('admin.php?page=vaximo-activation&lk-refresh=true') );
            update_option( 'vaximo_purchase_code_status', '', 'yes' );
            update_option( 'vaximo_purchase_code', '', 'yes' );
            exit;
        }
        update_option('notice_dismissed', '0');
    });

    if (version_compare($theme->get('Version'), VAXIMO_TOOLKIT_VERSION, '>')) {
        function vaximo_toolkit_update_notice() {
            $update_message = sprintf(
                /* translators: %1$s: Plugins page URL, %2$s: Vaximo Theme Plugins page URL */
                esc_html__(
                    'A new version of Vaximo Toolkit is available! Please navigate to %1$s, delete the old Vaximo Toolkit plugin, and then install the updated version from %2$s.',
                    'vaximo'
                ),
                '<a href="' . esc_url(admin_url('plugins.php')) . '"><strong>' . esc_html__('Dashboard → Plugins', 'vaximo') . '</strong></a>',
                '<a href="' . esc_url(admin_url('admin.php?page=vaximo-admin-plugins')) . '"><strong>' . esc_html__('Dashboard → Vaximo Theme → Plugins', 'vaximo') . '</strong></a>'
            );
        
            echo '<div class="notice notice-error is-dismissible">';
            echo '<p><strong>' . esc_html__('Important Update:', 'vaximo') . '</strong> ' . $update_message . '</p>';
            echo '</div>';
        }
        add_action('admin_notices', 'vaximo_toolkit_update_notice');
    }
}