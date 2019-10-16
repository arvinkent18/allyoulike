<?php
// Bootstrap Navigation Walker
if (!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
    // file does not exist... return an error.
    return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
    // file exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

// Primary Menu
register_nav_menus(array(
    'primary' => __('Primary Menu', 'AllYouLike'),
));

// Twitter Bootstrap Package
function wpbootstrap_scripts_with_jquery()
{
    // Register the script like this for a theme:
    wp_register_script('custom-script', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'));
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script('custom-script');
}
add_action('wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery');

// Left Sidebar Widget
function left_sidebar()
{
    register_sidebar(
        array(
            'name' => __('Left Sidebar', ''),
            'id' => 'left-side-bar',
            'description' => __('Left Sidebar', ''),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action('widgets_init', 'left_sidebar');

// Right Sidebar Widget
function right_sidebar()
{
    register_sidebar(
        array(
            'name' => __('Right Sidebar', ''),
            'id' => 'right-side-bar',
            'description' => __('Right Sidebar', ''),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action('widgets_init', 'right_sidebar');

// Pagination
function pagination_bar() {
    global $wp_query;

    $big = 999999999;

    $total_pages = $wp_query->max_num_pages;

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo 'Pages: ' . paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

// Remove Consent Checkbox
remove_action('set_comment_cookies', 'wp_set_comment_cookies');

// Remove Comment Notes Before
function wp_comment_notes_before($fields) { 
    $fields['comment_notes_before'] = ''; 

    return $fields; 
} 
add_filter('comment_form_defaults','wp_comment_notes_before');

// Search SQL filter for matching against post title only.
function __search_by_title_only( $search, $wp_query )
{
    global $wpdb;

    if ( empty( $search ) )
    return $search; // skip processing - no search term in query

    $q = $wp_query->query_vars;
    $n = ! empty( $q['exact'] ) ? '' : '%';

    $search =
    $searchand = '';

    foreach ( (array) $q['search_terms'] as $term ) {
        $term = esc_sql($wpdb->esc_like($term));

        $search .= "{$searchand}($wpdb->posts.post_title REGEXP '[[:<:]]{$term}[[:>:]]')";

        $searchand = ' AND ';
    }

    if ( ! empty( $search ) ) {
        $search = " AND ({$search}) ";
        if ( ! is_user_logged_in() )
        $search .= " AND ($wpdb->posts.post_password = '') ";
    }

    return $search;
}
add_filter('posts_search', '__search_by_title_only', 1000, 2); 

// Reverse order in category hierarchy
function reverse_categories($terms, $id, $taxonomy){
    if($taxonomy == 'category'){
        $terms = array_reverse($terms, true);
    }
    return $terms;
}
add_filter('get_the_terms', 'reverse_categories', 10, 3);

// Automation of unhperlink texts
add_filter('the_content', 'make_clickable', 12);

// Showing empty categories
function show_empty_categories($cat_args) {
    $cat_args['hide_empty'] = 0;
    
    return $cat_args;
}
add_filter( 'widget_categories_args', 'show_empty_categories' );