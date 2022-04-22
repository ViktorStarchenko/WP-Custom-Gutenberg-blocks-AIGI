<?php
function get_pdf_page_content($data) {
    $content_items = $data;
    $html = '';
    if ($content_items)  {

        foreach ($content_items as $content_item) {
            //Subheads-->
            if ($content_item['item_type'] == 'Subheads') {
                $html .= '<div class="content-item subheads-block">';
                $html .= '<p class="sub-heading" style="font-style: normal;font-weight: 600;font-size: 22.78px;line-height: 36px;letter-spacing: 0.06em;color: #a74f39;">'. $content_item["subheads_block"]["content"]. '</p></div>';
            }
            if ($content_item['item_type'] == 'Text Block') {
                $html .= '<div class="content-item text-block" style="color:#4d4d4d;font-size:16px;">'. $content_item["text_block"]["content"] .'</div>';
            }
            //Heading
            if ($content_item['item_type'] == 'Heading') {
                $html .= '<div class="content-item text-block text_item heading" style="font-weight: bold;font-size: 30.35px;line-height: 36px;letter-spacing: 0.02em;color:#131032"> '. $content_item["heading_block"]["content"]. '</div>';
            }
            //Subheading
            if ($content_item['item_type'] == 'Subheading') {
                $html .= '<div class="content-item text-block text_item subheading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032">'. $content_item["subheading_block"]["content"] .'</div>';
            }
            //Small Text
            if ($content_item['item_type'] == 'Small Text') {
                $html .= '<div class="content-item text-block text_item small-text" style="font-size: 14px;line-height: 24px;letter-spacing: 0.03em;color:#4d4d4d">'.  $content_item["small_text_block"]["content"].'</div>' ;
            }



            // Video
            if ($content_item['item_type'] == 'Video') {
                $html .= '<div class="content-item video"  style="margin: 16px 0">';
                $html .=        '<div class="single-resource__container link" style="max-width: 800px;background: #FFFFFF;box-sizing: border-box;border-radius: 4px;position: relative;margin: 24px auto;padding-bottom: 24px;border: 2px solid #00af90;">';
                $html .=            '<div class="single-resource__bg"></div>';
                $html .=           '<div class="single-resource__inner" style="display: flex;flex-direction: column;align-items: center;margin: auto;position: relative;">';
                $html .=                '<div class="single-resource__header"  style="background-color:#00af90;width: 100%;padding: 20px 0;display: flex;flex-direction: row;align-items: center;justify-content: space-between;color:#fff;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;text-decoration: none;">';
                $html .=                    '<div class="single-resource__title"  style="margin-left: 20px;">';
                $html .=                        '<span> ' . $content_item["video_block"]["title"] . '</span>';
                $html .=                    '</div>';
                $html .=                    '<span class="single-resource__icon  link"></span>';
                $html .=               '</div>';
                $html .=               '<div class="single-resource__body"  style="padding:12px 20px;">';

                if ($content_item['video_block']['video_source_type'] == 'embed') {

                    if($content_item['video_block']['youtube_code']) {

                        $html .=            '<a  style="font-family: Proxima Nova;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;position: relative;word-break: break-all;" target="_blank" href="https://youtu.be/'.$content_item['video_block']['youtube_code'].'"> '.$content_item["video_block"]["title"].'</a>';

                    }

                } else if ($content_item['video_block']['video_source_type'] == 'upload') {
                    if ($content_item['video_block']['add_file']) {
                        $html .=            '<a  style="font-family: Proxima Nova;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;position: relative;word-break: break-all;" target="_blank" href="'.$content_item['video_block']['add_file']['url'].'"> '.$content_item["video_block"]["title"].'</a>';
                    }

                } else if ($content_item['video_block']['video_source_type'] == 'vimeo-link') {
                    $html .=            $content_item['video_block']['vimeo_link'];
                }
                $html .=                   '<div class="resource__text"  style="font-size: 14.4px;line-height: 24px;letter-spacing: 0.05em;color:#4d4d4d;padding: 20px 0;">';
                $html .=                        $content_item['video_block']['add_text'];
                $html .=                   '</div>';

                $html .=                '</div>';

                $html .=               '<div class="single-resource__footer"></div>';
                $html .=           '</div>';

                $html .=       '</div>';
                $html .= '</div>';

            }

            if ($content_item['item_type'] == 'Video') {
                //Image
                if ($content_item['image_block']['add_image']) {
                    $html .= '<div class="resource-image__wrap">';
                    $html .= '<img src="'.$content_item["image_block"]["add_image"]["url"].'" alt="'. $content_item["image_block"]["add_image"]["title"] .'" style="max-width: 800px;"/>'  ;
                    $html .= '</div>';
                }
                if($content_item['image_block']['add_text']) {
                    $html .= '<div class="resource__text">';
                    $html .= '<p style="font-size: 14px;line-height: 24px;letter-spacing: 0.03em;color:#4d4d4d">'.  $content_item['image_block']['add_text'] .'</p> ';
                    $html .= '</div>';
                }
            }

            //Blockquote
            if ($content_item['item_type'] == 'Blockquote') {
                $html .= '<div class="content-item text-block" style="font-weight: bold; color:#c45726">';
                $html .=     '<div class="blockquote-body">';
                $html .=         '<blockquote class="blockquote-text" style="font-style: italic;font-weight: bold;font-size:16px; color:#c45726">'. $content_item["blockquote"]["text"].'</blockquote>';
                $html .=         '<div class="blockquote-author">';
                $html .=             '<span>'. $content_item["blockquote"]["author"].'</span>';
                $html .=         '</div>';
                $html .=         '<div class="blockquote-author-position">';
                $html .=             '<span>'. $content_item["blockquote"]["author_position"] .'</span>';
                $html .=         '</div>';
                $html .=     '</div>';
                $html .= '</div>';
            }
            //Accordion
            if ($content_item['item_type'] == 'Accordion') {

                if ($content_item['accordion_block']) {
                    $html .= '<div class="content-item accordion" style="margin: 16px 0">';
                    $html .=   '<div class="accordion_wrapper">';
                    foreach ($content_item['accordion_block'] as $accordion_item) {
                        $html .=   '<div class="accordion_item" style="border-top: 1px solid #dfdfdf; padding-top: 12px;">';
                        if($accordion_item['content']) {
                            $html .= '<span class="title-h4 nav_list-title" style="font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;color: #231F20;">'. $accordion_item["title"].'</span>';
                        }

                        $html .=      '<div  class="accordion_panel" style="padding-top: 10px;">';
                        if($accordion_item['subtitle']) {
                            $html .= '<span class="accordion_subtitle" style="font-style: normal;font-weight: bold;font-size: 18px;line-height: 25px;letter-spacing: 0.02em;color:#0762a4; padding-left: 16px">'. $accordion_item["subtitle"].'</span>';
                        }

                        $html .=     '<div class="accordion_content" style="font-style: normal;font-weight: normal;font-size: 16px;line-height: 24px; letter-spacing: 0.05em; color:#4d4d4d; padding-left: 16px">';
                        if($accordion_item['content']) {
                            $html .= $accordion_item['content'];
                        }
                        $html .=      '</div>';
                        $html .=      '</div>';
                        $html .=  '</div>';
                    }
                    $html .=   '</div>';
                    $html .= '</div>';
                }
            }


            //File
            if ($content_item['item_type'] == 'File') {
                $html .= '<div class="content-item file" style="margin: 16px 0">';
                $html .=    '<div class="single-resource__container file" style="max-width: 800px;background: #FFFFFF;box-sizing: border-box;border-radius: 4px;position: relative;margin: 24px auto;padding-bottom: 24px;border: 2px solid #97a93e;">';
                $html .=        '<div class="single-resource__bg" style=""></div>';
                $html .=        '<div class="single-resource__inner"style="display: flex;flex-direction: column;align-items: center;margin: auto;position: relative;">';
                $html .=            '<div class="single-resource__header" style="background-color:#97a93e;width: 100%;padding: 20px 0;display: flex;flex-direction: row;align-items: center;justify-content: space-between;color:#fff;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;text-decoration: none;">';
                $html .=               '<div class="single-resource__title" style="margin-left: 20px;">';
                $html .=                    '<span>'. $content_item["file_block"]["file_title"] .'</span>';
                $html .=               '</div>';
                $html .=                '<span class="single-resource__icon file"></span>';
                $html .=            '</div>';
                $html .=            '<div class="single-resource__body" style="padding:12px 20px;">';

                $html .=                '<div class="resource__text" style="font-size: 14.4px;line-height: 24px;letter-spacing: 0.05em;color:#4d4d4d;padding: 20px 0;">';
                $html .=                     $content_item['file_block']['file_text'];
                $html .=                '</div>';

                if($content_item['file_block']['files']) {
                    foreach ($content_item['file_block']['files'] as $file) {
                        $html .=                        '<div class="resource-link file">';
                        $html .=                            '<a style="font-family: Proxima Nova;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;position: relative;word-break: break-all;" href="'. $file["file"]["url"].'" download>'. $file["file"]["title"].'</a>';
                        $html .=                        '</div>';
                    }
                }
                $html .=            '</div>';

                $html .=            '<div class="single-resource__footer"></div>';
                $html .=        '</div>';

                $html .=    '</div>';
                $html .= '</div>';
            }
            if ($content_item['item_type'] == 'Link') {
                $html .= '<div class="content-item link"  style="margin: 16px 0">';
                $html .=        '<div class="single-resource__container link" style="max-width: 800px;background: #FFFFFF;box-sizing: border-box;border-radius: 4px;position: relative;margin: 24px auto;padding-bottom: 24px;border: 2px solid #138dcd;">';
                $html .=            '<div class="single-resource__bg"></div>';
                $html .=           '<div class="single-resource__inner" style="display: flex;flex-direction: column;align-items: center;margin: auto;position: relative;">';
                $html .=                '<div class="single-resource__header"  style="background-color:#138dcd;width: 100%;padding: 20px 0;display: flex;flex-direction: row;align-items: center;justify-content: space-between;color:#fff;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;text-decoration: none;">';
                $html .=                    '<div class="single-resource__title"  style="margin-left: 20px;">';
                $html .=                        '<span> ' . $content_item["link_block"]["link_title"] . '</span>';
                $html .=                    '</div>';
                $html .=                    '<span class="single-resource__icon  link"></span>';
                $html .=               '</div>';
                $html .=               '<div class="single-resource__body"  style="padding:12px 20px;">';
                $html .=                   '<div class="resource__text"  style="font-size: 14.4px;line-height: 24px;letter-spacing: 0.05em;color:#4d4d4d;padding: 20px 0;">';
                $html .=                        $content_item['link_block']['link_text'];
                $html .=                   '</div>';
                if($content_item['link_block']['link']) {
                    $html .=                       '<div class="resource-link">';
                    $html .=                           '<a  style="font-family: Proxima Nova;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;position: relative;word-break: break-all;" target="_blank" href="'.$content_item["link_block"]["link"]["url"].'"> '.$content_item["link_block"]["link"]["title"].'</a>';
                    $html .=                        '</div>';
                };

                $html .=                '</div>';

                $html .=               '<div class="single-resource__footer"></div>';
                $html .=           '</div>';

                $html .=       '</div>';
                $html .= '</div>';
            }

            if ($content_item['item_type'] == 'Buttons Group') {
                $html .= '<div class="content-item buttons-block" style ="margin: 32px 0">';

                $button_group = $content_item['button_group'];

                if($button_group['buttons']) {
                    $html .=    '<div class="btn-group  ?>" style=" margin: -4px">';
                    foreach($button_group['buttons'] as $button) {
                        $html .=             '<a href=" '.$button['button']['url'].' " target="_blank" class="  btn-body " style="   min-width: 217px;font-family: Proxima Nova;font-style: normal;font-weight: 800;font-size: 15px;line-height: 14px;display: flex;align-items: center;text-align: center;display: inline-block;letter-spacing: 0.08em;text-transform: uppercase;text-decoration: none;border-radius: 5px;padding: 17px 20px;transition: all .3s;box-sizing: border-box;position: relative;cursor: pointer;white-space: nowrap; color: #fff; background-color: #0762a4; margin: 4px;">';
                        $html .=                    '<span class="btn-inner"> '. $button["button"]["title"] .'</span>';
                        $html .=                '</a>';
                    }
                    $html .=        '</div>';
                }
                $html .= '</div>';

            }

        }

    }

    return $html;
}

