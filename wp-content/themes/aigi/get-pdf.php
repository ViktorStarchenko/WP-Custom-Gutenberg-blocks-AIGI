<?php
/*
Template Name: PDF test
*/
include 'lib/dompdf/autoload.inc.php';
include 'template-parts/pdf-parts/pdf-page-content.php';
include 'template-parts/pdf-parts/pdf-event-info.php';
include 'template-parts/pdf-parts/pdf-news-info.php';

$query = $_GET['post_id'];
$post = get_post(intval($query));
$post_title = $post->post_title;


$html = '';
$html .= '<div class="pdf-body" style="color:#4d4d4d;">';
$html .=                       '<div class="pdf_header" style="width: 100%;padding:32px; color:#4d4d4d;">
                                    <div class="pdf_header__top" style="display: flex;flex-direction:row;align-items:center;justify-content:space-between;">
                                        <div class="pdf_header__top-date" style="display: inline-block">30/03/2022</div>
                                        <div class="pdf_header__top-brand" style="display: inline-block;margin-left:50px">Australian Indigenous Governance Institute</div>
                                    </div>

                                </div>';


$html .=           '<div class="pdf-container" style="max-width:800px;margin:auto">';
$html .=                                '<div class="pdf_header__bottom" style="margin: 48px 0">';
$html .=                                        '<img src="http://aigi.loc/wp-content/uploads/2022/01/logo-navy.svg" alt="log">';
$html .=                               ' </div>';

$html .=                                '<div class="">';
$html .=                                    '<div class="pdf_title" style="font-weight: 700;font-size: 32.38px;line-height: 110%;letter-spacing: 0.02em;color: #131032;">'.$post_title.'</div>';


    if (get_post_type($post) =='event') {
        $pdf_event_info = get_pdf_event_info($post);
        $html .= $pdf_event_info;
    }

    if (get_post_type($post) =='news') {
        $pdf_news_info = get_pdf_news_info($post);
        $html .= $pdf_news_info;
    }

    $content_items = get_field('content_items', $post);
    $custom_page_content = get_pdf_page_content($content_items);
    $html .= $custom_page_content;

    if (get_post_type($post) =='event') {
        $pdf_event_speakers = get_pdf_event_speakers($post);
        $html .= $pdf_event_speakers;

        $pdf_event_program = get_pdf_event_program($post);
        $html .= $pdf_event_program;

        $pdf_event_venue_details = get_pdf_event_venue_details($post);
        $html .= $pdf_event_venue_details;

        $pdf_event_faqs = get_pdf_event_faqs($post);
        $html .= $pdf_event_faqs;
    }




$html .= '</div>'; //END PDF CONTAINER


$html .= '<div class="footer" style="background-color: #131032; color:#fff">';
$html .= '<div class="footer-inner" style="max-width: 800px;margin: auto;    padding: 32px">';
$html .=      '<div class="footer_logo"><img src="http://aigi.loc/wp-content/uploads/2021/12/Frame-124.svg" alt="Indigenous Governance Toolkit" style ="width: 44px;height: 82px;"></div>';
$html .= '</div>';


$html .= '</div>'; //END PDF BODY

print_r($html);
//// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
//$dompdf = new Dompdf(array('enable_remote' => true));
//$dompdf->loadHtml($html);
//
//// (Optional) Setup the paper size and orientation
//$dompdf->setPaper('A4', 'landscape');
//
//// Render the HTML as PDF
//$dompdf->render();
//
//// Output the generated PDF to Browser
//$dompdf->stream($post_title . '.pdf');
