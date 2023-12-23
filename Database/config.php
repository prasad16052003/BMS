<?php
$hostname     = "localhost"; // Enter Your Host Name
$username     = "root";      // Enter Your Table username
$password     = "";          // Enter Your Table Password
$databasename = "cdr_bms"; // Enter Your database Name

$conn = new mysqli($hostname, $username, $password, $databasename);
// date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

