<?php
$data = $args[ 'data' ];

if ( ! $data[ 'highlights' ] ) {
	return;
}
?>
<div class="pt-11 md:pt-20 relative">
	<div class="container flex flex-col gap-4 md:gap-6 md:w-[1010px]">
		<span class="h3 font-bold text-black-500">
			<?php echo esc_html( $data[ 'highlight_title' ] ); ?>
		</span>
		<div class="body2 font-normal text-black-500">
			<?php echo $data[ 'highlights' ]; ?>
		</div>
	</div>
</div>