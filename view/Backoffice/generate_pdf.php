<?php
// Inclure la classe PDFGenerator
require_once('../../model/PDFGenerator.php'); // Chemin vers le fichier PDFGenerator.php

// Créer une instance de PDFGenerator et générer le PDF
$pdfGenerator = new PDFGenerator();
$pdfGenerator->generatePDF();
?>