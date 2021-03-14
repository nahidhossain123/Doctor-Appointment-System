<?php 
	session_start();
	include "../PHP/Connection.php";
	if(!isset($_SESSION['Adminlog']))
	{
		if(!isset($_COOKIE['Adminlog']))
		{
			header("Location:Adminlogin.php");
		}
	}
 ?>

<!DOCTYPE html>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css?v=<?php echo time(); ?>">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="../Fonts/Roboto/Roboto-Regular.ttf" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
	<title>Health Care BD</title>
	<link rel="shortcut icon" type="image/png" href="../Images/favicon.png">
</head>
<body>
	<header >
		<div class="fluid-container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="icon">
			  <a class="navbar-brand" href="../HTML/AdminHome.php"><i class="fas fa-laptop-medical"></i>E HealthCareBD</a>
			</div>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			  	<ul class="navbar-nav ml-auto admin-nav" style="color: white;">
				    <li>
				      	<i class="far fa-bell"></i>
				     </li>
					<li>
						<i class="far fa-envelope"></i>
					</li>

					<li>
						<i class="far fa-bell"></i>
					</li>
			    </ul>
			  </div>
			</nav>
		</div>

	</header>
	<main class="admin">
		<section class="container">
					
					<?php if(isset($_SESSION["alert_failed"])){ ?>		
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					   <?php echo $_SESSION["alert_failed"]; ?>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
					<?php } ?>
					<?php if(isset($_SESSION["alert_success"])){ ?>		
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					   <?php echo $_SESSION["alert_success"]; ?>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
					<?php } ?>
						
					<div class="doctor-add" style="margin-top: 30px;">
						<div class="alert alert-success" role="alert" style="margin-top: 30px; margin-bottom: 0px;padding: 8px 0px 0px 15px;">
				  		<h4>Add Doctors</h4>
						</div>
						<form action="../PHP/AdddoctorDB.php" method="POST" enctype="multipart/form-data">
							<span class="inputs group" style="display: block;">
							<input type="text" name="fullname" placeholder="Fullname">
							<label class="error">*<?php 
							if(isset($_SESSION["fullname_error"]))
							{
								echo $_SESSION["fullname_error"];
							}
							?> </label>
							</span>

							<span class="inputs group" style="display: block;">
								<input type="text" name="Email" placeholder="Email">
								<label class="error">*<?php 
								if(isset($_SESSION["email_error"]))
								{
									echo $_SESSION["email_error"];
								}
								?> </label>
							</span>
							<span class="inputs group" style="display: block;">
								<input type="text" name="phone" placeholder="Phone">
								<label class="error">*<?php 
								if(isset($_SESSION["phone_error"]))
								{
									echo $_SESSION["phone_error"];
								}
								?> </label>
							</span>
							<span class="inputs group" style="display: block;">
								<input type="text" name="bmdc" placeholder="BMDC">
								<label class="error">*<?php 
								if(isset($_SESSION["bmdc_error"]))
								{
									echo $_SESSION["bmdc_error"];
								}
								?> </label>
							</span>
							<span class="inputs group" style="display: block;">
								<input type="text" name="visit" placeholder="Doctors Visit">
								<label class="error">*<?php 
								if(isset($_SESSION["visit_error"]))
								{
									echo $_SESSION["visit_error"];
								}
								?> </label>
							</span>
							<span class="inputs" style="display: block;">
								Specializations
								<select name="specilizations">
									<option hidden disabled selected value> -- select an option -- </option>

									<?php
										$spe_id=$_GET['id'];

										$sql="SELECT * from specializations";
										$result=mysqli_query($conn,$sql);
										if(mysqli_num_rows($result)>0)
										{
											while($row=mysqli_fetch_assoc($result)){?>

									<option value="<?=$row['specialization']?>"><?php echo $row['specialization']?></option>
									<?php
											}
										}
									 ?>
								</select>
								<label class="error">*<?php 
								if(isset($_SESSION["specilization_error"]))
								{
									echo $_SESSION["specilization_error"];
								}
								?> </label>
							</span>
							<span class="inputs group" style="display: block;">
								
								<input type="text" name="citys" placeholder="city"> 
									
								<label class="error">*<?php 
								if(isset($_SESSION["city_error"]))
								{
									echo $_SESSION["city_error"];
								}
								?> </label>
							</span>
							<span style="display: block;">
								<label>Gender </label>
								<input type="radio" name="gender" placeholder="BMDC" value="Male">
								<span>Male</span>
								<input type="radio" name="gender" placeholder="BMDC" value="Female">
								<span>Female</span>
								
								<label class="error">*<?php 
								if(isset($_SESSION["gender_error"]))
								{
									echo $_SESSION["gender_error"];
								}
								?> </label>
							</span>
							<span class="inputs" class="file" style="display: block;">
								<label>Doctor Photo</label>
								<input type="file" name="image" placeholder="Upload" >
								<label class="error">*<?php 
								if(isset($_SESSION["photo_error"]))
								{
									echo $_SESSION["photo_error"];
								}
								?> </label>
							</span>
							<span class="inputs" style="display: block;">
								<input  type="submit" class="btn btn-success" style="border-radius: 3px;" name="adddoctorSubmit">
							</span>
						</form>
					</div>
					
					<?php 
							unset($_SESSION['alert_success']);
							unset($_SESSION['alert_failed']);
							unset($_SESSION['fullname_error']);
							unset($_SESSION['email_error']);
							unset($_SESSION['phone_error']);
							unset($_SESSION['bmdc_error']);
							unset($_SESSION['visit_error']);
							unset($_SESSION['specilization_error']);
							unset($_SESSION['city_error']);
							unset($_SESSION['gender_error']);
							unset($_SESSION['photo_error']);
					 ?>
				
	</section>
</main>
	<script type="text/javascript" src="../Bootstrap/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="../Bootstrap/popper.min.css"></script>
	<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>