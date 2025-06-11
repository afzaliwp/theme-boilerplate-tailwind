<?php
$author_id          = get_the_author_meta( 'ID' );
$author_name        = get_the_modified_author();
$author_description = get_the_author_meta( 'description', $author_id );
?>

<div class="container md:w-[1010px] mb-20 md:mb-50">
	<hr class="border-white-500 my-8 md:my-12">
	<div class="flex flex-row justify-start items-center gap-4">
		<img src="<?php echo get_avatar_url( $author_id ); ?>"
		     alt="<?php echo esc_attr( $author_name ); ?>"
		     class="rounded-full w-13 h-13">
		<div class="flex flex-col">
			<strong class="body2 font-bold text-black-500">
				<?php echo esc_html( $author_name ); ?>
			</strong>
			<span class="body2 font-normal text-black-500">
               <?php echo $author_description; ?>
            </span>
		</div>
	</div>
</div>