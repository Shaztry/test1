<?php
//database details and variables
global $hostserver;
global $username;
global $password;
global $database;
global $conn;
$hostserver = '127.0.0.1';
$username = 'shas3';
$password = 'shas3@123';
$database = 'mydb';
$conn = mysqli_connect($hostserver, $username, $password, $database);
if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}


function main()
{
    $hostserver = '127.0.0.1';
    $username = 'shas3';
    $password = 'shas3@123';
    $database = 'mydb';
    $conn = mysqli_connect($hostserver, $username, $password, $database);
    //When user submits the form run the below code
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $srcaddr = $_POST['srcaddr'];
        $destaddr = $_POST['destaddr'];
        $userid = $_POST['userid'];
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
            </script>
                ";
        } else {
            die("something went Wrong : " . mysqli_connect_error());
        }
    }
}
main();
?>