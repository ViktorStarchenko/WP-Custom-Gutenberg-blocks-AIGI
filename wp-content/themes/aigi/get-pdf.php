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
    /********************************* FONTS *****************************/
    @font-face {
        font-family: 'Proxima Nova';
        font-style: normal;
        font-stretch: normal;
        font-weight: normal;
        font-display: swap;
        src: url(<?php echo get_template_directory_uri(); ?>/assets/fonts/ProximaNova/ProximaNova-Regular.ttf);
    }

    @font-face {
        font-family: 'Proxima Nova';
        font-style: normal;
        font-stretch: normal;
        font-weight: 600;
        font-display: swap;
        src: url(<?php echo get_template_directory_uri(); ?>/assets/fonts/ProximaNova/ProximaNova-Semibold.ttf);
    }

    @font-face {
        font-family: 'Proxima Nova';
        font-style: normal;
        font-stretch: normal;
        font-weight: bold;
        font-display: swap;
        src: url(<?php echo get_template_directory_uri(); ?>/assets/fonts/ProximaNova/ProximaNova-Bold.ttf);
    }


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
    <?php if (get_field('pdf_settings', 'option')['header_logo_width']) {?>
    .pdf_header__logo {
        width: <?php echo get_field('pdf_settings', 'option')['header_logo_width']; ?>
    }
    <?php } ?>

    <?php if (get_field('pdf_settings', 'option')['footer_logo_width']) {?>
    .footer_logo_image {
        width: <?php echo get_field('pdf_settings', 'option')['footer_logo_width']; ?>
    }
    <?php } ?>

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
        /*background-color: #131032;*/
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

    .bg_color_navy {
        background-color: #131032;
    }
    .bg_color_yelow {
        background-color: #DC9C50;
    }
    .bg_color_orange {
        background-color: #C45726;
    }
    .bg_color_purple {
        background-color: #7B367C;
    }
    .bg_color_blue {
        background-color: #138DCD;
    }
    .bg_color_m-blue {
        background-color: #0762A4;
    }
    .bg_color_green {
        background-color: #97A93E;
    }
    .bg_color_primary_green {
        background-color: #8B8A33;
    }
    .bg_color_turquoise {
        background-color: #00AF90;
    }
    .bg_primary_grey {
        background-color: #F8F8F8;
    }
    .bg_color_white {
        background-color: #ffffff;
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
        <?php if (get_field('pdf_settings', 'option')['header_title']) {?>
        <div class="pdf_header__top-brand" style="display: inline-block;margin-left:50px"><?php echo get_field('pdf_settings', 'option')['header_title'] ; ?></div>
        <?php } ?>

    </div>
    <div class="wrapper">
        <div class="pdf-header">
            <div class="pdf_header__bottom" style="margin: 48px 0 32px">
            <?php if (get_field('pdf_settings', 'option')['header_logo']) {?>
                <img class="pdf_header__logo" src="<?php echo get_field('pdf_settings', 'option')['header_logo']['url']; ?>" alt="logo">
            <?php } ?>
            </div>
            <div class="pdf_page_title" style="font-weight: 700;font-size: 32.38px;line-height: 110%;letter-spacing: 0.02em;color: #131032;margin-bottom: 32px;"><?php echo $post_title ;?></div>
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


        <div class="pdf-footer <?php echo get_field('pdf_settings', 'option')['footer_bg_color']; ?>">
            <?php if (get_field('pdf_settings', 'option')['footer_logo']) {?>
                <div class="footer_logo">
                    <img class="footer_logo_image" src="<?php echo get_field('pdf_settings', 'option')['footer_logo']['url']; ?>" alt="footer logo" style ="width: 44px;height: 82px;">
                </div>
            <?php } ?>

        </div>
    </div>

    <?php if (get_field('pdf_settings', 'option')['enable_link_to_post_in_footer'] == true) { ?>
        <div class="pdf_fixed_footer">
            <a class="pdf_fixed_footer__post_link" href="<?php echo get_the_permalink($post->ID) ; ?>"><?php echo get_the_permalink($post->ID) ; ?></a>
        </div>
    <?php } ?>

    </body>
</html>

<?php
$pdf_html = ob_get_clean();

//var_dump($pdf_html);



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
