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
      <div class="">
      <div class="col-md-7 well" style="float:none; margin:0px auto;">
          <div style="float:left" class="col-md-10">
          <input type="text" class="form-control" placeholder="Enter contigent no to get details" autofocus>
          </div>
          <div class="left">
            <button  class="btn-md btn-info">Search</button>
          </div>
      </div>
        <div class="clearfix"></div>
      </div>
<div>
  asd
</div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    

    <script>
    $(document).ready(function(){
      $(".search_cont").addClass("active");
    })
    </script>
  </body>
</html>
