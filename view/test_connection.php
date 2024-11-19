<?php
$host = 'localhost'; // Serveur MySQL
$user = 'root';      // Utilisateur par défaut dans XAMPP
$password = '';      // Mot de passe vide par défaut dans XAMPP
$dbname = 'sarrabases1'; // Assurez-vous que c'est bien le nom de votre base

// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

echo "Connexion réussie à la base de données '$dbname'";
?>
<?php
include 'db_connection.php'; // Assurez-vous que ce chemin est correct
?>