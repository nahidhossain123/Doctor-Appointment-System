<?php
	session_start();
	include "../PHP/Connection.php";
	$fullname_error=$email_error=$phone_error=$bmdc_error=$visit_error=$specilization_error=$city_error=$gender_error=$photo_error=$alert="";
	$fullname=$email=$phone=$bmdc=$visit=$specilization=$city=$gender=$photo="";

	if(isset($_POST['adddoctorSubmit']))
	{
		if(empty($_POST['fullname']))
		{
			$fullname_error="fullname required!";
		}
		else
		{
			$fullname=$_POST["fullname"];
			if(!preg_match("/^[Dr.]+[\s][A-Z][a-z]+[\s][A-Z][a-z]+$/",$fullname))
			{
				$fullname_error="Follow the pattern 'Dr. Nahid Hossain'";
			}
		}

		if(empty($_POST['Email']))
		{
			$email_error="Email required!";
		}
		else
		{
			$email=$_POST['Email'];
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$sql="SELECT * FROM doctors where email='$email'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
					$email_error="Email Already Exist!!";
				}
			}
			else{
				$email_error="Invalid Email Format! e.g example@gmail.com";
			}
		}
		if(empty($_POST['phone']))
		{
			$phone_error="Phone no. required!";
		}
		else
		{
			$phone=$_POST['phone'];
			if(preg_match("/^([+88]{3}[0-9]{11}$)|([88]{2}[0-9]{11}$)/", $phone))
			{
				$sql="SELECT * FROM doctors where phone='$phone'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
					$phone_error="Phone number Already Exist!!";
				}
			}
			else
			{
				$phone_error="Invalid Phone Format! use +88*********** or 88***********";
			}
		}
		if(empty($_POST['bmdc']))
		{
			$bmdc_error="BMDC required!";
		}
		else
		{
			$bmdc=$_POST['bmdc'];
			if(preg_match("/^[0-9]{5,6}$/", $bmdc))
			{
				$sql="SELECT * FROM doctors where bmdc='$bmdc'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
					$bmdc_error="BMDC number Already Exist!!";
				}
			}
			else
			{
				$bmdc_error="Invalid BMDC No. for medical 1- 102000 & for Dental 1-10500";
			}
		}


		if(empty($_POST['visit']))
		{
			$visit_error="Visit required!";
		}
		else
		{
			$visit=$_POST['visit'];
			if(!preg_match("/^[0-9]{3,4}$/", $visit))
			{
				$visit_error="Invalid Visit Format!!";
			}
		}

		if(empty($_POST['specilizations']))
		{
			$specilization_error="specilizations required!";
		}
		else
		{
			$specilization=$_POST['specilizations'];
		}
		if(empty($_POST['citys']))
		{
			$city_error="City required!";
		}
		else
		{
			$city=$_POST['citys'];
		}
		if(empty($_POST['gender']))
		{
			$gender_error="Gender required!";
		}
		else
		{
			$gender=$_POST['gender'];
		}

		if($fullname_error=="" && $email_error=="" && $phone_error=="" && $bmdc_error=="" && $specilization_error=="" && $city_error=="" && $gender_error=="" && $visit_error==""){
		
			if (isset($_FILES['image'])) {
				
				
				$imgae_name=$_FILES['image']['name'];
				$image_size=$_FILES['image']["size"];
				$image_temp_name=$_FILES['image']["tmp_name"];
				$image_error=$_FILES['image']["error"];
				if($image_error===0){
					if($image_size>3145728)
					{
						$photo_error="Image size is too large!";
					}
					else{
						$image_extention=pathinfo($imgae_name,PATHINFO_EXTENSION);
						$image_entention_lower=strtolower($image_extention);
						$allow_extention=array("jpg","jpeg","png");
						if(in_array($image_entention_lower,$allow_extention))
						{
							$image_new_name=uniqid("IMG",true).'.'.$image_entention_lower;
							$image_upload_path='../Upload/'.$image_new_name;
							move_uploaded_file($image_temp_name,$image_upload_path);
						}
						else{
							$photo_error="Invalid file type! .jpg .jpeg .png allowed";
						}
					}
				}
				else{
					$photo_error="Unknown error occured!";
				}
			}
			else
			{
				$photo_error="Image required!";
			}
		}

		if($fullname_error=="" && $email_error=="" && $phone_error=="" && $bmdc_error=="" && $specilization_error=="" && $city_error=="" && $gender_error=="" && $photo_error=="" && $visit_error==""){

			$date=date("Y/m/d");
			$searchKey=$fullname.$specilization.$gender.$visit.$city;

			$sql="INSERT INTO doctors(doc_id,fullname,email,phone,bmdc,visit,specialization,city,gender,doc_photo,today_date,searchkey) VALUES(NULL,'$fullname','$email','$phone','$bmdc','$visit','$specilization','$city','$gender','$image_upload_path','$date','$searchKey')";
			$result=mysqli_query($conn,$sql);
			if($result)
			{
				$_SESSION["alert_success"]="Doctor Inserted Successfully";
				header("Location:../HTML/Adddoctor.php");
			}
			else{
				$_SESSION["alert_failed"]="Failed!! To Upload";
				header("Location:../HTML/Adddoctor.php");
			}
		}
		else
		{
			$_SESSION["fullname_error"]=$fullname_error;
			$_SESSION["email_error"]=$email_error;
			$_SESSION["phone_error"]=$phone_error;
			$_SESSION["bmdc_error"]=$bmdc_error;
			$_SESSION["visit_error"]=$visit_error;
			$_SESSION["specilization_error"]=$specilization_error;
			$_SESSION["city_error"]=$city_error;
			$_SESSION["gender_error"]=$gender_error;
			$_SESSION["photo_error"]=$photo_error;
			$_SESSION["alert_failed"]="Validation Error!!Please Follow The correct format below";
			header("Location:../HTML/Adddoctor.php");
		}
	}
	
?>