<?php
// ini_set('display_startup_errors',1);
// ini_set('display_errors',1);
// error_reporting(-1);

session_start();
if(!isset($_SESSION['login']))
{
	header("location:login_now.php");
}



include("connection.php");

$sql="SELECT * FROM eve_reg  as reg inner join events as eve on eve.id=reg.eve_id where u_id='".$_SESSION['login_id']."'";
$res=mysqli_query($con,$sql);
$eve_rate=0;
while ($row=mysqli_fetch_array($res)) {
	$eve_rate+=$row['rate'];
}

$sql="select * from (select wor_id, u_id, ".$_SESSION['reg_type']." from wor_reg  as reg inner join workshops as wor on reg.wor_id=wor.id where u_id='".$_SESSION['login_id']."') as aa";
$res=mysqli_query($con,$sql);
$wor_rate=0;
if($res)
{
	while ($row=mysqli_fetch_array($res)) {
		$wor_rate+=$row[$_SESSION['reg_type']];
	}
}

$sql="SELECT * from exh_reg where u_id='".$_SESSION['login_id']."'";
$res=mysqli_query($con,$sql);
$count_ex=mysqli_num_rows($res);
$exhi=0;
if($count_ex==1)
{
	$exhi=100;
}

$sql="SELECT * from uce_reg where u_id='".$_SESSION['login_id']."'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);

$uce=0;
if($count==1)
{

	$uce=200;
}


$tot=$wor_rate+$eve_rate+$exhi+$uce;

$accom_rat;
$sql="SELECT accom, acctype from register where id='".$_SESSION['login_id']."'";
$res=mysqli_query($con,$sql);
$accom_rat=mysqli_fetch_array($res);
$accom_rate=$accom_rat['accom'];
?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <title>ASCE-ICES | VIT</title>
    <meta name="description" content="An initiative by the American Society of Civil Engineers Indian Section,
    Vellore Institute of Technology hosts the first of its kind, international symposium on civil engineering." />
    <meta name="author" content="ICES Home Page">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/linea-icon.min.css" />
    <link rel="stylesheet" href="css/fancy-buttons.min.css" />
    <!--=== Google Fonts ===-->
    <link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:600,400,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <!--=== Other CSS files ===-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <!--=== Main Stylesheets ===-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.min.css" />
    <!--=== Color Scheme, three colors are available red.css, orange.css and gray.css ===-->
    <link rel="stylesheet" id="scheme-source" href="css/schemes/red.css" />

    <link rel="stylesheet" href="css/contact-buttons.css">
		<style>
    #navlist li
{
display: inline;
list-style-type: none;
padding-right: 20px;
}

    </style>
</head>
<body>

    <!--=== Preloader section starts ===-->
    <section id="preloader">
        <div class="loading-circle fa-spin"></div>
    </section>



    <!--=== Preloader section Ends ===-->

        <?php
include("head_menu.php");
?>
<div class="container" style="padding-top:80px; ">
</div>


		<!-- Start Page Banner -->

		<!-- End Page Banner -->




		<!-- Start Content -->
		<div id="content">
			<div class="container">
				<div class="row sidebar-page">


					<!-- Start Sidebar -->

					<!-- End Sidebar -->


					<!-- Page Content -->
					<div class="page-content">
						<div class="col-md-3 sidebar left-sidebar">
							<div class="widget widget-categories">
								<h4> <span class="head-line">Registration Desk</span></h4>
								<ul>
									<li>
										<a href="con_reg_desk.php"><button type="button" class="btn btn-success"> Conference Registration </button></a>

									</li>
<li>&nbsp;</li>
									<li>

										<a href="docs/schedule4.pdf" target="_blank"""><button type="button" class="btn btn-info">View schedule</button></a>
									</li>
