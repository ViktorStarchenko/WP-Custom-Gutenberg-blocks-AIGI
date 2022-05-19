<?php


if (!is_admin()) {

    $current_slug = $_SERVER['REQUEST_URI'];

    $current_slug = wp_make_link_relative($current_slug);
    $current_slug = stripslashes(str_replace('/', '', $current_slug));
    $post = get_page_by_path($current_slug);




    add_filter( 'facetwp_query_args', function( $query_args, $class ) {

        /*** Add event, news, resource, toolkit to query if the shortcode template is named "search_page_result" ***/
        if ( 'search_page_result' == $class->ajax_params['template'] ) {
            $query_args['post_type'] = ['event', 'news', 'resource', 'toolkit'];
        }
        /*** Add event, news, resource, toolkit, case_studies to query if the shortcode template is named "landing_page_result" ***/
        if ( 'landing_page_result' == $class->ajax_params['template'] ) {
            $query_args['post_type'] = ['event', 'news', 'resource', 'toolkit', 'case_studies'];
        }
        return $query_args;
    }, 10, 2 );



    if ('templates/global-search.php' == get_page_template_slug($post)) {

    }


    if ('templates/landing-page.php' == get_page_template_slug($post)) {

        /*** Set post type for landing page filter ***/
        add_filter( 'facetwp_preload_url_vars', function( $url_vars ) {

            $post = get_page_by_path(FWP()->helper->get_uri());

            $post_type = get_field('landing_page', $post->ID )['post_type'];
            $url_vars['post_type'] = [$post_type];

            if ( $post_type == 'event' ) {
                $event_group = get_field('landing_page', $post->ID)['event_term'];
                if (!empty($event_group)) {
                    $url_vars['events_group'] = [$event_group->slug];
                }

                if ( empty( $url_vars['landing_event_type'] ) ) {
//                    $url_vars['landing_event_type'] = [ 'past-events' ];
//                    $url_vars['landing_event_type'] = [ 'upcoming-events' ];
                }
            } else if ( $post_type == 'news' ) {
                $news_group = get_field('landing_page', $post->ID)['news_term'];
                if (!empty($news_group)) {
                    $url_vars['news_group'] = [$news_group->slug];
                }


            }
            return $url_vars;


        } );



    }

}



/*
Plugin Name: FacetWP Schedule Indexer
Plugin URI: https://facetwp.com/
Description: Runs indexer periodically by cron
Version: 1.0
Author: FacetWP, LLC
*/

add_action( 'fwp_scheduled_index', 'fwp_scheduled_index' );
function fwp_scheduled_index() {
    FWP()->indexer->index();
}

register_activation_hook( __FILE__, 'fwp_schedule_indexer_activation' );
function fwp_schedule_indexer_activation() {
    if ( ! wp_next_scheduled( 'fwp_scheduled_index' ) ) {
        wp_schedule_event( time(), 'hourly', 'fwp_scheduled_index' );
    }
}

//strtotime('16:20:00')
register_deactivation_hook( __FILE__, 'fwp_schedule_indexer_deactivation' );
function fwp_schedule_indexer_deactivation() {
    wp_clear_scheduled_hook( 'fwp_scheduled_index' );
}

//var_dump(current_time('H:i:s'));



add_filter( 'cron_schedules', 'wpshout_add_cron_interval' );
function wpshout_add_cron_interval( $schedules ) {
    $schedules['everyminute'] = array(
        'interval'  => 60, // time in seconds
        'display'   => 'Every Minute'
    );
    return $schedules;
}
wp_schedule_event( time(), 'everyminute', 'fwp_scheduled_index' );



