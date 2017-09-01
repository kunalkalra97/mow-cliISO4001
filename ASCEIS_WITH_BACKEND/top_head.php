<div class="top-bar">
				<div class="container">
					<div id="login_inp">
                        <div class="col-md-8" style="float:none; margin-right:auto; margin-left:auto;"> 
                           <form method="POST" action="check_login.php" on>
                            <div class="col-md-4">
                                Login: <input type="text" class="form-control" id="login" name="login" placeholder="Enter login" required>
                                
                               
                            </div>
                            <div class="col-md-4">
                                Password:<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>

                            
                            </div>
                             <div class="col-md-3" style="margin-top:21px">

                            <input class="from-control btn-success" type="submit" value="Login" >

                            </div>   
                            <div class="clearfix"></div>
                            <div class="col-md-4">
                                <div style="margin:5px 0px 0px 0px">
                                <a href="register.php" style="text-decoration:underline">
                                Register now
                                </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin:5px 0px 0px 0px">
                            <a style="text-decoration:underline" href="under_cons.php">Forgot password?</a>
                            </div>
                            </div>
                            <div class="clearfix"></div>
                            </form>
                        </div>
                        
                    </div>
                   
                    <div class="row">
                    <?php
                   if(isset($_SESSION['login']))
                   {
                 
                 echo "  <style type='text/css'>
                        ul.social-list li a:hover {
                            color: black;
                            }
                    </style>";
                }
                   
                    ?>
                    <div class="clearfix"></div>
						<div class="col-md-6">
                            <!-- Start Contact Info -->
							
                            <!-- End Contact Info -->
						</div>
						
                        <div class="col-md-6">
                            <!-- Start Social Links -->
							 <ul class="social-list">
                            

                             <?php
                             if(isset($_SESSION['login']))
                             
                         {
                            echo "<li class='drop_12'>

                                <div>
                                <a class='login_aft  '  style='color:white'data-placement='bottom' title='' href='#' data-original-title='Click for optons'>
                                     Welcome ".$_SESSION['name']."
                                </a>

                                <div class='drop_menu '   style='position:absolute; background-color:white'>
                               <div class='drop_it'>
                               <a href='reg_desk.php'>Registration Desk</a> 
                               </div>
                               <div class='drop_it'>
                               <a href='change_pass.php'>Change password</a>
                               </div>
                               <div class='drop_it'>
                               <a href='log_out.php'>Log out</a>
                               </div>
                                                              
                             </div>
                                </div>";

                                echo "
                             </li>";
                             

                            
                         }
                             ?>

                            </ul>
                            <!-- End Social Links -->
						</div>
					</div>
				</div>
			</div>
            <div>
                
            </div>
            
            <script>
            $(document).ready(function(){
             $(".drop_12").hover(function(){
                $(".drop_menu").fadeIn();
             },function(){
                $(".drop_menu").fadeOut();
             })
               

            })
            </script>
            <script>
        $(document).ready(function(){
          $(".login_head").click(function(e)
          {
            $("#login_inp").slideToggle();
            $("#login").focus();
          });  
          $("#login_inp").click(function()
          {

          });
        })
    </script>