<?php


/* Custom Post Type For Toolkits */

add_action( 'init', 'register_cpt_people' );

function register_cpt_people() {

    $labels = array(
        'name' => _x( 'People', 'people' ),
        'singular_name' => _x( 'People', 'people' ),
        'add_new' => _x( 'Add New', 'people' ),
        'add_new_item' => _x( 'Add New People', 'people' ),
        'edit_item' => _x( 'Edit People', 'people' ),
        'new_item' => _x( 'New People', 'people' ),
        'view_item' => _x( 'View People', 'people' ),
        'search_items' => _x( 'Search People', 'people' ),
        'not_found' => _x( 'No People found', 'people' ),
        'not_found_in_trash' => _x( 'No People found in Trash', 'people' ),
        'parent_item_colon' => _x( 'Parent People:', 'people' ),
        'menu_name' => _x( 'People', 'people' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'excerpt' ),
        'taxonomies' => array('people_group'),
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

    register_post_type( 'people', $args );
}

add_action( 'init', 'register_taxonomy_people_group' );

function register_taxonomy_people_group() {

    $labels = array(
        'name' => _x( 'People Group', 'people_group' ),
        'singular_name' => _x( 'People Group', 'people_group' ),
        'search_items' => _x( 'Search People Group', 'people_group' ),
        'popular_items' => _x( 'Popular People Group', 'people_group' ),
        'all_items' => _x( 'All People Group', 'people_group' ),
        'parent_item' => _x( 'Parent People Group', 'people_group' ),
        'parent_item_colon' => _x( 'Parent People Group:', 'people_group' ),
        'edit_item' => _x( 'Edit People Group', 'people_group' ),
        'update_item' => _x( 'Update People Group', 'people_group' ),
        'add_new_item' => _x( 'Add New People Group', 'people_group' ),
        'new_item_name' => _x( 'New People Group Name', 'people_group' ),
        'separate_items_with_commas' => _x( 'Separate People Group types with commas', 'people_group' ),
        'add_or_remove_items' => _x( 'Add or remove People Group', 'people_group' ),
        'choose_from_most_used' => _x( 'Choose from the most used People Group', 'people_group' ),
        'menu_name' => _x( 'People Group', 'people_group' ),
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
        'rewrite' => array( 'slug' => 'people_group' ),
        'query_var' => true
    );

    register_taxonomy( 'people_group', array('people'), $args );

}


