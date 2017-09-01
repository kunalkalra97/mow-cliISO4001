<?php
    session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <title>ASCE-ICES | VIT</title>
    <meta name="description" content="An initiative by the American Society of Civil Engineers Indian Section,
    Vellore Institute of Technology hosts the first of its kind, international symposium on civil engineering." />
    <meta name="author" content="Shubham Arora">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/linea-icon.css" />
    <link rel="stylesheet" href="css/fancy-buttons.css" />
    <!--=== Google Fonts ===-->
    <link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:600,400,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='fonts/Humblle%20Rought%20Caps.otf' rel="stylesheet" type="text/css" />
    <link href='fonts/Humblle%20Rought%20Caps.otf' rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <!--=== Other CSS files ===-->
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/jquery.vegas.css" />
    <link rel="stylesheet" href="css/baraja.css" />
    <link rel="stylesheet" href="css/jquery.bxslider.css" />
    <!--=== Main Stylesheets ===-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <!--=== Color Scheme, three colors are available red.css, orange.css and gray.css ===-->
    <link rel="stylesheet" id="scheme-source" href="css/schemes/red.css" />
    
    
    <link rel="stylesheet" href="css/contact-buttons.css">
    <link rel="stylesheet" href="css/style-workshop.css">
    
    <style>
    .block-body {
    margin-top: 60px;
}


#workshop-title {

}

#workshop-title > h3 {
    
color: black;
}

.pre-well-come {
    position: relative;
    font-size: 48px !important;
    margin-top: 100px;
    color: #fff !important;
    text-transform: uppercase;
}


    #header {
        background-image: url(../images/1.jpg);
        height: 300px;
    }


.recent-work {
    width: 100%;
    padding-bottom: 27%;
    background: #C3C9CC;
    display: table;
    text-align: center;
    vertical-align: middle;
    padding-top: 27%;
    background-size: 120%;
    background-repeat: no-repeat;
    background-position: center;
    position: relative;
    margin-bottom: 30px;
    font-size: 20px;
    
}

.recent-work span {
    margin-top: -18px;
    opacity: 0;
    position: relative;
    z-index: 1;
    border: 1px;
    border-style: solid;
    border-color: black;
    border-radius: 0px;
}

.recent-work:before {
    background: rgba(2, 56, 58, 0.7);
    height: 100%;
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
    content: '';
    opacity: 0;
    -o-transition: all .5s;
    -ms-transition: all .5s;
    -moz-transition: all .5s;
    -webkit-transition: all .5s;
    transition: all .5s;
}

.recent-work:hover {
    background-size: 200%;
    background-position: center;
}

.recent-work:hover:before,
.recent-work:hover span {
    opacity: 1;
}

    </style>
    
    <!--=== Internet explorer fix ===-->
    <!-- [if lt IE 9]>
		<script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif] -->
</head>

<body>
    <!--=== Preloader section starts ===-->
    <section id="preloader">
        <div class="loading-circle fa-spin"></div>
    </section>
    
    
    
    <!--=== Preloader section Ends ===-->
    <!--=== Header section Starts ===-->
    <div id="header" class="header-section">
        <!--== Header Video Starts ===-->
   
    <div class="sticky-bar-wrap">
            <div class="sticky-section">
                <div id="topbar-hold" class="nav-hold container">
                    <nav class="navbar" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            <!--=== Site Name ===-->
                            <!--                            // Change it with logo icon-->
                            <!--                                                            <img src="images/ICES.png" height="50px;" />-->
                            <a class="site-name navbar-brand" href="#"> <img alt="Brand" src="images/ICES%20white%20png.png" width="120px"> </a>
                        </div>
                        <!-- Main Navigation menu Starts -->
                        <div class="collapse navbar-collapse navbar-responsive-collapse">
                                  <ul class="nav navbar-nav navbar-right">
                                <li class="current"><a href="#header">Home</a></li>
                                <li><a href="#">Conference</a></li>

