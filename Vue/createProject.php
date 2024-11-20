<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Demo : Vertical Layouts - Forms | sneat - Bootstrap Dashboard PRO</title>
    <meta name="description" content="" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"rel="stylesheet" />
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

</head>
<body>
    <div class="col-xl" style="max-width: 900px; margin: 0 auto; padding: 30px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); background-color: #fff;">
        <div class="card mb-6">
          <div class="card-header d-flex justify-content-between align-items-center">
          </div>
          <div class="card-body">
            <form method="POST" action="addexercise.php" enctype="multipart/form-data">
              <div class="mb-6">
                <label class="form-label" for="basic-icon-default-fullname">Project Title:</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class="bx bx-user"></i
                  ></span>
                  <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    name="title"
                    placeholder="Your project title"
                    aria-label="John Doe"
                    aria-describedby="basic-icon-default-fullname2" />
                </div>
              </div>
              <div class="mb-6">
              <label class="form-label" for="basic-icon-default-company">Difficulty Level:</label>
              <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text">
                      <img src="assets/img/elements/fire.png" alt="Fire Icon" style="width: 20px; height: 20px;" />
                  </span>
                  <input
                      type="text"
                      id="basic-icon-default-company"
                      class="form-control"
                      name="difficulty_level"
                      placeholder="Beginner/intermediate/advanced"
                      aria-label="ACME Inc."
                      aria-describedby="basic-icon-default-company2" />
              </div>
              </div>
              <div class="mb-6">
                <label class="form-label" for="basic-icon-default-message">Project Description:</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-message2" class="input-group-text"
                    ><i class="bx bx-comment"></i
                  ></span>
                  <textarea
                    id="basic-icon-default-message"
                    class="form-control"
                    placeholder="Describe your project"
                    name="description"
                    aria-label="Hi, Do you have a moment to talk Joe?"
                    aria-describedby="basic-icon-default-message2"></textarea>
                </div>
              </div>
            <!-- File Input -->
            <div class="mb-4">
                <label for="formFileMultiple" class="form-label"> Select your project image:</label>
                <input class="form-control" type="file" name="image" id="formFileMultiple" multiple />
                <label for="formFileProject" class="form-label" style="margin-top: 15px; display: block;">Upload Project File:</label>
                <input class="form-control" type="file" id="formFileProject" name="project_file" />
                <label class="form-label" for="basic-icon-default-message">Author Name: </label>
                <input
                    type="text"
                    id="basic-icon-default-company"
                    class="form-control"
                    name="author_name"
                    placeholder="Your name"
                    aria-label="ACME Inc."
                    aria-describedby="basic-icon-default-company2" />
            </div>
              <button type="submit" 
              style="background: linear-gradient(135deg, #6a11cb, #2575fc); 
              border: none; 
              border-radius: 30px; 
              color: white; 
              padding: 12px 24px;
              float: right; 
              font-size: 16px; 
              transition: all 0.3s ease;" 
                onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(135deg, #2575fc, #6a11cb)';" 
                onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(135deg, #6a11cb, #2575fc)';">
               Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>