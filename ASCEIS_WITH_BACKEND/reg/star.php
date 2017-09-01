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
    <meta name="author" content="Abhijit Kashyap">
    <script src="js/jquery_latest.js"></script>
    <script src='js/modal.js'></script>


    <title>Registrations | ASCE-ICES</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <style media="screen">
      #person-in-charge:focus:invalid {
        border: 2px solid red;
      }

      #person-in-charge:valid {
        border: 2px solid green;
      }

    </style>

    <script type="text/javascript" src="../js/bootstrap.js"></script>
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
          <center><h4>All participant details</h4></center><hr>
        <form id="get-star" method="POST">

            <div class="form-group">
                <label for="contingent">Enter contingent number OR scan barcode</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    ICES
                  </div>
                  <input type="text" placeholder="2613" name="contingent" id="contingent" class="form-control" required autofocus>
                </div>
            </div>
            <center><button type="submit" id="get_accom" class="btn btn-success">View</button>
                    <button type="button" id="new_participant" class="btn btn-info" style="display:none">Register a new smart card for this participant</button>
                    <button type="button" class="btn btn-warning" id="soft-refresh">Refresh</button>
            </center>
        </form>

        <form id="new_barcode_form" method="POST" style="margin-top: 40px;" onsubmit="verifyContingent()" action="new_barcode.php">

            <div class="form-group">
                <label for="contingent">Register new participant (enter contingent number in the above box)</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    Barcode
                  </div>
                  <input type="text" placeholder="Scan ID card" name="barcode" id="new_barcode" class="form-control" required>
                  <input type="hidden" name="contingent" required id="hidden-contingent">
                </div>
            </div>
            <center><button type="submit" id="new_barcode_submit" class="btn btn-info">Register Barcode</button></center>
        </form>

        <div class="clearfix"></div>
        </div>
        <div style="float:none; margin:0px auto;" class="col-md-12">
        <table style="margin: 0 auto; margin-top: 20px; display: none" class="table hide-me" id="general-details">
          <caption class="text-info" style="text-align: left; font-size: 16px; font-weight: bold; margin-bottom: 20px;">General details for ICES<span class="table-heading-contingent"></span></caption>
          <thead>
            <tr>
              <th>
                Name
              </th>
              <th>
                Contingent
              </th>
              <th>
                Type
              </th>
              <th>
                Phone
              </th>
              <th>
                Email
              </th>
              <th>
                College
              </th>
              <th>
                Barcode
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td id="name"></td>
              <td id="contingentNum"></td>
              <td id="type"></td>
              <td id="phone"></td>
              <td id="email"></td>
              <td id="college"></td>
              <td id="barcode"></td>
            </tr>
          </tbody>
        </table>

        <table style="margin: 0 auto; margin-top: 20px; display: none" class="table hide-me" id="accom-details">
          <caption class="text-info" style="text-align: left; font-size: 16px; font-weight: bold; margin-bottom: 20px;">Accommodation details</caption>
          <thead>
            <tr>
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
                  Paid Status
                </th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td id="accomodation-for"></td>
              <td id="days"></td>
              <td id="accomodation-type"></td>
              <td id="in-date"></td>
              <td id="in-time"></td>
              <td id="out-date"></td>
              <td id="out-time"></td>
              <td id="accomodation-paid-status"></td>
            </tr>
          </tbody>

        </table>

        <table style="margin: 0 auto; margin-top: 20px; display: none" class="table hide-me" id="conference-details">
          <caption class="text-info" style="text-align: left; font-size: 16px; font-weight: bold; margin-bottom: 20px;">Conference details</caption>
          <thead>
            <tr>
                <th>
                  Conference Type
                </th>
                <th>
                  Paid Status
                </th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td id="conference-type"></td>
              <td id="conference-paid"></td>
            </tr>
          </tbody>

        </table>

        <table style="margin: 0 auto; margin-top: 20px; display: none" class="table hide-me" id="workshop-details">
          <caption class="text-info" style="text-align: left; font-size: 16px; font-weight: bold; margin-bottom: 20px;">Workshop details</caption>
          <thead>
            <tr>
                <th>
                  Workshop Name
                </th>
                <th>
                  Paid Status
                </th>
            </tr>
          </thead>

          <tbody>
            <!-- dynamic -->
          </tbody>

        </table>

        <table style="margin: 0 auto; margin-top: 20px; display: none" class="table hide-me" id="event-details">
          <caption class="text-info" style="text-align: left; font-size: 16px; font-weight: bold; margin-bottom: 20px;">Event details</caption>
          <thead>
            <tr>
                <th>
                  Event Name
                </th>
                <th>
                  Paid Status
                </th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>Green Ideation</td>
              <td id="event-paid"></td>
            </tr>
          </tbody>

        </table>

        <table style="margin: 0 auto; margin-top: 20px; display: none" class="table hide-me" id="shirt-details">
          <caption class="text-info" style="text-align: left; font-size: 16px; font-weight: bold; margin-bottom: 20px;">Tshirt details</caption>
          <thead>
            <tr>
                <th>
                  Tshirt
                </th>
                <th>
                  Paid Status
                </th>
                <th>
                  Update Size
                </th>
            </tr>
          </thead>

          <tbody>
            <!-- dynamic -->
          </tbody>

        </table>

        <table style="margin: 0 auto; margin-top: 20px; display: none" class="table hide-me" id="balance-details">
          <caption class="text-danger" style="text-align: left; font-size: 16px; font-weight: bold; margin-bottom: 20px;">Dues</caption>
          <thead>
            <tr>
                <th>
                  Name of Unpaid Event
                </th>
                <th>
                  Amount to be Paid
                </th>
            </tr>
          </thead>

          <tbody>

          </tbody>

        </table>

        <p id="total-paid" class="text-success hide-me" style="font-weight: bold; display: none"></p>

        <div class="row">
          <div class="col-md-6">
            <form action="print_receipt.php" method="post">
              <input type="hidden" name="data" id="data-for-print">
              <button type="submit" class="btn btn-success hide-me" id="print-receipt" style="display:none;">Print Receipt</button>
            </form>
          </div>
          <div class="col-md-6">
            <form id="spot-payment" method="post" action="spot_payment.php" class="form-inline hide-me" style="display:none">
                        <input type="hidden" name="amount" id="payment-amount">
                        <input type="hidden" name="balanceList" id="balance-list">
                        <input type="hidden" name="data" id="all-data">
                        <input type="text" placeholder="Person in charge" id="person-in-charge" name="in_charge" class="hide-me form-control" style="display:none; width: 50%" required pattern="[a-zA-Z\s]*" maxlength="25">
                        <!-- <a href="add_dd.php" type="button" class="btn btn-warning hide-me pay-now" name="pay_by" value="dd" style="display:none;">DD</a> -->
                        <button type="submit" class="btn btn-success hide-me pay-now" name="pay_by" value="dd" style="display:none;">DD</button>
                        <button type="submit" class="btn btn-info hide-me pay-now" name="pay_by" value="cash" style="display:none;">Cash</button>
                        <!-- <button type="submit" class="btn btn-danger hide-me pay-now" name="pay_by" value="pos" style="display:none;">POS</button> -->
                        <input type="text" placeholder="Receipt Number/Transaction ID" id="trans-receipt" name="pay_id" class="hide-me form-control" style="display:none; width: 50%" required>
            </form>
          </div>
        </div>
        </div>
    </div>


