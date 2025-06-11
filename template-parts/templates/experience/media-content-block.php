<?php
$data = $args[ 'data' ];
if ( ! $data[ 'mcb_title' ] ) {
	return;
}
?>
<div class="relative mt-5 md:mt-50">
	<div class="container flex flex-col md:flex-row gap-14">
		<div class="w-full md:w-7/12 flex flex-col gap-4">
			<p class="body2 font-bold text-secondary-500 text-center md:text-left">
				<?php echo esc_html( $data[ 'mcb_top_heading' ] ); ?>
			</p>
			<h2 class="h2 font-bold text-primary-500 text-center md:text-left w-full mb-2">
				<?php echo $data[ 'mcb_title' ]; ?>
			</h2>
			<div class="mx-auto body1 font-normal text-black-500 text-center md:text-left mb-6">
				<?php echo $data[ 'mcb_description' ]; ?>
			</div>
		</div>
		<div class="w-full md:w-5/12 flex flex-col">
			<?php echo wp_get_attachment_image( $data['mcb_image'], 'large' ); ?>
		</div>
	</div>
</div>