<?php
require_once '../Config.php';
require_once '../Model/exercice.php';

$predictedDifficulty = isset($_GET['predicted_difficulty']) ? intval($_GET['predicted_difficulty']) : null;

// Map the predicted difficulty number to the corresponding string value
$predicted_difficulty_map = [
    0 => 'Beginner',
    1 => 'Intermediate',
    2 => 'Advanced'
];

$predictedDifficultyStr = isset($predicted_difficulty_map[$predictedDifficulty]) ? $predicted_difficulty_map[$predictedDifficulty] : null;

try {
    $conn = config::getConnexion();
    if ($predictedDifficultyStr !== null) {
      // Set the order based on the predicted difficulty
      $order = "";
      if ($predictedDifficulty == 2) {
          $order = "'Advanced', 'Intermediate', 'Beginner'";
      } elseif ($predictedDifficulty == 1) {
          $order = "'Intermediate', 'Advanced', 'Beginner'";
      } elseif ($predictedDifficulty == 0) {
          $order = "'Beginner', 'Intermediate', 'Advanced'";
      }
    }
    if ($predictedDifficultyStr !== null) {
        $stmt = $conn->prepare("
            SELECT id, title, description, difficulty_level, author_name, project_file, image, date_creation 
            FROM exercises
            ORDER BY 
                CASE 
                    WHEN difficulty_level = :predicted_difficulty THEN 1 
                    ELSE 0 
                END DESC, 
                FIELD(difficulty_level, $order) ASC
        ");

        $stmt->execute(['predicted_difficulty' => $predictedDifficultyStr]);
        $projects = $stmt->fetchAll();    
    } else {
        $stmt = $conn->query("SELECT * FROM exercises ORDER BY difficulty_level ASC");
        $projects = $stmt->fetchAll();
    }
    
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <meta name="theme-name" content="agen" />
  <title>Exercises - Front Office</title>
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">
  <link rel="stylesheet" href="css/style.css" />
</head>
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
            gap: 30px;
        }
    </style>
</head>
<body>
<header class="navigation fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="exercices.php" style="margin-left: 0; padding: 0;">
    <img src="assets/img/elements/logoWeb.svg" alt="Egen" style="width: 200px; height: auto; object-fit: contain;">
</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="listcours.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listcours.php">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="exercices.php">Exercises</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.html">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="portfolio.html">Portfolio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="team.html">Team</a>
            <a class="dropdown-item" href="team-single.html">Team Details</a>
            <a class="dropdown-item" href="career.html">Career</a>
            <a class="dropdown-item" href="career-single.html">Career Details</a>
            <a class="dropdown-item" href="blog-single.html">Blog Details</a>
            <a class="dropdown-item" href="pricing.html">Pricing</a></a>
            <a class="dropdown-item" href="faqs.html">FAQ's</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- page-title -->
<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">WELCOME OUR BRILLANT STUDENT</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Cours</title>
  
</head>

<body>
  <div class="container mt-5">
      <div class="row justify-content-center">
          <?php if ($projects): ?>
              <?php foreach ($projects as $project): ?>
                  <div class="col-md-5">
                  <a href="upload.php?exercise_id=<?= htmlspecialchars($project['id']) ?>" class="card-link">                          
                    <div class="card d-flex">
                              <img class="card-img-top" src="data:image/jpeg;base64,<?= base64_encode($project['image']) ?>" alt="Project image">
                              <div class="card-body">
                                  <h5 class="card-title"><?= htmlspecialchars($project['title']) ?></h5>
                                  <p class="card-text"><?= htmlspecialchars($project['description']) ?></p>
                                  <p><strong>Difficulty Level:</strong> <?= htmlspecialchars($project['difficulty_level']) ?></p>
                                  <p class="card-text">
                                      <small class="text-muted"><strong>Created On:</strong> <?= date('F j, Y', strtotime($project['date_creation'])) ?></small>
                                  </p>
                              </div>
                          </div>
                  </a>
                  </div>
              <?php endforeach; ?>
          <?php else: ?>
              <p class="text-center">No projects found.</p>
          <?php endif; ?>
      </div>
  </div>

  <!-- footer -->
<footer class="bg-secondary position-relative" style="margin-top: 30px;">
  <img src="images/backgrounds/map.png" class="img-fluid overlay-image" alt="">
  <div class="section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-3 col-6">
          <h4 class="text-white mb-5">About</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-light d-block mb-3">Service</a></li>
            <li><a href="#" class="text-light d-block mb-3">Conatact</a></li>
            <li><a href="#" class="text-light d-block mb-3">About us</a></li>
            <li><a href="#" class="text-light d-block mb-3">Blog</a></li>
            <li><a href="#" class="text-light d-block mb-3">Support</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-6">
          <h4 class="text-white mb-5">Company</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-light d-block mb-3">Service</a></li>
            <li><a href="#" class="text-light d-block mb-3">Conatact</a></li>
            <li><a href="#" class="text-light d-block mb-3">About us</a></li>
            <li><a href="#" class="text-light d-block mb-3">Blog</a></li>
            <li><a href="#" class="text-light d-block mb-3">Support</a></li>
          </ul>
        </div>
        <div class="col-md-6">
          <div class="bg-white p-4">
            <h3>Contact us</h3>
            <form action="#">
              <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Full name">
              <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Email address">
              <textarea name="message" id="message" class="form-control mb-4 px-0" placeholder="Message"></textarea>
              <button class="btn btn-primary" type="submit">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="pb-4">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-left">
          <p class="text-light mb-0">Copyright &copy; 2019 a theme by <a class="text-gradient-primary" href="https://themefisher.com">themefisher.com</a>
          </p>
        </div>
        <div class="col-md-6">
          <ul class="list-inline text-md-right text-center">
            <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-instagram"></i></a></li>
            <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-github"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- shuffle -->
<script src="plugins/shuffle/shuffle.min.js"></script>
<!-- apear js -->
<script src="plugins/counto/apear.js"></script>
<!-- counter -->
<script src="plugins/counto/counTo.js"></script>
<!-- card slider -->
<script src="plugins/card-slider/js/card-slider-min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>
