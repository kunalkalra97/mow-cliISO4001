<?php

session_start();
if(!isset($_SESSION['login']))
{
  header("location:login_now.php");
}

include("connection.php");

$sql = "UPDATE work_cart SET paid='f' WHERE u_id='".$_SESSION['login_id']."'";
$res = mysqli_query($con, $sql);

if($res) {
  header("location: reg_desk.php");
}
else {
  header("location: error.php");
}

?>
