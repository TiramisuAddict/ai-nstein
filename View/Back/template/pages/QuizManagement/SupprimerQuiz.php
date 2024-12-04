<?php
include '../../../../../Controller/QuizC.php';


$message = "" ;
$QuizC = new QuizC();

$QuizC->SupprimerQuiz($_GET["idQuiz"]);
header('Location:AfficherQuizs.php?message= Quiz Supprimé avec succés');

?>