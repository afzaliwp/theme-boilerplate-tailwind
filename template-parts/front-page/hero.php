<?php
$hero = $args[ 'data' ];
?>
<div class="py-11 md:py-10 relative overflow-hidden ">
	<div class="container flex flex-col md:flex-row items-center justify-between gap-[50px] md:gap-[130px]">
		<div class="flex flex-col w-12/12 md:w-7/12">
			<h1 class="h1 font-bold text-black"><?php echo $hero[ 'title' ]; ?></h1>
			<div class="text-body1 text-normal"><?php echo $hero[ 'description' ]; ?></div>
			<div class="flex flex-col md:flex-row mt-6 gap-4">
				<?php if ( $hero[ 'primary_button_label' ] ) { ?>
					<a href="<?php echo esc_url( $hero[ 'primary_button_link' ] ); ?>" class="button-primary">
						<?php echo esc_html( $hero[ 'primary_button_label' ] ); ?>
					</a>
				<?php } ?>

				<?php if ( $hero[ 'secondary_button_label' ] ) { ?>
					<a href="<?php echo esc_url( $hero[ 'secondary_button_link' ] ); ?>" class="button-secondary">
						<?php echo esc_html( $hero[ 'secondary_button_label' ] ); ?>
					</a>
				<?php } ?>
			</div>
		</div>

		<div class="w-12/12 md:w-7/12 bg-white-100 px-0 pb-0 pt-5 rounded-[24px] overflow-hidden">
			<?php echo wp_get_attachment_image( $hero[ 'image' ], 'large', false, [ 'class' => 'object-cover w-full h-full' ] ); ?>
		</div>
	</div>

	<div
		class="z-[-1] absolute top-0 right-0 translate-x-2/4 -translate-y-1/2 w-[870px] h-[870px] rounded-full bg-[#ebbd34] opacity-40 blur-[300px] transform"></div>
</div>