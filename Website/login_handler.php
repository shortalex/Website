<?php
    
    session_start();
    
    require_once 'Dao.php';
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
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

    $_SESSION = array();
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
    header("Location: Login.php");
    exit();
    }

?>
