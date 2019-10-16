<?php
/**
 * Theme Name: allyoulike
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
        <?php get_template_part('template-parts/content', get_post_format());?>
    </div><!-- /.content -->

    <div class="column-divs align-items-end">
        <?php get_sidebar();?>
    </div><!-- /.right sidebar -->
</div>
<?php get_footer();?>
