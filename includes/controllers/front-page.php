<?php

namespace AfzaliWP\Theme\Includes\Controllers;

use AfzaliWP\Theme\Includes\Helper;

defined( 'ABSPATH' ) || die();

class Front_Page {
	public function __construct() {
	}

	public function get_hero_section() {
		$cache = Helper::get_transient( 'front_page_hero' );
		if ( false !== $cache ) {
			return $cache;
		}

		$data = [
			'image'                  => Helper::get_field( 'home_hero_image' ),
			'title'                  => Helper::get_field( 'home_hero_title' ),
			'description'            => Helper::get_field( 'home_hero_description' ),
			'primary_button_label'   => Helper::get_field( 'home_hero_primary_button_label' ),
			'primary_button_link'    => Helper::get_field( 'home_hero_primary_button_link' ),
			'secondary_button_label' => Helper::get_field( 'home_hero_secondary_button_label' ),
			'secondary_button_link'  => Helper::get_field( 'home_hero_secondary_button_link' ),
		];

		Helper::set_transient( 'front_page_hero', $data );

		return $data;
	}

}