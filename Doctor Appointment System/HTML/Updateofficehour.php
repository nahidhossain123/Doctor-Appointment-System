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
	
					<div class="col-lg-4 col-sm-12 text-center" style="margin-top: 30px; margin-bottom: 20px;">

                    <a href="../HTML/Doctorprofilemanage.php?id=<?=$doc_id?>" style="padding: 8px 20px;border-radius: 4px;" class="btn btn-primary"><span>
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </span>Back
                    </a>
                	</div>
		<section class="doctor-manage">
				
					
					<?php
						$id=$_GET['doc_id'];
						$days=array();
						$times=array();
						$i=0;
				    	$sql="SELECT * FROM doc_officehour where doc_id='$id'";

				    	$result=mysqli_query($conn,$sql);
				    	if($result)
				    	{

				    		if(mysqli_num_rows($result)>0)
				    		{
				    			while ($row=mysqli_fetch_assoc($result)) {
								    
								    $times[$i]=$row['Time'];
								    $days[$i]=$row['Day'];
								    $capacity[$i]=$row['Capacity'];
								    $i++;
								}
								$no_data=1;
				    		}
				    		else{
				    			$_SESSION['alert_failed']="There is no data to Update";
				    			$no_data=0;
				    			header("Location:../HTML/Doctorprofilemanage.php?id=$id");
				    		}
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
					  		<h4 style="display: inline-block;">Update Office Hour</h4>
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
						  	<form action="../PHP/updateOfficehour.php?id=<?php echo $id ?>" method="POST">
						    <tr>
						      <tr>
						      <td><?php echo $days[0] ?></td>
						      <td><input name="satime" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $times[0] ?>"></td>  
						      <td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $capacity[0] ?>"></td>
						    </tr>
						    <tr>
								<td><?php echo $days[1] ?></td> 
								<td><input name="sutime" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $times[1] ?>"></td>
								<td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $capacity[1] ?>"></td>
						    </tr>
						    <tr>
						      <td><?php echo $days[2] ?></td> 
						      <td><input name="montime" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $times[2] ?>"></td>  
						      <td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $capacity[2] ?>"></td> 
						    </tr>
						    <tr>
								<td><?php echo $days[3] ?></td>
								<td><input name="tutime" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $times[3] ?>"></td> 
								<td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $capacity[3] ?>"></td>  
						    </tr>
						    <tr>
						      <td><?php echo $days[4] ?></td>  
						      <td><input name="wedtime" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $times[4] ?>"></td>
						      <td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $capacity[4] ?>"></td>  
						    </tr>
						    <tr>
								<td><?php echo $days[5] ?></td> 
								<td><input name="thtime" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $times[5] ?>"></td> 
								<td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $capacity[5] ?>"></td> 
						    </tr>
						    <tr>
								<td><?php echo $days[6] ?></td> 
								<td><input name="frtime" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $times[6] ?>"></td>
								<td><input name="Capacity[]" class="text-center" style="width: 50%;" type="text" class="form-control"  value="<?php echo $capacity[6] ?>"></td>
						    </tr>
						    
						  </tbody>
						</table>
							<input type="submit" name="doc_officehourup_sub" value="Update" class="btn btn-primary">
							</form>
					</div>

					<?php if($no_data==1)
					{ 
						
						unset($_SESSION['alert_success']);
						unset($_SESSION['alert_failed']);
					 	
					}?>
					
		</div>
	</section>
</main>





	<script type="text/javascript" src="../Bootstrap/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="../Bootstrap/popper.min.css"></script>
	<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>