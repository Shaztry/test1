<?php
define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'shas3');

define('DB_PASSWORD', 'shas3@123');

define('DB_NAME', 'mydb');

$DBconnect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//echo "Connect Successfully. Host info: " . mysqli_get_host_info($DBconnect);

if (!$DBconnect) {
    die("Connection failed: " . mysqli_connect_error());
}
//mysqli_close($DBconnect);