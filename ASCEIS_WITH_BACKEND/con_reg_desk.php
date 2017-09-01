<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("location:login_now.php");
}

?>
<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("location:error.php");
}

include("connection.php");

?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>

	<!-- Basic -->
	<title>ASCE-ICES | VIT</title>
	<link rel="shortcut icon" href="img/favicon.png">
	<!-- Define Charset -->
	<meta charset="utf-8">

	<!-- Responsive Metatag -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Page Description and Author -->
	<meta name="description" content="An initiative by the American Society of Civil Engineers Indian Section,
	Vellore Institute of Technology hosts the first of its kind, international symposium on civil engineering.">
	<meta name="author" content="Bhasanth Lakkaraj">

	<!-- Bootstrap CSS  -->
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="screen"> -->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">

	<!-- Revolution Banner CSS -->
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />

	<!--  CSS Styles  -->
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

	<!-- Responsive CSS Styles  -->
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

	<!-- Color CSS Styles  -->
	<link rel="stylesheet" type="text/css" href="css/colors/blue.css" title="blue" media="screen" />
	<link rel="stylesheet" href="css/lightbox.css">


	<!-- Fontello Icons CSS Styles  -->
	<link rel="stylesheet" type="text/css" href="css/fontello.css" media="screen">
	<!--[if IE 7]><link rel="stylesheet" href="css/fontello-ie7.css"><![endif]-->

	<link rel="stylesheet" href="css/bootstrap-timepicker.css" media="screen" title="no title" charset="utf-8">
	<!--  JS  -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.migrate.js"></script>
	<script type="text/javascript" src="js/modernizrr.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<script type="text/javascript" src="js/jquery.fitvids.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/jquery.appear.js"></script>
	<script type="text/javascript" src="js/count-to.js"></script>
	<script type="text/javascript" src="js/jquery.textillate.js"></script>
	<script type="text/javascript" src="js/jquery.lettering.js"></script>
	<script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
	<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
	<script type="text/javascript" src="js/jquery.parallax.js"></script>
	<script type="text/javascript" src="js/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script src="js/lightbox.min.js"></script>

	<!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
	<script type="text/javascript" src="js/bootstrap-timepicker.js"></script>

	<!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>
<body>

	<!-- Container -->
	<div id="container">

		<!-- Start Header -->
		<div class="hidden-header"></div>
		<header class="clearfix">

			<!-- Start Top Bar -->
			<?php
			include("top_head.php");
			?>
			<!-- End Top Bar -->


			<?php
			include("head_menu.php");
			?>


		</header>
		<!-- End Header -->




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
<h4>Registration Desk <span class="head-line"></span></h4>
<ul>
<li>
	<a href="reg_desk.php">Back to registration desk</a>
</li>
								<li>
										<a href="docs/schedule.pdf" target="_blank">View schedule</a>
								</li>

