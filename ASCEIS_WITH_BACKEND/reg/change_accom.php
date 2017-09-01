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
    <meta name="author" content="Bhasanth Lakkaraj">
    <script src="js/jquery_latest.js"></script>
    <script src='js/modal.js'></script>


    <title>Registrations | ASCE-ICES</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/bootstrap-timepicker.css" media="screen" title="no title" charset="utf-8">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/bootstrap-timepicker.js"></script>
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
      <div class="col-md-6" style="float:none; margin:0px auto;">
          <center><h4> Extension and Modification</h4></center><hr>
        <form id="change_accom" method="POST">

            <div class="form-group">
                <label for="contingent">Enter contingent number OR scan barcode</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    ICES
                  </div>
                  <input type="text" placeholder="2613" name="contingent" id="contingent" class="form-control" required autofocus>
                </div>
            </div>
            <center><button type="submit" id="get_accom" class="btn btn-success" onsubmit="getAccom()">View</button></center>
        </form>
        <div class="clearfix"></div>
        </div>
        <div style="float:none; margin:0px auto;" class="col-md-12">
        <table style="margin: 0 auto; margin-top: 20px; display: none" class="table" id="accom-details">
          <caption class="text-info" style="text-align: left; font-size: 16px; font-weight: bold;">Current  details for ICES<span id="table-heading-contingent"></span></caption>
          <thead>
            <tr>
              <th>
                Name
              </th>
              <th>
                Contingent
              </th>
              <th>
                Accommodation For
              </th>
              <th>
                Days
              </th>
              <th>
                Accommodation Type
              </th>
              <th>
                In Date
              </th>
              <th>
                In Time
              </th>
              <th>
                Out Date
              </th>
              <th>
                Out Time
              </th>
              <th>
                Paid
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td id="name"></td>
              <td id="contingentNum"></td>
              <td id="accommodation-for"></td>
              <td id="days"></td>
              <td id="accommodation-type"></td>
              <td id="in-date"></td>
              <td id="in-time"></td>
              <td id="out-date"></td>
              <td id="out-time"></td>
              <td id="paid"></td>
            </tr>
          </tbody>
        </table>
        </div>
        <div class="col-md-12" style="margin-top: 40px;display:none" id="edit-accommodation">
        <h3 class="text-info" style="font-size: 16px; font-weight: bold;">Enter new accommodation details</h3>

        <form id="reg_new_accom" action="reg_new_accom.php" method="POST">
        <div class='col-md-5' style="float:left">
          <h4 class='classic-title'>Check In</h4>

          <h6>Date</h6>
          <div class='input-group' style='width:100%'>
            <select id='checkin_date' name='checkin_date' class='form-control'>
              <option value='9'>9th March</option>
              <option value='10'>10th March</option>
              <option value='11'>11th March</option>
              <option value='12'>12th March</option>
              <option value='13'>13th March</option>
              <option value='14'>14th March</option>
            </select>
          <span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>
          </div>

          <br>

          <h6>Time</h6>
          <div class='input-group bootstrap-timepicker timepicker' style='width:100%'>
              <input name='checkin_time' id='checkin_time' type='text' class='form-control input-small' required>
              <span class='input-group-addon'><i class='glyphicon glyphicon-time'></i></span>
          </div>
        </div>

        <div class='col-md-5' style="float:right">
          <h4 class='classic-title'>Check Out</h4>

          <h6>Date</h6>
          <div class='input-group' style='width:100%'>
          <select id='checkout_date' class='form-control' name='checkout_date'>
            <option value='9'>9th March</option>
            <option value='10'>10th March</option>
            <option value='11'>11th March</option>
            <option value='12'>12th March</option>
            <option value='13'>13th March</option>
            <option value='14'>14th March</option>
          </select>
          <span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>
          </div>

          <br>

          <h6>Time</h6>
          <div class='input-group bootstrap-timepicker timepicker' style='width:100%'>
              <input name='checkout_time' id='checkout_time' type='text' class='form-control input-small'>
              <span class='input-group-addon'><i class='glyphicon glyphicon-time'></i></span>
          </div>
          <p id='dorm-checkout-para' class='text-warning' style='font-weight: bold; display: none; margin-bottom: 0'>NOTE - Check out time for the dormitory is 10PM</p>
        </div>

        <br>
        <div class='col-md-12' style='margin-top:40px;'>
          <h4 class='classic-title'>Accommodation type</h4>
            <select name='accom_type' id='acctype' class='form-control'>
              <option value='2AC'>Double Bedded AC (single occupancy) - Rs 3000/day/person (24 hour basis)</option>
              <option value='2ACsh'>Double Bedded AC (shared) - Rs 1500/day/person (24 hour basis)</option>
              <option value='4ACsh'>Four Bedded AC (shared) - Rs 800(W) or 750(C)/day/person (24 hour basis)</option>
              <option value='dorm'>Dormitory - Rs 500(W) or 300(C)/day/person (daily basis)</option>
            </select>
        </div>

        <div class="clearfix"></div>

        <center>
          <button id='calculate_accommodation' type='button' class='btn btn-info btn-sm' style='margin-top:10px; clear:both'>Calculate cost</button>
          <button id='register_accommodation' type='button' class='btn btn-success btn-sm' style='margin-top:10px' name='accom_for'>Register</button>
        </center>
        <p id='to-pay' class='text-info' style='font-weight: bold; margin-top: 20px'></p>
        <input type="hidden" name="old_accom" id="old_accom">
        <input type="hidden" name="contingent" id="accom_contingent">
        </form>
        <br><br>
        <div class='alert alert-info' style='margin-top: 20px; font-weight: bold; font-style: 20px; display: none'>

        </div>
        <br><br>
    </div>


