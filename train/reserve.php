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
    $userid = $_POST['userid'];
    $srcaddr = $_POST['srcaddr'];
    $destaddr = $_POST['destaddr'];
    $amount = $_POST['amount'];
    //insertion Query
    $sqlQuery = "insert into user_reservation(userid, sourceaddr, destinationaddr, amount) values('$userid','$srcaddr', '$destaddr',$amount)";
    $commit = "commit;";
    if (mysqli_query($conn, $sqlQuery)) {
        mysqli_query($conn, $commit);
        echo "
            <script>
                alert('Data Inserted Successfully');
                //window.location = 'user_reservation.html';
                //here ajax table location
            </script>
                ";
    } else {
        die("something went Wrong : " . mysqli_connect_error());
    }
}
?>