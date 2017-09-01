<?php
session_start();
	if(isset($_SESSION['login']))
	{
		header("location:reg_desk.php");
	}

?>
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


    <!--=== Internet explorer fix ===-->
    <!-- [if lt IE 9]>
		<script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif] -->
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

<div style="padding-top:80px">
<!-- <div class="section" style="padding-top:60px; padding-bottom:0px; border-top:1px solid #eee; border-bottom:1px solid #eee; background: url(images/img/slide-wrk-bg.jpg) #f9f9f9;">
                <div class="container"> -->

                    <!--  Logo Image -->
                    <!-- <div class="text-center" data-animation="fadeInDown" data-animation-delay="01">
                        <h1 style='color:white'>Workshops</h1>
                        <div class="hr1" style="margin-bottom:40px;"></div>
                    </div> -->

                    <!--  Browser Image -->

                <!-- </div>
            </div> -->
            </div>
            <!-- End Page Banner -->
<!-- Main body part -->
<div class="container" style="padding-bottom:50px;padding-top:50px; ">
		<div class="portfolio-project">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 center section-title">
					<h4 style="color:#EA4C3C;">Register</h4>
				</div>
        <!-- <div class="col-md-8 col-md-offset-2"> -->
        <div class="col-md-10 col-md-offset-1 center">
          <a data-toggle="modal" data-target="#myModal" style="font-size:16px; font-weight:bold">Check the registration process</a>
				</div>

        <form method="POST" action="reg_now.php" onsubmit="return(val())">
                                 <!-- <h1>Register with ASCE-ICES Now</h1> -->
                                 <br>

<br>
<div class="col-md-6 col-md-offset-3" >
                                First Name:

                                <input type="text" class="form-control" placeholder="Enter first your name" id="name" name="name" required>
                                <br>
                                Last Name:


                                <input type="text" class="form-control" placeholder="Enter last your name" id="lname" name="lname" required>

  <br>

                                College/ Organisation:


                                <input type="text" class="form-control" placeholder="Enter your college/organisation name" id="college" name="college" required>

<br>


                                Participant type:


                                <select name="reg_type" class="form-control" id="type_user" required>
                                <option value="no">-- Select registration type --</option>
  															<?php //earlier only ac and rs ?>
                                  <option value="ac" class="form-control">Academic Participant (Faculties)</option>
                                  <option value="in" class="form-control">Industrial Participant</option>
                                  <option value="st" class="form-control">Student</option>
                                  <option value="rs" class="form-control">Research Scholar</option>
                                </select>


<br>
                        Your Roll no:


                                <input id="roll_no_input" type="text" class="form-control" placeholder="Enter your Roll no" id="col_reg" name="col_reg">
<br>
                               Phone no:


                                <input type="text" class="form-control" placeholder="Enter your Contact number" name="contact" id="contact" required>


<br>
                               Email id:


                                <input type="email" class="form-control" placeholder="Enter your valid email id" name="email1" id="email1" required>

<br>

                               Re-enter email id:


                                <input type="email" class="form-control" placeholder="Re-enter your valid email id" name="email2" id="email2" required>
<br>


                                How did you come to know about ICES:


                                <select name="method" class="form-control" id="type_reach">
                                <option value="no">-- Select one--</option>
                                  <option value="flyer" class="form-control">Through previous symposiums</option>
                                  <option value="fb" class="form-control">Facebook posts</option>
                                  <option value="sa" class="form-control">Student Ambassador</option>
                                </select>

<br>
                               Student Ambassador Name:


                                <input type="text" class="form-control" placeholder="Ambassador name (if any)" name="sa" id="sa">



<br>

                               <input type="submit" class="form-control btn-success" value="Register now">

<br>
                     </form>
                   </div>




				<!-- <div class="col-md-5 project-photo">
					<img src="images/Advance%20concrete%20technology.jpg" alt="" />
				</div> -->
				<!-- <div class="col-md-3 project-details">
					<h5>Workshop Details</h5>
					<ul class="details-list">
						<li><i class="fa fa-th-list">
						</i> <strong class="strong">Registration Fee: -->
						<!-- <br></strong> Rs. 500<span style="color: red">*</span></li> -->

