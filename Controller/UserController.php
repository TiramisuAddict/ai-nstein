<?php
require_once '../Config.php';
require_once '../Model/User.php';

class UserController {

    public function getUser() {
        $conn = config::getConnexion();

        $sql = "SELECT * FROM users";

        try {
            $query = $conn->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function addUser($user) {
        $conn = config::getConnexion();
        $sql = "INSERT INTO users (username, email, pwd, itbackground, age, sexe, educationlvl, experience, role, cdate, status, file, proofdoc)
            VALUES (:username, :email, :pwd, :itbackground, :age, :sexe, :educationlvl, :experience, :role, :cdate, :status, :filedata, :proofdoc)";
        try {
            $query = $conn->prepare($sql);
            $query->execute([
                ':username' => $user->getUsername(),
                ':email' => $user->getEmail(),
                ':pwd' => $user->getPwd(),
                ':itbackground' => $user->getItbackground(),
                ':age' => $user->getAge(),
                ':sexe' => $user->getSexe(),
                ':educationlvl' => $user->getEducationlvl(),
                ':experience' => $user->getExperience(),
                ':role' => $user->getRole(),
                ':cdate' => date('Y-m-d'),
                ':status' => $user->getStatus(),
                ':filedata' => $user->getFiledata(),
                ':proofdoc' => $user->getProofdoc()

            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

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
            die('Erreur: ' . $e->getMessage());
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
            die('Erreur: ' . $e->getMessage());
        }
    }
    
   public function deleteUser($id){
        $conn = config::getConnexion();
        $sql="DELETE FROM users WHERE id = :id";
        try{
            $query=$conn->prepare($sql);
            $query->execute([':id'=>$id]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
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

    public function countMaleUsers() {
        $conn = config::getConnexion();

        $sql = "SELECT count(*) FROM `users` WHERE sexe='Male'";

        try {
            $query = $conn->prepare($sql);
            $query->execute();
            $result = $query->fetch();
            return $result['count(*)'];
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function countExperts() {
        $conn = config::getConnexion();

        $sql = "SELECT count(*) FROM `users` WHERE role='Expert'";

        try {
            $query = $conn->prepare($sql);
            $query->execute();
            $result = $query->fetch();
            return $result['count(*)'];
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function loginCheck($email) {
        $conn = config::getConnexion();

        $sql = "SELECT * FROM users WHERE email = '$email'";

        try {
            $query = $conn->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function getExpert(){
        $conn = config::getConnexion();

        $sql = "SELECT * FROM users WHERE role='Expert'";

        try {
            $query = $conn->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function getFiltredExperts($filter) {
        if ($filter == 'All') {
            return $this->getExpert();
        }else {
            $conn = config::getConnexion();

            $sql = "SELECT * FROM users WHERE role='Expert' AND status='$filter'";

            try {
                $query = $conn->prepare($sql);
                $query->execute();
                return $query->fetchAll();
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
    }

    public function setStatus($id,$status){
        $conn = config::getConnexion();
        $sql = "UPDATE users SET status = :status WHERE id = :id";

        try{
            $query=$conn->prepare($sql);
            $query->execute([
                ':id'=>$id,
                ':status' => $status
            ]);
         } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

}