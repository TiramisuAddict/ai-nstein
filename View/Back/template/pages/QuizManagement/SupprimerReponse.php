<?php
include '../../../../../Controller/ReponseC.php';


$message = "" ;
$ReponseC = new ReponseC();

$idQuestion = $_GET["idQuestion"];

$ReponseC->SupprimerReponse($_GET["idReponse"]);
header('Location:AfficherReponses.php?idQuestion='.$idQuestion);

?>