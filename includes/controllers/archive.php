<?php

namespace AfzaliWP\Theme\Includes\Controllers;

use AfzaliWP\Theme\Includes\Helper;

defined( 'ABSPATH' ) || die();

class Archive {
	public function __construct() {
	}

	public function get_portfolio_data_section() {
		$cache = Helper::get_transient( 'portfolio_data_section' );
		if ( false !== $cache ) {
			return $cache;
		}

		$page = get_page_by_path( 'portfolio' );
		if ( ! empty( $page ) ) {
			$page_id = $page->ID;
		} else {
			$page_id = null;
		}

		$data = [
			'hero_title'                 => Helper::get_field( 'hero_title', $page_id ),
			'hero_description'           => Helper::get_field( 'hero_description', $page_id ),
			'hero_action_button_label'   => Helper::get_field( 'hero_action_button_label', $page_id ),
			'hero_action_button_link'    => Helper::get_field( 'hero_action_button_link', $page_id ),
			'posts_section_top_heading'  => Helper::get_field( 'posts_section_top_heading', $page_id ),
			'posts_section_heading'      => Helper::get_field( 'posts_section_heading', $page_id ),
			'posts_section_description'  => Helper::get_field( 'posts_section_description', $page_id ),
			'show_banner'                => Helper::get_field( 'show_banner', $page_id ),
			'banner_title'               => Helper::get_field( 'banner_title', $page_id ),
			'banner_description'         => Helper::get_field( 'banner_description', $page_id ),
			'banner_action_button_label' => Helper::get_field( 'banner_action_button_label', $page_id ),
			'banner_action_button_link'  => Helper::get_field( 'banner_action_button_link', $page_id ),
			'banner_background_image'    => Helper::get_field( 'banner_background_image', $page_id ),
		];

		Helper::set_transient( 'portfolio_data_section', $data );

		return $data;
	}
}