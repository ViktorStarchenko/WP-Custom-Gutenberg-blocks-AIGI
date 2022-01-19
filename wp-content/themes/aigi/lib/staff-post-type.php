<?php


/* Custom Post Type For Toolkits */

add_action( 'init', 'register_cpt_aigi_staff' );

function register_cpt_aigi_staff() {

    $labels = array(
        'name' => _x( 'Staff', 'aigi_staff' ),
        'singular_name' => _x( 'Staff', 'aigi_staff' ),
        'add_new' => _x( 'Add New', 'aigi_staff' ),
        'add_new_item' => _x( 'Add New Staff', 'aigi_staff' ),
        'edit_item' => _x( 'Edit Staff', 'aigi_staff' ),
        'new_item' => _x( 'New Staff', 'aigi_staff' ),
        'view_item' => _x( 'View Staff', 'aigi_staff' ),
        'search_items' => _x( 'Search Staff', 'aigi_staff' ),
        'not_found' => _x( 'No Staff found', 'aigi_staff' ),
        'not_found_in_trash' => _x( 'No Staff found in Trash', 'aigi_staff' ),
        'parent_item_colon' => _x( 'Parent Staff:', 'aigi_staff' ),
        'menu_name' => _x( 'Staff', 'aigi_staff' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'excerpt' ),
        'taxonomies' => array('aigi_staff_group'),
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

    register_post_type( 'aigi_staff', $args );
}

add_action( 'init', 'register_taxonomy_aigi_staff_group' );

function register_taxonomy_aigi_staff_group() {

    $labels = array(
        'name' => _x( 'Staff Group', 'aigi_staff_group' ),
        'singular_name' => _x( 'Staff Group', 'aigi_staff_group' ),
        'search_items' => _x( 'Search Staff Group', 'aigi_staff_group' ),
        'popular_items' => _x( 'Popular Staff Group', 'aigi_staff_group' ),
        'all_items' => _x( 'All Staff Group', 'aigi_staff_group' ),
        'parent_item' => _x( 'Parent Staff Group', 'aigi_staff_group' ),
        'parent_item_colon' => _x( 'Parent Staff Group:', 'aigi_staff_group' ),
        'edit_item' => _x( 'Edit Staff Group', 'aigi_staff_group' ),
        'update_item' => _x( 'Update Staff Group', 'aigi_staff_group' ),
        'add_new_item' => _x( 'Add New Staff Group', 'aigi_staff_group' ),
        'new_item_name' => _x( 'New Staff Group Name', 'aigi_staff_group' ),
        'separate_items_with_commas' => _x( 'Separate Staff Group types with commas', 'aigi_staff_group' ),
        'add_or_remove_items' => _x( 'Add or remove Staff Group', 'aigi_staff_group' ),
        'choose_from_most_used' => _x( 'Choose from the most used Staff Group', 'aigi_staff_group' ),
        'menu_name' => _x( 'Staff Group', 'aigi_staff_group' ),
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
        'rewrite' => array( 'slug' => 'aigi_staff_group' ),
        'query_var' => true
    );

    register_taxonomy( 'aigi_staff_group', array('aigi_staff'), $args );

}


