<?php
//Start session and make database connection
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();
$username = $_SESSION['user_session'];

//Get profile name from url
$profile_name = $_GET['profile_name'];

//Query to get profile information from database using profile name
$qry = "SELECT username, email, description, profile_picture FROM users WHERE username = '$profile_name'";
$rslt_qry = mysqli_query($connString, $qry) or die("database error:". mysqli_error($connString));
$row = mysqli_fetch_assoc($rslt_qry);

//Assign profile information
$name_profile = $row['username'];
$email_profile = $row['email'];
$description_profile = $row['description'];
$image_profile = $row['profile_picture'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Profile Page Cloche</title>

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

	<div class="mt-5">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 mt-5 text-center">
					
          <?php 
            //4B
            //Check if profile has a profile picture, if yes display it
            if (isset($image_profile)){
						echo '<img class="rounded-circle" src='.$image_profile.' alt="">';
            } 
            //If profile has no profile picture set then display placeholder profile picture
            else{
						echo "<img class='rounded-circle' src='img/profile_picture_placeholder.png'>";
            }

            //Display profile name, email and description
            echo "<h1>$name_profile</h1>"; 
            echo "<h3>$email_profile</h3>"; 
            echo "<card readonly>$description_profile</card>";
            
            //Query to get and show how many recipes the selected user has made
					  $sql = "SELECT COUNT(id) as tot_recipe FROM recipes WHERE creator_name = '$name_profile'";
            $res_sql = mysqli_query($connString, $sql) or die("database error:". mysqli_error($connString));
            $data_tot_recipe = mysqli_fetch_assoc($res_sql);
            echo "<h4 style='color:#f5c242'>".$data_tot_recipe['tot_recipe']." recipes</h4>";
             ?>
            
				</div>
		
			</div>
			<?php
      //Display option to edit recipe if the user is accessing his/her own profile
			if($name_profile==$username){
				echo '<div class="row">
					<div class="col-5">
					</div>
					<div class="col-lg-2 col-md-2 text-center">
						<a href="edit_profile.php"><button class="btn btn-block btn-lg btn-primary">EDIT PROFILE</button></a>
					</div>
					<div class="col-5">
					</div>
				</div>
				';
			} 

        
        
     ?>
			
        <div class="row">
					<div class="col-3 mt-5 text-center">
					
					</div>
					<div class="col-6 mt-5 text-center">
						<div class="row">
							<div class="col-12 text-center">
							<h2>USER RECIPES</h2>
							</div>

						
						</div>
						<div class="row">
						  <?php
              //Query to get all the recipes which belongs to the selected user
							$sql = "SELECT id, recipe_name, creator_name, description, recipe_picture, likes, dislikes, recipe_picture FROM recipes WHERE creator_name='$name_profile'";
							$resultset = mysqli_query($connString, $sql) or die("database error:". mysqli_error($connString));
							while($row = mysqli_fetch_assoc($resultset)){
								$recipes[] = $row;
              }
              //If there are recipes found belonging to the selected user, then display it
							if(isset($recipes)){
                $_SESSION['recipes'] = $recipes;
							  foreach($_SESSION['recipes'] as $recipes){
								$recipe_id = $recipes['id'];
								$recipe_name = $recipes['recipe_name'];
								$creator_name = $recipes['creator_name'];
								$description = $recipes['description'];
								$likes = $recipes['likes'];
								$dislikes = $recipes['dislikes'];
								$picture = $recipes['recipe_picture'];
								echo  '<div class="col-lg-4 col-md-6 mb-5">
                    <div class="card h-100">
                      <!-- Recipe Image -->
										  <a href="recipe_page.php?id='.$recipe_id.'"><img class="card-img-top" src="'.$picture.'" alt="" width="400"></a>
										  <div class="card-body">
                      <h4 class="card-title">
                        <!-- Recipe name -->
											  <a href="recipe_page.php?id='.$recipe_id.'">'.$recipe_name.'</a>
											</h4>
                      <h6 class="card-text">
                        <!-- Author name -->
											  <a href="profile_page.php?profile_name='.$creator_name.'" >'.$creator_name.'</a>
                      </h6>
                      <!-- Recipe description -->
                      <p class="card-text">'.$description.'</p>';
                      
                      //Check if user is viewing his/her profile, if so display button to edit and remove recipe
                      if($name_profile==$username){
                        //4E
                        echo '
                        <!-- Edit recipe button -->
                        <a href="edit_recipe.php?id='.$recipe_id.'"><button class="btn btn-primary">Edit Recipe</button> </a>
                        <!-- Remove recipe button -->
                        <a href="remove_recipe_response.php?id='.$recipe_id.'"><button class="btn btn-primary"><i class="fa fa-times aria-hidden="true" style="color:red"></i></button></a>';
                      }
                  
                      echo '
										  </div>
                      <div class="card-footer">
                      <!-- Number of likes -->
											<i class="fa fa-thumbs-up" aria-hidden="true" style="color:lightgreen"> '.$likes.'</i>
                      <!-- Number of dislikes -->
                      <i class="fa fa-thumbs-down ml-2" aria-hidden="true" style="color:red"> '.$dislikes.'</i>
										  </div>
										</div>
									  </div>';
							  }
              } 
              //If no recipes are found that belongs to the user then display "This user has not yet submitted any recipe"
              else {
							  echo '<div class="col-lg-12 col-md-6 text-center mb-5>"
									  <div class="card h-100">
										<h3>This User Not Yet Submitted Any Recipes</h3>
									  </div>
									</div>';
							}

						  ?>

						</div>
						
					</div>
					<div class="col-3 mt-5 text-center">
					
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