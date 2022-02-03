<?php
//Also in the document custom-post-types.php Topic taxonomy is included


/* Custom Post Type For News */

add_action( 'init', 'register_cpt_case_studies' );

function register_cpt_case_studies() {

    $labels = array(
        'name' => _x( 'Case Studies', 'case_studies' ),
        'singular_name' => _x( 'Case Studies', 'case_studies' ),
        'add_new' => _x( 'Add Case Studies', 'case_studies' ),
        'add_new_item' => _x( 'Add New Case Studies', 'case_studies' ),
        'edit_item' => _x( 'Edit Case Studies', 'case_studies' ),
        'new_item' => _x( 'New Case Studies', 'case_studies' ),
        'view_item' => _x( 'View Case Studies', 'case_studies' ),
        'search_items' => _x( 'Search Case Studies', 'case_studies' ),
        'not_found' => _x( 'No Case Studies found', 'case_studies' ),
        'not_found_in_trash' => _x( 'No Case Studies found in Trash', 'case_studies' ),
        'parent_item_colon' => _x( 'Parent Case Studies:', 'case_studies' ),
        'menu_name' => _x( 'Case Studies', 'case_studies' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'excerpt' ),
        'taxonomies' => array('news_categories', 'post_tag', 'content_tags'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 10,

        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'case_studies', $args );
}
