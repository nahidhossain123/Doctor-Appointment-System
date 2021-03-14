<?php
include "../PHP/Connection.php";
	session_start();
	if(!isset($_SESSION['username']))
	{
		if(!isset($_COOKIE['username']))
		{
			header("Location:Login.php");
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
			    	<a href="../HTML/Login.html" class="btn btn-outline-primary">Log In/Sign Up</a>
			    </div>
			    <?php } ?>
			  </div>
			</nav>
		</div>

	</header>



	<main class="docporfile">
		<section class="section1 container">
			<div class="row">
				<div class="col-md-3 col-sm-12">
					<img src="../Images/userIcon2.png" height="200" width="200">
				</div>

				<div class="col-md-9 col-sm-12 section2">
					<div>
					    <h5 class="card-title"><i style="margin-top: 5px;" class="fas fa-user-circle"></i><?php echo " ".$_SESSION['username'] ?></h5>
					    <div  >
							<a style="text-decoration: none; color: black;" href="#" >Setting</a>
						</div>
					    <div  >
							<a style="text-decoration: none; color: black;" href="../PHP/Logout.php" >Log-Out</a>
						</div>
					</div>
				</div>
			</div>

			<div class="section2">
				<div class="heading">
					<h4>My Appointment Status</h4>
				</div>
				<div class="appionment-card">
				  		<div class="row">

				  			<div class="col-md-4">
				  				<h4>Dr. Name</h4>
				  			</div>
				  			<div class="col-md-4">
				  				<h4>consultation time</h4>
				  			</div>

				  			<div class="col-md-4">
				  				<span>Update</span>
				  				<span>|</span>
				  				<span>Comment</span>
				  				<span>|</span>
				  				<span>Delete</span>
				  			</div>
				  		</div>
				 </div>
				 <?php
				 		$username=$_SESSION['username'];
				 		$query="SELECT user_id FROM userinfo where Username='$username' ";
						$result2=mysqli_query($conn,$query);
						if(mysqli_num_rows($result2)>0)
						{
							$row2=mysqli_fetch_assoc($result2);
							$user_id=$row2['user_id'];
						}



						$sql="SELECT * from appointments where user_id='$user_id'";
						$result=mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0)
						{
							
							while ($row=mysqli_fetch_assoc($result)) {
							$doc_id=$row['doc_id'];
							$sql1="SELECT fullname from doctors where doc_id='$doc_id' ";
							$result1=mysqli_query($conn,$sql1);
							$row1=mysqli_fetch_assoc($result1);
							$slot=$row['appoint_slot'];
							$slotrayy=explode(' ', $slot);
							
					 ?>	

				 <div class="appionment-card">
				  		<div class="row">

				  			<div class="col-md-4">
				  				<h4><?php echo $row1['fullname']; ?></h4>
				  			</div>
				  			<div class="col-md-4">
				  				<span><?php echo $row['appoint_date']."  AT  ".$row['appoint_time'].$slotrayy[1]." Slot ".$row['appoint_slot']; ?></span>
				  			</div>

				  			<div class="col-md-4">
				  				<a href="../HTML/UpdateAppointmentUSER.php?id=<?=$row['appoint_id']?>&doc_id=<?=$doc_id ?>"><i class="far fa-edit"></i></a>
				  				<span>|</span>
				  				<i class="far fa-comment"></i>
				  				<span>|</span>
				  				<a href="../PHP/AppointmentDeleteUser.php?id=<?=$row['appoint_id']?>"><i class="far fa-trash-alt"></i></a>
				  			</div>
				  		</div>
				 </div>
				<?php
					
					 } 
				} 
			?>
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