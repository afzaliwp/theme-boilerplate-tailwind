<?php
/**
 * The template for displaying the front page
 */

use AfzaliWP\Theme\Includes\Controllers\Front_Page;

$controller   = new Front_Page();
$hero         = $controller->get_hero_section();

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main space-y-12">
			<div class="front-page space-y-10 mb-12">
				<?php
//				echo get_template_part(
//					'template-parts/front-page/hero',
//					'',
//					[ 'data' => $hero ]
//				);
				?>
			</div>
		</main>
	</div>

<?php
get_footer();
