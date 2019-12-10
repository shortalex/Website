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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("input").focus(function(){
    $(this).css("background-color", "LightGrey");
  });
  $("input").blur(function(){
    $(this).css("background-color", "white");
  });
});
</script>

  <title>Invite</title>
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
    <li class="Play now"><a class="active" href="PlayNow.php">Play Now</a></li>
  </ul>
</div>
<div class="nav">
    <ul>
      <li class="Playing"><a href="PlayNow.php">Playing</a></li>
      <li class="Invite"><a class="active" href="Invite.php">Invite</a></li>
    </ul>
  </div>
<?php
  echo ($_SESSION['log_message']);
    echo ($_SESSION['meetMessages']);
?>
<h2>Search Board Games</h2>
<div class="form">
    <form name="Form2" action="Invite_handler.php" method="Post">
      <p>Username: <?php echo ($_SESSION['user_name']); ?></p>
      <div>What Board Game: <input type="text" name="boardgame" value="<?php if(isset($_SESSION['boardgame'])) { echo htmlentities ($_SESSION['boardgame']); }?>" required></div>
      <div>Type of Board Game: <input type="text" name="gtype" value="<?php if(isset($_SESSION['gtype'])) { echo htmlentities ($_SESSION['gtype']); }?>"></div>
      <div>How Many Players Are Needed: <input type="text" name="players" value="<?php if(isset($_SESSION['players'])) { echo htmlentities ($_SESSION['players']); }?>" required></div>
      <div>Where Are You Playing: <input type="text" name="where"value="<?php if(isset($_SESSION['where'])) { echo htmlentities ($_SESSION['where']); }?>" required></div>
      <div><button type="POST">Submit</button></div>
    </form>
</div>
<img id="i01" src="idaho-google-maps-18.gif" alt="Map of Idaho" width="50%" height="50%">
</body>
<footer>Copyright @ 2019 | alexharris@u.boisestate.edu</footer>
</html>
