<?php
require_once '../Controller/exerciceController.php'; 
require_once '../Model/exercice.php'; 

$exercise = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) 
{
    $exercise = [
        'id' => $_POST['id'],  
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'difficulty_level' => $_POST['difficulty_level'],
        'author_name' => $_POST['author_name'],
        'project_file' => isset($_FILES['project_file']['tmp_name']) && $_FILES['project_file']['tmp_name'] != '' 
            ? file_get_contents($_FILES['project_file']['tmp_name']) 
            : null,

        'image' => isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name'] != '' 
            ? file_get_contents($_FILES['image']['tmp_name']) 
            : null,
    ];
    $id = $_POST['id'];

    $exerciceController = new exerciceController();
    $exerciceController->updateExercise($id, $exercise);
    echo "Exercise updated successfully!";
    exit;
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
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Demo : Vertical Layouts - Forms | sneat - Bootstrap Dashboard PRO</title>

    <meta name="description" content="" />

    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Demo : Vertical Layouts - Forms | sneat - Bootstrap Dashboard PRO</title>
    <meta name="description" content="" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"rel="stylesheet" />
    <link rel="stylesheet" href="../vue/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../vue/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../vue/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../vue/assets/css/demo.css" />
    <title>Edit Exercise</title>
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
                    <div class="mb-6">
                        <label class="form-label" for="basic-icon-default-fullname">Project Title</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input
                                type="text"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                name="title"
                                value="<?php echo htmlspecialchars($exercise['title']); ?>"
                                placeholder="Your project title"
                                required
                            />
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="form-label" for="basic-icon-default-company">Difficulty Level</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input
                                type="text"
                                class="form-control"
                                id="basic-icon-default-company"
                                name="difficulty_level"
                                value="<?php echo htmlspecialchars($exercise['difficulty_level']); ?>"
                                placeholder="Beginner/intermediate/advanced"
                                required
                            />
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="form-label" for="basic-icon-default-message">Project Description</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                            <textarea
                                id="basic-icon-default-message"
                                class="form-control"
                                placeholder="Describe your project"
                                name="description"
                                required
                            ><?php echo htmlspecialchars($exercise['description']); ?></textarea>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="formFileMultiple" class="form-label">Select your project image:</label>
                        <input class="form-control" type="file" name="image" id="formFileMultiple" multiple />
                        <label for="formFileProject" class="form-label" style="margin-top: 15px;">Upload Project File:</label>
                        <input class="form-control" type="file" id="formFileProject" name="project_file" />
                        <label class="form-label" for="basic-icon-default-message" style="margin-top: 15px;">Author Name:</label>
                        <input
                            type="text"
                            id="basic-icon-default-company"
                            class="form-control"
                            name="author_name"
                            value="<?php echo htmlspecialchars($exercise['author_name']); ?>"
                            placeholder="Your name"
                            required
                        />
                    </div>

                    <button
                        type="submit"
                        style="background: linear-gradient(135deg, #6a11cb, #2575fc); border: none; border-radius: 30px; color: white; padding: 12px 24px; font-size: 16px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(135deg, #2575fc, #6a11cb)';"
                        onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(135deg, #6a11cb, #2575fc)';">
                        Update Exercise
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