<li>&nbsp;</li>
								</ul>
							</div>

							<div style="float:none; padding:15px 10px;width:100%;border-right:1px solid #ddd;background-color:#eeefff">
								<div style="font-weight:; font-size:16px; margin-bottom:20px">
									<?php

									$invID=$_SESSION['login_id'];
									$invID=str_pad($invID, 4, '0', STR_PAD_LEFT);

									$sql4="SELECT * from ol_payment where u_id='".$_SESSION['login_id']."'";
									$res4=mysqli_query($con,$sql4);
									$con4=mysqli_fetch_array($res4);
									$tid=$con4['tid'];
									$status=$con4['status'];

									$sql5="SELECT * from work_cart where u_id='".$_SESSION['login_id']."'";
									$res5=mysqli_query($con,$sql5);
									$row5=mysqli_fetch_array($res5);
									$paid=$row5['paid'];
									$tot=$row5['work_amount'];
									$total=$row5['accom_amount'];
									?>

										<center><h3> Your Cart <br> <span style="font-size:20px">Contingent no.</span> <span style='color: #f16261;'>ICES<?php echo $invID;?></span> </h3>
										<?php

										echo "<p>You have successfully registered for ICES’17.
										<p> Rs. ".$tot." for workshops/events<br>";
										echo "Rs. ".$total." for accommodation";
										$ttl=$total+$tot;
										echo "<br><b>Total: Rs. ".$ttl."</b>";
										echo'
										<br>
										<br>';

										if($ttl>0 && $paid=="f"){
											/*echo'<button class="btn btn-info" id="payonline" disabled>Payment Closed</button>
											<br>OR<br>
											<button class="btn btn-info" id="payoffline" type="button" data-toggle="modal" data-target="#myModal">Pay Offline</a>';*/

											echo'<button class="btn btn-info" id="payonline">Pay Online</button>
											<br>OR<br>
											<button class="btn btn-info" id="payoffline" type="button" data-toggle="modal" data-target="#myModal">Pay Offline</a>';
										}
										else if($ttl>0 && $paid=="w") {
											echo'<button class="btn btn-warning" id="waiting" disabled>Processing..</button>';
											echo "<br><h5><span style='color:green'>Your transaction has been interrupted due to a technical error.<br>";
											echo "Please check the payment status after 3 business days or click 'Retry' to retry your payment.</span><h5>";
											echo'<button style="margin-top: 20px" class="btn btn-info" id="unblock">Retry</button>';
										}
										else{
											echo "There are no workshops/events in your cart.";
										}


										?>
									</div>
									<div>
										<br>

									</div>

								</div>
							</div>

							<div class="col-md-9" >

								<?php

								$sqlt="SELECT * from tshirt where u_id='".$_SESSION['login_id']."'";
								$rest=mysqli_query($con,$sqlt);
								$rowt=mysqli_fetch_array($rest);

								?>
<br>
								<!--div class="alert alert-danger"><h5 style="text-align:center;" class="text-danger">Online and Demand Draft payments for workshops, events and accommodation are now closed.<br>However, you can still register and pay for them on spot.</h5></div-->
								<!--<h5 style="text-align:center; margin-bottom: 20px;"><a href="docs/schedule4.pdf" target="_blank" >Click here to view the schedule of ICES 2017.</a></h5> Not Needed-->
								<h2 style="text-align:center">Registration Desk</h2><hr>
											<h3 style="text-align:center">T-shirt</h3>
											<h6 style="text-align:center">Click on the image to zoom in</h6>

										<!--div class="image-row">
											<div class="image-set" -->
												<div class="container" style="padding-bottom:10px;">
<div class="row">
<div class="col-md-4 col-md-offset-2">
														<a class="example-image-link" href="images/navy.jpg" data-lightbox="example-set" data-title="Navy Blue Edition"><center><img class="example-image" src="images/navy-thumb.jpg" alt=""  style="height:250px;cursor:zoom-in;"/></center></a><br>
<div class="row">
<center>
Color: Blue<br> Price: Rs. 350<br>
</center>
</div>
</div>
</div>
												<br>
											<div class="row">
	<div class="alert alert-success col-md-4 col-md-offset-2">
													<form action="book_t.php" method="POST">

														<div class="radio-inline">
															<label><input type="radio" name="size" value="m" class="input1">M&nbsp;</label>
														</div>

														<div class="radio-inline">
															<label><input type="radio" name="size"  value="l" class="input1">L</label>
														</div>

														<div class="radio-inline">
															<label><input type="radio" name="size" value="xl" class="input1">XL</label>
														</div>

														<div class="radio-inline">
															<label><input type="radio" name="size" value="xxl" class="input1">XXL&nbsp;</label>
														</div>
														<div class="radio-inline">
															<label><input type="hidden" name="size" value="xxl" class="input1"></label>
														</div>
														<?php
														if($rowt['navy']=='t'){
															// echo'<input type="submit" class="btn btn-success reg_but" name="click" value="BOOKED" disabled>';
															echo'<input type="submit" class="btn btn-danger reg_but" name="click" value="UNBOOK">';
														}
														else{
															echo'<input type="submit" class="btn btn-success reg_but" id="navy" value="Book Now" disabled> ';
														}
														?>


													</form>
