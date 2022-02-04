<?php

function gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count views";
}

function gt_set_post_view() {

    global $post;

    $key = 'post_views_count';
    $post_id = get_the_ID();
    $post_id = $post->ID;
    $visited_post = 'visited-post-' . $post_id;

    if ((isset($_SESSION[$visited_post]) && (time() - $_SESSION[$visited_post]['registered']) > (3600)) || !isset($_SESSION[$visited_post])) {
        unset($_SESSION[$visited_post]);
        $count = (int) get_post_meta( $post_id, $key, true );
        $count++;
        update_post_meta( $post_id, $key, $count );

        $_SESSION[$visited_post] = array('visited' => true, 'registered' => time());
    } else {

    }

}


function gt_posts_column_views( $columns ) {
$columns['post_views'] = 'Views';
return $columns;
}


function gt_posts_custom_column_views( $column ) {
if ( $column === 'post_views') {
echo gt_get_post_view();
}
}

add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );

