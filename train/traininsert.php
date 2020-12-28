<?php
$connect = mysqli_connect("127.0.0.1", "shas3", "shas3@123", "mydb");
if(isset($_POST["userid"], $_POST["srcaddr"],$_POST["destaddr"],$_POST["amount"]))
{
 $userid = mysqli_real_escape_string($connect, $_POST["userid"]);
 $srcaddr = mysqli_real_escape_string($connect, $_POST["srcaddr"]);
 $destaddr = mysqli_real_escape_string($connect, $_POST["destaddr"]);
 $amount = mysqli_real_escape_string($connect, $_POST["amount"]);
 $query = "INSERT INTO user_reservation(userid, sourceaddr, destinationaddr, amount) VALUES('$userid', '$srcaddr', '$destaddr', '$amount')";
 $commit = "commit;";
 if(mysqli_query($connect, $query) && mysqli_query($connect, $commit))
 {
  echo 'Data Inserted';
 }
}
?>