</div>
</div>
</div>






<!-- conference table -->

<hr>

<div class="container" style="padding-bottom:20px;">
<div class = "row">
<div class="col-md-4">
			<h3 style="text-align:center">Conference</h3>
</div>
<div class="col-md-2">
</div>
<div class="col-md-3" style="padding-top:20px;">
			<a href="con_reg_desk.php"><button class='btn btn-info reg_but'>Register Here</button></a>
</div>
</div>
</div>

<!-- workshops table -->

<table border="0" class="table">
	<tr>
		<th colspan="2" style="text-align:center">
			<h3 style="text-align:center">Workshops</h3>
		</th>
		<th>
			Price
		</th>
	</tr>
	<?php
	include("connection.php");


	$sql="Select wor_id,dd,ol from wor_reg where u_id='".$_SESSION['login_id']."' ORDER BY wor_id ASC";

	$res_w=mysqli_query($con,$sql);

	$regd_w[0]=5555;
	$dd_w[0]=5555;
	$ol_w[0]=5555;
	$i=0;
	while($row_wor=mysqli_fetch_array($res_w))
	{
		$dd_w[$i]=$row_wor['dd'];
		$ol_w[$i]=$row_wor['ol'];
		$regd_w[$i++]=$row_wor['wor_id'];
	}
	$sql="SELECT * FROM workshops";
	$res=mysqli_query($con,$sql);
	//print_r($regd_w);
	$i=0;
	$j=0;

	$workshopNames[1] = "concrete_technology";
	$workshopNames[2] = "transportation_engineering";
	$workshopNames[3] = "AECOism_builder_designer";
	$workshopNames[4] = "foundation_analysis";
	$workshopNames[5] = "geospatial_technology";
	$workshopNames[6] = "green_building";
	$workshopNames[7] = "staadpro";

	while ($row=mysqli_fetch_array($res)) {

		echo "<tr>";

		if($paid=="w")
		{
			echo "<td>

			<div style='float:left'> <a style='color:#333;' href='workshop_".$workshopNames[$row['id']].".php' target='_blank'>".
			$row['wor_desc']."</a></div>
			<td>
			<div>
			<input type='hidden' class='drop_id' value='".$row['id']."'>
			<button class='btn btn-info drop_but' disabled>&nbsp;&nbsp; Waiting for Payment&nbsp;&nbsp;</button>
			</div>
			</td>
			<div class='clearfix'></div></td>
			<td>Rs ";

			$reg_type=$_SESSION['reg_type'];
			echo $row[$reg_type];

			echo "</td>
			";
		}
		else if(!in_array($row['id'], $regd_w))
		{

			echo "<td width='70%'>

			<div style='float:left'> <a style='color:#333;' href='workshop_".$workshopNames[$row['id']].".php' target='_blank'>".
			$row['wor_desc']."</a></div>
			<div class='clearfix'></div></td>
			<td style='color:#f16261;.'>
			<div class='btn-cont'>
			<input type='hidden' class='work_id' value='".$row['id']."'>";
			if($row['id']!=8){
				echo"
				<button class='btn btn-info reg_but work_reg_but'>Register Now</button>";
			}
			else
			{
				echo"
				<button class='btn btn-info reg_but work_reg_but' disabled>Register Now</button>";
			}
			echo"
			</div>
			</td>
			<td>Rs ";
			$reg_type=$_SESSION['reg_type'];
			echo $row[$reg_type];


			echo "</td>
			";
		}
		else{
			$yoy=$dd_w[$j];
			$yoy2=$ol_w[$j];
			$j++;
			if($yoy=="f" && $yoy2=="f")
			{
				echo "<td>

				<div style='float:left'> <a style='color:#333;' href='workshop_".$workshopNames[$row['id']].".php' target='_blank'>".
				$row['wor_desc']."</a></div>
				<td>
				<div>
				<input type='hidden' class='drop_id' value='".$row['id']."'>
				<button class='btn btn-danger drop_but work_drop_but' >&nbsp;&nbsp; Drop Now&nbsp;&nbsp;</button>
				</div>
				</td>
				<div class='clearfix'></div></td>
				<td>Rs ";

				$reg_type=$_SESSION['reg_type'];
				echo $row[$reg_type];

				echo "</td>
				";
			}

			else if($yoy=="t" || $yoy2=="t"){

				echo "<td>

				<div style='float:left'> <a style='color:#333;' href='workshop_".$workshopNames[$row['id']].".php' target='_blank'>".
				$row['wor_desc']."</a></div>
				<td>
				<div>
				<input type='hidden' class='drop_id' value='".$row['id']."'>
				<button class='btn btn-warning rec_but' disabled>Payment Received</button>
				</div>
				</td>
				<div class='clearfix'></div></td>
				<td>Rs ";

				$reg_type=$_SESSION['reg_type'];
				echo $row[$reg_type];

				echo "</td>
				";
			}

			else if($yoy=="w" || $yoy2=="w"){

				echo "<td>

				<div style='float:left'> <a href='workshop_".$workshopNames[$row['id']].".php' target='_blank'>".
				$row['wor_desc']."</a></div>
				<td>
				<div>
				<input type='hidden' class='drop_id' value='".$row['id']."'>
				<button class='btn btn-warning rec_but' disabled>Payment Processing</button>
				</div>
				</td>
				<div class='clearfix'></div></td>
				<td>Rs ";

				$reg_type=$_SESSION['reg_type'];
				echo $row[$reg_type];

				echo "</td>
				";
			}

		}

		echo "</tr>";

	}

	?>
