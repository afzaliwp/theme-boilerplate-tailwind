<?php
$data = $args[ 'data' ];
if ( !$data[ 'edu_tabs' ] ) {
	return;
}
?>
<div class="relative mt-5 md:mt-25">
	<div class="container md:w-[960px]">
		<p class="body2 font-bold text-secondary-500 text-center">
			<?php echo esc_html( $data[ 'edu_top_heading' ] ); ?>
		</p>
		<h2 class="h2 font-bold text-primary-500 text-center w-full mb-2">
			<?php echo $data[ 'edu_title' ]; ?>
		</h2>
		<div class="w-full md:w-10/12 mx-auto body1 font-normal text-white-500 text-center mb-6">
			<?php echo $data[ 'edu_description' ]; ?>
		</div>
		<div class="tabs-wrapper">
			<!-- Tabs Container -->
			<div class="tabs-container relative bg-primary-100 rounded-lg p-2">
				<!-- Tab Buttons -->
				<div class="tab-buttons relative flex">
					<?php foreach ( $data[ 'edu_tabs' ] as $index => $tab ) { ?>
						<button
							class="tab-button flex-1 py-3 px-6 text-center font-bold text-primary-500 rounded-md transition-colors duration-300 z-10 <?php echo 0 === $index ? 'active' : '' ?>"
							data-tab="<?php echo 'tab-item-' . $index; ?>">
							<?php echo esc_html( $tab[ 'label' ] ); ?>
						</button>
					<?php } ?>
				</div>
			</div>

			<!-- Tab Content -->
			<div class="tab-content-wrapper mt-8">
				<?php foreach ( $data[ 'edu_tabs' ] as $index => $tab ) { ?>
					<div class="tab-content <?php echo 0 === $index ? 'active' : '' ?>"
					     data-content="<?php echo 'tab-item-' . $index; ?>">
						<div class="">
							<div class="flex flex-col md:flex-row gap-6 justify-between items-start w-full">
								<div class="w-full md:w-1/2 body font-normal text-black-500">
									<h3 class="h2 font-bold text-primary-500 mb-4">
										<?php echo esc_html( $tab[ 'title' ] ); ?>
									</h3>
									<?php echo $tab[ 'content' ]; ?>
								</div>
								<div class="w-full md:w-1/2">
									<?php echo wp_get_attachment_image($tab[ 'image' ], 'large' ); ?>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="hidden md:block z-[-1] absolute bottom-0 right-0 -translate-y-1/2 w-[541px] h-[226px] rotate-[-30deg] rounded-full bg-[#FFDFA8] opacity-40 blur-[40px] transform"></div>
</div>

