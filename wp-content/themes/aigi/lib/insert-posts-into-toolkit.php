<?php

/* Short code to pull resources into toolkit posts */

function show_resource($atts){
    extract( shortcode_atts( array(
        'slug' => '',
    ), $atts ) );

    $query = new WP_Query(
        array( "post_type" => "resource", // not "post-type" !
            "name" => $slug
        ) );
    while ($query->have_posts()) : $query->the_post();

        if(has_term( 'link', 'resource_type')) {

            // get standard post data
            $postid = get_the_ID();
            $term_list = wp_get_post_terms($postid, 'resource_tag', array("fields" => "names"));
            $the_tags = implode(", ", $term_list);

            ob_start();
            get_template_part('template-parts/resource-templates/resource', 'template');
            $return = ob_get_contents();
            ob_get_clean();
            return $return;

        }
        elseif(has_term( 'video', 'resource_type')) {
            $type = 'video';
            // get standard post data
            $date = get_the_date();
            $postid = get_the_ID();
            $blog_info = get_bloginfo( 'template_url' );
            $add_video = get_field('add_video');

            $term_list = wp_get_post_terms($postid, 'resource_tag', array("fields" => "names"));
            $the_tags = implode(", ", $term_list);
            if(!empty($the_tags)) {
                $tags = '<p class="resource-tags">' . $the_tags . '</p>';
            }            ob_start();
            get_template_part('template-parts/resource-templates/resource', 'template');
            $return = ob_get_contents();
            ob_get_clean();
            return $return;

        }
        elseif(has_term( 'file', 'resource_type')) {
            // get standard post data
            $title = get_the_title();
            $date = get_the_date();
            $blog_info = get_bloginfo( 'template_url' );
            $add_file = get_field('add_file');

            $postid = get_the_ID();
            $term_list = wp_get_post_terms($postid, 'resource_tag', array("fields" => "names"));
            $the_tags = implode(", ", $term_list);
            if(!empty($the_tags)) {
                $tags = '<p class="resource-tags">' . $the_tags . '</p>';
            }

            ob_start();
            get_template_part('template-parts/resource-templates/resource', 'template');
            $return = ob_get_contents();
            ob_get_clean();
            return $return;
        }

        elseif(has_term( 'diagram', 'resource_type')) {

            // get standard post data
            $title = get_the_title();
            $date = get_the_date();
            $blog_info = get_bloginfo( 'template_url' );

            $postid = get_the_ID();
            $term_list = wp_get_post_terms($postid, 'resource_tag', array("fields" => "names"));
            $the_tags = implode(", ", $term_list);
            if(!empty($the_tags)) {
                $tags = '<p class="resource-tags">' . $the_tags . '</p>';
            }

            ob_start();
            get_template_part('template-parts/resource-templates/resource', 'template');
            $return = ob_get_contents();
            ob_get_clean();
            return $return;

        } elseif(has_term( 'example', 'resource_type')) {

            // get standard post data
            $title = get_the_title();
            $date = get_the_date();
            $blog_info = get_bloginfo( 'template_url' );

            $postid = get_the_ID();
            $term_list = wp_get_post_terms($postid, 'resource_tag', array("fields" => "names"));
            $the_tags = implode(", ", $term_list);
            if(!empty($the_tags)) {
                $tags = '<p class="resource-tags">' . $the_tags . '</p>';
            }
            ob_start();
            get_template_part('template-parts/resource-templates/resource', 'template');
            $return = ob_get_contents();
            ob_get_clean();
            return $return;

            if($the_tags == 'Tips'):

                $fullTitle = 'Tips: ' . $title;
            else:
                $fullTitle = 'Example: ' . $title;
            endif;

        }

    endwhile;

}
add_shortcode('show_resource', 'show_resource');