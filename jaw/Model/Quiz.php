<?php
	class Quiz{
		private $idQuiz=null;
		private $titre=null;
        private $description=null;
        private $difficulte = null ;
		private $dateCreation = null ;		
		//// Contructor
		function __construct($titre,$description,$difficulte){
			$this->titre=$titre;
			$this->description=$description;
            $this->difficulte=$difficulte;
		}

        /// Getters
		function getidQuiz(){
			return $this->idQuiz;
		}
		

		function gettitre(){
			return $this->titre;
		}


		function getdifficulte(){
			return $this->difficulte;
		}
		function getdescription(){
			return $this->description;
		}
		
       //// Setters
		function setdifficulte(string $difficulte){
			$this->difficulte=$difficulte;
		}

        function settitre(string $titre){
			$this->titre=$titre;
		}
		function setdescription(string $description){
			$this->description=$description;
		}

	}
?>