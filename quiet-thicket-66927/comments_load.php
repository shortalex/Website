<?php
date_default_timezone_set("America/Boise");
    $host = 'xefi550t7t6tjn36.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    $dbname = 'lc21acry1dwuj1mk';
    $username = 'f6sl32mav9ykpww2';
    $password = 'waj3pfigr5ng76ky';

$sql = "SELECT * FROM comments ORDER BY cid desc limit 20 ";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<div class ='comment-box'><p>";
    echo "<b>Author:</b>   ".$row['uid']."<br>";
    echo "<b>Date Posted:</b>   ".$row['date']."<br>";
    echo "<hr>".nl2br($row['message']);
    echo "</p>";
    if (isset($_SESSION['status']) == 'authorized') { 
      echo "<form class='delete-form' method='POST' action='".deleteComments()."'>
      <input type ='hidden' name='cid' value='".$row['cid']."'>
      <button name='commentDelete'>Delete</button>
      </form>
      </div>";
    } else {
      echo "</div>";
    }
  }
} else {
  echo "There are no comments";
}

function deleteComments() {
  $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
  if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
  }
  if (isset($_POST['commentDelete'])) {
    $cid = $_POST['cid'];
    $sql = "DELETE FROM comments WHERE cid='$cid'";
    $result = $conn->query($sql);
    Header('Location: '.$_SERVER['PHP_SELF']);
  }
}
?>
