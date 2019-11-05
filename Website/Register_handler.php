
<?php

include_once 'Dao.php';

$messages = array();
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

   $u_name = filter_var($_POST["username"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
   $u_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
   $u_password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
   $first_name = filter_var($_POST["fname"],FILTER_SANITIZE_STRING);
   $last_name = filter_var($_POST["lname"],FILTER_SANITIZE_STRING);
  
   
   require_once 'Dao.php';
   $dao = new Dao();
   $dao->registerUser($u_name, $u_email, $u_password, $first_name, $last_name);
   $_SESSION['messages'] = array("You are now registered");
   header('Location: http://quiet-thicket-66927.herokuapp.com/Login.php');

}
?>
