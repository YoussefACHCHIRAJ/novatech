<?php

/**
 * Preview script for html markup generator
 *
 * @package tutor-droip-elements
 */

namespace TutorLMSDroip\ElementGenerator;

use Tutor\Models\CourseModel;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class SocialLinkGenerator
 * This class is used to define all helper functions.
 */
trait SocialLinkGenerator {

	/**
	 * Generate social link markup
	 *
	 * @return string
	 */
	private function generate_social_link_markup() {
		$settings    = isset( $this->element['properties']['settings'] ) ? $this->element['properties']['settings'] : array();
		$social_type = isset( $settings['social_link_type'] ) ? $settings['social_link_type'] : 'facebook';
		$target      = isset( $settings['target'] ) && $settings['target'] ? '_blank' : '';
		$user_id     = isset( $this->options['user'] ) ? $this->options['user']['ID'] : false;
		$link        = $this->get_social_link( $social_type, $user_id, $this->options );
		return "<a $this->attributes href=$link target=$target>" . $this->generate_child_elements() . '</a>';
	}


	public function get_social_link( $social_type, $id, $options = array() ) {
		$user_id = $id;
		if ( isset( $options['user'] ) && isset( $options['user']['ID'] ) ) {
			$user_id = $options['user']['ID'];
		}
		$url = get_user_meta( $user_id, '_tutor_profile_' . $social_type, true );
		return $url ? $url : '#';
	}
}
