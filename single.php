<?php
/**
 * The template for displaying all single posts
 */

use AfzaliWP\Theme\Includes\Controllers\Templates;

get_header();

$controller = new Templates();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main space-y-12">
		<div class="single-<?php echo get_post_type(); ?>-page space-y-10 overflow-hidden mb-12">
			<?php ?>
		</div>
	</main>
</div>

<?php get_footer(); ?>
