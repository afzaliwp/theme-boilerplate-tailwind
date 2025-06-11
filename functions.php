<?php
/**
 * Theme Name:       AfzaliWP Tailwind Theme
 * Author:           Mohammad Afzali
 * Author URI:       https://digitalmentorx.com
 */

namespace AfzaliWP\Theme;

use AfzaliWP\Theme\Includes\Cache_Handler;
use AfzaliWP\Theme\Includes\WP_Hooks;
use AfzaliWP\Theme\Includes\ShortCodes\Load as Load_ShortCodes;

defined( 'ABSPATH' ) || die();

final class Theme {

	private static $instances = [];

	protected function __construct() {
		spl_autoload_register( function ( $class_name ) {
			if ( ! str_contains( $class_name, 'AfzaliWP\Theme' ) ) {
				return;
			}

			$file = str_replace(
				        [
					        '_',
					        strtolower(
						        str_replace(
							        '_',
							        '-',
							        'AfzaliWP\Theme'
						        )
					        ),
					        '\\',
				        ],
				        [
					        '-',
					        __DIR__,
					        DIRECTORY_SEPARATOR,
				        ],
				        strtolower( $class_name ) ) . '.php';

			require_once $file;
		} );

		$this->define_constants();
		$this->other_functionalities();

		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles_and_scripts' ], 90 );
		add_action( 'after_setup_theme', [ $this, 'theme_setup' ] );
		add_action( 'init', [ $this, 'init_hook' ] );
		add_action( 'after_setup_theme', [ $this, 'register_menus' ] );
	}

	protected function __clone() {
	}

	public function __wakeup() {
		throw new \Exception( "Cannot unserialize a singleton." );
	}

	public static function get_instance() {
		$cls = Theme::class;

		if ( ! isset( self::$instances[ $cls ] ) ) {
			self::$instances[ $cls ] = new Theme();
		}

		return self::$instances[ $cls ];
	}

	public function theme_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'automatic-feed-links' );

//		add_image_size( '70x', 70, '', false ); // 70px width, auto height
	}

	public function register_menus() {
		register_nav_menus( [
			'primary'  => 'Primary',
			'footer-1' => 'Footer 1',
			'footer-2' => 'Footer 2',
		] );
	}

	public function register_styles_and_scripts() {
		wp_enqueue_style(
			'afzaliwp-theme-style',
			AFZ_THEME_ASSETS_URL . 'frontend.min.css',
			'',
			AFZ_THEME_ASSETS_VERSION
		);

		wp_enqueue_script(
			'afzaliwp-theme-script',
			AFZ_THEME_ASSETS_URL . 'frontend.min.js',
			[ 'jquery' ],
			AFZ_THEME_ASSETS_VERSION,
			''
		);

		wp_localize_script(
			'afzaliwp-theme-script',
			'AfzObj',
			[
				'homeUrl' => get_bloginfo( 'url' ),
				'ajaxUrl' => admin_url( 'admin-ajax.php' ),
				'nonce'   => wp_create_nonce( 'afzaliwp-theme-nonce' ),
			]
		);
	}

	public function define_constants() {
		define( 'AFZ_THEME_DIR', trailingslashit( get_template_directory() ) );
		define( 'AFZ_THEME_URL', trailingslashit( get_template_directory_uri() ) );
		define( 'AFZ_THEME_INC_DIR', trailingslashit( get_template_directory() ) . 'includes/' );
		define( 'AFZ_THEME_ASSETS_URL', trailingslashit( AFZ_THEME_URL . 'assets/dist' ) );
		define( 'AFZ_THEME_IMAGES', trailingslashit( AFZ_THEME_URL . 'assets/images' ) );

		if ( str_contains( get_bloginfo( 'wpurl' ), 'local' ) ) {
			define( 'AFZ_THEME_IS_LOCAL', true );
			define( 'AFZ_THEME_ASSETS_VERSION', time() );
		} else {
			define( 'AFZ_THEME_IS_LOCAL', false );
			define( 'AFZ_THEME_ASSETS_VERSION', '1.0.0' );
		}
	}

	public function init_hook() {
	}

	private function other_functionalities() {
		new WP_Hooks();
		new Load_ShortCodes();
		new Cache_Handler();
	}

}

Theme::get_instance();
