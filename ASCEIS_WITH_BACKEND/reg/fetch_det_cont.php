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
	$id=$_POST['id'];
	$id=preg_replace("/[^0-9]/","",$id);

	$sql="Select name, college, reg_no, contact from register where id='".$id."'";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($res);
	echo "<h3>".$row['name']." (".$row['college'].")</h3>";
	echo "REG: <b>".$row['reg_no']."</b>, Contact:<b>".$row['contact']."</b>";

	$sql="select e_r.id, eve_desc,dd,ol from eve_reg as e_r inner join events as ev on e_r.eve_id=ev.id where u_id='".$id."'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count=="0")
		{

			echo "<tr>
				<td colspan='2'>Not registered any event</td>
			</tr>";
		}

	echo "<table class='table table-hover table-condensed'>
		<tr>
		<th colspan='2' style='text-align:center'>
			Events
		</tr>
		";
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>
				<td>".$row['eve_desc']."</td>
				<td>";

				if($row['dd']=="f" || $row['ol']=='f')
				{
					echo "<input type='checkbox' class='inp_eve' name='eve[]' value='".$row['id']."'>";
				}
				else if($row['dd']=="t" || $row['ol']=='t')
				{
					echo "<input type='checkbox' checked disabled>";
				}
				echo "</td>
			</tr>";
		}

		echo "
			<tr>
				<th colspan='2' style='text-align:center'>
					Workshops
				</th>
			</tr>
		";
		$sql="select e_r.id, wor_desc,dd,ol from wor_reg as e_r inner join workshops as ev on e_r.wor_id=ev.id where u_id='".$id."'";

		$res=mysqli_query($con,$sql);
		$count=mysqli_num_rows($res);
		if(!$res)
		{
			echo "<br><BR>".mysqli_error($con);
		}

		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>
				<td>".$row['wor_desc']."</td>
				<td>";

				if($row['dd']=="f" || $row['ol']=='f')
				{
					echo "<input type='checkbox' class='inp_wor' name='wor[]' value='".$row['id']."'>";
				}
				else if($row['dd']=="t" || $row['dd']=='t')
				{
					echo "<input type='checkbox' checked disabled>";
				}
				echo "</td>
			</tr>";
		}
		if($count=="0")
		{

			echo "<tr>
				<td colspan='2'>Not registered any event</td>
			</tr>";
		}
echo "
			<tr>
				<th colspan='2' style='text-align:center'>
					Conference
				</th>
			</tr>
		";
		$sql="Select * from con_reg where u_id='".$id."'";
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($res);
		$count=mysqli_num_rows($res);
		if($count=="1")
		{
			echo "<tr>
					<td>Conference
					</td>
					<td>
					";
					if($row['dd']=="f" && $row['ol']!="t")
					{
						echo "<input type='checkbox' class='con' name='con' value='".$row['id']."'>";
					}
					else{
						echo "<input type='checkbox' checked disabled>";
					}
					echo "
					</td>
			</tr>";
		}

		else{
			echo "<tr>
				<td colspan='2'>Not registered for Conference</td>
			</tr>";
		}

		echo "
			<tr>
				<th colspan='2' style='text-align:center'>
					UCES
				</th>
			</tr>
		";
		$sql="Select * from uce_reg where u_id='".$id."'";
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($res);
		$count=mysqli_num_rows($res);
		if($count=="1")
		{
			echo "<tr>
					<td>UCES
					</td>
					<td>
					";
					if($row['dd']=="f")
					{
						echo "<input type='checkbox' class='uce' name='uce' value='".$row['id']."'>";
					}
					else{
						echo "<input type='checkbox' checked disabled>";
					}
					echo "
					</td>
			</tr>";
		}

		else{
			echo "<tr>
				<td colspan='2'>Not registered for UCES</td>
			</tr>";
		}

		echo "
			<tr>
				<th  style='text-align:center' colspan='2'>
					Accomodation

				<select class='form-control ' id='accom'  name='accom'>
					<option value='0'>0 days</option>
					<option value='1'>1 days</option>
					<option value='2'>2 days</option>
					<option value='3'>3 days</option>
					<option value='4'>4 days</option>
				</select>

				</th>
			</tr>
		";

		echo "
	</table>";
?>
