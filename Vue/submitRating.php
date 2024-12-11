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

// Récupérer les données soumises
$article_id = $_POST['article_id'];
$note = $_POST['note'];
$auteur = $_POST['auteur'];

// Insérer la note dans la base de données
$query = $pdo->prepare("INSERT INTO evaluations (article_id, auteur, note) VALUES (?, ?, ?)");
$query->execute([$article_id, $auteur, $note]);

// Rediriger l'utilisateur vers la page de l'article
header("Location: articleDetails.php?id=" . $article_id);
exit;