</ul>
</div>

							<div style="float:none; padding:15px 10px;width:100%;border-right:1px solid #ddd;background-color:#eeefff">
								<div style="font-weight:; font-size:16px; margin-bottom:20px">
									<?php
									$invID=$_SESSION['login_id'];
									$invID = str_pad($invID, 4, '0', STR_PAD_LEFT);
									$sql3="SELECT * from con_reg where u_id='".$_SESSION['login_id']."'";
									$res3=mysqli_query($con,$sql3);
									$con3=mysqli_fetch_array($res3);
									$dd=$con3['dd'];
									$ol=$con3['ol'];

									$sql4="SELECT * from ol_payment where u_id='".$_SESSION['login_id']."'";
									$res4=mysqli_query($con,$sql4);
									$con4=mysqli_fetch_array($res4);
									$tid=$con4['tid'];
									$status=$con4['status'];


									$sql5="SELECT * from con_cart where u_id='".$_SESSION['login_id']."'";
									$res5=mysqli_query($con,$sql5);
									$row5=mysqli_fetch_array($res5);

									$tot=$row5['con_amount'];
									$total=$row5['accom_amount'];

									?>
									<center><h2> Your Cart with contingent no. <span style='color: #f16261;'>ICES<?php echo $invID;?></span> </h2>
										<?php

										echo "<p>You have successfully registered for ICES’16.
										<p> Rs ".$tot." for Conference<br>";
										echo "Rs ".$total." for Accommodation";
										$ttl=$total+$tot;
										echo "<br><b>Total Rs ".$ttl."</b>";
										echo'
										<br>
										<br>';
										if($ttl!=0 && $ol=="f" && $dd=="f"){
											echo'<button class="btn btn-info" id="payonline">Pay Online</button><br>OR<br>
											<button class="btn btn-info" id="payoffline" type="button" data-toggle="modal" data-target="#myModal">Pay Offline</button>';

											/*echo'<button class="btn btn-danger" id="payonline" disabled>Pay Online</button><br>OR<br>
											<button class="btn btn-danger" id="payoffline" type="button" data-toggle="modal" data-target="#myModal" disabled>Pay Offline</button>';*/
										}
										else if(($ol=="t" || $dd=="t") && $ttl>0){
											echo'<button class="btn btn-info" id="payonline" disabled>Payment Made</button>';
										}
										else if($ol=="w"){
											echo'<button class="btn btn-info" id="payonline" disabled>Pay Online</button><br>OR<br>
											<button class="btn btn-info" id="payoffline" type="button" data-toggle="modal" data-target="#myModal" disabled>Pay Offline</button>';

											echo "<br><h5><span style='color:green'>You tried to pay the amount already<br>";
											echo "If your payment is made, please check the status after 3 business days";
											echo "<br>or click 'Retry' to retry your payment</span><h5>";
											echo '<button style="margin-top: 20px" class="btn btn-info" id="unblock">Retry</button>';
										}
										echo"</center>";?>
									</div>
									<div>
										<br>
									</div>
								</div>
							</div>

							<div class="col-md-7 page-content">
								<div class="alert alert-danger"><h5 style="text-align:center;" class="text-danger">Online registrations for the conference and conference accommodation are now closed.<br>However, you can still register for accommodation on spot.</h5></div>

								<!-- start Tshirts -->

								<?php

								//     $sqlt="SELECT * from tshirt where u_id='".$_SESSION['login_id']."'";
								//    $rest=mysqli_query($con,$sqlt);
								//   $rowt=mysqli_fetch_array($rest);

								?>

								<!--        <table border="0" class="table">
								<tr>
								<td colspan="4">
								<h2 align="center">Tshirts</h2>
								<h6 align="center">click on the image to zoom in</h6>
							</td>
						</tr>
						<tr>
						<div class="image-row">
						<div class="image-set">
						<td>
						<a class="example-image-link" href="img/navy.jpg" data-lightbox="example-set" data-title="Navy Blue Edition"><img class="example-image" src="img/navy-thumb.jpg" alt=""  style="height:150px;cursor:zoom-in;"/></a>
					</td>
					<td>
					Blue<br>Rs. 350<br>
					<form action="book_t.php" method="POST">
					<div class="radio">
					<label><input type="radio" name="size" value="m" class="input1">M</label>
				</div>
				<div class="radio">
				<label><input type="radio" name="size"  value="l" class="input1">L</label>
			</div>
			<div class="radio">
			<label><input type="radio" name="size" value="xl" class="input1">XL</label>
		</div>
		<div class="radio">
		<label><input type="radio" name="size" value="xxl" class="input1">XXL</label>
	</div>
	<input type="hidden" name="t" value="navy"> -->
	<?php
	// if($rowt['navy']=='t'){
	// echo'<input type="submit" class="btn btn-success reg_but" id="" value="BOOKED" disabled>';
	// }
	// else{
	// echo'<input type="submit" class="btn btn-success reg_but" id="navy" value="Book Now" disabled>';
	// }
	?>
	<!--       </form>
