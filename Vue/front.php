<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles - Front Office</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte avec Image, Titre et Texte</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
 
</head>
<body>
    <header>
        <h1 align="center" style="font-size: 2.5em;">Articles</h1>
        <input type="text" placeholder="Rechercher un article..." id="search-bar">
    </header>

    <section id="articles-list">
        <article class="article">
            <p class="date">Publié le : 11-11-2024</p>
            <p class="summary">Résumé de l'article...</p>
            
        </article>
        <!-- Ajouter d'autres articles ici -->
    </section>

    <div class="container my-5">
        <div class="row">
            <!-- Première carte -->
            <div class="col-md-6 col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="1692166016697.jpg" alt="Image de la carte">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Les nouveautés sur notre thématique.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
    
            <!-- Deuxième carte -->
            <div class="col-md-6 col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="Cours-en-Ligne-Gratuits-de-lUniversite-Harvard.webp" alt="Image de la carte">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Les nouveautés sur notre thématique.</p>
                        <p class="card-text"><small class="text-muted">Last updated 22 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <h6 class="text-body mb-6">When should we send you notifications?</h6>
        <form action="javascript:void(0);">
          <div class="row">
            <div class="col-sm-6">
              <select id="sendNotification" class="form-select" name="sendNotification">
                <option selected>Only when I'm online</option>
                <option>Anytime</option>
              </select>
            </div>
    

</body>
</html>