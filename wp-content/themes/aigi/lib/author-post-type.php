<?php


/* Custom Post Type For Toolkits */

add_action( 'init', 'register_cpt_author' );

function register_cpt_author() {

    $labels = array(
        'name' => _x( 'Author', 'author' ),
        'singular_name' => _x( 'Author', 'author' ),
        'add_new' => _x( 'Add New', 'author' ),
        'add_new_item' => _x( 'Add New Author', 'author' ),
        'edit_item' => _x( 'Edit Author', 'author' ),
        'new_item' => _x( 'New Author', 'author' ),
        'view_item' => _x( 'View Author', 'author' ),
        'search_items' => _x( 'Search Author', 'author' ),
        'not_found' => _x( 'No Author found', 'author' ),
        'not_found_in_trash' => _x( 'No Author found in Trash', 'author' ),
        'parent_item_colon' => _x( 'Parent Author:', 'author' ),
        'menu_name' => _x( 'Author', 'author' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'excerpt' ),
        'taxonomies' => array(''),
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

    register_post_type( 'author', $args );
}




