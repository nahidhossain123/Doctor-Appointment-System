<?php
 include '../PHP/Connection.php';
 session_start();
 $degree="";
 $degree_error="";
 $deg_id=$_GET['id'];
 if(isset($_POST['DegUPSUB']))
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
 			$degree_error="Invalid Format use correct format e.g MBBS";
 		}
 	}
 	
 	if($degree_error=="")
 	{
 		$sql="UPDATE `degrees` SET `deg_id`='$deg_id',`degree`='$degree' where deg_id='$deg_id'";
 		$result=mysqli_query($conn,$sql);
 		if($result)
 		{
 			$_SESSION['alert_success']="Data inserted Successfully";
 			header("Location:../HTML/Updatedegree.php?id=$deg_id");
 		}
 		else
 		{
 			$_SESSION['alert_failed']="Failed!Fill input with valid Data";
 			header("Location:../HTML/Updatedegree.php?id=$deg_id");
 		}
 	}
 	else
 	{
 		$_SESSION['degree_error']=$degree_error;
 		$_SESSION['alert_failed']="Failed!Fill input with valid Data";
 		header("Location:../HTML/Updatedegree.php?id=$deg_id");
 	}
 }

?>