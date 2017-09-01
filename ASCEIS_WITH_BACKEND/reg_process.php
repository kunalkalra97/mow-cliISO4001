<?php

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

	<?php
	include("head_menu.php")
	?>

		
      
      
        <!-- Start Content -->
		<div id="content">
			<div class="container">
				<div class="row sidebar-page">
                    
                  
                    <!-- Start Sidebar -->
                   
                    <!-- End Sidebar -->
                  
                    
                    <!-- Page Content -->
					<div class="page-content">
                    
                  <div class="col-xs-7" style="float:none; margin:0px auto;">
                        <h2><br/><br/><br/>How to Register for the Workshops/Events?</h2>
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
                  </div>
                        <!-- Classic Heading -->
                    	

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
  
   
</body>
</html>