<?php
include '../PHP/Connection.php';
session_start();
$user_id=$_GET['id'];


	$sql="DELETE FROM userinfo WHERE user_id='$user_id'";
	$result=mysqli_query($conn,$sql);
	if($result)
		{
			$_SESSION['alert_success']="Deleted Successfully!";
			header("Location:../HTML/user.php");
		}
		else
		{
			$_SESSION['alert_failed']="Failed to Delete!";
			header("Location:../HTML/user.php");
		}

?>