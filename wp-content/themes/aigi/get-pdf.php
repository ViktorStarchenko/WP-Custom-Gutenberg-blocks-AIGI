<?php
/*
Template Name: PDF test
*/
include 'lib/dompdf/autoload.inc.php';
include 'template-parts/pdf-parts/pdf-page-content__string.php';
include 'template-parts/pdf-parts/pdf-event-info__string.php';
include 'template-parts/pdf-parts/pdf-news-info__string.php';
include 'template-parts/pdf-parts/pdf-case-studies-info.php__striing';
include 'template-parts/pdf-parts/pdf-people-info__String.php';
include 'template-parts/pdf-parts/pdf-resource-info__string.php';

$query = $_GET['post_id'];
$post = get_post(intval($query));
$post_title = $post->post_title;

$date = date("d/m/Y");

ob_start();
?>


<style>
    html {
        margin: 0;
    }
    body {
        padding: 70px 0 200px;
        font-family: Proxima Nova;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 24px;
        letter-spacing: 0.05em;
        color: #4d4d4d;

    }
    .pdf_fixed_header {
        position: fixed;
        top: 0;
        left: 0;
        padding: 26px 12px;
        width: 100%;
    }
    .pdf_header__top-brand {
        text-align: center;
        width: 100%;
    }
    .pdf_header__top-date {
        position: absolute;
        left: 32px;
        font-size: 14px;

    }
    .pdf_fixed_footer {
        position: fixed;
        bottom: 0;
        left: 0;
        padding: 24px 32px;
        width: 100%;
    }
    .pdf_fixed_footer__post_link {
        font-size: 14px;
        text-decoration: none;
        color: #4d4d4d;
        /*position: absolute;*/
        left: 32px;
        /*bottom: 10px;*/
    }

    .wrapper {
        max-width: 800px;
        margin: auto;
    }

    .pdf-footer {
        width: 100%;
        position: absolute;
        bottom: 60px;
        left: 0;
        background-color: #131032;
        color:#fff;
    }
    .footer_logo {
        max-width: 800px;
        margin: auto;
        padding: 40px 0;
    }

    th,
    td {
        font-size: 15px;
        line-height: 24px;
        letter-spacing: 0.03em;
        padding: 16px;
        box-shadow: 0px 0px 0px #e0e0e0, 0px -1px 0px #e0e0e0;
    }
    th p,
    td p {
        text-align: left;
    }
    th:nth-child(even),
    td:nth-child(even) {
        box-shadow: 0px 0px 0px #e0e0e0, -1px -1px 0px #e0e0e0;
    }

</style>

<html>
    <body>
    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script('
                $text = sprintf(_("%d/%d"),  $PAGE_NUM, $PAGE_COUNT);
                // Uncomment the following line if you use a Laravel-based i18n
                //$text = __("Page :pageNum/:pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
                $font = null;
                $size = 9;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default

                // Compute text width to center correctly
                $textWidth = $fontMetrics->getTextWidth($text, $font, $size);

                //$x = ($pdf->get_width() - $textWidth) / 2;
                $x = $pdf->get_width() - 60;
                $y = $pdf->get_height() - 24;

                $pdf->text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            '); // End of page_script
        }
    </script>
    <div class="pdf_fixed_header" style="display: flex;flex-direction:row;align-items:center;justify-content:space-between;">
        <div class="pdf_header__top-date" style="display: inline-block"><?php echo $date; ?></div>
        <div class="pdf_header__top-brand" style="display: inline-block;margin-left:50px">Australian Indigenous Governance Institute</div>
    </div>
    <div class="wrapper">
        <div class="pdf-header">

            <div class="pdf_header__bottom" style="margin: 48px 0 32px">
                <img src="<?php echo get_site_url();?>/wp-content/uploads/2022/01/logo-navy.svg" alt="log">
            </div>
            <div class="pdf_page_title" style="font-weight: 700;font-size: 32.38px;line-height: 110%;letter-spacing: 0.02em;color: #131032;"><?php echo $post_title ;?></div>
        </div>


        <?php
        if (get_post_type($post) =='resource') {
            get_template_part('template-parts/pdf-parts/pdf', 'resource-info', $post);
        }
        ?>

        <?php
        if (get_post_type($post) =='event') {
            get_template_part('template-parts/pdf-parts/pdf', 'event-info-price', $post);
        }
        ?>

        <?php
        if (get_post_type($post) =='news') {
            get_template_part('template-parts/pdf-parts/pdf', 'news-info', $post);
        }
        ?>

        <?php
        if (get_post_type($post) =='people') {
            get_template_part('template-parts/pdf-parts/pdf', 'people-info', $post);
        }
        ?>

        <?php
        if (get_post_type($post) =='case_studies') {
            get_template_part('template-parts/pdf-parts/pdf', 'case-studies-info', $post);
        }
        ?>

        <?php
        $content_items = get_field('content_items', $post);
        get_template_part('template-parts/pdf-parts/pdf', 'page-content', $content_items);
        ?>

        <?php
        if (get_post_type($post) =='event') {
            get_template_part('template-parts/pdf-parts/pdf', 'event-info-speakers', $post);
            get_template_part('template-parts/pdf-parts/pdf', 'event-info-program', $post);
            get_template_part('template-parts/pdf-parts/pdf', 'event-info-venue-details', $post);
            get_template_part('template-parts/pdf-parts/pdf', 'event-info-faq', $post);
        }
        ?>


        <div class="pdf-footer">
            <div class="footer_logo">
                <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2021/12/Frame-124.svg" alt="Indigenous Governance Toolkit" style ="width: 44px;height: 82px;">
            </div>
        </div>
    </div>

    <div class="pdf_fixed_footer">
        <a class="pdf_fixed_footer__post_link" href="<?php echo get_the_permalink($post->ID) ; ?>"><?php echo get_the_permalink($post->ID) ; ?></a>
    </div>
    </body>
