<?php

namespace AfzaliWP\Theme\Includes;

defined( 'ABSPATH' ) || die();

class WP_Hooks {
	public function __construct() {
		add_filter( 'upload_mimes', [ $this, 'allow_admin_svg_upload' ] );
		add_filter( 'wp_check_filetype_and_ext', [ $this, 'fix_svg_mime_type' ], 10, 4 );
		add_filter( 'wp_handle_upload_prefilter', [ $this, 'sanitize_svg' ] );
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
}