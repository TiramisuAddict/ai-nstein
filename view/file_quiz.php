<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Agen | Quiz Page</title>

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

  <!-- Favicon -->
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
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quiz.php?quiz=1">Quiz 1</a> <!-- Changement de blog à quiz -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quiz.php?quiz=2">Quiz 2</a> <!-- Changement de blog à quiz -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quiz.php?quiz=3">Quiz 3</a> <!-- Changement de blog à quiz -->
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="team.html">Team</a>
            <a class="dropdown-item" href="team-single.html">Team Details</a>
            <a class="dropdown-item" href="career.html">Career</a>
            <a class="dropdown-item" href="career-single.html">Career Details</a>
            <a class="dropdown-item" href="blog-single.html">Blog Details</a>
            <a class="dropdown-item" href="pricing.html">Pricing</a>
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
        <h1 class="display-1 text-white font-weight-bold font-primary">Our Quiz</h1> <!-- Changement de Blog à Quiz -->
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- quiz -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4">
        <article class="card">
          <img src="images/blog/post-1.jpg" alt="post-thumb" class="card-img-top mb-2">
          <div class="card-body p-0">
            <time>January 15, 2018</time>
            <a href="quiz.php?quiz=1" class="h4 card-title d-block my-3 text-dark hover-text-underline">Quiz 1</a>
            <a href="quiz.php?quiz=1" class="btn btn-transparent">Take the quiz</a> <!-- Changement de Read more à Take the quiz -->
          </div>
        </article>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <article class="card">
          <img src="images/blog/post-2.jpg" alt="post-thumb" class="card-img-top mb-2">
          <div class="card-body p-0">
            <time>January 15, 2018</time>
            <a href="quiz.php?quiz=2" class="h4 card-title d-block my-3 text-dark hover-text-underline">Quiz 2</a>
            <a href="quiz.php?quiz=2" class="btn btn-transparent">Take the quiz</a> <!-- Changement de Read more à Take the quiz -->
          </div>
        </article>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <article class="card">
          <img src="images/blog/post-3.jpg" alt="post-thumb" class="card-img-top mb-2">
          <div class="card-body p-0">
            <time>January 15, 2018</time>
            <a href="quiz.php?quiz=3" class="h4 card-title d-block my-3 text-dark hover-text-underline">Quiz 3</a>
            <a href="quiz.php?quiz=3" class="btn btn-transparent">Take the quiz</a> <!-- Changement de Read more à Take the quiz -->
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
<!-- /quiz -->

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
            <li><a href="#" class="text-light d-block mb-3">Contact</a></li>
            <li><a href="#" class="text-light d-block mb-3">About us</a></li>
            <li><a href="#" class="text-light d-block mb-3">Quiz</a></li> <!-- Changement de Blog à Quiz -->
            <li><a href="#" class="text-light d-block mb-3">Support</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