</table>



<table width="100%" border="0" class="table">
	<tr>
		<th colspan="2" style="text-align:center">
			<h3 style="text-align:center">Events</h3>
		</th>
		<th>
			Price
		</th>
	</tr>
	<?php


	$sql="Select eve_id,dd,ol from eve_reg where u_id='".$_SESSION['login_id']."'";

	$res_w=mysqli_query($con,$sql);

	$dd_e[0]=5555;
	$ol_e[0]=5555;
	$regd_e[0]=5555;
	$i=0;
	$j=0;
	while($row_wor=mysqli_fetch_array($res_w))
	{
		$dd_e[$i]=$row_wor['dd'];
		$ol_e[$i]=$row_wor['ol'];
		$regd_e[$i++]=$row_wor['eve_id'];
	}

	$sql="SELECT * FROM events";
	$res=mysqli_query($con,$sql);
	//print_r($regd_w);
	$i=0;

	$eventNames[1] = "CADathon";
	$eventNames[2] = "greencube";
	$eventNames[3] = "rollit";

	while ($row=mysqli_fetch_array($res)) {
		echo "<tr>";

		if($paid=="w")
		{
			echo "<td>

			<div style='float:left'> <a style='color:#333;' href='".$eventNames[$row['id']].".php' target='_blank'>".
			$row['eve_desc']."</a></div>
			<td>
			<div>
			<input type='hidden' class='drop_id' value='".$row['id']."'>
			<button class='btn btn-info drop_but' disabled>&nbsp;&nbsp; Waiting for Payment&nbsp;&nbsp;</button>
			</div>
			</td>
			<div class='clearfix'></div></td>
			<td>Rs ";
			echo $row['rate'];

			echo "</td>
			";
		}

		else if(!in_array($row['id'], $regd_e))
		{

			echo "<td width='70%'>

			<div style='float:left'> <a style='color:#333;' href='".$eventNames[$row['id']].".php' target='_blank'>".
			$row['eve_desc']."</a></div>
			<div class='clearfix'></div></td>
			<td style='color:#f16261;'>
			<div class='btn-cont'>
			<input type='hidden' class='eve_id' value='".$row['id']."'>
			<button class='btn btn-info reg_but eve_reg_but'>Register Now</button>
			</div>
			</td>


			<td>Rs. ".$row['rate']."</td>

			";
		}
		else
		{
			$yoy=$dd_e[$j];
			$yoy2=$ol_e[$j];
			$j++;
			if($yoy=="f" && $yoy2=="f")
			{
				echo "<td>

				<div style='float:left'> <a style='color:#333;' href='".$eventNames[$row['id']].".php' target='_blank'>".
				$row['eve_desc']."</a></div>
				<td>
				<input type='hidden' class='eve_drop_id' value='".$row['id']."'>
				<button class='btn btn-danger drop_but eve_drop_but' > &nbsp;&nbsp;Drop Now&nbsp;&nbsp;</button>
				</div>
				</td>
				<div class='clearfix'></div></td>
				<td>Rs. ".$row['rate']."</td>
				";
			}
			else if($yoy=="w" || $yoy2=="w"){

				echo "<td>

				<div style='float:left'> <a style='color:#333;' href='".$eventNames[$row['id']].".php' target='_blank'>".
				$row['eve_desc']."</a></div>
				<td>
				<div>
				<input type='hidden' class='drop_id' value='".$row['id']."'>
				<button class='btn btn-warning rec_but' disabled>Payment Processing</button>
				</div>
				</td>
				<div class='clearfix'></div></td>
				<td>Rs ";


				echo $row['rate'];

				echo "</td>
				";
			}
			else{
				echo "<td>

				<div style='float:left'> <a style='color:#333;' href='".$eventNames[$row['id']].".php' target='_blank'>".
				$row['eve_desc']."</a></div>
				<td>
				<input type='hidden' class='eve_drop_id' value='".$row['id']."'>
				<button class='btn btn-warning rec_but' disabled> Payment Received</button>
				</div>
				</td>
				<div class='clearfix'></div></td>
				<td>Rs. ".$row['rate']."</td>
				";
			}
		}

		echo "</tr>";
	}


	?>
