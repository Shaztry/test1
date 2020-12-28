<?php
$connect = mysqli_connect("127.0.0.1", "shas3", "shas3@123", "mydb");
if(isset($_POST["userid"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE user_reservation SET ".$_POST["column_name"]."='".$value."' WHERE userid = '".$_POST["userid"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}
?>