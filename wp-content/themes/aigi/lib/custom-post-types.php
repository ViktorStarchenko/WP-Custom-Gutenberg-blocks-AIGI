<?php


/* Custom Post Type For Toolkits */

add_action( 'init', 'register_cpt_toolkit' );

function register_cpt_toolkit() {

$labels = array(
'name' => _x( 'Toolkits', 'toolkit' ),
'singular_name' => _x( 'Toolkit', 'toolkit' ),
'add_new' => _x( 'Add New', 'toolkit' ),
'add_new_item' => _x( 'Add New Toolkit', 'toolkit' ),
'edit_item' => _x( 'Edit Toolkit', 'toolkit' ),
'new_item' => _x( 'New Toolkit', 'toolkit' ),
'view_item' => _x( 'View Toolkit', 'toolkit' ),
'search_items' => _x( 'Search Toolkits', 'toolkit' ),
'not_found' => _x( 'No toolkits found', 'toolkit' ),
'not_found_in_trash' => _x( 'No toolkits found in Trash', 'toolkit' ),
'parent_item_colon' => _x( 'Parent Toolkit:', 'toolkit' ),
'menu_name' => _x( 'Toolkits', 'toolkit' ),
);

$args = array(
'labels' => $labels,
'hierarchical' => false,

'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
'taxonomies' => array('topic', 'post_tag'),
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

register_post_type( 'toolkit', $args );
}

add_action( 'init', 'register_taxonomy_topic' );

function register_taxonomy_topic() {

$labels = array(
'name' => _x( 'Topic', 'topic' ),
'singular_name' => _x( 'Topic', 'topic' ),
'search_items' => _x( 'Search Topics', 'topic' ),
'popular_items' => _x( 'Popular Topics', 'topic' ),
'all_items' => _x( 'All Topics', 'topic' ),
'parent_item' => _x( 'Parent Topics', 'topic' ),
'parent_item_colon' => _x( 'Parent Topic:', 'topic' ),
'edit_item' => _x( 'Edit Topic', 'topic' ),
'update_item' => _x( 'Update Topic', 'topic' ),
'add_new_item' => _x( 'Add New Topic', 'topic' ),
'new_item_name' => _x( 'New Topic Name', 'topic' ),
'separate_items_with_commas' => _x( 'Separate topic types with commas', 'topic' ),
'add_or_remove_items' => _x( 'Add or remove topics', 'topic' ),
'choose_from_most_used' => _x( 'Choose from the most used topics', 'topic' ),
'menu_name' => _x( 'Topics', 'topic' ),
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
'rewrite' => array( 'slug' => 'topic' ),
'query_var' => true
);

register_taxonomy( 'topic', array('toolkit', 'resource', 'event', 'news', 'case_studies'), $args );

}

/* Custom Post Type For Resources */

add_action( 'init', 'register_cpt_resource' );

function register_cpt_resource() {

$labels = array(
'name' => _x( 'Resources', 'resource' ),
'singular_name' => _x( 'Resource', 'resource' ),
'add_new' => _x( 'Add New', 'resource' ),
'add_new_item' => _x( 'Add New Resource', 'resource' ),
'edit_item' => _x( 'Edit Resource', 'resource' ),
'new_item' => _x( 'New Resource', 'resource' ),
'view_item' => _x( 'View Resource', 'resource' ),
'search_items' => _x( 'Search Resources', 'resource' ),
'not_found' => _x( 'No Resources found', 'resource' ),
'not_found_in_trash' => _x( 'No Resources found in Trash', 'resource' ),
'parent_item_colon' => _x( 'Parent Resource:', 'resource' ),
'menu_name' => _x( 'Resources', 'resource' ),
);

$args = array(
'labels' => $labels,
'hierarchical' => false,

'supports' => array( 'title', 'custom-fields' ),
'taxonomies' => array('resource_type', 'post_tag'),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'menu_position' => 11,

'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post'
);

register_post_type( 'resource', $args );
}

add_action( 'init', 'register_taxonomy_resource_type' );

function register_taxonomy_resource_type() {

$labels = array(
'name' => _x( 'Resource Types', 'resource_type' ),
'singular_name' => _x( 'Resource Type', 'resource_type' ),
'search_items' => _x( 'Search Resource Types', 'resource_type' ),
'popular_items' => _x( 'Popular Resource Types', 'resource_type' ),
'all_items' => _x( 'All Resource Types', 'resource_type' ),
'parent_item' => _x( 'Parent Resource Types', 'resource_type' ),
'parent_item_colon' => _x( 'Parent Resource Types:', 'resource_type' ),
'edit_item' => _x( 'Edit Resource Types', 'resource_type' ),
'update_item' => _x( 'Update Resource Types', 'resource_type' ),
'add_new_item' => _x( 'Add New Resource Type', 'resource_type' ),
'new_item_name' => _x( 'New Resource Type', 'resource_type' ),
'separate_items_with_commas' => _x( 'Separate resource types with commas', 'resource_type' ),
'add_or_remove_items' => _x( 'Add or remove resource types', 'resource_type' ),
'choose_from_most_used' => _x( 'Choose from the most used resource types', 'resource_type' ),
'menu_name' => _x( 'Resource Types', 'resource_type' ),
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
'rewrite' => array( 'slug' => 'resource_type' ),
'query_var' => true
);

register_taxonomy( 'resource_type', array('resource'), $args );

}

add_action( 'init', 'register_taxonomy_resource_tag' );

function register_taxonomy_resource_tag() {

$labels = array(
'name' => _x( 'Resource Tags', 'resource_tag' ),
'singular_name' => _x( 'Resource Tag', 'resource_tag' ),
'search_items' => _x( 'Search Resource Tags', 'resource_tag' ),
'popular_items' => _x( 'Popular Resource Tags', 'resource_tag' ),
'all_items' => _x( 'All Resource Tags', 'resource_tag' ),
'parent_item' => _x( 'Parent Resource Tags', 'resource_tag' ),
'parent_item_colon' => _x( 'Parent Resource Tags:', 'resource_tag' ),
'edit_item' => _x( 'Edit Resource Tags', 'resource_tag' ),
'update_item' => _x( 'Update Resource Tags', 'resource_tag' ),
'add_new_item' => _x( 'Add New Resource Tag', 'resource_tag' ),
'new_item_name' => _x( 'New Resource Tag', 'resource_tag' ),
'separate_items_with_commas' => _x( 'Separate resource tags with commas', 'resource_tag' ),
'add_or_remove_items' => _x( 'Add or remove resource tags', 'resource_tag' ),
'choose_from_most_used' => _x( 'Choose from the most used resource tags', 'resource_tag' ),
'menu_name' => _x( 'Resource Tags', 'resource_tag' ),
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
'rewrite' => array( 'slug' => 'resource_tag' ),
'query_var' => true
);

register_taxonomy( 'resource_tag', array('resource'), $args );

}


//Topics for resources, news, events
//add_action( 'init', 'register_taxonomy_topics' );

//function register_taxonomy_topics() {
//
//$labels = array(
//'name' => _x( 'Topics', 'topics' ),
//'singular_name' => _x( 'Topic', 'topics' ),
//'search_items' => _x( 'Search Topics', 'topics' ),
//'popular_items' => _x( 'Popular Topics', 'topics' ),
//'all_items' => _x( 'All Topics', 'topics' ),
//'parent_item' => _x( 'Parent Topics', 'topics' ),
//'parent_item_colon' => _x( 'Parent Topics:', 'topics' ),
//'edit_item' => _x( 'Edit Topics', 'topics' ),
//'update_item' => _x( 'Update Topics', 'topics' ),
//'add_new_item' => _x( 'Add New Topic', 'topics' ),
//'new_item_name' => _x( 'New Topic', 'topics' ),
//'separate_items_with_commas' => _x( 'Separate Topics with commas', 'topics' ),
//'add_or_remove_items' => _x( 'Add or remove Topic', 'topics' ),
//'choose_from_most_used' => _x( 'Choose from the most used Topics', 'topics' ),
//'menu_name' => _x( 'Topics', 'topics' ),
//);
//
//$args = array(
//'labels' => $labels,
//'public' => true,
//'show_in_nav_menus' => true,
//'show_ui' => true,
//'show_tagcloud' => true,
//'hierarchical' => true,
//'show_in_quick_edit' => true,
//'show_admin_column' => true,
//'rewrite' => array( 'slug' => 'topics' ),
//'query_var' => true
//);
//
//register_taxonomy( 'topics', array('resource', 'event', 'news'), $args );
//
//}