</table>


</table>

<!-- <div class="col-md-9"> -->
<div id="accom" style="float:none; margin:0 auto 20px;">
	<div style="margin-bottom:20px;">
		<center><h2><button class="btn btn-info" id="acc_btn">Accommodation for workshops/events</button></h2></center>
	</div>

	<div id="accom_body">
		<hr style="border-top: 1.5px solid #ddd;">

		<?php

		echo' <form method="POST" action="register_acc.php" onsubmit="return(val())">';

		include("connection.php");

		//logic to check whether a participant can register for accommodation

		/*conditions to register for WORKSHOP/EVENT ACCOMMODATION
		* 1) Participant should have registered (whether or not payment has been made) for at least one workshop
		* 2) Participant should NOT have registered for the conference
		*/

		$registeredForWorkshop = false;
		$registeredForConference = false;
		$registeredForAccommodation = false;
		$paidForAccommodation = false;
		$accommodationFor = false;

		$sql_wor = "SELECT * FROM wor_reg WHERE u_id='".$_SESSION['login_id']."'";
		$res_wor = mysqli_query($con, $sql_wor);

		$sql_eve = "SELECT * FROM eve_reg WHERE u_id='".$_SESSION['login_id']."'";
		$res_eve = mysqli_query($con, $sql_eve);

		$sql_con = "SELECT * FROM con_reg WHERE u_id='".$_SESSION['login_id']."'";
		$res_con = mysqli_query($con, $sql_con);

		$sql_accomDetails = "SELECT * FROM register WHERE id='".$_SESSION['login_id']."'";
		$res_accomDetails = mysqli_query($con, $sql_accomDetails);
		$row_accomDetails = mysqli_fetch_array($res_accomDetails);


		if(mysqli_num_rows($res_wor) > 0 || mysqli_num_rows($res_eve))
			$registeredForWorkshop = true;

		if(mysqli_num_rows($res_con) > 0)
			$registeredForConference = true;

		if($row_accomDetails['accom'] > 0)	//this is the number of days
			$registeredForAccommodation = true;

		if($row_accomDetails['accom_pay'] == 't')
			$paidForAccommodation = true;

		if($row_accomDetails['accom_cw'] == 'w')
			$accommodationFor = 'w';
		else if($row_accomDetails['accom_cw'] == 'c')
			$accommodationFor = 'c';


		if($registeredForWorkshop && !$registeredForConference && !$registeredForAccommodation && !$paidForAccommodation)
		{
			echo "<center style='margin-bottom: 20px;'><h5>You have not registered for accommodation yet.
			You can register here (optional).</h5>
			<br>

			<h6>Accommodation includes meals.</h6>
			<br>
			<div class='col-md-6'>
			<h4 class='classic-title'>Check In</h4>

			<h6>Date</h6>
			<div class='input-group' style='width:100%'>
			<select id='checkin_date' name='checkin_date' class='form-control'>
			<option value='9'>9th March</option>
			<option value='10'>10th March</option>
			<option value='11'>11th March</option>
			<option value='12'>12th March</option>
			<option value='13'>13th March</option>
			<option value='14'>14th March</option>
			</select>
			<span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>
			</div>

			<br>

			<h6>Time</h6>
			<div class='input-group bootstrap-timepicker timepicker' style='width:100%'>
			<input name='checkin_time' id='checkin_time' type='text' class='form-control input-small' required>
			<span class='input-group-addon'><i class='glyphicon glyphicon-time'></i></span>
			</div>
			</div>

			<div class='col-md-6'>
			<h4 class='classic-title'>Check Out</h4>

			<h6>Date</h6>
			<div class='input-group' style='width:100%'>
			<select id='checkout_date' class='form-control' name='checkout_date'>
			<option value='9'>9th March</option>
			<option value='10'>10th March</option>
			<option value='11'>11th March</option>
			<option value='12'>12th March</option>
			<option value='13'>13th March</option>
			<option value='14'>14th March</option>
			</select>
			<span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>
			</div>

			<br>

			<h6>Time</h6>
			<div class='input-group bootstrap-timepicker timepicker' style='width:100%'>
			<input name='checkout_time' id='checkout_time' type='text' class='form-control input-small'>
			<span class='input-group-addon'><i class='glyphicon glyphicon-time'></i></span>
			</div>
			<p id='dorm-checkout-para' class='text-warning' style='font-weight: bold; display: none; margin-bottom: 0'>NOTE - Check out time for the dormitory is 10PM</p>
			</div>

			<br>
			<div class='col-md-12' style='margin-top:40px;'>
			<h4 class='classic-title'>Accommodation type</h4>
			<select name='accom_type' id='acctype' class='form-control'>
			<option value='2AC'>Double Bedded AC (single occupancy) - Rs 3000/day/person (24 hour basis)</option>
			<option value='2ACsh'>Double Bedded AC (shared) - Rs 1500/day/person (24 hour basis)</option>
			<option value='4ACsh'>Four Bedded AC (shared) - Rs 800/day/person (24 hour basis)</option>
			<option value='dorm'>Dormitory - Rs 500/day/person (daily basis)</option>
			</select>
			</div>

			<button id='calculate_accommodation' type='button' class='btn btn-info btn-sm' style='margin-top:10px' value='work_accom'>Calculate cost</button>
			<button type='submit' class='btn btn-success btn-sm' style='margin-top:10px' name='accom_for' value='work_accom'>Register</button>

			<div class='alert alert-info' style='margin-top: 20px; font-weight: bold; font-style: 20px; display: none'>

			</div>

			<p id='to-pay' class='text-info' style='font-weight: bold; margin-top: 20px'></p>

			</center>
			<input type='hidden' name='accom_cw' value='w'>
			";
		}

		//paid for accommodation
		else if($paidForAccommodation) {
			$accommodation_type_fullnames = array('2AC' => '2 Bedded AC', '2ACsh' => '2 Bedded AC shared', '4ACsh' => '4 Bedded AC shared', 'dorm' => 'Dormitory');
			echo "<center><h5>You have registered for ".$row_accomDetails['accom']." day(s) of accommodation of type '".$accommodation_type_fullnames[$row_accomDetails['acctype']]."' from ".$row_accomDetails['in_date']."th March (".$row_accomDetails['in_time'].") to ".$row_accomDetails['out_date']."th March (".$row_accomDetails['out_time'].")</h5>";
			echo"<button class='btn btn-warning rec_but' disabled>Payment Received</button>";
			echo "<h6>*Additional accommodation available on-spot</h6></center>";
		}

		/*the second condition is obvious(since the above condition will have failed)
			but I'm keeping it for logical clarity
		*/
		else if($registeredForAccommodation && !$paidForAccommodation) {
			$accommodation_type_fullnames = array('2AC' => '2 Bedded AC', '2ACsh' => '2 Bedded AC shared', '4ACsh' => '4 Bedded AC shared', 'dorm' => 'Dormitory');
			echo "<center><h5>You have registered for ".$row_accomDetails['accom']." day(s) of accommodation of type '".$accommodation_type_fullnames[$row_accomDetails['acctype']]."' from ".$row_accomDetails['in_date']."th March (".$row_accomDetails['in_time'].") to ".$row_accomDetails['out_date']."th March (".$row_accomDetails['out_time'].")</h5>";
			$total=0;
			echo "<button type='button' class='btn btn-danger drop_but' id='acc_drop_but'>Drop now</button>";
			echo "<h6>*Additional accommodation available on-spot</h6></center>";
		}

		else if(!$registeredForWorkshop) {
			echo "<center><h5>Not Registered for any Events or Workshops yet!</h5></center>";
		}

		else if($registeredForConference) {
			echo "<center><h5 class='text-danger'>If you are registering for both workshops and the conference, you need to register for accommodation on spot.</h5></center><br>";
		}

		else if($accommodationFor == 'c'){
			echo "<center><h5>Registered for Accommodation in Conference!</h5>";
			echo "<h6>*Additional accommodation available on-spot</h6></center>";
			echo "<h5 class='text-danger'>If you are registering for both workshops and the conference, you need to register for accommodation on spot.</h5><br>";
		}

		echo"</form>
		</div></div>";
		?>
		<!-- </div> -->


	</div>


