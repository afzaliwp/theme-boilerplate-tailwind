<?php
get_header();
?>

	<div id="primary" class="content-area container mx-auto px-4 py-12 max-w-6xl">
		<main id="main" class="site-main">
			<div class="space-y-10">
				<!-- Add your homepage sections here -->

				<section class="hero bg-gray-100 rounded-lg p-8 shadow-md">
					<h1 class="text-4xl font-bold mb-4">Welcome to <?php bloginfo('name'); ?></h1>
					<p class="text-lg text-gray-700">Your homepage content starts here. Customize as you wish.</p>
				</section>

				<section class="featured-posts grid gap-8 md:grid-cols-2 lg:grid-cols-3">
					<?php
					// Example: Query latest 3 posts
					$latest_posts = new WP_Query([
						'posts_per_page' => 3,
					]);

					if ($latest_posts->have_posts()) :
						while ($latest_posts->have_posts()) : $latest_posts->the_post();
							get_template_part('template-parts/post/content', get_post_format());
						endwhile;
						wp_reset_postdata();
					else:
						echo '<p>No posts found.</p>';
					endif;
					?>
				</section>

				<!-- Add more homepage sections as needed -->
			</div>
		</main>
	</div>

<?php
get_footer();
