<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("location:error.php");
}
include("connection.php");
$msg="";

$drop_id=$_POST['drop_id'];

$sql4="SELECT * from work_cart where u_id=".$_SESSION['login_id']."";
            $res4=mysqli_query($con,$sql4);
            $row4=mysqli_fetch_array($res4);
            
            $sql5="SELECT count(*) as cou FROM wor_reg where u_id='".$_SESSION['login_id']."'";
            $res5=mysqli_query($con,$sql5);
            $row5=mysqli_fetch_array($res5);
            
            $sql8="SELECT count(*) as cou FROM eve_reg where u_id='".$_SESSION['login_id']."'";
            $res8=mysqli_query($con,$sql8);
            $row8=mysqli_fetch_array($res8);
            
            $sql9="SELECT count(*) as cou FROM uce_reg where u_id='".$_SESSION['login_id']."'";
            $res9=mysqli_query($con,$sql9);
            $row9=mysqli_fetch_array($res9);

            $count1=$row5['cou'];
            $count2=$row8['cou'];
            $count3=$row9['cou'];
            
            $count=$count1+$count2+$count3;
            
            $cur_amount=$row4['work_amount'];
            $accom_amount=$row4['accom_amount'];
            if($count==1){
            				if($accom_amount>0){
            					$sql7="UPDATE register set accom='0',acctype='' where id='".$_SESSION['login_id']."'";
						$res7=mysqli_query($con,$sql7);
            				}

            				$sql6="DELETE from work_cart where u_id='".$_SESSION['login_id']."'";
					$res6=mysqli_query($con,$sql6);
							
			}
			else{
					$sql2="SELECT * FROM events where id='".$drop_id."'";
            				$res2=mysqli_query($con,$sql2);
            				$row2=mysqli_fetch_array($res2);
            				$work_amount=$row2['rate'];
            				$new_amount=$cur_amount-$work_amount;
            				$sql3="UPDATE work_cart set work_amount='".$new_amount."' where u_id='".$_SESSION['login_id']."'";
            				$res3=mysqli_query($con,$sql3);
			}

$sql="DELETE from eve_reg where u_id='".$_SESSION['login_id']."' and eve_id='".$drop_id."'";
$res=mysqli_query($con,$sql);


if($res)
{
header("location:reg_desk.php");
}
else{
	echo mysqli_error($con);
}



?>