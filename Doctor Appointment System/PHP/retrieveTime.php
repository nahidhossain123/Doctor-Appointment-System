<?php
	include "Connection.php";

	$data=stripcslashes(file_get_contents("php://input"));
	$data=json_decode($data,true);
	$time=$data['time'];
	$doc_id=$data['doc_id'];
	$date=$data['date'];
	$dayname=$data['day'];

	
	$timearry=explode("-", $time);
	$startTime=new DateTime($timearry[0]);
	$endTime=new DateTime($timearry[1]);
	$allTime=array();


	$sql1="SELECT Capacity from doc_officehour where doc_id='$doc_id' and Day='$dayname' ";
	$result1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result1)>0)
	{
		$row1=mysqli_fetch_assoc($result1);
		$Capacity=$row1['Capacity'];
	}

	while ($Capacity>0) {
		$time=$startTime->modify('+10 minutes')->format('h:i');
		$sql="SELECT appoint_id FROM appointments where doc_id='$doc_id' and appoint_date='$date' and appoint_time='$time' ";
		$result=mysqli_query($conn,$sql);
		if(!mysqli_num_rows($result)>0)
		{
			$timeArray=array("time"=>$time);
			array_push($allTime, $timeArray);
		}
		$Capacity--;
	}	
	echo json_encode($allTime);
?>