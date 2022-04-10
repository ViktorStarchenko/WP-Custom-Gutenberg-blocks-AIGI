<?php
/*
Template Name: PDF test
*/
include 'lib/dompdf/autoload.inc.php';
$query = $_GET['post_id'];
$post = get_post(intval($query));
$post_title = $post->post_title;



$early_bird = '';
$full_price = '';
$partner_price = '';
$date_rate = '';
$freepaid = 'no';
$ticket_link = '';
if (get_field('pricing', $post)['freepaid'] == 'paid') {

    if (get_field('pricing', $post)['early_bird']) {
        $early_bird = get_field('pricing', $post)['early_bird'];
    }
    if (get_field('pricing', $post)['full_price']) {
        $full_price = get_field('pricing', $post)['full_price'];
    }
    if (get_field('pricing', $post)['partner_price']) {
        $partner_price = get_field('pricing', $post)['partner_price'];
    }
    if (get_field('pricing', $post)['date_rate']) {
        $date_rate = get_field('pricing', $post)['date_rate'];
    }

}
if (get_field('pricing', $post)['freepaid'] == 'free') {
    $freepaid = get_field('pricing', $post)['freepaid'];
}
if (get_field('pricing', $post)['ticket_link']) {
    $ticket_link = get_field('pricing', $post)['ticket_link']['url'];
}
$thml = '';
$thml .=                       '<div class="pdf_header" style="width: 100%;padding:32px; color:#4d4d4d">
                                    <div class="pdf_header__top" style="display: flex;flex-direction:row;align-items:center;justify-content:space-between;">
                                        <div class="pdf_header__top-date" style="display: inline-block">30/03/2022</div>
                                        <div class="pdf_header__top-brand" style="display: inline-block;margin-left:50px">Australian Indigenous Governance Institute</div>
                                    </div>

                                </div>';


$thml .=           '<div class="pdf-container" style="max-width:800px;margin:auto"> 
                                <div class="pdf_header__bottom" style="margin: 48px 0">
                                        <img src="http://aigi.loc/wp-content/uploads/2022/01/logo-navy.svg" alt="log">
                                </div>

                                <div class="pdf_body">
                                    <div class="pdf_title" style="font-weight: 700;font-size: 32.38px;line-height: 110%;letter-spacing: 0.02em;color: #131032;">'.$post_title.'</div>
                                    
                                    <div class="post-tile__pricing-block" style="margin:32px auto;">
                                        <div class="post-tile__pricing-title" style="font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 10.53px;line-height: 12px;letter-spacing: 2px;text-transform: uppercase;color:#0762a4;margin-bottom: 16px;">
                                            Event Pricing
                                        </div>
                                        <div class="post-tile__pricing-list" style="display: flex;align-items: center;justify-content: flex-start;">
                                            <div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;padding-left:0;border-right: 1px solid #e0e0e0;">
                                                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Early Bird</span>
                                                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;">'.$early_bird.'</span>
                                            </div>
                                            <div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;border-right: 1px solid #e0e0e0;">
                                                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Full Price</span>
                                                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;">'.$full_price.'</span>
                                            </div>
                                            <div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;border-right: 1px solid #e0e0e0;">
                                                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Partner Price</span>
                                                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;">'.$partner_price.'</span>
                                            </div>
                                            <div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;border-right: 1px solid #e0e0e0;">
                                                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Date Rate</span>
                                                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;">'.$date_rate.'</span>
                                            </div>
                                            <div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;">
                                                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Free</span>
                                                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;">'.$freepaid.'</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-event__pricing-list">

                                        <div class="single-event__pricing-item">
                                            <a href="'.$ticket_link.'" target="_blank" class="btn-body  btn-h-secondary-blue  enlarge  after  Between " tabindex="0" style="min-width: 217px;font-family: Proxima Nova;font-style: normal;font-weight: 800;font-size: 15px;line-height: 14px;display: flex;align-items: center;text-align: center;display: inline-block;letter-spacing: 0.08em;text-transform: uppercase;text-decoration: none;border-radius: 5px;padding: 17px 20px;transition: all .3s;box-sizing: border-box;position: relative;cursor: pointer;white-space: nowrap;color: #FFFFFF;background-color:#138dcd;border: 1px solid #138dcd;"><span class="btn-inner">Get tickets</span></a>
                                        </div>
                                    </div>

                                </div>';



