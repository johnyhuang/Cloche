<?php
//include connection file 
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

if(isset($_POST['form_submitted'])){
    $recipe_image = mysqli_real_escape_string($connString, trim($_POST['image_upload']));
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