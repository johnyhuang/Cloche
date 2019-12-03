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

  <title>Search Recipe Cloche</title>

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
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="img/carousel_1.jpg" alt="First slide" width="1200">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/carousel_2.jpg" alt="Second slide" width="1200">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/carousel_3.jpg" alt="Third slide" width="1200">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        <div class="row">
          <div class="col-lg-12 text-center">
          <?php
          //Query to get recipes and count the number of matching recipes
          $condition = '';  
          $query = explode(" ", $_GET["search"]);  
          $search_recipe = $_GET['search'];
          
          //Break search into keywords and make them as conditions
          foreach($query as $text)  
          {  
              $condition .= "recipe_name LIKE '%".mysqli_real_escape_string($connString, $text)."%' OR ";  
          }
          
          //Query to get recipes that matches the keywords
          $condition = substr($condition, 0, -4);  
          $sql_query = "SELECT * FROM recipes WHERE " . $condition;  
          $result = mysqli_query($connString, $sql_query);
          $result_2 = mysqli_query($connString, $sql_query);
          $counter = 0;
          
          //Count how many recipes are found
          if(mysqli_num_rows($result) > 0)  
          {  
            while($row = mysqli_fetch_array($result)){
              $counter++;
            }    
            //Print how many recipes are found
            echo "<h1>There are $counter recipes containing '$search_recipe'</h1>";
            
          }
          

          ?>
          </div>
          
        </div>
          
        <br>

        <div class="row">
        
        <?php
         //2B
         //Check if results are found, if so then create bootstrap cards containing the recipe information
         if(mysqli_num_rows($result) > 0)  
         {  
          //Repeat for every recipe
          while($row = mysqli_fetch_array($result_2))  
              {  
                //Assign recipe information such as recipe image, id, recipe name, recipe creator, recipe description, recipe likes and dislikes
                $recipe_picture = $row['recipe_picture'];
                $recipe_id = $row['id'];
                $recipe_name = $row['recipe_name'];
                $recipe_creator_name = $row['creator_name'];
                $recipe_description = $row['description'];
                $recipe_likes = $row['likes'];
                $recipe_dislikes = $row['dislikes'];
                 echo  '<div class="col-lg-4 col-md-6 mb-5">
                    <div class="card h-100">
                      <!-- 2D -->
                      <!-- Recipe image -->
                      <a href="recipe_page.php?id='.$recipe_id.'"><img class="card-img-top" src="'.$recipe_picture.'" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <!-- Recipe name -->
                          <a href="recipe_page.php?id='.$recipe_id.'">'.$recipe_name.'</a>
                        </h4>
                        <h6 class="card-text">
                          <!-- Author name -->
                          <a href="profile_page.php?profile_name='.$recipe_creator_name.'" >'.$recipe_creator_name.'</a>
                        </h6>
                        <!-- Recipe description -->
                        <p class="card-text">'.$recipe_description.'</p>
                      </div>
                      <div class="card-footer">
                        <!-- Number of likes -->
                        <i class="fa fa-thumbs-up" aria-hidden="true" style="color:lightgreen"> '.$recipe_likes.'</i>
                        <!-- Number of dislikes -->
                        <i class="fa fa-thumbs-down ml-2" aria-hidden="true" style="color:red"> '.$recipe_dislikes.'</i>
                      </div>
                    </div>
                  </div>';     
              }  
              
         }  
         //2C
         //If there are no recipes found then display "There are no recipes containing 'recipe name'"
         else  
         {  
          echo "<h1>There are no recipes containing '$search_recipe'</h1>"; 
         }  
         

        ?>
          

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

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
