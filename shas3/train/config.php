<?php
    session_start();
    $hostserver = '127.0.0.1';
    $username = 'root';
    $password = '';
    $database = 'mydb';
    $conn = mysqli_connect($hostserver,$username,$password,$database);
    if(!$conn){
        die("Connection failed". mysqli_connect_error());
    }
?>