<?php
require_once '../../../Model/Reclamation.php';
require_once '../../../Controller/ReclamationController.php';

$ReclamationController = new ReclamationController();

// Vérification que les données POST sont présentes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer et valider les données en entrée
    $title = trim($_POST['title'] ?? '');
    $type = trim($_POST['type'] ?? '');
    $contenu = trim($_POST['contenu'] ?? '');

    // Vérifications des champs vides
    if (empty($title) || empty($type) || empty($contenu)) {
        echo "All fields are required!";
        exit;
    }

    // Protection contre les scripts (XSS)
    $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $type = htmlspecialchars($type, ENT_QUOTES, 'UTF-8');
    $contenu = htmlspecialchars($contenu, ENT_QUOTES, 'UTF-8');

    // Création de l'objet réclamation
    $reclamation = new Reclamation($title, $type, $contenu);

    try {
        // Ajout de la réclamation
        $ReclamationController->addReclamation($reclamation);

        // Redirection vers la liste des réclamations en cas de succès
        header('Location: ../../backOffice/Dependencies/rec_list.php');

        exit;
    } catch (Exception $e) {
        // Gestion des erreurs
        echo "Error adding reclamation: " . $e->getMessage();
        exit;
    }
} else {
    echo "Invalid request method!";
    exit;
}
?>