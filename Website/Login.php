
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
</head>
<body>
    <a id="RegisterAndLoginRight" href="Register.php">Register</a>
    <a id="RegisterAndLoginRight" href="Login.php">Login</a>
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

<h2>Login</h2>
<div class="form">
        <form method="POST" action="login_handler.php">
          <div>LOGIN</div>
          <input type="text" name="username" placeholder="Username"/>
          <div>PASSWORD</div>
          <div><input type="password" name="password" placeholder="Password"/></div>
          <div><button class="submit">Login</button></div>
        </form>
</div>
</body>
<footer>Copyright @ 2019 | alexharris@u.boisestate.edu</footer>
</html>
