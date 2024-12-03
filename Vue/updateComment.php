<?php
require_once '../Controller/commentController.php';

// Vérifier si la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $message = $_POST['message'];
    $auteur = $_POST['auteur'];

    // Définir la date de publication automatiquement
    $date_publication = date('Y-m-d');

    // Créer une instance du contrôleur
    $commentController = new CommentaireController();

    // Mettre à jour le commentaire
    try {
        $commentController->updateComment($id, $message, $auteur, $date_publication);
        header('Location: listeComment.php'); // Redirection après la mise à jour
        exit;
    } catch (Exception $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
    }
}
?>

