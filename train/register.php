<?php
//database details and variables
global $hostserver;
global $username;
global $password;
global $database;
global $conn;
$hostserver = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'mydb';
$conn = mysqli_connect($hostserver, $username, $password, $database);
if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}
//When user submits the form run the below code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $username = $_POST['username'];
    $_SESSION['uname'] = $username;
    $password = $_POST['password'];
    $fnameQuery = "SELECT username FROM user_register";
    $fnameResult = mysqli_query($conn, $fnameQuery);
    while ($fnameFetch = mysqli_fetch_array($fnameResult)) {
        if ($username == $fnameFetch['username']) {
            echo "
            <script>
                alert('User Already exist');
                history.back();
            </script>
            ";
            die();
        }
    }
    $userid = "select userid from user_register where username = '$username'";
    //insertion Query
    $sqlQuery = "insert into user_register(username, password) values('$username','$password')";
    $commit = "commit;";
    if (mysqli_query($conn, $sqlQuery)) {
        mysqli_query($conn, $commit);
        mysqli_query($conn, $commit);
        echo "
        <script>
            alert('Data Inserted Successfully');
            window.location = 'user_reservation.php';            
        </script>
        ";
    } else {
        die("something went Wrong : " . mysqli_connect_error());
    }
}
