<?php
	include '../PHP/Connection.php';
	session_start();

	$medical=$position=$year="";
	$medical_error=$position_error=$year_error="";
	$doc_id=$_GET['id'];
	if(isset($_POST['experienceSubmit']))
	{
		if(empty($_POST['medical']))
		{
			$medical_error="Medical Name Required!!";
		}
		else
		{
			$medical=$_POST['medical'];
			if(!preg_match("/^[a-zA-Z\s]+$/", $medical))
			{
				$medical_error="Invalid Medical Name!!";
			}
		}
		if(empty($_POST['position']))
		{
			$position_error="Position Required!";
		}
		else
		{
			$position=$_POST['position'];
			if(!preg_match("/^[a-zA-Z\s]+/", $position))
			{
				$position_error="Invalid Position!";
			}
		}
		if(empty($_POST['year']))
		{
			$year_error="* Year required!";
		}
		else
		{
			$year=$_POST['year'];
			if (!preg_match("/^[0-9]{4}[-][0-9]{4}$/", $year)) {
				$year_error="Invalid Year!!";
			}
		}
		if($medical_error=="" && $position_error=="" && $year_error=="")
		{
			$sql="INSERT INTO doctors_experience(doc_exper_id, doc_id, medical_name, position, year) VALUES (NULL,'$doc_id','$medical','$position','$year')";
			$result=mysqli_query($conn,$sql);
			if($result)
				{
					$_SESSION['alert_success']="Experience Info inserted Successfully!";
					header("Location:../HTML/Addexperience.php?id=$doc_id");
				}
				else
				{
					$_SESSION['alert_failed']="Failed to insert!";
					header("Location:../HTML/Addexperience.php?id=$doc_id");
				}
		}
		else
		{
			$_SESSION['medical_error']=$medical_error;
			$_SESSION['position_error']=$position_error;
			$_SESSION['year_error']=$year_error;
			$_SESSION['alert_failed']="Failed!!Follow correct format bellow!";
			header("Location:../HTML/Addexperience.php?id=$doc_id");
		}
	}
?>