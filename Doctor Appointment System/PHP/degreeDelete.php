<?php
include '../PHP/Connection.php';
session_start();
$deg_id=$_GET['id'];

	$sql="DELETE FROM degrees WHERE deg_id='$deg_id'";
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