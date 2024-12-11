<?php
// Connexion à la base de données
$host = "localhost";
$dbname = "youssefbd";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES utf8");
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer l'ID de l'article depuis l'URL
$articleId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($articleId === 0) {
    die("Article introuvable.");
}

// Récupérer les détails de l'article
$query = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
$query->bindParam(':id', $articleId, PDO::PARAM_INT);
$query->execute();
$article = $query->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    die("Article introuvable.");
}

// Récupérer les commentaires associés
$commentsQuery = $pdo->prepare("SELECT * FROM commentaires WHERE article_id = :article_id ORDER BY date_publication DESC");
$commentsQuery->bindParam(':article_id', $articleId, PDO::PARAM_INT);
$commentsQuery->execute();
$comments = $commentsQuery->fetchAll(PDO::FETCH_ASSOC);

// Récupérer la moyenne des notes de l'article
$ratingQuery = $pdo->prepare("SELECT AVG(note) AS moyenne FROM evaluations WHERE article_id = :article_id");
$ratingQuery->bindParam(':article_id', $articleId, PDO::PARAM_INT);
$ratingQuery->execute();
$rating = $ratingQuery->fetch(PDO::FETCH_ASSOC);
$moyenneNote = $rating['moyenne'] ? round($rating['moyenne'], 1) : "Pas encore noté.";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'article</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .star {
            cursor: pointer;
            font-size: 2rem;
            color: gray;
        }
        .star.selected {
            color: gold;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1><?= htmlspecialchars($article['titre']); ?></h1>
        <p><?= htmlspecialchars($article['contenu']); ?></p>
        <p><small class="text-muted">Publié le : <?= htmlspecialchars($article['date_creation']); ?></small></p>
        <p><small class="text-muted">Auteur : <?= htmlspecialchars($article['auteur']); ?></small></p>



        <form action="addRate.php" method="POST">
    <input type="hidden" name="article_id" value="<?= $article['id']; ?>">
    <input type="hidden" name="note" id="ratingValue">
    <label for="rating">Votre note :</label>
    <div class="star-rating" id="starRating">
        <span data-value="1">&#9734;</span>
        <span data-value="2">&#9734;</span>
        <span data-value="3">&#9734;</span>
        <span data-value="4">&#9734;</span>
        <span data-value="5">&#9734;</span>
    </div>
    <button type="submit" class="btn btn-primary btn-sm mt-2">Soumettre</button>
</form>

<head>
    <style>
        .star-rating {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            gap: 5px;
            cursor: pointer;
            font-size: 24px;
            color: gray;
        }

        .star-rating span {
            transition: color 0.2s;
        }

        .star-rating span.active,
        .star-rating span:hover,
        .star-rating span:hover ~ span {
            color: gold;
        }
    </style>
</head>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll("#starRating span");
    const ratingValue = document.getElementById("ratingValue");

    stars.forEach((star) => {
        star.addEventListener("click", () => {
            // Récupérer la note cliquée
            const value = star.getAttribute("data-value");
            ratingValue.value = value;

            // Appliquer la classe 'active' jusqu'à l'étoile sélectionnée
            stars.forEach((s) => s.classList.remove("active"));
            star.classList.add("active");
            let previousSibling = star.previousElementSibling;
            while (previousSibling) {
                previousSibling.classList.add("active");
                previousSibling = previousSibling.previousElementSibling;
            }
        });

        // Effet hover pour les étoiles
        star.addEventListener("mouseover", () => {
            stars.forEach((s) => s.classList.remove("hover"));
            star.classList.add("hover");
            let previousSibling = star.previousElementSibling;
            while (previousSibling) {
                previousSibling.classList.add("hover");
                previousSibling = previousSibling.previousElementSibling;
            }
        });

        // Retirer l'effet hover
        star.addEventListener("mouseout", () => {
            stars.forEach((s) => s.classList.remove("hover"));
        });
    });
});
</script>




        <h2>Commentaires</h2>
        <?php if (count($comments) > 0): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="mb-3">
                    <strong><?= htmlspecialchars($comment['auteur']); ?></strong> : <?= htmlspecialchars($comment['message']); ?>
                    <small class="text-muted">Publié le : <?= htmlspecialchars($comment['date_publication']); ?></small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun commentaire pour cet article.</p>
        <?php endif; ?>
    </div>

    <script>
        const stars = document.querySelectorAll('.star');
        const noteInput = document.getElementById('noteInput');
        
        stars.forEach(star => {
            star.addEventListener('mouseover', () => highlightStars(star.dataset.value));
            star.addEventListener('mouseout', resetStars);
            star.addEventListener('click', () => selectStars(star.dataset.value));
        });

        function highlightStars(value) {
            stars.forEach(star => {
                star.classList.toggle('selected', star.dataset.value <= value);
            });
        }

        function resetStars() {
            stars.forEach(star => {
                star.classList.toggle('selected', star.dataset.value <= noteInput.value);
            });
        }

        function selectStars(value) {
            noteInput.value = value;
            highlightStars(value);
        }
    </script>
</body>
</html>
