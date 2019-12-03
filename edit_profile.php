<?php
//Start session, make database connection and get user information from session
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();
$username = $_SESSION['user_session'];
$email = $_SESSION['user_email'];
$image = $_SESSION['user_image'];
$desc = $_SESSION['desc'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Profile Cloche</title>

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
  <!-- 4C -->
	<div class="mt-5">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 mt-5 text-center">
          <!-- Form for edit profile -->
					<form id="edit_profile" action="edit_profile_response.php" method="post" enctype="multipart/form-data">
            <?php 
            //If user has a profile picture then display the profile picture
            if (isset($_SESSION['user_image'])){
              echo '<img id ="image" class="rounded-circle" src='.$image.' alt="" width="400">';
            } 
            //If user hasn't set a profile picture then display the profile picture placeholder
            else{
              echo "<img id ='image' class='rounded-circle' src='img/profile_picture_placeholder.png'>";
            }?>
            <div class="row mt-2">
                <div class="col-5">
                </div>
                <div class="col-lg-2 col-md-2 text-center">
                  <!-- Input for profile picture -->
                  <input type="file" class="form-control-file btn-primary w-30" id="image_upload" name="image_upload" onchange="readURL(this);" accept="image/*">  
                </div>
                <div class="col-5">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-5">
                </div>
                <div class="col-2">
                    <h3>Description</h3>
                    <!-- Input for description -->
                    <?php echo "<textarea type='text' class='form-control' id='desc_update' name='desc_update'>$desc</textarea>"; //Display current recipe data which user can alter?>
                </div>
                <div class="col-5">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-4">
                </div>
                <div class="col-lg-2 col-md-2 text-center">
                    <!-- Display cancel button -->
                    <?php echo "<a href='profile_page.php?profile_name=$username' class='btn btn-block btn-lg btn-primary'>CANCEL</a>"; //Redirects user back to profile page if cancel button pressed?>
                </div>
                <div class="col-lg-2 col-md-2 text-center">
                    <!-- Hidden parameter to ensure form is submitted properly -->
                    <input type="hidden" name="form_submitted" value="1" />
                    <!-- Submit changes button -->
                    <button type ="submit" class="btn btn-block btn-lg btn-primary">SAVE CHANGES</button>
                </div>
                <div class="col-4">
                </div>
				      </div>              
          </form>
				</div>
			</div>      
      <br><br>
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
  
  <!-- Dynamic Image Upload Script to change profile image display when input image is selected -->
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