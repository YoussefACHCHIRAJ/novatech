<?php

/**
 * Preview script for html markup generator
 *
 * @package tutor-droip-elements
 */

namespace TutorLMSDroip;

use Droip\Ajax\ExportImport;
use TUTOR\Course;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Helper
 * This class is used to define all helper functions.
 */
class Helper {


	/**
	 * Function to activate droip elements plugin
	 */
	public static function t_d_e_activate() {
	}

	/**
	 * This function will verify nonce
	 * ACT like API calls auth middleware
	 *
	 * @param string $action ajax action name.
	 *
	 * @return void
	 */
	public static function verify_nonce( $action = -1 ) {
		$nonce = sanitize_text_field( isset( $_SERVER['HTTP_X_WP_NONCE'] ) ? wp_unslash( $_SERVER['HTTP_X_WP_NONCE'] ) : null );
		if ( ! wp_verify_nonce( $nonce, $action ) ) {
			wp_send_json_error( 'Not authorized' );
			exit;
		}
	}

	public static function is_course_for_single_purchaseble($course_id){
		$selling_option = Course::get_selling_option( $course_id );
		return empty($selling_option) || Course::SELLING_OPTION_ONE_TIME == $selling_option;
	}
}
