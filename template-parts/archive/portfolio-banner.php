<?php
$data = $args[ 'data' ];

if ( ! $data[ 'show_banner' ] ) {
	return;
}
?>
<div class="w-full">
	<div
		style='background-image: url("<?php echo esc_url( $data[ 'banner_background_image' ] ) ?>")'
		class="py-8 bg-[#263A5D] bg-no-repeat bg-right-bottom bg-cover md:bg-contain">
		<div class="container">
			<div class="flex flex-col gap-5 md:w-7/12">
				<span class="h2 font-bold text-white-100">
					<?php echo esc_html( $data[ 'banner_title' ] ); ?>
				</span>
				<div class="body1 font-normal text-white-100">
					<?php echo $data[ 'banner_description' ]; ?>
				</div>

				<a href="<?php echo esc_url( $data[ 'banner_action_button_link' ] ); ?>"
				   class="button-accent">
					<?php echo $data[ 'banner_action_button_label' ]; ?>
				</a>
			</div>
		</div>
	</div>
</div>
