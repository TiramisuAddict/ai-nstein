<?php
require_once '../Controller/depositController.php'; 
$controller = new DepositController();
$deposits = $controller->getAllDeposits();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Uploads</title>
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <script src="assets/vendor/js/helpers.js"></script>
  <script src="assets/js/config.js"></script>
  <style>
    .custom-delete-btn {
      background-color: white;
      color: #d22498;
      border: 1px solid #d22498;
    }

    .custom-delete-btn:hover {
      background-color: #d22498;
      color: white;
    }
  </style>
</head>
<body>
  <div class="card" style="max-width: 950px; margin: 60px auto; text-align: center;">
    <h5 class="card-header">Your Uploads Overview</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Project Name</th>
            <th>Upload Date</th>
            <th>File</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        <?php
        if (!empty($deposits)) { 
            foreach ($deposits as $deposit) { 
                echo '<tr>';
                echo '<td>' . htmlspecialchars($deposit['title']) . '</td>';
                echo '<td>' . htmlspecialchars($deposit['deposit_date']) . '</td>'; 
                echo '<td>';
                $filePath = htmlspecialchars($deposit['uploaded_file']);
                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif'])) 
                {
                    echo '<img src="' . $filePath . '" alt="Uploaded File" style="max-width: 100px; max-height: 100px;">';
                } elseif (in_array(strtolower($fileExtension), ['pdf'])) {
                    echo '<a href="' . $filePath . '" target="_blank">View PDF</a>';
                } else {
                    echo '<a href="' . $filePath . '" target="_blank">View File</a>';
                }
                echo '</td>';

                echo '<td>';
                echo '<a href="../Controller/edit_dep.php?id=' . $deposit['id_depot'] . '" class="btn btn-sm btn-outline-warning" role="button"><i class="bx bx-edit-alt"></i> Edit </a>';
                echo '</td>';
                echo '<td>';
                echo '<form method="POST" action="../Controller/delete_dep.php">';
                echo '<input type="hidden" name="id_depot" value="' . $deposit['id_depot'] . '">';
                echo '<button type="submit" class="btn btn-sm custom-delete-btn" onclick="return confirm(\'Are you sure you want to delete this upload?\');"><i class="bx bx-trash"></i> Delete </button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="5" style="text-align:center;">No uploads found.</td></tr>';
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
