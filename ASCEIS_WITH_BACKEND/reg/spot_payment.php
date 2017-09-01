<?php

// ini_set('display_startup_errors',1);
// ini_set('display_errors',1);
// error_reporting(-1);

      /*this script is the spot payment equivalent of ../con_pay_ret.php
      *It should remove events from the user's cart and set the dd or ol attribute in the *_reg tables to true
      *Currently, there is no way to mark an item as paid by cash - I may need to add a cash attribute to the *_reg tables
      *and while I'm at it, I might as well add an ol attribute to wor_reg.
      *this will affect the following files -
      *get_star.php
      *...and many more
      */

      /*
      *Any other way around this?
      *I could add another attribute value under dd, like 'c' for cash - but that's stupid code
      *and it's still gonna break code.
      *The real question is - why is this website so bad?
      *think!
      *
      *add another table?
      *so the *_cart tables will be cleared. The *_reg tables' dd or ol attributes will be set to true.
      *A new table will exist just to store events registered by a person that were paid by cash.
      *Benefit - Probably no code breaks - I'm adding a new layer
      *this is sort of costly though. But who cares
      *table structure - id, u_id, event - no need for boolean cash attribute - this is a cash table.
      *Everyone in this table will have paid by cash.
      *People who want to pay by POS and cash can gtfo.
      */

      /*also I assume that everything is being paid for at once. no half business*/

      include("../connection.php");

      $data = json_decode($_POST['data']);
      $balanceList = explode(",", $_POST['balanceList']);

      //mark as paid
      /*Workshops*/
    if($_POST['pay_by'] == "cash") {
      if($data->registeredForWorkshop) {
        if($_POST['pay_by'] == "cash")
          $sqlPayWorkshops = "UPDATE wor_reg SET ol='t' WHERE u_id='".$data->contingent."'";
        else if($_POST['pay_by'] == "dd")
          $sqlPayWorkshops = "UPDATE wor_reg SET dd='t' WHERE u_id='".$data->contingent."'";

        $resPayWorkshops = mysqli_query($con, $sqlPayWorkshops);

        $sqlUnCartifyWorkshops = "DELETE FROM work_cart WHERE u_id='".$data->contingent."'";
        $resUnCartifyWorkshops = mysqli_query($con, $sqlUnCartifyWorkshops);
      }


      /*Conference*/
      if($data->registeredForConference) {
        if($_POST['pay_by'] == "cash")
          $sqlPayConference = "UPDATE con_reg SET ol='t' WHERE u_id='".$data->contingent."'";
        else if($_POST['pay_by'] == "dd")
          $sqlPayConference = "UPDATE con_reg SET dd='t' WHERE u_id='".$data->contingent."'";

        $resPayConference = mysqli_query($con, $sqlPayConference);

        $sqlUnCartifyConference = "DELETE FROM con_cart WHERE u_id='".$data->contingent."'";
        $resUnCartifyConference = mysqli_query($con, $sqlUnCartifyConference);
      }

      /*Events*/
      if($data->registeredForEvent) {
        if($_POST['pay_by'] == "cash")
          $sqlPayEvent = "UPDATE eve_reg SET ol='t' WHERE u_id='".$data->contingent."'";
        else if($_POST['pay_by'] == "dd")
          $sqlPayEvent = "UPDATE eve_reg SET dd='t' WHERE u_id='".$data->contingent."'";

        $resPayEvent = mysqli_query($con, $sqlPayEvent);

        $sqlUnCartifyEvent = "DELETE FROM work_cart WHERE u_id='".$data->contingent."'";
        $resUnCartifyEvent = mysqli_query($con, $sqlUnCartifyEvent);
      }

      /*Tshirts*/
      if($data->registeredForShirt) {
        $sqlPayShirt = "UPDATE tshirt SET paid = 't' WHERE u_id='".$data->contingent."'";
        $resPayShirt = mysqli_query($con, $sqlPayShirt);
      }

      /*Accommodation*/
      $sqlCheckAccom = "SELECT accom_pay, accom_update, old_accom FROM register WHERE id='".$data->contingent."'";
      $resCheckAccom = mysqli_query($con, $sqlCheckAccom);
      $rowCheckAccom = mysqli_fetch_array($resCheckAccom);

      if($rowCheckAccom['accom_update'] == 't') {
        $sqlPayAccom = "UPDATE register SET accom_update = 'f', old_accom = 0 WHERE id='".$data->contingent."'";
        $resPayAccom = mysqli_query($con, $sqlPayAccom);
      }

      if($rowCheckAccom['accom_pay'] == 'f') {
        $sqlPayAccom2 = "UPDATE register SET accom_pay = 't' WHERE id='".$data->contingent."'";
        $resPayAccom2 = mysqli_query($con, $sqlPayAccom2);
      }
    }

      // log payment info
      if($_POST['pay_by'] == "cash") {
        for($i = 0; $i < count($balanceList); ++$i) {
          $sqlCash = "INSERT INTO cash_pay(u_id, cash_for, receipt_num) VALUES('$data->contingent', '".$balanceList[$i]."', '".$_POST['pay_id']."')";
          $resCash = mysqli_query($con, $sqlCash);
        }
      }

      else if($_POST['pay_by'] == "pos") {
        for($i = 0; $i < count($balanceList); ++$i) {
          $sqlPos = "INSERT INTO pos_pay(u_id, pos_for, transaction_id) VALUES('$data->contingent', '".$balanceList[$i]."', '".$_POST['pay_id']."')";
          $resPos = mysqli_query($con, $sqlPos);
        }
      }

      else if($_POST['pay_by'] == "dd") {
        for($i = 0; $i < count($balanceList); ++$i) {
          $sqlDD = "INSERT INTO dd_pay(u_id, dd_for, dd_num) VALUES('$data->contingent', '".$balanceList[$i]."', '".$_POST['pay_id']."')";
          $resDD = mysqli_query($con, $sqlDD);
        }
      }

      $sqlLogTransaction = "INSERT INTO spot_payment(u_id, paid_by, in_charge) VALUES('$data->contingent', '".$_POST['pay_by']."', '".$_POST['in_charge']."')";
      $resLogTransaction = mysqli_query($con, $sqlLogTransaction);


      if($_POST['pay_by'] == "dd") {
        header("location: add_dd.php");
      }
      else {
        header("location: star.php?contingent=".$data->contingent);
      }


?>
