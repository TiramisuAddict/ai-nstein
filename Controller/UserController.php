<?php
require_once '../Config.php';
require_once '../Model/User.php';

class UserController {
    // Récupérer tous les utilisateurs
    public function getUser() {
        $conn = config::getConnexion(); // Connexion à la base de données

        $sql = "SELECT * FROM users";

        try {
            $query = $conn->prepare($sql); // Préparation de la requête
            $query->execute(); // Exécution de la requête
            return $query->fetchAll(); // Retourne tous les résultats
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    // Ajouter un utilisateur
    public function addUser($user) {
        $conn = config::getConnexion(); // Connexion à la base de données
        $sql = "INSERT INTO users (username, email, pwd, itbackground, age, sexe, educationlvl, experience, filename, filedata, role)
            VALUES (:username, :email, :pwd, :itbackground, :age, :sexe, :educationlvl, :experience, :filename, :filedata, :role)";

        try {
            $query = $conn->prepare($sql); // Préparation de la requête(optional)
            $query->execute([
                ':username' => $user->getUsername(),
                ':email' => $user->getEmail(),
                ':pwd' => $user->getPwd(),
                ':itbackground' => $user->getItbackground(),
                ':age' => $user->getAge(),
                ':sexe' => $user->getSexe(),
                ':educationlvl' => $user->getEducationlvl(),
                ':experience' => $user->getExperience(),
                ':filename' => $user->getFiledata(),
                ':filedata' => $user->getFiledata(),
                ':role' => $user->getRole()
            ]); // Exécution avec les valeurs du nouvel utilisateur
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    // Mettre à jour un utilisateur
    public function updateUser($id,$user){
        $conn = config::getConnexion();
        $sql="UPDATE user SET email=:email ,pwd=:pwd   WHERE id = :id";
        try{
            $query=$conn->prepare($sql);
            $query->execute([
                ':id'=>$id,
                ':email'=>$user['email'],
                ':pwd'=>$user['pwd']
            ]);
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
    }
}
    

    // Supprimer un utilisateur
   public function deleteUser($id){
        $conn = config::getConnexion();
        $sql="DELETE FROM user WHERE id = :id";
        try{
            $query=$conn->prepare($sql);
            $query->execute([':id'=>$id]);
        }
        catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
   }


    public function getUserById($id){
        $conn = config::getConnexion();
        $sql="select * from User where id=:id ";
        try{
            $query=$conn->prepare($sql);
            $query->execute( [':id'=>$id]);
            return $query->fetch();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // ============================================================================== //

    public function countMaleUsers() {
        $conn = config::getConnexion(); // Connexion à la base de données

        $sql = "SELECT count(*) FROM `users` WHERE sexe='Male'";

        try {
            $query = $conn->prepare($sql); // Préparation de la requête
            $query->execute(); // Exécution de la requête
            $result = $query->fetch(); // Récupération du résultat
            return $result['count(*)']; // Retourne le nombre d'utilisateurs masculins
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    public function countExperts() {
        $conn = config::getConnexion(); // Connexion à la base de données

        $sql = "SELECT count(*) FROM `users` WHERE role='Expert'";

        try {
            $query = $conn->prepare($sql); // Préparation de la requête
            $query->execute(); // Exécution de la requête
            $result = $query->fetch(); // Récupération du résultat
            return $result['count(*)']; // Retourne le nombre d'utilisateurs masculins
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }
}