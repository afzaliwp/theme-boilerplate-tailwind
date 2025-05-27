<?php

namespace AfzaliWP\Theme\Includes\Controllers;

use AfzaliWP\Theme\Includes\Helper;

defined( 'ABSPATH' ) || die();

class Header {
	public function __construct() {
	}

	public function get_action_button() {
		return [
			'link' => Helper::get_option( 'store_link' )
		];
	}
}