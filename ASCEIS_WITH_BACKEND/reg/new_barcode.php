<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

  $contingent = $_POST['contingent'];
  $barcode = $_POST['barcode'];

  include("../connection.php");

  $sqlParticipantBarcode = "SELECT barcode FROM register WHERE id='".$contingent."'";
  $resParticipantBarcode = mysqli_query($con, $sqlParticipantBarcode);
  $rowParticipantBarcode = mysqli_fetch_array($resParticipantBarcode);

  $sqlBarcodeAlreadyUsed = "SELECT id FROM register WHERE barcode='".$barcode."'";
  $resBarcodeAlreadyUsed = mysqli_query($con, $sqlBarcodeAlreadyUsed);

  if($rowParticipantBarcode['barcode'] != null) {
    $status = 2;
  }

  else if(mysqli_num_rows($resBarcodeAlreadyUsed) > 0) {
    $status = 3;
  }

  else if($rowParticipantBarcode['barcode'] == null) {
    $sql = "UPDATE register SET barcode='".$barcode."' WHERE id='".$contingent."'";
    $res = mysqli_query($con, $sql);
    $status = 1;
  }

  /* Status Codes
  3 - Error - This barcode number is already assigned to someone - can't assign it to anyone else

  1 - Success - New barcode has been assigned to this contingent number
  2 - Error - This participant already has a barcode number - can't give him a new one
  */

  header("location: star.php?status=".$status);

?>
