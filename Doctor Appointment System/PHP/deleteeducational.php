<?php
include '../PHP/Connection.php';
session_start();
$doc_edu_id=$_GET['id'];
$doc_id=$_GET['doc_id'];

	$sql="DELETE FROM doctors_educational WHERE doc_edu_id='$doc_edu_id'";
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