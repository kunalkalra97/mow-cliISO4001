<?php
session_start();

include("connection.php");
$login=$_POST['login'];
$pass=$_POST['pass'];

$login=stripslashes($login);
$pass=stripslashes($pass);

$login = mysqli_real_escape_string($con,$login);
$pass = mysqli_real_escape_string($con,$pass);

$sql="select * from register where email='$login' and password='$pass'";

$res=mysqli_query($con,$sql);

if($res)
{
	$count=mysqli_num_rows($res);
	// echo $count;

	if($count==1)
	{
		$row=mysqli_fetch_array($res);
		$login_c=$row['count_login'];
		$login_c++;
			$_SESSION['login']=$row['email'];
			$_SESSION['login_id']=$row['id'];
			$_SESSION['name']=$row['name'];
			$_SESSION['reg_type']=$row['type'];
			$sql="UPDATE register SET count_login='".$login_c."' where id='".$_SESSION['login_id']."'";
			$res=mysqli_query($con,$sql);
			

			if($login_c=='1') {
				header("location:change_pass.php");
			}
			
			else {
				header("location:reg_desk.php");
			}
	}
	else{
		// header("location:re_login.php");

	}
}
else{
//header("location:error.php");
echo mysqli_error($con);
}

?>
