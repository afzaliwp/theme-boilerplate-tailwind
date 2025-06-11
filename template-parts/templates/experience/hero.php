<?php
$data = $args[ 'data' ];
?>
<div class="py-11 md:py-10 relative">
	<div class="container flex flex-col md:flex-row items-center justify-between gap-[40px] md:gap-[60px]">
		<div class="flex flex-col gap-6 w-12/12 md:w-7/12">
			<h1 class="h1 font-bold text-black"><?php the_title(); ?></h1>
			<div class="text-body1 text-normal text-justify"><?php the_content(); ?></div>
			<div class="flex flex-col md:flex-row mt-6 gap-4">
				<?php if ( $data[ 'hero_action_button_label' ] ) { ?>
					<a href="<?php echo esc_url( $data[ 'hero_action_button_link' ] ); ?>" class="button-primary">
						<?php echo esc_html( $data[ 'hero_action_button_label' ] ); ?>
					</a>
				<?php } ?>
			</div>
		</div>

		<div class="w-12/12 md:w-5/12 bg-white-100 px-0 pb-0 pt-5 rounded-[24px] overflow-hidden">
			<?php the_post_thumbnail( 'large', [ 'class' => 'object-cover w-full h-full' ] ); ?>
		</div>
	</div>

	<div
		class="z-[-1] absolute top-0 right-0 translate-x-2/4 -translate-y-1/2 w-[870px] h-[870px] rounded-full bg-[#ebbd34] opacity-40 blur-[300px] transform"></div>
</div>