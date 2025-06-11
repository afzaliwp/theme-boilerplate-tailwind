<?php
$data = $args[ 'data' ];
?>
<div class="container">
	<div class="flex flex-col gap-1">
		<p class="body2 font-bold text-secondary-500 text-center md:text-left"><?php echo esc_html( $data[ 'posts_section_top_heading' ] ); ?></p>
		<h2 class="h2 font-bold text-primary-500 text-center md:text-left w-full"><?php echo $data[ 'posts_section_heading' ]; ?></h2>
		<div class="body1 font-normal text-white-500 text-center md:text-left">
			<?php echo $data[ 'posts_section_description' ]; ?>
		</div>
	</div>

	<hr class="my-7 border-white-300">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();

			echo get_template_part( 'template-parts/loop/portfolio' );
		}
	} else { ?>
		<div class="text-black-200 h5 font-medium text-center">No portfolio found!</div>
	<?php } ?>

</div>

<div class="container flex flex-col md:flex-row justify-center gap-4 w-full md:w-[fit-content] mb-20 md:mb-4">
	<button type="button" aria-label="Show More" class="show-more-button button-secondary cursor-pointer">
		Show More
	</button>
</div>