<?php
include '../PHP/Connection.php';
session_start();
$spe_id=$_GET['id'];

	$sql="DELETE FROM specializations WHERE spe_id='$spe_id'";
	$result=mysqli_query($conn,$sql);
	if($result)
		{
			$_SESSION['alert_success']="Deleted Successfully!";
			header("Location:../HTML/Addinfo.php");
		}
		else
		{
			$_SESSION['alert_failed']="Failed to Delete!";
			header("Location:../HTML/Addinfo.php");
		}

?>