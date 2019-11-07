<?php
//Setup information for database connection 
	define('DB_SERVER', 'xefi550t7t6tjn36.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
	define('DB_USERNAME',  'f6sl32mav9ykpww2');
	define('DB_PASSWORD',  'waj3pfigr5ng76ky');
	define('DB_NAME', 'lc21acry1dwuj1mk');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>
