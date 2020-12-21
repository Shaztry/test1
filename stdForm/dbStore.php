<?php
require 'dbConn.php';
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
    $sqlQuery = "insert into form(fname, mname, lname, email, gender, dob, address) values('$fname','$mname','$lname','$email','$gender','$dob','$address')";
    $commit = "commit;";
    if (mysqli_query($conn, $sqlQuery)) {
        mysqli_query($conn, $commit);
        echo "
            <script>alert('Data Inserted Successfully');</script>
        ";
    } else {
        die("something went Wrong : " . mysqli_connect_error());
    }
}
