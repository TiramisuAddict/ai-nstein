<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="icon" type="image/x-icon" href="../Dependencies/img/logo.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Braah+One&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../Dependencies/Template/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../Dependencies/Template/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../Dependencies/Template/css/demo.css" />

    <link rel="stylesheet" href="../Dependencies/Template/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../Dependencies/Template/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../Dependencies/Template/vendor/css/page-auth.css" />

    <script src="../Dependencies/Template/vendor/js/helpers.js"></script>
    <script src="../Dependencies/Template/js/config.js"></script>

    <style>
        .profile-header img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .avatar {
            position: relative;
            top: -40px; /* Adjust to overlap */
        }

    </style>

</head>
<body>
<div class="card">
    <div class="card-body p-0">
        <!-- Cover Image -->
        <div class="profile-header">
        <img
            src="https://via.placeholder.com/1200x300"
            alt="Cover Image"
            class="img-fluid rounded-top"
        />
        </div>

        <!-- Profile Info -->
        <div class="d-flex align-items-center p-4">
        <!-- Profile Picture -->
        <div class="avatar avatar-xl position-relative me-3">
            <img
            src="https://via.placeholder.com/150"
            alt="Profile"
            class="rounded-circle border border-3 border-white"
            style="width: 80px; height: 80px;"
            />
        </div>

        <!-- User Info -->
        <div class="d-flex flex-column">
            <h5 class="mb-0">John Doe</h5>
            <small class="text-muted">UX Designer</small>
            <div class="d-flex align-items-center mt-1 text-secondary">
                <i class="bx bx-calendar me-1"></i> Joined April 2021
            </div>
        </div>

        <!-- Button -->
        <button class="btn btn-primary btn-sm ms-auto">
            <i class="bx bx-user-check"></i> Connected
        </button>
        </div>
        </div>
    </div>

</body>
</html>