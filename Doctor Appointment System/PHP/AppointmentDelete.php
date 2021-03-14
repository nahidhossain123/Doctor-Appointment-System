<?php
include '../PHP/Connection.php';
session_start();
$appoint_id=$_GET['id'];


	$sql="DELETE FROM appointments WHERE appoint_id='$appoint_id'";
	$result=mysqli_query($conn,$sql);
	if($result)
		{
			$_SESSION['alert_success']="Deleted Successfully!";
			header("Location:../HTML/appointmentList.php");
		}
		else
		{
			$_SESSION['alert_failed']="Failed to Delete!";
			header("Location:../HTML/appointmentList.php");
		}

?>