</div>


</div>
</div>
</div>

<!-- Start Footer -->
<!-- Start Footer -->
<?php
include("footer.php");
?>
<!--==== Essential files ====-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-timepicker.js"></script>
<!-- <script type="text/javascript" src="js/bootstrapValidator.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> -->
<!--==== Scroll and navigation plugins ====-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-one-page-nav/3.0.0/jquery.nav.min.js"></script> -->
<!-- <script type="text/javascript" src="js/jquery.appear.js"></script> -->
<!--==== Custom Script files ====-->
<!-- <script type="text/javascript" src="js/custom.js"></script> -->
<script type="text/javascript" src="js/custom_reg_desk.js"></script>
<form id="reg_form" method="post" action="reg_save_ph_n.php">

</form>
<form id="drop_acc" method="POST" action="drop_acc.php"></form>
<form id="drop_form" method="post" action="drop_it.php"></form>
<form id="eve_reg_form" method="post" action="eve_reg.php"></form>
<form id="eve_drop_form" method="post" action="eve_drop.php"></form>
<form id="reg_exh" method="POST" action="reg_exhibition.php"></form>
<form id="drop_exh" method="POST" action="drop_exh.php"></form>
<form id="reg_uce" method="POST" action="reg_uce.php"></form>
<form id="drop_uce" method="POST" action="drop_uce.php"></form>
<form id="unblock_form" method="POST" action="wor_unblock.php"></form>
<form id="payment" method="POST" action="pay_online.php">
	<?php

	// $sql2 = "SELECT count(*) as cou from ol_payment where u_id=".$_SESSION['login_id']."";
	// $res2=mysqli_query($con,$sql2);
	// $row2=mysqli_fetch_array($res2);
	// $count=$row2['cou'];
	//
	//
	//
	//
	// $invID = str_pad($invID, 5, $count, STR_PAD_LEFT);
	// $invID = str_pad($invID, 7, '0', STR_PAD_LEFT);
	// $invID = str_pad($invID, 8, '2', STR_PAD_LEFT);
	echo'<input type="hidden" name="id_trans" value="'.$invID.'">
	<input type="hidden" name="id_name" value="'.$_SESSION['name'].'">
	<input type="hidden" name="id_event" value="15">
	<input type="hidden" name="amt_event" value="'.$ttl.'">
	<input type="hidden" name="id_merchant" value="1014">
	<input type="hidden" name="id_password" value="(VitiICES_2016@)">';
	?>
