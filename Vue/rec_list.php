<?php
require_once '../Controller/ReclamationController.php';

$reclamationController = new ReclamationController();
$reclamations = $reclamationController->getReclamation();
?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
  data-style="light">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Dashboard</title>
  <link rel="icon" type="image/x-icon" href="../Dependencies/img/logo.ico" />
  <link href="https://fonts.googleapis.com/css2?family=Braah+One&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../Dependencies/Template/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../Dependencies/Template/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../Dependencies/Template/css/demo.css" />
  <link rel="stylesheet" href="../Dependencies/Template/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="../Dependencies/Template/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../Dependencies/Template/vendor/css/page-auth.css" />
  <script src="../Dependencies/Template/vendor/js/helpers.js"></script>
  <script src="../Dependencies/Template/js/config.js"></script>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Side Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <!-- logo -->
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <img src="../Dependencies/img/ai_nstein_logo.svg" alt="ainstein logo" width="120"/>
          </a>
        </div>
        <!-- logo -->

        <ul class="menu-inner py-1">
          <li class="menu-item">
            <a href="dashboard.html" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div class="text-truncate">Manage users</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="./rec_list.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div class="text-truncate">Manage complaints</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- Side Menu -->

      <!-- Page content -->
      <div class="layout-page">
        <!-- Navbar -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
              <i class="bx bx-menu bx-md"></i>
            </a>
          </div>
        </nav>
        <!-- Navbar -->

        <!-- Base Content -->
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card m-4">
              <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Type</th>
                      <th colspan="2">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php foreach ($reclamations as $reclamation): ?>
                      <tr>
                        <td><?= htmlspecialchars($reclamation['id']); ?></td>
                        <td><?= htmlspecialchars($reclamation['titre']); ?></td>
                        <td><?= htmlspecialchars($reclamation['type']); ?></td>
                        <!-- Edit Action -->
                        <td>
                          <a href="updateReclamation.php?id=<?= htmlspecialchars($reclamation['id']); ?>">
                            <img src="../Dependencies/img/pen.svg" alt="Modify" style="cursor: pointer; width: 20px;">
                          </a>
                        </td>
                        <!-- Delete Action -->
                        <td>
                          <a href="deleteReclamation.php?id=<?= htmlspecialchars($reclamation['id']); ?>"
                             onclick="return confirm('Are you sure you want to delete this reclamation?');">
                            <img src="../Dependencies/img/x.svg" alt="Delete" style="cursor: pointer; width: 20px;">
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="text-body brand-name">
                  Ai-nstein © <script>document.write(new Date().getFullYear());</script>, by Bold Visions
                </div>
              </div>
            </div>
          </footer>
          <!-- Footer -->
        </div>
        <!-- Base Content -->
      </div>
      <!-- Page content -->
    </div>
    <!-- Side menu mask -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- Aside scripts -->
  <script src="../Dependencies/Template/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../Dependencies/Template/vendor/js/menu.js"></script>
  <script src="../Dependencies/Template/js/main.js"></script>
</body>
</html>