</div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->

  <script type="text/javascript" src="js/url.min.js"></script>
    <script>

    $(document).ready(function(){
      $(".star").addClass("active");
      $("#general-details").hide();

      var contingent = url('?contingent');
      if(contingent) {
        $("#contingent").val(contingent);
      }

      var newBarcodeRegisteredStatus = url('?status');

      if(newBarcodeRegisteredStatus == 1) {
        alert('Success - New barcode registered!');
        window.location.href = url('path');
      }

      else if(newBarcodeRegisteredStatus == 2) {
        alert('Error - This participant has already been assigned a smart card.');
        window.location.href = url('path');
      }

      else if(newBarcodeRegisteredStatus == 3) {
        alert('Error - This smart card has already been assigned to someone else.');
        window.location.href = url('path');
      }

      $("#trans-receipt").val("");
    });

    $("#get-star").submit(function(e) {
      e.preventDefault();
      $(".hide-me").hide();
      $(".remove-me").remove();

      $.ajax({
        method: "POST",
        url: "get_star.php",
        data: {
                contingent: $("#contingent").val()
              },
        success: function(data) {
          // alert(data);
          $("#new_barcode_form").hide();
          $("#new_participant").show();
          $("#contingent").blur();

          data = JSON.parse(data);


          /*general details*/
          $("#name").text(data.name);

          $("#contingent").text(data.contingent);
          $("#contingentNum").text(data.contingent);
          $(".table-heading-contingent").text(data.contingent);

          $("#type").text(data.type);
          $("#phone").text(data.phone);
          $("#email").text(data.email);
          $("#college").text(data.college);
          $("#barcode").text(data.barcode);

          $("#general-details").show();

          /*accomodation details*/
          if(data.registeredForAccomodation) {
            $("#accomodation-for").text(data.accom_for);
            $("#days").text(data.day_count);
            $("#accomodation-type").text(data.accom_type);
            $("#in-date").text(data.in_date + "th March");
            $("#in-time").text(data.in_time);
            $("#out-date").text(data.out_date + "th March");
            $("#out-time").text(data.out_time);
            $("#accomodation-paid-status").text(data.accomodationPaid);

            $("#accom-details").show();
          }
          else
            $("<p class='text-info hide-me' style='font-size: 16px; font-weight: bold; margin: 20px 0;'>Not registered for accomodation</p>").insertAfter("#general-details");

          /*conference details*/
          if(data.registeredForConference) {
            $("#conference-type").text(data.conferenceType);
            $("#conference-paid").text(data.conferencePaid);
            $("#conference-details").show();
          }
          else
            $("<p class='text-info hide-me' style='font-size: 16px; font-weight: bold; margin: 20px 0;'>Not registered for conference</p>").insertAfter("#accom-details");

          /*workshop details*/
          if(data.registeredForWorkshop) {
            for (var i = 0; i < data.workshopList.length; i++) {
              var cell1 = "<td class='remove-me'>" + data.workshopList[i] + "</td>";
              var cell2 = "<td class='remove-me'>" + data.workshopsPaid[i] + "</td>";
              $("#workshop-details tbody").append("<tr class='remove-me'>" + cell1 + cell2 + "</tr>");
            }
            $("#workshop-details").show();
          }
          else
            $("<p class='text-info hide-me' style='font-size: 16px; font-weight: bold; margin: 20px 0;'>Not registered for any workshops</p>").insertAfter("#conference-details");

          /*event details*/
          if(data.registeredForEvent) {
            $("#event-paid").text(data.eventPaid);
            $("#event-details").show();
          }
          else
            $("<p class='text-info hide-me' style='font-size: 16px; font-weight: bold; margin: 20px 0;'>Not registered for event</p>").insertAfter("#workshop-details");

          /*shirt details*/
          if(data.registeredForShirt) {

            var cell3 = "<td class='remove-me'>" + data.shirt + "</td>";
            var cell4 = "<td class='remove-me'>" + data.shirtPaid + "</td>";
            var cell5 = "<td class='remove-me'><input class='updateshirtsize btn btn-sm btn-danger' style='margin-right:5px;' type='button' value='m'><input class='updateshirtsize btn btn-sm btn-danger' style='margin-right:5px;' type='button' value='l'><input class='updateshirtsize btn btn-sm btn-danger' style='margin-right:5px;' type='button' value='xl'><input class='updateshirtsize btn btn-sm btn-danger' style='margin-right:5px;' type='button' value='xxl'></td>";

            $("#shirt-details tbody").append("<tr class='remove-me'>" + cell3 + cell4 + cell5 + "</tr>");
            $("#shirt-details").show();

            $(".updateshirtsize").click(function() {
                $.ajax({
                  method: "POST",
                  url: "update_t_size.php",
                  data: {
                    contingent: $("#contingent").val(),
                    size: $(this)[0].value
                  },
                  success: function(data) {
                    if(data == 1) {
                      alert("Success");
                      window.location.href = "star.php?contingent=" + $("#contingent").val();
                    }
                    else {
                      alert("Failed. Please try again later.");
                    }
                  }
                });
            });
          }
          else
            $("<p class='text-info hide-me' style='font-size: 16px; font-weight: bold; margin: 20px 0;'>Not registered for tshirt</p>").insertAfter("#event-details");

          /*balance details*/
          if(data.totalBalance > 0) {
            for (var i = 0; i < data.balanceList.length; i++) {
              var cell1 = "<td class='remove-me'>" + data.balanceList[i] + "</td>";
              var cell2 = "<td class='remove-me'>" + data.balanceAmounts[i] + "</td>";
              $("#balance-details tbody").append("<tr class='remove-me'>" + cell1 + cell2 + "</tr>");
            }
            $("#balance-details tbody").append("<tr class='remove-me'><td class='remove-me'></td><td class='remove-me text-danger' style='font-weight: bold'>Total : " + data.totalBalance + "</td></tr>");
            $("#balance-details").show();
            $("#payment-amount").val(data.totalBalance);
            $("#balance-list").val(data.balanceList);
            $("#all-data").val(JSON.stringify(data));
            $("#spot-payment").show();
            $("#person-in-charge").show();
          }
          else
            $("<p class='text-success hide-me' style='font-size: 16px; font-weight: bold; margin: 20px 0;'>No dues to be paid</p>").insertAfter("#shirt-details");

          $("#total-paid").text("Total paid : " + data.totalPaid);
          $("#total-paid").show();
          $(".pay-now").show();
          $(".pay-now").click(function() {
            $("#trans-receipt").show();
          });

          if(data.totalPaid > 0) {
            $("#data-for-print").val(JSON.stringify(data));


            $("#print-receipt").show();
          }

        }

      });
    });

    function verifyContingent() {
      if(confirm("Is this contingent number - " + $("#contingent").val() + " - correct?")) {
        $("#hidden-contingent").val($("#contingent").val());
        return true;
      }
      else
        return false;
    }



    $("#new_participant").click(function() {
      //hide a lot of tables
      //show the new barcode form
      //keep the contingent number in place (in the first form)

      $("table").hide();
      $(".hide-me").hide();
      $("#new_barcode_form").show();
      $("#get-star").show();
      $("#new_barcode").focus();

    });

    $("#soft-refresh").click(function() {
      $("table").hide();
      $(".hide-me").hide();
      $("#new_barcode_form").show();
      $("#get-star").show();
      $("#contingent").focus();
      $("#contingent").val("");
      $("#trans-receipt").val("");
      window.location.href = "star.php";
    });

    </script>
  </body>
</html>
