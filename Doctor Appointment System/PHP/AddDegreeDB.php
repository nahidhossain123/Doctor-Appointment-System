<?php
 include '../PHP/Connection.php';
 session_start();
 $degree="";
 $degree_error="";

 if(isset($_POST['DegAddSUB']))
 {
 	if(empty($_POST['degree']))
 	{
 		$degree_error="Required!";
 	}
 	else
 	{
 		$degree=$_POST['degree'];
 		if(!preg_match("/^[a-zA-Z]+$/", $degree))
 		{
 			$degree_error="Invalid Format use correct format e.g Medicine";
 		}
 	}
 	if($degree_error=="")
 	{
 		$sql="INSERT INTO degrees(deg_id,degree) values(NULL,'$degree')";
 		$result=mysqli_query($conn,$sql);
 		if($result)
 		{
 			$_SESSION['alert_success']="Data inserted Successfully";
 			header("Location:../HTML/addDegree.php");
 		}
 		else
 		{
 			$_SESSION['alert_failed']="Failed!Fill input with valid Data";
 			header("Location:../HTML/addDegree.php");
 		}
 	}
 	else
 	{
 		$_SESSION['degree_error']=$degree_error;
 		$_SESSION['alert_failed']="Failed!Fill input with valid Data";
 		header("Location:../HTML/addDegree.php");
 	}
 }

?>