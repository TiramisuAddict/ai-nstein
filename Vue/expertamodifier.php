<?php
require_once '../Controller/articleController.php';
require_once '../Model/article.php'; // Inclure le contrôleur d'article

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
            <form action="add_article.php" method="POST" enctype="multipart/form-data">
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

                
                          <!-- Champ pour l'auteur de l'article -->
                          <div class="mb-3">
                    <label for="article-author" class="form-label">Auteur</label>
                    <input type="text" class="form-control" name="auteur" id="article-author" placeholder="Entrez le nom de l'auteur" required>
                </div>

                <!-- Champ pour la date de création -->
                <div class="mb-3">
                    <label for="article-date" class="form-label">Date de création</label>
                    <input type="date" class="form-control" name="date_creation" id="article-date" value="<?php echo date('Y-m-d'); ?>" required>
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
