<div class="d-flex flex-row justify-content-between post-links">
    <span class="previous float-left"><?php esc_html(previous_post_link('%link')); ?></span> 
    <span class="next float-right"><?php esc_html(next_post_link('%link')); ?></span>
</div>
<div class="d-flex">
    <div class="d-flex flex-column mt-2" id="entry-date">
        <span class="entry-month">
            <?php echo esc_html(get_the_date('M'));?>
        </span>
        <span class="entry-day">
            <?php echo esc_html(get_the_date('d'));?>
        </span>
    </div>
    <div class="d-flex flex-column justify-content-between w-100 pl-2">
        <span class="entry-link mt-1 mb-1">
            <?php esc_html(the_title());?>
        </span>
        <div class="d-flex flex-row justify-content-between w-100">
            <?php $post_id = get_the_ID();?>
            <span class="entry-category">
                <?php esc_html(the_category(', ')); ?> 
            </span>
            <span class="comment-to-post">
                <a href="#respond">Add comments</a>    
            </span>
        </div>
    </div>
</div>
<div class="d-flex flex-column justify-content-between pr-3 pt-3 pb-3">
    <div class="entry-content"><?php the_content('Continue reading &raquo;');?></div>
    <div class="entry-author">Written by <strong><?php echo get_the_author();?></strong></div>
</div>
<div class="d-flex flex-column pl-4 pr-4">
    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/RareFilePremiumBanner468.gif" class="img-fluid"/>
</div>
<div class="d-flex flex-column mt-3 comments-list">
    <div class="mb-2">
        <h3 id="comments-count"><?php echo (get_comments_number($post_id)) > 1 ?  get_comments_number($post_id) . ' Responses' : get_comments_number($post_id) . ' Response';?> to this entry.</h3> 
    </div>
    <div class="mb-3">
        <?php 
            $comments = get_comments(array('post_id' => $post_id, 'order' => 'ASC'));?>
        <?php foreach ($comments as $comment):?>
            <?php if ($comment->user_id == 0): ?>
            <?php $author = false;?>
            <?php else: ?>
            <?php $author = true;?>
            <?php endif;?>
            <?php if ($author == false):?>
            <div class="d-flex flex-column comments mb-3 p-2">
            <?php else:?>
            <div class="d-flex flex-column comments-author mb-3 p-2">
            <?php endif;?>
                <div class="comment-author">
                    <span class="author"><strong><?php echo $comment->comment_author;?></strong></span> <span class="comment-static">Says:</span> 
                </div>
                <div class="comment-date">
                    <?php echo get_comment_date('F jS, Y', $comment->comment_ID);?> at <?php comment_time();?> <?php ($author == true) ? edit_comment_link('e','','') : ''; ?>
                </div>
                <div class="comment-content">
                    <?php echo $comment->comment_content;?>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="comment-form">
        <?php comments_template(); ?>
    </div>
</div>