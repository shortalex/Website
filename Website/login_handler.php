<?php
    
    session_start();
    
    require_once 'Dao.php';
    
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    
    $dao = new Dao();
    $valid = $dao->isValidUser($username, $password);
    if(empty($valid))
    {
       $loginvalid = false;
    }
    else
    {
       $loginvalid = true;
    }

    if ($loginvalid) {
        $_SESSION['log_message'] = "Welcome ".$username."!";
        $_SESSION['log_in'] = true;
        $_SESSION['user_name'] = $username;
        header("Location: index.php");
    exit();
    }
    else
    {

    $_SESSION['notlog_message'] = "Invalid username or password";
    $_SESSION['user_name'] = $username;
    header("Location: Login.php");
    exit();
    }

?>
