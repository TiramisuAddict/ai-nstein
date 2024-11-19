<?php
class Config
{
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            $servername = "localhost"; // Serveur de la base de données
            $username = "root";        // Nom d'utilisateur MySQL
            $password = "";            // Aucun mot de passe
            $dbname = "sarrabases1";   // Nom de votre base de données

            try {
                // Création de la connexion PDO
                self::$pdo = new PDO(
                    "mysql:host=$servername;dbname=$dbname",
                    $username,
                    $password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activer les exceptions pour erreurs SQL
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Récupérer les résultats sous forme associative
                    ]
                );
                echo "Connected successfully";
            } catch (Exception $e) {
                // En cas d'erreur, afficher un message
                die('Erreur: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}

// Test de connexion
Config::getConnexion();
?>
