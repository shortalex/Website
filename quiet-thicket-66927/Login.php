<!DOCTYPE html>
<html lang="en-US">
<html>
<head>
  <meta charset="utf-8">
  <link rel="icon" href="/favicon.png" type="image/png" />
  <link rel="shortcut icon" href="/favicon.png" />
  <link rel="stylesheet" type="text/css" href="nav.css">
  <link rel="stylesheet" type="text/css" href="reference.css">
  <title>Login</title>

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
        <img src="Logo.png" alt="Game Logo" width="8%" height="8%"><span>
        <h1 style="display: inline;">The Board Game For Me</h1>
    </div>
<div class="nav">
  <ul>
    <li class="Board games"><a href="index.php">Board Games</a></li>
    <li class="Chat"><a href="Chat.php">Chat</a></li>
    <li class="Play now"><a href="PlayNow.php">Play Now</a></li>
  </ul>
</div>
<?php
  session_start();
    
  echo  ($_SESSION['notlog_message']);
  echo ($_SESSION['log_message']);
    echo ($_SESSION['messages']);
?>
<h2>Login</h2>
<div class="form">
        <form method="POST" action="login_handler.php">
          <div>LOGIN</div>
          <input type="text" name="username" placeholder="Username" value="<?php if(isset($_SESSION['user_name'])) { echo htmlentities ($_SESSION['user_name']); }?>" required/>
          <div>PASSWORD</div>
          <div><input type="password" name="password" placeholder="Password" required/></div>
          <div><button class="submit">Login</button></div>
        </form>
</div>
</body>
<footer>Copyright @ 2019 | alexharris@u.boisestate.edu</footer>
</html>
