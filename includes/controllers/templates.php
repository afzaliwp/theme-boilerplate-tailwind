<?php

namespace AfzaliWP\Theme\Includes\Controllers;

use AfzaliWP\Theme\Includes\Helper;

defined( 'ABSPATH' ) || die();

class Templates {
	public function __construct() {
	}

	public function get_experience_template_data() {
		$cache = Helper::get_transient( 'experience_template_data' );
		if ( false !== $cache ) {
			return $cache;
		}

		$form             = Helper::get_field( 'form' );
		$form_top_heading = Helper::get_field( 'form_top_heading' );
		$form_title       = Helper::get_field( 'form_title' );
		$form_description = Helper::get_field( 'form_description' );
		$data             = [
			'hero_action_button_label'     => Helper::get_field( 'hero_action_button_label' ),
			'hero_action_button_link'      => Helper::get_field( 'hero_action_button_link' ),
			'edu_top_heading'              => Helper::get_field( 'edu_top_heading' ),
			'edu_title'                    => Helper::get_field( 'edu_title' ),
			'edu_description'              => Helper::get_field( 'edu_description' ),
			'edu_tabs'                     => Helper::get_field( 'edu_tabs' ),
			'timeline_top_heading'         => Helper::get_field( 'timeline_top_heading' ),
			'timeline_title'               => Helper::get_field( 'timeline_title' ),
			'timeline_description'         => Helper::get_field( 'timeline_description' ),
			'timeline_action_button_label' => Helper::get_field( 'timeline_action_button_label' ),
			'timeline_action_button_link'  => Helper::get_field( 'timeline_action_button_link' ),
			'timeline'                     => Helper::get_field( 'timeline' ),
			'mcb_top_heading'              => Helper::get_field( 'mcb_top_heading' ),
			'mcb_title'                    => Helper::get_field( 'mcb_title' ),
			'mcb_description'              => Helper::get_field( 'mcb_description' ),
			'mcb_image'                    => Helper::get_field( 'mcb_image' ),
			'form_top_heading'             => $form_top_heading ?: Helper::get_option( 'form_top_heading' ),
			'form_title'                   => $form_title ?: Helper::get_option( 'form_title' ),
			'form_description'             => $form_description ?: Helper::get_option( 'form_description' ),
			'form'                         => $form ?: Helper::get_option( 'form' ),
			'email_1'                      => Helper::get_option( 'email_1' ),
			'email_2'                      => Helper::get_option( 'email_2' ),
			'phone_1'                      => Helper::get_option( 'phone_1' ),
			'phone_2'                      => Helper::get_option( 'phone_2' ),
			'address_line'                 => Helper::get_option( 'address_line' ),
			'maps_link'                    => Helper::get_option( 'maps_link' ),
		];

		Helper::set_transient( 'experience_template_data', $data );

		return $data;
	}

	public function get_contact_template_data() {
		$cache = Helper::get_transient( 'contact_template_data' );
		if ( false !== $cache ) {
			return $cache;
		}

		$form             = Helper::get_field( 'form' );
		$form_top_heading = Helper::get_field( 'form_top_heading' );
		$form_title       = Helper::get_field( 'form_title' );
		$form_description = Helper::get_field( 'form_description' );
		$data             = [
			'form_top_heading' => $form_top_heading ?: Helper::get_option( 'form_top_heading' ),
			'form_title'       => $form_title ?: Helper::get_option( 'form_title' ),
			'form_description' => $form_description ?: Helper::get_option( 'form_description' ),
			'form'             => $form ?: Helper::get_option( 'form' ),
			'email_1'          => Helper::get_option( 'email_1' ),
			'email_2'          => Helper::get_option( 'email_2' ),
			'phone_1'          => Helper::get_option( 'phone_1' ),
			'phone_2'          => Helper::get_option( 'phone_2' ),
			'address_line'     => Helper::get_option( 'address_line' ),
			'maps_link'        => Helper::get_option( 'maps_link' ),
		];

		Helper::set_transient( 'contact_template_data', $data );

		return $data;
	}

	public function get_research_data() {
		$post_id = get_the_ID();
		$cache   = Helper::get_transient( 'research_' . $post_id . '_data' );
		if ( false !== $cache ) {
			return $cache;
		}

		$data = [
			'top_heading'      => Helper::get_field( 'top_heading', $post_id ),
			'title'            => Helper::get_field( 'title', $post_id ),
			'description'      => Helper::get_field( 'description', $post_id ),
			'image_blocks'     => Helper::get_field( 'image_blocks', $post_id ),
			'grants_title'     => Helper::get_field( 'grants_title', $post_id ),
			'grants'           => Helper::get_field( 'grants', $post_id ),
			'form'             => Helper::get_option( 'form' ),
			'form_top_heading' => Helper::get_option( 'form_top_heading' ),
			'form_title'       => Helper::get_option( 'form_title' ),
			'form_description' => Helper::get_option( 'form_description' ),
			'email_1'          => Helper::get_option( 'email_1' ),
			'email_2'          => Helper::get_option( 'email_2' ),
			'phone_1'          => Helper::get_option( 'phone_1' ),
			'phone_2'          => Helper::get_option( 'phone_2' ),
			'address_line'     => Helper::get_option( 'address_line' ),
			'maps_link'        => Helper::get_option( 'maps_link' ),
		];

		Helper::set_transient( 'research_' . $post_id . '_data', $data );

		return $data;
	}

	public function get_post_and_portfolio_data() {
		$post_id = get_the_ID();
		$cache   = Helper::get_transient( 'post_and_portfolio_' . $post_id . '_data' );
		if ( false !== $cache ) {
			return $cache;
		}

		$data = [
			'highlight_title' => Helper::get_field( 'highlight_title', $post_id ),
			'highlights'      => Helper::get_field( 'highlights', $post_id ),
		];

		Helper::set_transient( 'post_and_portfolio_' . $post_id . '_data', $data );

		return $data;
	}
}