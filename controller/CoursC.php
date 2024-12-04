<?php

require_once '../../config.php';
require_once '../../model/Cours.php';


class CoursC
{

    


    public function listCours($order = 'ASC')
{
    $sql = "SELECT * FROM cours ORDER BY date_pub " . $order; // Tri selon $order
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste->fetchAll();
    } catch (Exception $e) {
        echo 'Erreur SQL : ' . $e->getMessage();
        return [];
    }
}


    function deleteCours($id_matiere)
    {
        $sql = "DELETE FROM cours WHERE id_matiere = :id_matiere";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_matiere', $id_matiere);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
 
  

public function addCours($cours)
{
    $sql = "INSERT INTO cours VALUES (NULL, :d, :m, :dp, :t, :i)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        
        // Formater la date avant de l'envoyer dans la requête
        $datePubFormatted = $cours->getDatePub()->format('Y-m-d'); // Format de la date : 'YYYY-MM-DD'
        
        $query->execute([
            'd' => $cours->getIdUser(),
            'm' => $cours->getNomMatiere(),
            'dp' => $datePubFormatted, // Utilisez la date formatée
            't' => $cours->getType(),
            'i' => $cours->getImage()
        ]);
        
        // Redirection vers la page listcours.php après l'ajout
        header('Location: listcours.php');
        exit(); // Assurez-vous que l'exécution du script PHP s'arrête ici après la redirection
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


public function updatecours($id, $nom_matiere, $date_pub, $type)
{
    $db = config::getConnexion();
    try {
        $query = $db->prepare(
            'UPDATE cours SET id_user = :id_user, nom_matiere = :nom_matiere, date_pub = :date_pub, type = :type WHERE id_matiere = :id'
        );
        
        // Exécuter la requête avec les valeurs provenant du formulaire
        $query->execute([
            'id' => $id,
            'id_user' => $_POST['id_user'],  // Utiliser la valeur passée par le formulaire
            'nom_matiere' => $nom_matiere,
            'date_pub' => $date_pub,
            'type' => $type
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

public function affichercours($id)
{
    $db = config::getConnexion();
    try {
        $query = $db->prepare(
            'SELECT * FROM cours where id_matiere=:id '
        );
        $query->execute([
            'id'=>$id,
        ]);
        $result = $query->fetchAll();
        return $result;
    } catch (PDOException $e) {
        echo "error";
    }
}

public function chercher($recherche)
{
    $sql = "SELECT * FROM cours WHERE nom_matiere = :recherche";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(":recherche", $recherche);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        echo 'Erreur SQL : ' . $e->getMessage();
        return [];
    }
}

    
}
