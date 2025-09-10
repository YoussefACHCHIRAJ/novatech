<?php
/**
 * Preview script for html markup generator
 *
 * @package tutor-droip-elements
 */

namespace TutorLMSDroip;

use Droip\HelperFunctions;
use stdClass;
use TutorLMSDroip\ElementGenerator\Preview;
use TUTOR\Input;
use Tutor\Models\CourseModel;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Ajax
 * This class is used to define all ajax functions.
 *
 * @package TutorLMSDroip
 * @since 1.0.0
 */
class Ajax {


	/**
	 * Class constructor
	 */
	public function __construct() {
		add_action( 'wp_ajax_tutor_handle_api_calls', array( $this, 'tutor_handle_api_calls' ) );
	}

	/**
	 * Handle api calls
	 *
	 * @since 1.0.0
	 */
	public function tutor_handle_api_calls() {
		$request_method = Input::post( 'method' );

		if ( 'generate_html' === $request_method ) {
			tutor_utils()->checking_nonce();

			$course_id  = Input::post( 'course_id' );
            $droip_data = isset( $_REQUEST['droip_data'] ) ? wp_unslash( $_REQUEST['droip_data'] ) : null; //phpcs:ignore
			$droip_data = json_decode( $droip_data, true );

			$blocks = $droip_data['blocks'];
			$styles = $droip_data['styles'];
			$root   = Input::sanitize( $droip_data['root'] );

			$params = array(
				'blocks'       => $blocks,
				'style_blocks' => $styles,
				'root'         => $root,
				'get_variable' => false,
				'get_fonts'    => false,
				'options'      => array( 'post' => get_post( $course_id ) ),
			);

			$collection_wrapper_html_string = HelperFunctions::get_html_using_preview_script( $params );
			wp_send_json_success( $collection_wrapper_html_string );
		}
		if ( 'enroll_course' === $request_method ) {
			tutor_utils()->checking_nonce();
			$course_id = Input::post( 'course_id' );
			$res       = tutor_utils()->do_enroll( $course_id );
			wp_send_json_success( $res );
		}
		if ( 'add_to_cart_course' === $request_method ) {
			tutor_utils()->checking_nonce();
			$course_id = Input::post( 'course_id' );
			$res       = tutor_add_to_cart( $course_id );
			wp_send_json_success( $res );
		}

		if ( 'complete_course' === $request_method ) {
			tutor_utils()->checking_nonce();
			$course_id = Input::post( 'course_id' );
			$user_id   = get_current_user_id();
			if ( ! $user_id ) {
				wp_send_json_error( 'Please Sign-In' );
			}
			CourseModel::mark_course_as_completed( $course_id, $user_id );

			wp_send_json_success( true );
		}

		if ( 'add_qna' === $request_method ) {
			tutor_utils()->checking_nonce();
			$course_id         = Input::post( 'course_id' );
			$comment_parent_id = Input::post( 'comment_parent_id' );
			$content           = Input::post( 'content' );

			$user = wp_get_current_user();
			$date = gmdate( 'Y-m-d H:i:s', tutor_time() );

            $collection_data = isset($_REQUEST['collection_data']) ? json_decode(wp_unslash($_REQUEST['collection_data']), true) : null; //phpcs:ignore

			if ( ! $content ) {
				wp_send_json_error( 'Invalid request' );
			}

			$data = apply_filters(
				'tutor_qna_insert_data',
				array(
					'comment_post_ID'  => $course_id,
					'comment_author'   => $user->user_login,
					'comment_date'     => $date,
					'comment_date_gmt' => get_gmt_from_date( $date ),
					'comment_content'  => $content,
					'comment_approved' => 'approved',
					'comment_agent'    => 'TutorLMSPlugin',
					'comment_type'     => 'tutor_q_and_a',
					'comment_parent'   => $comment_parent_id,
					'user_id'          => $user->ID,
				)
			);

			global $wpdb;

			$response = $wpdb->insert( $wpdb->comments, $data );

			if ( false === $response ) {
				wp_send_json_error( 'Request failed!' );
			}

			$thread = $this->get_comment( $wpdb->insert_id );

			// comment-item.// -qna-reply.
			$new_element_name = 0 === $comment_parent_id ? 'comment-item' : TDE_APP_PREFIX . '-qna-reply';

			$new_element = Preview::generateQnAElement( $thread, $new_element_name, $collection_data );

			wp_send_json_success(
				array(
					'html'                => $new_element,
					'inserted_comment_id' => $wpdb->insert_id,
				)
			);
		}

		wp_send_json_error( 'Invalid request' );
	}

	/**
	 * Get comment
	 *
	 * @param int $id comment id.
	 * @return object
	 * @since 1.0.0
	 */
	private function get_comment( $id ) {
		$comment = (object) (array) get_comment( $id );

		if ( $comment instanceof stdClass ) {
			$author_posts_page_link = $comment->comment_author_url;

			if ( ! $author_posts_page_link ) {
				$author_posts_page_link = \get_author_posts_url( $comment->user_id );
			}

			$comment->author_profile_picture = get_avatar_url( $comment->user_id );
			$comment->author_posts_page_link = $author_posts_page_link;
		}

		return $comment;
	}
}
