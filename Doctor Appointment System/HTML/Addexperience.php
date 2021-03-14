<?php
	session_start();
	if(!isset($_SESSION['Adminlog']))
	{
		if(!isset($_COOKIE['Adminlog']))
		{
			header("Location:Adminlogin.php");
		}
	}
	$doc_id=$_GET['id'];
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

                    <a href="../HTML/Doctorprofilemanage.php?id=<?=$doc_id?>" style="padding: 8px 20px;border-radius: 4px;" class="btn btn-primary"><span>
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
					  		<h4 style="display: inline-block;">Add Experience</h4>
						</div>
								
							
								<form style="padding-top:20px;" action="../PHP/AdddoctorEx.php?id=<?php echo $_GET['id'] ?>" method="POST">
								  <div class="form-row text-center">
								  	<div class="col-2">
								    	<label>Medical Name</label>
								      <input type="text" name="medical" style="padding: 5px;" class="form-control" placeholder="e.g Dhaka Medical College">
								      <label style="color:red;"><?php 
								      if(isset($_SESSION['medical_error']))
								      {
								      	echo $_SESSION['medical_error'];
								      }								    
								      ?></label>
								    </div>
								    <div class="col-5">
								    	<label>Position</label>
								      <input type="text" name="position" style="padding: 5px;" class="form-control" placeholder="e.g Doctor/Intern-Doctor">
								      <label style="color:red;"><?php 
								      if(isset($_SESSION['position_error']))
								      {
								      	echo $_SESSION['position_error'];
								      }								    
								      ?></label>
								    </div>
								    <div class="col-3">
								    	<label>Year</label>
								      <input type="text" name="year" style="padding: 5px;" class="form-control" placeholder="e.g 2019-2020">
								      <label style="color:red;"><?php 
								      if(isset($_SESSION['year_error']))
								      {
								      	echo $_SESSION['year_error'];
								      }								    
								      ?></label>
								    </div>
								    <div class="col-2" >
								    	<label>Submit</label>
									<input type="submit" name="experienceSubmit"  class="btn btn-primary" style="width: 100%;border-radius: 3px;" value="Add">
								  	</div>
								  </div>
								  
								</form>	
								<?php 
									unset($_SESSION['alert_success']);
									unset($_SESSION['alert_failed']);
									unset($_SESSION['medical_error']);
									unset($_SESSION['position_error']);
									unset($_SESSION['year_error']);
								 ?>
					</div>
			
		</div>
	</section>
</main>





	<script type="text/javascript" src="../Bootstrap/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="../Bootstrap/popper.min.css"></script>
	<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>