</td>
<td>
<a class="example-image-link" href="img/limited.jpg" data-lightbox="example-set" data-title="Limited Edition"><img class="example-image" src="img/limited-thumb.jpg" alt="" style="height:150px;cursor:zoom-in;"/></a>
</td>
<td>
White (Limited Edition)<br>Rs. 300<br>
<form action="book_t.php" method="POST">
<div class="radio">
<label><input type="radio" name="size" value="m" class="input2">M</label>
</div>
<div class="radio">
<label><input type="radio" name="size" value="l" class="input2">L</label>
</div>
<div class="radio">
<label><input type="radio" name="size" value="xl" class="input2">XL</label>
</div>
<div class="radio">
<label><input type="radio" name="size" value="xxl" class="input2">XXL</label>
</div>
<input type="hidden" name="t" value="white">  -->
<?php
// if($rowt['white']=='t'){
// echo'<input type="submit" class="btn btn-success reg_but" id="" value="BOOKED" disabled>';
// }
// else{
// echo'<input  type="submit" class="btn btn-success reg_but" id="limited" value="Book Now" disabled>';
// }
?>
<!--
</form>
<p>*subject to availability</p>
</td>
</div>
</div>
</tr>
</table>

--> <!-- end tshirts -->



<table width="100%" border="0" class="table">
	<tr>
		<th colspan="3" style="text-align:center">
			<h2>2<sup>nd</sup> International Conference on Sustainable Energy and Built Environment</h2>
		</th>

		<tr>
			<td width="70%">
				<a href="conference.php" target="_blank">Delegate</a>
			</td>
			<td style='color:#f16261;'>
				<div class='btn-cont'>
					<?php
					include("connection.php");

					$sql = "SELECT * from con_reg where u_id='".$_SESSION['login_id']."'";
					$res = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($res);
					$count_rows = mysqli_num_rows($res);
					$type=$row['accompany'];
					// if not registered, register now as a delegate
					if($count_rows!=1)
					{
						// echo "<button class='btn btn-info reg_but' id='con_reg_but'>Register now!</button>";
						echo "<button class='btn btn-danger reg_but' id='con_reg_but' disabled>Registrations closed</button>";
					}

					// if you are an accompanying delegate, then you cannot register as a delegate, so block this button
					else if($type=="t")
					{
						echo "<button class='btn btn-info reg_but' disabled>Already registered as accompanying delegate/attendee</button>";
					}

					else if($type=="p")
					{
						echo "<button class='btn btn-info reg_but' disabled>Already registered for poster presentation</button>";
					}

					else
					{
						if($row['dd']=="f" && $ol=="f")
						{
							// echo "<button class='btn btn-danger reg_but' id='con_drop_but'>Cancel registration</button>";
							echo "<button class='btn btn-danger reg_but' id='con_drop_but' disabled>Registrations closed</button>";
							echo "<script>$('#payonline, #payoffline').attr('disabled', true);</script>";
						}
						else if($row['dd']=="t")
						{
							echo "<button class='btn btn-warning rec_but' disabled>Payment Received</button>";
						}
						else if($ol=="t" && $status=="0300"){
							echo "<button class='btn btn-warning rec_but' disabled>Payment Received</button>";
						}
						else if($ol=="w"){
							echo "<button class='btn btn-warning rec_but' disabled>Waiting for Payment</button>";
						}
					}
					?>
				</div>
			</td>
			<td>


				<?php

				// display price of delegate registration for workshop

				$sql1="SELECT * from register where id='".$_SESSION['login_id']."'";
				$res1=mysqli_query($con,$sql1);
				$row1=mysqli_fetch_array($res1);
				if($row1['type']=="rs")
				{
					echo "Rs.6500";
				}

				else if($row1['type']=="ac")
				{
					echo "Rs.8000";
				}

				else if($row1['type']=="in")
				{
					echo "Rs.10000";
				}

				else if($row1['type']=="st")
				{
					echo "Rs.6500";
				}
				?>
			</td>
		</tr>
		<tr>

			<td width="70%">
				<a href="conference.php" target="_blank"> Accompanying Delegate/Attendee*</a>
			</td>
			<td style='color:#f16261;'>
				<div class='btn-cont'>
					<?php
					include("connection.php");
					$sql = "SELECT * from con_reg where u_id='".$_SESSION['login_id']."'";
					$res = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($res);
					$count_rows = mysqli_num_rows($res);
					$type=$row['accompany'];

					// if not registered, register now as an accompanying delegate
					if($count_rows!=1)
					{
						// echo "<button class='btn btn-info reg_but' id='con_reg_but2'>Register now</button>";
						echo "<button class='btn btn-danger reg_but' id='con_reg_but2' disabled>Registrations closed</button>";
					}

					// if you are a delegate, you cannot register as an accompanying delegate, so block this button
					else if($type=="f")
					{
						echo "<button class='btn btn-info reg_but' disabled>Already registered as a delegate</button>";
					}
					else if($type=="p")
					{
						echo "<button class='btn btn-info reg_but' disabled>Already registered for poster presentation</button>";
					}
					else
					{
						if($row['dd']=="f" && $ol=="f")
						{
							// echo "<button class='btn btn-danger reg_but' id='con_drop_but2'>Cancel registration</button>";
							echo "<button class='btn btn-danger reg_but' id='con_drop_but2' disabled>Registrations closed</button>";
							echo "<script>$('#payonline, #payoffline').attr('disabled', true);</script>";
						}
						else if($row['dd']=="t")
						{
							echo "<button class='btn btn-warning rec_but' disabled>Payment Received</button>";
						}
						else if($ol=="t" && $status=="0300"){
							echo "<button class='btn btn-warning rec_but' disabled>Payment Received</button>";
						}
						else if($ol=="w"){
							echo "<button class='btn btn-warning rec_but' disabled>Waiting for Payment</button>";
						}
					}
					?>
				</div>
			</td>
			<td>
				<?php
				$sql1="SELECT * from register where id='".$_SESSION['login_id']."'";
				$res1=mysqli_query($con,$sql1);
				$row1=mysqli_fetch_array($res1);
				if($row1['type']=="rs")
				{
					echo "Rs.2000";
				}

				else if($row1['type']=="ac")
				{
					echo "Rs.2500";
				}

				else if($row1['type']=="in")
				{
					echo "Rs.2500";
				}
				else if($row1['type']=="st")
				{
					echo "Rs.2000";
				}
				?>
			</td>
		</tr>

		<tr>

			<td width="70%">
				<a href="conference.php" target="_blank"> Poster Presentation</a>
			</td>
			<td style='color:#f16261;'>
				<div class='btn-cont'>
					<?php
					include("connection.php");
					$sql = "SELECT * from con_reg where u_id='".$_SESSION['login_id']."'";
					$res = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($res);
					$count_rows = mysqli_num_rows($res);
					$type=$row['accompany'];

					// if not registered, register now for poster presentation
					if($count_rows!=1)
					{
						// echo "<button class='btn btn-info reg_but' id='con_reg_but3'>Register now</button>";
						echo "<button class='btn btn-danger reg_but' id='con_reg_but3' disabled>Registrations closed</button>";
					}

					else if($type=="f")
					{
						echo "<button class='btn btn-info reg_but' id='con_reg_but' disabled>Already registered as a delegate</button>";
					}
					else if($type=="t")
					{
						echo "<button class='btn btn-info reg_but' id='con_reg_but' disabled>Already registered as accompanying delegate/attendee</button>";
					}
					else
					{
						if($row['dd']=="f" && $ol=="f")
						{
							// echo "<button class='btn btn-danger reg_but' id='con_drop_but2'>Cancel registration</button>";
							echo "<button class='btn btn-danger reg_but' id='con_drop_but2' disabled>Registrations closed</button>";
							echo "<script>$('#payonline, #payoffline').attr('disabled', true);</script>";
						}
						else if($row['dd']=="t")
						{
							echo "<button class='btn btn-warning rec_but' disabled>Payment Received</button>";
						}
						else if($ol=="t" && $status=="0300"){
							echo "<button class='btn btn-warning rec_but' disabled>Payment Received</button>";
						}
						else if($ol=="w"){
							echo "<button class='btn btn-warning rec_but' disabled>Waiting for Payment</button>";
						}
					}
					?>
				</div>
			</td>
			<td>
				<?php
				$sql1="SELECT * from register where id='".$_SESSION['login_id']."'";
				$res1=mysqli_query($con,$sql1);
				$row1=mysqli_fetch_array($res1);
				if($row1['type']=="rs")
				{
					echo "Rs.2500";
				}

				else if($row1['type']=="ac")
				{
					echo "Rs.3000";
				}

				else if($row1['type']=="in")
				{
					echo "Rs.3500";
				}
				else if($row1['type']=="st")
				{
					echo "Rs.2500";
				}
				?>
			</td>
		</tr>
	</table>

	<br>
	<h6 align="center">*Co-authors and attendees need to register as 'Accompanying delegate/Attendee'</h6>


	<br>
	<div id="accom" style="float:none; margin:0px auto;">
		<div style="">
			<center><h2><button class="btn btn-info" id="acc_btn">Accommodation for conference</button></h2></center>
		</div>

		<div id="accom_body">
			<hr  style="border-top: 1.5px solid #ddd;">

			<?php

			echo ' <form method="POST" action="con_reg_accom.php" onsubmit="return(val())">';

			include("connection.php");

			//logic to check whether a participant can register for accommodation

			/*conditions to register for CONFERENCE ACCOMMODATION
			* 1) Participant should have registered (whether or not payment has been made) for conference
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

			if($registeredForConference && !$registeredForWorkshop && !$registeredForAccommodation && !$paidForAccommodation)
			{
				echo "<center style='margin-bottom: 20px;'><h5>Registration for conference accommodation is closed.
				However, you can still register for accommodation on spot.</h5>";

				/*echo "<center style='margin-bottom: 20px;'><h5>You have not registered for accommodation yet.
				You can register here (optional).</h5>
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
					<h4 class='classic-title'>accommodation type</h4>
						<select name='accom_type' id='acctype' class='form-control'>
							<option value='2AC'>Double Bedded AC (single occupancy) - Rs 3000/day/person (24 hour basis)</option>
							<option value='2ACsh'>Double Bedded AC (shared) - Rs 1500/day/person (24 hour basis)</option>
							<option value='4ACsh'>Four Bedded AC (shared) - Rs 750/day/person (24 hour basis)</option>
							<option value='dorm'>Dormitory - Rs 300/day/person (daily basis)</option>
						</select>
				</div>

				<button id='calculate_accommodation' type='button' class='btn btn-info btn-sm' style='margin-top:10px' value='con_accom'>Calculate cost</button>
				<button type='submit' class='btn btn-success btn-sm' style='margin-top:10px' name='accom_for' value='con_accom'>Register</button>

				<div class='alert alert-info' style='margin-top: 20px; font-weight: bold; font-style: 20px; display: none'>

				</div>

				<p id='to-pay' class='text-info' style='font-weight: bold; margin-top: 20px'></p>

				<input type='hidden' name='accom_cw' value='c'>
				</center>
				";*/

			}

			else if($paidForAccommodation){
				$accommodation_type_fullnames = array('2AC' => '2 Bedded AC', '2ACsh' => '2 Bedded AC shared', '4ACsh' => '4 Bedded AC shared', 'dorm' => 'Dormitory');
				echo "<center><h5>You have registered for ".$row_accomDetails['accom']." day(s) of accommodation of type '".$accommodation_type_fullnames[$row_accomDetails['acctype']]."' from ".$row_accomDetails['in_date']."th March (".$row_accomDetails['in_time'].") to ".$row_accomDetails['out_date']."th March (".$row_accomDetails['out_time'].")</h5>";
				echo "<br>
				<button class='btn btn-warning rec_but' disabled>Payment Received</button>";
				echo "<h6>*Additional accommodation available on-spot</h6></center>";
			}
			else if($registeredForAccommodation && !$paidForAccommodation){
				$accommodation_type_fullnames = array('2AC' => '2 Bedded AC', '2ACsh' => '2 Bedded AC shared', '4ACsh' => '4 Bedded AC shared', 'dorm' => 'Dormitory');
				echo "<center><h5>You have registered for ".$row_accomDetails['accom']." day(s) of accommodation of type '".$accommodation_type_fullnames[$row_accomDetails['acctype']]."' from ".$row_accomDetails['in_date']."th March (".$row_accomDetails['in_time'].") to ".$row_accomDetails['out_date']."th March (".$row_accomDetails['out_time'].")</h5>";
				echo "<br>
				<button type='button' name='acc_drop_but' class='btn btn-danger drop_but' id='acc_drop_but'>Drop now</button>";
				echo "<h6>*Additional accommodation available on-spot</h6></center>";
			}

			else if(!$registeredForConference){
				echo "<center><h5>Not Registered for Conference Yet</h5></center>";
			}

			else if($registeredForWorkshop) {
				echo "<center><h5 class='text-danger'>If you are registering for both workshops and the conference, you need to register for accommodation on spot.</h5></center><br>";
			}

			else if($accommodationFor == 'w'){
				echo "<center><h5>Already Registered for accommodation in  Events and Workshops</h5>";
				echo "<h6>*Additional accommodation available on-spot</h6></center>";
				echo "<h5 class='text-danger'>If you are registering for both workshops and the conference, you need to register for accommodation on spot.</h5><br>";
			}

			echo"</form>
			</div></div>";
			?>
		</div>
	</div>
