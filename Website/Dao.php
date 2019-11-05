<?php

class Dao {
  private $host = 'bqmayq5x95g1sgr9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
  private $dbname = 'jcjm72kbv4vyjxzj';
  private $username = 'jtd67j9jx2zd0mv9';
  private $password = 'xqluha81v2i8wuhn';
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
    return $conn->query("select ChatID, Username, Chat, PostDate from comment order by date_entered desc", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
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
    $saveQuery = "insert into chat (Username, Chat) values (:username, :comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":username", $user_name);
      $q->bindParam(":comment", $comment);
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
}
