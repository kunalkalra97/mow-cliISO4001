<?php

// Hit counter function.
// Your probably want to remove lines that report errors. If not your website could stop working if, for example, your database is down.

include('connection.php');

function addinfo($page)

{ 

// UNCOMMENT BEFORE UPLOADING
// $con=mysqli_connect("localhost","asceisic_main3","rock*123") or die("Cannot connect to host");
// mysqli_select_db($con,"asceisic_reg") or die("Cannot select db");
	
include('connection.php');
	
// ########################################################
// ######### check if counter exsist and update ###########
// ########################################################

	$result=mysqli_query($con,"SELECT page FROM hits WHERE page = '$page'");

	if($result === FALSE) {
    die(mysqli_error($con)); 
}

	if(mysqli_num_rows($result))
	{
	//A counter for this page  already exsists. Now we have to update it.

		$updatecounter = mysqli_query($con,"UPDATE hits SET count = count+1 WHERE page = '$page'");
		if (!$updatecounter) 
		{
		die ("Can't update the counter : " . mysqli_error($con)); // remove ?
		}
	
	} 
	else
	{
	// This page did not exsist in the counter database. A new counter must be created for this page.

		$insert = mysqli_query($con,"INSERT INTO hits (page, count)VALUES ('$page', '1')");
	
		if (!$insert) 
		{
    		die ("Can\'t insert into hits : " . mysqli_error($con)); // remove ?
		}
	}
	


} 

?>