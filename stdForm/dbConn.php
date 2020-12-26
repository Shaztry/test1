<?php
//DB Details
$hostserver = '127.0.0.1';
$username = 'shas3';
$password = 'shas3@123';
$database = 'mydb';
$conn = mysqli_connect($hostserver, $username, $password, $database);

//Database connection error handling
if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}

//Execute Query
$getQuery = "select * from form";
$result = mysqli_query($conn, $getQuery);
//Query to check whether entered details exists or not
$fnameQuery = "SELECT fname FROM form";
$fnameResult = mysqli_query($conn, $fnameQuery);
?>
