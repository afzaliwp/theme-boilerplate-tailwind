<?php
$tags = get_the_tags();
?>
<div class="flex flex-col md:flex-row gap-8 relative">
	<div class="w-12/12 md:w-6/12 flex flex-col gap-1">
		<h3 class="h4 font-bold text-black-400"><?php the_title() ?></h3>
		<div class="body2 font-normal text-black-300 my-2">
			<?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
		</div>
		<div class="flex flex-row flex-wrap gap-2">
			<?php foreach ( $tags as $tag ) { ?>
				<a href="<?php echo esc_url( get_term_link( $tag ) ); ?>"
				   class="px-2 py-1 text-primary-500 body3 font-bold bg-primary-100 rounded-sm">
					<?php echo esc_html( $tag->name ); ?>
				</a>
			<?php } ?>
		</div>
		<span class="flex flex-row gap-2 items-center justify-start mt-3 md:mt-4 text-button-16 font-bold text-primary-500">
			View Project
			<i class="mx-icon mx-chevron-right text-secondary-500 h5"></i>
		</span>
		<a href="<?php the_permalink(); ?>" class="stretched-link"></a>
	</div>
	<div class="w-12/12 md:w-6/12">
		<?php the_post_thumbnail( 'large', [ 'class' => 'w-full h-full object-fit-cover max-h-[370px]' ] ); ?>
	</div>
</div>
<hr class="my-7 border-white-300">