<?php
$data = $args[ 'data' ];
?>
<div class="container relative mb-15 md:mb-25">
	<div class="flex flex-col items-center justify-center gap-4 md:gap-6">
		<p class="body2 font-bold text-secondary-500 text-center"><?php echo esc_html( $data[ 'top_heading' ] ); ?></p>
		<h2 class="h2 font-bold text-black-500 text-center w-full"><?php echo $data[ 'title' ]; ?></h2>
		<div class="body1 font-normal text-black-500 text-center">
			<?php echo $data[ 'description' ]; ?>
		</div>
	</div>
	<div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
		<?php foreach ( $data[ 'image_blocks' ] as $block ) { ?>
			<div
				class="relative w-full aspect-3/4 md:aspect-square after:content-[''] after:absolute after:inset-0 after:bg-[linear-gradient(180deg,rgba(25,44,77,0.10)_42%,_#192C4D_100%)] after:z-1">
				<div class="flex flex-col items-start justify-end w-full h-full">
					<?php echo wp_get_attachment_image(
						$block[ 'image' ],
						'large',
						false,
						[ 'class' => 'absolute inset-0 w-full h-full object-cover' ]
					); ?>
					<div class="flex flex-col gap-2 z-2 p-4 w-full md:p-12">
					<span class="text-secondary-500 body2 font-bold">
						<?php echo esc_html( $block[ 'top_heading' ] ); ?>
					</span>
						<h4 class="h3 font-bold text-white-100">
							<?php echo esc_html( $block[ 'title' ] ); ?>
						</h4>
						<div class="body2 font-normal text-white-100">
							<?php echo $block[ 'description' ]; ?>
						</div>
						<a href="<?php echo esc_url( $block[ 'action_button_link' ] ); ?>"
						   class="text-white-100 button-16 font-bold flex flex-row items-center gap-2 mt-2 md:mt-5">
							<?php echo esc_html( $block[ 'action_button_label' ] ); ?>
							<i class="mx-icon mx-chevron-right text-secondary-500 text-[24px]"></i>
						</a>
					</div>
				</div>

			</div>
		<?php } ?>
	</div>
</div>
