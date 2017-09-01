<?php

//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(-1);

session_start();
/*if(!isset($_SESSION['login']))
{
header("location:re_login.php");
}*/
include("connection.php");

// one of these is what I sent as the transaction id
$refno=$_POST['Refno'];
$tid=$_POST['tpsltranid'];

$brefno = $_POST['bankrefno'];
$txndate=$_POST['txndate'];

// status 0300 for success and 0399 for failure
$status = $_POST['status'];

$login=substr($refno,-4);


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
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">

	<!-- Revolution Banner CSS -->
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />

	<!--  CSS Styles  -->
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

	<!-- Responsive CSS Styles  -->
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

	<!-- Color CSS Styles  -->
	<link rel="stylesheet" type="text/css" href="css/colors/blue.css" title="blue" media="screen" />

	<!-- Fontello Icons CSS Styles  -->
	<link rel="stylesheet" type="text/css" href="css/fontello.css" media="screen">
	<!--[if IE 7]><link rel="stylesheet" href="css/fontello-ie7.css"><![endif]-->


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
		<!-- Start Content -->
		<div id="content">
			<div class="container">
				<div class="row sidebar-page">



					<!-- Page Content -->
					<div class="page-content">

						<?php
						$invID=$login;
						$invID = str_pad($invID, 4, '0', STR_PAD_LEFT);
						$sql55="SELECT * from register where id='".$login."'";
						$res55=mysqli_query($con,$sql55);
						$row55=mysqli_fetch_array($res55);
						?>
						<center>
							<h3>

								<?php
								if($status=="0300"){

									$wc=substr($refno,0,1);
									if(substr($refno,4,1)=="c"){	//conference
										$sql2="UPDATE con_reg SET ol='t' WHERE u_id='".$login."'";
										$res2=mysqli_query($con,$sql2);

										$sql4="SELECT con_amount, accom_amount from con_cart where u_id='".$login."'";
										$res4=mysqli_query($con,$sql4);
										$row4=mysqli_fetch_array($res4);
										$acc_amount=$row4['accom_amount'];
										$total=$row4['con_amount']+$row4['accom_amount'];
										$registeredFor = "";

										if($acc_amount > 0) {
											$sql2="UPDATE register SET accom_pay='t' WHERE id='".$login."'";
											$res2=mysqli_query($con,$sql2);

											$sql100 = "SELECT accom, acctype FROM register WHERE id='".$login."'";
											$res100 = mysqli_query($con, $sql100);
											$row100 = mysqli_fetch_array($res100);

											$accomodation_type_fullnames = array('2AC' => '2 Bedded AC', '2ACsh' => '2 Bedded AC shared', '4ACsh' => '4 Bedded AC shared', 'dorm' => 'Dormitory');

											$registeredFor .= "Accomodation (".$row100['accom']." days in ".$accomodation_type_fullnames[$row100['acctype']].")<br>";
										}


										$sql3="DELETE FROM con_cart WHERE u_id='".$login."'";
										$res3=mysqli_query($con,$sql3);

										$sql99 = "SELECT accompany FROM con_reg WHERE u_id='".$login."'";
										$res99 = mysqli_query($con, $sql99);
										$row99 = mysqli_fetch_array($res99);

										switch ($row99['accompany']) {
											case 'f':
											$registeredFor .= "Conference (Delegate)<br>";
											break;

											case 't':
											$registeredFor .= "Conference (Accompanying Delegate/Attendee)<br>";
											break;

											case 'p':
											$registeredFor .= "Conference (Poster Presentation)<br>";
											break;

										}

									}
									else if(substr($refno,4,1)=="w"){	//workshops and events
										$sql2="UPDATE wor_reg SET ol='t' WHERE u_id='".$login."'";
										$res2=mysqli_query($con,$sql2);

										$sql6="UPDATE eve_reg SET ol='t' WHERE u_id='".$login."'";
										$res6=mysqli_query($con,$sql6);

										$sql7="UPDATE uce_reg SET dd='t' WHERE u_id='".$login."'";
										$res7=mysqli_query($con,$sql7);

										$sql4="SELECT work_amount,accom_amount from work_cart where u_id='".$login."'";
										$res4=mysqli_query($con,$sql4);
										$row4=mysqli_fetch_array($res4);
										$acc_amount=$row4['accom_amount'];
										$total=$row4['work_amount']+$row4['accom_amount'];

										if($acc_amount>0){
											$sql2="UPDATE register SET accom_pay='t' WHERE id='".$login."'";
											$res2=mysqli_query($con,$sql2);

											$sql101 = "SELECT accom, acctype FROM register WHERE id='".$login."'";
											$res101 = mysqli_query($con, $sql101);
											$row101 = mysqli_fetch_array($res101);

											$accomodation_type_fullnames = array('2AC' => '2 Bedded AC', '2ACsh' => '2 Bedded AC shared', '4ACsh' => '4 Bedded AC shared', 'dorm' => 'Dormitory');

											$registeredFor .= "Accomodation (".$row101['accom']." days in ".$accomodation_type_fullnames[$row101['acctype']].")<br>";
										}

										$sql3="DELETE FROM work_cart WHERE u_id='".$login."'";
										$res3=mysqli_query($con,$sql3);


										$sqlWorkshops = "SELECT wor_id FROM wor_reg WHERE u_id='".$login."'";
										$resWorkshops = mysqli_query($con, $sqlWorkshops);
										$registeredFor = "";
										$workshopNames = array('1' => 'Geospatial Technology',
										'2' => 'Transportation Engineering',
										'3' => 'Primavera',
										'4' => 'Seismic Design',
										'5' => 'Water Gems',
										'6' => 'Microstation',
										'7' => 'Green Building Design'
									);

									while($rowWorkshops = mysqli_fetch_array($resWorkshops)) {
										$registeredFor .= $workshopNames[$rowWorkshops['wor_id']]."<br>";
									}


									$sqlEvents = "SELECT eve_id FROM eve_reg WHERE u_id='".$login."'";
									$resEvents = mysqli_query($con, $sqlEvents);
									$eventNames = array('1' => 'Green Ideation');

									while($rowEvents = mysqli_fetch_array($resEvents)) {
										$registeredFor .= $eventNames[$rowEvents['eve_id']]."<br>";
									}
								}


								$sql="INSERT into ol_payment values('null','".$total."','".$refno."', '".$tid."', '".$brefno."', '".$status."', ".$login.",'', '".$txndate."');";
								$res=mysqli_query($con,$sql);

								echo '<div id="printbody" style="padding-top:60px">';

								// echo '<img src="img/vit.png" style="width:150px; padding-right:60px"><img src="img/logo.png"style="width:150px;padding:20px 40px 0px 40px;"><img src="img/asce.png" style="width:150px;padding-left:60px;">';
								$print='<center><br><br><br>Congratulations <span style="color:#f16261;">'.$row55['name'].'</span>, your payment is made.';
								//   <table>
								// <tr>
								//
								// <tr><td>Name </td><td>: <span style="color:#f16261;">'.$row55['name'].' '.$row55['lname'].'</span></td></tr>
								// <tr><td>Contingent No </td><td>: <span style="color:#f16261;">ICES'.$invID.'</span></td></tr>
								// <tr><td>Transaction ID  </td><td>: <span style="color:#f16261;">'.$tid.'</span></td></tr>
								// <tr><td>Registered for  </td><td>: <span style="color:#f16261;">'.$registeredFor.'</span></td></tr>
								// <br><tr><td>Amount  </td><td>: <span style="color:#f16261;">'.$total.'</span></td></tr>
								// <br><tr><td>Bank Reference Number  </td><td>: <span style="color:#f16261;">'.$brefno.'</span></td></tr>
								// <br><tr><td>Transaction date  </td><td>: <span style="color:#f16261;">'.$txndate.'</span></td></tr>
								// <br><tr><td>Phone  </td><td>: <span style="color:#f16261;">'.$row55['contact'].'</span></td></tr>
								// <br><tr><td>Email  </td><td>: <span style="color:#f16261;">'.$row55['email'].'</span></td></tr></table>
								$print .= '</center></div>';

								$print .= '<br><p class="text-info" style="font-size: 16px;">We have sent you an email confirming your payment! Please do not delete this email. Note that it may have been directed to your Spam folder.</p><br>';

								// <p class="text-danger">A printed copy of the receipt should be produced at the time of arrival.</p>
								// <br><button style="margin-bottom: 20px;" class="btn btn-info drop_but" id="btnPrint">Print Receipt</button>';

								echo $print;
								$email=$row55['email'];

								$line1='Congratulations ';
								$line11=', your payment is made.';
								$line2='Contingent No :';
								$line12=$invID;
								$line3='Transaction ID :';
								$line13=$tid;
								$line4='Amount :';
								$line14=$total;
								$line5='Bank Reference Number :';
								$line15=$brefno;
								$line6= 'Transaction date :';
								$line16= $txndate;

								$line7 = 'Name : ';
								$line17 = $row55['name'].' '.$row55['lname'];

								$line8 = 'Registered for : ';
								$line18 = $registeredFor;

								$line9 = 'College/Organization : ';
								$line19 = $row55['college'];

								$line10 = 'Phone : ';
								$line110 = $row55['contact'];

								$lineEmail = 'Email : ';
								$lineEmailValue = $row55['email'];

								// require("fpdf/fpdf.php");

								// fpdf object
								// $pdf = new FPDF();

								// generate a simple PDF (for more info, see http://fpdf.org/en/tutorial/)
								// $pdf->AddPage();
								// $pdf->SetFont("Arial","B",11);
								// $pdf->Image('img/header.png',10,null,190,0);
								// $pdf->Ln();
								// $pdf->Ln();
								// $pdf->Ln();
								// $pdf->Cell(40,10, $line1,0,0,"");
								// $pdf->SetTextColor(241,98,97);
								// $pdf->Cell(20,10, $row55['name'],0,0,"");
								// $pdf->SetTextColor(0,0,0);
								// $pdf->Cell(0,10, $line11,0,1,"");
								//
								// //name
								// $pdf->Cell(50,10, $line7,0,0,"");
								// $pdf->SetTextColor(241,98,97);
								// $pdf->Cell(0,10, $line17,0,1,"");
								// $pdf->SetTextColor(0,0,0);
								//
								// $pdf->Cell(50,10, $line2,0,0,"");
								// $pdf->SetTextColor(241,98,97);
								// $pdf->Cell(0,10, $line12,0,1,"");
								// $pdf->SetTextColor(0,0,0);
								// $pdf->Cell(50,10, $line3,0,0,"");
								// $pdf->SetTextColor(241,98,97);
								// $pdf->Cell(0,10, $line13,0,1,"");
								// $pdf->SetTextColor(0,0,0);
								//
								// //registered for
								// $pdf->Cell(50,10, $line8,0,0,"");
								// $pdf->SetTextColor(241,98,97);
								// $pdf->Cell(0,10, $line18,0,1,"");
								// $pdf->SetTextColor(0,0,0);
								//
								// $pdf->Cell(50,10, $line4,0,0,"");
								// $pdf->SetTextColor(241,98,97);
								// $pdf->Cell(0,10, $line14,0,1,"");
								// $pdf->SetTextColor(0,0,0);
								// $pdf->Cell(50,10, $line5,0,0,"");
								// $pdf->SetTextColor(241,98,97);
								// $pdf->Cell(0,10, $line15,0,1,"");
								// $pdf->SetTextColor(0,0,0);
								// $pdf->Cell(50,10, $line6,0,0,"");
								// $pdf->SetTextColor(241,98,97);
								// $pdf->Cell(0,10, $line16,0,1,"");

								// email stuff (change data below)
								$to = $email;

								// $from = "noreply@asceis-ices.com";
								// $subject = "Payment Successful";
								// $message = "<p>Congratulations, your payment is made</p><p>Please check the attachment for the receipt</p>";
								//
								// // a random hash will be necessary to send mixed content
								// $separator = md5(time());
								//
								// // carriage return type (we use a PHP end of line constant)
								// // $eol = PHP_EOL;
								// $eol = "\r\n";
								//
								// // attachment name
								// $filename = "ICES-16 Receipt.pdf";
								//
								// // encode data (puts attachment in proper format)
								// $pdfdoc = $pdf->Output("", "S");
								// $attachment = chunk_split(base64_encode($pdfdoc));
								//
								//
								// // main header (multipart mandatory)
								// $headers  = "From: ".$from.$eol;
								// $headers .= "MIME-Version: 1.0".$eol;
								// $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol;
								// $headers .= "Content-Transfer-Encoding: 7bit".$eol;
								// $headers .= "This is a MIME encoded message.".$eol.$eol;
								//
								// // message
								// $headers .= "--".$separator.$eol;
								// $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
								// $headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
								// $headers .= $message.$eol.$eol;
								//
								// // attachment
								// $headers .= "--".$separator.$eol;
								// $headers .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
								// $headers .= "Content-Transfer-Encoding: base64".$eol;
								// $headers .= "Content-Disposition: attachment".$eol.$eol;
								// $headers .= $attachment.$eol.$eol;
								// $headers .= "--".$separator."--";
								//
								// // send message
								// mail($to, $subject, "", $headers);

								$from = "noreply@asceis-ices.com";
								$subject = "Payment Successful";
								$message = "<p>Congratulations, your payment is made</p><p>";
								$message .= $line7." - ".$line17."<br>";
								$message .= $line2." - ".$line12."<br>";
								$message .= $line3." - ".$line13."<br>";
								$message .= $line8." - ".$line18."<br>";
								$message .= $line4." - ".$line14."<br>";
								$message .= $line5." - ".$line15."<br>";
								$message .= $line6." - ".$line16."<br>";

								$message_to_ICES = $message;
								$message .= "</p>";

								$message_to_ICES .= $line9." - ".$line19."<br>";
								$message_to_ICES .= $line10." - ".$line110."<br>";
								$message_to_ICES .= $lineEmail." - ".$lineEmailValue."<br>";
								$message_to_ICES .= "</p>";

								// a random hash will be necessary to send mixed content
								// $separator = md5(time());

								// carriage return type (we use a PHP end of line constant)
								// $eol = PHP_EOL;
								// $eol = "\r\n";

								// attachment name
								// $filename = "ICES-16 Receipt.pdf";

								// encode data (puts attachment in proper format)
								// $pdfdoc = $pdf->Output("", "S");
								// $attachment = chunk_split(base64_encode($pdfdoc));


								// main header (multipart mandatory)
								$headers  = "From: ".$from."\r\n";
								$headers .= "MIME-Version: 1.0"."\r\n";
								// $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\""."\r\n";
								// $headers .= "Content-Transfer-Encoding: 7bit"."\r\n";
								// $headers .= "This is a MIME encoded message."."\r\n";

								// message
								// $headers .= "--".$separator."\r\n";
								$headers .= "Content-Type: text/html; charset=iso-8859-1";
								// $headers .= "Content-Transfer-Encoding: 8bit"."\r\n";
								// $headers .= $message."\r\n";

								// attachment
								// $headers .= "--".$separator."\r\n";
								// $headers .= "Content-Type: application/octet-stream; name=\"".$filename."\""."\r\n";
								// $headers .= "Content-Transfer-Encoding: base64"."\r\n";
								// $headers .= "Content-Disposition: attachment"."\r\n";
								// $headers .= $attachment."\r\n";
								// $headers .= "--".$separator."--";

								// send message
								$mailstate = mail($to, $subject, $message, $headers);

								mail("reginfo.ices16@gmail.com", "New payment made for ICES", $message_to_ICES, $headers);

							}
							else if($status=="0399"){

								$sql="INSERT into ol_payment_fail values('null','".$refno."','".$status."',".$login.",'');";
								$res=mysqli_query($con,$sql);

								$wc=substr($refno,0,1);
								if(substr($refno,4,1)=="w"){
									$sql8="UPDATE work_cart SET paid='f' WHERE u_id='".$login."' AND paid='w'";
									$res8=mysqli_query($con,$sql8);

									$sql2="UPDATE wor_reg SET ol='f' WHERE u_id='".$login."' AND ol='w'";
									$res2=mysqli_query($con,$sql2);

									$sql6="UPDATE eve_reg SET ol='f' WHERE u_id='".$login."' AND ol='w'";
									$res6=mysqli_query($con,$sql6);

									$sql7="UPDATE uce_reg SET dd='f' WHERE u_id='".$login."' AND dd='w'";
									$res7=mysqli_query($con,$sql7);
								}
								else if(substr($refno,4,1)=="c"){
									$sql8="UPDATE con_reg SET ol='f' WHERE u_id='".$login."' AND ol='w'";
									$res8=mysqli_query($con,$sql8);
								}
								echo'
								<div id="content">
								<div class="container" style="padding-top:150px">';
								echo'Payment Failed!<br>Please try again after some time or choose a different payment method';
								echo'</div>
								</div>';
							}


							?>
						</h3>
					</center>


				</div>
				<!-- End Page Content-->


			</div>
		</div>
	</div>
	<!-- End Content -->




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
<!-- End Container -->

<!-- Go To Top Link -->
<a href="#" class="back-to-top"><i class="icon-up-open-1"></i></a>

<div id="loader">
	<div class="spinner">
		<div class="dot1"></div>
		<div class="dot2"></div>
	</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
// $("#btnPrint").live("click", function () {
//     var divContents = $("#printbody").html();
//     var printWindow = window.open('', '', '');
//     printWindow.document.write('<html><head><title>ASCE-ICES</title>');
//     printWindow.document.write('</head><body style="padding-top:50px;"><center>');
//     printWindow.document.write(divContents);
//     printWindow.document.write('</center></body></html>');
//     printWindow.document.close();
//     printWindow.print();
// });
</script>

</body>
</html>
