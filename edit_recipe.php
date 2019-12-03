<?php
  //Start session and make database connection
  include_once("./connect/db_cls_connect.php");
  $db = new dbObj();
  $connString =  $db->getConnstring();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Recipe Cloche</title>

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
                //Check if user is logged in, if yes then display user profile button
                if(isset($_SESSION['user_session'])){
                $username = $_SESSION['user_session'];
                echo "<li class='dropdown'>
                        <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#'>$username</a>
                        <ul class='dropdown-menu'>
                            <li>
                            <a class='dropdown-item' href='profile_page.php?profile_name=$username'>Profile</a>
                            </li>
                            <li>
                            <a class='dropdown-item' href='logout_response.php'>Logout</a>
                            </li>
                        </ul>
                        </li>";
                } 
                //If not logged in then display button to sign in/register
                else {
                echo "<li>
                        <a class='nav-link' href='login.php'>Sign In/Register</a>
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
                  <!-- Form for edit recipe -->
                  <form id="edit-recipe" name="edit_recipe" method="post" action="edit_recipe_response.php" enctype="multipart/form-data">
                  <?php
                    //Get current recipe information
                    $id = $_GET['id'];
                    //Query to get current recipe information using recipe id
                    $query = "SELECT recipe_name, description, ingredients, steps, recipe_picture FROM recipes WHERE id='$id'";
                    $result = mysqli_query($connString, $query) or die("database error:". mysqli_error($connString));
                    $row = mysqli_fetch_assoc($result);
                    //Assign current recipe information
                    $title = $row['recipe_name'];
                    $desc = $row['description'];
                    $ingredients = $row['ingredients'];
                    $steps = $row['steps'];
                    $image = $row['recipe_picture'];
                    //Create html elements containing the current recipe information
                    echo '<!-- Recipe Image -->
                          <img id="image" class="card-img-top img-fluid" src='.$image.' alt="" style="max-width:1140px;">
                          <!-- Input for recipe image -->
                          <input type="file" class="form-control-file btn-primary w-25" id="image_upload" name="image_upload" onchange="readURL(this);" accept="image/*">  
                          <div class="card-body">
                              <div class="form-group">
                                  <h3>'.$title.'</h3>
                              </div>
                              <div class="form-group">
                                  <!-- Input for recipe description -->
                                  <textarea type="text" class="form-control" id="description" name="description">'.$desc.'</textarea>
                              </div>
                              <div class="form-group">
                                  <!-- Input for recipe ingredients -->
                                  <textarea type="text" class="form-control" id="ingredients" name="ingredients">'.$ingredients.'</textarea>
                              </div>
                              <div class="form-group">
                                  <!-- Input for recipe steps -->
                                  <textarea type="text" class="form-control" id="steps" name="steps">'.$steps.'</textarea>
                              </div>
                              <!-- Hidden parameter to ensure form is submitted properly -->
                              <input type="hidden" name="form_submitted" value="1"/>
                              <!-- Hidden parameter to pass the recipe id -->
                              <input type="hidden" name="id" value="'.$id.'">
                              <!-- Submit button -->
                              <button type=submit class="btn btn-primary">Submit</button>
                          </div>';
                  ?>
                  
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
              <a href="about.php">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="contact.php">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="terms_of_use.php">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="privacy_policy.php">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Cloche 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="http://www.facebook.com">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="http://www.twitter.com">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="http://www.instagram.com">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- Dynamic Image Upload Script to change recipe image display when input image is selected -->
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
