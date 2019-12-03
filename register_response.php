<?php
//Start session and make database connection
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

//Create error and success text
$username_taken = "username taken";
$email_taken = "email taken";
$register_success = "register success";

//Unset previously set sessions in case of next registration attempt
unset($_SESSION['username_taken']);
unset($_SESSION['email_taken']);
unset($_SESSION['password_invalid']);
unset($_SESSION['register_success']);

//Checks if form is submitted through login.php, so user cannot access this page without going through login.php
if(isset($_POST['form_submitted'])) {
    //Get input from the previous page and sanitize it to prevent sql injection
    $username = mysqli_real_escape_string($connString, trim($_POST['username']));
    $user_email = mysqli_real_escape_string($connString, trim($_POST['email']));

    //1B
    //Error trapping for similar username and Email
    $sql_username = "SELECT * FROM users WHERE username = '$username'";
    $sql_email = "SELECT * FROM users WHERE email = '$user_email'";
    $result_username = mysqli_query($connString, $sql_username) or die(mysqli_error($connString));
    $result_email = mysqli_query($connString, $sql_email) or die(mysqli_error($connString));
    //Check if username is already registered in database
    if(mysqli_num_rows($result_username) > 0){
        $_SESSION['username_taken'] = $username_taken;
        header("Location: login.php");
    } 
    //Check if email is already registered in database 
    else if (mysqli_num_rows($result_email) > 0){
        $_SESSION['email_taken'] = $email_taken;
        header("Location: login.php");
    } 
    //Check if username and password is in the valid format
    else {
        $password = mysqli_real_escape_string($connString, trim($_POST['password']));
        //Error trapping for invalid password
        //Check if password is at least 8 character long
        if (strlen($password) <= '8') {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        } 
        //Check if password has at least one number
        else if(!preg_match("#[0-9]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        } 
        //Check if password contains at least one upper case letter
        else if(!preg_match("#[A-Z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        } 
        //Check if password contains at least one lower case letter
        else if(!preg_match("#[a-z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
        //Error trapping for username must not contain whitespaces 
        else if ( preg_match('/\s/',$username) ){
            $username_contain_whitespace = "Username must not contain whitespaces";
            $_SESSION['username_taken'] = $username_contain_whitespace;
        }

        //1C
        //If there is an error display redirect user back to login.php and display error
        if(isset($passwordErr) || isset($username_contain_whitespace)){
            $_SESSION['password_invalid'] = $passwordErr;
            unset($passwordErr);
            header("Location: login.php");
        } 
        //If there is no error encrypt password and insert it into the database, then redirect user back the login.php with success message
        else {
            $encrypted_password = md5($password);
            $sql = "INSERT INTO `users` (`username`, `email`, `password`, `profile_picture`, `active`) VALUES
                            ('".$username."', '".$user_email."', '".$encrypted_password."', NULL, 1);";
            $resultset = mysqli_query($connString, $sql) or die("database error:". mysqli_error($connString));
            //1D
            if($resultset){
                $_SESSION['register_success'] = $register_success;
                header("Location: login.php");
            } 
        }

        
    }

    
}

?>