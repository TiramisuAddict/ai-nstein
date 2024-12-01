<?php
require_once '../Controller/commentController.php';
require_once '../Model/commentaire.php'; // Inclure le modèle de commentaire

// Initialisation du contrôleur
$commentaireController = new CommentaireController(); // Attention au nom de la classe
$message = "";

// Gestion des requêtes POST pour ajouter un commentaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $article_id = $_POST['article_id'] ?? null;
    $auteur = trim($_POST['auteur'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validation des données
    if (!empty($article_id) && !empty($auteur) && !empty($message)) {
        // Créer une instance du modèle Commentaire
        $commentaire = new Commentaire($message, date("Y-m-d H:i:s"), $auteur, $article_id);

        // Ajouter le commentaire via le contrôleur
        try {
            $isAdded = $commentaireController->addComment($commentaire);

            if ($isAdded) {
                // Redirection en cas de succès
                header("Location: listeComment.php?id=" . $article_id . "&success=1");
                exit;
            } else {
                $error = "Erreur lors de l'ajout du commentaire.";
            }
        } catch (Exception $e) {
            $error = "Exception : " . $e->getMessage();
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }

    // En cas d'erreur, rediriger avec un message d'erreur
    if (isset($error)) {
        header("Location: listeComment.php?id=" . $article_id . "&error=" . urlencode($error));
        exit;
    }
}
?>

