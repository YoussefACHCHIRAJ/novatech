<?php
/**
 * Lesson view generator
 *
 * @package tutor-droip-elements
 */

namespace TutorLMSDroip\ElementGenerator;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class MaterialGenerator
 * This class is used to define all material generator functions.
 */
trait MaterialGenerator {

	/**
	 * Generate material markup
	 *
	 * @return string
	 */
	private function generate_material_markup() {

		if ( isset( $this->options['post'] ) ) {
			// $element_block = $this->group_elements_by_element_name();
			$settings = isset( $this->properties['settings'] ) ? $this->properties['settings'] : array();
			if ( $this->options['post']->post_type === $settings['type'] ) {
				return $this->generate_common_element();
			}
		}
		return '';
	}

}
