<?php

/**
 * Preview script for html markup generator
 *
 * @package tutor-droip-elements
 */

namespace TutorLMSDroip\ElementGenerator;

use TUTOR\Course;
use Tutor\Models\CartModel;
use TUTOR_CERT\Certificate;
use TutorLMSDroip\Helper;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class ActionsGenerator
 * This class is used to define all helper functions.
 *
 * @package TutorLMSDroip\ElementGenerator
 */
trait ActionsGenerator {

	/**
	 * Generate actionbox markup
	 *
	 * @return string
	 */
	private function generate_action_markup() {
		$course_id              = isset( $this->options['post'] ) ? $this->options['post']->ID : get_the_ID();
		$ele_name               = $this->element['name'];
		$entry_box_button_logic = tutor_entry_box_buttons( $course_id );
		$type                   = isset( $this->properties['type'] ) ? $this->properties['type'] : 'enroll_btn';
		$extra_attributes       = "data-course_id='$course_id' data-action_type='$type'";

		switch ( $type ) {
			case 'wishlist_btn':{
				if ( ! is_user_logged_in() ) {
					return '';
				}
					$is_wish_listed = tutor_utils()->is_wishlisted( $course_id, get_current_user_id() );
				if ( $is_wish_listed ) {
					return '';
				}

				return $this->generate_child_element_with_parent_droip_data( $extra_attributes );
			}
			case 'wishlisted_btn':{
				if ( ! is_user_logged_in() ) {
					return '';
				}
					$is_wish_listed = tutor_utils()->is_wishlisted( $course_id, get_current_user_id() );
				if ( ! $is_wish_listed ) {
					return '';
				}

				return $this->generate_child_element_with_parent_droip_data( $extra_attributes );
			}
		}

		if ( ! isset( $entry_box_button_logic->{'show_' . $type} ) || ( isset( $entry_box_button_logic->{'show_' . $type} ) && $entry_box_button_logic->{'show_' . $type} !== true ) ) {
			return '';
		}
		switch ( $type ) {
			case 'enroll_btn':{
				if ( ! $entry_box_button_logic->show_enroll_btn ) {
					return '';
				}
				return $this->generate_child_element_with_parent_droip_data( $extra_attributes );
			}
			case 'add_to_cart_btn':{
					$is_course_in_user_cart = CartModel::is_course_in_user_cart( get_current_user_id(), $course_id );
				if ( $is_course_in_user_cart ) {
					return '';
				}
				if(!Helper::is_course_for_single_purchaseble($course_id)){
					return "";
				}
				return $this->generate_child_element_with_parent_droip_data( $extra_attributes );
			}
			case 'view_cart_btn':{
					$is_course_in_user_cart = CartModel::is_course_in_user_cart( get_current_user_id(), $course_id );
				if ( ! $is_course_in_user_cart ) {
					return '';
				}
					$extra_attributes .= " data-cart_url='" . tutor_get_cart_url() . "'";
				return $this->generate_child_element_with_parent_droip_data( $extra_attributes );
			}
			case 'start_learning_btn':{
				if ( ! $entry_box_button_logic->show_start_learning_btn ) {
					return '';
				}
					$is_course_completed = tutor_utils()->is_completed_course( $course_id, get_current_user_id() );
				if ( $is_course_completed ) {
					return '';
				}
					$lession_url       = tutor_utils()->get_course_first_lesson( $course_id );
					$extra_attributes .= " data-lession_url=$lession_url";
				return $this->generate_child_element_with_parent_droip_data( $extra_attributes );
			}
			case 'continue_learning_btn':{
				if ( ! $entry_box_button_logic->show_continue_learning_btn ) {
					return '';
				}
					$is_course_completed = tutor_utils()->is_completed_course( $course_id, get_current_user_id() );
				if ( $is_course_completed ) {
					return '';
				}
					$extra_attributes .= " data-continue_learning_url='" . tutor_utils()->get_course_first_lesson() . "'";
				return $this->generate_child_element_with_parent_droip_data( $extra_attributes );
			}
			case 'complete_course_btn':{
				if ( ! $entry_box_button_logic->show_complete_course_btn ) {
					return '';
				}
					$is_course_completed = tutor_utils()->is_completed_course( $course_id, get_current_user_id() );
				if ( $is_course_completed ) {
					return '';
				}
				return $this->generate_child_element_with_parent_droip_data( $extra_attributes );
			}
			case 'retake_course_btn':{
				if ( $entry_box_button_logic->show_retake_course_btn || ( $entry_box_button_logic->show_certificate_view_btn && function_exists( 'TUTOR_CERT' ) ) ) {
					$extra_attributes .= " data-continue_learning_url='" . tutor_utils()->get_course_first_lesson() . "'";
					return $this->generate_child_element_with_parent_droip_data( $extra_attributes );
				} else {
					return '';
				}
			}
			case 'certificate_view_btn':{
				if ( ! function_exists( 'TUTOR_CERT' ) ) {
					return '';
				}
				if ( ! $entry_box_button_logic->show_certificate_view_btn ) {
					return '';
				}
					$is_course_completed = tutor_utils()->is_completed_course( $course_id, get_current_user_id() );

				if ( ! $is_course_completed ) {
					return '';
				}
				if ( ! $course_id ) {
					return '';
				}

					$certificate_url = '';
				if ( tutils()->is_addon_enabled( TUTOR_CERT()->basename ) ) {
					$certificate_url = ( new Certificate( true ) )->get_certificate( $course_id );

					$extra_attributes .= " data-certificate_url='" . $certificate_url . "'";
					return $this->generate_child_element_with_parent_droip_data( $extra_attributes );
				}

				return '';

			}
			default:{
					return '';
			}

		}
		return '';
	}

	private function generate_child_element_with_parent_droip_data( $extra_attributes ) {
		$children_html = $this->generate_child_elements();
		// echo "<pre>";var_dump($this->element['parentId'], $this->elements[$this->element['parentId'] ]);die;
		if ( isset( $this->elements[ $this->element['parentId'] ] ) ) {
			$encoded_data   = $this->get_all_data_and_styles_from_element_id( $this->element['parentId'] );
			$encoded_data   = json_encode( $encoded_data );
			$children_html .= "<textarea style='display: none'>$encoded_data</textarea>";
		}
		return $this->generate_common_element( false, $children_html, $extra_attributes );
	}
}
