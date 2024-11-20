<?php
include '../../controller/CoursC.php';

// Instancier le contrôleur et récupérer la liste des cours
$coursC = new CoursC();
$list = $coursC->listCours();
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
  <title>Agen | Bootstrap Agency Template</title>

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
    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="Egen"></a>
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
  <style>
      /* Style général du body pour une présentation moderne */
      body {
          font-family: 'Arial', sans-serif;
          background-color: #f4f6f9;
          margin: 0;
          padding: 0;
      }

      /* Entête de la page avec un fond éducatif */
      h1 {
          font-size: 2em;
          color: #2e3a59;
      }

      /* Container pour centrer le contenu */
      .container {
          max-width: 1200px;
          margin: 50px auto;
          padding: 20px;
          background-color: white;
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
          border-radius: 8px;
      }

      /* Style pour le tableau */
      .table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 30px;
      }

      .table th,
      .table td {
          padding: 15px;
          text-align: center;
          border: 1px solid #ddd;
      }

      .table th {
          background-color: #4CAF50;
          color: white;
      }

      .table tr:nth-child(even) {
          background-color: #f2f2f2;
      }

      /* Boutons de style */
      .btn {
          padding: 8px 20px;
          font-size: 14px;
          text-decoration: none;
          border-radius: 5px;
          transition: background-color 0.3s;
      }

      .btn-primary {
          background-color: #007bff;
          color: white;
      }

      .btn-warning {
          background-color: #ffc107;
          color: white;
      }

      .btn-danger {
          background-color: #dc3545;
          color: white;
      }

      .btn:hover {
          opacity: 0.8;
      }

      /* Pour l'image */
      .table img {
          max-width: 80px;
          height: auto;
          border-radius: 5px;
      }

      /* Style pour les liens et le bouton d'ajout */
      .d-flex {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 20px;
      }

      .d-flex .btn {
          font-size: 16px;
      }
  </style>
</head>













<body>
  <div class="container">
      <!-- Entête de page avec boutons pour ajouter un cours -->
      <div class="d-flex">
          <h1>Liste des Cours</h1>
          <div>
              <a href="addCours.php" class="btn btn-primary">Ajouter un Cours</a>
          </div>
      </div>

      <!-- Tableau des cours -->
      <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>ID Utilisateur</th>
                      <th>Nom Matière</th>
                      <th>Date de Publication</th>
                      <th>Type</th>
                      <th>Image</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  // Boucle pour afficher chaque cours dans le tableau
                  foreach ($list as $cours) {
                  ?>
                      <tr>
                          <td><?= htmlspecialchars($cours['id_user']); ?></td>
                          <td><?= htmlspecialchars($cours['nom_matiere']); ?></td>
                          <td><?= htmlspecialchars($cours['date_pub']); ?></td>
                          <td><?= htmlspecialchars($cours['type']); ?></td>
                          <td>
                              <!-- Affichage de l'image avec une taille maximale -->
                              <img src="<?= htmlspecialchars($cours['image']); ?>" alt="Image de <?= htmlspecialchars($cours['nom_matiere']); ?>">
                          </td>
                          <td>
                              <!-- Lien vers la page de modification du cours -->
                              <a href="updatecours.php?id=<?= $cours['id_matiere']; ?>" class="btn btn-warning">Modifier</a>
                          </td>
                          <td>
                              <!-- Lien de suppression avec confirmation -->
                              <a href="deleteCours.php?id_matiere=<?= htmlspecialchars($cours['id_matiere']); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?');">Supprimer</a>
                          </td>
                      </tr>
                  <?php
                  }
                  ?>
              </tbody>
          </table>
      </div>
  </div>
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