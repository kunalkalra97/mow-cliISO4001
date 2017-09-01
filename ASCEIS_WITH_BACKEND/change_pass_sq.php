<?php
session_start();
    if(!isset($_SESSION['login']))
    {
        header("location:re_login.php");
    }

include("connection.php");
$auto_pass=$_POST['auto_pass'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];

$auto_pass=stripslashes($auto_pass);
$password1=stripslashes($password1);
$password2=stripslashes($password2);

$auto_pass = mysqli_real_escape_string($con,$auto_pass);
$password1 = mysqli_real_escape_string($con,$password1);
$password2 = mysqli_real_escape_string($con,$password2);



	if($password2==$password1)
	{
		$sql="select * from register where email='".$_SESSION['login']."' and password='".$auto_pass."' and id='".$_SESSION['login_id']."'";
		//echo $sql."<br>";
		$res=mysqli_query($con,$sql);
		$count_res=mysqli_num_rows($res);
		if($count_res==1)
		{
		$sql="UPDATE register set password='".$password1."' where id='".$_SESSION['login_id']."'";
		$res=mysqli_query($con,$sql);
			if($res)
			{
				//echo "password changed";
				header("location:reg_desk.php");
			}
			else{
				echo "problem";
			}
		}
}
else
{
	header("location:error.php");
}
?>
