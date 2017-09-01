<?php
  // ini_set('display_startup_errors',1);
  // ini_set('display_errors',1);
  // error_reporting(-1);

  session_start();


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

  //initializing some variables - counters and such
  $totalPaid = 0;
  $totalBalance = 0;
  $unpaidCount = 0;

  //get everything from the register table
  $sql = "SELECT * from register where id='".$contingent."'";
  $res = mysqli_query($con,$sql);

  //this row has almost all info about a participant
  $starRow = mysqli_fetch_array($res);

  /*Get All Accomodation Details ------------------------------------------------------------- */
  $day_count = $starRow['accom'];

  $accomodationPrices = array('2AC' => 3000, '2ACsh' => 1500);
  $accomodation_type_fullnames = array('2AC' => '2 Bedded AC', '2ACsh' => '2 Bedded AC shared', '4ACsh' => '4 Bedded AC shared', 'dorm' => 'Dormitory');

  //check type of accomodation registered for - conference(c)/workshop(w)/none(n)
  $accomFor = 'None';

  $registeredForAccomodation = false;
  //registered for accomodation
  if($day_count != 0) {
      $registeredForAccomodation = true;

      $sql1 = "SELECT u_id FROM wor_reg WHERE u_id='".$contingent."'";
      $res1 = mysqli_query($con, $sql1);

      $sql1_1 = "SELECT u_id FROM eve_reg WHERE u_id='".$contingent."'";
      $res1_1 = mysqli_query($con, $sql1_1);

      $sql1_2 = "SELECT u_id FROM con_reg WHERE u_id='".$contingent."'";
      $res1_2 = mysqli_query($con, $sql1_2);

      if(mysqli_num_rows($res1_2) > 0) {
        $accomFor = "Conference";
        $accomodationPrices['4ACsh'] = 750;
        $accomodationPrices['dorm'] = 300;
      }

      else { //(mysqli_num_rows($res1) > 0 || mysqli_num_rows($res1_1) > 0) {
        $accomFor = "Workshops/Events";
        $accomodationPrices['4ACsh'] = 800;
        $accomodationPrices['dorm'] = 500;
      }


      //check payment status
      $oldAccommodationAmount = $starRow['old_accom'];
      $newAccommodationAmount = $day_count * $accomodationPrices[$starRow['acctype']];

      if($starRow['accom_update'] == 't' && ($newAccommodationAmount > $oldAccommodationAmount)) {
        $accomodationPaid = $oldAccommodationAmount;
        // $balanceList[$unpaidCount] = "Accomodation Modified";
        $balanceList[$unpaidCount] = $accomodation_type_fullnames[$starRow['acctype']];
        $balanceAmounts[$unpaidCount] = ($newAccommodationAmount - $oldAccommodationAmount);
        $totalBalance += $balanceAmounts[$unpaidCount];
        $unpaidCount++;
      }
      //if new < old, refund to be given?
      else if($starRow['accom_pay'] == 't') {
        $accomodationPaid = $day_count * $accomodationPrices[$starRow['acctype']];
        $totalPaid += $accomodationPaid;
      }
      else {
        $accomodationPaid = "Not Paid";
        $balanceList[$unpaidCount] = $accomodation_type_fullnames[$starRow['acctype']];
        $balanceAmounts[$unpaidCount] = $day_count * $accomodationPrices[$starRow['acctype']];
        $totalBalance += $balanceAmounts[$unpaidCount];
        $unpaidCount++;
      }
  }

  //this is needed later - when returning values to star.php
  $accomType = $starRow['acctype'];


  /*Get All Registration Details - Conference, Workshops and Events ------------------------------------------------------------- */
  /*CONFERENCE*/


  $conferencePrices = array(
                          'Delegate' => array(
                                              'st' => 6500,
                                              'rs' => 6500,
                                              'ac' => 8000,
                                              'in' => 10000
                                            ),

                          'Accompanying Delegate' => array(
                                              'st' => 2000,
                                              'rs' => 2000,
                                              'ac' => 2500,
                                              'in' => 2500
                                            ),

                          'Poster Presentation' => array(
                                              'st' => 2500,
                                              'rs' => 2500,
                                              'ac' => 3000,
                                              'in' => 3500
                                            )
                      );

  $sql2 = "SELECT * FROM con_reg WHERE u_id='".$contingent."'";
  $res2 = mysqli_query($con, $sql2);

  $registeredForConference = false;

  if(mysqli_num_rows($res2) > 0) {
    $registeredForConference = true;
    $row2 = mysqli_fetch_array($res2);

    //check what type of participant - delegate, accompanying delegate, poster
    switch ($row2['accompany']) {
      case 'f':
        $conferenceType = "Delegate";
        break;

      case 't':
        $conferenceType = "Accompanying Delegate";
        break;

      case 'p':
        $conferenceType = "Poster Presentation";
        break;
    }


    //check payment status
    if($row2['ol'] == 't' || $row2['dd'] == 't') {
      $conferencePaid = $conferencePrices[$conferenceType][$starRow['type']];
      $totalPaid += $conferencePaid;
    }
    else {
      $conferencePaid = "Not Paid";
      $balanceList[$unpaidCount] = $conferenceType;
      $balanceAmounts[$unpaidCount] = $conferencePrices[$conferenceType][$starRow['type']];
      $totalBalance += $balanceAmounts[$unpaidCount];
      $unpaidCount++;
    }


  }

  /*WORKSHOPS*/

  //inital stuff - getting workshop names and prices from DB
  $sql4 = "SELECT id, wor_desc, ac FROM workshops";
  $res4 = mysqli_query($con, $sql4);
  while($row4 = mysqli_fetch_array($res4)) {
    $workshopNames[$row4['id']] = $row4['wor_desc'];
    $workshopPrices[$row4['id']] = $row4['ac'];
  }

  //getting list of workshops participant has registered for
  $sql3 = "SELECT * FROM wor_reg WHERE u_id='".$contingent."'";
  $res3 = mysqli_query($con, $sql3);

  $registeredForWorkshop = false;

  //if the participant has registered for at least one workshop
  if(mysqli_num_rows($res3) > 0) {
    $registeredForWorkshop = true;

    $count = 0;
    //for every registered workshop, check whether it has been paid for or not
    while($row3 = mysqli_fetch_array($res3)) {

      if($row3['dd'] == 't' || $row3['ol'] == 't') {
        $workshopsPaid[$count] = $workshopPrices[$row3['wor_id']];
        $totalPaid += $workshopsPaid[$count];
      }
      else {
        $workshopsPaid[$count] = "Not Paid";
        $balanceList[$unpaidCount] = $workshopNames[$row3['wor_id']];
        $balanceAmounts[$unpaidCount] = $workshopPrices[$row3['wor_id']];
        $totalBalance += $balanceAmounts[$unpaidCount];
        $unpaidCount++;
      }

      $workshopList[$count++] = $workshopNames[$row3['wor_id']];
    }



  }


  /*EVENTS*/
  $sql5 = "SELECT * FROM eve_reg WHERE u_id='".$contingent."'";
  $res5 = mysqli_query($con, $sql5);

  $registeredForEvent = false;
  if(mysqli_num_rows($res5) > 0) {
    $registeredForEvent = true;
    $row5 = mysqli_fetch_array($res5);

    //check payment status
    if($row5['dd'] == 't' || $row5['ol'] == 't') {
      //only one event - green ideation
      $eventPaid = 600;
      $totalPaid += $eventPaid;
    }

    else {
      $eventPaid = "Not Paid";
      $balanceList[$unpaidCount] = "Green Ideation";
      $balanceAmounts[$unpaidCount] = 600;
      $totalBalance += $balanceAmounts[$unpaidCount];
      $unpaidCount++;
    }
  }

  $sql6 = "SELECT * FROM tshirt WHERE u_id='".$contingent."'";
  $res6 = mysqli_query($con, $sql6);

  $registeredForShirt = false;
  if(mysqli_num_rows($res6) > 0) {
    $registeredForShirt = true;
    $row6 = mysqli_fetch_array($res6);

    $size = strtoupper($row6['n_size']);

    if($row6['paid'] == 't') {
      $shirtPaid = 350;
      $totalPaid += $shirtPaid;
    }

    else {
      $shirtPaid = "Not Paid";
      $balanceList[$unpaidCount] = "Navy blue tshirt ($size)";
      $balanceAmounts[$unpaidCount] = 350;
      $totalBalance += $balanceAmounts[$unpaidCount];
      $unpaidCount++;
    }

    $shirt = "Navy blue tshirt ($size)";
  }

  $name = $starRow['name']." ".$starRow['lname'];

  $participantTypes = array(
    'st' => "Student",
    'rs' => "Research Student",
    'ac' => "Academecian",
    'in' => "Industrialist"
  );

  $star = array( /*general details*/
                'name' => ucwords(strtolower($name)), //convert the name to title case
                'contingent' => $contingent,
                'type' => $participantTypes[$starRow['type']],
                'phone' => $starRow['contact'],
                'email' => $starRow['email'],
                'college' => ucwords(strtolower($starRow['college'])),
                'barcode' => $starRow['barcode'],

                /*accomodation details*/
                'registeredForAccomodation' => $registeredForAccomodation,
                'accom_for' => $accomFor,
                'day_count' => $day_count,
                'accom_type' => $accomodation_type_fullnames[$accomType],
                'in_date' => $starRow['in_date'],
                'in_time' => $starRow['in_time'],
                'out_date' => $starRow['out_date'],
                'out_time' => $starRow['out_time'],
                'accomodationPaid' => $accomodationPaid,

                /*conference details*/
                'registeredForConference' => $registeredForConference,
                'conferenceType' => $conferenceType,
                'conferencePaid' => $conferencePaid,

                /*workshop details*/
                'registeredForWorkshop' => $registeredForWorkshop,
                'workshopsPaid' => $workshopsPaid,
                'workshopList' => $workshopList,

                /*event details*/
                'registeredForEvent' => $registeredForEvent,
                'eventPaid' => $eventPaid,

                /*tshirt details*/
                'registeredForShirt' => $registeredForShirt,
                'shirtPaid' => $shirtPaid,
                'shirt' => $shirt,

                /*payment details*/
                'balanceList' => $balanceList,
                'balanceAmounts' => $balanceAmounts,
                'totalBalance' => $totalBalance,
                'totalPaid' => $totalPaid



              );

  echo(json_encode($star));

?>
