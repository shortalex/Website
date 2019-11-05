
<!DOCTYPE html>
<html lang="en-US">
<head>
  <link href="favicon.ico" type="image/ico" rel="shortcut icon">
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
  session_start();
  echo ($_SESSION['log_message']);
?>
<h2>Chat</h2>
<form action="comment_handler.php" method="post">
      <div>Leave a comment</div>
      <input value="<?php echo $_SESSION['form_data']['comment'] ?>" type="text" name="comment">
      <input type="submit">
    </form>
    <?php
    if (isset($_SESSION['messages'])) {
       foreach ($_SESSION['messages'] as $message) {
         echo "<div class='message {$_SESSION['sentiment']['user_name']}'>{$message}</div>";
       }
    }

    ?>
    <?php
       require_once 'Dao.php';
       $dao = new Dao();
       $comments = $dao->getComments();
       echo "<table>";
       foreach($comments as $comment) {
         echo "<tr><td>" . htmlspecialchars($comment['comment']) . "</td>" .
           "<td>{$comment['date_entered']}" .
           "<td><a href='delete_handler.php?comment_id={$comment['comment_id']}'>X</a></td></tr></tr>";
       }
         echo "</table>";
    ?>
  </body>
<footer>Copyright 2019</footer>
</html>
