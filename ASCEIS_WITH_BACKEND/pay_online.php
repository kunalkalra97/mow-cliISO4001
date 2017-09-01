<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("location:login_now.php");
}



include("connection.php");


		// unique id generated from my side
		$tran = "ICESw".$_POST['id_trans'];

		// name of the candidate
		$name= $_POST['id_name'];

		// ices event id
		$event= $_POST['id_event'];

		// amount to be paid
		$amount= $_POST['amt_event'];

		// merchant id
		$id= $_POST['id_merchant'];

		// merchant password
		$pw= $_POST['id_password'];

      $sql="UPDATE work_reg SET dd='w' WHERE u_id='".$_SESSION['login_id']."' AND dd!='t'";
      $res=mysqli_query($con,$sql);

      $sql3="UPDATE work_cart SET paid='w' WHERE u_id='".$_SESSION['login_id']."'";
      $res3=mysqli_query($con,$sql3);

echo '<form id="payment" method="POST" action="https://academics.vit.ac.in/online_application2/onlinepayment/Online_pay_request1.asp">';
      echo'<input type="hidden" name="id_trans" value="'.$tran.'">
      <input type="hidden" name="id_name" value="'.$name.'">
      <input type="hidden" name="id_event" value="15">
      <input type="hidden" name="amt_event" value="'.$amount.'">
      <input type="hidden" name="id_merchant" value="1014">
      <input type="hidden" name="id_password" value="(VitiICES_2016@)">';
echo '</form>';
      ?>
<html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		 $("#payment").submit();
	});
</script>
</html>
