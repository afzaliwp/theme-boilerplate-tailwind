<?php

namespace AfzaliWP\Theme\Includes\ShortCodes;

defined( 'ABSPATH' ) || die();

class Load {
	public function __construct() {
		$this->load_shortcodes();
	}

	private function get_shortcodes() {
		return [

		];
	}

	private function load_shortcodes() {
		$Shortcodes = $this->get_shortcodes();

		foreach ( $Shortcodes as $Shortcode ) {
			new $Shortcode;
		}
	}
}