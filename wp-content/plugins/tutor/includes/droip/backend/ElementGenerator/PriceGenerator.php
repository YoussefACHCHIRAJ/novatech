<?php

/**
 * Preview script for html markup generator
 *
 * @package tutor-droip-elements
 */

namespace TutorLMSDroip\ElementGenerator;

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
trait PriceGenerator {

	/**
	 * Generate actionbox markup
	 *
	 * @return string
	 */
	private function generate_price_markup() {
		$course_id = isset( $this->options['post'] ) ? $this->options['post']->ID : get_the_ID();
		$type      = isset( $this->properties['type'] ) ? $this->properties['type'] : 'free';
		if ( ! $course_id ) {
			return '';
		}

		// echo $type . " - " . $this->isPaidCourse($course_id);
		switch ( $type ) {
			case 'free':{
				if ( ! $this->isPaidCourse( $course_id ) ) {
					return $this->generate_common_element();
				}
				break;
			}
			case 'paid':{
				if ( $this->isPaidCourse( $course_id ) && Helper::is_course_for_single_purchaseble($course_id) ) {
					return $this->generate_common_element();
				}
				break;
			}
			default: {
				return '';
			}
		}
		return '';
	}
	private function generate_price_value_markup() {
		$course_id = isset( $this->options['post'] ) ? $this->options['post']->ID : get_the_ID();
		$type      = isset( $this->properties['type'] ) ? $this->properties['type'] : 'sale';
		if ( ! $course_id || ! $this->isPaidCourse( $course_id ) ) {
			return '';
		}

		$sale_price   = self::get_course_meta( 'sale_price', $course_id, $this->options );
		$course_price = self::get_course_meta( 'course_price', $course_id, $this->options );

		switch ( $type ) {
			case 'sale':{
				if ( $sale_price ) {
					return $this->generate_common_element( false, $sale_price );
				} else {
					return $this->generate_common_element( false, $course_price );
				}
				break;
			}
			case 'regular':{
				if ( $sale_price ) {
					return $this->generate_common_element( false, $course_price );
				}
				break;
			}
			default: {
				return '';
			}
		}
		return '';
	}

	private function isPaidCourse( $course_id ) {
		$is_paid_course = tutor_utils()->is_course_purchasable( $course_id );
		return $is_paid_course;
	}
}
