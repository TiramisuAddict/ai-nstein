<?php
	include_once dirname(__FILE__).'/../Config.php';
	include_once dirname(__FILE__).'/../Model/Reponse.php';

	class ReponseC {

/////..............................Afficher............................../////
			public function AfficherReponses($idQuestion) {
				$query = "SELECT * FROM Reponse WHERE idQuestion = :idQuestion";
				$db = Config::getConnexion();
				$stmt = $db->prepare($query);
				$stmt->execute(['idQuestion' => $idQuestion]);
				return $stmt->fetchAll(PDO::FETCH_ASSOC); // Use PDO::FETCH_ASSOC to return an associative array
			}

/////..............................Supprimer............................../////
		function SupprimerReponse($idReponse){
			$sql="DELETE FROM Reponse WHERE idReponse=:idReponse";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idReponse', $idReponse);   
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}


/////..............................Ajouter............................../////
		function AjouterReponse($Reponse){
			$sql="INSERT INTO Reponse (idQuestion,text,isCorrect) 
			VALUES (:idQuestion,:text,:isCorrect)";
			
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'idQuestion' => $Reponse->getidQuestion(),
                    'text' => $Reponse->gettext(),
					'isCorrect' => $Reponse->getisCorrect(),
			]);
						
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
/////..............................Affichage par la cle Primaire............................../////
		function RecupererReponse($idReponse){
			$sql="SELECT * from Reponse where idReponse=$idReponse";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Reponse=$query->fetch();
				return $Reponse;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

/////..............................Update............................../////
		function ModifierReponse($Reponse,$idReponse){
			try {
				$db = config::getConnexion();
		$query = $db->prepare('UPDATE reponse SET idQuestion = :idQuestion , text = :text , isCorrect = :isCorrect WHERE idReponse= :idReponse');
				$query->execute([
					'idQuestion' => $Reponse->getidQuestion(),
                    'text' => $Reponse->gettext(),
					'isCorrect' => $Reponse->getisCorrect(),
					'idReponse' => $idReponse
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
        } 
	?>
