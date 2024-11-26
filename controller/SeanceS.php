<?php




require_once '../../config.php';
require_once '../../model/Seance.php';
require_once '../../model/Cours.php';
class SeanceS
{
    
    public static function getlistSeance()
{
    $sql = "SELECT id_seance, id_matiereseance, date_seance, heure_d, heure_f, description FROM seance";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
        return [];
    }
}

        
        
    function addSeance($seance)
{
    $sql = "INSERT INTO seance (id_matiereseance,date_seance , heure_d , heure_f , description) 
            VALUES (:m,:d, :hd, :hf, :des)";
    $db = config::getConnexion();
    try {


        // Récupére jointuree


        $coursDetails = $this->getCoursDetails($seance->getId_matiereseance());
        
        if ($coursDetails) {
            // Utiliser les détails du cours pour compléter les autres valeurs de la séance
            $query = $db->prepare($sql);
            $query->execute([
                'm' => $seance->getId_matiereseance(),
                'd' => $seance->getDate_seance()->format('Y-m-d'),
            'hd' => $seance-> getHeure_d(),
            'hf' => $seance-> getHeure_f(),
            'des' => $seance->getDescription()
            ]);
            echo "Seance added successfully!";
        } else {
            echo "Error: Cours details not found.";
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
function getCoursDetails($id_matiereseance)
{
    $sql = "SELECT * FROM cours WHERE id_matiere = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['id' => $id_matiereseance]);
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

    function deleteSeance($id_seance)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
                DELETE FROM seance WHERE id_seance = :id_seance
            ');
            $querry->execute([
                'id_seance' => $id_seance
            ]);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

   

    public function updateseance($data) {
        $config = config::getConnexion();
        try {
            $query = $config->prepare('
                UPDATE seance SET
                    id_matiereseance = :id_matiereseance,
                    date_seance = :date_seance,
                    heure_d = :heure_d,
                    heure_f = :heure_f,
                    description = :description
                WHERE id_seance = :id_seance
            ');
    
            $query->execute([
                'id_seance' => $data['id_seance'],
                'id_matiereseance' => $data['id_matiereseance'], // Correction ici
                'date_seance' => $data['date_seance'],
                'heure_d' => $data['heure_d'],
                'heure_f' => $data['heure_f'],
                'description' => $data['description']
            ]);
    
            return true; // Mise à jour réussie
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public static function getSeanceById($id_seance)
{
    try {
        $pdo = config::getConnexion();
        $stmt = $pdo->prepare('SELECT * FROM seance WHERE id_seance = ?');
        $stmt->execute([$id_seance]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}


    
    public function afficherseance($id) {
        $config = config::getConnexion();
        try {
            $query = $config->prepare("SELECT * FROM seance WHERE id_seance = :id_seance");
            $query->execute(['id_seance' => $id]);
            return $query->fetchAll(PDO::FETCH_ASSOC); // Renvoie un tableau associatif
        } catch (PDOException $e) {
            return null; // Renvoie null en cas d'erreur
        }
    }
        

}
