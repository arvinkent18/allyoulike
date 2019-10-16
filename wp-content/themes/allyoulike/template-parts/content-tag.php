<?php 
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $tag_name = (get_queried_object()) ? get_queried_object()->slug : null;
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 2,
        'paged' => $paged,
        'tag' => $tag_name
    );
    $posts = new WP_Query($args);?>
<div class="pl-3 pr-3" id="category">
    <?php if ($posts->have_posts()):?>
        <?php while ($posts->have_posts()): $posts->the_post();?>
            <?php get_template_part('template-parts/content-template', get_post_format());?>
        <?php endwhile;?>
        <nav class="d-flex flex-row flex-wrap pagination">
            Pages: <?php pagination_bar(); ?>
        </nav>
    <?php endif;?>
</div>