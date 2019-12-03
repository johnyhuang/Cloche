<?php
//Start session and make database connection
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

//Create error text
$email_error = "username incorrect";
$password_error = "password incorrect";

//Unset previously set sessions in case of next registration attempt
unset($_SESSION['email_error']);
unset($_SESSION['password_error']);

//Checks if form is submitted through login.php, so user cannot access this page without going through login.php
if(isset($_POST['form_submitted'])) {
    //Get input from the previous page and sanitize it to prevent sql injection
    $user_email = mysqli_real_escape_string($connString, trim($_POST['email']));
    $user_password = mysqli_real_escape_string($connString, trim($_POST['password']));

    //1E
    //Query to check database to get row where email is matching to the input email
    $sql = "SELECT id, username, email, password, description, profile_picture FROM users WHERE email='$user_email'";
    $resultset = mysqli_query($connString, $sql) or die("database error:". mysqli_error($connString));
    $row = mysqli_fetch_assoc($resultset);
    
    //1F
    //Check if login credential is correct, if it is correct sign in user, start session with user information and redirect user to homepage
    //Password is encrypted with md5
    if(md5($user_password) == $row['password']){
        $_SESSION['user_session'] = $row['username'];
		$_SESSION['user_email'] = $row['email'];
        $_SESSION['user_image'] = $row['profile_picture'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['desc'] = $row['description'];
        //1H
        //Redirect user to home page
        header("Location: index.php");
    } 
    //1G
    //Check if email is incorrect, then redirect user back to login.php and display error
    else if ($row['email'] != $user_email){
        $_SESSION['email_error'] = $email_error;
        //Redirect user back to login page
        header("Location: login.php");
    } 
    //Check if password is incorrect, if it is then redirect user back to login.php and display error
    else if (md5($user_password) != $row['password']){
        $_SESSION['password_error'] = $password_error;
        //Redirect user back to login page
        header("Location: login.php");
    } 
}

?>