<?php

function get_pdf_people_position($post) {
    $people_info_get_position = get_field('people_info',$post)['position'];

    $html = '';

    if ($people_info_get_position) {
    $html.=    '<div class="post-details__item" style="margin:8px 0">';
    $html.=        '<div class="post-details__text">'.$people_info_get_position.'</div>';
    $html.=    '</div>';
    }

    return $html;
}

function get_pdf_people_qualification($post) {
    $people_info_get_qualification = get_field('people_info',$post);

    $html = '';

    if ($people_info_get_qualification['qualification']) {
    $html .=    '<div class="post-details__item">';
    $html .=        '<div class="post-details__text">';
    $html .=            '<ul class="rounded-list">';
                    foreach (get_field('people_info')['qualification'] as $qualification) {
    $html .=                '<li style="margin: 8px 0;">'.$qualification["item"].'</li>';
                    }
    $html .=            '</ul>';

    $html .=        '</div>';

    $html .=    '</div>';
    }

    return $html;
}

function get_pdf_people_topics_of_expertis($post) {
    $people_info_get_topics_of_expertise = get_field('people_info',$post)['topics_of_expertise'];

    $html = '';

    if ($people_info_get_topics_of_expertise) {
    $html.=    '<div class="post-details__item border-top" style="margin: 16px;">';
    $html.=        '<div class="post-details__heading topics_of_expertise" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">topics of expertise:</div>';
    $html.=        '<div class="post-details__text">';
    $html.=            '<div class="post-tile__tags">';
                     foreach ($people_info_get_topics_of_expertise as $topics_of_expertise) {
    $html.=                 '<span class="content-tags__item small" style="background: #FFFFFF;border: 1px solid #e0e0e0;box-sizing: border-box;border-radius: 50px;padding: 4px 10px;display: inline-block;margin: 4px;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 11.85px;line-height: 19px;letter-spacing: 2px;text-transform: uppercase;color: #000000;text-decoration: none;">'.$topics_of_expertise["item"].'</span>';
                     }
    $html.=            '</div>';
    $html.=        '</div>';
    $html.=    '</div>';
    }

    return $html;
}