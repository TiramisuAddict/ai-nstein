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

// Vérification des données soumises
if (!empty($_POST['article_id']) && !empty($_POST['message']) && !empty($_POST['auteur'])) {
    $articleId = (int) $_POST['article_id'];
    $message = htmlspecialchars($_POST['message']);
    $auteur = htmlspecialchars($_POST['auteur']);

    // Insertion du commentaire
    $query = $pdo->prepare("INSERT INTO commentaires (article_id, message, auteur, date_publication) VALUES (:article_id, :message, :auteur, NOW())");
    $query->bindParam(':article_id', $articleId);
    $query->bindParam(':message', $message);
    $query->bindParam(':auteur', $auteur);

    if ($query->execute()) {
        header("Location: articleDetails.php?id=$articleId");
    } else {
        echo "Erreur lors de l'ajout du commentaire.";
    }
} else {
    echo "Veuillez remplir tous les champs.";
}


