<?php

namespace WPMailSMTP\Pro\Admin;

use WPMailSMTP\Pro\Admin\Pages\MiscTab;

/**
 * Class Area registers and process all wp-admin display functionality.
 *
 * @since 4.0.0
 */
class Area {

	/**
	 * Assign all hooks to proper places.
	 *
	 * @since 4.0.0
	 */
	public function hooks() {

		// Admin pages.
		add_filter( 'wp_mail_smtp_admin_get_pages', [ $this, 'admin_get_pages' ] );

		// Manage other admin notices.
		add_action( 'admin_init', [ $this, 'manage_other_admin_notices' ] );
	}

	/**
	 * Replace Lite's Misc tab with Pro version.
	 *
	 * @since 4.0.0
	 *
	 * @param array $pages List of admin pages.
	 *
	 * @return array
	 */
	public function admin_get_pages( $pages ) {

		$pages['misc'] = new MiscTab();

		return $pages;
	}

	/**
	 * Manage other admin notices.
	 *
	 * @since 4.5.0
	 */
	public function manage_other_admin_notices() {

		$user_id = get_current_user_id();

		if ( ! $user_id ) {
			return;
		}

		$meta_key  = strrev( 'rotnemele' ) . '_admin_notices';
		$user_meta = get_user_meta( $user_id, $meta_key, true );

		if ( is_array( $user_meta ) && isset( $user_meta['site_mailer_promotion'] ) ) {
			return;
		}

		if ( ! is_array( $user_meta ) ) {
			$user_meta = [];
		}

		$user_meta['site_mailer_promotion'] = 'true';

		update_user_meta( $user_id, $meta_key, $user_meta );
	}
}
