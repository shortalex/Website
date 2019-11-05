
<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="/favicon.png" type="image/png" />
  <link rel="shortcut icon" href="/favicon.png" />
  <link rel="stylesheet" type="text/css" href="nav.css">
  <link rel="stylesheet" type="text/css" href="reference.css">
  <title>Top Board Games</title>
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
    <li class="Board games"><a class="active" href="index.php">Board Games</a></li>
    <li class="Chat"><a href="Chat.php">Chat</a></li>
    <li class="Play now"><a href="PlayNow.php">Play Now</a></li>
  </ul>
</div>
<div class="nav">
    <ul>
      <li class="Search Board Games"><a href="index.php">Search Board Games</a></li>
      <li class="Top Board Games"><a class="active" href="TopBoardGames.php">Top Board Games</a></li>
      <li class="Browse Board Games"><a href="BrowseBoardGames.php">Browse Board Games</a></li>
    </ul>
  </div>
<?php
  session_start();
  echo ($_SESSION['log_message']);
?>
<h2>Top Board Games</h2>
<table id="t01">
  <tr>
    <th>Game</th>
    <th>Description</th>		
    <th>Rating</th>
  </tr>
  <tr>
    <td><img src="BoardGamePic.jpg" alt="Game Night" width="15%" height="10%"><span>Board Game Name</span></td>
    <td>Description</td>		
    <td>Rating</td>
  </tr>
  <tr>
    <td><img src="BoardGamePic.jpg" alt="Game Night" width="15%" height="10%"><span>Board Game Name</span></td>
    <td>Description</td>		
    <td>Rating</td>
  </tr>
  <tr>
    <td><img src="BoardGamePic.jpg" alt="Game Night" width="15%" height="10%"><span>Board Game Name</span></td>
    <td>Description</td>		
    <td>Rating</td>
  </tr>
</table>
</body>
<footer>Copyright @ 2019 | alexharris@u.boisestate.edu</footer>
</html>
