<?php
error_reporting(0); // Disable error reporting
ini_set('display_errors', 0); // Turn off error display

require_once(__DIR__ . '/TCPDF-main/tcpdf.php'); // Use absolute path

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sarra');
$pdf->SetTitle('Listes Quizs');
$pdf->SetSubject('Listes Quizs');
$pdf->SetKeywords('Quizs, PDF, Table');

// Set default header data
$pdf->SetHeaderData('', 0, 'Listes Quizs', '');

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set some language-dependent strings
$l = array();
$l['a_meta_charset'] = 'UTF-8';
$l['a_meta_dir'] = 'ltr';
$l['a_meta_language'] = 'en';
$l['w_page'] = 'page';
$pdf->setLanguageArray($l);

// Add a page
$pdf->AddPage();

// Fetch reservation data from database
include '../../../../../Controller/QuizC.php';
$QuizC = new QuizC();
$listQuizs = $QuizC->AfficherQuizs();  

// Define table structure
$html = '<table border="1">
                <thead>
                <tr>
                <th>ID</th>
                <th>TITRE</th>
                <th>DESCRIPTION</th>
                <th>DIFFICULTE</th>
                <th>DATE CREATION</th>
                </tr>
                </thead>
            <tbody>';

foreach ($listQuizs as $quiz) {
 
    // Construct the HTML table row (<tr>) with niveau details and the calculated average
    $html .= '<tr>
                <td>' . $quiz['idQuiz'] . '</td>
                <td>' . $quiz['titre'] . '</td>
                <td>' . $quiz['description'] . '</td>
                <td>' . $quiz['difficulte'] . '</td>
                <td>' . $quiz['dateCreation'] . '</td>
              </tr>';
}

$html .= '</tbody></table>';

// Output HTML content to PDF
$pdf->writeHTML($html, true, false, true, false, '');

ob_end_clean(); // Clean (erase) the output buffer

// Close and output PDF document
$pdf->Output('quiz_table.pdf', 'D'); // 'D' for download

// End output buffering and clean output buffer
?>
