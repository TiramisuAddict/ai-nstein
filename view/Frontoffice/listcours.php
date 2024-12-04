<?php



include '../../controller/CoursC.php';

$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

$coursC = new CoursC();
$list = $coursC->listCours($order); // Inclut le tri ici

if (isset($_POST['search'])) {
    $list = $coursC->chercher($_POST['search']);
}

?>
<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>AI-NSTEIN | Bootstrap Agency Template</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <!-- card slider -->
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>
  

<header class="navigation fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="index.html"><span style="font-size: 1.5rem; font-weight: bold; color: #fff;">AI-NSTEIN</span></a>
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
          <a class="nav-link" href="listseance.php">Seances</a>
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



<div class="container mt-5">
    <div class="d-flex justify-content-between mb-5">
        <!-- Formulaire de Recherche (à gauche) -->
        <form action="listcours.php" method="post" class="d-flex" style="max-width: 600px; width: 100%;">
            <input type="text" name="search" class="form-control rounded-start" id="recherche" placeholder="Rechercher Cours">
            <button class="btn btn-outline-primary rounded-end" type="submit">Rechercher</button>
        </form>

        <!-- Formulaire de Tri (à droite) -->
        <form action="listcours.php" method="get" class="d-flex" style="max-width: 250px;">
    <label for="order">Trier par date pub :</label>
    <select name="order" id="order" class="form-control" onchange="this.form.submit()">
        <option value="ASC" <?= isset($_GET['order']) && $_GET['order'] == 'ASC' ? 'selected' : ''; ?>>Croissant</option>
        <option value="DESC" <?= isset($_GET['order']) && $_GET['order'] == 'DESC' ? 'selected' : ''; ?>>Décroissant</option>
    </select>
</form>

    </div>
</div>
<style>

    /* Espacement avec le header */
.container.mt-5 {
    margin-top: 60px; /* Augmenté pour plus d'espacement entre le header et les formulaires */
}

/* Espacement du titre */
section.container.mt-5 h2 {
    margin-bottom: 50px; /* Espacement entre le titre et la liste des sponsors */
}

/* Espacement entre les formulaires */
.d-flex.justify-content-between.mb-5 {
    margin-top: 50px; /* Espacement entre le header et les formulaires */
    margin-bottom: 50px; /* Espacement entre les formulaires et la section suivante */
}

/* Espacement entre les formulaires */
.d-flex.justify-content-between.mb-5 {
    margin-top: 50px; /* Espacement entre le header et les formulaires */
    margin-bottom: 50px; /* Espacement entre les formulaires et la section suivante */
}

/* Formulaire de recherche */
form.d-flex {
    display: flex;
    align-items: center;
}

form input#recherche {
    border: 1px solid #ddd;
    border-right: none;
    border-radius: 10px 0 0 10px;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

form input#recherche:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

form button.btn {
    border: 1px solid #007bff;
    border-radius: 0 10px 10px 0;
    background-color: #007bff;
    color: #fff;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    transition: background-color 0.2s ease-in-out, transform 0.2s ease-in-out;
}

form button.btn:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Formulaire de tri */
form.d-flex select {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 8px 15px;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

form.d-flex select:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

form.d-flex select option {
    font-size: 1rem;
}

/* Espacement avec le header */
.container.mt-5 {
    margin-top: 60px; /* Augmenté pour plus d'espacement entre le header et les formulaires */
}

body {
    font-family: 'Arial', sans-serif;
}

footer {
    padding-top: 20px; /* Espacement supérieur du footer */
}

</style>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Cours</title>
  
</head>









<body>
  <div class="container my-5">
      <!-- En-tête de page -->
      <div class="text-center mb-5">
          <h1 class="text-primary">Liste des Cours</h1>
      </div>

      <!-- Affichage des cours sous forme de cartes -->
      <div class="row">
          <?php
          if (empty($list)) {
            echo "<p>Aucun cours trouvé.</p>";
        } else 
            foreach ($list as $cours) {
          ?>
              <div class="col-md-4 mb-4">
                  <div class="card shadow-lg course-card">
                      <!-- Image du cours -->
                      <div class="course-img-wrapper">
                          <img src="<?= htmlspecialchars($cours['image']); ?>" 
                               class="card-img-top course-img" 
                               alt="Image de <?= htmlspecialchars($cours['nom_matiere']); ?>" 
                               style="height: 200px; object-fit: cover;">
                      </div>
                      
                      <!-- Contenu de la carte -->
                      <div class="card-body">
                          <h5 class="card-title text-center"><?= htmlspecialchars($cours['nom_matiere']); ?></h5>
                          <p class="card-text">
                              <strong>ID Utilisateur :</strong> <?= htmlspecialchars($cours['id_user']); ?><br>
                              <strong>Date de Publication :</strong> <?= htmlspecialchars($cours['date_pub']); ?><br>
                              <strong>Type :</strong> <?= htmlspecialchars($cours['type']); ?>
                          </p>
                      </div>
                  </div>
              </div>
          <?php
          }
          ?>
      </div>
  </div>

  <!-- Styles pour les animations -->
  <style>
      /* Animation de la carte */
      .course-card {
          transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .course-card:hover {
          transform: translateY(-10px); /* La carte "monte" légèrement */
          box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); /* Ombre plus intense */
      }

      /* Animation de l'image */
      .course-img-wrapper {
          overflow: hidden; /* Masquer les débordements */
      }

      .course-img {
          transition: transform 0.3s ease;
      }

      .course-card:hover .course-img {
          transform: scale(1.1); /* Zoom léger sur l'image */
      }
  </style>
</body>











<!-- footer -->
<footer class="bg-secondary position-relative">
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