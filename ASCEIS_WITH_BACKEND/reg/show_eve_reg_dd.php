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
  $e_id=$_POST['eve_id'];

  $eve=explode(";", $e_id);
  $id;
  $e_ty;
  if(sizeof($eve)==2)
  {
    $id=$eve[0];
    $e_ty=$eve[1];
  }
/*
echo $id."<br>";

echo $e_ty;
*/
if($id!="20" && $id!="30")
{
  $e_name;
  if($e_ty=="eve")
  {
    $sql="SELeCT eve_desc from events where id=".$id." ";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    $e_name=$row['eve_desc'];

  }
  else if($e_ty=="wor")
  {
    $sql="SELeCT wor_desc from workshops where id=".$id." ";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    $e_name=$row['wor_desc'];

  }
  }
  else if($e_ty=="uce")
  {
    $e_name="UCES";

  }
  else if($e_ty=="con")
  {
    $e_name="Conference";
  }
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
      <div class="col-md-12" style="float:none; margin:0px auto;">
        <?php
        if($id!="20" && $id!="30")
        {
          $sql="SELECT * from ".$e_ty."_reg as e_r inner join register as rg on e_r.u_id=rg.id where ".$e_ty."_id=".$id." and (dd='t' || ol='t')";

          $res=mysqli_query($con,$sql);
          $count=mysqli_num_rows($res);
          echo "<b>Total registrations is for <span style='color:#F16261;'>$e_name: $count</b></span>";
         if($res)
         {
          echo "<table class='table table-striped table-hover'>
          <tr>  <th>Sr.
          </th>
          <th>Contingentnent
          </th>
          <th>Name
          </th>
          <th>Email
          </th>
          <th>College
          </th>
          <th>Reg no.
          </th>
          <th>Contact
          </th>
          <th>Type
          </th>
          </tr>
          ";
          $i=0;

          while ($row=mysqli_fetch_array($res)) {
              echo "<tr>
                  <td>
                    ".++$i."
                  </td>";
                  $cont=str_pad($row['id'],4,"0", STR_PAD_LEFT);
                  echo "
                  <td>
                    ICES".$cont."
                  </td>
                  <td>
                    ".$row['name']."      ".$row['lname']."
                  </td>
                  <td>
                    ".$row['email']."
                  </td>
                  <td>
                    ".$row['college']."
                  </td>
                  <td>
                    ".$row['reg_no']."
                  </td>
                  <td>
                    ".$row['contact']."
                  </td>";
                  $tt;
                  if($row['type']=="rs")
                  {
                    $tt="Research";
                  }
                  else if($row['type'] == "st") {
                    $tt = "Student";
                  }
                  else if($row['type'] == "in") {
                    $tt = "Industrial";
                  }
                  else{
                    $tt="Faculty";
                  }

                  echo "

                  <td>
                    ".$tt."
                  </td>
              </tr>";


              }
              echo "</table>";
          }

        }
        else if($e_ty=="con"){
	$sql="SELECT * from ".$e_ty."_reg as e_r inner join register as rg on e_r.u_id=rg.id WHERE (dd='t' OR ol='t') ";

          $res=mysqli_query($con,$sql);
          $count=mysqli_num_rows($res);
          echo "<b>Total registrations for <span style='color:#F16261;'>$e_name: $count</b></span>";
         if($res)
         {
          echo "<table class='table table-striped table-hover'>
          <tr>  <th>Sr.
          </th>
          <th>Contingent
          </th>
          <th>Fname
          </th>
          <th>Lname
          </th>
          <th>College
          </th>
          <th>Reg no.
          </th>
          <th>Contact
          </th>
          <th>Paid By
          </th>
          <th>Type
          </th>
          </tr>
          ";
          $i=0;

          while ($row=mysqli_fetch_array($res)) {
              echo "<tr>
                  <td>
                    ".++$i."
                  </td>";
                  $cont=str_pad($row['id'],4,"0", STR_PAD_LEFT);
                  $paidBy = ($row['dd'] == 't')? "DD" : "Online";
                  echo "
                  <td>
                    ICES".$cont."
                  </td>
                  <td>
                    ".$row['name']."
                  </td>
                  <td>
                    ".$row['lname']."
                  </td>
                  <td>
                    ".$row['college']."
                  </td>
                  <td>
                    ".$row['reg_no']."
                  </td>
                  <td>
                    ".$row['contact']."
                  </td>
                  <td>
                    ".$paidBy."
                  </td>";
                  $tt;
                  if($row['type']=="rs")
                  {
                    $tt="Research";
                  }
                  else if($row['type'] == "st") {
                    $tt = "Student";
                  }
                  else if($row['type'] == "in") {
                    $tt = "Industrial";
                  }
                  else{
                    $tt="Faculty";
                  }

                  echo "

                  <td>
                    ".$tt."
                  </td>
              </tr>";


              }


              echo "</table>";
		}
        }


        else if($e_ty=="uce"){

	$sql="SELECT * from ".$e_ty."_reg as e_r inner join register as rg on e_r.u_id=rg.id where dd='t' ";

          $res=mysqli_query($con,$sql);
          $count=mysqli_num_rows($res);
          echo "<b>Total registrations is for <span style='color:#F16261;'>$e_name: $count</b></span>";
         if($res)
         {
          echo "<table class='table table-striped table-hover'>
          <tr>  <th>Sr.
          </th>
          <th>Contingent
          </th>
          <th>Fname
          </th>
          <th>Lname
          </th>
          <th>College
          </th>
          <th>Reg no.
          </th>
          <th>Contact
          </th>
          <th>Type
          </th>
          </tr>
          ";
          $i=0;

          while ($row=mysqli_fetch_array($res)) {
              echo "<tr>
                  <td>
                    ".++$i."
                  </td>";
                  $cont=str_pad($row['id'],4,"0", STR_PAD_LEFT);
                  echo "
                  <td>
                    ICES".$cont."
                  </td>
                  <td>
                    ".$row['name']."
                  </td>
                  <td>
                    ".$row['lname']."
                  </td>
                  <td>
                    ".$row['college']."
                  </td>
                  <td>
                    ".$row['reg_no']."
                  </td>
                  <td>
                    ".$row['contact']."
                  </td>";
                  $tt;
                  if($row['type']=="rs")
                  {
                    $tt="Research";
                  }
                  else if($row['type'] == "st") {
                    $tt = "Student";
                  }
                  else if($row['type'] == "in") {
                    $tt = "Industrial";
                  }
                  else{
                    $tt="Faculty";
                  }

                  echo "

                  <td>
                    ".$tt."
                  </td>
              </tr>";


              }


              echo "</table>";
}
//===========================================================


        }
        ?>

      </div>
        <div class="clearfix"></div>
      </div>

    </div> <!-- /container -->
 <script>
    $(document).ready(function(){
      $(".check_all_dd").addClass("active");
    })
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
