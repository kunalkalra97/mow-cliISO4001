<?php
session_start();
session_destroy();
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
		<div class="container" style="padding-bottom:50px;padding-top:50px; ">
				<div class="portfolio-project">
					<div class="row">
						<div class="col-md-10 col-md-offset-1 center section-title">
							<h4 style="color:#EA4C3C;">Sign In</h4>
						</div>

							<div class="col-md-6" style="float:none; margin:0px auto">
 								 <div style="color:red; padding-bottom:10px;">
 										 <center>*invalid login id or password. Try again</center>
 								 </div>

 								 <form class="form-signin" role="form" action="check_login.php" method="POST">
  <!-- <h2 class="form-signin-heading">Please sign in</h2> -->
  <input type="text" class="form-control" id="login" name="login" placeholder="Enter ID" required="" autofocus="">
  <br>
  <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required="">
 <br>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
 </form>
		    </div>
		  <div class="col-md-4  col-md-offset-4 center">
		      &nbsp;
		  </div>
		    <div class="col-md-4  col-md-offset-4 center">
		      New User? <a href="register.php"> <font color="red">Register Here. </font></a>
		</div>
				</div>
			</div>
</div>

		<!-- Start Footer -->
		<?php
		include("footer.php");
		?>
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
