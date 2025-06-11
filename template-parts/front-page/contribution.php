<?php
$data = $args[ 'data' ];
?>

<div class="mt-[85px] md:mt-[130px]">
	<div class="container flex flex-col gap-4 items-center justify-center py-2">
		<p class="body2 font-bold text-secondary-500 text-center"><?php echo esc_html( $data[ 'top_heading' ] ); ?></p>
		<h2 class="h2 font-bold text-primary-500 text-center w-full md:w-8/12"><?php echo esc_html( $data[ 'heading' ] ); ?></h2>
		<div class="w-full flex flex-col justify-center md:flex-row wrap gap-4 md:gap-6 md:mt-6">
			<?php foreach ( $data[ 'fields' ] as $field ) { ?>
				<div class="group w-full md:w-3/12 bg-white-100 rounded-3xl hover:shadow transition p-8 flex flex-col gap-8">
					<div class="rounded bg-primary-100 p-4 w-[fit-content] group-hover:bg-primary-500 transition-colors duration-300">
						<?php echo wp_get_attachment_image(
							$field[ 'icon' ],
							'thumbnail',
							false,
							[
								'class'  => 'w-8 h-8 transition-all duration-300 group-hover:filter group-hover:brightness-0 group-hover:invert'
								,
								'width'  => 32,
								'height' => 32
							]
						) ?>
					</div>

					<div class="flex flex-col gap-2">
						<h5 class="h5 font-bold text-primary-500">
							<?php echo esc_html( $field[ 'title' ] ); ?>
						</h5>

						<div class="body2 font-normal text-black-300">
							<?php echo $field[ 'description' ]; ?>
						</div>
					</div>

				</div>
				<?php
			} ?>

		</div>
	</div>
</div>
