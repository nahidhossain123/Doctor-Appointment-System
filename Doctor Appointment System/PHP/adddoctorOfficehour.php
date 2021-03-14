<?php
	session_start();
	include '../PHP/Connection.php';

	$sat_time=$sun_time=$mon_time=$tue_time=$wed_time=$thu_time=$fri_time=$Capacity="";
	$doc_id=$_GET['id'];
	$sql="SELECT * FROM doc_officehour where doc_id='$doc_id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$_SESSION['alert_failed']="This id office hour already exist!! You can update it or delete it to create new";
		header("Location:../HTML/Addofficehour.php?id=$doc_id");
	}
	else
	{
		if(isset($_POST['officehoursub']))
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
				print_r($Capacity);
			}
			
			$array = array(
				"0" =>array("Saturday", $sat_time,$Capacity[0]) ,
				'1' =>array('Sunday', $sun_time,$Capacity[1]) ,
				'2' =>array('Monday', $mon_time,$Capacity[2]) ,
				'3' =>array('Tuesday', $tue_time,$Capacity[3]) ,
				'4' =>array('Wednesday', $wed_time,$Capacity[4]) ,
				'5' =>array('Thrusday', $thu_time,$Capacity[5]) , 
				'6' =>array('Friday', $fri_time,$Capacity[6]),
			 );

			if(is_array($array))
			{
				foreach ($array as $key => $value) {
					$day=$value[0];
					$time=$value[1];
					$Capacity=$value[2];
					$sql="INSERT INTO doc_officehour(doc_officehour_id,doc_id,Day,Time,Capacity) VALUES(NULL,'$doc_id','$day','$time','$Capacity' )";
					$result=mysqli_query($conn,$sql);
				}
				if($result)
				{
					$_SESSION['alert_success']="Office hour inserted Successfully!";
					header("Location:../HTML/Addofficehour.php?id=$doc_id");
				}
				else
				{
					$_SESSION['alert_failed']="Failed to insert!";
					header("Location:../HTML/Addofficehour.php?id=$doc_id");
				}
			}
			
		}
	}

?>