<!-- sticky-bar Starts-->
        <div class="sticky-bar-wrap">
            <div class="sticky-section">
                <div id="topbar-hold" class="nav-hold container">
                    <nav class="navbar" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            <!--=== Site Name ===-->
                            <!--                            // Change it with logo icon-->
                            <!--                                                            <img src="images/ICES.png" height="50px;" />-->
                            <a class="site-name navbar-brand" href="index.php"> <img alt="Brand" src="images/ICES%20white%20png.png" width="120px"> </a>
                        </div>
                        <!-- Main Navigation menu Starts -->
                        <div class="collapse navbar-collapse navbar-responsive-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="current"><a href="index.php">Home</a></li>
                                <li><a href="conference.php">Conference</a></li>
<!--                                <li><a onClick="alert('Comming Soon...')" href="#modal">Workshops</a></li>-->
                               <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Workshops<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="Advanced%20Concrete%20Technology.php">Advanced Concrete Technology</a></li>
                                        <li><a href="Advances%20in%20Transportation%20Engineering.php">Advances in Transportation Engineering</a></li>
                                        <li><a href="AECOism%20Builder%20Designer.php">AECOism Builder Designer</a></li>
                                        <li><a href="Foundation%20Analysis.php">Advance Foundation Analysis</a></li>
                                        <li><a href="Geospatial%20Technology.php">Geospatial Technology</a></li>
                                        <li><a href="Green%20Building%20Design.php">Green Building Design</a></li>
                                        <li><a href="STAAD%20PRO.php">STAAD.PRO</a></li>
                                    </ul>
                                </li>
                                <li><a href="NAPS-SID.php">NAPS-SID</a></li>

                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events<span class="caret"></span></a>
                                     <ul class="dropdown-menu">
                                         <li><a href="CADathon.php">CADathon</a></li>
                                         <li>
                                            <li><a href="Green%20Cube.php">Green Cube</a></li>
                                         <li>
                                           <li>
                                            <li><a href="Roll%20It.php">Roll It</a></li>
                                         <li>
                                     </ul>
                                 </li>
                                <!-- <li><a href="/blog">Blog </a></li> -->
                               <!-- <li><a href="register.php" id="register-nav">Register</a></li> -->

                            <?php
                                if(!isset($_SESSION['login'])) {
                                    echo '<li><a href="login_now.php" id="sign-in-nav">Sign-in/Register</a></li>';
                                }

                                else {
                                    echo '<li><a href="log_out.php" id="sign-in-nav">Logout</a></li>';
                                }

                            ?>

                            <?php
                            ?>

                            </ul>
                        </div>
                        <!-- Main Navigation menu ends-->
                    </nav>
                </div>
            </div>
        </div>
        <!-- sticky-bar Ends-->
        <!--=== Header section Ends ===-->
