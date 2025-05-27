<?php

namespace AfzaliWP\Theme\Includes;

defined( 'ABSPATH' ) || die();

class WP_Hooks {
	public function __construct() {
		add_filter( 'upload_mimes', [ $this, 'allow_admin_svg_upload' ] );
		add_filter( 'wp_check_filetype_and_ext', [ $this, 'fix_svg_mime_type' ], 10, 4 );
		add_filter( 'wp_handle_upload_prefilter', [ $this, 'sanitize_svg' ] );
		add_action( 'pre_get_posts', [ $this, 'handle_blog_filters' ] );
	}

	public function allow_admin_svg_upload( $mimes ) {
		if ( current_user_can( 'manage_options' ) ) {
			$mimes[ 'svg' ]  = 'image/svg+xml';
			$mimes[ 'svgz' ] = 'image/svg+xml';
		}

		return $mimes;
	}

	public function fix_svg_mime_type( $data, $file, $filename, $mimes ) {
		$filetype = wp_check_filetype( $filename, $mimes );

		return [
			'ext'             => $filetype[ 'ext' ],
			'type'            => $filetype[ 'type' ],
			'proper_filename' => $data[ 'proper_filename' ]
		];
	}

	public function sanitize_svg( $file ) {
		if ( 'image/svg+xml' === $file[ 'type' ] ) {
			$svg_content = file_get_contents( $file[ 'tmp_name' ] );

			$svg_content = preg_replace( '/<script\b[^>]*>(.*?)<\/script>/is', '', $svg_content );
			file_put_contents( $file[ 'tmp_name' ], $svg_content );
		}

		return $file;
	}

	function handle_blog_filters( $query ) {
		if ( $query->is_home() && $query->is_main_query() ) {
			if ( isset( $_GET[ 'search_posts' ] ) ) {
				$query->set( 's', sanitize_text_field( $_GET[ 'search_posts' ] ) );
			}

			if ( isset( $_GET[ 'post_tag' ] ) ) {
				$tags = array_map( 'sanitize_title', explode( ',', $_GET[ 'post_tag' ] ) );
				$query->set( 'tag', implode( ',', $tags ) );
			}

			$order = ( isset( $_GET[ 'sort_date' ] ) && $_GET[ 'sort_date' ] === 'oldest' ) ? 'ASC' : 'DESC';
			$query->set( 'orderby', 'date' );
			$query->set( 'order', $order );
		}
	}
}