<?php
  session_start();
  $msg;
  if(isset($_SESSION['login_r']))
  {
    //$msg="aa";
    //header("location:log_index.php");
 
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
      <div class="well">
      <div class="col-md-7" style="float:none; margin:0px auto;">
        <center>Select the events, for details</center>
        <form method="POST" action="show_eve_reg.php">
        <select class="form-control" name="eve_id">
        <option disabled style="color:red; font-size:26px"><h2>Select event</h2></option>
            <?php
            $sql="Select * from events";
            $res=mysqli_query($con,$sql);
            $i=0;
            while ( $row=mysqli_fetch_array($res)) {
                echo "<option value='".$row['id'].";eve'>".$row['eve_desc']."</option>";
            }

            ?>
            <option disabled style="color:red; font-size:26px"><h2>Select Workshops</h2></option>
            <?php
            $sql="Select * from workshops";
            $res=mysqli_query($con,$sql);
            $i=0;
            while ( $row=mysqli_fetch_array($res)) {
                echo "<option value='".$row['id'].";wor'>".$row['wor_desc']."</option>";
            }
            ?>
                        
                  <option disabled style="color:red; font-size:26px;"><h2>Select UCES</h2></option>
                  <option value="20;uce">United Civil Engineering Summit</option>
                  
                  <option disabled style="color:red; font-size:26px;"><h2>Select Conference</h2></option>
                  <option value="30;con">International Conference on Sustainable Energy and Built Environment</option>
        </select>
        <center>
        <button type="submit" class="btn btn-info" style="margin:10px;">Check Registrations</button>
    </form>
      </center>

      <table class="table table-striped table-hover">
        <tr>
          <th colspan="2" style="text-align:center">Events</th>
        </tr>
            <?php
            $i=1;
            while ($i<4) {
              
              $sql="SELECT eve_desc from events where id='$i'";
              $res=mysqli_query($con,$sql);
              $row=mysqli_fetch_array($res);
              $nn=$row['eve_desc'];

              $sql="SELECT * from eve_reg where eve_id='".$i++."' ";
              $res=mysqli_query($con,$sql);
              $c=mysqli_num_rows($res);
               echo " <tr>
              <td>".$nn."</td>
          <td>".$c."</td>
               </tr>";
               $tot_reg+=$c;
            }
           

               ?>
               <tr>
                 <th colspan="2" style="text-align:center">Workshops</th>
               </tr>
                <?php
            $i=1;
            while ($i<15) {
              
              $sql="SELECT wor_desc from workshops where id='$i'";
              $res=mysqli_query($con,$sql);
              $row=mysqli_fetch_array($res);
              $nn=$row['wor_desc'];

              $sql="SELECT * from wor_reg where wor_id='".$i++."' ";
              $res=mysqli_query($con,$sql);
              $c=mysqli_num_rows($res);
               echo " <tr>
              <td>".$nn."</td>
          <td>".$c."</td>
               </tr>";
               $tot_reg+=$c;
            }
           

               ?>
               
                
               <tr>
               <th colspan="2" style="text-align:center">
                 UCES
               </th>
               </tr>
                <?php
            $i=1;
           

              $sql="SELECT * from uce_reg ";
              $res=mysqli_query($con,$sql);
              $c=mysqli_num_rows($res);
               echo " <tr>
              <td>UCES</td>
          <td>".$c."</td>
               </tr>";
 
               $tot_reg+=$c;
               ?>
               
               <tr>
               <th colspan="2" style="text-align:center">
                 Conference
               </th>
               </tr>
                <?php
            $i=1;
           

              $sql="SELECT * from con_reg ";
              $res=mysqli_query($con,$sql);
              $c=mysqli_num_rows($res);
               echo " <tr>
              <td>Conference</td>
          <td>".$c."</td>
               </tr>";
 
               $tot_reg+=$c;
                 echo "<b>Total registrations: ".$tot_reg."</b>";
               ?>

      </table>

      </div>
        <div class="clearfix"></div>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    

    <script>
    $(document).ready(function(){
      $(".log_in").addClass("active");
    })
    </script>
  </body>
</html>