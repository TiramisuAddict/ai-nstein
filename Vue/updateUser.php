<?php
  $role = isset($_GET['role']) ? $_GET['role'] : 'user';

  require_once '../Controller/UserController.php';
  require_once '../Model/User.php';

  $userController = new UserController();
  $user = $userController->getUserById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free" data-style="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard</title>

  <link rel="icon" type="image/x-icon" href="../Dependencies/img/logo.ico" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Braah+One&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

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
            <span class="app-brand-logo demo">
              <img src="../Dependencies/img/ai_nstein_logo.svg" alt="ainstein logo" width="120" />
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
            <span class="menu-header-text">Text section</span>
          </li>
          <!-- Section text -->

          <!-- Page link (Manage users) -->
          <li class="menu-item">
            <a href="dashboard.html" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div class="text-truncate">Manage users</div>
            </a>
          </li>
          <!-- Page link (Manage users) -->
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

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search bx-md"></i>
                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search..." />
              </div>
            </div>
          </div>
        </nav>
        <!-- Navbar -->

        <!-- Base Content -->
        <div class="content-wrapper">
          <div class="content-body mt-4">
            <div class="container-xxl">
              <form action="updateUserData.php?id=<?php echo $user['id']; ?> " method="POST" class="row">

                <!-- personal info card -->
                <div class="col-md-6 col-sm-12 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Personal Information</h5>
                      
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user["email"] ?>">
                      </div>

                      <div class="row">
                        <div class="mb-3 col-6">
                          <label for="username" class="form-label">Username</label>
                          <input type="text" class="form-control" id="username" name="username" value="<?php echo $user["username"] ?>">
                        </div>
                        <div class="mb-3 col-6">
                          <label for="age" class="form-label">age</label>
                          <input type="number" class="form-control" id="age" name="age" value="<?php echo $user["age"] ?>">
                        </div>
                      </div>

                      <div class="row">
                        <div class="mb-3 col-6">
                          <label for="gender" class="form-label">gender</label>
                            <select name="gender" id="gender" class="form-select">
                            <option value="Male"<?php if ($user["sexe"] == "Male") echo " selected"; ?>>Male</option>
                            <option value="Female"<?php if ($user["sexe"] == "Female") echo " selected"; ?>>Female</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                          <label for="role" class="form-label">role</label>
                          <input type="text" class="form-control" id="role" name="role" value="<?php echo $user["role"] ?>" disabled>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <!-- personal info card -->

                <!-- other info card -->
                <div class="col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Professional / Intellectual Information</h5>

                      <div class="mb-3">
                        <label for="it_background" class="form-label">IT Background</label>
                        <select name="it_background" id="it_background" class="form-select" <?php if($user["itbackground"] == null) echo "disabled"; ?> >
                          <option value="No" <?php if ($user["itbackground"] == "No") echo " selected"; ?> >No, I don't</option>
                          <option value="KindOf" <?php if ($user["itbackground"] == "KindOf") echo " selected"; ?> >Kind of</option>
                          <option value="Yes" <?php if ($user["itbackground"] == "Yes") echo " selected"; ?> >Yes, I do</option>
                        </select>
                      </div>
                      
                      <div class="mb-3">
                        <label for="email" class="form-label">Education Level</label>
                        <select name="education_level" id="education_level" class="form-select" <?php if($user["educationlvl"] == null) echo "disabled"; ?> >
                          <option value="None"<?php if ($user["educationlvl"] == "None") echo " selected"; ?>>None</option>
                          <option value="Primary"<?php if ($user["educationlvl"] == "Primary") echo " selected"; ?>>Primary</option>
                          <option value="Prep School"<?php if ($user["educationlvl"] == "Prep School") echo " selected"; ?>>Prep School</option>
                          <option value="High School"<?php if ($user["educationlvl"] == "High School") echo " selected"; ?>>High School</option>
                          <option value="Bachelors"<?php if ($user["educationlvl"] == "Bachelors") echo " selected"; ?>>Bachelors</option>
                          <option value="Masters"<?php if ($user["educationlvl"] == "Masters") echo " selected"; ?>>Masters</option>
                          <option value="PhD"<?php if ($user["educationlvl"] == "PhD") echo " selected"; ?>>PhD</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="experience" class="form-label">Experience</label>
                        <select name="experience" id="experience" class="form-select" <?php if($user["experience"] == null) echo "disabled"; ?> >
                          <option value="none">No experience</option>
                          <option value="1-2" <?php if ($user["experience"] == "1-2") echo "selected"; ?>>1 ~ 2 years</option>
                          <option value="2-5" <?php if ($user["experience"] == "2-5") echo "selected"; ?>>2 ~ 5 years</option>
                          <option value="5-10" <?php if ($user["experience"] == "5-10") echo "selected"; ?>>5 ~ 10 years</option>
                          <option value="+10" <?php if ($user["experience"] == "+10") echo "selected"; ?>>+10 years</option>
                        </select>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- other info card -->

                <div class="col-12 text-center">
                  <button class="btn btn-primary col-12">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Base Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl">
            <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
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
