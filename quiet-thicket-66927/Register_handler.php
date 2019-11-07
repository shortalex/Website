
<?php

include_once 'Dao.php';

$passwordErr = array();
session_start();
    

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $u_name = filter_var($_POST["username"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
    $u_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $u_password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    $first_name = filter_var($_POST["fname"],FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST["lname"],FILTER_SANITIZE_STRING);
    
    $_SESSION['fname'] = $first_name;
    $_SESSION['lname'] = $last_name;
    $_SESSION['username'] = $u_name;
    $_SESSION['email'] = $u_email;
    

    if (strlen($_POST["password"]) <= '8') {
            $_SESSION['passwordErr'] = "Your Password Must Contain At Least 8 Characters!";
            header("Location: Register.php");
    }
    elseif(!preg_match("#[0-9]+#",$u_password)) {
            $_SESSION['passwordErr'] = "Your Password Must Contain At Least 1 Number!";
            header("Location: Register.php");
    }
    elseif(!preg_match("#[A-Z]+#",$u_password)) {
            $_SESSION['passwordErr'] = "Your Password Must Contain At Least 1 Capital Letter!";
            header("Location: Register.php");
    
    }
    elseif(!preg_match("#[a-z]+#",$u_password)) {
            $_SESSION['passwordErr'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
            header("Location: Register.php");
    }
    else{
    
    
        require_once 'Dao.php';
        $dao = new Dao();
        $dao->registerUser($u_name, $u_email, $u_password, $first_name, $last_name);
    }
}
?>
