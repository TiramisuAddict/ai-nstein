<?php
  include __DIR__ . '/../../Controller/QuizC.php';


$successMessage="";
$recaptEror = null;
$Quiz = null ;
$QuizC = new QuizC();

if(isset($_POST['submit']))
{

function CheckCaptcha($userResponse) {
        $fields_string = '';
        $fields = array(  
            'secret' => '6Lc0F5gqAAAAAM085B4JgsK11ZysmzYEsXFuadRC',
            'response' => $userResponse);
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }


    // Call the function CheckCaptcha
    $result = CheckCaptcha($_POST['g-recaptcha-response']);


    if ($result['success']) {
if (		
  isset($_POST["titre"])&&
  isset($_POST["description"])&&
  isset($_POST["difficulte"])

){
  if (!empty($_POST["titre"]) &&
      !empty($_POST["description"])&&
      !empty($_POST["difficulte"])
  ) 
  {   

      $Quiz = new Quiz(
          $_POST['titre'],
          $_POST['description'],
          $_POST['difficulte']
      );
      $QuizC->AjouterQuiz($Quiz);
      header("Location:AfficherQuizs.php?successMessage= Quiz ajouté avec succés");
  }
  else
      $errorMessage = "<label id = 'form' style = 'color: red; font-weight: bold;'>&emsp;Une Information manquant !</label>   ";
    }   
    echo "Captcha verified Successfully";

} else {
    // If the CAPTCHA box wasn't checked
    $recaptEror="Please check ReCaptcha!";
   //echo '<script>alert("Please check ReCaptcha!");</script>';
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

    <script src='https://www.google.com/recaptcha/api.js'></script>
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

          <!-- Base Content -->
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title brand-name">Nouveau Quiz</h4>
                      <form method="POST" class="forms-sample" name="form"  id="form" enctype="multipart/form-data" onsubmit="return validateForm();">

                        <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" id="titre" name="titre" class="form-control mb-2" placeholder="Entrez Votre Titre">
                        <div id="titreerror" class="error-message"></div>
                        </div>

                        <div class="form-group">
                        <label for="titre">Description</label>
                        <textarea name="description" id="description" class="form-control mb-2" cols="30" rows="10" placeholder="Entrez le Description"></textarea>
                        <div id="descriptionerror" class="error-message"></div>
                        </div>

                        <div class="form-group">
                        <label for="titre">Difficulté :</label>
                        <input type="text" id="difficulte" name="difficulte" class="form-control mb-2" placeholder="Entrez le Difficulté">
                        <div id="difficulteerror" class="error-message"></div>
                        </div>

                        <div class="g-recaptcha" data-sitekey="6Lc0F5gqAAAAAAO5wAeQN6ncZq_13zwqdPjpjHsf"></div>

                        <?php 
                          if($recaptEror!=null)
                          {
                            echo '<div class="row mb-5"><div class="offset-sm-3 col-sm-3 d-grid"><a style="color:red">Please Check ReCaptcha!</a></div></div>';
                          }
                        ?>
                        <input type="submit" name="submit" class="btn btn-primary col-sm-3 mt-2" value="Ajouter" id ="Ajouter">
                        <a href="AfficherQuizs.php" class="btn btn-light mt-2">Cancel</a>

                      </form>
                    </div>
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