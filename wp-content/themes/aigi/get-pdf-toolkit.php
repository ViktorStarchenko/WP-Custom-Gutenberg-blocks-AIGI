<?php
/*
Template Name: PDF test Toolkit
*/
include 'lib/dompdf/autoload.inc.php';
$query = $_GET['post_id'];
$post = get_post(intval($query));
setup_postdata( $post );




$thml = the_content();

wp_reset_postdata();

//// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;


// instantiate and use the dompdf class
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->setDefaultFont('Courier');
$options->setIsHtml5ParserEnabled(true);
$dompdf->setOptions($options);


$dompdf->loadHtml(the_content());

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
