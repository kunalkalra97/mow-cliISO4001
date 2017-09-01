<?php
// ini_set('display_startup_errors',1);
// ini_set('display_errors',1);
// error_reporting(-1);

session_start();
if(!isset($_SESSION['login']))
{
	header("location:re_login.php");
}
$msg="";
include("connection.php");
$accomp=$_POST['accomp'];
$sql="SELECT * from con_reg where u_id='".$_SESSION['login_id']."'";
$res=mysqli_query($con,$sql);
$count_rows=mysqli_num_rows($res);
if($count_rows!=1)
{
	$sql="INSERT INTO con_reg(u_id, accompany, dd, ol) values(".$_SESSION['login_id'].",'".$accomp."','f','f')";
	if($_SESSION['reg_type']=="ac")
	{
		if($accomp=="f")
		{$con_amount=8000;}
		else if($accomp=="t")
		{$con_amount=2500;}
		else if($accomp=="p")
		{$con_amount=3000;}

	}
	else if($_SESSION['reg_type']=="rs"){
		if($accomp=="f")
		{$con_amount=6500;}
		else if($accomp=="t")
		{$con_amount=2000;}
		else if($accomp=="p")
		{$con_amount=2500;}
	}

	else if($_SESSION['reg_type']=="in"){
		if($accomp=="f")
		{$con_amount=10000;}
		else if($accomp=="t")
		{$con_amount=2500;}
		else if($accomp=="p")
		{$con_amount=3500;}
	}

	else if($_SESSION['reg_type']=="st"){
		if($accomp=="f")
		{$con_amount=6500;}
		else if($accomp=="t")
		{$con_amount=2000;}
		else if($accomp=="p")
		{$con_amount=2500;}
	}

	$sql3="INSERT INTO con_cart(u_id,con_amount,paid) values(".$_SESSION['login_id'].",'".$con_amount."','f')";
	// echo $sql3;
	$res3=mysqli_query($con,$sql3);
	// if($res3) {
	// 	echo "Success cart";
	// }
	// else {
	// 		echo "Failed cart";
	// }
	$res=mysqli_query($con,$sql);
	if($res)
	{
		header("location:con_reg_desk.php");
	}
	else
	{
		header("location:error.php");
	}
}
?>
