<?php
// Connexion à la base de données
$host = "localhost";
$dbname = "youssefbd";
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = ""; // Remplacez par votre mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES utf8");
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer les articles de la base de données
$query = $pdo->query("SELECT * FROM articles ORDER BY date_creation DESC");
$articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles - Front Office</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1 align="center" style="font-size: 2.5em;">Articles</h1>
        <input type="text" placeholder="Rechercher un article..." id="search-bar">
    </header>

    <section id="articles-list" class="container my-5">
        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <?php if (!empty($article['image'])): ?>
                            <img class="card-img-top" src="uploads/<?= htmlspecialchars($article['image']); ?>" alt="<?= htmlspecialchars($article['titre']); ?>">
                        <?php else: ?>
                            <img class="card-img-top" src="placeholder.jpg" alt="Image par défaut">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($article['titre']); ?></h5>
                            <p class="card-text"><?= htmlspecialchars($article['contenu']); ?></p>
                            <p class="card-text">
                                <small class="text-muted">Publié le : <?= htmlspecialchars($article['date_creation']); ?></small>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Auteur : <?= htmlspecialchars($article['auteur']); ?></small>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
   
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
