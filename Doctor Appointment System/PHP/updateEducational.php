<?php
	include '../PHP/Connection.php';
	session_start();
	$degree=$college=$year="";
	$degree_error=$college_error=$year_error="";
	$doc_edu_id=$_GET['id'];
	$doc_id=$_POST['doc_id'];
	echo $doc_id;
	if(isset($_POST['doc_eduUP_sub']))
	{
		if(empty($_POST['degrees']))
		{
			$degree_error="* Degree required!";
		}
		else
		{
			$degree=$_POST['degrees'];

		}
		if(empty($_POST['collegename']))
		{
			$college_error="* College name required!";
		}
		else
		{
			$college=$_POST['collegename'];
			if(!preg_match("/^[a-zA-Z\s]+$/", $college))
			{
				$college_error="Invalid college name!!";
			}
		}

		if(empty($_POST['year']))
		{
			$year_error="* Year required!";
		}
		else
		{
			$year=$_POST['year'];
			if (!preg_match("/^[0-9]{4}$/", $year)) {
				$year_error="Invalid Year!!";
			}
		}
		if($degree_error=="" && $college_error=="" && $year_error=="")
		{
			$sql="UPDATE `doctors_educational` SET `doc_edu_id`='$doc_edu_id',`doc_id`='$doc_id',`degree`='$degree',`college`='$college',`year`='$year' ";
			$result=mysqli_query($conn,$sql);
			if($result)
				{
					$_SESSION['alert_success']="Educational Info inserted Successfully!";
					header("Location:../HTML/UpdateEducational.php?id=$doc_id");
				}
				else
				{
					$_SESSION['alert_failed']="Failed to insert!";
					header("Location:../HTML/UpdateEducational.php?id=$doc_id");
				}
		}
		else
		{
			$_SESSION['degree_error']=$degree_error;
			$_SESSION['college_error']=$college_error;
			$_SESSION['year_error']=$year_error;
			$_SESSION['alert_failed']="Failed!!Fill all the input with correct format";
			header("Location:../HTML/UpdateEducational.php?id=$doc_id");
		}
	}
?>