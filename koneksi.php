<?php
$host = "db-mysql-sgp1-60165-do-user-17006245-0.c.db.ondigitalocean.com";
$port = 25060;
$database = "antic_finder";
$user = "kirani";
$pw = "AVNS_bcXtUFcnkQtOLjaf_V5";

// $host = "localhost";
// $port = 3306;
// $database = "db_antic";
// $user = "root";
// $pw = "";
$connection = new PDO("mysql:host=$host:$port;dbname=$database", $user, $pw);
?>