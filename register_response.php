<?php
//include connection file 
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

$username_taken = "username taken";
$email_taken = "email taken";
$register_success = "register success";
unset($_SESSION['username_taken']);
unset($_SESSION['email_taken']);
unset($_SESSION['password_invalid']);
unset($_SESSION['register_success']);

if(isset($_POST['form_submitted'])) {
    $username = mysqli_real_escape_string($connString, trim($_POST['username']));
    $user_email = mysqli_real_escape_string($connString, trim($_POST['email']));

    //Error trapping for similar username and Email
    $sql_username = "SELECT * FROM users WHERE username = '$username'";
    $sql_email = "SELECT * FROM users WHERE email = '$user_email'";
    $result_username = mysqli_query($connString, $sql_username) or die(mysqli_error($connString));
    $result_email = mysqli_query($connString, $sql_email) or die(mysqli_error($connString));

    if(mysqli_num_rows($result_username) > 0){
        $_SESSION['username_taken'] = $username_taken;
        header("Location: login.php");
    } else if (mysqli_num_rows($result_email) > 0){
        $_SESSION['email_taken'] = $email_taken;
        header("Location: login.php");
    } else {
        $password = mysqli_real_escape_string($connString, trim($_POST['password']));

        //Error trapping for invalid password
        if (strlen($password) <= '8') {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        } else if(!preg_match("#[0-9]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        } else if(!preg_match("#[A-Z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        } else if(!preg_match("#[a-z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }

        if(isset($passwordErr)){
            $_SESSION['password_invalid'] = $passwordErr;
            unset($passwordErr);
            header("Location: login.php");
        } else {
            $encrypted_password = md5($password);
            $sql = "INSERT INTO `users` (`username`, `email`, `password`, `profile_picture`, `active`) VALUES
                            ('".$username."', '".$user_email."', '".$encrypted_password."', NULL, 1);";
            $resultset = mysqli_query($connString, $sql) or die("database error:". mysqli_error($connString));
            if($resultset){
                $_SESSION['register_success'] = $register_success;
                header("Location: login.php");
            } else {
                echo "Ohhh ! Something Wrong."; // wrong details
            }
        }

        
    }

    
}

?>