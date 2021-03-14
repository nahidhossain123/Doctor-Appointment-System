<?php
	session_start();
	$id=$_GET['id'];
	if(!isset($_SESSION['Adminlog']))
	{
		if(!isset($_COOKIE['Adminlog']))
		{
			header("Location:Adminlogin.php");
		}
	}
	if(!isset($_GET['id']))
	{
		header("Location:../HTML/AdminHome.html");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="../Fonts/Roboto/Roboto-Regular.ttf" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
	<title>Health Care BD</title>
	<link rel="shortcut icon" type="image/png" href="../Images/favicon.png">
	<style type="text/css">
		input{
			border-radius: 5px;
			border:none;
			padding: 5px;
		}
	</style>
</head>
<body>
	<header >
		<div class="fluid-container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="icon" style="margin: 0;">
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
					<div class="col-lg-4 col-sm-12 text-center" style="margin-top: 30px;">

                    <a href="../HTML/Doctorprofilemanage.php?id=<?=$id?>" style="padding: 8px 20px;border-radius: 4px;" class="btn btn-primary"><span>
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </span>Back
                    </a>
                </div>
		<section class="doctor-manage">
			
				
					
					<div class="container">
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
						<div class="alert alert-success" role="alert" style="margin-top: 30px; margin-bottom: 0px;padding: 8px 0px 0px 15px;">
					  		<h4 style="display: inline-block;">Add Office Hour</h4>
						</div>
						<form method="POST" action="../PHP/adddoctorOfficehour.php?id=<?php echo $_GET['id'] ?>">
							<table class="table table-hover table-dark table-sm text-center">
							  <thead>
							    <tr>
							      <th scope="col">Day</th>
							      <th scope="col">Time</th>
							      <th scope="col">Capacity</th>
							     		
							    </tr>
							  </thead>
							  <tbody>
							  							  								  	
								    <tr>
								      <tr>
								      <td>Saturday</td>
								      <td><input name="satime" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Time"></td>   
										<td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Capacity"></td>
								    </tr>
								    <tr>
										<td>Sunday</td> 
										<td><input name="sutime" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Time"></td>
										<td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Capacity"></td>
								    </tr>
								    <tr>
								      <td>Monday</td> 
								      <td><input name="montime" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Time"></td> 
										<td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Capacity"></td>   
								    </tr>
								    <tr>
										<td>Tuesday</td>
										<td><input name="tutime" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Time"></td>
										<td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Capacity"></td>  
								    </tr>
								    <tr>
								      <td>Wednesday</td>  
								      <td><input name="wedtime" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Time"></td> 
										<td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Capacity"></td> 
								    </tr>
								    <tr>
										<td>Thursday</td> 
										<td><input name="thtime" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Time"></td> 
										<td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Capacity"></td>  
								    </tr>
								    <tr>
										<td>Friday</td> 
										<td><input name="frtime" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Time"></td>
										<td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control" placeholder="Enter Capacity"></td>
								    </tr>
							  </tbody>
							</table>
							<input type="submit" name="officehoursub" class="btn btn-primary" >
						</form>
					</div>
					<?php 
						unset($_SESSION['alert_success']);
						unset($_SESSION['alert_failed']);
					 ?>
		</div>
	</section>
</main>





	<script type="text/javascript" src="../Bootstrap/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="../Bootstrap/popper.min.css"></script>
	<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>