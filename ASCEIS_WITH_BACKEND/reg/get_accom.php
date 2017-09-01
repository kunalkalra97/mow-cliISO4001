<?php

  include("../connection.php");

  $_POST['contingent'] = preg_replace("/\s/", "", $_POST['contingent']);

  if(strlen($_POST['contingent']) > 4) {
    $sqlBarcode = "SELECT id FROM register WHERE barcode = '".$_POST['contingent']."'";
    $resBarcode = mysqli_query($con, $sqlBarcode);
    $rowBarcode = mysqli_fetch_array($resBarcode);
    $contingent = $rowBarcode['id'];
  }
  else
    $contingent = $_POST['contingent'];


  $totalPaid = 0;
  $totalBalance = 0;
  $unpaidCount = 0;

  $sql = "SELECT name, lname, accom, acctype, accom_pay, in_date, in_time, out_date, out_time from register where id='".$contingent."'";
  $res = mysqli_query($con,$sql);
  $accom = mysqli_fetch_array($res);
  $day_count = $accom['accom'];

  $accommodationPrices = array('2AC' => 3000, '2ACsh' => 1500);
  $accommodationPaid = "Not Paid";
  $accommodation_type_fullnames = array('2AC' => '2 Bedded AC', '2ACsh' => '2 Bedded AC shared', '4ACsh' => '4 Bedded AC shared', 'dorm' => 'Dormitory');

  //check type of accommodation registered for - conference(c)/workshop(w)/none(n)
  $accomFor = 'None';

  //registered for accommodation
  // if($day_count != 0) {


      $sql1 = "SELECT u_id FROM con_reg WHERE u_id='".$contingent."'";
      $res1 = mysqli_query($con, $sql1);
      if(mysqli_num_rows($res1) > 0) {
        $accomFor = "Conference";
        $accommodationPrices['4ACsh'] = 750;
        $accommodationPrices['dorm'] = 300;
      }
      else {
        $accomFor = "Workshops/Events";
        $accommodationPrices['4ACsh'] = 800;
        $accommodationPrices['dorm'] = 500;
      }

      //check payment status
      if($accom['accom_pay'] == 't') {
        $accommodationPaid = $day_count * $accommodationPrices[$accom['acctype']];
        $totalPaid += $accommodationPaid;
      }
      else {
        $accommodationPaid = "Not Paid";
        $balanceList[$unpaidCount] = "Accomodation for ".$accommodation_type_fullnames[$accom['acctype']];
        $balanceAmounts[$unpaidCount] = $day_count * $accommodationPrices[$accom['acctype']];
        $totalBalance += $balanceAmounts[$unpaidCount];
        $unpaidCount++;
      }
  // }

  $accomType = $accom['acctype'];

  $name = $accom['name']." ".$accom['lname'];

  $accomDetails = array('name' => ucwords(strtolower($name)),
                        'contingent' => $contingent,
                        'accom_for' => $accomFor,
                        'day_count' => $day_count,
                        'accom_type' => $accommodation_type_fullnames[$accomType],
                        'in_date' => $accom['in_date'],
                        'in_time' => $accom['in_time'],
                        'out_date' => $accom['out_date'],
                        'out_time' => $accom['out_time'],
                        'accommodation_paid' => $accommodationPaid
                      );

  echo(json_encode($accomDetails));

?>
