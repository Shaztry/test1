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
class Student
{
    public function main()
    {
        $hostserver = '127.0.0.1';
        $username = 'shas3';
        $password = 'shas3@123';
        $database = 'mydb';
        $conn = mysqli_connect($hostserver, $username, $password, $database);
        //When user submits the form run the below code
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $address = $_POST['address'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            //fetch firstname exist or not
            $fnameQuery = "SELECT fname FROM users";
            $fnameResult = mysqli_query($conn, $fnameQuery);
            while ($fnameFetch = mysqli_fetch_array($fnameResult)) {
                if ($fname == $fnameFetch['fname']) {
                    echo "
                <script>
                    alert('User Already exist');
                    history.back();
                </script>
            ";
                    die();
                }
            }
            //insertion Query
            $sqlQuery = "insert into users(fname, mname, lname, email, gender, dob, address) values('$fname','$mname','$lname','$email','$gender','$dob','$address')";
            $commit = "commit;";
            if (mysqli_query($conn, $sqlQuery)) {
                mysqli_query($conn, $commit);
                echo "
            <script>
                alert('Data Inserted Successfully');
                window.location = 'ajhtml.html';
            </script>
                ";
            } else {
                die("something went Wrong : " . mysqli_connect_error());
            }
        }
    }
}
$obj1 = new Student();
$obj1->main();