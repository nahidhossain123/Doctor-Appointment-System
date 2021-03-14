<?php
include '../PHP/Connection.php';
session_start();
$doc_exper_id=$_GET['id'];
$doc_id=$_GET['doc_id'];

	$sql="DELETE FROM doctors_experience WHERE doc_exper_id='$doc_exper_id'";
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