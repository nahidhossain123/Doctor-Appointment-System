<?php
	session_start();
	include '../PHP/Connection.php';
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


	<header>
		<div class="fluid-container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<div class="icon">
			  <a class="navbar-brand" href="#"><i class="fas fa-laptop-medical"></i>E HealthCareBD</a>
			</div>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item">
			        <a class="nav-link" style="padding-right: 30px" href="../HTML/index.php">Home <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item ">
			        <a class="nav-link" style="padding-right: 30px" href="../HTML/Doctor2.php">Doctors</a>
			      </li>

			      <li class="nav-item">
			        <a class="nav-link" style="padding-right: 30px" href="../HTML/Contact.php">Contact</a>
			      </li>

			       <li class="nav-item">
			        <a class="nav-link" style="padding-right: 30px" href="../HTML/About.php">About</a>
			      </li>
			    </ul>
			    <?php if(isset($_SESSION['username'])){ ?>
			    <div class="nav-item">
			    	<div class="btn-group">
					  <button type="button" class="btn btn-danger"><i style="margin-top: 5px;" class="fas fa-user-circle"></i><?php echo $_SESSION['username'] ?></button>
					  <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <div class="dropdown-menu">
					    <a class="dropdown-item" style="color: black !important;" href="#">Account</a>
					    <a class="dropdown-item" style="color: black !important;" href="#">Settings</a>
					    <a class="dropdown-item" style="color: black !important;" href="#">Log-Out</a>
					    
					  </div>
					</div>
			    </div>	
				<?php } 
					else{ 
				?>
			    <div class="nav-item">
			    	<a href="../HTML/Login.html" class="btn btn-outline-primary">Log In/Sign Up</a>
			    </div>
			    <?php } ?>
			  </div>
			</nav>
		</div>

	</header>

	<?php
		$doc_id=$_GET['doc_id'];
		$sql="SELECT * FROM doctors where doc_id='$doc_id' ";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$row=mysqli_fetch_assoc($result);
		}
	?>

	<main class="docporfile">
		<section class="section1 container">
			<div class="row">
				<div class="col-md-3 col-sm-12">
					<img src="<?php echo $row['doc_photo'] ?>" height="230" width="200">
				</div>

				<div class="col-md-9 col-sm-12 section2" style="margin-top: 33px;">
					<div>
					    <h5 class="card-title"><?php echo $row['fullname'] ?></h5>
					    <p class="card-text"><?php echo $row['specialization'] ?></p>
					    <p class="card-text">
					    	<span class="rating"><i class="fas fa-star"></i>
					    		<i class="fas fa-star"></i>
					    		<i class="fas fa-star"></i>
					    		<i class="fas fa-star"></i>
					    		<i class="fas fa-star"></i>
					    		<i class="fas fa-star-half-alt"></i>
					    	 5</span>
					    	<span>৳<?php echo $row['visit'] ?></span>
					    	<span><i class="fas fa-map-marker-alt"></i> <?php echo $row['city'] ?>,Bangladesh</span>
					    </p>
					    <div  >
							<a href="../HTML/Appointment.php?doc_id=<?=$row['doc_id']?>" class="btn btn-success">Appionment</a>
						</div>
					</div>
				</div>
			</div>

			<div class="tab" style="margin-top: 50px;">
				<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
				  <li class="nav-item" role="presentation">
				    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Overview</a>
				  </li>
				  <li class="nav-item" role="presentation">
				    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rewviews</a>
				  </li>
				  <li class="nav-item" role="presentation">
				    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Office Hour</a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active container overview" id="home" role="tabpanel" aria-labelledby="home-tab">
				  	<div class="tab1-item">
				  		<h3>Education</h3>
				  			<?php
							$doc_id=$_GET['doc_id'];
							$sql="SELECT * FROM doctors_educational where doc_id='$doc_id' ";
							$result=mysqli_query($conn,$sql);
							if(mysqli_num_rows($result)>0)
							{
								while($row=mysqli_fetch_assoc($result))
								{

							?>
				  			<p>
					  			<span><?php echo $row['college'] ?></span>
					  			<span><?php echo $row['degree'] ?></span>
					  			<span><?php echo $row['year'] ?></span>
				  			</p>

				  			<?php
				  				}
				  			}
				  			else
				  			{
				  				echo "<p><span>No Info Found</span></p>";
				  			}
							?>
		
				  	</div>

				  	<div class="tab1-item">
				  		<h3>Experience</h3>
				  		<?php
							$doc_id=$_GET['doc_id'];
							$sql="SELECT * FROM doctors_experience where doc_id='$doc_id' ";
							$result=mysqli_query($conn,$sql);
							if(mysqli_num_rows($result)>0)
							{
								while($row=mysqli_fetch_assoc($result))
								{

							?>
				  			<p>
					  			<span><?php echo $row['position']." At ".$row['medical_name'] ?></span>
					  			<span><?php echo $row['year'] ?></span>
				  			</p>

				  			<?php
				  				}
				  			}
				  			else
				  			{
				  				echo "<p><span>No Info Found</span></p>";
				  			}
							?>
				  	</div>


				  	<div class="tab1-item">
				  		<h3>Specializations</h3>
				  		<?php
							$doc_id=$_GET['doc_id'];
							$sql="SELECT * FROM doctors where doc_id='$doc_id' ";
							$result=mysqli_query($conn,$sql);
							if(mysqli_num_rows($result)>0)
							{
								$row=mysqli_fetch_assoc($result)
							?>
				  			<p>
					  			<span><?php echo $row['specialization'] ?></span>
				  			</p>

				  			<?php
				  			}
				  			else
				  			{
				  				echo "<p><span>No Info Found</span></p>";
				  			}
							?>
				  	</div>
				  	<div class="tab1-item">
				  		<h3>Member</h3>
				  		<?php
							$doc_id=$_GET['doc_id'];
							$sql="SELECT * FROM doctors where doc_id='$doc_id' ";
							$result=mysqli_query($conn,$sql);
							if(mysqli_num_rows($result)>0)
							{
								$row=mysqli_fetch_assoc($result)
							?>
				  			<p>
					  			<span><?php echo "From ".$row['today_date'] ?></span>
				  			</p>

				  			<?php
				  			}
				  			else
				  			{
				  				echo "<p><span>No Info Found</span></p>";
				  			}
							?>
				  	</div>
				  </div>
				  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				  	<div style="margin-top: 30px;">
				  		<h3>No rewiew found</h3>
				  	</div>
				  </div>
				  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				  	
				  	<div class="container" style="width: 50%;" >
				  		<table class="table table-hover table-dark">
						  <thead>
						    <tr>
						      <th scope="col">Day</th>
						      <th scope="col">Hour</th>
						      <th scope="col">Capacity</th>
						    </tr>
						  </thead>
						  <tbody>

						  	<?php
							$doc_id=$_GET['doc_id'];
							$sql="SELECT * FROM doc_officehour where doc_id='$doc_id' ";
							$result=mysqli_query($conn,$sql);
							if(mysqli_num_rows($result)>0)
							{
								while($row=mysqli_fetch_assoc($result))
								{

							?>
				  			 <tr>
						      <td><?php echo $row['Day'] ?></td>
						      <td><?php echo $row['Time'] ?></td> 
						      <td><?php echo $row['Capacity'] ?></td> 
						    </tr>

				  			<?php
				  				}
				  			}
				  			else
				  			{
				  				echo "<tr><td>No Info Found</td></tr>";
				  			}
							?>
						    
						  </tbody>
						</table>
				  	</div>

				  </div>
				</div>
			</div>

		</section>
	</main>
	
	<footer>
		<div class="container-fluid">
			<div class="container">

				<div class="row">
				<div class="col-md-3 col-sm-12">
					<h4>Useful Links</h4>
					<ul>
						<li>
							<a href="#/">Contact Us</a>
						</li>
						<li>
							<a href="#/">About Us</a>
						</li>
						<li>
							<a href="#/">Privacy</a>
						</li>
						<li>
							<a href="#/">Terms</a>
						</li>
					</ul>
						
					
				</div>

				<div class="col-md-6 col-sm-12">
					<h4>Our Vision</h4>
					<P>Our vision is to make health care services more easier. As this is the age of internet so it will be easy for everyone to get an appionment of a preffered doctor according to patient requirment.</P>
					<h5 style="color: whitesmoke">&copy All Right Reserved</h5>
				</div>

				<div class="col-md-3 col-sm-12">
					<h4>Follow Us</h4>
					<i class="fab fa-facebook-square fa-2"></i>
					<i class="fab fa-twitter-square"></i>
					<i class="fab fa-instagram-square"></i>
					<i class="fab fa-youtube-square"></i>
				</div>
			</div>
				
			</div>
			
		</div>
	</footer>

	<script type="text/javascript" src="../Bootstrap/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="../Bootstrap/popper.min.css"></script>
	<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>