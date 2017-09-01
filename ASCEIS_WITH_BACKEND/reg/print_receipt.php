<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Receipt</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen, print" charset="utf-8">

    <style>
      #participant-details {
        text-align : center;
      }

      #total {
        font-weight: bold;
      }
    </style>

  </head>
  <body>

    <div class="container">

      <?php

      include("../connection.php");
      $data = json_decode($_POST['data']);

      echo '
      <div id="printbody">

      <div class="row">
        <img src="../img/header.png" width=100%>
      </div>

      <div id="participant-details">
        <h2>'.$data->name.' - ICES'.$data->contingent.'</h2><h3>'.$data->college.'</h3>
      </div>
      <table class="table" style="margin-top:20px">
      <thead>
        <th>Sl</th><th class="table-header">Registered For</th><th>Type</th><th class="table-header">Amount Paid</th>
      </thead>

      <tbody>';
        $slNum = 1;
        $total = 0;

        $sqlCheckCash = "SELECT cash_for FROM cash_pay WHERE u_id=$data->contingent";
        $resCheckCash = mysqli_query($con, $sqlCheckCash);
        $cashList = array();
        while($rowCheckCash = mysqli_fetch_array($resCheckCash)) {
          array_push($cashList, $rowCheckCash['cash_for']);
        }

        //check spot payment DDs
        $sqlCheckDD = "SELECT dd_for FROM dd_pay WHERE u_id=$data->contingent";
        $resCheckDD = mysqli_query($con, $sqlCheckDD);
        $DDList = array();
        while($rowCheckDD = mysqli_fetch_array($resCheckDD)) {
          array_push($DDList, $rowCheckDD['dd_for']);
        }

        //fetch workshop names
        $sql4 = "SELECT id, wor_desc FROM workshops";
        $res4 = mysqli_query($con, $sql4);
        while($row4 = mysqli_fetch_array($res4)) {
          $workshopNames[$row4['id']] = $row4['wor_desc'];
        }

        //check already paid DDs
        $probablyPaidForAccomByDD = false;
        //workshops
        $sqlCheckDDWorkshops = "SELECT wor_id FROM wor_reg WHERE u_id=$data->contingent AND dd='t'";
        $resCheckDDWorkshops = mysqli_query($con, $sqlCheckDDWorkshops);
        while($rowCheckDDWorkshops = mysqli_fetch_array($resCheckDDWorkshops)) {
          $probablyPaidForAccomByDD = true;
          array_push($DDList, $workshopNames[$rowCheckDDWorkshops['wor_id']]);
        }

        //events
        $sqlCheckDDEvents = "SELECT eve_id FROM eve_reg WHERE u_id=$data->contingent AND dd='t'";
        $resCheckDDEvents = mysqli_query($con, $sqlCheckDDEvents);

        if(mysqli_num_rows($resCheckDDEvents) > 0) {
          $probablyPaidForAccomByDD = true;
          array_push($DDList, "Green Ideation");
        }

        //conference
        $sqlCheckDDConference = "SELECT accompany FROM con_reg WHERE u_id=$data->contingent AND dd='t'";
        $resCheckDDConference = mysqli_query($con, $sqlCheckDDConference);
        $rowCheckDDConference = mysqli_fetch_array($resCheckDDConference);

        if(mysqli_num_rows($resCheckDDConference) > 0) {
          $probablyPaidForAccomByDD = true;
          switch ($rowCheckDDConference['accompany']) {
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

          array_push($DDList, $conferenceType);
        }

        //accommodation?????
        if($probablyPaidForAccomByDD) {
          $sqlAccomDetails = "SELECT accom, acctype FROM register WHERE id=$data->contingent";
          $resAccomDetails = mysqli_query($con, $sqlAccomDetails);
          $rowAccomDetails = mysqli_fetch_array($resAccomDetails);

          $accomodation_type_fullnames = array('2AC' => '2 Bedded AC', '2ACsh' => '2 Bedded AC shared', '4ACsh' => '4 Bedded AC shared', 'dorm' => 'Dormitory');

          array_push($DDList, $accomodation_type_fullnames[$rowAccomDetails['acctype']]);
        }

        if($data->registeredForWorkshop) {

          for ($i = 0; $i < sizeof($data->workshopList); ++$i) {
            //check if this event is listed in the cash table
            if($data->workshopsPaid[$i] != "Not Paid" && $data->workshopsPaid[$i] != 0) {
              if(!in_array($data->workshopList[$i], $cashList) && !in_array($data->workshopList[$i], $DDList)) {
                echo '<tr>
                      <td>'.$slNum++.'</td>
                      <td>'.$data->workshopList[$i].'</td>
                      <td>Workshop</td>
                      <td>'.$data->workshopsPaid[$i].'</td>
                    </tr>';
                $total += $data->workshopsPaid[$i];
              }
            }
          }
        }

        if($data->registeredForEvent) {
          if($data->eventPaid != "Not Paid" && $data->eventPaid != 0) {
            if(!in_array("Green Ideation", $cashList) && !in_array("Green Ideation", $DDList)) {
              echo '<tr>
                    <td>'.$slNum++.'</td>
                    <td>Green Ideation</td>
                    <td>Event</td>
                    <td>'.$data->eventPaid.'</td>
                  </tr>';
              $total += $data->eventPaid;
            }
          }
        }

        if($data->registeredForConference) {
          if($data->conferencePaid != "Not Paid" && $data->conferencePaid != 0) {
            if(!in_array($data->conferenceType, $cashList) && !in_array($data->conferenceType, $DDList)) {
              echo '<tr>
                    <td>'.$slNum++.'</td>
                    <td>'.$data->conferenceType.'</td>
                    <td>Conference</td>
                    <td>'.$data->conferencePaid.'</td>
                  </tr>';
              $total += $data->conferencePaid;
            }
          }
        }

        if($data->registeredForAccomodation) {
          if($data->accomodationPaid != "Not Paid" && $data->accomodationPaid != 0) {
            if(!in_array($data->accom_type, $cashList) && !in_array($data->accom_type, $DDList)) {
              echo '<tr>
                    <td>'.$slNum++.'</td>
                    <td>'.$data->accom_type.'</td>
                    <td>Accomodation</td>
                    <td>'.$data->accomodationPaid.'</td>
                  </tr>';
              $total += $data->accomodationPaid;
            }
          }
        }

        echo '<tr id="total"><td></td><td></td><td></td><td>Total - '.$total.'</td>';
        // <tr><td>1</td><td>Geospatial Technology</td><td>Workshop</td><td>600</td></tr>
        // <tr><td>2</td><td>Primavera</td><td>Workshop</td><td>900</td></tr>
        // <tr><td>3</td><td>Green Ideation</td><td>Event</td><td>600</td></tr>
        // <tr><td>4</td><td>Poster Presentation</td><td>Conference</td><td>2500</td></tr>
        // <tr><td>5</td><td>Dormitory</td><td>Accomodation</td><td>600</td></tr>
        // <tr id="total"><td></td><td></td><td></td><td>Total - 5200</td></tr>

      echo '</tbody>
      </table>

      </div>';

     ?>
   </div>

  </body>
</html>
