<?php
/**
 * The template for displaying comments
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area space-y-8">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title text-3xl font-semibold text-gray-800">
			<?php
			$afzaliwp_bp_comment_count = get_comments_number();
			if ( '1' === $afzaliwp_bp_comment_count ) {
				printf(
					esc_html__( 'One thought on “%1$s”', 'afzaliwp-bp' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf(
					esc_html( _nx( '%1$s thought on “%2$s”', '%1$s thoughts on “%2$s”', $afzaliwp_bp_comment_count, 'comments title', 'afzaliwp-bp' ) ),
					number_format_i18n( $afzaliwp_bp_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list space-y-6">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback' => function( $comment, $args, $depth ) {
						$GLOBALS['comment'] = $comment;
						?>
						<li <?php comment_class('bg-white p-4 rounded-lg shadow-md'); ?> id="comment-<?php comment_ID(); ?>">
							<div class="comment-author text-lg font-semibold text-gray-800">
								<?php echo get_avatar( $comment, 40 ); ?>
								<span class="ml-3"><?php echo get_comment_author_link(); ?></span>
							</div>
							<div class="comment-meta text-sm text-gray-600">
								<?php
								printf(
									esc_html__( '%1$s at %2$s', 'afzaliwp-bp' ),
									get_comment_date(),
									get_comment_time()
								);
								?>
							</div>
							<div class="comment-content text-gray-700 mt-2">
								<?php comment_text(); ?>
							</div>
						</li>
						<?php
					},
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments text-center text-gray-500"><?php esc_html_e( 'Comments are closed.', 'afzaliwp-bp' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	comment_form(array(
		'class_submit' => 'bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors',
		'comment_field' => '<textarea id="comment" name="comment" class="w-full p-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Your comment..."></textarea>',
	));
	?>

</div><!-- #comments -->
