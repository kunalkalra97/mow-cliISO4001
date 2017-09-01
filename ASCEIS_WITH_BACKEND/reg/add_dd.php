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
      <div class="col-md-7" style="float:none; margin:0px auto;">
          <center><h4>Add a new DD details</h4></center>
        <form id="dd_info" method="POST" action="ins_dd_inf.php">
          <table class="table">
            <tr>
              <th>
                Receipt no.
              </th>
              <td>
                <input type="text" placeholder="Enter receipt no." name="receipt_num" id="receipt_num" class="form-control" required>
              </td>
            </tr>
            <tr>
              <th>
                DD no.
              </th>
              <td>
                <input type="text" placeholder="Enter DD no." name="dd_num" id="dd_num" class="form-control"  required>
              </td>
            </tr>
            <tr>
              <th>
                DD Amount.
              </th>
              <td>
                <input type="text" placeholder="Enter DD Amount " name="dd_amount"  id="dd_amount" class="form-control" required >
              </td>
            </tr>
            <tr>
              <th>
                Paid Amount
              </th>
              <td>
                <input type="text" placeholder="Enter Paid amount" name="paid_amount" id="paid_amount" class="form-control" required >
              </td>
            </tr>
            <tr>
              <th>
                DD Branch.
              </th>
              <td>
                <input type="text" placeholder="Enter branch of DD." name="dd_branch" id="dd_branch" class="form-control" required >
              </td>
            </tr>
            <tr>
              <th>
                DD place
              </th>
              <td>
                <input type="text" placeholder="Enter DD place"  name="dd_place" id="dd_place" class="form-control" >
              </td>
            </tr>
            <tr>
              <th>
                Contingent no.
              </th>
              <td>
                <input type="text" placeholder="Enter ICES Contingent no."  name="ices_cont" id="ices_cont" class="form-control" required>
              </td>
            </tr>
            <tr>
              <th colspan="2" style="text-align:center">

                   <a class="btn btn-info" data-toggle="modal"  id="sub_dd" href="#myModal" >Submit</a>
              </th>
            </tr>
          </table>
        </form>
        <div class="clearfix"></div>
      </div>
<div>

</div>
    </div> <!-- /container -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Select the events for which DD has been received</h4>
      </div>
      <div class="modal-body">
        <form id="dummy" method="POST" action="save_bill.php">

</form>
  <div style="margin-bottom:9px;" >

 <div style="float:left; margin-bottom:6px">
</div>
<div class="clr"></div>
  <div id="table_cart_d" style="min-height:200px;">

<div id="prob">
<center>
<img src="images/loader.gif">
 </center> </div>
  </div>


  </div>


      </div>
      <div class="modal-footer">
        <button type="button" id="save_changes" class="btn btn-success" >Save now</button>
        <button type="button"  class="btn btn-danger" id="cancel">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->


    <script>

    $(document).ready(function(){
      $(".add_dd").addClass("active");

      $("#sub_dd").click(function(e){
        e.preventDefault();
        var receipt_num=$("#receipt_num").val();
        var dd_num=$("#dd_num").val();
        var dd_amount=$("#dd_amount").val();
        var paid_amount=$("#paid_amount").val();
        var dd_branch=$("#dd_branch").val();
        var dd_place=$("#dd_place").val();
        var ices_cont=$("#ices_cont").val();

        receipt_num=receipt_num.trim();
        dd_num=dd_num.trim();
        dd_amount.trim();
        paid_amount=paid_amount.trim();
        dd_branch=dd_branch.trim();
        dd_place=dd_place.trim();
        ices_cont=ices_cont.trim();

        if(receipt_num=="" || dd_num=="" || dd_amount=="" || paid_amount=="" || dd_branch=="" || dd_place=="" || ices_cont=="" )
          {
            alert("Please correctly fill the details");


            return false;
          }

          $.ajax({
            type:"POST",
            url:"fetch_det_cont.php",
            data:{id: ices_cont},
            success:function(data){
              // /alert(data);
              //$("#load_r").css('display','none');
              pass=data;
              //$('#search_res').listview('refresh');
              //window.location.href="#search_res";
            }

          }).done(function(){

            $("#prob").text("");
            $("#prob").append(pass);

            //alert(pass);
                //   hand.parent().children(".pass").text("");
              //hand.parent().children(".pass").append(pass);

          });


      })
    })

$(document).ready(function(){
  $("#save_changes").click(function(){
    // var tt=$(".inp_eve").val();
    var eve_v=new Array();
    var i=0;
    $(".inp_eve").each(function(){
      if($(this).prop("checked"))
      {
      var yy=$(this).val();
      eve_v[i++]=yy;
      }
    })
    var ad_inp;

    if(i>0)
    {
    ad_inp="<input type='hidden' name='eve_a' value='"+eve_v+"'>";
    $("#dd_info").append(ad_inp);
    }
    else{
      ad_inp="<input type='hidden' name='eve_a' value='555'>";
    $("#dd_info").append(ad_inp);

    }


    // tt=$(".inp_wor").val();
     wor_v=new Array();
     i=0;
    $(".inp_wor").each(function(){
      if($(this).prop("checked"))
      {

       yy=$(this).val();
      wor_v[i++]=yy;
      }
    })
    if(i>0)
    {
 ad_inp="<input type='hidden' name='wor_a' value='"+wor_v+"'>";
    $("#dd_info").append(ad_inp);
  }
  else{
     ad_inp="<input type='hidden' name='wor_a' value='555'>";
    $("#dd_info").append(ad_inp);
  }


    if($(".con").length>0 && $(".con").prop("checked"))
    {
    ad_inp="<input type='hidden' name='con_a' value='"+$(".con").val()+"'>";
    $("#dd_info").append(ad_inp);
    }
    else{
      ad_inp="<input type='hidden' name='con_a' value='555'>";
    $("#dd_info").append(ad_inp);
    }


    if($(".uce").length>0 && $(".uce").prop("checked"))
    {

    ad_inp="<input type='hidden' name='uce_a' value='"+$(".uce").val()+"'>";
    $("#dd_info").append(ad_inp);
    }
    else{
      ad_inp="<input type='hidden' name='uce_a' value='555'>";
    $("#dd_info").append(ad_inp);
    }

    var acc_n=$("#accom").val();
    ad_inp="<input type='hidden' name='acc_a' value='"+acc_n+"'>";
    $("#dd_info").append(ad_inp);
    alert(eve_v + wor_v);
   $("#dd_info").submit();
  })
})
    </script>
  </body>
</html>
