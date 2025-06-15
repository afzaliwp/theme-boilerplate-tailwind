<?php
/**
 * The template for displaying the footer
 */

use AfzaliWP\Theme\Includes\Helper;

$logo = Helper::get_logo('full', 'w-[133px] h-[60px] order-1');
?>

</div><!-- #content -->

<footer class="site-footer bg-primary-500 text-white-100 py-5 md:py-8">
	<div class="container mx-auto py-5 md:py-20 flex flex-col justify-between gap-6">
		<div class="flex flex-row flex-wrap md:flex-nowrap justify-between items-center">
			<?php echo $logo; ?>
			<nav class="flex flex-row order-3 mt-5 md:mt-0 md:order-2 w-full md:w-[fit-content] items-center justify-center">
				<?php
				wp_nav_menu( [
					'theme_location' => 'footer-1',
					'container'      => false,
					'menu_class'     => 'flex space-x-3 md:space-x-8 text-black text-base font-normal',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'link_before'    => '<span class="relative duration-300 body2 font-bold text-white-100 hover:text-primary-100">',
					'link_after'     => '</span>',
				] );
				?>
			</nav>
			<div class="flex flex-row gap-2 order-2 md:order-3">
				<a href="<?php echo esc_url(Helper::get_field('linkedin')); ?>" class="text-24px">
					<i class="afz-icon afz-linkedin"></i>
				</a>
			</div>
		</div>

		<hr class="border-white-200 mt-2 md:mt-20">

		<div class="flex flex-col-reverse md:flex-row items-center justify-center gap-4 md:gap-6">
			<span class="text-white-100 body3"><?php echo Helper::get_option('copyright'); ?></span>
			<nav class="flex ">
				<?php
				wp_nav_menu( [
					'theme_location' => 'footer-2',
					'container'      => false,
					'menu_class'     => 'flex flex-col md:flex-row md:space-x-4 text-black text-base font-normal gap-3 text-center',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'link_before'    => '<span class="relative body3 duration-300 text-white-100 hover:text-primary-100 text-center">',
					'link_after'     => '</span>',
				] );
				?>
			</nav>
		</div>
	</div>
</footer>

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
