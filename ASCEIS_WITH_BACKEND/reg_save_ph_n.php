<?php

// ini_set('display_startup_errors',1);
// ini_set('display_errors',1);
// error_reporting(-1);

session_start();
if(!isset($_SESSION['login']))
{
	header("location:error.php");
}
$msg="";
$flag=0;
$cur_id=$_POST['cur_id'];


//echo $cur_id;
include("connection.php");

$work_reg=array();
$flag=0;

$sql="SELECT * from con_reg where u_id='".$_SESSION['login_id']."'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count>0)
{
$sql="SELECT * FROM wor_reg as wr inner join workshops as wrk on wr.wor_id=wrk.id where u_id='".$_SESSION['login_id']."'";
        $res=mysqli_query($con,$sql);
        while ($row=mysqli_fetch_array($res)) {
                $day1_h=explode(":", $row['day1_f']);
                $day2_h=explode(":",$row['day2_f']);
								$day3_h=explode(":",$row['day3_f']);
                if($day1_h[0]!="00" || $day2_h[0]!="00" || $day3_h[0]!="00")
                {
									//set as 0 to disable clashing of workshops with conference - set as 5 to enable clashing
                        $flag=0;
                        break;
                }
								print_r($row);

        }

   $sql="SELECT * from workshops where id='".$cur_id."'";
 $res=mysqli_query($con,$sql);
        while ($row=mysqli_fetch_array($res)) {
                $day1_h=explode(":", $row['day1_f']);
                $day2_h=explode(":",$row['day2_f']);
								$day3_h=explode(":",$row['day3_f']);
                if($day1_h[0]!="00" || $day2_h[0]!="00" || $day3_h[0]!="00")
                {
									//set as 0 to disable clashing of workshops with conference - set as 5 to enable clashing
                        $flag=0;
                        break;
                }

        }

}