<!--                                <li><a href="#">Knu Competition</a></li> -->
                                <li><a href="#">MUN</a></li>
                         
                                <li><a href="#">Workshops</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Model Exhibition</a></li>
                                <li><a href="#">Blog </a></li>
                                <li><a href="#" id="register-nav">Register</a></li>
                                <li><a href="#" id="sign-in-nav">Sign-in</a></li>
                            </ul>
                        </div>
                        <!-- Main Navigation menu ends-->
                    </nav>
                </div>
            </div>
        </div>
        <!-- sticky-bar Ends-->
        <!--=== Header section Ends ===-->
        <!--=== Home Section Starts ===-->
     <div id="section-home" class="home-section-wrap center">
    <div class="section-overlay"></div>
    <div class="container home">
        <div class="row" id="workshop-title">
            <br>
            <br>
           <div class="col-md-4 col-md-offset-4">
                       <center>      <h1 class="pre-well-come">Workshops</h1>

               </center>
                        
            </div>
                        
         </div>
    </div>
</div>
        <!--=== Home Section Ends ===-->
    </div>
        <!--=== Header section Ends ===-->
  <div class="content-block" id="events">
        <div class="container">
            <header class="block-heading cleafix"> <a href="events.html" class="btn btn-o btn-lg pull-right">View All</a>
       
            </header>
            <section class="block-body">
                <div class="row">
                    <div class="col-sm-4" id="events1">
                        <a href="#" class="recent-work" style="background-image:url('images/1.jpg')"> <span class="btn btn-o-white">Event 1</span> </a>
                    </div>
                    <div class="col-sm-4" id="events2">
                        <a href="#" class="recent-work" style="background-image:url(assets/images/event2.jpg)"> <span class="btn btn-o-white">Event 2</span> </a>
                    </div>
                    <div class="col-sm-4" id="events3">
                        <a href="#" class="recent-work" style="background-image:url(assets/images/event3.jpg)"> <span class="btn btn-o-white">Event 3</span> </a>
                    </div>
                </div>
                
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-2" id="events1">
                        <a href="#" class="recent-work" style="background-image:url(assets/images/event1.jpg)"> <span class="btn btn-o-white">Event 1</span> </a>
                    </div>
                    <div class="col-sm-4" id="events2">
                        <a href="#" class="recent-work" style="background-image:url(assets/images/event2.jpg)"> <span class="btn btn-o-white">Event 2</span> </a>
                    </div>
               
                    </div>
                </div>
            </section>
        </div>
    </div>
       
      
       <!--=== Footer section Starts ===-->
    <div id="section-footer" class="footer-wrap">
        <div class="container footer center">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="footer-title"><!-- Footer Title -->
						<a class="site-name" href="#"><span>A</span>SCE</a>
					</h4>
                    <!-- Social Links -->
                    <div class="social-icons">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-wikipedia-w"></i></a></li>
                        </ul>
                    </div>
                    <p class="copyright">Shuabhm Arora, All rights reserved &copy; 2016</p>
                </div>
            </div>
        </div>
    </div>
    <!--=== Footer section Ends ===-->
    <!--==== Js files ====-->
    <!--==== Essential files ====-->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="js/modernizr.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <!--==== Slider and Card style plugin ====-->
    <script type="text/javascript" src="js/jquery.baraja.js"></script>
    <script type="text/javascript" src="js/jquery.vegas.min.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
    <!--==== MailChimp Widget plugin ====-->
    <script type="text/javascript" src="js/jquery.ajaxchimp.min.js"></script>
    <!--==== Scroll and navigation plugins ====-->
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/jquery.appear.js"></script>
    <script type="text/javascript" src="js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="js/jquery.contact-buttons.js"></script>

    <!--==== Custom Script files ====-->
    <script type="text/javascript" src="js/custom.js"></script>
    <script>
        $(function () {
            $("#includedContent").load("b.html");
        });
    $.contactButtons({
  effect  : 'slide-on-scroll',
  buttons : {
    'facebook':   { class: 'facebook', use: true, link: 'https://www.facebook.com/pages/mycompany', extras: 'target="_blank"' },
    'linkedin':   { class: 'linkedin', use: true, link: 'https://www.linkedin.com/company/mycompany' },
    'google':     { class: 'gplus',    use: true, link: 'https://plus.google.com/myidongoogle' },
    'mybutton':   { class: 'git',      use: true, link: 'http://github.com', icon: 'github', title: 'My title for the button' },
    'phone':      { class: 'phone separated',    use: true, link: '+000' },
    'email':      { class: 'email',    use: true, link: 'test@web.com' }
  }
});
    </script>
    

    
</body>

</html>
