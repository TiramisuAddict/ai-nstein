<?php
	class Question{
		private $idQuestion=null;
        private $idQuiz=null;
		private $text=null;
		private $dateCreation = null ;		
		//// Contructor
		function __construct($idQuiz,$text){
			$this->idQuiz=$idQuiz;
            $this->text=$text;
		}

        /// Getters
		function getidQuiz(){
			return $this->idQuiz;
		}

        function getidQuestion(){
			return $this->idQuestion;
		}
		

		function gettext(){
			return $this->text;
		}

        function settext(string $text){
			$this->text=$text;
		}

        function setidQuiz(int $idQuiz){
            return $this->idQuiz=$idQuiz;
	}

}
?>