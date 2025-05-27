<?php
/**
 * The template for displaying the front page
 */

get_header();
?>

	<div id="primary" class="content-area container mx-auto px-4 py-12 max-w-7xl">
		<main id="main" class="site-main space-y-12">
			<div class="front-page space-y-10">

				<!-- Hero Section -->
				<section class="hero bg-gray-800 text-white rounded-lg p-10 shadow-lg">
					<h1 class="text-5xl font-bold leading-tight mb-4"><?php bloginfo('name'); ?></h1>
					<p class="text-lg mb-6"><?php bloginfo('description'); ?></p>
					<a href="#explore" class="inline-block bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700 transition-colors">Explore More</a>
				</section>

				<!-- Featured Content Section -->
				<section class="featured-content grid gap-8 md:grid-cols-2 lg:grid-cols-3">
					<?php
					// Query latest 3 posts for featured content
					$latest_posts = new WP_Query([
						'posts_per_page' => 3,
					]);

					if ($latest_posts->have_posts()) :
						while ($latest_posts->have_posts()) : $latest_posts->the_post();
							?>
							<div class="post-card bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
								<?php if (has_post_thumbnail()) : ?>
									<div class="post-thumbnail mb-4">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover rounded-lg']); ?>
										</a>
									</div>
								<?php endif; ?>
								<h2 class="text-2xl font-semibold mb-2">
									<a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-blue-600"><?php the_title(); ?></a>
								</h2>
								<p class="text-gray-600 text-sm"><?php the_excerpt(); ?></p>
							</div>
						<?php
						endwhile;
						wp_reset_postdata();
					else:
						echo '<p>No posts found.</p>';
					endif;
					?>
				</section>

				<!-- Additional Sections -->
				<!-- You can add more sections like services, testimonials, etc. below -->

			</div>
		</main>
	</div>

<?php
get_footer();
