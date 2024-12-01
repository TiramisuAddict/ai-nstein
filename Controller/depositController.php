<?php
require_once '../Config.php';
class DepositController {
    public function getAllDeposits() {
        $conn = config::getConnexion(); 
        $sql = "SELECT 
                d.id_depot,
                d.deposit_date,
                d.uploaded_file,
                e.title 
            FROM depot d
            JOIN exercises e ON d.exercise_id = e.id";
        try {
            $query = $conn->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function addDeposit($deposit) {
        $conn = config::getConnexion();
        $sql = "INSERT INTO depot (exercise_id, deposit_date, uploaded_file) 
                VALUES (:exercise_id, :deposit_date, :uploaded_file)";

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                ':exercise_id' => $deposit['exercise_id'],
                ':deposit_date' => $deposit['deposit_date'],
                ':uploaded_file' => $deposit['uploaded_file'],
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function updateDeposit($id, $deposit) {
        $conn = config::getConnexion();
        $sql = "UPDATE depot 
                SET exercise_id = :exercise_id, deposit_date = :deposit_date, uploaded_file = :uploaded_file 
                WHERE depot_id = :id";

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                ':id' => $id,
                ':exercise_id' => $deposit['exercise_id'],
                ':deposit_date' => $deposit['deposit_date'],
                ':uploaded_file' => $deposit['uploaded_file'],
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function deleteDeposit($id_depot) {
        $conn = config::getConnexion();
        $sql = "DELETE FROM depot WHERE id_depot = :id_depot";

        try {
            $query = $conn->prepare($sql);
            $query->execute([':id_depot' => $id_depot]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function getDepositById($id_depot) {
        $conn = config::getConnexion();
        $sql = "SELECT * FROM depot WHERE id_depot = :id_depot";

        try {
            $query = $conn->prepare($sql);
            $query->execute([':id' => $id_depot]);
            return $query->fetch(); 
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>
