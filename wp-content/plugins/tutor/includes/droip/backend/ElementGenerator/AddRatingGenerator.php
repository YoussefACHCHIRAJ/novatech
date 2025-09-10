<?php
/**
 * Preview script for html markup generator
 *
 * @package tutor-droip-elements
 */

namespace TutorLMSDroip\ElementGenerator;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Rating genrator
 *
 * @package TutorLMSDroip\ElementGenerator
 */
trait AddRatingGenerator {

	/**
	 * Generate Rating elements
	 *
	 * @return string
	 */
	private function generate_add_rating_element() {
		$ele_name = $this->element['name'];
		$rating   = isset( $this->options['rating'] ) ? $this->options['rating'] : 0;
		switch ( $ele_name ) {
			case TDE_APP_PREFIX . '-add-rating':
				$children_html  = $this->generate_child_elements();
				$children_html .= '<input type="hidden" name="rating" value="' . $rating . '">';
				$html           = $this->generate_common_element( false, $children_html );
				return $html;
			case TDE_APP_PREFIX . '-active-stars':
				$children_html = '';
				for ( $i = 0; $i < $rating; $i++ ) {
					$children_html .= $this->generate_common_element( false, false, 'data-star_index="' . $i . '"' );
				}
				for ( $i = 0; $i < 5 - $rating; $i++ ) {
					$children_html .= $this->generate_common_element( true );
				}
				return $children_html;
			case TDE_APP_PREFIX . '-inactive-stars':
				$children_html = '';
				for ( $i = 0; $i < 5 - $rating; $i++ ) {
					$children_html .= $this->generate_common_element( false, false, 'data-star_index="' . ( $rating + $i ) . '"' );
				}
				for ( $i = 0; $i < $rating; $i++ ) {
					$children_html .= $this->generate_common_element( true );
				}
				return $children_html;
		}
	}
}
