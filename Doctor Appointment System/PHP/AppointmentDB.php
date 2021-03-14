<?php
	include "Connection.php";
	session_start();
	$fullname_error=$email_error=$phone_error=$date_error=$slot_error=$time_error=$city_error=$age_error=$p_type_error=$gender_error=$Address_error=$problem_error=$nid_error="";
	$fullname=$doc_id=$phone=$date=$slot=$time=$visit=$city=$age=$p_type=$gender=$Address=$problem=$nid="";

	if(isset($_POST['appionmentSUb']))
	{
		$Username=$_SESSION['username'];
		$query="SELECT user_id FROM userinfo where Username='$Username' ";
		$result2=mysqli_query($conn,$query);
		if(mysqli_num_rows($result2)>0)
		{
			$row2=mysqli_fetch_assoc($result2);
			$user_id=$row2['user_id'];
		}

		if(!empty($_POST['doc_id']))
		{
			$doc_id=$_POST['doc_id'];
		}


		if(empty($_POST['fullname']))
		{
			$fullname_error="fullname required!";
		}
		else
		{
			$fullname=$_POST["fullname"];
			
		}
		if(empty($_POST['phone']))
		{
			$phone_error="Phone no. required!";
		}
		else
		{
			$phone=$_POST['phone'];
			if(!preg_match("/^([+88]{3}[0-9]{11}$)|([88]{2}[0-9]{11}$)/", $phone))
			{
				$phone_error="Invalid Phone Format! use +88*********** or 88***********";
			}
		}
		if(empty($_POST['date']))
		{
			$date_error="date required!";
		}
		else
		{
			$date=$_POST['date'];
			
		}

		if(empty($_POST['slot']))
		{
			$slot_error="slot required!";
		}
		else
		{
			$slot=$_POST['slot'];
		}

		if(empty($_POST['time']))
		{
			$time_error="time required!";
		}
		else
		{
			$time=$_POST['time'];
		}

		if(empty($_POST['city']))
		{
			$city_error="city required!";
		}
		else
		{
			$city=$_POST['city'];
		}

		if(empty($_POST['age']))
		{
			$age_error="age required!";
		}
		else
		{
			$age=$_POST['age'];
		}

		if(empty($_POST['p_type']))
		{
			$p_type_error="Patient type required!";
		}
		else
		{
			$p_type=$_POST['p_type'];
		}


		if(empty($_POST['gen']))
		{
			$gender_error="Gender required!";
		}
		else
		{
			$gender=$_POST['gen'];
		}

		if(empty($_POST['Address']))
		{
			$Address_error="Address required!";
		}
		else
		{
			$Address=htmlspecialchars($_POST['Address']);
		}

		if(empty($_POST['problem']))
		{
			$problem_error="problem required!";
		}
		else
		{
			$problem=htmlspecialchars($_POST['problem']);
		}

		if(empty($_POST['nid']))
		{
			$nid_error="nid required!";
		}
		else
		{
			$nid=$_POST['nid'];
		}

		if($fullname_error=="" && $phone_error=="" && $date_error=="" && $slot_error=="" && $time_error=="" && $city_error=="" && $age_error=="" && $p_type_error==""&& $p_type_error=="" && $gender_error=="" && $Address_error=="" && $problem_error=="" && $nid_error=="")
		{
			$sql="INSERT INTO `appointments`(`appoint_id`, `doc_id`, `user_id`, `fullname`, `phone`, `appoint_date`, `appoint_slot`, `appoint_time`, `city`, `age`, `patient_type`, `gender`, `address`, `problem`, `nid`) VALUES (NULL,'$doc_id','$user_id','$fullname','$phone','$date','$slot','$time','$city','$age','$p_type','$gender','$Address','$problem','$nid') ";
			$result=mysqli_query($conn,$sql);
			if($result)
			{
				$_SESSION['alert_success_appoint']="Appointed Successfully!!";
				header("Location:../HTML/Appointment.php?doc_id=$doc_id");
			}
			else
			{
				$_SESSION['alert_failed_appoint']="Failed!! Insert Valid Data";
				header("Location:../HTML/Appointment.php?doc_id=$doc_id");
			}
		}
		else
		{
			$_SESSION['fullname_error']=$fullname_error;
			$_SESSION['phone_error']=$phone_error;
			$_SESSION['date_error']=$date_error;
			$_SESSION['slot_error']=$slot_error;
			$_SESSION['time_error']=$time_error;
			$_SESSION['city_error']=$city_error;
			$_SESSION['age_error']=$age_error;
			$_SESSION['p_type_error']=$p_type_error;
			$_SESSION['gender_error']=$gender_error;
			$_SESSION['Address_error']=$Address_error;
			$_SESSION['problem_error']=$problem_error;
			$_SESSION['nid_error']=$nid_error;
			$_SESSION['alert_failed_appoint']="Failed!! Insert Valid Data";
			header("Location:../HTML/Appointment.php?doc_id=$doc_id");
		}
	}
?>