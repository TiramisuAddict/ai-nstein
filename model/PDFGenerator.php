<?php

require_once('../../config.php');
require_once('../../controller/CoursC.php');
require_once('../../tcpdf/tcpdf.php'); // Assurez-vous que TCPDF est correctement inclus

class PDFGenerator
{
    public function generatePDF()
    {
        // Créer une instance de CoursE pour récupérer les cours
        $coursC = new CoursC();
        $list = $coursC->listCours(); // Récupère la liste des cours

        // Créer un nouveau PDF
        $pdf = new TCPDF();

        // Configurer les propriétés du document PDF
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Votre Nom');
        $pdf->SetTitle('Liste des Cours');
        $pdf->SetSubject('PDF des cours');
        $pdf->SetKeywords('TCPDF, PDF, cours, exemple');

        // Ajouter une page
        $pdf->AddPage();

        // Définir la police
        $pdf->SetFont('helvetica', '', 12);

        // Ajouter un titre
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'Liste des Cours', 0, 1, 'C');

        // Saut de ligne
        $pdf->Ln(10);

        // Créer un tableau pour afficher les cours
        $pdf->SetFillColor(224, 235, 255); // Couleur de fond des cellules
        $pdf->SetTextColor(0); // Couleur du texte
        $pdf->SetFont('', 'B'); // Police en gras pour l'en-tête

        // En-tête du tableau
        $pdf->Cell(30, 10, 'ID Prof', 1, 0, 'C', 1);
        $pdf->Cell(60, 10, 'Nom Matière', 1, 0, 'C', 1);
        $pdf->Cell(40, 10, 'Date PUB', 1, 0, 'C', 1);
        $pdf->Cell(30, 10, 'Type', 1, 0, 'C', 1);
        $pdf->Cell(30, 10, 'Image', 1, 1, 'C', 1);

        // Revenir à la police normale pour les données
        $pdf->SetFont('', '');

        // Afficher les données des cours
        foreach ($list as $cours) {
            $pdf->Cell(30, 20, htmlspecialchars($cours['id_user']), 1, 0, 'C');
            $pdf->Cell(60, 20, htmlspecialchars($cours['nom_matiere']), 1, 0, 'L');
            $pdf->Cell(40, 20, htmlspecialchars($cours['date_pub']), 1, 0, 'C');
            $pdf->Cell(30, 20, htmlspecialchars($cours['type']), 1, 0, 'C');

            // Ajouter l'image si elle existe
            if ($cours['image']) {
                $imagePath = '../uploads/' . htmlspecialchars($cours['image']); // Vérifiez que le chemin est correct
                if (file_exists($imagePath)) {
                    $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 20, 20); // Taille de l'image
                    $pdf->Cell(30, 20, '', 0, 0); // Pour aligner les colonnes
                } else {
                    $pdf->Cell(30, 20, 'Image non trouvée', 1, 0, 'C');
                }
            } else {
                $pdf->Cell(30, 20, 'Aucune image', 1, 0, 'C'); // Si pas d'image
            }

            // Saut de ligne après chaque ligne de données
            $pdf->Ln(20);
        }

        // Sortie du PDF
        $pdf->Output('liste_cours.pdf', 'D'); // Force le téléchargement
    }
}
?>