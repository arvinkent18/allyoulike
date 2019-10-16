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
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </span>
        <div class="d-flex flex-row justify-content-between w-100">
            <span class="entry-category">
                <?php esc_html(the_category(', ')); ?>    
            </span>
            <span class="entry-comments">
                <a href="<?php esc_url(the_permalink());?>/#respond"><?php comments_popup_link('No Comments', '1 Comment', '% Comments');?></a>    
            </span>
        </div>
    </div>
</div>
<div class="d-flex flex-column justify-content-between pr-3 pt-3 pb-3">
    <div class="entry-content"><?php the_content('CLICK HERE TO DOWNLOAD');?></div>
    <div class="entry-author">Posted by <strong><?php echo get_the_author();?></strong></div>
</div>