<?php
/**
 * The template for displaying the footer
 */

use AfzaliWP\Theme\Includes\Helper;

$logo = Helper::get_logo();
?>

</div><!-- #content -->

<footer class="site-footer bg-gray-900 text-gray-300 py-8 mt-12">
	<div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-6">
		<div class="footer-logo">
			<?php if ($logo): ?>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block">
					<img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" class="h-10 w-auto">
				</a>
			<?php else: ?>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="text-xl font-semibold hover:text-white">
					<?php bloginfo('name'); ?>
				</a>
			<?php endif; ?>
		</div>

		<nav class="footer-navigation text-sm" aria-label="Footer Menu">
			<?php
			if (has_nav_menu('footer-menu')) {
				wp_nav_menu([
					'theme_location' => 'footer-menu',
					'menu_class'     => 'flex flex-wrap gap-4',
					'container'      => false,
					'depth'          => 1,
					'link_before'    => '<span class="hover:text-white transition">',
					'link_after'     => '</span>',
				]);
			}
			?>
		</nav>

		<div class="footer-copy text-xs md:text-sm text-gray-400">
			&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
		</div>
	</div>
</footer>

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
