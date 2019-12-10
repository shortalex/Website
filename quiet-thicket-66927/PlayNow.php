<?php
// Init session
session_start();
if(!isset($_SESSION['log_in']) || $_SESSION['log_in'] !== true){
        header("location: Login.php");
        exit();
    
}

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="/favicon.png" type="image/png" />
  <link rel="shortcut icon" href="/favicon.png" />
  <link rel="stylesheet" type="text/css" href="nav.css">
  <link rel="stylesheet" type="text/css" href="reference.css">

<link href="https://fonts.googleapis.com/css?family=Alatsi|Bebas+Neue|Calistoga&display=swap" rel="stylesheet">

  <title>Playing Now</title>
</head>
<body>
<?php
    if(!isset($_SESSION['log_in']) || $_SESSION['log_in'] !== true){
        echo '<a id="RegisterAndLoginRight" href="Register.php">Register</a>';
        echo '<a id="RegisterAndLoginRight" href="Login.php">Login |</a>';
        
    }
    else{
        echo '<a id="RegisterAndLoginRight" href="logout_handler.php">Log out</a>';
    }
?>
    <div>
        <img src="Logo.png" alt="Game Logo" width="8%" height="8%">
        <h1 style="display: inline;">The Board Game For Me</h1>
    </div>
<div class="nav">
      <ul>
        <li class="Board games"><a href="index.php">Board Games</a></li>
        <li class="Chat"><a href="Chat.php">Chat</a></li>
        <li class="PlayNow"><a class="active" href="PlayNow.php">Playing Now</a></li>
      </ul>
    </div>
    <div class="nav">
      <ul>
        <li class="Playing"><a class="active" href="PlayNow.php">Playing</a></li>
        <li class="Invite"><a href="Invite.php">Invite</a></li>
      </ul>
    </div>
<?php
  echo ($_SESSION['log_message']);
    echo ($_SESSION['test']);
    echo ($_SESSION['meetMessages']);
?>
    <img id="i01" src="idaho-google-maps-18.gif" alt="Map of Idaho" width="90%" height="100%">
</body>
<footer>Copyright @ 2019 | alexharris@u.boisestate.edu</footer>
</html>
