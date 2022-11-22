<?php
/* This file contains database configuration assuming you are
running mysql using user "root" and "password" */

define('DB_SERVER', 'localhost') ;
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'RICA_A&T_DB');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($conn === false)
{
  die("ERROR: Could not connect. " .  $mysqli->connect_error);
}
else
{
	$conn_message = "RICA Server Connection Established....";
}

date_default_timezone_set('Asia/Kolkata');
?>