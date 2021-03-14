<?php
	include "../PHP/Connection.php";
	session_start();
	if(!isset($_SESSION['Adminlog']))
	{
		if(!isset($_COOKIE['Adminlog']))
		{
			header("Location:Adminlogin.php");
		}
	}

	extract($_SESSION);
	extract($_COOKIE);
	$username=$_SESSION['Adminlog'];
	$sql="SELECT * from admininfo where Username='$username'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_assoc($result);
		extract($row);
	}
?>



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
			<div class="icon" style="margin-left:0;">
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
	
		<section class="">
			<div class="row" >
				<div class="col-md-3 col-lg-3 col-sm-12" style="margin-top: 0;">
					<div class="menu">
						<ul>
							<li>
								<span style="font-size: 32px;font-weight: bold;"><i class="far fa-user-circle"></i></span>
								<span style="font-size: 32px;font-weight: bold;">
									<?php
										echo $username;
									?>
								</span>
							</li>
							<li>
								<span><i class="fas fa-chart-line"></i></span>
								<a href="">Dashboard</a>
							</li>
							<li>
								<span><i class="far fa-plus-square"></i></span>
								<a href="../HTML/Adddoctor.php">Add Doctor</a>
							</li>
							<li>
								<span><i class="fas fa-tasks"></i></span>
								<a href="Managedoctor.php">Manage Doctors</a>
							</li>
							<li>
								<span><i class="far fa-file-alt"></i></span>
								<a href="../HTML/Addinfo.php">Add Info</a>
							</li>
							<li>
								<span><i class="fas fa-hospital-user"></i></span>
								<a href="../HTML/appointmentlist.php">Appointment List</a>
							</li>
							<li>
								<span><i class="fas fa-users"></i></span>
								<a href="../HTML/user.php">User List</a>
							</li>
							<li>
								<span><i class="fas fa-cogs"></i></span>
								<a href="../HTML/AdminUsernamePassChange.php">Settings</a>
							</li>
							<li>
								<span><i class="fas fa-sign-out-alt"></i></span>
								<a href="../PHP/AdminLogOut.php">Log-Out</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-md-9 col-lg-9 col-sm-12">
					<div class="container-fluid">
						<section class="section1">
							<div class="container text-center">
								<div class="row">
									<div class="col-md-4 col-sm-6">
										<div class="rect">
											<h3>Doctors</h3>
											<p>3000</p>
										</div>
									</div>

									<div class="col-md-4 col-sm-6">
										<div class="rect">
											<h3>Patients</h3>
											<p>10,000</p>
										</div>
									</div>

									<div class="col-md-4 col-sm-6">
										<div class="rect">
											<h3>Reviews</h3>
											<p>7000</p>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>

					<div class="row container statistic">
						<div class="col-md-6 col-sm-12">
						<div class="patient-review container">
							<h4 style="font-weight: bold;">Patient Satisfaction</h4>
							<div class="row" style="margin-top: 25px;">
								<div class="col-md-3 col-sm-12">
									<span>Happy</span>
								</div>
								<div class="col-md-9 col-sm-12">
									<div >
										<div class="progress">
										  <div class="progress-bar" role="progressbar" style="width:50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
										</div>
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<span>Un-Happy</span>
								</div>
								<div class="col-md-9 col-sm-12">
									<div >
										<div class="progress">
										  <div class="progress-bar" role="progressbar" style="width:20%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">20%</div>
										</div>
									</div>
								</div>

								<div class="col-md-3 col-sm-12 ">
									<span>Neutral</span>
								</div>
								<div class="col-md-9 col-sm-12">
									<div>
										<div class="progress">
										  <div class="progress-bar" role="progressbar" style="width:30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">30%</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-12 container">
						<div class="patient-review container">
							<h4>Patient Presence</h4>
							<div class="presence">
								<div>
									<span>December</span>
									<span>
										<div class="progress">
										  <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
										</div>
									</span>
								</div>
								<div>
									<span>November</span>
									<span>
										<div class="progress">
										  <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
										</div>
									</span>
								</div>

								<div>
									<span>September</span>
									<span>
										<div class="progress">
										  <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
										</div>
									</span>
								</div>
							</div>
						</div>
					</div>
					</div>
					
				</div>
			</div>
		</section>
	</main>





	<script type="text/javascript" src="../Bootstrap/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="../Bootstrap/popper.min.css"></script>
	<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>