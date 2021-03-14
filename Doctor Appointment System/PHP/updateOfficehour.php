 <?php
	session_start();
	include '../PHP/Connection.php';

	$sat_time=$sun_time=$mon_time=$tue_time=$wed_time=$thu_time=$fri_time=$Capacity="";
	$doc_id=$_GET['id'];
	$sql="SELECT doc_officehour_id FROM doc_officehour where doc_id='$doc_id'";
	$result=mysqli_query($conn,$sql);
	$all_id=array();
	$i=0;
	if(mysqli_num_rows($result)>0)
	{
		while ($row=mysqli_fetch_assoc($result)) {
			$all_id[$i]=$row['doc_officehour_id'];
			$i++;
		}
	}
	
	if(isset($_POST['doc_officehourup_sub']))
	{
		if (empty($_POST['satime'])) {
			$sat_time='Nill';
		}
		else
		{
			$sat_time=$_POST['satime'];
		}

		if (empty($_POST['sutime'])) {
			$sun_time='Nill';
		}
		else
		{
			$sun_time=$_POST['sutime'];
		}

		if (empty($_POST['montime'])) {
			$mon_time='Nill';
		}
		else
		{
			$mon_time=$_POST['montime'];
		}
		if (empty($_POST['tutime'])) {
			$tue_time='Nill';
		}
		else
		{
			$tue_time=$_POST['tutime'];
		}

		if (empty($_POST['wedtime'])) {
			$wed_time='Nill';
		}
		else
		{
			$wed_time=$_POST['wedtime'];
		}

		if (empty($_POST['thtime'])) {
			$thu_time='Nill';
		}
		else
		{
			$thu_time=$_POST['thtime'];
		}

		if (empty($_POST['frtime'])) {
			$fri_time='Nill';
		}
		else
		{
			$fri_time=$_POST['frtime'];
		}
		if (empty($_POST['Capacity'])) {
			$Capacity=0;
		}
		else
		{
			$Capacity=$_POST['Capacity'];
		}
		$array = array(
			"0" =>array($all_id[0],"Saturday", $sat_time,$Capacity[0]) ,
			'1' =>array($all_id[1],'Sunday', $sun_time,$Capacity[1]) ,
			'2' =>array($all_id[2],'Monday', $mon_time,$Capacity[2]) ,
			'3' =>array($all_id[3],'Tuesday', $tue_time,$Capacity[3]) ,
			'4' =>array($all_id[4],'Wednesday', $wed_time,$Capacity[4]) ,
			'5' =>array($all_id[5],'Thrusday', $thu_time,$Capacity[5]) , 
			'6' =>array($all_id[6],'Friday', $fri_time,$Capacity[6])
		 );

		if(is_array($array))
		{
			foreach ($array as $key => $value) {
				$doc_officehour_id=$value[0];
				$day=$value[1];
				$time=$value[2];
				$Capacity=$value[3];
				
				$sql="UPDATE `doc_officehour` SET `doc_officehour_id`='$doc_officehour_id',`doc_id`='$doc_id',`day`='$day',`time`='$time',Capacity='$Capacity' WHERE doc_officehour_id='$doc_officehour_id' ";
				$result=mysqli_query($conn,$sql);
			}
			if($result)
			{
				$_SESSION['alert_success']="Office hour Updated Successfully!";
				header("Location:../HTML/Updateofficehour.php?doc_id=$doc_id");
			}
			else
			{
				$_SESSION['alert_failed']="Failed to Update!";
				header("Location:../HTML/Updateofficehour.php?doc_id=$doc_id");
			}
		}
		
	}
	

?>