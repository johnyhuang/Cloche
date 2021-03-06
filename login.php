<?php
//Start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Cloche</title>

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
          <li>
            <a class="nav-link" href="login.php">Sign In/Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  

  <!-- Page Content -->
  <div class="container mt-5">
    <div class="row">    
      <div class="col-lg-6 mt-5">
        <h1>Login</h1>
        <!-- Login form -->
        <form id="login-form" name="login" method="post" action="login_response.php">
          <div class="form-group w-75">
            <label for="email">Email address:</label>
            <!-- Email input -->
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            <?php
              //Show error text when there is an error with the email
              if(isset($_SESSION['email_error'])){
                $error = $_SESSION['email_error'];
                echo "<span style='color:red'>$error<span>";
              }
            ?>
          </div>
          <div class="form-group w-75">
            <label for="pwd">Password:</label>
            <!-- Password input -->
            <input type="password" class="form-control" id="pwd" name="password" placeholder="Password">
            <?php
              //Show error text when there is an error with the password
              if(isset($_SESSION['password_error'])){
                $error = $_SESSION['password_error'];
                echo "<span style='color:red'>$error<span>";
              }
            ?>
          </div>
          <!-- Hidden parameter to ensure form is submitted properly -->
          <input type="hidden" name="form_submitted" value="1" />
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary">Log In</button>
        </form>
      </div>

      <!-- Dividing line -->
      <div class="col-lg-1 text-secondary" style="border-left:medium solid; margin-top:25px"></div>

      <div class="col-lg-5 mt-5">
          <h1>Register</h1>
          <!-- Registration form -->
          <form id="register-form" name="register" method="post" action="register_response.php">
            <div class="form-group  w-75">
              <label for="email">Username:</label>
              <!-- Username input -->
              <input type="text" class="form-control" id="username" name="username" placeholder="Username">
              <?php
              //Show error text when there is an error with the username
              if(isset($_SESSION['username_taken'])){
                $error = $_SESSION['username_taken'];
                echo "<span style='color:red'>$error<span>";
              }
            ?>
            </div>
            <div class="form-group  w-75">
              <label for="email">Email address:</label>
              <!-- Email input -->
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              <?php
              //Show error text when there is an error with the email
              if(isset($_SESSION['email_taken'])){
                $error = $_SESSION['email_taken'];
                echo "<span style='color:red'>$error<span>";
              }
              ?>
            </div>
            <div class="form-group  w-75">
              <label for="pwd">Password (Password must be at least 8 characters with at least 1 capital letter and 1 number):</label>
              <!-- Password input -->
              <input type="password" class="form-control" id="pwd" name="password" placeholder="Password">
              <?php
              //Show error text when there is an error with the password
              if(isset($_SESSION['password_invalid'])){
                $error = $_SESSION['password_invalid'];
                echo "<span style='color:red'>$error<span>";
              }
              ?>
            </div>
            <!-- Hidden parameter to ensure form is submitted properly -->
            <input type="hidden" name="form_submitted" value="1" />
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Register</button>
            <?php
            //Show success text when registration is sucessful
              if(isset($_SESSION['register_success'])){
                $success = $_SESSION['register_success'];
                echo "<span style='color:lightgreen'>$success<span>";
              }
            ?>
          </form>
        </div>
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
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>