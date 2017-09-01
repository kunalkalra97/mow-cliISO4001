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
    <meta name="author" content="Bhasanth Lakkaraj">
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
      <div class="col-md-10" style="float:none; margin:0px auto;">
       
        <center>
        <h3>DD Details<h3/>
    
      </center>

    <table class="table table-striped table-hover">
        <tr><th>
            Sr. 
        </th>
        <th>
          Receipt num
        </th>
        <th>
          DD no.
        </th>
        <th>
          DD amount
        </th>
        <th>
          paid Amount
        </th>
        <th>
          DD Branch
        </th>
        <th>
          DD Place
        </th>

        <th>
          Contigent No.
        </th>
        <th>
          Accomodation
        </th>

        </tr>
        <?php
        $sql="SELECT * FROM bank_dd ORDER BY receipt_num ASC";
        $res=mysqli_query($con,$sql);
        $count=0;
        if($res)
        {
            $i=0;
          while($row=mysqli_fetch_array($res))
          {
          echo "
            <tr>
              <td>".++$i."</td>
              <td>".$row['receipt_num']."</td>
              <td>".$row['dd_num']."</td>
              <td>".$row['dd_amount']."</td>
              <td>".$row['paid_amount']."</td>
              <td>".$row['dd_branch']."</td>
              <td>".$row['dd_place']."</td>
              <td>";
              $yy=$row['u_id'];
              $yy=str_pad($yy, 4,"0",STR_PAD_LEFT);
              echo "ICES".$yy."</td>
              <td>".$row['accom']."</td>
            </tr>
          ";
          $count++;
        }
        }
        else
        {
          echo mysqli_error($con);
        }
        echo "<tr>
        <td>
        	Total DDs:
        </td>
        <td>
        	 ".$count."
        </td>
        </tr>";
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
      $(".check_all").addClass("active");
    })
    </script>
  </body>
</html>
