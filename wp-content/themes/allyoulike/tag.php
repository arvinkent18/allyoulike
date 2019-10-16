<?php
    /**
     * Theme Name: allyoulike
     * 
     * The Template for displaying all posts by tag
     *
     * @package WordPress
     * @subpackage AllYouLike
     * @since AllYouLike 1.0
     * @author Arvin Kent S. Lazaga
     */

get_header();?>

<div class="d-flex flex-row justify-content-center wrap-columns">
    <div class="column-divs align-items-start">
        <?php get_sidebar('left');?>
    </div><!-- /.left sidebar -->

    <div class="column-divs align-items-center">
        <?php get_template_part('template-parts/partials/navigation', get_post_format());?>

        <?php get_template_part('template-parts/partials/banner', get_post_format());?>
        
        <div id="tag-result">
            <?php get_template_part('template-parts/content-tag', get_post_format());?>
        </div>
    </div><!-- /.content -->

    <div class="column-divs align-items-end">
        <?php get_sidebar();?>
    </div><!-- /.right sidebar -->
</div>

<?php get_footer();?>