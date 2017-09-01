<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("location:re_login.php");
}
$msg="";

$shirt=$_POST['t'];
$size=$_POST['size'];
$click=$_POST['click'];


	include("connection.php");

		$sql="SELECT * from tshirt where u_id='".$_SESSION['login_id']."'";
        $res=mysqli_query($con,$sql);
        $count_rows=mysqli_num_rows($res);
        if($count_rows!=1)
        {
        		if($shirt=="navy")
        			$sql="INSERT INTO tshirt(u_id, navy, n_size, white, w_size, paid) VALUES('".$_SESSION['login_id']."','t','".$size."','f','f', 'f')";
                else if($shirt=="white")
                	$sql="INSERT INTO tshirt(u_id, navy, n_size, white, w_size, paid) values('".$_SESSION['login_id']."','f','f','t','".$size."', 'f')";
	        	$res=mysqli_query($con,$sql);
	        	if($res)
	        	{
	                header("location:reg_desk.php");
	        	}
	        	else
	        	{
	        		header("location:error.php");
	        	}
        }

        else if($count_rows==1){


        		if($shirt=="navy")
        			$sql="UPDATE tshirt SET navy='t', n_size='".$size."'";
            else if($shirt=="white")
                	$sql="UPDATE tshirt SET white='t', w_size='".$size."'";
	        	$res=mysqli_query($con,$sql);

						if($click == "DROP") {
							$sqlDropShirt = "DELETE FROM tshirt WHERE u_id='".$_SESSION['login_id']."'";
							$resDropShirt = mysqli_query($con, $sqlDropShirt);
						}

	        	if($res)
	        	{
	                header("location:reg_desk.php");
	        	}
	        	else
	        	{
	        		header("location:error.php");
	        	}
        }
        else{
        	header("location:error.php");
        }
?>
