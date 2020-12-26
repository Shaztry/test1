<?php
$connect = mysqli_connect("127.0.0.1", "shas3", "shas3@123", "mydb");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM users WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>