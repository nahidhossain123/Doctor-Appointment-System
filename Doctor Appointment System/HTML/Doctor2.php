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
			      <li class="nav-item active">
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
					    <a class="dropdown-item" style="color: black !important;" href="#">Log-Out</a>
					    
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

	</header>
	<main class="doc">
		<section class="doc-section1">
			<div class="offer">
				<h3>20% Off 0n Every Services from 22-30 Dec</h3>
			</div>
		</section>
		<section class=" section2" style="margin-left: 4rem; margin-right: 3rem;">
			<div class="row">
				<div class="col-md-3 col-lg-3 col-sm-12 heading" style="margin-top: 0;">
					<h3 style="font-weight: bold; margin-top: 10px; letter-spacing:5px">Filter</h3>
					<form action="../HTML/Doctor2.php" method="POST">
					<div>
						<h5 style="color: whitesmoke;margin-top: 30px;">Division</h5>
							<ul class="list-group">
							<?php 
								$sql="SELECT DISTINCT city FROM doctors ";
								$result=mysqli_query($conn,$sql);

								if(mysqli_num_rows($result)>0)
								{
									while($row=mysqli_fetch_assoc($result))
									{
							 ?>
								<li class="list-group-item">
									<div style="color: black;" class="form-check">
										<label  class="form-check-label">
											<input id="city" type="checkbox" class="form-check-input" name="city[]" value="<?php echo $row['city'] ?>"><?php echo $row['city'] ?>
										</label>
									</div>
								</li>
							<?php 

								}
							}
							?>
							</ul>
						
					</div>

					<div>
						<h5 style="color: whitesmoke;margin-top: 30px;">Specializations</h5>
						<ul class="list-group">
							<?php 
								$sql="SELECT DISTINCT specialization FROM doctors ";
								$result=mysqli_query($conn,$sql);

								if(mysqli_num_rows($result)>0)
								{
									while($row=mysqli_fetch_assoc($result))
									{
							 ?>
								<li class="list-group-item">
									<div style="color: black;" class="form-check">
										<label  class="form-check-label">
											<input id="city"  type="checkbox" class="form-check-input" name="spe[]" value="<?php echo $row['specialization'] ?>"><?php echo $row['specialization'] ?>
										</label>
									</div>
								</li>
							<?php 

								}
							}
							?>
							</ul>
					</div>

					<div>
						<h5 style="color: whitesmoke;margin-top: 30px;">Degree</h5>
						<ul class="list-group">
							<?php 
								$sql="SELECT DISTINCT degree FROM doctors_educational ";
								$result=mysqli_query($conn,$sql);

								if(mysqli_num_rows($result)>0)
								{
									while($row=mysqli_fetch_assoc($result))
									{
							 ?>
								<li class="list-group-item">
									<div style="color: black;" class="form-check">
										<label  class="form-check-label">
											<input  type="checkbox" class="form-check-input" name="deg[]" value="<?php echo $row['degree'] ?>"><?php echo $row['degree'] ?>
										</label>
									</div>
								</li>
							<?php 

								}
							}
							?>
							</ul>
					</div>

					<div>
						<h5 style="color: whitesmoke;margin-top: 30px;">Consultation Fee</h5>
						<ul class="list-group">
							<?php 
								$sql="SELECT DISTINCT visit FROM doctors ";
								$result=mysqli_query($conn,$sql);

								if(mysqli_num_rows($result)>0)
								{
									while($row=mysqli_fetch_assoc($result))
									{
							 ?>
								<li class="list-group-item">
									<div style="color: black;" class="form-check">
										<label  class="form-check-label">
											<input  type="checkbox" class="form-check-input" name="fee[]" value="<?php echo $row['visit'] ?>"><?php echo $row['visit'] ?>
										</label>
									</div>
								</li>
							<?php 

								}
							}
							?>
							</ul>
					</div>
					<br>
					<input type="submit" class="btn btn-danger" name="Filter" value="F i l t e r" >
					</form>
				</div>

				<div class="col-md-9 col-lg-9 col-sm-12">
					<section class="section2">
						<div class="container">
							<div class="heading" style="margin-top: 0;">
								<div class="row">
									<div class="col-4">
										<div class="doc-title">
											<h4>Our Best Doctors</h4>
										</div>
									</div>

									<div class="col-8">
										<div>
											<form class="form-inline" action="../HTML/Doctor2.php" method="POST">
										    <input class="form-control outline-success" type="search" placeholder="Search" aria-label="Search" name="search">
										    <input type="submit" name="searchsub" class="btn btn-outline-success search-btn" value="Search">
											</form>
										</div>
									</div>	
								</div>
							</div>
							<div class="row row-cols-1 row-cols-md-3">
							
					<?php
					 
						
						$sql="SELECT * FROM doctors";

						if(isset($_POST['searchsub']) && !empty($sql))
						{
							$searchvalue=$_POST['search'];
							$searchs=explode(" ", $searchvalue);
							$str=str_replace(" ", "%", $searchvalue);
							$sql.=" WHERE searchkey LIKE '%$str%'";
						}

						if(isset($_POST['Filter']))
						{
							$sql="SELECT * FROM doctors where city!=''";
							if(isset($_POST['city']))
							{
								$citys=$_POST['city'];
								$city=implode("','", $citys);
								$sql.=" AND city IN('".$city."')";
							}
							if(isset($_POST['spe']))
							{
								$spes=$_POST['spe'];
								$spe=implode("','", $spes);
								$sql.=" AND specialization IN('".$spe."')";
							}
							if(isset($_POST['deg']))
							{

								$sql1="SELECT doc_id FROM doctors_educational where degree!=''";
								$degs=$_POST['deg'];
								$deg=implode("','", $degs);
								$sql1.=" AND degree IN('".$deg."')";
								$result1=mysqli_query($conn,$sql1);
								$docs=array();
								$i=0;
								if(mysqli_num_rows($result1)>0)
								{
									while($row1=mysqli_fetch_assoc($result1))
									{
									  	$docs[$i]=$row1['doc_id'];
									  	$i++;
									}

									$doc=implode("','", $docs);
									$sql.=" AND doc_id IN('".$doc."')";
									}
							}
							if(isset($_POST['fee']))
							{
								$fees=$_POST['fee'];
								$fee=implode("','", $fees);
								$sql.=" AND visit IN('".$fee."')";
							}

						}
						
						$result=mysqli_query($conn,$sql);

						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{

					?>

									<div class="col mb-4" >
									<div class="card">
										<div class="card-item">
											<img height="190" width="200" src="<?php echo $row['doc_photo'] ?>" class="card-img-top" alt="...">
											<div class="card-body">
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
											    <div  class="d-flex flex-row justify-content-center">
											    		<a href="../HTML/Appointment.php?doc_id=<?=$row['doc_id']?>" class="btn btn-success" >Appionment</a>
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
							</div>
						</div>
					</section>
				</div>
			</div>
		</section>
	</main>



<!--Footer Sction-->

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