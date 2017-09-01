<?php

  include("../connection.php");

  $contingent = $_POST['contingent'];
  $size = $_POST['size'];

  $sql = "UPDATE tshirt SET n_size = '".$size."' WHERE u_id = '".$contingent."'";
  $res = mysqli_query($con, $sql);

  if($res)
    echo 1;
  else
    echo 0;
?>
