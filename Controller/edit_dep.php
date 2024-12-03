<?php
if (!isset($_GET['id'])) {
    die("Error: No deposit ID provided.");
}
$id_depot = $_GET['id'];
header("Location: ../Vue/upload.php?id_depot=$id_depot");
exit;
