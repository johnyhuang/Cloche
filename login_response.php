<?php
//include connection file 
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();
$email_error = "username incorrect";
$password_error = "password incorrect";

unset($_SESSION['email_error']);
unset($_SESSION['password_error']);

if(isset($_POST['form_submitted'])) {
    $user_email = mysqli_real_escape_string($connString, trim($_POST['email']));
    $user_password = mysqli_real_escape_string($connString, trim($_POST['password']));
    $sql = "SELECT id, username, email, password FROM users WHERE email='$user_email'";
    $resultset = mysqli_query($connString, $sql) or die("database error:". mysqli_error($connString));
    $row = mysqli_fetch_assoc($resultset);
    if(md5($user_password) == $row['password']){
        $_SESSION['user_session'] = $row['username'];
        header("Location: index.php");
    } else if ($row['email'] != $user_email){
        $_SESSION['email_error'] = $email_error;
        header("Location: login.php");
    } else if (md5($user_password) != $row['password']){
        $_SESSION['password_error'] = $password_error;
        header("Location: login.php");
    } 
}

?>