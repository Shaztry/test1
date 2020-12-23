<?php
$connect = mysqli_connect("127.0.0.1", "shas3", "shas3@123", "mydb");
if(isset($_POST["fname"], $_POST["mname"],$_POST["lname"],$_POST["email"],$_POST["gender"],$_POST["dob"],$_POST["address"]))
{
 $fname = mysqli_real_escape_string($connect, $_POST["fname"]);
 $mname = mysqli_real_escape_string($connect, $_POST["mname"]);
 $lname = mysqli_real_escape_string($connect, $_POST["lname"]);
 $email = mysqli_real_escape_string($connect, $_POST["email"]);
 $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
 $dob = mysqli_real_escape_string($connect, $_POST["dob"]);
 $address = mysqli_real_escape_string($connect, $_POST["address"]);
 $query = "INSERT INTO users(fname, mname, lname, email, gender, dob, address) VALUES('$fname', '$mname', '$lname', '$email', '$gender', '$dob', '$address' )";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>