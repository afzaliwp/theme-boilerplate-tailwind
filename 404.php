<?php
/**
 * The template for displaying 404 pages (not found)
 */

use AfzaliWP\Theme\Includes\Helper;

get_header(); ?>

	<div id="primary" class="content-area container mx-auto px-4 py-12 max-w-7xl">
		<main id="main" class="site-main">

			<section class="error-404 not-found flex items-center justify-center">
				<div class="container-xl">
					<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
						<div class="text-center lg:text-left">
							<p class="text-6xl font-extrabold text-gray-800">404</p>
							<p class="text-lg text-gray-600 mb-6">Not Found</p>
							<a href="<?php echo home_url(); ?>" class="w-full bg-blue-600 text-white py-2 px-6 rounded-md text-xl hover:bg-blue-700 transition-colors">
								return home
							</a>
						</div>
						<div class="text-center lg:text-right">
							<img src="<?php echo esc_url( Helper::get_assets_images_url( '404.webp' ) ); ?>" class="img-fluid mx-auto" alt="404 book">
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
