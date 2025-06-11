<?php
$data = $args[ 'data' ];
?>
<div class="mt-[120px] md:mt-[240px] relative">
	<div class="z-[-1] absolute top-0 left-0 -translate-x-2/4 -translate-y-1/2 w-[541px] h-[226px] rotate-[-30deg] rounded-full bg-[#FFDFA8] opacity-40 blur-[100px] transform"></div>
	<div
		class="container flex flex-col items-center justify-center gap-6 md:gap-24 md:flex-row md:justify-between md:items-stretch min-h-screen">
		<div class="w-full md:w-6/12">
			<div class="flex flex-col md:gap-4 items-center md:items-start sticky top-28">
				<p class="body2 font-bold text-secondary-500 text-center md:text-left"><?php echo esc_html( $data[ 'top_heading' ] ); ?></p>
				<h2 class="h2 font-bold text-primary-500 text-center md:text-left w-full"><?php echo $data[ 'heading' ]; ?></h2>
				<div class="body1 font-normal text-white-500 text-center md:text-left">
					<?php echo $data[ 'description' ]; ?>
				</div>
				<div class="w-full flex flex-col md:flex-row mt-6 gap-4">
					<?php if ( $data[ 'primary_button_label' ] ) { ?>
						<a href="<?php echo esc_html( $data[ 'primary_button_link' ] ); ?>" class="button-primary">
							<?php echo esc_html( $data[ 'primary_button_label' ] ); ?>
						</a>
					<?php } ?>

					<?php if ( $data[ 'primary_button_label' ] ) { ?>
						<a href="<?php echo esc_html( $data[ 'secondary_button_link' ] ); ?>" class="button-secondary">
							<?php echo esc_html( $data[ 'secondary_button_label' ] ); ?>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="w-full md:w-6/12 flex flex-col gap-4 md:gap-6">
			<?php
			$query = $data[ 'posts' ];
			if ( $query->have_posts() ) {
				$index = 0;
				while ( $query->have_posts() ) {
					$query->the_post();
					if ( 0 === $index ) {
						?>
						<div class="rounded-md bg-white-100 transition hover:shadow overflow-hidden relative">
							<div class="border-l-8 border-secondary-500 py-4 pr-6 pl-5 flex flex-col gap-4">
								<?php the_post_thumbnail( 'medium', [ 'class' => 'w-full h-44 object-cover rounded-md' ] ); ?>
								<h4 class="text-primary-500 h5 font-bold"><?php the_title(); ?></h4>
								<div class="m-0 text-black-100 body1 font-normal">
									<?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="stretched-link" aria-label="Read more"></a>
							</div>
						</div>

						<?php
						$index ++;
						continue;
					}
					?>
					<div class="rounded-md bg-white-100 transition hover:shadow overflow-hidden relative">
						<div class="py-4 pr-6 pl-5 flex flex-col gap-4">
							<h4 class="text-primary-500 h5 font-bold"><?php the_title(); ?></h4>
							<div class="m-0 text-black-100 body1 font-normal">
								<?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="Read more"></a>
						</div>
					</div>
					<?php
					$index ++;
				}
				wp_reset_query();
			}
			?>
		</div>
	</div>
</div>
