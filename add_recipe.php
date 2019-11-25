<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Landing Page - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
        <i class="icon-fire mr-3 text-primary"></i>
        <a class="navbar-brand" href="index.php">Cloché</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="help.php">Help</a>
            </li>
            <?php
                if(isset($_SESSION['user_session'])){
                $username = $_SESSION['user_session'];
                echo "<li class='dropdown'>
                        <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#Profile'>$username</a>
                        <ul class='dropdown-menu'>
                            <li>
                            <a class='dropdown-item' href='#Profile'>Profile</a>
                            </li>
                            <li>
                            <a class='dropdown-item' href='logout_response.php'>Logout</a>
                            </li>
                        </ul>
                        </li>";
                } else {
                echo "<li>
                        <a class='nav-link' href='login.php'>Sign In</a>
                        </li>";
                }
            ?>
            </ul>
        </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <br>
                <div class="card mt-4">
                    <form id="add-recipe" name="add_recipe" method="post" action="add_recipe_response.php">
                    <img id="image" class="card-img-top img-fluid" src="http://placehold.it/1140x500" alt="" style="max-width:1140px;">
                    <input type="file" class="form-control-file btn-primary w-25" id="image_upload" name="image_upload" onchange="readURL(this);" accept="image/*">  
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Recipe Name...">
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="Description..."></textarea>
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" id="ingredients" name="ingredients" placeholder="Ingredients..."></textarea>
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" id="steps" name="steps" placeholder="Steps..."></textarea>
                        </div>
                        <input type="hidden" name="form_submitted" value="1"/>
                        <button type=submit class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    

<!-- Footer -->
<footer class="footer bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- Dynamic Image Upload Script -->
  <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
  
  </script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
