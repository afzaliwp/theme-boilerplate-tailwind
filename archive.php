<?php
/**
 * The template for displaying archive pages
 */

use AfzaliWP\Theme\Includes\Helper;

get_header();
$term    = get_queried_object();
$term_id = $term->term_id;
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="archive-header mb-12">
				<h1 class="text-4xl font-bold text-gray-800"><?php echo esc_html( $term->name ); ?></h1>
				<p class="text-lg text-gray-600"><?php echo esc_html( $term->description ); ?></p>
			</div>

			<div class="archive-content grid gap-8 md:grid-cols-2 lg:grid-cols-3">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/post/content', get_post_format() );
					endwhile;

					// Pagination
					the_posts_navigation();
				else :
					?>
					<p class="text-center text-gray-500">No posts found in this archive.</p>
				<?php endif; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
