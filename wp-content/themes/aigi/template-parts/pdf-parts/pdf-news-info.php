<?php

function get_pdf_news_info($post) {
    $authors = get_field('author', $post);
    $html = '';
    if ($authors) {
        $html.=    '<div class="post-details__item author" style="margin: 32px 0;">';
        $html.=    '<div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color: #131032;margin-bottom: 16px;">Written by</div>';

        foreach (get_field('author') as $author) {
            $html.=    '<div class="post-details__text" style="font-weight: normal;font-size: 16px;line-height: 24px;letter-spacing: 0.05em;color: #4d4d4d;">';
            $html.=         $author->post_title . ': ';
            if (get_field ("author_title", $author->ID)) {
                $html.=         '<span> '.get_field("author_title", $author->ID).'</span>';
            }
            $html.=    '</div>';
        }
        $html.=    '</div>';
    }
    return $html;
}
