<?php
    require_once '../Controller/UserController.php';  

    $userController = new UserController();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $userController->loginCheck($email, $password);

    if($result){
        header('Location: dashboard.php');
        exit;
    }

?>

<!doctype html>

<html lang="en" class="light-style layout-wide customizer-hide">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>LogIn</title>

    <link rel="icon" type="image/x-icon" href="../Dependencies/img/logo.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Braah+One&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../Dependencies/Template/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../Dependencies/Template/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../Dependencies/Template/css/demo.css" />

    <link rel="stylesheet" href="../Dependencies/Template/vendor/css/page-auth.css" />

  </head>

  <body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          
          <div class="card px-sm-6 px-0">
            <div class="card-body">
              
              <!-- logo -->
              <div class="app-brand justify-content-center">
                <img src="../Dependencies/img/ai_nstein_logo.svg" class="app-brand-logo" alt="ainstein logo">
              </div>
              <!-- logo -->
              
              <h4 class="mb-1">Welcome to <span class="brand-name">Ai-nstein</span></h4>
              <p class="mb-6">Please sign-in to your account and start the adventure</p>
              
              <!-- login form -->
              <form id="formAuthentication" method="post" class="mb-6" action="login.php" onsubmit="return validate_login()">
                <!-- email -->
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    autofocus/>

                    <!-- invalid email text -->
                    <div id="invalidEmail" class="invalid-feedback" style="display: none;">
                      Invalid email address.
                    </div>
                    <!-- invalid email text -->
                </div>

                <!-- email -->
                
                <!-- password -->
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                </div>
                <!-- password -->

                <div class="mb-8">
                  <div class="d-flex justify-content-between mt-8">
                    <!-- checkbox -->
                    <div class="form-check mb-0 ms-2">
                      <input class="form-check-input" type="checkbox" id="remember-me" />
                      <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                    <!-- checkbox -->

                    <!-- forgot password link -->
                    <a href="#">
                      <span>Forgot Password?</span>
                    </a>
                    <!-- forgot password link -->
                  </div>
                </div>
                
                <!-- submit button -->
                <div class="mb-6">
                  <button class="btn btn-primary d-grid w-100" type="submit" id="submitBtn">Login</button>
                </div>
                <!-- submit button -->
              </form>
              <!-- login form -->

              <?php
                if(!$result) {
                    echo '<div class="alert alert-danger" role="alert">
                            Invalid email or password.
                          </div>';
                }
              ?>

              <!-- other links -->
              <p class="text-center">
                <span>New on our platform?</span><br>
                <a href="../Vue/register.html">
                  <span>Create an account</span>
                </a>
                |
                <a href="../Vue/register_expert.html">
                  <span>Join as an expert</span>
                </a>
              </p>
              <!-- other links -->

            </div>

          </div>

        </div>
      </div>
    </div>
    <!-- <script src="input_control.js"></script> -->
  </body>
</html>