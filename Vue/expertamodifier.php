<?php
require_once '../Controller/articleController.php';
require_once '../Model/article.php';

// Récupérer l'article à modifier
$articleController = new articleController();
$article = $articleController->getArticleById($_GET["id"]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Article</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <h2 class="mb-4">Modifier l'Article</h2>

    <div class="card">
        <div class="card-body">
            <form action="updateArticle.php" method="POST" enctype="multipart/form-data">
                <!-- ID caché -->
                <input type="hidden" name="id" value="<?= htmlspecialchars($article['id']); ?>">

                <!-- Titre -->
                <div class="mb-3">
                    <label for="titre" class="form-label">Titre</label>
                    <input type="text" id="titre" name="titre" class="form-control" 
                           value="<?= htmlspecialchars($article['titre']); ?>" required>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <?php if (!empty($article['image'])): ?>
                        <p class="mt-2">Image actuelle : <strong><?= htmlspecialchars($article['image']); ?></strong></p>
                    <?php endif; ?>
                </div>

                <!-- Contenu -->
                <div class="mb-3">
                    <label for="contenu" class="form-label">Contenu</label>
                    <textarea id="contenu" name="contenu" class="form-control" rows="10" required><?= htmlspecialchars($article['contenu']); ?></textarea>
                </div>

                <!-- Auteur -->
                <div class="mb-3">
                    <label for="auteur" class="form-label">Auteur</label>
                    <input type="text" id="auteur" name="auteur" class="form-control" 
                           value="<?= htmlspecialchars($article['auteur']); ?>" required>
                </div>

                <!-- Date de création -->
                <div class="mb-3">
                    <label for="date_creation" class="form-label">Date de création</label>
                    <input type="date" id="date_creation" name="date_creation" class="form-control" 
                           value="<?= htmlspecialchars($article['date_creation']); ?>" required>
                </div>

                <!-- Boutons -->
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="supprimer_article.php?id=<?= htmlspecialchars($article['id']); ?>" class="btn btn-danger"
                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

