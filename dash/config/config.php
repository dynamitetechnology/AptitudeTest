<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'aptitudetest');

//define('DB_USERNAME', 'aiyejant_taxvex_dot_com');
//define('DB_PASSWORD', 'NabA*z6rM%;#');
//define('DB_NAME', 'aiyejant_taxvex_dot_com');
 

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($conn, 'utf8');

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>