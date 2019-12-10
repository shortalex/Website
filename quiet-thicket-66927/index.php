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

<link href="https://fonts.googleapis.com/css?family=Alatsi|Bebas+Neue|Calistoga&display=swap" rel="stylesheet">
  <title>Board Games</title>
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
<h1 id= "title" style="display: inline;">The Board Game For Me</h1>
    </div>
<div class="nav">
  <ul>
    <li class="Board games"><a class="active" href="index.php">Board Games</a></li>
    <li class="Chat"><a href="Chat.php">Chat</a></li>
    <li class="Play now"><a href="PlayNow.php">Play Now</a></li>
  </ul>
</div>
<div class="nav">
  <ul>
    <li class="Search Board Games"><a class="active" href="index.php">Search Board Games</a></li>
    <li class="Top Board Games"><a href="TopBoardGames.php">Top Board Games</a></li>
    <li class="Browse Board Games"><a href="BrowseBoardGames.php">Browse Board Games</a></li>
  </ul>
</div>
<?php
  echo ($_SESSION['log_message']);
?>
<h2>Search Board Games</h2>
<div class="form">
    <form name="Form1" action="https://www.google.com/" method="get">
      Search: <input type="text" name="fname">
       <div><button type="get">Submit</button></div>
    </form>
</div>
</body>
<footer>Copyright @ 2019 | alexharris@u.boisestate.edu</footer>
</html>
