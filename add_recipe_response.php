<?php
//include connection file 
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

if(isset($_POST['form_submitted'])){
    //Upload Image
    $query_get = "SELECT id FROM recipes ORDER BY id DESC LIMIT 1";
    $result_get = mysqli_query($connString, $query_get) or die("database error:". mysqli_error($connString));
    $row = mysqli_fetch_assoc($result_get);
    $next_id = $row['id'] + 1;
    $target_dir = "img/";
    $file = $_FILES['image_upload']['name'];
    $path = pathinfo($file);
    $filename = "image_".$next_id;
    $ext = $path['extension'];
    $temp_name = $_FILES['image_upload']['tmp_name'];
    $path_filename_ext = $target_dir.$filename.".".$ext;
    move_uploaded_file($temp_name, $path_filename_ext);
    //Query to Database
    $recipe_image = $path_filename_ext;
    $recipe_name = mysqli_real_escape_string($connString, trim($_POST['title']));
    $recipe_creator = $_SESSION['user_session'];
    $recipe_desc = mysqli_real_escape_string($connString, trim($_POST['description']));
    $recipe_ingredients = mysqli_real_escape_string($connString, trim($_POST['ingredients']));
    $recipe_steps = mysqli_real_escape_string($connString, trim($_POST['steps']));
    $query = "INSERT INTO recipes (recipe_name, creator_name, description, ingredients, steps, recipe_picture) VALUES 
                ('$recipe_name', '$recipe_creator', '$recipe_desc', '$recipe_ingredients', '$recipe_steps', '$recipe_image')" ;
    $result = mysqli_query($connString, $query) or die("database error:". mysqli_error($connString));
    header ("Location: index.php");
}

?>