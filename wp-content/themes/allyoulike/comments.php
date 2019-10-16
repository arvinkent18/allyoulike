<?php
    global $post_id;
    
    $aria_req = ( $req ? " aria-required='true'" : '' );

    $args = array(
        'fields' => apply_filters(
            'comment_form_default_fields', array(
                'author' =>'<p class="comment-form-author">' . '<input id="author" name="author" type="text" value="' .
                    esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /> '.
                    '<label for="author">' . __( '<strong>Name</strong> (required)' ) . '</label> ' .
                    '</p>'
                    ,
                'email'  => '<p class="comment-form-email">' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' /> '  .
                    '<label for="email">' . __( '<strong>Mail</strong> (will not be published) (required)' ) . '</label></p>',
                'url'    => '<p class="comment-form-url">' .
                '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
                '<label for="url">' . __( '<strong>Website</strong>', 'domainreference' ) . '</label></p>'
            )
        ),
        'comment_field' => '<p class="comment-form-comment">' .
            '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .
            '</p>',
        'comment_notes_after' => '',
        'title_reply' => '<div class="comment-form-header"> <h5>Leave a Reply</h5></div>',
        'label_submit' => __( 'Submit Comment' )
    );?>
    <?php echo $post_id;?>
    <?php comment_form($args, $post_id); ?>