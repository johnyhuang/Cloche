<?php
    //Start session
    session_start();
    //6A
    //Unset the user session
    unset($_SESSION['user_session']);
    //Destroy all session
    if(session_destroy()){
        //6B
        //Redirect user back to home page
        header("Location: index.php");
    }
?>