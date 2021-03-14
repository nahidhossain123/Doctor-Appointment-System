<?php
include '../PHP/Connection.php';
session_start();
$doc_id=$_GET['id'];

	$sql="DELETE FROM doc_officehour WHERE doc_id='$doc_id'";
	$result=mysqli_query($conn,$sql);
	if($result)
		{
			$_SESSION['alert_success']="Deleted Successfully!";
			header("Location:../HTML/Doctorprofilemanage.php?id=$doc_id");
		}
		else
		{
			$_SESSION['alert_failed']="Failed to Delete!";
			header("Location:../HTML/Doctorprofilemanage.php?id=$doc_id");
		}

?>