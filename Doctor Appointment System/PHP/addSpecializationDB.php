<?php
 include '../PHP/Connection.php';
 session_start();
 $specialization="";
 $specialization_error="";

 if(isset($_POST['SPECI_ADD_submit']))
 {
 	if(empty($_POST['specialization']))
 	{
 		$specialization_error="Required!";
 	}
 	else
 	{
 		$specialization=$_POST['specialization'];
 		if(!preg_match("/^[a-zA-Z]+$/", $specialization))
 		{
 			$specialization_error="Invalid Format use correct format e.g Medicine";
 		}
 	}
 	if($specialization_error=="")
 	{
 		$sql="INSERT INTO specializations(spe_id,specialization) values(NULL,'$specialization')";
 		$result=mysqli_query($conn,$sql);
 		if($result)
 		{
 			$_SESSION['alert_success']="Data inserted Successfully";
 			header("Location:../HTML/addspecialization.php");
 		}
 		else
 		{
 			$_SESSION['alert_failed']="Failed!Fill input with valid Data";
 			header("Location:../HTML/addspecialization.php");
 		}
 	}
 	else
 	{
 		$_SESSION['specialization_error']=$specialization_error;
 		$_SESSION['alert_failed']="Failed!Fill input with valid Data";
 		header("Location:../HTML/addspecialization.php");
 	}
 }

?>