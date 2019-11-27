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
                      <a class='nav-link' href='login.php'>Sign In/Register</a>
                    </li>";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <?php
    include_once("./connect/db_cls_connect.php");
    $db = new dbObj();
    $connString =  $db->getConnstring();
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $query = "SELECT recipe_name, creator_name, description, ingredients, steps, recipe_picture, likes, dislikes, recipe_picture FROM recipes WHERE id='$id'";
      $result = mysqli_query($connString, $query) or die("database error:". mysqli_error($connString));
      $row = mysqli_fetch_assoc($result);
      $recipe_name = $row['recipe_name'];
      $creator_name = $row['creator_name'];
      $description = $row['description'];
      $recipe_picture = $row['recipe_picture'];
      $ingredients = $row['ingredients'];
      $steps = $row['steps'];
      $likes = $row['likes'];
      $dislikes = $row['dislikes'];
      $picture = $row['recipe_picture'];
      $url_like = "rate_recipe_response.php?id=" .$id. "&type=like";
      $url_dislike = "rate_recipe_response.php?id=" .$id. "&type=dislike";
      echo '<div class="container mt-5">
              <div class="row">
          
                <div class="col-lg-12">
          
                  <div class="card mt-4">
                    <img class="card-img-top img-fluid" src="'.$picture.'" alt="">
                    <div class="card-body">
                      <h3 class="card-title">'.$recipe_name.'</h3>
                      <a class="card-text" href="profile_page.php?name='.$creator_name.'">'.$creator_name.'</a>
                      <p class="card-text">'.$description.'</p>
                      <a href="'.$url_like.'"><i class="fa fa-thumbs-up" aria-hidden="true" style="color:lightgreen"> '.$likes.'</i></a>
                      <a href="'.$url_dislike.'"><i class="fa fa-thumbs-down ml-2" aria-hidden="true" style="color:red"> '.$dislikes.'</i></a>
                    </div>
                  </div>
                  <!-- /.card -->
          
                  <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                      Ingredients
                    </div>
                    <div class="card-body">
                      <textarea type="text" class="form-control" id="ingredients" name="ingredients" placeholder="Ingredients..." rows="10" readonly>'.$ingredients.'</textarea>
                    </div>
                  </div>
          
                  <!-- /.card -->
          
                  <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                      Steps
                    </div>
                    <div class="card-body">
                      <textarea type="text" class="form-control" id="steps" name="steps" placeholder="Steps..." rows="10" readonly>'.$steps.'</textarea>
                    </div>
                  </div>
                  <!-- /.card -->
          
                </div>
                <!-- /.col-lg-12 -->
          
              </div>
          
            </div>
          <!-- /.container -->';
    }
  ?>
  

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
          <p class="text-muted small mb-4 mb-lg-0">&copy; Cloche 2019. All Rights Reserved.</p>
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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
