<?php
$data = $args[ 'data' ];

if ( ! $data[ 'form_title' ] ) {
	return;
}

function sanitize_phone_for_url( $text ) {
	return str_replace( [ '{', '}', '[', ']', '(', ')', ' ', '|', '-', '_' ], '', $text );
}

?>

<div class="container w-full flex flex-col items-start justify-start gap-2 mb-0">
	<p class="body2 font-bold text-secondary-500 text-center md:text-left w-full">
		<?php echo esc_html( $data[ 'form_top_heading' ] ); ?>
	</p>
	<h2 class="h2 font-bold text-primary-500 text-center md:text-left w-full mb-2">
		<?php echo $data[ 'form_title' ]; ?>
	</h2>
	<div class="body1 font-normal text-black-500 text-center md:text-left w-full mb-6">
		<?php echo $data[ 'form_description' ]; ?>
	</div>
</div>
<div class="container flex flex-col md:flex-row gap-0 md:gap-14">
	<div class="w-full md:w-8/12 flex flex-col items-start justify-start gap-2">
		<div class="form w-full">
			<?php echo str_replace( '<br />', '', do_shortcode( $data[ 'form' ] ) ); ?>
		</div>
	</div>
	<div class="w-full md:w-4/12 flex flex-col gap-2">
		<div class="flex flex-row gap-2 items-center justify-start">
			<i class="mx-icon mx-mail text-[32px] text-secondary-500"></i>
			<a href="mailto:<?php echo $data[ 'email_1' ]; ?>"
			   class="body1 font-normal text-black-500">
				<?php echo $data[ 'email_1' ]; ?>
			</a>
			<span class="body1 font-normal text-white-500">|</span>
			<a href="mailto:<?php echo $data[ 'email_2' ]; ?>"
			   class="body1 font-normal text-black-500">
				<?php echo $data[ 'email_2' ]; ?>
			</a>
		</div>
		<div class="flex flex-row gap-2 items-center justify-start">
			<i class="mx-icon mx-phone text-[32px] text-secondary-500"></i>
			<a href="tel:<?php echo sanitize_phone_for_url( $data[ 'phone_1' ] ); ?>"
			   class="body1 font-normal text-white-500">
				<?php echo $data[ 'phone_1' ]; ?>
			</a>
			<span class="body1 font-normal text-white-500">|</span>
			<a href="tel:<?php echo sanitize_phone_for_url( $data[ 'phone_2' ] ); ?>"
			   class="body1 font-normal text-white-500">
				<?php echo $data[ 'phone_2' ]; ?>
			</a>
		</div>

		<div class="flex flex-row gap-2 items-center justify-start">
			<i class="mx-icon mx-pin text-[32px] text-secondary-500"></i>
			<span class="body1 font-normal text-white-500">
					<?php echo $data[ 'address_line' ]; ?>
				</span>
		</div>

		<div class="mt-2">
			<a
				href="<?php echo $data[ 'maps_link' ]; ?>"
				class="button-16 font-bold text-primary-500 flex flex-row gap-2 items-center justify-start">
				Get Directions
				<i class="mx-icon mx-chevron-right text-[24px] text-secondary-500"></i>
			</a>

		</div>
	</div>
</div>
