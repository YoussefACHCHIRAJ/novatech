<?php
/**
 * Preview script for html markup generator
 *
 * @package tutor-droip-elements
 */

namespace TutorLMSDroip;

use TutorLMSDroip\ElementGenerator\ElementGenerator;
use TUTOR\Input;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Backend
 *
 * @package TutorLMSDroip
 */
class Backend {


	/**
	 * Backend constructor.
	 */
	public function __construct() {
		$this->run();
	}

	/**
	 * Run the backend
	 */
	public function run() {
		$action = Input::get( 'action' );
		if ( 'droip' === $action ) {
			$load_for = Input::get( 'load_for' );
			if ( 'droip-iframe' === $load_for ) {
				new Iframe();
			} else {
				new Editor();
			}
		}
		new ElementGenerator();
		new Pages();
		new Hooks();
	}
}