</form>

<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="margin-top:150px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel"><i class=""></i>Pay Offline</h3>
			</div>
			<div class="modal-body">
				Demand Draft drawn of <b>Rs <?php echo $ttl; ?></b> in favour of - <br>
				<b>"VIT UNIVERSITY"</b> and Payable at <b>"VELLORE"</b>.<br><br>
				DD should be sent to,<br>
				<h5>Dr. Venkata Ravibabu Mandla,<br>
					Professor, SCALE (School of Civil and Chemical Engineering).<br>
					VIT University, Vellore campus, Vellore - 632014.</h5><br><br>
					<span style="color:red">*Write your Contingent no, Name, College Name and Mobile No. behind the DD</span></h5>
				</div>
			</div>
		</div>
	</div>

	<script>
	$(document).ready(function(){
		$(".input1").click(function(){
			$("#navy").prop('disabled',false);
		});
		$(".input2").click(function(){
			$("#limited").prop('disabled',false);
		});
		$("#accom_body").hide();
		$("#acc_btn").click(function(){
			$("#accom_body").toggle(500,"linear");
		});
		$("#reg_exh_but").click(function(){
			$("#reg_exh").submit();

		})
		$("#reg_uce_but").click(function(){
			$("#reg_uce").submit();
		})

		$("#drop_exh_but").click(function(){
			if(confirm("do u want to drop the Exhibition?"))
			{

				$("#drop_exh").submit();
			}

		})
		$("#drop_uce_but").click(function(){
			if(confirm("do u want to drop UCES?"))
			{

				$("#drop_uce").submit();
			}

		})


		$(".work_reg_but").click(function(){
			var id=$(this).parent().children(".work_id").val();
			$("#reg_form").append("<input type='hidden' name='cur_id' value='"+id+"'>");
			$("#reg_form").submit();
		})

		$(".work_drop_but").click(function(){
			var id=$(this).parent().children(".drop_id").val();
			if(confirm("Do you want to drop this workshop?"))
			{
				$("#drop_form").append("<input type='hidden' name='drop_id' value='"+id+"'>");
				$("#drop_form").submit();
			}
		})

		$(".eve_reg_but").click(function(){
			var id=$(this).parent().children(".eve_id").val();
			$("#eve_reg_form").append("<input type='hidden' name='reg_id' value='"+id+"'>");
			$("#eve_reg_form").submit();
		})
		$(".eve_drop_but").click(function(){
			var id=$(this).parent().children(".eve_drop_id").val();
			if(confirm("Do you want to drop this event?"))
			{
				$("#eve_drop_form").append("<input type='hidden' name='drop_id' value='"+id+"'>");
				$("#eve_drop_form").submit();

			}
		})
		$("#payonline").click(function(){
			if(confirm("You will be redirected to the Payment Gateway"))
			{
				$("#payment").submit();
			}
		})
		$('#myModal').modal('hidden');


	})
	</script>

	<script type="text/javascript">
	$("#acc_drop_but").click(function(){
		if(confirm("Do you want to drop the accommodation?"))
		{
			$("#drop_acc").submit();
		}
	});
	</script>

	<script type='text/javascript'>
	$('#checkin_time').timepicker();
	$('#checkout_time').timepicker();
	</script>

	<script type="text/javascript">
	$("#acctype").change(function(){

		if($("#acctype").val() == 'dorm') {
			$('#dorm-checkout-para').show();
		}
		else {
			$('#dorm-checkout-para').hide();
		}
	});
	</script>

	<script>
	$('#calculate_accommodation').click(function() {
		$.ajax({
			method: "POST",
			url: "accom_calc.php",
			data: {	accom_for: $('#calculate_accommodation').val(),
			checkin_date: $('#checkin_date').val(),
			checkin_time: $('#checkin_time').val(),
			checkout_date: $('#checkout_date').val(),
			checkout_time: $('#checkout_time').val(),
			accom_type: $('#acctype').val()
		},
		success: function(data) {
			$('#to-pay').text("Amount : Rs. " + JSON.parse(data).total);
			$('#to-pay').show();
		}
	});
});
</script>

<script type="text/javascript">
$("#unblock").click(function() {
	$("#unblock_form").submit();
});
</script>
</body>
</html>
