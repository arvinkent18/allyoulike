<?php get_template_part('template-parts/partials/navigation', get_post_format());?>

<?php get_template_part('template-parts/partials/banner', get_post_format());?>

<div class="pl-3 pr-3" id="content">
    <?php if (have_posts()):?>
        <?php while (have_posts()): the_post();?>
            <?php get_template_part('template-parts/content-template', get_post_format());?>
        <?php endwhile;?>
        <nav class="d-flex flex-row flex-wrap pagination">
            <?php pagination_bar(); ?>
        </nav>
    <?php endif; ?>        
</div><!-- /.content container -->