<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="/favicon.png" type="image/png" />
  <link rel="shortcut icon" href="/favicon.png" />
  <link rel="stylesheet" type="text/css" href="nav.css">
  <link rel="stylesheet" type="text/css" href="reference.css">
  <title>Invite</title>
</head>
<body>
<a id="RegisterAndLoginRight" href="logout_handler.php">Log out</a>
   <a id="RegisterAndLoginRight" href="Register.php">Register |</a>
   <a id="RegisterAndLoginRight" href="Login.php">Login |</a>
    <div>
        <img src="Logo.png" alt="Game Logo" width="10%" height="10%">
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
