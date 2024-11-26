<?php
require_once '../../Controller/QuestionController.php';
require_once '../../Controller/ReponseController.php';
require_once '../../Controller/QuizController.php';
$QuizController = new QuizController();
  $Quizzes = $QuizController->ListQuiz();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $difficulty = $_POST['difficulty'];
  if ($difficulty != NULL) {
    var_dump($difficulty);
    $Quizzes = $QuizController->ListQuizByDefficulty($difficulty);
  } else {
    $Quizzes = $QuizController->ListQuiz();
  }
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

  <!-- theme meta -->
  <meta name="theme-name" content="agen" />

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
            <a class="nav-link" href="index.html">quiz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.html">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="quiz.html">home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="portfolio.html">Portfolio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Pages</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="team.html">Team</a>
              <a class="dropdown-item" href="team-single.html">Team Details</a>
              <a class="dropdown-item" href="career.html">Career</a>
              <a class="dropdown-item" href="career-single.html">Career Details</a>
              <a class="dropdown-item" href="quiz-single.html">quiz-single Details</a>
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

  <!-- banner -->
  <section class="banner bg-cover position-relative d-flex justify-content-center align-items-center"
    data-background="images/banner/banner2.jpg">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="display-1 text-white font-weight-bold font-primary">Creative Agency</h1>
        </div>
      </div>
    </div>
  </section>
  <!-- /banner -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-4">
          <form method="POST">
            <!-- Filtrer par difficulté -->
            <div class="form-group">
              <label for="difficulty-filter">Filtrer par difficulté :</label>
              <select name="difficulty" id="difficulty-filter" class="form-control">
                <option value="">Toutes</option> <!-- Option pour réinitialiser le filtre -->
                <option value="facile">Facile</option>
                <option value="moyenne">Moyenne</option>
                <option value="difficile">Difficile</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Appliquer le filtre</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row">
        <?php foreach ($Quizzes as $quiz) { ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <article class="card">
              <img src="images/blog/post-1.jpg" alt="Quiz Thumbnail" class="card-img-top mb-2">
              <div class="card-body p-0">

                <div class="quiz-attribute">
                  <label for="title-<?php echo $quiz['id']; ?>">Title:</label>
                  <time id="title-<?php echo $quiz['id']; ?>"><?php echo htmlspecialchars($quiz['title']); ?></time>
                </div>

                <div class="quiz-attribute">
                  <label for="time-<?php echo $quiz['id']; ?>">Time:</label>
                  <time id="time-<?php echo $quiz['id']; ?>"><?php echo htmlspecialchars($quiz['time']); ?> minutes</time>
                </div>

                <div class="quiz-attribute">
                  <label for="difficulty-<?php echo $quiz['id']; ?>">Difficulty:</label>
                  <?php echo htmlspecialchars($quiz['difficulty']); ?>
                  </a>
                </div>
                <div class="quiz-attribute">
                  <label>Questions:</label>
                  <?php
                  $questions = $QuizController->ListQuestionIdsByQuizId($quiz['id']);
                  foreach ($questions as $question) {
                    echo "<li>" . htmlspecialchars($question['text']) . "</li>";
                  }
                  ?>
                </div>
                <div class="quiz-action mt-3">
                  <a href="quiz.php?id=<?php echo $quiz['id']; ?>" class="btn btn-primary">Start Quiz</a>
                </div>
              </div>
            </article>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

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
              <li><a href="#" class="text-light d-block mb-3">quiz</a></li>
              <li><a href="#" class="text-light d-block mb-3">Support</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-6">
            <h4 class="text-white mb-5">Company</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-light d-block mb-3">Service</a></li>
              <li><a href="#" class="text-light d-block mb-3">Conatact</a></li>
              <li><a href="#" class="text-light d-block mb-3">About us</a></li>
              <li><a href="#" class="text-light d-block mb-3">quiz</a></li>
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
            <p class="text-light mb-0">Copyright &copy; 2019 a theme by <a class="text-gradient-primary"
                href="https://themefisher.com">themefisher.com</a>
            </p>
          </div>
          <div class="col-md-6">
            <ul class="list-inline text-md-right text-center">
              <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-facebook"></i></a>
              </li>
              <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-twitter-alt"></i></a>
              </li>
              <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-instagram"></i></a>
              </li>
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
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
  <script src="plugins/google-map/gmap.js"></script>

  <!-- Main Script -->
  <script src="js/script.js"></script>

</body>

</html>