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

                $url_vars['events_group'] = [$event_group->slug];

                if ( empty( $url_vars['landing_event_type'] ) ) {
//                    $url_vars['landing_event_type'] = [ 'past-events' ];
//                    $url_vars['landing_event_type'] = [ 'upcoming-events' ];
                }
            }
            return $url_vars;


        } );



    }

}





