<?php
/*ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);*/
//require("class.phpmailer.php")
require("PHPMailerAutoload.php");
include("connection.php");
$name=$_POST['name'];
$lname=$_POST['lname'];
$college=$_POST['college'];
$col_reg=$_POST['col_reg'];
$contact=$_POST['contact'];
$email1=$_POST['email1'];
$email2=$_POST['email2'];
$reg_type=$_POST['reg_type'];
$reach=$_POST['method'];
$sa=$_POST['sa'];
$msg="f";


$name=stripslashes($name);
$lname=stripslashes($lname);
$college=stripslashes($college);
$col_reg=stripslashes($col_reg);
$contact=stripslashes($contact);
$email1=stripslashes($email1);
$email2=stripslashes($email2);
$reg_type=stripslashes($reg_type);
$reach=stripslashes($reach);
$sa=stripslashes($sa);

$name = mysqli_real_escape_string($con,$name);
$lname = mysqli_real_escape_string($con,$lname);
$college = mysqli_real_escape_string($con,$college);
$col_reg = mysqli_real_escape_string($con,$col_reg);
$contact = mysqli_real_escape_string($con,$contact);
$email1 = mysqli_real_escape_string($con,$email1);
$email2 = mysqli_real_escape_string($con,$email2);
$reg_type = mysqli_real_escape_string($con,$reg_type);
$reach= mysqli_real_escape_string($con,$reach);
$sa= mysqli_real_escape_string($con,$sa);

echo "<script>alert(".$email1.")</script>";
if($email1==$email2)
{
$sql="Select * from register where email='$email1'";

$res=mysqli_query($con,$sql);
$count_e=mysqli_num_rows($res);
	// $count_e = 0;
	if($count_e==0)
	{

			// echo "check";

				$pass=rand(100000,500000);
				//echo $pass;

                //Password hashing
//                $options = [
//                'salt' => "akWyffaj4Ridnasdyg123adjhasdnyt123yg123vasdj123",
//                'cost' => 12
//                    ];
//                $pass = password_hash($pass, PASSWORD_BCRYPT, $options);

				$sql="INSERT INTO register(name, lname, college, reg_no, contact, type, email, password, reach, ambassador, count_login, accom, acctype, in_date, in_time, out_date, out_time, accom_pay) values('$name','$lname','$college','$col_reg','$contact','$reg_type','$email1','$pass','$reach','$sa','0','0','0', 0, '0', 0, '0', 'f')";
				//echo "<BR>".$sql."<br>";
				$res=mysqli_query($con,$sql);
				if($res){

				$contig=mysqli_insert_id($con);
				//$to = $email2;
				//$subject = "ASCE ICES registration";
				//$txt = "Login with email id and password=".$pass;
				//$headers = "Thank you for registering with us" . "\r\n" ;
				
  
 
   $mail = new PHPMailer();
   $mail->IsSMTP();
   $mail->Mailer = "smtp";
   $mail->Host = gethostbyname("smtp.gmail.com");
   $mail->Port = "465"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
   $mail->SMTPAuth = true;
   $mail->SMTPSecure = 'ssl';
   $mail->SMTPDebug = 0;
   $mail->Username = "asce.ices17@gmail.com";
   $mail->Password = "gunhouse1969";
    
   $mail->From     = "asce.ices17@gmail.com";
   $mail->FromName = "ASCE";
   $mail->AddAddress($email1,'ICES-17');
   $mail->SetFrom('asce.ices17@gmail.com', 'ICES-17');
   $mail->Subject  = "ASCE ICES registration";
   $mail->Body     = "Login with email id and password=".$pass;
   $mail->WordWrap = 50;  
   
   $mail->SMTPOptions = array(
	    'ssl' => array(
	        'verify_peer' => false,
	        'verify_peer_name' => false,
	        'allow_self_signed' => true
    	)
	);

   $mail->Send();

				
				//mail($to,$subject,$txt,$headers);
				$contig=str_pad($contig, 4, '0', STR_PAD_LEFT);

				$prin= "<center><h2 style='margin-bottom:20px'>Your contingent number is <span style='color:#F16261;'> ICES".$contig.".</span><br>We have sent your password to <b>".$email2."</b>. Login to register for events and stay updated.<br><br>
				Note that the email may have been directed to your Spam/Bulk folder. If so, kindly mark it as 'Not Spam' to ensure that you do not mfiss future updates and registration confirmations from us. Thanks! <br>
				</h2><a class='btn btn-danger' href='login_now.php' style='margin-bottom: 20px;'>Sign-In</a></center>";

				}
				else{
					echo mysqli_error($con);
				}

	}
else{
	$prin="<center><h2>Your email id already exists.</h2><br><br><a class='btn btn-success' href='login_now.php' style='margin-bottom: 20px;'>Sign-In</a></center>";
	}

}
else{
			$prin="<center><h1>Your email id is not same, please enter same email id.</h1></center>";
		}
