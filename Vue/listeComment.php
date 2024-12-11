<?php
require_once '../Controller/commentController.php';  

// Créer une instance de CommentaireController
$commentController = new CommentaireController();

// Récupérer tous les commentaires
$commentaires = $commentController->getCommentaires();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des Commentaires</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Optional: Add custom styles -->
    <style>
        .navbar {
            background-color: ;
        }
        .navbar-brand img {
            max-width: 100px;
        }
        .table-container {
            margin-top: 50px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <a class="navbar-brand" href="index.html">
        <img src="images/logo.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Page title section -->
<section class="page-title bg-cover text-center text-white" style="background-image: url('images/backgrounds/page-title.jpg'); padding: 60px 0;">
    <h1>Liste des Commentaires</h1>
</section>

<!-- Main content -->
<div class="container table-container">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Article</th>
                <th>Message</th>
                <th>Auteur</th>
                <th>Date de Publication</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commentaires as $commentaire): ?>
                <tr>
                    <td><?php echo htmlspecialchars($commentaire['id']); ?></td>
                    <td><?php echo htmlspecialchars($commentaire['article_id']); ?></td>
                    <td><?php echo htmlspecialchars($commentaire['message']); ?></td>
                    <td><?php echo htmlspecialchars($commentaire['auteur']); ?></td>
                    <td><?php echo htmlspecialchars($commentaire['date_publication']); ?></td>
                    <td>
                        <a class="btn btn-danger" href="deleteComment.php?id=<?php echo $commentaire['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">Supprimer</a>
                        <a class="btn btn-primary" href="commentamodifier.php?id=<?php echo $commentaire['id']; ?>">Modifier</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



</body>
</html>
