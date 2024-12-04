<?php
	include_once dirname(__FILE__).'/../Config.php';
	include_once dirname(__FILE__).'/../Model/Quiz.php';

	class QuizC {

/////..............................Afficher............................../////
		function AfficherQuizs(){
			$sql="SELECT * FROM Quiz";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

/////..............................Supprimer............................../////
		function SupprimerQuiz($idQuiz){
			$sql="DELETE FROM Quiz WHERE idQuiz=:idQuiz";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idQuiz', $idQuiz);   
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}


/////..............................Ajouter............................../////
		function AjouterQuiz($Quiz){
			$sql="INSERT INTO Quiz (titre,description,difficulte) 
			VALUES (:titre,:description,:difficulte)";
			
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'titre' => $Quiz->gettitre(),
                    'description' => $Quiz->getdescription(),
					'difficulte' => $Quiz->getdifficulte(),
			]);
						
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
/////..............................Affichage par la cle Primaire............................../////
		function RecupererQuiz($idQuiz){
			$sql="SELECT * from Quiz where idQuiz=$idQuiz";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Quiz=$query->fetch();
				return $Quiz;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

/////..............................Update............................../////
		function ModifierQuiz($Quiz,$idQuiz){
			try {
				$db = config::getConnexion();
		$query = $db->prepare('UPDATE Quiz SET titre = :titre ,description = :description ,difficulte = :difficulte WHERE idQuiz= :idQuiz');
				$query->execute([
					'titre' => $Quiz->gettitre(),
                    'description' => $Quiz->getdescription(),
					'difficulte' => $Quiz->getdifficulte(),
					'idQuiz' => $idQuiz
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		public function RechercheEtTri($search = null, $tri = null) {
			$db = config::getConnexion();
			$sql = "SELECT * FROM Quiz";
			
			$params = [];
			
			if (!empty($search)) {
				$sql .= " WHERE titre LIKE :search OR description LIKE :search OR difficulte LIKE :search";
				$params[':search'] = '%' . $search . '%';
			}
			
			if ($tri === 'asc' || $tri === 'desc') {
				$sql .= " ORDER BY dateCreation " . strtoupper($tri);
			}
			
			$query = $db->prepare($sql);
			$query->execute($params);
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		

/*
		function Recherche($titre){
			$sql="SELECT * from cours where titre like '".$titre."%' ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}



		/////..............................tri............................../////
	function Tri(){
		$sql="SELECT * FROM cours order by description ASC";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMessage());
		}
	}*/
        } 
	?>
