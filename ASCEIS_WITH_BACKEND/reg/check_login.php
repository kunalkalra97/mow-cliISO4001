<?php
  session_start();
  $msg;
  if(isset($_SESSION['login_r']))
  {
    //$msg="aa";
    
        header("location:log_index.php");
  }
  else
  {
    if(isset($_POST['login']))
    {
      $msg="uu";
    $login=$_POST['login'];
    $pass=$_POST['pass'];
    if($login=="admin" && $pass=="admin@123")
      {
        $msg="asa";
        $_SESSION['login_r']=$login;
        header("location:log_index.php");
      }
      else{
        header("location:index.php");
      }
    }
  else{
    header("location:index.php");
  }
  }

  
?>