<?php
// MySQL connection
$dbServer = "localhost:8080";
$dbUser = "root@localhost:8080";
$dbPassword = "";
$database = "studentdb";

$conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $database) or die('Mysql Connection Error:' . mysqli_connect_error());
