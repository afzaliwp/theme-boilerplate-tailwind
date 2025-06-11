<?php
$tags = get_the_tags();
?>

<div class="container md:w-[1010px]">
	<div class="flex flex-col">
		<span class="body1 font-bold text-black-500 mb-4">Share this post</span>
		<div class="flex flex-col-reverse md:flex-row justify-between items-center gap-4">
			<div class="flex flex-row flex-wrap gap-2 w-full md:w-5/12">
				<!-- Copy Button -->
				<button
					class="copy-url-button bg-white-100 p-1 rounded-full w-8 h-8 flex items-center justify-center">
					<i class="mx-icon mx-link-alt text-[24px] text-black-500"></i>
				</button>

				<!-- LinkedIn Share -->
				<a
					href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode( get_permalink() ); ?>"
					target="_blank"
					class="bg-white-100 p-1 rounded-full w-8 h-8 flex items-center justify-center">
					<i class="mx-icon mx-linkedin body1 text-black-500"></i>
				</a>

				<!-- X (Twitter) Share -->
				<a
					href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo urlencode( get_the_title() ); ?>"
					target="_blank"
					class="bg-white-100 p-1 rounded-full w-8 h-8 flex items-center justify-center">
					<i class="mx-icon mx-x text-[24px] text-black-500"></i>
				</a>

				<!-- Facebook Share -->
				<a
					href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>"
					target="_blank"
					class="bg-white-100 p-1 rounded-full w-8 h-8 flex items-center justify-center">
					<i class="mx-icon mx-facebook text-[24px] text-black-500"></i>
				</a>
			</div>
			<div class="flex flex-row flex-wrap gap-2 w-full md:w-7/12 md:justify-end">
				<?php foreach ( $tags as $tag ) {
					?>
					<a href="<?php echo esc_url( get_term_link( $tag ) ); ?>" class="px-2 py-1 bg-primary-100 text-primary-500 body3 font-normal">
						<?php echo $tag->name; ?>
					</a>
					<?php
				} ?>
			</div>
		</div>
	</div>
</div>