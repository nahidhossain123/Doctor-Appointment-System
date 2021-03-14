<?php
	include '../PHP/Connection.php';
	session_start();
	if(!isset($_SESSION['Adminlog']))
	{
		if(!isset($_COOKIE['Adminlog']))
		{
			header("Location:Adminlogin.php");
		}
	}
	$doc_edu_id=$_GET['id'];
	$doc_id=$_GET['doc_id'];
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
					<div class="col-lg-4 col-sm-12 text-center" style="margin-top: 30px; margin-bottom: 20px;">

                    <a href="../HTML/Doctorprofilemanage.php?id=<?=$doc_id?>" style="padding: 8px 20px;border-radius: 4px;" class="btn btn-primary"><span>
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </span>Back
                    </a>
                	</div>
	
		<section class="doctor-manage">
			
					<?php

						$sql="SELECT * from doctors_educational";
						$result=mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0)
							{
								$row=mysqli_fetch_assoc($result);
							}
						 ?>
					
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
					  		<h4 style="display: inline-block;">Update Educational</h4>
						</div>
						
							
								<form style="padding-top:20px;" method="POST" action="../PHP/updateEducational.php?id=<?php $doc_edu_id ?>">
								  <div class="form-row text-center">
								  	<input type="hidden" name="doc_id" value="<?=$row['doc_id'] ?>">
								  	<div class="col-2">
								  		<label>Degree</label>
								      <input name="degrees" type="text" value="<?=$row['degree'] ?>">
								      <label style="color:red;"><?php 
								      if(isset($_SESSION['degree_error']))
								      {
								      	echo $_SESSION['degree_error'];
								      }								    
								      ?></label>
								    </div>
								    <div class="col-5">
								    	<label>College Name</label>
								      <input name="collegename" type="text" style="padding: 5px;" class="form-control" placeholder="Dhaka Medical College" value="<?=$row['college'] ?>">
								       <label style="color:red;"><?php 
								      if(isset($_SESSION['college_error']))
								      {
							      		echo $_SESSION['college_error'];
								      }								    
								      ?></label>
								    </div>
								    <div class="col-3">
								    	<label>Year</label>
								      <input name="year" type="text" style="padding: 5px;" class="form-control" placeholder="2019" value="<?=$row['year'] ?>">
								      <label style="color:red;"><?php 
								      if(isset($_SESSION['year_error']))
								      {
								      	echo $_SESSION['year_error'];
								      }								    
								      ?></label>
								    </div>
								    <div class="col-2" >
								    	<label>Submit</label>
									<input type="submit" name="doc_eduUP_sub"  class="btn btn-primary" style="width: 100%;border-radius: 3px;">
								  	</div>
								  </div>
								  
								</form>
								
							
						<?php 
							unset($_SESSION['alert_success']);
							unset($_SESSION['alert_failed']);
							unset($_SESSION['degree_error']);
							unset($_SESSION['college_error']);
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