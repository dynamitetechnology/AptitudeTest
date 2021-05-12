<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'dcodetec_campusdata');
define('DB_PASSWORD', 'kn+rR[,$aYNJ');
define('DB_NAME', 'dcodetec_campusdata');
 

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($conn, 'utf8');

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>