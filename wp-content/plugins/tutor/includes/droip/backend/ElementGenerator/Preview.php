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
 * Class Preview
 * This class is used to define all preview functions.
 */
class Preview {

	use CourseMetaGenerator;
	use AddRatingGenerator;
	use MaterialGenerator;
	use ActionsGenerator;
	use PriceGenerator;
	use SocialLinkGenerator;
	use ThumbnailGenerator;

	/**
	 * Droip element object
	 *
	 * @var array $element | element data.
	 */
	private $element = array();
	/**
	 * Droip all elements object
	 *
	 * @var array $elements | array of elements.
	 */
	private $elements = array();
	/**
	 * Droip all style blocks object
	 *
	 * @var array $style_blocks | array of style blocks.
	 */
	private $style_blocks = array();
	/**
	 * Droip all style blocks object
	 *
	 * @var array $style_blocks | array of style blocks.
	 */
	private $attributes = array();
	/**
	 * Droip all options object
	 *
	 * @var array $options | array of options.
	 */
	private $options = array();
	/**
	 * Droip generate child element function
	 *
	 * @var callable $generate_child_element | function.
	 */
	private $generate_child_element = null; // function.
	private $generate_element       = null; // function.
	/**
	 * Droip generate child element with new id function
	 *
	 * @var callable $generate_child_element_with_new_id | function.
	 */
	private $generate_child_element_with_new_id = null; // function.
	private $get_data_and_styles_from_root      = null; // function.
	/**
	 * Droip element properties
	 *
	 * @var array $properties | array of element properties.
	 */
	private $properties = array();
	/**
	 * LMS course id
	 *
	 * @var int $course_id | course id.
	 */
	private $course_id = null;

	/**
	 * Class constructor
	 *
	 * @param array $props array of element properties.
	 *
	 * @since 1.0.0
	 */
	public function __construct( $props ) {
		$this->element                            = $props['element'];
		$this->elements                           = $props['elements'];
		$this->style_blocks                       = $props['style_blocks'];
		$this->attributes                         = $props['attributes'];
		$this->options                            = $props['options'];
		$this->generate_child_element             = $props['generate_child_element'];
		$this->generate_element                   = $props['generate_element'];
		$this->generate_child_element_with_new_id = $props['generate_child_element_with_new_id'];
		$this->get_data_and_styles_from_root      = $props['get_data_and_styles_from_root'];
		$this->properties                         = $this->element['properties'];
	}


	/**
	 * Generate elements
	 *
	 * $element: the element
	 * $attributes: elements html attributes
	 * $options: options is needed if any dynamic content need to be render
	 * $generate_child_element: this is a helper method for printing nested element or child elements. This method take 2 arg: 1. elemenbt id 2. $options.
	 *
	 * @return string html markup;
	 */
	public function generate_elements() {
		switch ( $this->element['name'] ) {
			case TDE_APP_PREFIX . '-course-meta':
				return $this->generate_course_meta_markup();
			case TDE_APP_PREFIX . '-add-rating':
			case TDE_APP_PREFIX . '-active-stars':
			case TDE_APP_PREFIX . '-inactive-stars':
				return $this->generate_add_rating_element();
			case TDE_APP_PREFIX . '-material':
				return $this->generate_material_markup();
			case TDE_APP_PREFIX . '-action':
				return $this->generate_action_markup();
			case TDE_APP_PREFIX . '-price':
				return $this->generate_price_markup();
			case TDE_APP_PREFIX . '-price-value':
				return $this->generate_price_value_markup();
			case TDE_APP_PREFIX . '-social-profile-link':
				return $this->generate_social_link_markup();
			case TDE_APP_PREFIX . '-course-thumbnail':
				return $this->generate_course_thumbnail_markup();

			default:
				return $this->generate_common_element();
		}
	}

	/**
	 * Generate common element.
	 *
	 * @param bool $hide | false | true. | Hide element.
	 * @param bool $children_html | false | true. | Hide children.
	 * @return string
	 */
	private function generate_common_element( $hide = false, $children_html = false, $extra_attributes = '' ) {
		$tag  = isset( $this->properties['tag'] ) ? $this->properties['tag'] : 'div';
		$name = $this->element['name'];
		if ( $hide ) {
			$extra_attributes .= " data-element_hide='true'";
		}
		// $extra_attributes .= " data-ele_name='$name'";

		$html = '';
		if ( ! $children_html ) {
			$children_html = $this->generate_child_elements();
		}
		$html = "<$tag $this->attributes $extra_attributes>$children_html</$tag>";
		return $html;
	}

	/**
	 * Generate child elements.
	 *
	 * @return string
	 */
	private function generate_child_elements() {
		$html        = '';
		$child_count = isset( $this->element['children'] ) ? count( $this->element['children'] ) : 0;
		for ( $i = 0; $i < $child_count; $i++ ) {
			$html .= call_user_func( $this->generate_child_element, $this->element['children'][ $i ], $this->options );
		}
		return $html;
	}

	/**
	 * Generate child element by name.
	 *
	 * @return array $element | Element array.
	 */
	private function group_elements_by_element_name() {
		return array_reduce(
			$this->element['children'],
			function ( $carry, $item ) {
				if ( isset( $this->elements[ $item ], $this->elements[ $item ]['name'] ) ) {
					$carry[ $this->elements[ $item ]['name'] ] = $this->elements[ $item ];
				}

				return $carry;
			},
			array()
		);
	}

	private function get_all_data_and_styles_from_element_id( $element_id ) {
		$data_n_styles = array(
			'blocks' => array(),
			'styles' => array(),
			'root'   => $element_id,
		);

		call_user_func_array( $this->get_data_and_styles_from_root, array( $element_id, &$data_n_styles, &$this->elements, &$this->style_blocks ) );
		return $data_n_styles;
	}
}
