<?php

//Dependencia MPDF
require_once('../public/pdf/vendor/autoload.php');

//CSS Plantilla
$css = file_get_contents('../public/pdf/example2/style.css');

//Plantila HTML
require_once('../public/pdf/example2/index.php');




$mpdf = new \Mpdf\Mpdf([

]);

$plantilla = getPlantilla();

$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);


$mpdf->Output("Reportededispositivos.pdf", "I");



