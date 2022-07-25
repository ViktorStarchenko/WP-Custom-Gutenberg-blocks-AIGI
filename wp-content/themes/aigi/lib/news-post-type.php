<?php
//Also in the document custom-post-types.php Topic taxonomy is included


/* Custom Post Type For News */

add_action( 'init', 'register_cpt_news' );

function register_cpt_news() {

    $labels = array(
        'name' => _x( 'News', 'news' ),
        'singular_name' => _x( 'News', 'news' ),
        'add_new' => _x( 'Add New', 'news' ),
        'add_new_item' => _x( 'Add New News', 'news' ),
        'edit_item' => _x( 'Edit News', 'news' ),
        'new_item' => _x( 'New News', 'news' ),
        'view_item' => _x( 'View News', 'news' ),
        'search_items' => _x( 'Search News', 'news' ),
        'not_found' => _x( 'No News found', 'news' ),
        'not_found_in_trash' => _x( 'No News found in Trash', 'news' ),
        'parent_item_colon' => _x( 'Parent News:', 'news' ),
        'menu_name' => _x( 'News', 'news' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'excerpt' ),
        'taxonomies' => array('news_categories', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 10,
        'show_in_rest' => true,

        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'news', $args );
}

//add_action( 'init', 'register_taxonomy_news_categories' );
//
//function register_taxonomy_news_categories() {
//
//    $labels = array(
//        'name' => _x( 'Categories', 'news_categories' ),
//        'singular_name' => _x( 'Category', 'news_categories' ),
//        'search_items' => _x( 'Search Categories', 'news_categories' ),
//        'popular_items' => _x( 'Popular Categories', 'news_categories' ),
//        'all_items' => _x( 'All Categories ', 'news_categories' ),
//        'parent_item' => _x( 'Parent Category', 'news_categories' ),
//        'parent_item_colon' => _x( 'Parent Category:', 'news_categories' ),
//        'edit_item' => _x( 'Edit Category', 'news_categories' ),
//        'update_item' => _x( 'Update Category', 'news_categories' ),
//        'add_new_item' => _x( 'Add New Category', 'news_categories' ),
//        'new_item_name' => _x( 'New Category Name', 'news_categories' ),
//        'separate_items_with_commas' => _x( 'Separate Categories types with commas', 'news_categories' ),
//        'add_or_remove_items' => _x( 'Add or remove Category', 'news_categories' ),
//        'choose_from_most_used' => _x( 'Choose from the most used Categories', 'news_categories' ),
//        'menu_name' => _x( 'Categories', 'news_categories' ),
//    );
//
//    $args = array(
//        'labels' => $labels,
//        'public' => true,
//        'show_in_nav_menus' => true,
//        'show_ui' => true,
//        'show_tagcloud' => true,
//        'hierarchical' => true,
//        'show_in_quick_edit' => true,
//        'show_admin_column' => true,
//        'rewrite' => array( 'slug' => 'news_categories' ),
//        'query_var' => true
//    );
//
//    register_taxonomy( 'news_categories', array('news'), $args );
//
//}

add_action( 'init', 'register_taxonomy_content_tags' );

function register_taxonomy_content_tags() {

    $labels = array(
        'name' => _x( 'Content Tags', 'content_tags' ),
        'singular_name' => _x( 'Content Tags', 'content_tags' ),
        'search_items' => _x( 'Search Content Tags', 'content_tags' ),
        'popular_items' => _x( 'Popular Content Tags', 'content_tags' ),
        'all_items' => _x( 'All Content Tags ', 'content_tags' ),
        'parent_item' => _x( 'Parent Content Tags', 'content_tags' ),
        'parent_item_colon' => _x( 'Parent Content Tags:', 'content_tags' ),
        'edit_item' => _x( 'Edit Content Tags', 'content_tags' ),
        'update_item' => _x( 'Update Content Tags', 'content_tags' ),
        'add_new_item' => _x( 'Add New Content Tags', 'content_tags' ),
        'new_item_name' => _x( 'New Content Tags Name', 'content_tags' ),
        'separate_items_with_commas' => _x( 'Separate Content Tags types with commas', 'content_tags' ),
        'add_or_remove_items' => _x( 'Add or remove Content Tags', 'content_tags' ),
        'choose_from_most_used' => _x( 'Choose from the most used Content Tags', 'content_tags' ),
        'menu_name' => _x( 'Content Tags', 'content_tags' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => true,
        'show_in_quick_edit' => true,
        'show_admin_column' => true,
        'rewrite' => array( 'slug' => 'content_tags' ),
        'query_var' => true
    );

    register_taxonomy( 'content_tags', array('news', 'event', 'resource', 'case_studies'), $args );

}


add_action( 'init', 'register_taxonomy_news_group' );

function register_taxonomy_news_group() {

    $labels = array(
        'name' => _x( 'News Group', 'news_group' ),
        'singular_name' => _x( 'News Group', 'news_group' ),
        'search_items' => _x( 'Search News Group', 'news_group' ),
        'popular_items' => _x( 'Popular News Group', 'news_group' ),
        'all_items' => _x( 'All News Group', 'news_group' ),
        'parent_item' => _x( 'Parent News Group', 'news_group' ),
        'parent_item_colon' => _x( 'Parent News Group:', 'news_group' ),
        'edit_item' => _x( 'Edit News Group', 'news_group' ),
        'update_item' => _x( 'Update News Group', 'news_group' ),
        'add_new_item' => _x( 'Add New News Group', 'news_group' ),
        'new_item_name' => _x( 'New News Group Name', 'news_group' ),
        'separate_items_with_commas' => _x( 'Separate News Group types with commas', 'news_group' ),
        'add_or_remove_items' => _x( 'Add or remove News Group', 'news_group' ),
        'choose_from_most_used' => _x( 'Choose from the most used News Group', 'news_group' ),
        'menu_name' => _x( 'News Group', 'news_group' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => true,
        'show_in_quick_edit' => true,
        'show_admin_column' => true,
        'rewrite' => array( 'slug' => 'news_group' ),
        'query_var' => true
    );

    register_taxonomy( 'news_group', array('news'), $args );

}


