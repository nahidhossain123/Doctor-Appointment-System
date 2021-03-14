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
	$id=$_GET['id'];
	if(!isset($id))
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
</head>
<body>
	<header >
		<div class="fluid-container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="icon" style="margin: 0;">
			  <a class="navbar-brand" href="AdminHome.php"><i class="fas fa-laptop-medical"></i>E HealthCareBD</a>
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

                    <a href="../HTML/Managedoctor.php" style="padding: 8px 20px;border-radius: 4px;" class="btn btn-primary"><span>
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
					  		<h4 style="display: inline-block;">Manage Educational</h4>
					  		<div style="position: absolute;display: inline-block; right:0; padding-right: 2rem;color:gray;font-size: 22px;" >
							  	<i class="fas fa-plus-circle"></i>
							  	<span><a href="Addeducational.php?id=<?php echo $_GET['id'] ?>">Add New</a></span>
							 </div>
						</div>
						<table class="table table-hover table-dark table-sm text-center">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">Degree</th>
						      <th scope="col">College Name</th>
						      <th scope="col">Year</th>	
						      <th scope="col">Update</th>
						      <th scope="col">Delete</th>			
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						    	$sql="SELECT * FROM doctors_educational where doc_id='$id'";
						    	$result=mysqli_query($conn,$sql);
						    	if($result)
						    	{
						    		if(mysqli_num_rows($result)>0)
						    		{
						    			while ($row=mysqli_fetch_assoc($result)) {?>
									    <tr>
									      <th scope="row"><?php echo $row['doc_edu_id']?></th>
									      <td><?php echo $row['degree']?></td>
									      <td><?php echo $row['college']?></td>
									      <td><?php echo $row['year']?></td>
									      <td><a class="btn btn-primary" href="../HTML/UpdateEducational.php?id=<?=$row['doc_edu_id']?>&doc_id=<?=$id?>">Update</a></td>
									      <td><a class="btn btn-danger" href="../PHP/deleteeducational.php?id=<?=$row['doc_edu_id']?>&doc_id=<?=$id?>">Delete</a></td>
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
							  	<span><span><a href="Addexperience.php?id=<?php echo $_GET['id'] ?>">Add New</a></span></span>
							 </div>
						</div>
						<table class="table table-hover table-dark table-sm text-center">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">Medical Name</th>
						      <th scope="col">Position</th>
						      <th scope="col">Year</th>
						      <th scope="col">Update</th>
						      <th scope="col">Delete</th>			
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						    	$sql="SELECT * FROM doctors_experience where doc_id='$id'";
						    	$result=mysqli_query($conn,$sql);
						    	if($result)
						    	{
						    		if(mysqli_num_rows($result)>0)
						    		{
						    			while ($row=mysqli_fetch_assoc($result)) {?>
										    <tr>
										      <th scope="row"><?php echo $row['doc_exper_id']?></th>
										      <td><?php echo $row['medical_name']?></td>
										      <td><?php echo $row['position']?></td>
										      <td><?php echo $row['year']?></td>
										      <td><a class="btn btn-primary" href="Updateexperience.php?id=<?=$row['doc_exper_id']?>&doc_id=<?=$id?>">Update</a></td>
										      <td><a class="btn btn-danger" href="../PHP/deleteExperience.php?id=<?=$row['doc_exper_id']?>&doc_id=<?=$id?>">Delete</a></td>
										    </tr>
						    <?php
										}
						    		}
						    	}
						    	?>						   
						  </tbody>
						</table>

						<div class="alert alert-success" role="alert" style="margin-top: 30px; margin-bottom: 0px;padding: 8px 0px 0px 15px;">
					  		<h4 style="display: inline-block;">Manage Office Hour</h4>
					  		<div style="position: absolute;display: inline-block; right:0; padding-right: 18rem;color:gray;font-size: 22px;" >
							  	<i class="fas fa-plus-circle"></i>
							  	<span><a href="Addofficehour.php?id=<?php echo $_GET['id'] ?>">Add New</a></span>
							 </div>
							 <div style="position: absolute;display: inline-block; right:0; padding-right: 10rem;color:gray;font-size: 22px;" >
							  	<i class="far fa-edit"></i>
							  	<span><a href="../HTML/Updateofficehour.php?doc_id=<?=$id?>">Update</a></span>
							 </div>
							 <div style="position: absolute;display: inline-block; right:0; padding-right: 2rem;color:gray;font-size: 22px;" >
							  	<i class="fas fa-trash-alt"></i>
							  	<span><a href="../PHP/deleteOfficehour.php?id=<?=$id ?>">Delete</a></span>
							 </div>
						</div>
						<table class="table table-hover table-dark table-sm text-center">
						  <thead>
						    <tr>
						      <th scope="col">Day</th>
						      <th scope="col">Time</th>
						      <th scope="col">Capacity</th>
						     		
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						    	$sql="SELECT * FROM doc_officehour where doc_id='$id'";
						    	$result=mysqli_query($conn,$sql);
						    	if($result)
						    	{
						    		if(mysqli_num_rows($result)>0)
						    		{
						    			while ($row=mysqli_fetch_assoc($result)) {?>
										    <tr>
												<td><?php echo $row['Day']?></td> 
												<td><?php echo $row['Time']?></td>  
												<td><?php echo $row['Capacity']?></td>
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
						unset($_SESSION["alert_success"]);
						unset($_SESSION["alert_failed"]);
					 ?>
		</div>
	</section>
</main>





	<script type="text/javascript" src="../Bootstrap/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="../Bootstrap/popper.min.css"></script>
	<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>