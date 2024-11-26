<?php
require_once '../Controller/exerciceController.php';
require_once '../Controller/delete_ex.php';

$controller = new exerciceController();
$exercises = $controller->getExercises(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Your Work</title>
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    <style>
      .custom-delete-btn 
      {
      background-color: white;
      color: #d22498;
      border: 1px solid #d22498;
      }

      .custom-delete-btn:hover 
      {
      background-color: #d22498;
      color: white;
      }
    </style>


</head>
<div class="card" style="max-width: 950px; margin: 60px auto; text-align: center;">
    <h5 class="card-header">Your Projects Overview</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Project Name</th>
            <th>Username</th>
            <th>Difficulty Level</th>
            <th>Date Created</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        <?php
        if (!empty($exercises)) 
        { 
            foreach ($exercises as $exercise) 
            { 
                echo '<tr>';
                echo '<td>' . htmlspecialchars($exercise['title']) . '</td>';
                echo '<td>' . htmlspecialchars($exercise['author_name']) . '</td>'; 
                echo '<td>' . htmlspecialchars($exercise['difficulty_level']) . '</td>';
                echo '<td>' . htmlspecialchars($exercise['date_creation']) . '</td>';
                echo '<td>';
                echo '<a href="../Controller/edit_ex.php?id=' . $exercise['id'] . ' "class="btn btn-sm btn-outline-warning" role="button"><i class="bx bx-edit-alt"></i> Edit </a>'; 
                //echo '<a href="edit_ex.php?id=' . $exercise['id'] . '" class="btn btn-sm btn-outline-primary">';
                echo '</td>';
                echo '<td>';
                echo '<form method="POST" action="../Controller/delete_ex.php">';
                echo '<input type="hidden" name="id" value="' . $exercise['id'] . '">';
                echo '<button type="submit" class="btn btn-sm custom-delete-btn" onclick="return confirm(\'Are you sure you want to delete this project?\');"><i class="bx bx-trash"></i> Delete </button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="5" style="text-align:center;">No exercises found.</td></tr>';
        }
        ?>
          </tbody>          
      </table>
    </div>
  </div>
</html>