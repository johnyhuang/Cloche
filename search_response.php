<?php
//Start session and make database connection
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

//Checks if form is submitted through index.php, so user cannot access this page without going through index.php
if(isset($_POST['form_submitted'])) {
    //Modify the search input
    $qry = str_replace(" ","+", $_POST["search"]);
    
    //Redirect to search page with the modified input
    header("Location: search_page.php?search=".$qry);
}

?>