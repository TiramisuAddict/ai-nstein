<?php
// Connexion à la base de données
$host = "localhost";
$dbname = "youssefbd";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES utf8");
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer les articles de la base de données
$query = $pdo->query("SELECT * FROM articles ORDER BY date_creation DESC");
$articles = $query->fetchAll(PDO::FETCH_ASSOC);





// Récupérer la moyenne des notes
function getAverageRating($articleId, $pdo) {
  $query = $pdo->prepare("SELECT AVG(note) AS avg_rating FROM ratings WHERE article_id = :article_id");
  $query->bindParam(':article_id', $articleId, PDO::PARAM_INT);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  return $result['avg_rating'] ? round($result['avg_rating'], 1) : null;
}




// Fonction pour afficher les étoiles

function displayStars($rating) {
  $fullStars = floor($rating); // Nombre d'étoiles pleines
  $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // Étoile à moitié pleine
  $emptyStars = 5 - $fullStars - $halfStar; // Étoiles vides

  echo '<div class="star-rating-display">';
  
  // Affichage des étoiles pleines
  for ($i = 0; $i < $fullStars; $i++) {
      echo '<span class="filled">★</span>'; // Étoile pleine
  }
  
  // Affichage de l'étoile à moitié pleine (si nécessaire)
  if ($halfStar) {
      echo '<span class="half-filled">★</span>'; // Étoile moitié pleine
  }
  
  // Affichage des étoiles vides
  for ($i = 0; $i < $emptyStars; $i++) {
      echo '<span class="empty">★</span>'; // Étoile vide
  }

  echo '</div>';
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

  <link href="css/style.css" rel="stylesheet">

  <style>
    .star-rating-display {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        gap: 5px;
        font-size: 24px;
        color: gray;
    }

    .star-rating-display span.filled {
        color: gold;
    }
</style>



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

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Cours</title>
  
</head>

<body>












<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <header>
        <h1 class="text-center my-4">Liste des Articles</h1>
    </header>

    <section id="articles-list" class="container my-5">
        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <?php if (!empty($article['image'])): ?>
                            <img class="card-img-top" src="uploads/<?= htmlspecialchars($article['image']); ?>" alt="<?= htmlspecialchars($article['titre']); ?>">
                        <?php else: ?>
                            <img class="card-img-top" src="placeholder.jpg" alt="Image par défaut">
                        <?php endif; ?>

                        <div class="card-body">
                            <a href="articleDetails.php?id=<?= $article['id']; ?>" class="text-decoration-none text-dark">
                                <h5 class="card-title"><?= htmlspecialchars($article['titre']); ?></h5>
                                <p class="card-text"><?= htmlspecialchars($article['contenu']); ?></p>
                                <p class="card-text">
                                    <small class="text-muted">Auteur : <?= htmlspecialchars($article['auteur']); ?></small>
                                </p>
                            </a>

                            <!-- Affichage de la note sous forme d'étoiles -->
                            <div><strong>Note moyenne : </strong>
                                <?php
                                $averageRating = getAverageRating($article['id'], $pdo); // Récupérer la note moyenne
                                if ($averageRating !== null) {
                                    displayStars($averageRating); // Afficher les étoiles correspondant à la moyenne
                                } else {
                                    echo "Pas de note"; // Si aucune note n'est disponible
                                }
                                ?>
                            </div>

                            <!-- Formulaire pour ajouter un commentaire -->
                            <form id="commentForm" action="addComment.php" method="POST">
                                <input type="hidden" name="article_id" value="<?= $article['id']; ?>">
                                <div class="mb-3">
                                    <textarea name="message" id="comment-message" class="form-control" rows="2" placeholder="Écrire un commentaire..."></textarea>
                                    <small class="text-danger d-none" id="message-error">Le message ne peut pas être vide et doit contenir entre 10 et 500 caractères.</small>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="auteur" id="comment-author" class="form-control" placeholder="Votre nom">
                                    <small class="text-danger d-none" id="author-error">Le nom est obligatoire et doit contenir uniquement des lettres et des espaces.</small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Commenter</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('#commentForm').forEach(form => {
                form.addEventListener('submit', (e) => {
                    let isValid = true;

                    // Validation du message
                    const messageField = form.querySelector('#comment-message');
                    const messageError = form.querySelector('#message-error');
                    const messageValue = messageField.value.trim();

                    if (!messageValue || messageValue.length < 10 || messageValue.length > 500) {
                        isValid = false;
                        messageError.classList.remove('d-none');
                    } else {
                        messageError.classList.add('d-none');
                    }

                    // Validation de l'auteur
                    const authorField = form.querySelector('#comment-author');
                    const authorError = form.querySelector('#author-error');
                    const authorValue = authorField.value.trim();

                    if (!authorValue || !/^[A-Za-zÀ-ÖØ-öø-ÿ ]+$/.test(authorValue)) {
                        isValid = false;
                        authorError.classList.remove('d-none');
                    } else {
                        authorError.classList.add('d-none');
                    }

                    // Bloque la soumission si des erreurs sont détectées
                    if (!isValid) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Transition et effet au survol (hover) des cartes */
        .card-body {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Effet hover sur la carte */
        .card-body:hover {
            transform: translateY(-5px); /* Légère élévation */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Ombre */
            background-color: #f8f9fa; /* Changement léger de couleur de fond */
        }

        /* Lien de l'article sans soulignement ni couleur */
        a.text-decoration-none.text-dark {
            text-decoration: none; /* Pas de soulignement */
            color: inherit; /* Garde la couleur actuelle */
            transition: color 0.3s ease; /* Transition fluide */
        }

        /* Lien au survol avec couleur navy */
        a.text-decoration-none.text-dark:hover {
            color: navy; /* Change la couleur au survol */
            text-decoration: underline; /* Ajoute un soulignement */
        }

        /* Styles pour les étoiles */
        .star-rating-display {
            font-size: 1.5em;
            color: gold;
        }

        .filled {
            color: gold;
        }

        .half-filled {
            color: gold;
        }

        .empty {
            color: lightgray;
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