$content_items = get_field('content_items', $post);
if ($content_items)  {
    foreach ($content_items as $content_item) {
//Subheads-->
        if ($content_item['item_type'] == 'Subheads') {
            $thml .= '<div class="content-item subheads-block">';
            $thml .= '<p class="sub-heading" style="font-style: normal;font-weight: 600;font-size: 22.78px;line-height: 36px;letter-spacing: 0.06em;color: #a74f39;">'. $content_item["subheads_block"]["content"]. '</p></div>';
        }
        if ($content_item['item_type'] == 'Text Block') {
            $thml .= '<div class="content-item text-block" style="color:#4d4d4d;font-size:16px;">'. $content_item["text_block"]["content"] .'</div>';
        }

        if ($content_item['item_type'] == 'Heading') {
            $thml .= '<div class="content-item text-block text_item heading" style="font-weight: bold;font-size: 30.35px;line-height: 36px;letter-spacing: 0.02em;color:#131032"> '. $content_item["heading_block"]["content"]. '</div>';
        }

        if ($content_item['item_type'] == 'Subheading') {
            $thml .= '<div class="content-item text-block text_item subheading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032">'. $content_item["subheading_block"]["content"] .'</div>';
        }

        if ($content_item['item_type'] == 'Small Text') {
            $thml .= '<div class="content-item text-block text_item small-text" style="font-size: 14px;line-height: 24px;letter-spacing: 0.03em;color:#4d4d4d">'.  $content_item["small_text_block"]["content"].'</div>' ;
        }

        if ($content_item['image_block']['add_image']) {
            $thml .= '<div class="resource-image__wrap">';
            $thml .= '<img src="'.$content_item["image_block"]["add_image"]["url"].'" alt="'. $content_item["image_block"]["add_image"]["url"] .'"/>'  ;
            $thml .= '</div>';
        }
        if($content_item['image_block']['add_text']) {
            $thml .= '<div class="resource__text">';
            $thml .= '<p style="font-size: 14px;line-height: 24px;letter-spacing: 0.03em;color:#4d4d4d">'.  $content_item['image_block']['add_text'] .'</p> ';
            $thml .= '</div>';
        }

        if ($content_item['item_type'] == 'Blockquote') {
            $thml .= '<div class="content-item text-block" style="font-weight: bold; color:#c45726">';
            $thml .=     '<div class="blockquote-body">';
            $thml .=         '<blockquote class="blockquote-text" style="font-style: italic;font-weight: bold;font-size:16px; color:#c45726">'. $content_item["blockquote"]["text"].'</blockquote>';
            $thml .=         '<div class="blockquote-author">';
            $thml .=             '<span>'. $content_item["blockquote"]["author"].'</span>';
            $thml .=         '</div>';
            $thml .=         '<div class="blockquote-author-position">';
            $thml .=             '<span>'. $content_item["blockquote"]["author_position"] .'</span>';
            $thml .=         '</div>';
            $thml .=     '</div>';
            $thml .= '</div>';
        }

        if ($content_item['item_type'] == 'Accordion') {

            if ($content_item['accordion_block']) {
                $thml .= '<div class="content-item accordion" style="margin: 32px 0">';
                 $thml .=   '<div class="accordion_wrapper">';
                 foreach ($content_item['accordion_block'] as $accordion_item) {
                  $thml .=   '<div class="accordion_item">';
                  if($accordion_item['content']) {
                  $thml .= '<span class="title-h4 nav_list-title" style="font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;color: #231F20;border-bottom: 1px solid #dfdfdf;">'. $accordion_item["title"].'</span>';
                  }

                  $thml .=      '<div  class="accordion_panel">';
                  if($accordion_item['subtitle']) {
                  $thml .= '<span class="accordion_subtitle" style="font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;color:#0762a4;">'. $accordion_item["subtitle"].'</span>';
                  }

                   $thml .=     '<div class="accordion_content" style="font-style: normal;font-weight: normal;font-size: 16px;line-height: 24px; letter-spacing: 0.05em; color:#4d4d4d">';
                      if($accordion_item['content']) {
                      $thml .= $accordion_item['content'];
                      }
                   $thml .=      '</div>';
                  $thml .=      '</div>';
                  $thml .=  '</div>';
                 }
                 $thml .=   '</div>';
                $thml .= '</div>';
            }
        }


//        File
        if ($content_item['item_type'] == 'File') {
            $thml .= '<div class="content-item file" style="margin: 16px 0">';
            $thml .=    '<div class="single-resource__container file" style="max-width: 800px;background: #FFFFFF;box-sizing: border-box;border-radius: 4px;position: relative;margin: 24px auto;padding-bottom: 24px;border: 2px solid #97a93e;">';
            $thml .=        '<div class="single-resource__bg" style=""></div>';
            $thml .=        '<div class="single-resource__inner"style="display: flex;flex-direction: column;align-items: center;margin: auto;position: relative;">';
            $thml .=            '<div class="single-resource__header" style="background-color:#97a93e;width: 100%;padding: 20px 0;display: flex;flex-direction: row;align-items: center;justify-content: space-between;color:#fff;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;text-decoration: none;">';
            $thml .=               '<div class="single-resource__title" style="margin-left: 20px;">';
            $thml .=                    '<span>'. $content_item["file_block"]["file_title"] .'</span>';
            $thml .=               '</div>';
            $thml .=                '<span class="single-resource__icon file"></span>';
            $thml .=            '</div>';
            $thml .=            '<div class="single-resource__body" style="padding:12px 20px;">';

            $thml .=                '<div class="resource__text" style="font-size: 14.4px;line-height: 24px;letter-spacing: 0.05em;color:#4d4d4d;padding: 20px 0;">';
            $thml .=                     $content_item['file_block']['file_text'];
            $thml .=                '</div>';

            if($content_item['file_block']['files']) {
                foreach ($content_item['file_block']['files'] as $file) {
            $thml .=                        '<div class="resource-link file">';
            $thml .=                            '<a style="font-family: Proxima Nova;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;position: relative;word-break: break-all;" href="'. $file["file"]["url"].'" download>'. $file["file"]["title"].'</a>';
            $thml .=                        '</div>';
                }
            }
            $thml .=            '</div>';

            $thml .=            '<div class="single-resource__footer"></div>';
            $thml .=        '</div>';

            $thml .=    '</div>';
            $thml .= '</div>';
        }




    }

}
$thml .= '</div>'; //END PDF CONTAINER

//// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(array('enable_remote' => true));
$dompdf->loadHtml($thml);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($post_title . '.pdf');
