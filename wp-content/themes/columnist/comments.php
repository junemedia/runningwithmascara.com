			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'columnist' ); ?></p>
			</div>
<?php	
		return;
	endif;
?>

<?php if ( have_comments() ) : ?>
			<h3 id="comments-title"><?php
			printf( _n( 'One Comment to %2$s', '%1$s Comments to %2$s', get_comments_number(), 'columnist' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'columnist' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'columnist' ) ); ?></div>
			</div>
<?php endif; ?>

			<ol class="commentlist">
				<?php
					wp_list_comments( array( 'callback' => 'clm_comment' ) );
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'columnist' ) ); ?>
				&nbsp;&nbsp;&nbsp;
				<?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'columnist' ) ); ?>
			</div>
<?php endif; ?>

<?php else :

	if ( ! comments_open() ) :
?>

<?php endif;  ?>

<?php endif; 

$defaults = array(
	'comment_field'        => '<p class="comment-form-comment"><label for="comment" class="comment-label">' . __( ' ','columnist' ) . '</label><br /><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'label_submit' => esc_attr__( 'Submit', 'columnist' ),
);
?>

<?php comment_form( $defaults ); ?>

</div>
