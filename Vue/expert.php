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
            <form id="articleForm" action="addArticle.php" method="post" enctype="multipart/form-data">
                <!-- Champ pour le titre de l'article -->
                <div class="mb-3">
                    <label for="article-title" class="form-label">Titre de l'article</label>
                    <input type="text" class="form-control" name="titre" id="article-title" placeholder="Entrez le titre de l'article">
                    <small class="text-danger d-none" id="title-error">Le titre est obligatoire et doit être tout en majuscules.</small>
                </div>

                <!-- Zone de texte pour le contenu de l'article -->
                <div class="mb-3">
                    <label for="article-content" class="form-label">Contenu de l'article</label>
                    <textarea class="form-control" name="contenu" id="article-content" rows="10" placeholder="Rédigez ici le contenu de l'article"></textarea>
                    <small class="text-danger d-none" id="content-error">Le contenu est obligatoire et doit contenir entre 50 et 5000 caractères.</small>
                </div>

                <!-- Champ pour télécharger une photo (image obligatoire) -->
                <div class="mb-3">
                    <label for="article-image" class="form-label">Image de l'article</label>
                    <input type="file" class="form-control" name="image" id="article-image" accept="image/*">
                    <small class="text-danger d-none" id="image-error">L'image est obligatoire, doit être au format PNG/JPEG et ne pas dépasser 2 Mo.</small>
                </div>

                <!-- Champ pour l'auteur de l'article -->
                <div class="mb-3">
                    <label for="article-author" class="form-label">Auteur</label>
                    <input type="text" class="form-control" name="auteur" id="article-author" placeholder="Entrez le nom de l'auteur">
                    <small class="text-danger d-none" id="author-error">Le nom de l'auteur doit contenir uniquement des lettres et espaces.</small>
                </div>

                <!-- Champ pour la date de création -->
                <div class="mb-3">
                    <label for="article-date" class="form-label">Date de création</label>
                    <input type="date" class="form-control" name="date_creation" id="article-date">
                    <small class="text-danger d-none" id="date-error">La date est invalide ou ne peut pas être dans le futur.</small>
                </div>

                <!-- Bouton de publication -->
                <button type="submit" class="btn btn-primary">Publier</button>
            </form>
        </div>
    </div>
</div>

<script>
    const form = document.getElementById('articleForm');

    form.addEventListener('submit', (e) => {
        let isValid = true;

        // Validation Titre
        const title = document.getElementById('article-title').value.trim();
        const titleError = document.getElementById('title-error');
        if (!title || title !== title.toUpperCase()) {
            isValid = false;
            titleError.classList.remove('d-none');
        } else {
            titleError.classList.add('d-none');
        }

        // Validation Contenu
        const content = document.getElementById('article-content').value.trim();
        const contentError = document.getElementById('content-error');
        if (!content || content.length < 50 || content.length > 5000) {
            isValid = false;
            contentError.classList.remove('d-none');
        } else {
            contentError.classList.add('d-none');
        }

        // Validation Image (obligatoire)
        const image = document.getElementById('article-image').files[0];
        const imageError = document.getElementById('image-error');
        if (!image) {
            isValid = false;
            imageError.classList.remove('d-none');
        } else {
            const validTypes = ['image/png', 'image/jpeg'];
            if (!validTypes.includes(image.type) || image.size > 2 * 1024 * 1024) {
                isValid = false;
                imageError.classList.remove('d-none');
            } else {
                imageError.classList.add('d-none');
            }
        }

        // Validation Auteur
        const author = document.getElementById('article-author').value.trim();
        const authorError = document.getElementById('author-error');
        if (!/^[A-Za-zÀ-ÖØ-öø-ÿ ]+$/.test(author)) {
            isValid = false;
            authorError.classList.remove('d-none');
        } else {
            authorError.classList.add('d-none');
        }

        // Validation Date
        const date = document.getElementById('article-date').value;
        const dateError = document.getElementById('date-error');
        const today = new Date().toISOString().split('T')[0];
        if (!date || date > today) {
            isValid = false;
            dateError.classList.remove('d-none');
        } else {
            dateError.classList.add('d-none');
        }

        if (!isValid) e.preventDefault(); // Empêche l'envoi du formulaire si des erreurs existent
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>



