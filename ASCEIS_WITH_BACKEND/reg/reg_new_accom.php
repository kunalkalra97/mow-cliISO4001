<?php
// ini_set('display_startup_errors',1);
// ini_set('display_errors',1);
// error_reporting(-1);
  session_start();

  include("../connection.php");
  date_default_timezone_set("Asia/Kolkata");

  //accomodation for either workshops or conference
  $accom_for = $_POST['accom_for'];

  //check in date
  $in_date = $_POST['checkin_date'];

  //check in time received in 12hour format
  $in_time = $_POST['checkin_time'];

  //convert check in time to 24hour format
  $in_time = date("H:i", strtotime($in_time));


  //check out date
  $out_date = $_POST['checkout_date'];

  //check out time received in 12hour format
  $out_time = $_POST['checkout_time'];

  //convert check out time to 24hour format
  $out_time = date("H:i", strtotime($out_time));

  //accomodation type
  $accom_type = $_POST['accom_type'];


  /* Calculation for accomodation
  * There are two types of calculations - one for dorm and the other for the other room types
  */

  $day_count = 0;

  $full_in_datetime= "2016-03-".$in_date." ".$in_time;
  $full_in_datetime= strtotime($full_in_datetime);

  //$now is a variable that keeps track of the 'current' time
  $now = $full_in_datetime;

  $full_out_datetime = "2016-03-".$out_date." ".$out_time;
  $full_out_datetime = strtotime($full_out_datetime);

  //time_pool is the hour difference
  $time_pool = ($full_out_datetime - $full_in_datetime);

  //dorm payment is on daily basis
  if($accom_type == "dorm") {
    //crazy calculation goes here


    //random logic that works :
    //keep a counter of the number of days
    //if the counter is 0 and the 'clock' strikes 12PM, increment counter to 1
    //if the counter is more than 0, then whenever the 'clock' strikes 1AM, increment the counter by 1

    //the checkout time is 10PM for dorms, but there's a 3 hour buffer. which is why we're taking 1AM as the breakpoint

    /*implementation logic
    *step 1 - calculate number of hours between check in and check out
    *step 2 - use this as a 'pool' of time
    *step 3 - perform the following step until the time pool reaches 0 hours
    *step 4 - from the check in time, keep adding up to the breakpoints 12PM (for day_count = 0) and 1AM
    */

    //eg. 2016-03-09 12:00
    $breakpoint_12PM = "2016-03-".$in_date." 12:00";
    $breakpoint_12PM = strtotime($breakpoint_12PM);

    $breakpoint_1AM = "2016-03-".$in_date." 01:00";
    $breakpoint_1AM = strtotime($breakpoint_1AM);

    //if the clock strikes 12PM after check in
    //in other words, if there is enough time in the time pool to reach 12PM

    //ASSUME that user has checked in between 1AM and 12PM on some day
    //then, $time_till_next_breakpoint is the amount of time between check in time and 12PM
    //if $time_till_next_breakpoint is NEGATIVE for this breakpoint (12PM), it means the user has checked in AFTER 12PM
    $time_till_next_breakpoint = $breakpoint_12PM - $now;

    //if we are closer to today's 1AM than 12PM (i.e user has checked in between 12AM and 1AM on some day)
    //then, $time_till_next_breakpoint is the amount of time between check in time and 1AM
    if(($time_till_next_breakpoint/3600 >= 11)) {
      $time_till_next_breakpoint = $breakpoint_1AM - $now;
    }

    $current_date = $in_date;

    while($time_pool > 0) {

      //in this condition, we reach the next breakpoint (either 12PM or 1AM) and add a billing day
      if($time_till_next_breakpoint >= 0 && ($time_pool - $time_till_next_breakpoint) >= 0) {
        $day_count++;

        //reduce time from time pool and add it to 'current' time
        $time_pool -= $time_till_next_breakpoint;

        //it is $now 12PM or 1AM
        $now += $time_till_next_breakpoint;

        //set next breakpoint - tomorrow 1AM
        $current_date++;
        $breakpoint_1AM = "2016-03-".$current_date." 01:00";
        $breakpoint_1AM = strtotime($breakpoint_1AM);

        $time_till_next_breakpoint = $breakpoint_1AM - $now;
      }

      //in this condition, the user has booked a room for such a short duration that he cannot reach the nearest breakpoint and make a billing day
      //OR the $time_pool is almost empty
      else if (($time_pool - $time_till_next_breakpoint) < 0) {
        $time_pool = 0;
      }

      //if the user has booked AFTER 12PM (i.e. our initial assumption was wrong)
      //then we take the next day's 1AM as the nearest breakpoint
      else if($time_till_next_breakpoint < 0) {
        $current_date++;
        $breakpoint_1AM = "2016-03-".$current_date." 01:00";
        $breakpoint_1AM = strtotime($breakpoint_1AM);

        $time_till_next_breakpoint = $breakpoint_1AM - $now;
      }

    }

    // if($day_count == 0)
      // echo "You need to register on spot for this duration.";
    // else
      // echo "You are staying in the dorm for ".$day_count." day(s).";

  }

  /*other rooms are paid on 24 hour basis
  * - you can stay for 24 hours after you arrive + a 3 hour buffer time
  */
  else {
    $time_pool /= 3600;

    if ($time_pool < 27)
      $day_count = 1;

    else {

      $extra_day = 0;
      if(fmod($time_pool, 24) > 3)
        $extra_day = 1;

      $day_count = floor($time_pool/24) + $extra_day;
    }

    // echo "You are staying in ".$accom_type." for ".$day_count." day(s).";
  }

  if($accom_for == "con_accom")
    $prices = array('2AC' => 3000, '2ACsh' => 1500, '4ACsh' => 750, 'dorm' => 300);
  else if($accom_for == "work_accom")
    $prices = array('2AC' => 3000, '2ACsh' => 1500, '4ACsh' => 800, 'dorm' => 500);

  if($day_count == 0)
    $day_count = 1;

  $accomodation_type_fullnames = array('2AC' => '2 Bedded AC', '2ACsh' => '2 Bedded AC shared', '4ACsh' => '4 Bedded AC shared', 'dorm' => 'Dormitory');
  $total = $day_count * $prices[$accom_type];
  $full_in_datetime = date("d F, Y - g:iA", $full_in_datetime);
  $full_out_datetime = date("d F, Y - g:iA", $full_out_datetime);
  $results = array('day_count' => $day_count, 'accom_type' => $accomodation_type_fullnames[$accom_type], 'full_in_datetime' => $full_in_datetime, 'full_out_datetime' => $full_out_datetime, 'total' => $total);



  $_POST['old_accom'] = ($_POST['old_accom'] == "Not Paid")? 0 : $_POST['old_accom'];

  $sqlUpdate = "UPDATE register SET accom_update = 't', old_accom=".$_POST['old_accom'].", accom='$day_count', acctype='$accom_type', in_date=$in_date, in_time='$in_time', out_date=$out_date, out_time='$out_time' WHERE id='".$_POST['contingent']."'";
  $resUpdate = mysqli_query($con, $sqlUpdate);
  // echo $sqlUpdate;

  // echo $resUpdate;

  if($resUpdate) {
    $status = 1;
  }
  else {
    $status = 2;
  }

  header("location: change_accom.php?status=".$status."&contingent=".$_POST['contingent']);

?>
