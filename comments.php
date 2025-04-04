<?php
/**
 * Šablona pro zobrazení komentářů
 *
 * Tato šablona zobrazuje komentáře a formulář pro přidání komentáře.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Web
 */

/*
 * Pokud je aktuální příspěvek chráněn heslem a návštěvník nezadal heslo,
 * vrátíme brzy bez načtení komentářů.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// Máme komentáře?
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$web_comment_count = get_comments_number();
			if ( '1' === $web_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'Jeden komentář k &ldquo;%1$s&rdquo;', 'web' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s komentář k &ldquo;%2$s&rdquo;', '%1$s komentáře k &ldquo;%2$s&rdquo;', $web_comment_count, 'comments title', 'web' ) ),
					number_format_i18n( $web_comment_count ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 60,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// Pokud jsou komentáře uzavřeny a existují komentáře, zobrazíme zprávu.
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Komentáře jsou uzavřeny.', 'web' ); ?></p>
			<?php
		endif;

	endif; // Konec kontroly, zda máme komentáře.

	// Zobrazení formuláře pro komentáře.
	comment_form(
		array(
			'title_reply'        => esc_html__( 'Napište komentář', 'web' ),
			'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h3>',
			'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Vaše e-mailová adresa nebude zveřejněna. Povinné položky jsou označeny *', 'web' ) . '</p>',
			'comment_field'      => '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Komentář', 'web' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>',
			'label_submit'       => esc_html__( 'Odeslat komentář', 'web' ),
			'class_submit'       => 'submit btn btn-primary',
		)
	);
	?>

</div><!-- #comments -->