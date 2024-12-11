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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleId = (int) $_POST['article_id'];
    $note = (int) $_POST['note'];

    if ($note >= 1 && $note <= 5) {
        // Ajouter la note dans la base de données
        $stmt = $pdo->prepare("INSERT INTO evaluations (article_id, note) VALUES (:article_id, :note)");
        $stmt->execute([
            ':article_id' => $articleId,
            ':note' => $note,
        ]);

        header("Location: articleDetails.php?id=$articleId");
        exit;
    } else {
        die("Note invalide.");
    }
}
?>