</html>

<?php
$pdf_html = ob_get_clean();

//var_dump($pdf_html);

$html = '';
$html .= '<div class="pdf-body" style="color:#4d4d4d;">';
$html .=                       '<div class="pdf_header" style="width: 100%;padding:32px; color:#4d4d4d;">
                                    <div class="pdf_header__top" style="display: flex;flex-direction:row;align-items:center;justify-content:space-between;">
                                        <div class="pdf_header__top-date" style="display: inline-block">'.$date.'</div>
                                        <div class="pdf_header__top-brand" style="display: inline-block;margin-left:50px">Australian Indigenous Governance Institute</div>
                                    </div>

                                </div>';


$html .=           '<div class="pdf-container" style="max-width:800px;margin:auto">';
$html .=                                '<div class="pdf_header__bottom" style="margin: 48px 0">';
$html .=                                       '<img src="'.get_site_url().'/wp-content/uploads/2022/01/logo-navy.svg" alt="log">';
$html .=                               ' </div>';

$html .=                                '<div class="">';
$html .=                                    '<div class="pdf_title" style="font-weight: 700;font-size: 32.38px;line-height: 110%;letter-spacing: 0.02em;color: #131032;">'.$post_title.'</div>';




    if (get_post_type($post) =='resource') {
        $pdf_resource = get_pdf_resource ($post);
        $html .= $pdf_resource;
    }

    if (get_post_type($post) =='event') {
        $pdf_event_info = get_pdf_event_info($post);
        $html .= $pdf_event_info;
    }

    if (get_post_type($post) =='news') {
        $pdf_news_info = get_pdf_news_info($post);
        $html .= $pdf_news_info;
    }

    if (get_post_type($post) =='case_studies') {
        $pdf_case_studies_writer = get_pdf_case_studies_writer($post);
        $html .= $pdf_case_studies_writer;
        $html .= $pdf_case_studies_writer;

        $pdf_case_studies_location = get_pdf_case_studies_location($post);
        $html .= $pdf_case_studies_location;
    }


    if (get_post_type($post) =='people') {

        $pdf_people_position = get_pdf_people_position($post);
        $html .= $pdf_people_position;

        $pdf_people_qualification = get_pdf_people_qualification($post);
        $html .= $pdf_people_qualification;

        $pdf_people_topics_of_expertis = get_pdf_people_topics_of_expertis($post);
        $html .= $pdf_people_topics_of_expertis;

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
$html .=      '<div class="footer_logo"><img src='.get_site_url().'"/wp-content/uploads/2021/12/Frame-124.svg" alt="Indigenous Governance Toolkit" style ="width: 44px;height: 82px;"></div>';
$html .= '</div>';


$html .= '</div>'; //END PDF BODY

//print_r($html);


//// reference the Dompdf namespace
use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf(array('enable_remote' => true, 'isPhpEnabled' => true));
$dompdf->loadHtml($pdf_html);


// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

 //Output the generated PDF to Browser
//$dompdf->stream($post_title . '.pdf');
$dompdf->stream($post_title . '.pdf', array('Attachment' => 0));
