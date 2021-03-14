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
			
				
					
					<div class="container-fluid">
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
					  		<h4>Manage Appointments</h4>
						</div>
						<table class="table table-hover table-dark table-sm text-center">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">DoctorID</th>
						      <th scope="col">User ID</th>
						      <th scope="col">Full Name</th>						  
						      <th scope="col">Phone</th>
						      <th scope="col">AppointDate</th>
						      <th scope="col">AppointTime</th>
						      <th scope="col">AppointSlot</th>
						      <th scope="col">City</th>
						      <th scope="col">Age</th>
						      <th scope="col">Patient Type</th>
						      <th scope="col">Gender</th>
						      <th scope="col">Address</th>	
						      <th scope="col">problem</th>
						      <th scope="col">NID</th>
						      <th scope="col">Update</th>
						      <th scope="col">Delete</th>			
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						    	$sql="SELECT * FROM appointments order by appoint_id desc";
						    	$result=mysqli_query($conn,$sql);
						    	if($result)
						    	{
						    		if(mysqli_num_rows($result)>0)
						    		{	$date=date('Y-m-d');
						    			while ($row=mysqli_fetch_assoc($result)) {
						    				if($date<=$row['appoint_date'])
						    				{ 
						    				?>		
										    <tr >
										   	  <td><?php echo $row['appoint_id']?></td>
										      <td><?php echo $row['doc_id']?></td>
										      <td><?php echo $row['user_id']?></td>
										      <td><?php echo $row['fullname']?></td>
										      <td><?php echo $row['phone']?></td>
										      <td><?php echo $row['appoint_date']?></td>
										      <td><?php echo $row['appoint_slot']?></td>
										      <td><?php echo $row['appoint_time']?></td>
										      <td><?php echo $row['city']?></td>
										      <td><?php echo $row['age']?></td>
										      <td><?php echo $row['patient_type']?></td>
										      <td><?php echo $row['gender']?></td>
										      <td><?php echo $row['address']?></td>
										      <td><?php echo $row['problem']?></td>
										      <td><?php echo $row['nid']?></td>
										      <td><a class="btn btn-primary" href="../HTML/UpdateAppointmentAdmin.php?id=<?=$row['appoint_id']?>&doc_id=<?=$row['doc_id']?>">Update</a></td>
										      <td><a class="btn btn-danger" href="../PHP/AppointmentDelete.php?id=<?=$row['appoint_id']?>" onclick="return confirm('Do you want to delete this item')">Delete</a></td>
										    </tr>
										    <?php
											}
											else
												{  ?>

												  <tr style="color:gray;">
											   	  <td><?php echo $row['appoint_id']?></td>
											      <td><?php echo $row['doc_id']?></td>
											      <td><?php echo $row['user_id']?></td>
											      <td><?php echo $row['fullname']?></td>
											      <td><?php echo $row['phone']?></td>
											      <td><?php echo $row['appoint_date']?></td>
											      <td><?php echo $row['appoint_slot']?></td>
											      <td><?php echo $row['appoint_time']?></td>
											      <td><?php echo $row['city']?></td>
											      <td><?php echo $row['age']?></td>
											      <td><?php echo $row['patient_type']?></td>
											      <td><?php echo $row['gender']?></td>
											      <td><?php echo $row['address']?></td>
											      <td><?php echo $row['problem']?></td>
											      <td><?php echo $row['nid']?></td>
											      <td><a class="btn btn-primary" href="../HTML/UpdateAppointmentAdmin.php?id=<?=$row['appoint_id']?>&doc_id=<?=$row['doc_id']?>">Update</a></td>
											      <td><a class="btn btn-danger" href="../PHP/AppointmentDelete.php?id=<?=$row['appoint_id']?>" onclick="return confirm('Do you want to delete this item')">Delete</a></td>
											    </tr>
										<?php

												}	
										}
						    		}
						    	}
						    	?>						   
						  </tbody>
						</table>
					</div>
			<?php 
				unset($_SESSION["alert_failed"]);
				unset($_SESSION["alert_success"]);
			 ?>
		</div>
	</section>
</main>





	<script type="text/javascript" src="../Bootstrap/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="../Bootstrap/popper.min.css"></script>
	<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>