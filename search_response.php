<?php
//include connection file 
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

if(isset($_POST['form_submitted'])) {
    $search = mysqli_real_escape_string($connString, trim($_POST['search']));
    $sql = "SELECT id, recipe_name, creator_name, description, recipe_picture, likes, dislikes FROM recipes WHERE recipe_name='$search'";
    $resultset = mysqli_query($connString, $sql) or die("database error:". mysqli_error($connString));
    while($row = mysqli_fetch_assoc($resultset)){
        $recipes[] = $row;
    }
    $_SESSION['recipes'] = $recipes;
    echo $_SESSION['recipes'][0]['creator_name'];
    header("Location: search_page.php");
}

?>