<!--
						<li><i class="fa fa-calendar"></i> <strong class="strong">Date: </strong> <br>Coming Soon</li-->
            <!-- <li><i class="fa fa-clock-o"></i> <strong class="strong">Duration: </strong> <br>1 Day</li>
						<li><i class="fa fa-user"></i> <strong class="strong">Conducted By: </strong> <br></li> -->
						<!--li><i class="fa fa-question"></i> <strong class="strong">Who can attend? </strong> <a 							href="#"><br>Students and Research scholars
<br>Faculties
<br>Consultants and Practicing Engineers</a></li>
<li><i class="fa fa-phone"></i> <strong class="strong">Contact: </strong> <br>Tushar Singh (+91 9585627770)
<br>Sai Teja (+91 9944120733)
<br>Tadap Techi (+91 7708106336)</li>
-->
					<!-- </ul>

				</div> -->
				<!-- <div class="col-md-4 project-info">
					<h5>Workshop Info</h5>
					<p>Premature deterioration of civil infrastructure has created a colossal backlog of ageing concrete structures. Hence it is important to design structures that can exceed their service life even in harsh environments and with minimum maintenance and repair. This however requires a solid understanding of concrete technology. This workshop will teach you advanced topics like high performance concrete, concrete construction sustainability, and service life prediction with practical demonstration.</p>
					<span style="color: red">*</span> (Exclusive of Taxes) Inclusive of delegate kit and working lunch.
				</div> -->
			</div>
		</div>
	</div>
	<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" style="margin-top:150px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 id="myModalLabel"><i class=""></i>How to Register for the Workshops/Events?</h4>
				</div>
				<div class="modal-body"><div>
<h6>
	                       <p>1. Click on the<b> Register</b> button on top right corner of the screen.
	                             <p>2. Fill in your details in the <b>Registration</b> page. Make sure you fill a valid Email Address Inbox on the site.
	                                   <p>3. Press <b>“Register Now”</b> and check your email address. You will receive a mail from the website with your password.
	                       <p>4. Also you will be redirected to a page showing your<b> Contingent No.  ICESxxxx.</b> Please make a note of this number</p>
	                        <p>5. Go to the Main page of Website and now press <b>Login.</b></p>
	                        <p>6. Enter your Reg. Email ID & the password you have received on your mail.</p>
	                        <p>7. You will be redirected to a password change page. Write your <b>given password, New password (of your choice), Confirm New password.</b>
	                        </p>
	                        <p>8. This new password will be your password from now on and you can use this password and your email ID to login any number of time.</p>

	                        <p>9. After logging in, the top right corner will change to <b>Welcome &lt;your name&gt;.</b></p>
	                        <p>10. When you hover your mouse our this button, you will get 6 options









	                  <ul class="icons-list">
	                        <li><i class="icon-angle-double-right"></i><b>Registration Desk:</b><br>
	                            You can register for any event and workshop on this page. Tick on each event and workshop which you want to register and press register now.
	The next page will show you the procedure to send the DD. Please make a note. The Workshops/Events once registered cannot be deleted.
	                        </li>
	                        <li><i class="icon-angle-double-right"></i><b>Accommodation:</b>
	                            You can book for your accommodation in VIT Hostel Dorms on this page. Packages for 1 to 4 days are available.
	These will include Food for each day that you have booked.
	                        </li>
	                        <li><i class="icon-angle-double-right"></i><b>Check DD status:</b>
	                            You can check the status of your DD whether it has been received or not.
	                        </li>
	                        <li><i class="icon-angle-double-right"></i><b>
	                        Your Cart:</b>
	                        You can view your expenses over here.
	                        </li>

	                  </ul>
	</p>
</h6>
	                  </div>
					</div>
				</div>
			</div>
		</div>
<?php
include("footer.php");
?>

    <!--=== Footer section Ends ===-->
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
