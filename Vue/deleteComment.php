<?php
require_once '../Controller/commentController.php'; // Inclure le contrôleur des commentaires

// Vérifier si l'ID du commentaire est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Récupérer l'ID du commentaire à supprimer

    // Créer une instance du contrôleur
    $commentaireController = new commentaireController();

    try {
        // Appeler la méthode deleteComment pour supprimer le commentaire
        $commentaireController->deleteComment($id);

        // Rediriger vers la page de la liste des commentaires ou un autre endroit approprié
        header('Location: listeComment.php?success=comment_deleted');
        exit();
    } catch (Exception $e) {
        // Gérer les erreurs de suppression
        echo "Erreur: " . $e->getMessage();
    }
} else {
    // Si l'ID n'est pas passé, rediriger vers une page par défaut (par exemple, liste des commentaires)
    header('Location: listeComment.php?error=missing_id');
    exit();
}
?>
