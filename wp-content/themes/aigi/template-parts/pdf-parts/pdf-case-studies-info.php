<?php

function get_pdf_case_studies_writer($post) {
    $authors = get_field('author',$post);

    $html= '';
    if ($authors) {
    $html.=    '<div class="post-details__item author" style="margin: 32px 0;">';
    $html.=        '<div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Written by</div>';
            foreach (get_field('author') as $author) {
    $html.=        '<div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">';
    $html.=             $author->post_title. ': ';
                    if (get_field ('author_title', $author->ID)) {
    $html.=                    '<span> '.get_field("author_title", $author->ID).' </span>';
                        }
    $html.=        '</div>';
                     }
    $html.=    '</div>';
    }

    return $html;

}

function get_pdf_case_studies_location($post) {
    $c_studies_locationtion = get_field('c_studies_locationtion', $post);

    $html = '';
        if ($c_studies_locationtion['address']) {
    $html .=            '<div class="post-details__item" style="margin: 32px 0;">';
    $html .=                '<div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;>Location</div>';
    $html .=                    '<div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d"> '.$c_studies_locationtion["address"]["address"].'</div>';
    $html .=                     '<a style="font-weight: 700;font-size: 14px;line-height: 160%;letter-spacing: 0.7px;text-decoration-line: underline;color: #0762A4;" href="https://maps.google.com/?q='.$c_studies_locationtion["address"]["lat"].','.$c_studies_locationtion["address"]["lng"].'" target="_blank" class="post-details__link">View on map</a>';
    $html .=            '</div>';
        }

    return $html;
}