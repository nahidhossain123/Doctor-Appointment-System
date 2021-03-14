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
			      <li class="nav-item active">
			        <a class="nav-link" style="padding-right: 30px" href="../HTML/Index.php">Home <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
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
					    <a class="dropdown-item" style="color: black !important;" href="../HTML/Patientprofile.php">Account</a>
					    <a class="dropdown-item" style="color: black !important;" href="#">Settings</a>
					    <a class="dropdown-item" style="color: black !important;" href="../PHP/Logout.php">Log-Out</a>
					    
					  </div>
					</div>
			    </div>	
				<?php } 
					else{ 
				?>
			    <div class="nav-item">
			    	<a href="../HTML/Login.php" class="btn btn-outline-primary">Log In/Sign Up</a>
			    </div>
			    <?php } ?>
			  </div>
			</nav>
		</div>

		<div class="container text-center">
			<div class="row">
				<div class="col-md-5 col-sm-12 px-10">
					<h1>We provide Best services</h1>
					<p>This is a medical related website. From this website you can take appoinment of any doctor all over the Bangladesh. Here you can find all the skilled,well trained and wise doctors.Search your doctos of your area and take an appionment.</p>
					<a href="#" class="btn btn-info">Read More</a>
				</div>
				<div class="col-md-7 col-sm-12">
					<img src="../Images/medical.jpg">
				</div>
				
			</div>
		</div>

	</header>
	<main>
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

		<section class="section2">
			<div class="container">
				<div class="heading">
					<h4>Top Doctors Based On User Review</h4>
				</div>
				<div class="row">
					<?php $sql="SELECT * FROM doctors";
						$result=mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{				
					?>

					<div class="col-md-6 col-xl-3 col-lg-6 col-sm-12">
						<div class="card" style="width: 17rem;">
						  <div class="card-item">
							  <img height="200" width="150" src="<?php echo $row['doc_photo'] ?>" class="card-img-top" alt="...">
							  <div class="card-body">
							    <h5 class="card-title"><?php echo $row['fullname'] ?></h5>
							    <p class="card-text"<?php echo $row['specialization'] ?></p>
							    <p class="card-text">
							    	<span class="rating"><i class="fas fa-star"></i>
							    		<i class="fas fa-star"></i>
							    		<i class="fas fa-star"></i>
							    		<i class="fas fa-star"></i>
							    		<i class="fas fa-star"></i>
							    		<i class="fas fa-star-half-alt"></i>
							    	 5</span>
							    	<span>৳<?php echo $row['visit'] ?></span>
							    	<span><i class="fas fa-map-marker-alt"></i><?php echo $row['city'] ?>,Bangladesh</span>
							    </p>
							    <div  class="d-flex flex-row justify-content-center">
							    		<a href="../HTML/Appointment.php?doc_id=<?=$row['doc_id']?>" class="btn btn-success">Appionment</a>
							    		<a href="../HTML/Doctorprofile.php?doc_id=<?=$row['doc_id']?>" class="btn btn-outline-success ml-2">View Profile</a>
							    </div>
							    
							  </div>
							</div>
						</div>
					</div>

					<?php			
								}
							}
						
					?>




				</div>

				<div class="bottom">
					<a href="../HTML/Doctor2.php"><h4>Find More Doctor...</h4></a>
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
						<?php 
							if(!isset($_SESSION['username']) && !isset($_COOKIE['username']))
							{			
						?>
						<li>
							<a href="../HTML/AdminHome.php">Admin</a>
						</li>
						<?php	} ?>
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