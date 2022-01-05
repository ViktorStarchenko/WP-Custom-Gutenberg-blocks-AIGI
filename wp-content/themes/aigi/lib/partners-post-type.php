<?php


/* Custom Post Type For Toolkits */

add_action( 'init', 'register_cpt_partners' );

function register_cpt_partners() {

    $labels = array(
        'name' => _x( 'Partners', 'partners' ),
        'singular_name' => _x( 'Partners', 'partners' ),
        'add_new' => _x( 'Add New', 'partners' ),
        'add_new_item' => _x( 'Add New Partners', 'partners' ),
        'edit_item' => _x( 'Edit Partners', 'partners' ),
        'new_item' => _x( 'New Partners', 'partners' ),
        'view_item' => _x( 'View Partners', 'partners' ),
        'search_items' => _x( 'Search Partners', 'partners' ),
        'not_found' => _x( 'No Partners found', 'partners' ),
        'not_found_in_trash' => _x( 'No Partners found in Trash', 'partners' ),
        'parent_item_colon' => _x( 'Parent Partners:', 'partners' ),
        'menu_name' => _x( 'Partners', 'partners' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'excerpt' ),
        'taxonomies' => array('parnters_group'),
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

    register_post_type( 'partners', $args );
}

add_action( 'init', 'register_taxonomy_partners_group' );

function register_taxonomy_partners_group() {

    $labels = array(
        'name' => _x( 'Partners Group', 'partners_group' ),
        'singular_name' => _x( 'Partners Group', 'partners_group' ),
        'search_items' => _x( 'Search Partners Group', 'partners_group' ),
        'popular_items' => _x( 'Popular Partners Group', 'partners_group' ),
        'all_items' => _x( 'All Partners Group', 'partners_group' ),
        'parent_item' => _x( 'Parent Partners Group', 'partners_group' ),
        'parent_item_colon' => _x( 'Parent Partners Group:', 'partners_group' ),
        'edit_item' => _x( 'Edit Partners Group', 'partners_group' ),
        'update_item' => _x( 'Update Partners Group', 'partners_group' ),
        'add_new_item' => _x( 'Add New Partners Group', 'partners_group' ),
        'new_item_name' => _x( 'New Partners Group Name', 'partners_group' ),
        'separate_items_with_commas' => _x( 'Separate Partners Group types with commas', 'partners_group' ),
        'add_or_remove_items' => _x( 'Add or remove Partners Group', 'partners_group' ),
        'choose_from_most_used' => _x( 'Choose from the most used Partners Group', 'partners_group' ),
        'menu_name' => _x( 'Partners Group', 'partners_group' ),
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
        'rewrite' => array( 'slug' => 'partners_group' ),
        'query_var' => true
    );

    register_taxonomy( 'partners_group', array('partners'), $args );

}


