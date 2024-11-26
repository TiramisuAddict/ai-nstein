<?php
require_once '../Controller/exerciceController.php'; 
require_once '../Model/exercice.php'; 

$exercise = null;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) 
{
    // Form validation
    $title = trim($_POST['title']);
    $difficulty_level = trim($_POST['difficulty_level']);
    $description = trim($_POST['description']);
    $author_name = trim($_POST['author_name']);
    $image = $_FILES['image'];
    $project_file = $_FILES['project_file'];

    if (strlen($title) < 10) {
        $errors['title'] = "Title must be at least 10 characters long.";
    }
    if (!in_array($difficulty_level, ['Beginner', 'Intermediate', 'Advanced'])) {
        $errors['difficulty_level'] = "Enter Beginner, Intermediate, or Advanced.";
    }
    if (strlen($description) < 15) {
        $errors['description'] = "Description must be at least 15 characters long.";
    }
    if (empty($author_name)) {
        $errors['author_name'] = "Author Name is required.";
    }
    if (empty($image['tmp_name'])) {
        $errors['image'] = "Please select an image.";
    }
    if (empty($project_file['tmp_name'])) {
        $errors['project_file'] = "Please upload a project file.";
    }

    // If no errors, process the form
    if (empty($errors)) {
        $exercise = [
            'id' => $_POST['id'],
            'title' => $title,
            'description' => $description,
            'difficulty_level' => $difficulty_level,
            'author_name' => $author_name,
            'project_file' => isset($project_file['tmp_name']) && $project_file['tmp_name'] != '' 
                ? file_get_contents($project_file['tmp_name']) 
                : null,
            'image' => isset($image['tmp_name']) && $image['tmp_name'] != '' 
                ? file_get_contents($image['tmp_name']) 
                : null,
        ];
        $id = $_POST['id'];

        $exerciceController = new exerciceController();
        $exerciceController->updateExercise($id, $exercise);
        echo "Exercise updated successfully!";
        header("Location: ../Vue/UpDel.php");
        exit;
    }
}

if (isset($_GET['id'])) 
{  
    $id = $_GET['id'];
    $exerciceController = new exerciceController();
    $exercise = $exerciceController->getExerciseById($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Edit Exercise</title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../vue/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../vue/assets/vendor/css/core.css" />
    <link rel="stylesheet" href="../vue/assets/vendor/css/theme-default.css" />
    <link rel="stylesheet" href="../vue/assets/css/demo.css" />
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            display: flex;
            align-items: center;
            margin-top: 5px;
        }
        .error-message img {
            width: 16px;
            height: 16px;
            margin-right: 5px;
        }
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        button {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            border-radius: 30px;
            color: white;
            padding: 12px 24px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        button:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }
    </style>
</head>
<body>
    <div class="col-xl" style="max-width: 900px; margin: 0 auto; padding: 30px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); background-color: #fff;">
        <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Edit Exercise</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($exercise['id']); ?>">

                    <!-- Project Title -->
                    <div class="mb-6">
                        <label class="form-label" for="title">Project Title</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                class="form-control <?php echo isset($errors['title']) ? 'is-invalid' : ''; ?>"
                                id="title"
                                name="title"
                                value="<?php echo htmlspecialchars($exercise['title']); ?>"
                                placeholder="Project Title must be at least 10 characters long."
                                required
                            />
                            <?php if (isset($errors['title'])): ?>
                                <div class="error-message"><img src="../Vue/assets/img/elements/error.png" alt="error"><?php echo $errors['title']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Difficulty Level -->
                    <div class="mb-6">
                        <label class="form-label" for="difficulty_level">Difficulty Level</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                class="form-control <?php echo isset($errors['difficulty_level']) ? 'is-invalid' : ''; ?>"
                                id="difficulty_level"
                                name="difficulty_level"
                                value="<?php echo htmlspecialchars($exercise['difficulty_level']); ?>"
                                placeholder="Enter Beginner, Intermediate, or Advanced."
                                required
                            />
                            <?php if (isset($errors['difficulty_level'])): ?>
                                <div class="error-message"><img src="../Vue/assets/img/elements/error.png" alt="error"><?php echo $errors['difficulty_level']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Project Description -->
                    <div class="mb-6">
                        <label class="form-label" for="description">Project Description</label>
                        <div class="input-group input-group-merge">
                            <textarea
                                id="description"
                                class="form-control <?php echo isset($errors['description']) ? 'is-invalid' : ''; ?>"
                                placeholder="Project Description must be at least 15 characters long."
                                name="description"
                                required
                            ><?php echo htmlspecialchars($exercise['description']); ?></textarea>
                            <?php if (isset($errors['description'])): ?>
                                <div class="error-message"><img src="../Vue/assets/img/elements/error.png" alt="error"><?php echo $errors['description']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Author Name -->
                    <div class="mb-4">
                        <label for="author_name" class="form-label">Author Name:</label>
                        <input
                            type="text"
                            class="form-control <?php echo isset($errors['author_name']) ? 'is-invalid' : ''; ?>"
                            id="author_name"
                            name="author_name"
                            value="<?php echo htmlspecialchars($exercise['author_name']); ?>"
                            placeholder="Author Name is required."
                            required
                        />
                        <?php if (isset($errors['author_name'])): ?>
                            <div class="error-message"><img src="../Vue/assets/img/elements/error.png" alt="error"><?php echo $errors['author_name']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <label for="formFileMultiple" class="form-label">Select your project image:</label>
                        <input class="form-control <?php echo isset($errors['image']) ? 'is-invalid' : ''; ?>" type="file" name="image" id="formFileMultiple" />
                        <?php if (isset($errors['image'])): ?>
                            <div class="error-message"><img src="../Vue/assets/img/elements/error.png" alt="error"><?php echo $errors['image']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="formFileProject" class="form-label">Upload Project File:</label>
                        <input class="form-control <?php echo isset($errors['project_file']) ? 'is-invalid' : ''; ?>" type="file" id="formFileProject" name="project_file" />
                        <?php if (isset($errors['project_file'])): ?>
                            <div class="error-message"><img src="../Vue/assets/img/elements/error.png" alt="error"><?php echo $errors['project_file']; ?></div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Project</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
