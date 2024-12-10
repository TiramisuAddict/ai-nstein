<?php
	class Reponse{
		private $idReponse=null;
        private $idQuestion=null;
		private $text=null;
		private $isCorrect = null ;		
		//// Contructor
		function __construct($idQuestion,$text,$isCorrect){
			$this->idQuestion=$idQuestion;
            $this->text=$text;
            $this->isCorrect=$isCorrect;
		}

        /// Getters
		function getidQuestion(){
			return $this->idQuestion;
		}

        function getidReponse(){
			return $this->idReponse;
		}
		

		function gettext(){
			return $this->text;
		}

        function getisCorrect(){
			return $this->isCorrect;
		}

        function settext(string $text){
			$this->text=$text;
		}

        function setisCorrect(string $isCorrect){
			$this->isCorrect=$isCorrect;
		}

        function setidQuestion(int $idQuestion){
            return $this->idQuestion=$idQuestion;
	}

}
?>