<?php
//Start session and make database connection
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

//4G
//Get the recipe id to be removed
$recipe_id = $_GET['id'];

//Query to remove the recipe by unsetting the recipe name and creator name, 
//therefore it still exists in database but cannot be access unless you are admin
$query = "UPDATE recipes SET creator_name='', recipe_name='' WHERE id='$recipe_id'" ;
$result = mysqli_query($connString, $query) or die("database error:". mysqli_error($connString));

//Redirect user to home page
header ("Location: index.php");
?>