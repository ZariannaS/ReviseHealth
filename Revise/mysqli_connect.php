<?php

DEFINE('DB_HOST', 'localhost');
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', ''); // '' with your MySQL password
DEFINE('DB_NAME', 'rehab');

// Create connection
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Check connection
if (!$dbc){
      die('Could not connect to MySQL ' . mysqli_connect_error()); 
}
//echo “Connected successfully”;
?>
