<?php
//Start session and make database connection
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

//Get updated information, recipe id and username
$desc = $_POST['desc_update'];
$id = $_SESSION['id'];
$username=$_SESSION['user_session'];

if(isset($_POST['form_submitted'])) {

    //Save image in file system
    //Automatically overwrite profile picture if already exists
    //Set the location where the image is stored (in the img/ folder) and the name of the new file which will be in the profile_username.extension
    //For example profile_johny.jpg
    $target_dir = "img/";
    $file = $_FILES['image_upload']['name'];
    $path = pathinfo($file);
    $filename = "profile_".$_SESSION['user_session'];
    $ext = $path['extension'];
    $temp_name = $_FILES['image_upload']['tmp_name'];
    $path_filename_ext = $target_dir.$filename.".".$ext;
    move_uploaded_file($temp_name, $path_filename_ext);

    //4D
    ////Query to Database
    //Stores the updated description and profile picture path in the file system. 
    $query = "UPDATE users SET description = '$desc', profile_picture = '$path_filename_ext' WHERE id = '$id'";
    $result_query = mysqli_query($connString, $query) or die("database error:". mysqli_error($connString));
    
    //Update the current user description and image session information
    $_SESSION['desc'] = $desc;
    $_SESSION['user_image'] = $path_filename_ext;

    //Redirect user back to profile page
    header("Location: profile_page.php?profile_name=$username");
}

?>