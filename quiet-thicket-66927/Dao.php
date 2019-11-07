<?php

class Dao {
  private $host = 'xefi550t7t6tjn36.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
  private $dbname = 'lc21acry1dwuj1mk';
  private $username = 'f6sl32mav9ykpww2';
  private $password = 'waj3pfigr5ng76ky';
  private $logger;
  
  public function getConnection() {
    try {
       $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
    } catch (Exception $e) {
      echo print_r($e,1);
    }
    return $connection;
  }
    
  public function getComments() {
    $conn = $this->getConnection();
    try {
    return $conn->query("select * from chat order by PostDate desc", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit();
    }
  }

    public function isValidUser($username, $password){
        $conn = $this->getConnection();
        $loginquery = "SELECT * FROM user WHERE Username = ? && Password = ?";
         $q = $conn->prepare($loginquery);
         $q->execute([$username, $password]);
        $valid = $q->fetch();
        return $valid;
    }
    
  public function saveComment ($user_name, $comment) {
    $conn = $this->getConnection();
    $saveQuery = "insert into comments (uid, message) values (:uid, :message)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":uid", $user_name);
      $q->bindParam(":message", $comment);
    $q->execute();
  }
    
  public function deleteComment ($id) {
    $conn = $this->getConnection();
    $deleteQuery = "delete from comment where comment_id = :id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }

  public function registerUser($u_name, $u_email, $u_password, $first_name, $last_name)
  {
   $conn = $this->getConnection();
    $Query = "SELECT * FROM user WHERE Username = ? && Email = ?";
    $q1 = $conn ->prepare($Query);
    $q1->execute([$u_name,$u_email]);
    $valid = $q1->fetch();
      
      if(empty($valid))
      {
          $conn = $this->getConnection();
          $registerQuery = "insert into user (Email, Username, Password, Firstname, Lastname) values (:Email, :Username, :Password, :Firstname, :Lastname)";
          $q = $conn->prepare($registerQuery);
          $q->bindParam(":Username", $u_name);
          $q->bindParam(":Email", $u_email);
          $q->bindParam(":Password", $u_password);
          $q->bindParam(":Firstname", $first_name);
          $q->bindParam(":Lastname", $last_name);
          $q->execute();
          $_SESSION['messages'] = "You are registered";
          header("Location: Login.php");
      }
      else{
          $_SESSION['exists'] = "Your user name or email already exists!";
          header("Location: Register.php");
      }
  }
    public function registerMeet($user_name, $b_name, $g_type, $player_num, $location)
    {
            $conn = $this->getConnection();
            $registerMeetQ = "insert into meet (Username, GameName, GameType, NumPlayers, Loction) values (:Username, :GameName, :GameType, :NumPlayers, :Location)";
            $q = $conn->prepare($registerMeetQ);
            $q->bindParam(":Username", $user_name);
            $q->bindParam(":GameName", $b_name);
            $q->bindParam(":GameType", $g_type);
            $q->bindParam(":NumPlayers", $player_num);
            $q->bindParam(":Location", $location);
            $q->execute();
            $_SESSION['meetMessages'] = "You have posted an invite";
            header("Location: PlayNow.php");

    }
    
}
