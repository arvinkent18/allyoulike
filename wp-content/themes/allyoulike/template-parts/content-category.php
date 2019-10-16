<?php get_template_part('template-parts/partials/navigation', get_post_format());?>

<?php get_template_part('template-parts/partials/banner', get_post_format());?>
<?php 
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $category_name = (get_queried_object()) ? get_queried_object()->cat_name : null;
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => $category_name,
        'posts_per_page' => 12,
        'paged' => $paged,
    );
    $posts = new WP_Query($args);?>
<div class="pl-3 pr-3" id="category">
    <?php if ($posts->have_posts()):?>
        <?php while ($posts->have_posts()): $posts->the_post();?>
            <?php get_template_part('template-parts/content-template', get_post_format());?>
        <?php endwhile;?>
        <nav class="d-flex flex-row flex-wrap pagination">
            <?php pagination_bar(); ?>
        </nav>
    <?php endif;?>
</div>