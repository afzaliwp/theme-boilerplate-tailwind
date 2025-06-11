<?php
$data = $args[ 'data' ];
?>
<div
	class="container px-10 py-16 md:px-20 relative flex flex-col justify-between items-center md:flex-row gap-8 overflow-hidden my-12 bg-no-repeat bg-cover bg-center bg-primary-500"
	style="background-image: url('<?php echo esc_url( wp_get_attachment_image_url($data[ 'bg_img' ], 'full') ); ?>')">
	<h4 class="h2 font-bold text-white-100 text-center">
		<?php echo esc_html( $data[ 'title' ] ); ?>
	</h4>

	<div class="flex flex-col md:flex-row gap-6 w-full md:w-[fit-content]">
		<?php if ( $data[ 'primary_button_label' ] ) { ?>
			<a href="<?php echo esc_url( $data[ 'primary_button_link' ] ); ?>" class="button-primary-accent">
				<?php echo esc_html( $data[ 'primary_button_label' ] ); ?>
			</a>
		<?php } ?>

		<?php if ( $data[ 'secondary_button_label' ] ) { ?>
			<a href="<?php echo esc_url( $data[ 'secondary_button_link' ] ); ?>" class="button-secondary-accent">
				<?php echo esc_html( $data[ 'secondary_button_label' ] ); ?>
			</a>
		<?php } ?>
	</div>
</div>