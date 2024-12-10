<?php
include '../../../../../Controller/QuestionC.php';


$message = "" ;
$QuestionC = new QuestionC();

$idQuiz = $_GET["idQuiz"];

$QuestionC->SupprimerQuestion($_GET["idQuestion"]);
header('Location:AfficherQuestions.php?idQuiz='.$idQuiz);

?>