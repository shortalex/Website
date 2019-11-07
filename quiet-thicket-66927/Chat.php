<?php
// Init session
session_start();
    require_once 'dbconfig.php';
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    #require_once 'Dao.php';
    #$dao = new Dao();
    #$dao->getConnection();
    
    if(!$conn) {
      die("Connection failed: ".mysqli_connect_error());
    }

// Check if user is logged in, if not, redirect to login page
if(!isset($_SESSION['log_in']) || $_SESSION['log_in'] !== true){
    header("location: Login.php");
    exit;
}

if(isset($_POST['uid'], $_POST['message'])) {
  $uid = htmlentities($_POST['uid']);
  $date = date('Y/m/d h:i:s');
  $message = htmlentities($_POST['message']);
    $_SESSION['post']= " Comment posted.";

  $sql = "INSERT INTO comments (uid, date, message)
  VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sss", $uid, $date, $message);
  $result = mysqli_stmt_execute($stmt);
}

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
  <link rel="icon" href="/favicon.png" type="image/png" />
  <link rel="shortcut icon" href="/favicon.png" />
  <link rel="stylesheet" type="text/css" href="nav.css">
  <link rel="stylesheet" type="text/css" href="reference.css">
  <title>Chat</title>
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
    <li class="Chat"><a class="active" href="Chat.php">Chat</a></li>
    <li class="Play now"><a href="PlayNow.php">Play Now</a></li>
  </ul>
</div>
<?php
  echo ($_SESSION['log_message']);
    echo ($_SESSION['post']);
?>
<h2>Chat</h2>
<div>

<form for="comments" method='POST'>
  <hr>
  <input type='hidden' name='uid' value=    <?php
    if(isset($_SESSION["log_in"]) || $_SESSION["log_in"] === true) {
      echo $_SESSION['user_name'];
    } else
      echo "Anonymous";
  ?>>
  <textarea name='message' placeholder="Your Comment here..."></textarea><br>
  <input id="submit" type="submit" value="comment">
</form>
<?php include "comments_load.php"; ?>
  </div>
  </body>
<footer>Copyright @ 2019 | alexharris@u.boisestate.edu</footer>
</html>
