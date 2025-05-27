<?php
/**
 * The template for displaying all pages
 */

get_header();
?>

	<div id="primary" class="content-area container mx-auto px-4 py-10 max-w-3xl">
		<main id="main" class="site-main">
			<?php
			// Start the Loop.
			while (have_posts()) :
				the_post();

				get_template_part('template-parts/page/content', 'page');

			endwhile; // End the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
