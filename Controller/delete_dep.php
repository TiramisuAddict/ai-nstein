<?php
require_once '../Controller/depositController.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_depot = $_POST['id_depot']; 
    $depotController = new DepositController();
    $depotController->deleteDeposit($id_depot); 
    header("Location: ../Vue/show_dep.php"); 
    exit; 
}
?>