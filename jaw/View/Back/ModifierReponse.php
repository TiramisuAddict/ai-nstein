<?php
  include '../../../Controller/QuestionC.php';
  include '../../../Controller/ReponseC.php';

  $errorMessage = "";
  $successMessage = "";

  // Create an instance of the controller
  $Reponse = "";
  $ReponseC = new ReponseC();
  $QuestionC = new QuestionC();

  if (isset($_POST["idQuestion"]) && isset($_POST["text"])&& isset($_POST["isCorrect"])) {
      if (!empty($_POST["idQuestion"]) && !empty($_POST["text"])&& !empty($_POST["isCorrect"])) {
          $Reponse = new Reponse(
              $_POST['idQuestion'],
              $_POST['text'],
              $_POST['isCorrect']
          );
                echo '<pre>';
        print_r($_POST);
        print_r($_GET);
        echo '</pre>';

          $ReponseC->ModifierReponse($Reponse,$_GET['idReponse']);

          // Include idQuiz in the header redirection
          $idQuestion = $_POST['idQuestion'];
          header("Location: AfficherReponses.php?idQuestion=$idQuestion");
          exit(); // Ensure script stops after the redirection
      } else {
          $errorMessage = "<label id='form' style='color: red; font-weight: bold;'>&emsp;Une Information manquant !</label>";
      }
}
?>

</html>
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

    <title>Quiz Dashboard</title>

    <link rel="icon" type="image/x-icon" href="../../img/logo.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Braah+One&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../BackOffice/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../BackOffice/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../BackOffice/css/demo.css" />

    <link rel="stylesheet" href="../../BackOffice/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../BackOffice/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../../BackOffice/vendor/css/page-auth.css" />

    <link rel="stylesheet" href="../../BackOffice/vendor/css/pretty-btn.css" />

    <script src="../../BackOffice/vendor/js/helpers.js"></script>
    <script src="../../BackOffice/js/config.js"></script>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Side Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <!-- logo -->
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="../../img/ai_nstein_logo.svg" alt="ainstein logo" width="120"/>
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
            </a>
          </div>
          <!-- logo -->

          <ul class="menu-inner py-1">
            <!-- Dropdown Section -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div class="text-truncate" data-i18n="Layouts">Layouts</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-without-menu.html" class="menu-link">
                    <div class="text-truncate" data-i18n="Without menu">Without menu</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-without-navbar.html" class="menu-link">
                    <div class="text-truncate" data-i18n="Without navbar">Without navbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-fluid.html" class="menu-link">
                    <div class="text-truncate" data-i18n="Fluid">Fluid</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-container.html" class="menu-link">
                    <div class="text-truncate" data-i18n="Container">Container</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                    <div class="text-truncate" data-i18n="Blank">Blank</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Dropdown Section -->

            <!-- Section text -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Manage Users</span>
            </li>
            <!-- Section text -->
            
            <!-- Page link (Manage users) -->
            <li class="menu-item">
              <a
                href="dashboard.php"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-customize"></i>
                <div class="text-truncate">Users list</div>
              </a>
            </li>
            <!-- Page link (Manage users) -->

            <!-- Page link (Approve expert) -->
            <li class="menu-item">
              <a
                href="expertRequestList.php"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-edit"></i>
                <div class="text-truncate">Expert requests</div>
              </a>
            </li>
            <!-- Page link (Approve expert) -->

          </ul>
        </aside>
        <!-- Side Menu -->
        
        <!-- Page content -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="bx bx-menu bx-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search bx-md"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none ps-1 ps-sm-2"
                    placeholder="Search..."
                    aria-label="Search..." />
                </div>
              </div>
            </div>
          </nav>
          <!-- Navbar -->

          <!-- Base Content -->
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
           <?php
             
                $Reponse = $ReponseC->RecupererReponse($_GET['idReponse']);      
            ?>
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modifier Reponse</h4>


                  <form method="POST" class="forms-sample" name="form"  id="form" enctype="multipart/form-data" >


                      <div class="form-group">
                      <label for="titre">Text :</label>
                      <input type="text" id="text" name="text" class="form-control mb-3" placeholder="Entrez Votre Text" value="<?php echo $Reponse['text'];?>">
                      <div id="typeerror" class="error-message"></div>
                      </div>


                      <div class="form-group">
                        <label for="">Is Correct :</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="isCorrect">
                          <option value="True" <?php if ($Reponse['isCorrect'] == 'True') echo 'selected'; ?>>True</option>
                          <option value="False" <?php if ($Reponse['isCorrect'] == 'False') echo 'selected'; ?>>False</option>
                        </select>
                      </div>

                      <input type="hidden" id="idQuestion" name="idQuestion" value="<?php echo $Reponse['idQuestion']; ?>">

                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <a href="AfficherQuestions.php?idQuestion=<?php echo $idQuestion; ?>" class="btn btn-light">Cancel</a>
                      </form>
                </div>
              </div>
            </div>

            </div>

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                  <div class="text-body brand-name">
                    Ai-nstein ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , by
                    <a href="#" target="_blank" class="footer-link">Bold Visions</a>
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
    <script src="../../BackOffice/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../BackOffice/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../BackOffice/vendor/js/menu.js"></script>
    <script src="../../BackOffice/js/main.js"></script>

  </body>
</html>