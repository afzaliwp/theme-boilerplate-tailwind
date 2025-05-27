<?php
/**
 * The main template file
 */

get_header();
?>

	<div id="primary" class="content-area container mx-auto px-4 py-10 max-w-5xl">
		<main id="main" class="site-main grid gap-10 md:grid-cols-2 lg:grid-cols-3">
			<?php
			if (have_posts()) :

				// Start the Loop.
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/post/content', get_post_format());

				endwhile;

			// If no content, include the "No posts found" template.
			else :
				get_template_part('template-parts/post/content', 'none');

			endif;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
