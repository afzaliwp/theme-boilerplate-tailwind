<?php

namespace AfzaliWP\Theme\Includes;

defined( 'ABSPATH' ) || die();

class Cache_Handler {
	public function __construct() {
		add_action( 'admin_bar_menu', [ $this, 'add_clear_cache_admin_bar_item' ], 999 );
		add_action( 'admin_init', [ $this, 'handle_clear_cache' ] );
		add_action( 'init', [ $this, 'handle_clear_cache' ] );
		add_action( 'admin_notices', [ $this, 'show_clear_cache_notice' ] );
	}

	public function handle_clear_cache() {
		if ( ! isset( $_GET[ 'afzaliwp_clear_cache' ] ) ) {
			return;
		}

		// Verify nonce and permissions
		if ( ! current_user_can( 'manage_options' ) ||
		     ! wp_verify_nonce( $_GET[ '_wpnonce' ], 'afzaliwp_clear_cache_nonce' ) ) {
			wp_die( 'Permission denied.' );
		}

		global $wpdb;

		// Delete regular transients and their timeouts
		$transients = $wpdb->get_col( $wpdb->prepare(
			"SELECT option_name FROM $wpdb->options 
            WHERE option_name LIKE %s 
            OR option_name LIKE %s",
			'_transient_afzaliwp%',
			'_transient_timeout_afzaliwp%'
		) );

		foreach ( $transients as $transient ) {
			// Extract transient name from either format
			$name = str_replace( [ '_transient_', '_transient_timeout_' ], '', $transient );
			delete_transient( $name );
		}

		// Delete network transients in multisite
		if ( is_multisite() ) {
			$network_transients = $wpdb->get_col( $wpdb->prepare(
				"SELECT meta_key FROM $wpdb->sitemeta 
                WHERE meta_key LIKE %s 
                OR meta_key LIKE %s",
				'_site_transient_afzaliwp%',
				'_site_transient_timeout_afzaliwp%'
			) );

			foreach ( $network_transients as $transient ) {
				$name = str_replace( [ '_site_transient_', '_site_transient_timeout_' ], '', $transient );
				delete_site_transient( $name );
			}
		}

		// Redirect with success parameter and clean URL
		wp_safe_redirect( add_query_arg(
			'afzaliwp_cache_cleared',
			'1',
			remove_query_arg( [ 'afzaliwp_clear_cache', '_wpnonce' ] )
		) );
		exit;
	}

	public function add_clear_cache_admin_bar_item( $admin_bar ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$admin_bar->add_node( [
			'id'    => 'mentorx-clear-cache',
			'title' => 'Clear Theme Cache',
			'href'  => add_query_arg( [
				'afzaliwp_clear_cache' => '1',
				'_wpnonce'             => wp_create_nonce( 'afzaliwp_clear_cache_nonce' )
			] )
		] );
	}

	public function show_clear_cache_notice() {
		if ( ! empty( $_GET[ 'afzaliwp_cache_cleared' ] ) && current_user_can( 'manage_options' ) ) {
			echo '<div class="notice notice-success is-dismissible"><p>'
			     . 'کش با موفقیت پاک شد.'
			     . '</p></div>';
		}
	}
}