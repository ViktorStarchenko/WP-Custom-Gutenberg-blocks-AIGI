<?php
//Also in the document custom-post-types.php Topic taxonomy is included


/* Custom Post Type For Events */

add_action( 'init', 'register_cpt_event' );

function register_cpt_event() {

    $labels = array(
        'name' => _x( 'Events', 'event' ),
        'singular_name' => _x( 'Event', 'event' ),
        'add_new' => _x( 'Add New', 'event' ),
        'add_new_item' => _x( 'Add New Event', 'event' ),
        'edit_item' => _x( 'Edit Event', 'event' ),
        'new_item' => _x( 'New Event', 'event' ),
        'view_item' => _x( 'View Event', 'event' ),
        'search_items' => _x( 'Search Events', 'event' ),
        'not_found' => _x( 'No events found', 'event' ),
        'not_found_in_trash' => _x( 'No events found in Trash', 'event' ),
        'parent_item_colon' => _x( 'Parent Event:', 'event' ),
        'menu_name' => _x( 'Events', 'event' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'excerpt' ),
        'taxonomies' => array('event_group'),
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

    register_post_type( 'event', $args );
}

add_action( 'init', 'register_taxonomy_event_group' );

function register_taxonomy_event_group() {

    $labels = array(
        'name' => _x( 'Event Group', 'event_group' ),
        'singular_name' => _x( 'Event Group', 'event_group' ),
        'search_items' => _x( 'Search Event Group', 'event_group' ),
        'popular_items' => _x( 'Popular Event Group', 'event_group' ),
        'all_items' => _x( 'All Event Group', 'event_group' ),
        'parent_item' => _x( 'Parent Event Group', 'event_group' ),
        'parent_item_colon' => _x( 'Parent Event Group:', 'event_group' ),
        'edit_item' => _x( 'Edit Event Group', 'event_group' ),
        'update_item' => _x( 'Update Event Group', 'event_group' ),
        'add_new_item' => _x( 'Add New Event Group', 'event_group' ),
        'new_item_name' => _x( 'New Event Group Name', 'event_group' ),
        'separate_items_with_commas' => _x( 'Separate Event Group types with commas', 'event_group' ),
        'add_or_remove_items' => _x( 'Add or remove Event Group', 'event_group' ),
        'choose_from_most_used' => _x( 'Choose from the most used Event Group', 'event_group' ),
        'menu_name' => _x( 'Event Group', 'event_group' ),
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
        'rewrite' => array( 'slug' => 'event_group' ),
        'query_var' => true
    );

    register_taxonomy( 'event_group', array('event'), $args );

}


add_action( 'init', 'register_taxonomy_event_type' );

function register_taxonomy_event_type() {

    $labels = array(
        'name' => _x( 'Event Type', 'event_type' ),
        'singular_name' => _x( 'Event Type', 'event_type' ),
        'search_items' => _x( 'Search Event Type', 'event_type' ),
        'popular_items' => _x( 'Popular Event Type', 'event_type' ),
        'all_items' => _x( 'All Event Type', 'event_type' ),
        'parent_item' => _x( 'Parent Event Type', 'event_type' ),
        'parent_item_colon' => _x( 'Parent Event Type:', 'event_type' ),
        'edit_item' => _x( 'Edit Event Type', 'event_type' ),
        'update_item' => _x( 'Update Event Type', 'event_type' ),
        'add_new_item' => _x( 'Add New Event Type', 'event_type' ),
        'new_item_name' => _x( 'New Event Type Name', 'event_type' ),
        'separate_items_with_commas' => _x( 'Separate Event Type types with commas', 'event_type' ),
        'add_or_remove_items' => _x( 'Add or remove Event Type', 'event_type' ),
        'choose_from_most_used' => _x( 'Choose from the most used Event Type', 'event_type' ),
        'menu_name' => _x( 'Event Type', 'event_type' ),
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
        'rewrite' => array( 'slug' => 'event_type' ),
        'query_var' => true
    );

    register_taxonomy( 'event_type', array('event'), $args );

}


