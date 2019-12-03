<?php
//Start session and make database connection
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

//Check if form is submitted from the correct page (edit_recipe.php)
if(isset($_POST['form_submitted'])){

    //Get input from the previous page and sanitize the input
    $recipe_id = mysqli_real_escape_string($connString, trim($_POST['id']));
    $recipe_desc = mysqli_real_escape_string($connString, trim($_POST['description']));
    $recipe_ingredients = mysqli_real_escape_string($connString, trim($_POST['ingredients']));
    $recipe_steps = mysqli_real_escape_string($connString, trim($_POST['steps']));

    //Update image in file system
    //Automatic overwrite of image if it already exists
    $query_get = "SELECT recipe_picture FROM recipes WHERE id='$recipe_id'";
    $result_get = mysqli_query($connString, $query_get) or die("database error:". mysqli_error($connString));
    $row = mysqli_fetch_assoc($result_get);
    $name = $row['recipe_picture'];
    //Set the location where the image is stored (in the img/ folder) and the name of the new file which will be in the image_id number.extension
    //For example image_20.jpg
    $target_dir = "img/";
    $file = $_FILES['image_upload']['name'];
    $path = pathinfo($file);
    $filename = "image_".$name;
    $ext = $path['extension'];
    $temp_name = $_FILES['image_upload']['tmp_name'];
    $path_filename_ext = $target_dir.$filename.".".$ext;
    move_uploaded_file($temp_name, $name);

    //4F
    //Update database
    $query = "UPDATE recipes SET description='$recipe_desc', ingredients='$recipe_ingredients', steps='$recipe_steps', recipe_picture='$name' WHERE id='$recipe_id'" ;
    $result = mysqli_query($connString, $query) or die("database error:". mysqli_error($connString));

    //Redirect user back to home page
    header ("Location: index.php");
}
?>