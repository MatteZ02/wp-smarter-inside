<?php
function my_breadcrumb_title_swapper( $title,  $type, $id ) {
    if ( in_array( 'home', $type ) ) {
        $title = __( 'Home' );
    }

    return $title;
}
add_filter( 'bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10 );

function search_filter($query) {
    if ($query->is_search) {
        $query->set('category_name', 'products');
    }
    return $query;
}
add_filter('pre_get_posts','search_filter');
function theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header');
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 200,
        'flex-height' => true,
    ));
    add_theme_support( 'html5', array( 'search-form' ) );

    set_post_thumbnail_size(200, 200, true);

    add_image_size('custom-header', 1200, 400, true);

    register_nav_menu('main-menu', __('Main Menu'));
}

add_action('after_setup_theme', 'theme_setup');

function style_setup(): void
{
    wp_enqueue_style('main-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'style_setup');

require_once(__DIR__ . '/inc/article-function.php');

?>