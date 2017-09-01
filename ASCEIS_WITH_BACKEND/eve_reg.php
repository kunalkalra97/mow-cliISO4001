<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
session_start();
if(!isset($_SESSION['login']))
{
	header("location:error.php");
}
include("connection.php");
$reg_id=$_POST['reg_id'];

if($reg_id == 1) {
	$registeredForGI = 1;
}

$sqlWorkshops = "SELECT wor_id from wor_reg WHERE u_id='".$_SESSION['login_id']."'";
$resWorkshops = mysqli_query($con, $sqlWorkshops);
while($rowWorkshops = mysqli_fetch_array($resWorkshops)) {
	if($rowWorkshops['wor_id'] == 4) {
		$registeredForSD = 1;
	}
	else if($rowWorkshops['wor_id'] == 3) {
		$registeredForPrimavera = 1;
	}
}


if($registeredForSD == 1 && $registeredForGI == 1) {
	$msg = "
	<div style='font-size:16px'>
	Schedule collision between <b>Seismic Design</b> and <b>Green Ideation</b> on third day of ICES.<br>Please register for either one of them.
	</div>
	<br>
	<h3><a href='docs/schedule4.pdf' target='_blank'><i class='icon-info-1'></i>Check the schedule here</a></h3><br>
	<h3><a href='reg_desk.php'><i class='icon-angle-circled-right'></i>Go to Registrations desk</a> </h3>";
	include("msg_top.php");
	echo $msg;
	include("msg_down.php");
}

else if($registeredForPrimavera == 1 && $registeredForGI == 1) {
	$msg = "
	<div style='font-size:16px'>
	Schedule collision between <b>Primavera</b> and <b>Green Ideation</b> on fourth day of ICES.<br>Please register for either one of them.
	</div>
	<br>
	<h3><a href='docs/schedule4.pdf' target='_blank'><i class='icon-info-1'></i>Check the schedule here</a></h3><br>
	<h3><a href='reg_desk.php'><i class='icon-angle-circled-right'></i>Go to Registrations desk</a> </h3>";
	include("msg_top.php");
	echo $msg;
	include("msg_down.php");
}

else {

$sql="INSERT INTO eve_reg(u_id, eve_id, dd, ol) values('".$_SESSION['login_id']."','".$reg_id."','f', 'f')";
            $res=mysqli_query($con,$sql);


             $sql2="SELECT * FROM events where id='".$reg_id."'";
            $res2=mysqli_query($con,$sql2);
            $row2=mysqli_fetch_array($res2);
            $work_amount=$row2['rate'];


            $sql4="SELECT * from work_cart where u_id='".$_SESSION['login_id']."'";
            $res4=mysqli_query($con,$sql4);
            //print_r($count4);
            $row4=mysqli_fetch_array($res4);

            //print_r($row4['u_id']);

            $sql5="SELECT count(*) as cou FROM work_cart where u_id='".$_SESSION['login_id']."'";
            $res5=mysqli_query($con,$sql5);
            $row5=mysqli_fetch_array($res5);


           // print_r($row5['cou']);
            if($row5['cou']==1){
            	$cur_amount=$row4['work_amount'];
        		$new_amount=$cur_amount+$work_amount;
          	    $sql3="UPDATE work_cart set work_amount='".$new_amount."' where u_id='".$_SESSION['login_id']."'";
        			}
        	else  if($row5['cou']==0){

        		$sql3="INSERT INTO work_cart(u_id,work_amount,paid) values(".$_SESSION['login_id'].",'".$work_amount."','f')";
        	}

            $res3=mysqli_query($con,$sql3);
            if($res && $res2){
                //$flag++;
               // $msg= "succes";
               header("location:reg_desk.php");

            }
            else{
                echo mysqli_error($con);
            }
			}
?>
