<?php
$data = $args[ 'data' ];
if ( ! $data[ 'timeline' ] ) {
	return;
}
?>
<div class="relative mt-5 md:mt-50">
	<div class="container">
		<div class="flex flex-col items-start md:flex-row gap-2">
			<div class="w-full md:w-1/2 flex-col gap-4 md:gap-6">
				<p class="body2 font-bold text-secondary-500 text-center md:text-left">
					<?php echo esc_html( $data[ 'timeline_top_heading' ] ); ?>
				</p>
				<h2 class="h2 font-bold text-primary-500 text-center md:text-left w-full mb-2">
					<?php echo $data[ 'timeline_title' ]; ?>
				</h2>
				<div class="mx-auto body1 font-normal text-white-500 text-center md:text-left mb-6">
					<?php echo $data[ 'timeline_description' ]; ?>
				</div>
				<div class="flex flex-col md:flex-row mt-6 gap-4">
					<?php if ( $data[ 'timeline_action_button_label' ] ) { ?>
						<a href="<?php echo esc_url( $data[ 'timeline_action_button_link' ] ); ?>" class="button-secondary">
							<?php echo esc_html( $data[ 'timeline_action_button_label' ] ); ?>
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="w-full md:w-1/2">
				<div class="swiper timeline-swiper h-[820px] md:h-[940px]">
					<div class="swiper-wrapper">
						<?php foreach ($data['timeline'] as $timeline) { ?>
							<div class="swiper-slide group flex flex-row relative pl-5 py-4">
								<div class="block ml-2 group-[.active]:hidden absolute left-0 top-0 bottom-0 width-[4px] h-full bg-secondary-500">
									<span class="absolute top-10 left-1/2 -translate-x-1/2 circle w-3 h-3 rounded-full bg-secondary-500 border-2 border-white-100"></span>
									<span class="circle rounded-full bg-secondary-500 border-2 border-secondary-500"></span>
								</div>
								<div class="group-[.swiper-slide-next]:blur-none blur-[2px] rounded-md bg-white-100 transition hover:shadow overflow-hidden relative">
									<div class="group-[.swiper-slide-next]:border-l-8 group-[.swiper-slide-next]:border-secondary-500 py-4 pr-6 pl-5 flex flex-col gap-2">
										<h4 class="text-black-500 h4 font-bold"><?php echo $timeline['date']; ?></h4>
										<p class="text-black-500 h4 font-bold"><?php echo $timeline['position']; ?></p>
										<p class="text-black-500 h5 font-bold"><?php echo $timeline['title']; ?></p>
										<div class="opacity-0 max-h-0 overflow-hidden transition-all duration-500 ease-in-out group-[.swiper-slide-next]:opacity-100 group-[.swiper-slide-next]:max-h-[200px] m-0 text-black-100 body2 font-normal">
											<?php echo $timeline['description']; ?>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>