<?php
  session_start();
  echo ($_SESSION['log_message']);
?>

<html lang="en-US">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="/favicon.png" type="image/png" />
  <link rel="shortcut icon" href="/favicon.png" />
  <link rel="stylesheet" type="text/css" href="nav.css">
  <link rel="stylesheet" type="text/css" href="reference.css">
  <title>Register</title>
</head>
<body>
   <a id="RegisterAndLoginRight" href="logout_handler.php">Log out</a>
   <a id="RegisterAndLoginRight" href="Register.php">Register |</a>
   <a id="RegisterAndLoginRight" href="Login.php">Login |</a>
    <div>
        <img src="Logo.png" alt="Game Logo" width="10%" height="10%"><span>
        <h1 style="display: inline;">The Board Game For Me</h1>
    </div>
<div class="nav">
  <ul>
    <li class="Board games"><a href="index.php">Board Games</a></li>
    <li class="Chat"><a href="Chat.php">Chat</a></li>
    <li class="Play now"><a href="PlayNow.php">Play Now</a></li>
  </ul>
</div>

<h2>Register</h2>
<div class="form">
    <form name="Form1" action="Register_handler.php" method="POST">
      <div>First Name: <input type="text" name="fname"></div>
      <div>Last Name:  <input type="text" name="lname"></div>
      <div>Username:   <input type="text" name="username"></div>
      <div>Email:      <input type="email" name="email"></div>
      <div>Password:   <input type="text" name="password"></div>
      <div>Re-Type Password: <input type="text" name="repassword"></div>
      <div><button type="POST">Register</button></div>
    </form>
</div>
</body>
<footer>Copyright @ 2019 | alexharris@u.boisestate.edu</footer>
</html>
