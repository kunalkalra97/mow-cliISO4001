<?php


		include("../connection.php");
		$receipt_num=$_POST['receipt_num'];
		$dd_num=$_POST['dd_num'];
		$dd_amount=$_POST['dd_amount'];
		$paid_amount=$_POST['paid_amount'];
		$dd_branch=$_POST['dd_branch'];
		$dd_place=$_POST['dd_place'];
		$ices_cont=$_POST['ices_cont'];


		$acc_a=$_POST['acc_a'];

		$ices_cont=preg_replace("/[^0-9]/","",$ices_cont);

		$receipt_num=stripslashes($receipt_num);
		$receipt_num = mysqli_real_escape_string($con,$receipt_num);

		$dd_num=stripslashes($dd_num);
		$dd_num = mysqli_real_escape_string($con,$dd_num);

		$dd_amount=stripslashes($dd_amount);
		$dd_amount = mysqli_real_escape_string($con,$dd_amount);

		$paid_amount=stripslashes($paid_amount);
		$paid_amount = mysqli_real_escape_string($con,$paid_amount);

		$dd_branch=stripslashes($dd_branch);
		$dd_branch = mysqli_real_escape_string($con,$dd_branch);

		$dd_place=stripslashes($dd_place);
		$dd_place = mysqli_real_escape_string($con,$dd_place);

		$ices_cont=stripslashes($ices_cont);
		$ices_cont = mysqli_real_escape_string($con,$ices_cont);


		$sql="INSERT INTO bank_dd values(NULL,'$receipt_num','$dd_num','$dd_amount','$paid_amount','$dd_branch','$dd_place','$ices_cont','$acc_a')";

		$res=mysqli_query($con,$sql);
		if($res)
		{


		$eve_a=$_POST['eve_a'];
		$wor_a=$_POST['wor_a'];
		$con_a=$_POST['con_a'];
		$uce_a=$_POST['uce_a'];


		$eve_a=stripslashes($eve_a);
		$eve_a = mysqli_real_escape_string($con,$eve_a);

		$wor_a=stripslashes($wor_a);
		$wor_a = mysqli_real_escape_string($con,$wor_a);

		$con_a=stripslashes($con_a);
		$con_a = mysqli_real_escape_string($con,$con_a);

		$uce_a=stripslashes($uce_a);
		$uce_a = mysqli_real_escape_string($con,$uce_a);



		$eve_a=explode(",", $eve_a);
		$wor_a=explode(",", $wor_a);
		$con_a=explode(",", $con_a);
		$uce_a=explode(",", $uce_a);

		//events
	if($eve_a[0]!="555")
	{
		$i=0;

		while ($i<sizeof($eve_a)) {
			$sql="UPDATE eve_reg SET dd='t' WHERE u_id='".$ices_cont."' and id='".$eve_a[$i++]."'";
			$res=mysqli_query($con,$sql);
			$sql3="DELETE FROM work_cart WHERE u_id='".$ices_cont."'";
                                $res3=mysqli_query($con,$sql3);


			if($res)
			{

			}
			else
			{
				echo mysqli_error($con);
			}
		}
	}
	if($wor_a[0]!="555")
{
		$i=0;
		while ($i<sizeof($wor_a)) {
			$sql="UPDATE wor_reg SET dd='t' WHERE u_id='".$ices_cont."' and id='".$wor_a[$i++]."'";
			$res=mysqli_query($con,$sql);
			$sql3="DELETE FROM work_cart WHERE u_id='".$ices_cont."'";
                                $res3=mysqli_query($con,$sql3);

			if($res)
			{
			}
			else
			{
				echo mysqli_error($con);
			}
		}
}

	if($con_a[0]!="555")
	{
			$sql="UPDATE con_reg SET dd='t' WHERE u_id='".$ices_cont."' and id='".$con_a[0]."'";
			$res=mysqli_query($con,$sql);
			$sql3="DELETE FROM con_cart WHERE u_id='".$ices_cont."'";
                        $res3=mysqli_query($con,$sql3);

			if($res)
			{
			}
			else
			{
				echo mysqli_error($con);
			}
	}

	if($uce_a[0]!="555")
	{
		$sql="UPDATE uce_reg SET dd='t' WHERE u_id='".$ices_cont."' and id='".$uce_a[0]."'";

			$res=mysqli_query($con,$sql);
			$sql3="DELETE FROM work_cart WHERE u_id='".$ices_cont."'";
                                $res3=mysqli_query($con,$sql3);

			if($res)
			{
			}
			else
			{
				echo mysqli_error($con);
			}
	}


	if($acc_a!='0')
		{
			$sql="UPDATE register SET accom_pay='t' WHERE id='".$ices_cont."'";
			$res=mysqli_query($con,$sql);
			if($res)
			{
			}
			else
			{
				echo mysqli_error($con);
			}
		}

	header("location:success.php");
}
else
{
	echo mysqli_error($con);
}
?>