</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->

    <script type="text/javascript" src="js/url.min.js"></script>

    <script>

    $(document).ready(function(){
      $(".change_accom").addClass("active");
      $("#accom-details").hide();
      $("#edit-accommodation").hide();

      var accommodationUpdatedStatus = url('?status');


      if(accommodationUpdatedStatus == 1) {
        var contingent = url('?contingent');
        alert('SUCCESS - Accommodation successfully updated! \n\nYou will now be redirected to the payment page.');
        window.location.href = "star.php?contingent=" + contingent;
      }

      else if(accommodationUpdatedStatus == 2) {
        alert('ERROR - Accommodation was not updated.');
        window.location.href = url('path');
      }

    });

    var accomPaid, contingent, accomFor;

    $("#change_accom").submit(function(e) {
      e.preventDefault();
      $.ajax({
        method: "POST",
        url: "get_accom.php",
        data: {
                contingent: $("#contingent").val()
              },
        success: function(data) {
          data = JSON.parse(data);
          $("#name").text(data.name);
          $("#contingent").text(data.contingent);
          $("#contingentNum").text(data.contingent);
          $("#table-heading-contingent").text(data.contingent);
          contingent = data.contingent;
          $("#accommodation-for").text(data.accom_for);
          accomFor = data.accom_for;
          $("#days").text(data.day_count);
          $("#accommodation-type").text(data.accom_type);
          $("#in-date").text(data.in_date + "th March");
          $("#in-time").text(data.in_time);
          $("#out-date").text(data.out_date + "th March");
          $("#out-time").text(data.out_time);
          $("#paid").text(data.accommodation_paid);
          accomPaid = data.accommodation_paid;
          $("#accom-details").show();

          $("#contingent").blur();

          $("#checkin_date").val(data.in_date);
          $("#checkin_time").val(data.in_time);
          $("#checkout_date").val(data.out_date);
          $("#checkout_time").val(data.out_time);
          $("#edit-accommodation").show();
        }
      });
    });


    $("#register_accommodation").click(function() {

      $("#old_accom").val(accomPaid);
      $("#accom_contingent").val(contingent);
      if(accomFor == "Conference")
        $("#register_accommodation").val("con_accom");
      else
        $("#register_accommodation").val("work_accom");

      if(confirm("Are you sure you want to modify the accommodation?")) {
        $("#reg_new_accom").submit();
      }
    });


    $('#calculate_accommodation').click(function() {
  		$.ajax({
  			method: "POST",
  			url: "../accom_calc.php",
  			data: {
          accom_for: accomFor == "Conference"? "con_accom": "work_accom",
		      checkin_date: $('#checkin_date').val(),
  			  checkin_time: $('#checkin_time').val(),
  			  checkout_date: $('#checkout_date').val(),
  			  checkout_time: $('#checkout_time').val(),
  			  accom_type: $('#acctype').val()
  		  },
  		  success: function(data) {
          if(accomPaid == "Not Paid" || accomPaid == 0)
            accomPaid = 0;
  			  $('#to-pay').text("Balance Amount : Rs. " + (JSON.parse(data).total - accomPaid));
  			  $('#to-pay').show();
  		  }
  	  });
    });
    </script>

    <script type='text/javascript'>
  			$('#checkin_time').timepicker();
  			$('#checkout_time').timepicker();
  	</script>
  </body>
</html>
