<?php
require_once '../Controller/commentController.php';

// Vérifier si l'ID du commentaire est passé dans l'URL
if (!isset($_GET['id'])) {
    die("ID de commentaire manquant.");
}

// Récupérer les informations du commentaire
$commentaireController = new CommentaireController();
$commentaire = $commentaireController->getCommentById($_GET['id']);

// Vérifier si le commentaire existe
if (!$commentaire) {
    die("Commentaire introuvable.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Commentaire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
    <h2 class="mb-4">Modifier le Commentaire</h2>
    <form action="updateComment.php" method="POST">
        <!-- Champ caché pour l'ID -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($commentaire['id']); ?>">

        <!-- Message -->
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" name="message" class="form-control" rows="5" required><?= htmlspecialchars($commentaire['message']); ?></textarea>
        </div>

        <!-- Auteur -->
        <div class="mb-3">
            <label for="auteur" class="form-label">Auteur</label>
            <input type="text" id="auteur" name="auteur" class="form-control" value="<?= htmlspecialchars($commentaire['auteur']); ?>" required>
        </div>

        <!-- Boutons -->
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="back.php" class="btn btn-secondary">Annuler</a>
    </form>
</div>
</body>
</html>

