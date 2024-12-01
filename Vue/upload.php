<?php
require_once '../Config.php';
$pdo = config::getConnexion();
if (isset($_GET['exercise_id'])) {
    $exercise_id = $_GET['exercise_id'];
    $stmt = $pdo->prepare("SELECT * FROM exercises WHERE id = :exercise_id");
    $stmt->execute(['exercise_id' => $exercise_id]);
    $project = $stmt->fetch();
    if (!$project) {
        header("Location: exercices.php");
        exit();
    }
} else {
    header("Location: exercices.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Your Work</title>
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/vendor/css/core.css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" />
  <link rel="stylesheet" href="assets/css/demo.css" />
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <script src="assets/vendor/js/helpers.js"></script>
  <script src="assets/js/config.js"></script>
</head>
<body>
  <div class="container" style="max-width: 600px; margin: 50px auto; text-align: center;">
    <h1 class="mb-4">Upload Your Work</h1>
    <div class="card">
      <div class="card-body">
        <form action="upload_process.php" method="POST" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="formFileMultiple" class="form-label"> Select your file:</label>
            <input class="form-control" type="file" id="formFileMultiple" name="project_file" required />
            <input type="hidden" name="exercise_id" value="<?= htmlspecialchars($exercise_id) ?>">
        </div>

          <button type="submit" name="submit" class="btn rounded-pill btn-warning">
            <img src="assets/img/elements/arrow.png" alt="Ring Icon" style="width: 20px; margin-right: 8px;">
            <span class="tf-icons bx bx-upload me-2"></span>Submit
          </button>
        </form>
      </div>
    </div>
    <div class="alert alert-success alert-dismissible mt-4" style="display: none;" id="successMessage">
      🎉 Don't give up on learning AI! Keep going!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  <script>
    document.querySelector('form').addEventListener('submit', function (e) 
    {
      document.getElementById('successMessage').style.display = 'block'; 
    });
  </script>
</body>
</html>
