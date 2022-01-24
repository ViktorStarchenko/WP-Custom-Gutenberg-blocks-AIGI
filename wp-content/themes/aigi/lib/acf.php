<?php

function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyDKQ6x5al7NFc63XIBOw6VmnIGe1hjha64');
}
add_action('acf/init', 'my_acf_init');



/*** Set Event Type and Events Start Date Timestamp ***/
function setEventType() {
    $my_posts = get_posts( array(
        'numberposts' => -1,
        'post_type'   => 'event',
    ) );
    $date = time();
    foreach( $my_posts as $post ){
        setup_postdata( $post );
        $event_date = strtotime(get_field('events_details',$post->ID)['start_date']);
        if($event_date < $date) {

            wp_set_object_terms( $post->ID, 'past-events', 'event_type' );
        } else {
            wp_set_object_terms( $post->ID, 'upcoming-events', 'event_type' );
        }

        $group_key = 'events_details';
        $start_date = get_field('events_details',$post->ID)['start_date'];
        $end_date = get_field('events_details',$post->ID)['end_date'];
        $timezone = get_field('events_details',$post->ID)['timezone'];
        $start_date_timestamp = strtotime(get_field('events_details',$post->ID)['start_date']);

        $value = array(
            'start_date' => $start_date,
            'end_date' => $end_date,
            'timezone' => $timezone,
            'start_date_timestamp' => $start_date_timestamp,
        );

        update_field($group_key, $value, $post->ID);

    }

    wp_reset_postdata();
}

add_action('init', 'setEventType');