<?php if (have_posts()):?>
    <div class="d-flex flex-column text-center w-100">
        <h5>Search Results</h5>
    </div>
    <?php while (have_posts()) : the_post();?>
        <div class="d-flex flex-column mb-3">
            <div class="d-flex flex-row flex-wrap">
                <a class="search-links" href="<?php esc_url(the_permalink());?>"><?php the_title();?></a>- by <?php echo get_the_author();?>
            </div>
            <div class="d-flex">
            <strong><?php the_time('F j, Y') ?></strong>
            </div>
        </div>
    <?php endwhile;?>
    <nav class="d-flex flex-row flex-wrap pagination">
        <?php pagination_bar(); ?>
    </nav>
<?php else:?>
    <div class="d-flex flex-column text-center w-100">
        <h5>Nothing Found</h5>
        <p>Please try another search</p>
    </div>
<?php endif;?>

