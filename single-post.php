<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

<div id="primary" class="content-area mt-10 mb-16 container mx-auto px-4 max-w-4xl">
	<main id="main" class="site-main">

		<?php
		while (have_posts()) : the_post();
			?>
			<article <?php post_class("prose prose-lg max-w-none mx-auto"); ?>>
				<?php if (has_post_thumbnail()) : ?>
					<div class="mb-6">
						<?php the_post_thumbnail('large', ['class' => 'w-full rounded-lg shadow-md']); ?>
					</div>
				<?php endif; ?>

				<header class="mb-4">
					<h1 class="text-4xl font-extrabold leading-tight mb-2"><?php the_title(); ?></h1>
					<div class="text-sm text-gray-500">
						<time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
						<span class="mx-2">|</span>
						<span><?php the_author_posts_link(); ?></span>
					</div>
				</header>

				<div class="post-content mb-12">
					<?php
					the_content();

					wp_link_pages([
						'before' => '<nav class="page-links mb-6">' . __('Pages:', 'your-textdomain'),
						'after'  => '</nav>',
					]);
					?>
				</div>

				<footer class="post-footer border-t pt-6 flex justify-between text-sm text-gray-600">
					<div class="prev-post">
						<?php previous_post_link('%link', '&larr; %title'); ?>
					</div>
					<div class="next-post">
						<?php next_post_link('%link', '%title &rarr;'); ?>
					</div>
				</footer>

				<?php
				if (comments_open() || get_comments_number()) {
					comments_template();
				}
				?>

			</article>

		<?php endwhile; ?>

	</main>
</div>

<?php get_footer(); ?>
