<?php

namespace AfzaliWP\Theme\Includes;

use WP_Query;

defined( 'ABSPATH' ) || die();

class Helper {

	public static function get_logo( $size = 'thumbnail' ) {
		$link = self::get_option( 'site_logo' )[ 'sizes' ][ $size ];

		return '<div class="site-logo w-fit-content d-flex align-items-center justify-content-center rounded-circle"><a href="'.home_url().'"><img src="' . $link . '" alt="خوارزمی"></a></div>';
	}

	public static function get_the_thumbnail( $post_id, $size = 'post-thumbnail', $attr = [] ) {
		$attr[ 'class' ] = 'wp-post-image card-img-top img-thumbnail';
		$thumbnail       = get_the_post_thumbnail( $post_id, $size, $attr );

		if ( ! empty( $thumbnail ) ) {
			return $thumbnail;
		}

		$placeholder_image_url = FUTURE_THEME_IMAGES . 'placeholder-image.webp';

		return sprintf(
			'<img src="%s" class="placeholder-img card-img-top img-thumbnail" alt="placeholder image" decoding="async">',
			$placeholder_image_url
		);
	}

	public static function get_the_post_category( $post_id = null ) {
		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}

		$categories = get_the_category( $post_id );

		return $categories[ 0 ]->name;

	}

	public static function get_the_estimated_reading_time( $post_id = null, $wpm = 180, $pattern = '%1$s %2$s', $post_content = null ) {
		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}

		// Check if the reading time is already calculated and saved in post meta
		$reading_time = get_post_meta( $post_id, 'reading_time', true );
		if ( $reading_time ) {
			return sprintf( $pattern, $reading_time, 'دقیقه' );
		}
		$content = $post_content ?: get_post_field( 'post_content', $post_id );
		$content = strip_shortcodes( $content );
		$content = wp_strip_all_tags( $content );

		$images = substr_count( strtolower( $content ), '<img ' );
		$words  = count( preg_split( '/\s+/', $content ) );

		if ( $images > 0 ) {
			$imgtime = 0;
			for ( $i = 1; $i <= $images; $i ++ ) {
				if ( $i >= 10 ) {
					$imgtime += 3 * intval( $wpm / 60 );
				} else {
					$imgtime += ( 12 - ( $i - 1 ) ) * intval( $wpm / 60 );
				}
			}
			$words += $imgtime;
		}

		if ( 0 === $words ) {
			return 0;
		}

		$m = ceil( $words / $wpm );

		// Save the calculated reading time to post meta
		update_post_meta( $post_id, 'reading_time', $m );

		$pattern = $pattern ?: '%1$s %2$s';

		return sprintf( $pattern, $m, 'دقیقه' );
	}

	public static function get_pagination() {
		global $wp_query;
		$current_page = max( 1, get_query_var( 'paged' ) );
		$total_pages  = $wp_query->max_num_pages;

		if ( 1 === intval( $total_pages ) || 0 === $total_pages ) {
			return;
		}

		echo '<nav aria-label="Page navigation">';
		echo '<ul class="pagination">';

		if ( $current_page > 1 ) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $current_page - 1 ) . '"><i class="plz-icon arrow-right"></i></a></li>';
		} else {
			echo '<li class="page-item disabled"><span class="page-link"><i class="plz-icon arrow-right"></i></span></li>';
		}

		for ( $i = 1; $i <= $total_pages; $i ++ ) {
			if ( $i == $current_page ) {
				echo '<li class="page-item active" aria-current="page"><span class="page-link">' . $i . '</span></li>';
			} else {
				echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $i ) . '">' . $i . '</a></li>';
			}
		}

		if ( $current_page < $total_pages ) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $current_page + 1 ) . '"><i class="plz-icon arrow-left"></i></a></li>';
		} else {
			echo '<li class="page-item disabled"><span class="page-link"><i class="plz-icon arrow-left"></i></span></li>';
		}

		echo '</ul>';
		echo '</nav>';
	}

	public static function get_assets_images_url( $name ) {
		return FUTURE_THEME_IMAGES . $name;
	}

	public static function get_page_full_url( $ignore_query_arg = false ) {
		global $wp;

		$url = home_url( $wp->request );

		if ( $ignore_query_arg ) {
			return $url;
		}

		if ( isset( $_GET ) && count( $_GET ) > 0 ) {
			$url = add_query_arg( $_GET, $url );
		}

		return $url;
	}

	public static function get_current_url_without_query_args() {
		global $wp;
		$current_url = home_url( add_query_arg( [], $wp->request ) );

		return strtok( $current_url, '?' );
	}

	public static function sanitize_irphone( $number = '' ) {
		if ( ! $number ) {
			return false;
		}
		$number = self::sanitize_enNumber( trim( $number ) );
		$number = '0' . preg_replace( '/^(?:98|\+98|0098|0)?9/i', '9', $number );

		return preg_match( "/^09[0-9]{9}$/", $number ) ? sanitize_text_field( $number ) : false;
	}

	public static function en_to_fa_numbers( $text = '' ) {
		if ( ! $text ) {
			return false;
		}
		$en_numbers   = range( 0, 9 );
		$fa_numbers = [ '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' ];

		return str_replace( $en_numbers, $fa_numbers, $text );
	}

	public static function get_field( $selector, $post_id = false, $format_value = true ) {
		if ( function_exists( 'get_field' ) ) {
			return get_field( $selector, $post_id, $format_value );
		}

		return false;
	}

	public static function get_option( $selector, $post_id = 'option', $format_value = true ) {
		if ( function_exists( 'get_field' ) ) {
			return get_field( $selector, $post_id, $format_value );
		}

		return false;
	}

	public static function get_category_field( $selector, $post_id = false, $format_value = true ) {
		if ( function_exists( 'get_field' ) ) {
			return get_field( $selector, 'category_' . $post_id, $format_value );
		}

		return false;
	}

	public static function get_term_link_by_slug( $term_slug, $taxonomy = 'product_cat' ) {
		// Get the term by slug
		$term = get_term_by( 'slug', $term_slug, $taxonomy );

		// Check if the term exists
		if ( ! $term || is_wp_error( $term ) ) {
			return 'Term does not exist';
		}

		// Get the term link
		$term_link = get_term_link( $term, $taxonomy );

		// Check if there was an error
		if ( is_wp_error( $term_link ) ) {
			return 'Error retrieving term link';
		}

		// Return the term link
		return $term_link;
	}

	public static function get_full_url( $path = '/', $args = [] ) {
		return add_query_arg( $args, trailingslashit( get_home_url() . $path ) );
	}

	public static function get_parent_category( $queried_object_id = 0 ) {
		$category_id = $queried_object_id;

		if ( 0 === $queried_object_id ) {
			$category_id = get_queried_object_id();
		}

		$ancestors          = get_ancestors( $category_id, 'product_cat' );
		$ultimate_parent_id = end( $ancestors );

		return get_term( $ultimate_parent_id, 'product_cat' );
	}

	/**
	 * @param $selector
	 * @param string $meta_type : can be term and post (gets data from termmeta or postmeta tables).
	 * @param $post_id : the post id or the term object.
	 * @param $subfield_selectors : an array of the subfields selectors to retrieve.
	 *
	 * @return array
	 */
	public static function get_repeater_field( $selector, $post_id, $subfield_selectors, $meta_type = 'term' ) {
		$count = self::get_field( $selector, $post_id );
		$data  = [];
		if ( ! $count ) {
			return [];
		}

		for ( $i = 0; $i < $count; $i ++ ) {
			foreach ( $subfield_selectors as $subfield_selector ) {
				if ( 'term' === $meta_type ) {
					if ( is_object( $post_id ) ) {
						$post_id = $post_id->term_id;
					}
					$sub_field_value = get_term_meta( $post_id, $selector . '_' . $i . '_' . $subfield_selector, true );
				} else {
					$sub_field_value = get_post_meta( $post_id, $selector . '_' . $i . '_' . $subfield_selector, true );
				}

				$data[ $i ][ $subfield_selector ] = $sub_field_value;
			}
		}

		return $data;
	}

	public static function get_posts_with_selection(
		$transient_key,
		$acf_field,
		$post_type = 'post',
		$posts_per_page = 3,
		$tax_query = []
	) {

		$cached_ids = get_transient( $transient_key );

		if ( false !== $cached_ids ) {
			return $cached_ids;
		}

		$selected_ids = Helper::get_field( $acf_field ) ?: [];
		$selected_ids = array_map( 'intval', $selected_ids );
		$selected_ids = array_unique( $selected_ids );

		$valid_selected_ids = [];
		foreach ( $selected_ids as $post_id ) {
			if ( get_post_status( $post_id ) === 'publish' && get_post_type( $post_id ) === $post_type ) {
				$valid_selected_ids[] = $post_id;
			}
		}

		$needed     = max( 0, $posts_per_page - count( $valid_selected_ids ) );
		$latest_ids = [];

		if ( $needed > 0 ) {
			$query_args = [
				'post_type'           => $post_type,
				'posts_per_page'      => $needed,
				'fields'              => 'ids',
				'orderby'             => 'date',
				'order'               => 'DESC',
				'post_status'         => 'publish',
				'post__not_in'        => $valid_selected_ids,
				'ignore_sticky_posts' => true,
			];

			if ( ! empty( $tax_query ) ) {
				$query_args[ 'tax_query' ] = $tax_query;
			}

			$query      = new WP_Query( $query_args );
			$latest_ids = $query->posts;
			wp_reset_postdata();
		}

		$combined_ids = array_slice( array_merge( $valid_selected_ids, $latest_ids ), 0, $posts_per_page );
		set_transient( $transient_key, $combined_ids, 0.5 * HOUR_IN_SECONDS );

		return $combined_ids;
	}

	public static function remove_page_segment($url) {
		// Use regex to match and remove the /page/{pagenumber} segment
		$cleaned_url = preg_replace('/\/page\/\d+/', '', $url);
		return $cleaned_url;
	}
}