<?php
require_once 'NavBar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/css/core.css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <title>Add Your Project</title>
    <style>
        .card {
            max-width: 900px;
            margin: 30px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .form-control:focus {
            border-color: #6a11cb !important;
            outline: none;
            box-shadow: 0 0 5px rgba(106, 17, 203, 0.5);
        }
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
    <script>
        function validateForm(event) {
            event.preventDefault(); 
            let form = document.forms["projectForm"];
            let isValid = true;
            document.querySelectorAll(".error-message").forEach(el => el.remove());
            document.querySelectorAll(".form-control").forEach(input => input.style.borderColor = "");

            const fields = [
                { field: "title", message: "Title must be at least 10 characters long.", minLength: 10 },
                { field: "difficulty_level", message: "Enter Beginner, Intermediate, or Advanced." },
                { field: "description", message: "Description must be at least 15 characters long.", minLength: 15 },
                { field: "author_name", message: "Author Name is required." },
                { field: "image", message: "Please select an image." },
                { field: "project_file", message: "Please upload a project file." }
            ];

            fields.forEach(({ field, message, minLength }) => {
                let input = form[field];
                let inputValue = input.value.trim();

                if (!inputValue || (minLength && inputValue.length < minLength)) {
                    isValid = false;
                    input.style.borderColor = "red";
                    let errorMessage = document.createElement("div");
                    errorMessage.className = "error-message";
                    errorMessage.innerHTML = `<img src="assets/img/elements/error.png" alt="Error"> ${message}`;
                    input.parentElement.appendChild(errorMessage);
                }
            });
            if (isValid) 
            {
                form.submit();
            }
        }
    </script>
</head>
<body>
    <div class="card">
        <h2>Add Your Project</h2>
        <form name="projectForm" action="addexercise.php" method="POST" enctype="multipart/form-data" onsubmit="validateForm(event)">
            <div class="mb-3">
                <label for="title" class="form-label">Project Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Project Title must be at least 10 characters long.">
            </div>
            <div class="mb-3">
                <label for="difficulty_level" class="form-label">Difficulty Level:</label>
                <input type="text" class="form-control" id="difficulty_level" name="difficulty_level" placeholder="Difficulty Level: Beginner/Intermediate/Advanced.">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Project Description:</label>
                <textarea class="form-control" id="description" name="description" placeholder="Project Description must be at least 15 characters long."></textarea>
            </div>
            <div class="mb-3">
                <label for="author_name" class="form-label">Author Name:</label>
                <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Author Name is required.">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Select your project image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="project_file" class="form-label">Upload Project File:</label>
                <input type="file" class="form-control" id="project_file" name="project_file">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
