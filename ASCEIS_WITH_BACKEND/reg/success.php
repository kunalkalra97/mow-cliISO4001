<?php
  session_start();
  $msg;
  if(isset($_SESSION['login_r']))
  {
    $msg="aa";
 
  }
  else
  {
    header("location:index.php");
  }

  include("../connection.php");
  $tot_reg=0;
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/jquery_latest.js"></script>
    <script src='js/modal.js'></script>


    <title>Registrations | ASCE-ICES</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  
    <!-- Fixed navbar -->
   <?php
         include("head_menu.php");
         ?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="well">
      <div class="col-md-7" style="float:none; margin:0px auto;">
          <center><h4>This data has been added sucessfully.</h4></center>
        <center><a href='add_dd.php'><h2>Enter new DD details</h2></a></center>
        <div class="clearfix"></div>
      </div>
<div>
  
</div>
    </div> <!-- /container -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Select the events for which DD has been received</h4>
      </div>
      <div class="modal-body">
        <form id="dummy" method="POST" action="save_bill.php">
  
</form>
  <div style="margin-bottom:9px;" >
 
 <div style="float:left; margin-bottom:6px"> 
</div>
<div class="clr"></div>
  <div id="table_cart_d" style="min-height:200px;">

<div id="prob">  
<center>
<img src="images/loader.gif">
 </center> </div>
  </div>


  </div>


      </div>
      <div class="modal-footer">
        <button type="button" id="save_changes" class="btn btn-success" >Save now</button>
        <button type="button"  class="btn btn-danger" id="cancel">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
    

   
  </body>
</html>
