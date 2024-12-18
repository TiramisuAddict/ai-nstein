<?php
include '../../controller/SeanceS.php';

if (isset($_GET['id_seance']) && !empty($_GET['id_seance'])) {
    $id_seance = $_GET['id_seance'];
    $seanceC = new SeanceS();
    $seanceC->deleteSeance($id_seance);
    
    // Redirect the user to the list after deletion
    header('Location: listseance.php');
    exit();
} else {
    // Handle the case where the ID is not correctly specified
    echo 'Invalid ID specified for deletion.';
    // You can also redirect the user to the list here, for example:
    // header('Location: listseance.php');
    // exit();
}
?>