if($flag==0)
{


$sql="SELECT * from workshops where id='".$cur_id."'";
$res_cur=mysqli_query($con,$sql);



$row_cur=mysqli_fetch_array($res_cur);



$sql="SELECT * from wor_reg as w_r inner join workshops as wrk on w_r.wor_id=wrk.id where u_id='".$_SESSION['login_id']."'"  ;
$res=mysqli_query($con,$sql);


$sqlEvents = "SELECT eve_id from eve_reg WHERE u_id='".$_SESSION['login_id']."'";
$resEvents = mysqli_query($con, $sqlEvents);
$rowEvents = mysqli_fetch_array($resEvents);
$registeredForGI = 0;
$registeredForSD = 0;
$registeredForPrimavera = 0;

if($rowEvents['eve_id'] == 1) {
	$registeredForGI = 1;
}

if($cur_id == 4) {
	$registeredForSD = 1;
}

else if($cur_id == 3) {
	$registeredForPrimavera = 1;
}

if($registeredForSD == 1 && $registeredForGI == 1) {
	$msg = "
	<div style='font-size:16px'>
	Schedule collision between <b>Seismic Design</b> and <b>Green Ideation</b> on third day of ICES.<br>Please register for either one of them.
	</div>
	<br>
	<h3><a href='docs/schedule4.pdf' target='_blank'><i class='icon-info-1'></i>Check the schedule here</a></h3><br>
	<h3><a href='reg_desk.php'><i class='icon-angle-circled-right'></i>Go to Registrations desk</a> </h3>";
	$flag=5;
}

else if($registeredForPrimavera == 1 && $registeredForGI == 1) {
	$msg = "
	<div style='font-size:16px'>
	Schedule collision between <b>Primavera</b> and <b>Green Ideation</b> on fourth day of ICES.<br>Please register for either one of them.
	</div>
	<br>
	<h3><a href='docs/schedule4.pdf' target='_blank'><i class='icon-info-1'></i>Check the schedule here</a></h3><br>
	<h3><a href='reg_desk.php'><i class='icon-angle-circled-right'></i>Go to Registrations desk</a> </h3>";
	$flag=5;
}

while($row=mysqli_fetch_assoc($res))
{

	$day1_f_cur=explode(":",$row_cur['day1_f']);
	$day1_t_cur=explode(":",$row_cur['day1_f']);

	$day1_f_l=explode(":",$row['day1_f']);
	$day1_t_l=explode(":",$row['day1_t']);

	if(($day1_t_l[0]>$day1_f_cur[0]) && $day1_f_cur[0]!="00")
	{
		$msg= "
		<div style='font-size:16px'>
		Schedule collision with <b>".$row['wor_desc']."</b> on first day of ICES.<br>Please drop <b>".$row['wor_desc']."</b> to register <b>".$row_cur['wor_desc']."</b> <br>
		</div>
		<br>
		<h3><a href='docs/schedule4.pdf' target='_blank'><i class='icon-info-1'></i>Check the schedule here</a></h3>
		<h3><a href='reg_desk.php'><i class='icon-angle-circled-right'></i>Go to Registrations desk</a></h3>
		";
		$flag=5;
		break;
	}



    $work_reg[]=$row['wor_id'];
	//for day 2

	$day2_f_cur=explode(":",$row_cur['day2_f']);
	$day2_t_cur=explode(":",$row_cur['day2_f']);

	$day2_f_l=explode(":",$row['day2_f']);
	$day2_t_l=explode(":",$row['day2_t']);

	if(($day2_t_l[0]>$day2_f_cur[0]) && $day2_f_cur[0]!="00")
	{
		$msg= "
		<div style='font-size:16px'>
		Schedule collision with <b>".$row['wor_desc']."</b> on second day of ICES.<br>Please drop <b>".$row['wor_desc']." </b>to register <b>".$row_cur['wor_desc']."</b><br>
		</div><br>
		<h3><a href='docs/schedule4.pdf' target='_blank'><i class='icon-info-1'></i>Check the schedule here</a></h3>
		<h3><a href='reg_desk.php'><i class='icon-angle-circled-right'></i>Go to Registrations desk</a></h3>
		";
		$flag=5;
		break;

	}

//day3

	$day3_f_cur=explode(":",$row_cur['day3_f']);
	$day3_t_cur=explode(":",$row_cur['day3_f']);

	$day3_f_l=explode(":",$row['day3_f']);
	$day3_t_l=explode(":",$row['day3_t']);

	if(($day3_t_l[0]>$day3_f_cur[0]) && $day3_f_cur[0]!="00" )
	{


		$msg.= "
		<div style='font-size:16px'>
		Schedule collision with <b>".$row['wor_desc']."</b> on third day of ICES.<br>Please drop <b> ".$row['wor_desc']."</b> to register <b>".$row_cur['wor_desc']."</b>
		</div>
		<br>
		<h3><a href='docs/schedule4.pdf' target='_blank'><i class='icon-info-1'></i>Check the schedule here</a></h3><br>
		<h3><a href='reg_desk.php'><i class='icon-angle-circled-right'></i>Go to Registrations desk</a> </h3>";
		$flag=5;
		break;
	}

	$day4_f_cur=explode(":",$row_cur['day4_f']);
	$day4_t_cur=explode(":",$row_cur['day4_f']);

	$day4_f_l=explode(":",$row['day4_f']);
	$day4_t_l=explode(":",$row['day4_t']);

	if(($day4_t_l[0]>$day4_f_cur[0]) && $day4_f_cur[0]!="00" )
	{


		$msg.= "
		<div style='font-size:16px'>
		Schedule collision with <b>".$row['wor_desc']."</b> on fourth day of ICES.<br>Please drop <b> ".$row['wor_desc']."</b> to register <b>".$row_cur['wor_desc']."</b>
		</div>
		<br>
		<h3><a href='docs/schedule4.pdf' target='_blank'><i class='icon-info-1'></i>Check the schedule here</a></h3><br>
		<h3><a href='reg_desk.php'><i class='icon-angle-circled-right'></i>Go to Registrations desk</a> </h3>";
		$flag=5;
		break;
	}

}

if(in_array($cur_id,$work_reg))
{
    $msg="Already registered";
	$flag=5;
}




if($flag==0)
{


            $sql="INSERT INTO wor_reg(u_id, wor_id, dd, ol) values('".$_SESSION['login_id']."','".$cur_id."','f', 'f')";
            $res=mysqli_query($con,$sql);

            $sql2="SELECT * FROM workshops where id='".$cur_id."'";
            $res2=mysqli_query($con,$sql2);
            $row2=mysqli_fetch_array($res2);
            $reg_type=$_SESSION['reg_type'];
            $work_amount=$row2[$reg_type];
            //echo $work_amount;


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

        		$sql3="INSERT INTO work_cart(u_id,work_amount,accom_amount, paid) values('".$_SESSION['login_id']."','".$work_amount."',0, 'f')";
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

}
else if($flag==5){
	$msg="<h4>You have registered for Conference, which collides with this workshop.</h4>
	<h3><a href='docs/schedule4.pdf' target='_blank'><i class='icon-info-1'></i>Check the schedule here</a></h3>
		<h3><a href='reg_desk.php'><i class='icon-angle-circled-right'></i>Go to Registrations desk</a></h3>
	";
}

include("msg_top.php");
echo $msg;

include("msg_down.php");

?>
