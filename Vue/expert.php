<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rédaction d'Article - Espace Expert</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <!-- Titre de la page -->
    <h2 class="mb-4">Écrire un Nouvel Article</h2>

    <!-- Formulaire de rédaction d'article -->
    <div class="card">
        <div class="card-body">
            <form action="addArticle.php" method = "post"> 
                <!-- Champ pour le titre de l'article -->
                <div class="mb-3">
                    <label for="article-title" class="form-label">Titre de l'article</label>
                    <input type="text" class="form-control" name = "titre" id="article-title" placeholder="Entrez le titre de l'article">
                </div>

                     <!-- Zone de texte pour le contenu de l'article -->
                     <div class="mb-3">
                    <label for="article-content" class="form-label">Contenu de l'article</label>
                    <textarea class="form-control" name = "contenu" id="article-content" rows="10" placeholder="Rédigez ici le contenu de l'article"></textarea>
                </div>

                <!-- Champ pour télécharger une photo -->
                <div class="mb-3">
                    <label for="article-image" class="form-label">Image de l'article</label>
                    <input type="file" class="form-control" name = "image" id="article-image" accept="image/*">
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

                <!-- Bouton de publication -->
                <button type="submit" class="btn btn-primary">Publier</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

