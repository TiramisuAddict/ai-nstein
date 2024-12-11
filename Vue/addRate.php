<?php
$host = "localhost";
$dbname = "youssefbd";
$username = "root";
$password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleId = (int)$_POST['article_id'];
    $note = (int)$_POST['note'];

    if ($note >= 1 && $note <= 5) {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET NAMES utf8");

            // Ajouter la note à la base de données
            $query = $pdo->prepare("INSERT INTO ratings (article_id, note) VALUES (:article_id, :note)");
            $query->bindParam(':article_id', $articleId, PDO::PARAM_INT);
            $query->bindParam(':note', $note, PDO::PARAM_INT);
            $query->execute();

            // Rediriger l'utilisateur après soumission
            header("Location: articleDetails.php?id=" . $articleId);
            exit;
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
}
?>