?>

<!-- <!doctype html> -->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<!-- <html lang="en">
<head> -->

    <!-- Basic -->
	<!-- <title>ASCE-ICES | VIT</title>
	<link rel="shortcut icon" href="img/favicon.png"> -->
    <!-- Define Charset -->
	<!-- <meta charset="utf-8"> -->

    <!-- Responsive Metatag -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->

    <!-- Page Description and Author -->
     <!-- <meta name="description" content="An initiative by the American Society of Civil Engineers Indian Section,
    Vellore Institute of Technology hosts the first of its kind, international symposium on civil engineering.">
    <meta name="author" content="Bhasanth Lakkaraj"> -->

    <!-- Bootstrap CSS  -->
	<!-- <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css"> -->

    <!-- Revolution Banner CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" /> -->

    <!--  CSS Styles  -->
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"> -->

    <!-- Responsive CSS Styles  -->
	<!-- <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen"> -->

    <!-- Color CSS Styles  -->
    <!-- <link rel="stylesheet" type="text/css" href="css/colors/blue.css" title="blue" media="screen" /> -->

    <!-- Fontello Icons CSS Styles  -->
    <!-- <link rel="stylesheet" type="text/css" href="css/fontello.css" media="screen"> -->
    <!--[if IE 7]><link rel="stylesheet" href="css/fontello-ie7.css"><![endif]-->


    <!--  JS  -->
    <!-- <script type="text/javascript" src="js/jquery.min.js"></script>
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
	<script type="text/javascript" src="js/script.js"></script> -->

    <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!DOCTYPE HTML>
	<html>
	<head>
	    <title>ASCE-ICES | VIT</title>
	    <meta name="description" content="An initiative by the American Society of Civil Engineers Indian Section,
	    Vellore Institute of Technology hosts the first of its kind, international symposium on civil engineering." />
	    <meta name="author" content="Advanced Concrete Technology" >
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">


	              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w=" crossorigin="anonymous" />

	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	    <link rel="stylesheet" href="css/linea-icon.min.css" />
	    <link rel="stylesheet" href="css/fancy-buttons.min.css" />
	    <!--=== Google Fonts ===-->
	    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
	    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:300,700,400' rel='stylesheet' type='text/css'>
	    <link href='https://fonts.googleapis.com/css?family=Raleway:600,400,300' rel='stylesheet' type='text/css'>
	    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

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
	 <section id="preloader">
	        <div class="loading-circle fa-spin"></div>
	    </section>
	    <!--=== Preloader section Ends ===-->

	        <?php
	include("head_menu.php");
	?>
	         <!-- Start Page Banner -->

	<!-- Container -->
	<div style="padding-top:80px">
</div>
        <!-- Start Page Banner -->

		<!-- End Page Banner -->
					<div class="container" style="padding-bottom:50px;padding-top:50px; ">
							<div class="portfolio-project">
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<?php
										echo $prin;
										?>
									</div>
								</div>
							</div>
						</div>

		<!-- End Content -->




		<!-- Start Footer -->
		<?php
 	 include("footer.php");
 	 ?>
		<!-- End Footer -->

	</div>
	<!-- End Container -->

    <!-- Go To Top Link -->
		<!--==== Essential files ====-->
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrapValidator.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<!--==== Scroll and navigation plugins ====-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-one-page-nav/3.0.0/jquery.nav.min.js"></script>
		<script type="text/javascript" src="js/jquery.appear.js"></script>
		<!--==== Custom Script files ====-->
		<script type="text/javascript" src="js/custom.js"></script>


</body>
</html>
