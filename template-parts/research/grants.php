<?php
$data = $args[ 'data' ];
?>
<div class="container relative">
	<h2 class="h2 font-bold text-black-500 mb-6 md:mb-9">
		<?php echo esc_html( $data[ 'grants_title' ] ); ?>
	</h2>
	<div class="flex flex-col md:flex-row gap-6">
		<?php foreach ( $data[ 'grants' ] as $grant ) { ?>
			<div class="flex flex-col gap-4 md:gap-6 mb-4 md:mb-0">
				<?php
				echo wp_get_attachment_image( $grant[ 'icon' ], 'thumbnail', false, ['class' => 'w-16 h-16'] );
				?>
				<h3 class="h3 font-bold text-primary-500">
					<?php echo esc_html( $grant[ 'title' ] ); ?>
				</h3>
				<div class="body2 primary-500 font-normal">
					<?php echo $grant[ 'description' ]; ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>