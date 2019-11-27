<?php
//include connection file 
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $type = $_GET['type'];
        if($type == "like"){
            $query = "UPDATE recipes SET likes = likes + 1 WHERE id = '$id'";
        } else if($type == "dislike"){
            $query = "UPDATE recipes SET dislikes = dislikes + 1 WHERE id = '$id'";
        }
        mysqli_query($connString, $query) or die("database error:". mysqli_error($connString));
        header("Location: recipe_page.php?id=$id");
    }

?>