<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="<?php bloginfo('charset');?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php bloginfo('name');?> | <?php is_front_page() ? bloginfo('description') : wp_title('');?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url');?>" />
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php if (is_singular() && get_option('thread_comments')): ?>
            <?php wp_enqueue_script('comment-reply'); ?>
        <?php endif;?>
        <?php wp_enqueue_script('jquery'); ?>
        <?php wp_head();?>
    </head>
<body <?php body_class();?>>
<div class="container" id="wrapper">
    <div class="d-flex flex-row justify-content-center ml-5 mr-5 mb-4" id="header">
        <div class="" id="logo">
            <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/AllYouLikeLogo.png" class="img-fluid" />    
        </div>
        <div class="d-flex flex-column align-items-end">
            <div class="ml-1 mb-2" id="search-form">
                <?php get_search_form();?>
            </div>
            <div class="mt-2" id="tagline">
                <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/DownloadAYL.png" class="img-fluid" />    
            </div>
        </div>
    </div>