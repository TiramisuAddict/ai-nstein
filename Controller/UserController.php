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
        $sql = "INSERT INTO users (username, email, pwd, itbackground, age, sexe, educationlvl, experience, filename, filedata, role, cdate)
            VALUES (:username, :email, :pwd, :itbackground, :age, :sexe, :educationlvl, :experience, :filename, :filedata, :role, :cdate)";

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
                ':role' => $user->getRole(),
                ':cdate' => date('Y-m-d')
            ]); // Exécution avec les valeurs du nouvel utilisateur
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    // Mettre à jour un utilisateur
    public function updateUser($id,$user){
        $conn = config::getConnexion();
        $sql = "UPDATE users SET username = :username, email = :email, itbackground = :itbackground, age = :age,
        sexe = :sexe, educationlvl = :educationlvl WHERE id = :id";

        try{
            $query=$conn->prepare($sql);
            $query->execute([
                ':id'=>$id,
                ':username' => $user['username'],
                ':email' => $user['email'],
                ':itbackground' => $user["itbackground"],
                ':age' => $user["age"],
                ':sexe' => $user["sexe"],
                ':educationlvl' => $user["educationlvl"]
            ]);
         } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    public function updateExpert($id,$user){
        $conn = config::getConnexion();
        $sql = "UPDATE users SET username = :username, email = :email, age = :age, sexe = :sexe, experience = :experience WHERE id = :id";

        try{
            $query=$conn->prepare($sql);
            $query->execute([
                ':id'=>$id,
                ':username' => $user['username'],
                ':email' => $user['email'],
                ':age' => $user["age"],
                ':sexe' => $user["sexe"],
                ':experience' => $user["experience"]
            ]);
         } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }
    

    // Supprimer un utilisateur
   public function deleteUser($id){
        $conn = config::getConnexion();
        $sql="DELETE FROM users WHERE id = :id";
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
        $sql="select * from Users where id=:id ";
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

    public function loginCheck($email, $pwd) {
        $conn = config::getConnexion();

        $sql = "SELECT * FROM users WHERE email = '$email' AND pwd = '$pwd'";

        try {
            $query = $conn->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

}