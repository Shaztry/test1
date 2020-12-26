<?php
$host = "localhost"; /* Host name */
$user = "shas3"; /* User */
$password = "shas3@123"; /* Password */
$dbname = "mydb"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}