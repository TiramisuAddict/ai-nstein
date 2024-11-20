<?php
include '../../controller/CoursC.php';

if (isset($_GET['id_matiere']) && !empty($_GET['id_matiere'])) {
    $id_matiere = $_GET['id_matiere'];
    $coursC = new CoursC();
    $coursC->deleteCours($id_matiere);
    
    header('Location: listcours.php');
    exit();
} else {
    echo 'Invalid ID specified for deletion.';
 
}
?>

