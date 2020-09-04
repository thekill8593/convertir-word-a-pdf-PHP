<?php

//directorio de las dependecias
require '../vendor/autoload.php';

//crear objeto de la case PHPWord
$phpWord = new \PhpOffice\PhpWord\PhpWord();

//Definimos constante del directorio del proyecto
define('PHPWORD_BASE_DIR', realpath(__DIR__));

//ruta donde se encuentra dompdf
$domPdfPath = realpath(PHPWORD_BASE_DIR . '/../vendor/dompdf/dompdf');

//le pasamos a la configuracion de phpword la libreria que queremos utilizar para convertir word a pdf
\PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
\PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

//cargar el archivo de word a convertir a pdf
$phpWord = \PhpOffice\PhpWord\IOFactory::load('prueba.docx');

//convertimos el archivo a pdf
$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
$xmlWriter->save('prueba.pdf');
