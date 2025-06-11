<?php
/**
 * The template for displaying all pages
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main space-y-12">
			<div class="page-template space-y-10 overflow-hidden mb-12">
				<?php the_content(); ?>
			</div>
		</main>
	</div>

<?php
get_sidebar();
get_footer();
