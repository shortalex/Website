<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

    //mysql credentials
    $mysql_host = "bqmayq5x95g1sgr9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $mysql_username = "jtd67j9jx2zd0mv9";
    $mysql_password = "xqluha81v2i8wuhn";
    $mysql_database = "jcjm72kbv4vyjxzj";
    
    $first_name = filter_var($_POST["fname"],FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST["lname"],FILTER_SANITIZE_STRING);
    $u_name = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $u_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $u_password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
    

    if (empty($u_name)){
        die("Please enter your username");
    }
    if (empty($u_email) || !filter_var($u_email, FILTER_VALIDATE_EMAIL)){
        die("Please enter valid email address");
    }
        
    if (empty($u_password)){
        die("Please enter password");
    }

    //Open a new connection to the MySQL server
    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
    
    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
    
    $statement = $mysqli->prepare("INSERT INTO user (Email, Username, Password, Firstname, Lastname) VALUES(?, ?, ?, ?, ?)"); //prepare sql insert query
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    $statement->bind_param('sssss', $u_email, $u_name, $u_password, $first_name, $last_name); //bind values and execute insert query
    
    if($statement->execute()){

        //print "Hello " . $u_name . "!, your message has been saved!";
        header( 'Location: http://quiet-thicket-66927.herokuapp.com/Login.html' );

    }else{
        print $mysqli->error; //show mysql error if any
    }
}
?>
