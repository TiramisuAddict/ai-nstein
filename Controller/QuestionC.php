<?php
	include_once dirname(__FILE__).'/../Config.php';
	include_once dirname(__FILE__).'/../Model/Question.php';

	class QuestionC {

/////..............................Afficher............................../////
			public function AfficherQuestions($idQuiz) {
				$query = "SELECT * FROM question WHERE idQuiz = :idQuiz";
				$db = Config::getConnexion();
				$stmt = $db->prepare($query);
				$stmt->execute(['idQuiz' => $idQuiz]);
				return $stmt->fetchAll(PDO::FETCH_ASSOC); // Use PDO::FETCH_ASSOC to return an associative array
			}


/////..............................Supprimer............................../////
		function SupprimerQuestion($idQuestion){
			$sql="DELETE FROM Question WHERE idQuestion=:idQuestion";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idQuestion', $idQuestion);   
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}


/////..............................Ajouter............................../////
		function AjouterQuestion($Question){
			$sql="INSERT INTO Question (idQuiz,text) 
			VALUES (:idQuiz,:text)";
			
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'idQuiz' => $Question->getidQuiz(),
                    'text' => $Question->gettext()
			]);
						
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
/////..............................Affichage par la cle Primaire............................../////
		function RecupererQuestion($idQuestion){
			$sql="SELECT * from Question where idQuestion=$idQuestion";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Question=$query->fetch();
				return $Question;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

/////..............................Update............................../////
		function ModifierQuestion($Question,$idQuestion){
			try {
				$db = config::getConnexion();
		$query = $db->prepare('UPDATE Question SET idQuiz = :idQuiz ,text = :text  WHERE idQuestion= :idQuestion');
				$query->execute([
					'idQuiz' => $Question->getidQuiz(),
                    'text' => $Question->gettext(),
					'idQuestion' => $idQuestion
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
        } 
	?>
