<?php
$data = $args[ 'data' ];
?>
<div class="md:pt-36 md:pb-24 py-11 relative">
	<div class="container flex flex-col items-center justify-center gap-6">
		<h1 class="md:w-8/12 mx-auto text-center h1 font-bold text-black-500">
			<?php echo esc_html( $data[ 'hero_title' ] ); ?>
		</h1>
		<div class="md:w-8/12 mx-auto text-center body1 font-normal text-black-500">
			<?php echo $data[ 'hero_description' ]; ?>
		</div>
		<div class="flex flex-col md:flex-row gap-4 w-full md:w-[fit-content]">
			<?php if ( $data[ 'hero_action_button_label' ] ) { ?>
				<a href="<?php echo esc_html( $data[ 'hero_action_button_link' ] ); ?>" class="button-primary">
					<?php echo esc_html( $data[ 'hero_action_button_label' ] ); ?>
				</a>
			<?php } ?>
		</div>
	</div>
	<div
		class="z-[-1] absolute top-0 right-0 translate-x-2/4 -translate-y-1/2 w-[870px] h-[870px] rounded-full bg-[#ebbd34] opacity-40 blur-[300px] transform"></div>
</div>