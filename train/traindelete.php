<?php
$connect = mysqli_connect("127.0.0.1", "shas3", "shas3@123", "mydb");
if(isset($_POST["userid"]))
{
 $query = "DELETE FROM user_reservation WHERE userid = '".$_POST["userid"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>