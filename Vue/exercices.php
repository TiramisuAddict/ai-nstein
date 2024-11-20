<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercises - Front Office</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Favicon -->
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
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .card {
            cursor: pointer;
            transition: transform 0.2s ease;
            text-align: center;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 1rem;
        }
        .row {
            gap: 95px;
        }
    </style>
</head>
<h5 class="pb-1 mb-6"></h5>
<body>
  <div class="container mt-5">
      <div class="row justify-content-center">
          <!-- Card 1 -->
          <div class="col-md-5">
              <a href="upload.php" class="text-decoration-none text-dark">
                  <div class="card d-flex">
                      <img class="card-img-left" src="assets/img/elements/6.webp" alt="Card image" >
                      <div class="card-body">
                          <h5 class="card-title">Mini-Project 1</h5>
                          <p class="card-text">
                              Learn the fundamentals of AI, including an introduction to machine learning, neural networks, and basic algorithms.
                          </p>
                          <p class="card-text"><small class="text-muted"><strong>Difficulty Level:</strong> Beginner</small></p>
                      </div>
                  </div>
              </a>
          </div>

          <!-- Card 2 -->
          <div class="col-md-5">
              <a href="upload.php" class="text-decoration-none text-dark">
                  <div class="card d-flex">
                      <img class="card-img-left" src="assets/img/elements/8.jpg" alt="Card image" >
                      <div class="card-body">
                          <h5 class="card-title">Mini-Project 2</h5>
                          <p class="card-text">
                              Dive into data preprocessing and analysis techniques, essential for training accurate machine learning models.
                          </p>
                          <p class="card-text"><small class="text-muted"><strong>Difficulty Level:</strong> Intermediate</small></p>
                      </div>
                  </div>
              </a>
          </div>
      </div>
  </div>
</body>

    <!--choose files
    <div class="card">
        <div class="card-body">
          <div class="mb-4">
            <label for="formFileMultiple" class="form-label"></label>
            <input class="form-control" type="file" id="formFileMultiple" multiple />
          </div>
        </div>
    </div>
    well done icon 
    <div class="alert alert-primary alert-dismissible" role="alert">
    <h4 class="alert-heading d-flex align-items-center"><span class="alert-icon rounded-circle"><i class="bx bx-coffee"></i></span>Well done :)</h4>
    <hr>
    <p class="mb-0">Halvah cheesecake toffee. Cupcake jelly cookie chocolate bar topping. Cupcake candy dessert biscuit
      chocolate halvah bear claw sweet liquorice. Gummies wafer candy canes chocolate lemon drops.</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>-->

</body>
</html>