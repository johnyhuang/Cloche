<?php
//Start session and make database connection
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

//Get the recipe id
$id = $_GET['id'];

//Check if user is logged in
if(isset($_GET['id']) && isset($_SESSION['user_session'])){
    $type = $_GET['type'];
    //Check if action is like or dislike
    if($type == "like"){
        //Make query to increment recipe likes by 1
        $query = "UPDATE recipes SET likes = likes + 1 WHERE id = '$id'";
    } else if($type == "dislike"){
        //Make query to increment recipe dislike by 1
        $query = "UPDATE recipes SET dislikes = dislikes + 1 WHERE id = '$id'";
    }
    //2F
    //Perform query to database
    mysqli_query($connString, $query) or die("database error:". mysqli_error($connString));
    //Redirect user back to recipe page
    header("Location: recipe_page.php?id=$id");
}
//2G
//Redirect user to login page if user is not logged in
else {
    header("Location: login.php");
}

?>