<?php
  session_start();
  if ($_SESSION['role'] != 'Admin')
    header('Location: page404.html');

  require_once '../Controller/UserController.php';  

  $filter = $_GET['statusFilter'] ?? 'Pending';

  $userController = new UserController();

  $experts = $userController->getFiltredExperts($filter);
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Braah+One&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../Dependencies/Template/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../Dependencies/Template/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../Dependencies/Template/css/demo.css" />

    <link rel="stylesheet" href="../Dependencies/Template/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../Dependencies/Template/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../Dependencies/Template/vendor/css/page-auth.css" />

    <link rel="stylesheet" href="../Dependencies/Template/vendor/css/pretty-btn.css" />

    <script src="../Dependencies/Template/vendor/js/helpers.js"></script>
    <script src="../Dependencies/Template/js/config.js"></script>

  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <!-- logo -->
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="../Dependencies/img/ai_nstein_logo.svg" alt="ainstein logo" width="120"/>
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
            
              <div class="card m-4">
                <form action="expertRequestList.php?<?php echo $_GET['statusFilter'] ?? ''; ?>">
                  <div class="d-flex justify-content-between align-items-center">
                    <select class="form-select m-2" name="statusFilter">
                      <option value="All" <?php if ($filter == "All") echo " selected"; ?> >All</option>
                      <option value="Approved" <?php if ($filter == "Approved") echo " selected"; ?> >Approved</option>
                      <option value="Pending" <?php if ($filter == "Pending") echo " selected"; ?>>Pending</option>
                      <option value="Rejected" <?php if ($filter == "Rejected") echo " selected"; ?>>Rejected</option>
                    </select>
                    <button type="submit" class="btn btn-primary m-2" id="applyFilter">Apply</button>
                  </div>
                </form>
              </div>

							<div class="card m-4">
								<div class="table-responsive text-nowrap">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Username</th>
                          <th>Email</th>
                          <th>Age</th>
													<th>Gender</th>
													<th>Experience</th>
													<th>Document</th>
													<th colspan="2">Actions</th>
												</tr>
											</thead>
											<tbody class="table-border-bottom-0">
                        <?php foreach ($experts as $expert): ?>
                          <tr>
                            <td><?php echo $expert['username']; ?></td>
                            <td><?php echo ($expert['email']); ?></td>
                            <td><?php echo ($expert['age']); ?></td>
                            <td><?php echo ($expert['sexe']); ?></td>
                            <td><?php echo ($expert['experience']); ?></td>
                            <td><a href="<?php echo $expert['proofdoc']; ?>">Download</a></td>
                            
                            <td>
                              <?php 
                                if($expert['status'] == "Pending") {
                                  echo '<a href="updateExpertStatus.php?id=' . $expert["id"] . '&status=Approved"> <button class="btn btn-sm btn-outline-success"><i class="bx bx-check"></i> Approve </button></a>';
                                }else {
                                  echo '<a href=" '.($expert['status'] == "Rejected" ? '' : 'updateUser.php?id=' . $expert["id"] . '').' "> <button class="btn btn-sm btn-outline-warning" ' . ($expert['status'] == "Rejected" ? 'disabled' : '') . '><i class="bx bx-edit-alt"></i> Edit </button></a>';
                                }
                              ?>
                            </td>

                            <td>
                              <?php 
                                if($expert['status'] == "Pending") {
                                  echo '<a href="updateExpertStatus.php?id=' . $expert["id"] . '&status=Rejected"> <button class="btn btn-sm btn-outline-danger"><i class="bx bx-x"></i> Reject </button></a>';
                                }else {
                                  echo '<a href="deleteExpert.php?id=' . $expert["id"] . '"> <button class="btn btn-sm btn-outline-secondary"><i class="bx bx-trash"></i> Delete </button></a>';
                                }
                              ?>
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
    <script src="../Dependencies/Template/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../Dependencies/Template/vendor/js/menu.js"></script>
    <script src="../Dependencies/Template/js/main.js"></script>

  </body>
</html>