</div>
</div>
</div>
</div>

<!-- Start Footer -->
<?php
$page = basename(__FILE__) ;

include ( 'counter.php');
addinfo($page);
$result=mysqli_query($con,"SELECT count FROM hits WHERE page = '$page'");$row=mysqli_fetch_array($result);$count=$row[0];

include("footer.php");
?>
<!-- End Footer -->

</div>
<a href="#" class="back-to-top"><i class="icon-up-open-1"></i></a>

<div id="loader">
	<div class="spinner">
		<div class="dot1"></div>
		<div class="dot2"></div>
	</div>
</div>

<form id="reg_con" method="POST" action="reg_con.php">
	<input type="hidden" name="accomp" value="f">
</form>
<form id="accomp_reg_con" method="POST" action="reg_con.php">
	<input type="hidden" name="accomp" value="t">
</form>
<form id="poster_reg_con" method="POST" action="reg_con.php">
	<input type="hidden" name="accomp" value="p">
</form>
<form id="drop_con" method="POST" action="drop_con.php"></form>
<form id="drop_acc" method="POST" action="drop_acc.php"></form>
<form id="con_unblock_form" method="POST" action="con_unblock.php"></form>
<form id="payment" method="POST" action="con_pay_online.php">
	<?php

	// $sql2 = "SELECT count(*) as cou from ol_payment where u_id=".$_SESSION['login_id']."";
	// $res2=mysqli_query($con,$sql2);
	// $row2=mysqli_fetch_array($res2);
	// $count=$row2['cou'];
	//
	// $invID = str_pad($invID, 5, $count, STR_PAD_LEFT);
	// $invID = str_pad($invID, 7, '0', STR_PAD_LEFT);
	// $invID = str_pad($invID, 8, '1', STR_PAD_LEFT);
	echo'<input type="hidden" name="id_trans" value="'.$invID.'">
	<input type="hidden" name="id_name" value="'.$_SESSION['name'].'">
	<input type="hidden" name="id_event" value="47">
	<input type="hidden" name="amt_event" value="'.$ttl.'">
	<input type="hidden" name="id_merchant" value="1046">
	<input type="hidden" name="id_password" value="jgf(lg)jfOOqs!vs@">';
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
					<span style="color:red">*Write your Contignent no, Name, College Name and Mobile No. behind the DD</span></h5>
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
		$("#con_reg_but").click(function(){
			$("#reg_con").submit();
		});

		$("#con_reg_but2").click(function(){
			$("#accomp_reg_con").submit();
		});

		$("#con_reg_but3").click(function() {
			$("#poster_reg_con").submit();
		});

		$("#payonline").click(function(){
			if(confirm("You will be redirected to the Payment Gateway"))
			{
				$("#payment").submit();
			}
		});

		$("#con_drop_but").click(function(){
			if(confirm("Do you want to drop the conference?"))
			{
				$("#drop_con").submit();
			}
		});

		$("#con_drop_but2").click(function(){
			if(confirm("Do you want to drop the conference?"))
			{
				$("#drop_con").submit();
			}
		});

		$("#acc_drop_but").click(function(){
			if(confirm("Do you want to drop the accommodation?"))
			{
				$("#drop_acc").submit();
			}
		});
		$('#myModal').modal('hidden');


	})
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
			$("#con_unblock_form").submit();
		});
	</script>
</body>
</html>
