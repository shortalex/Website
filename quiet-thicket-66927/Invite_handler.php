<?php

include_once 'Dao.php';
session_start();
    

if($_SERVER["REQUEST_METHOD"] == "POST"){

   $b_name = filter_var($_POST["boardgame"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
   $g_type = filter_var($_POST["gtype"], FILTER_SANITIZE_STRING);
   $player_num = filter_var($_POST["players"], FILTER_SANITIZE_STRING);
   $location = filter_var($_POST["where"],FILTER_SANITIZE_STRING);
    
    $user_name = $_SESSION['user_name'];
    $_SESSION['boardgame'] = $b_name;
    $_SESSION['gtype'] = $g_type;
    $_SESSION['players'] = $player_num;
    $_SESSION['where'] = $location;
    
  
   
    require_once 'Dao.php';
    $dao = new Dao();
    $dao->registerMeet($user_name, $b_name, $g_type, $player_num, $location);
}
?>
