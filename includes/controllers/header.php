<?php

namespace AfzaliWP\Theme\Includes\Controllers;

use AfzaliWP\Theme\Includes\Helper;

defined( 'ABSPATH' ) || die();

class Header {
	public function __construct() {
	}

	public function get_action_button() {
		$cache = Helper::get_transient( 'header_action_button');
		if ( false !== $cache ) {
			return $cache;
		}
		$data = [
			'label' => Helper::get_option( 'action_button_label' ),
			'link' => Helper::get_option( 'action_button_link' ),
		];

		Helper::set_transient( 'header_action_button', $data);

		return $data;
	}
}