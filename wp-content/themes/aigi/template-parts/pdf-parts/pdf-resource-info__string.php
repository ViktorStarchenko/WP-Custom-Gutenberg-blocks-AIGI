<?php


function get_pdf_resource ($post) {

    $terms =  wp_get_post_terms( $post->ID, 'resource_type', array('fields' => 'names') );

    $type = '';
    $resource_bg_extended = '';
    $tag_title = '';
    $data_video_suf = '';
     if($terms[0] == 'Video') {
         $type = 'video';
         $resource_bg_extended = 'extended';
         $data_video_suf = random_int(0, 999);
     } else if ($terms[0] == 'Link') {
         $type = 'link';
     } else if ($terms[0] == 'Diagram') {
        if (get_field('diagram_type') == 'Table') {
            $type = 'table';
        } else if (get_field('diagram_type') == 'Rightaligned' || get_field('add_diagram')) {
            $type = 'image';
            $resource_bg_extended = 'extended';
        }
     } else if ($terms[0] == 'File') {
         $type = 'file';
     } else if ($terms[0] == 'Example') {
         $term_list = wp_get_post_terms($post->ID, 'resource_tag', array("fields" => "names"));
         $the_tags = implode(", ", $term_list);
         if($the_tags == 'Tips'):

             $tag_title = 'Tips: ';
         else:
             $tag_title = 'Example: ';
         endif;
         $type = 'tips';
     } else if ($terms[0] == 'Publication') {
         $type = 'publication';
         if (get_field('td_resource_image')) {
             $resource_bg_extended = 'extended';
         }
     }

    $html = '';

    $html.= '<div class="single-resource__container '.$type.' ' .$resource_bg_extended.'" style="font-size: 14.4px;line-height: 24px;letter-spacing: 0.05em;color: #4d4d4d;margin: 16px 0 32px;">';
    $html.=   '<div class="single-resource__bg '.$resource_bg_extended.'"></div>';
    $html.=     '<div class="single-resource__inner">';
    $html.=         '<div class="single-resource__header">';
    $html.=             '<div class="single-resource__title" style="margin: 16px 0">';
    $html.=                 '<a href="'.get_the_permalink($post->ID).'" style="font-style: normal;font-weight: 700;font-size: 10px;line-height: 16px;letter-spacing: 2px;text-transform: uppercase;color: #0762A4;text-decoration:none">'.$tag_title.''.$post->post_title.'</a>';
    $html.=        '</div>';
    $html.=        '<span class="single-resource__icon  '.$type.'"></span>';
    $html.=        '</div>';
    $html.=        '<div class="single-resource__body">';

                if(get_field('youtube_code')) {
    $html.=            '<div class="resource-video__wrap">';
    $html.=                        '<a href="https://www.youtube.com/watch?v='.get_field("youtube_code").'" style="font-style: normal;font-weight: 700;font-size: 10px;line-height: 16px;letter-spacing: 2px;text-transform: uppercase;color: #0762A4;text-decoration: none;">https://www.youtube.com/'.get_field("youtube_code").'</a>';
    $html.=            '</div>';
                }


                  if(get_field('add_file')  && $terms[0] == 'Video') {
    $html.=                '<div class="resource-video__wrap">';
    $html.=                    '<div class="online__video-wrap">';
    $html.=                        '<video  preload="metadata" class="paused online-video" data-watched="false" data-issetsrc="false" data-video="'.$post->ID.'-'.$data_video_suf.'" playsinline="" webkit-playinginline="" heght="auto" width="100%" src="'.get_field("add_file")["url"].'"></video>';
    $html.=                        '<div class="video-button-wrap">';
    $html.=                            '<button id="online__video-button" class="play online__video-button fist-lesson-button" data-video="'.$post->ID.'-'.$data_video_suf.'">';
    $html.=                                '<span class="play-button-body"></span>';
    $html.=                            '</button>';
    $html.=                        '</div>';
    $html.=                        '<div class="video-pause-wrap" data-video="'.$post->ID.'-'.$data_video_suf.'">';
    $html.=                            '<button id="online__video-pause-button" class="pause"></button></div>';
    $html.=                    '</div>';
    $html.=                '</div>';
                }

                if (get_field('add_diagram')) {
    $html.=                '<div class="resource-image__wrap" style="padding:16px;margin:16px 0;">';
    $html.=                        '<img src="'.get_field("add_diagram").'" alt="'.$post->post_title.'" style="width:100%;max-width:500px;height:100%;object-fit:contain">';
    $html.=                '</div>';
                }

                if (get_field('td_resource_image')) {

    $html.=                '<div class="resource-image__wrap" style="padding:16px;margin:16px 0;">';
    $html.=                        '<img src="'.get_field("td_resource_image")["url"].'" alt="'.get_field("td_resource_image")["title"].'" style="width:100%;max-width:500px;height:100%;object-fit:contain">';
    $html.=                '</div>';
                }

                if(get_field('add_text') && $terms[0] == 'Example') {
    $html.=                '<div class="resource__text" style="font-size: 14.4px;line-height: 24px;letter-spacing: 0.05em;color: #4d4d4d;">';
    $html.=                    get_field('add_text');
    $html.=                '</div>';
                } else if(get_field('add_text') && !($terms[0] == 'Example')) {
    $html.=                '<div class="resource__text" style="font-size: 14.4px;line-height: 24px;letter-spacing: 0.05em;color: #4d4d4d;">';
    $html.=                    '<p>'.get_field('add_text').'</p>';
    $html.=                 '</div>';
                }

                if(get_field('td_resource_content')) {
    $html.=                '<div class="resource__text" style="font-size: 14.4px;line-height: 24px;letter-spacing: 0.05em;color: #4d4d4d;">';
    $html.=                    get_field('td_resource_content');
    $html.=                '</div>';
                }

                if(get_field('add_link')) {
    $html.=                '<div class="resource-link">';
    $html.=                    '<a target="_blank" href="'.get_field("add_link").'">'.parse_url(get_field("add_link"), PHP_URL_HOST).'</a>';
    $html.=                '</div>';
                }


                if(get_field('td_resource_download')['file']) {
    $html.=                '<div class="resource-link file">';
    $html.=                    '<a target="_blank" href="'.get_field("td_resource_download")["file"].'">'.get_field("td_resource_download")["link_text"].'</a>';
    $html.=                '</div>';
                }

                if(get_field('add_file') && !($terms[0] == 'Video')) {
    $html.=                '<div class="resource-link file">';
    $html.=                    '<a href="'.get_field("add_file").'" download>'.aigi_get_filename_from_url( get_field('add_file') ).'</a>';
    $html.=                '</div>';
                }

                if(get_field('how_to_use')) {
    $html.=         '<div class="resource__text" style="font-size: 14.4px;line-height: 24px;letter-spacing: 0.05em;color: #4d4d4d;">';
    $html.=               '<p><strong>How To Use:</strong><br/>'.get_field("how_to_use").'<p>';
    $html.=          '</div>';
                }


    $html.=        '</div>';

    $html.=        '<div class="single-resource__footer"></div>';
    $html.=        '</div>';

    $html.=        '</div>';

    return $html;
}