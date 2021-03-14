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
					  		<h4 style="display: inline-block;">Manage Educational</h4>
					  		<div style="position: absolute;display: inline-block; right:0; padding-right: 2rem;color:gray;font-size: 22px;" >
							  	<i class="fas fa-plus-circle"></i>
							  	<span><a href="addspecialization.php">Add New</a></span>
							 </div>
						</div>
						<table class="table table-hover table-dark table-sm text-center">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">Specialization</th>
						      <th scope="col">Update</th>
						      <th scope="col">Delete</th>			
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						    	$sql="SELECT * FROM specializations ";
						    	$result=mysqli_query($conn,$sql);
						    	if($result)
						    	{
						    		if(mysqli_num_rows($result)>0)
						    		{
						    			while ($row=mysqli_fetch_assoc($result)) {?>
									    <tr>
									      <th scope="row"><?php echo $row['spe_id']?></th>
									      <td><?php echo $row['specialization']?></td>
									      <td><a class="btn btn-primary" href="../HTML/UpdateSpecialization.php?id=<?=$row['spe_id']?>">Update</a></td>
									      <td><a class="btn btn-danger" href="../PHP/deleteSpecialization.php?id=<?=$row['spe_id']?>">Delete</a></td>
									    </tr>
						    	<?php
										}
						    		}
						    	}
						    	?>
						  </tbody>
						</table>

						<div class="alert alert-success" role="alert" style="margin-top: 30px; margin-bottom: 0px;padding: 8px 0px 0px 15px;">
					  		<h4 style="display: inline-block;">Manage Experience</h4>
					  		<div style="position: absolute;display: inline-block; right:0; padding-right: 2rem;color:gray;font-size: 22px;" >
							  	<i class="fas fa-plus-circle"></i>
							  	<span><span><a href="addDegree.php">Add New</a></span></span>
							 </div>
						</div>
						<table class="table table-hover table-dark table-sm text-center">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">Degrees</th>
						      <th scope="col">Update</th>
						      <th scope="col">Delete</th>			
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						    	$sql="SELECT * FROM degrees";
						    	$result=mysqli_query($conn,$sql);
						    	if($result)
						    	{
						    		if(mysqli_num_rows($result)>0)
						    		{
						    			while ($row=mysqli_fetch_assoc($result)) {?>
										    <tr>
										      <th scope="row"><?php echo $row['deg_id']?></th>
										      <td><?php echo $row['degree']?></td>
										      <td><a class="btn btn-primary" href="UpdateDegree.php?id=<?=$row['deg_id'] ?>">Update</a></td>
										      <td><a class="btn btn-danger" href="../PHP/degreeDelete.php?id=<?=$row['deg_id']?>">Delete</a></td>
										    </tr>
						    <?php
										}
						    		}
						    	}
						    	?>					   
						  </tbody>
						</table>

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