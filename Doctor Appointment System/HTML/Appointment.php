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
			    	<a href="../HTML/Login.php" class="btn btn-outline-primary">Log In/Sign Up</a>
			    </div>
			    <?php } ?>
			  </div>
			</nav>
		</div>
	</header>

	<main class="doc-appointment">
		<section class="container">

			<h1 style="margin-top: 100px;"></h1>
			<?php if(isset($_SESSION["alert_failed_appoint"])){ ?>		
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						   <?php echo $_SESSION["alert_failed_appoint"]; ?>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<?php } ?>
						<?php if(isset($_SESSION["alert_success_appoint"])){ ?>		
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						   <?php echo $_SESSION["alert_success_appoint"]; ?>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<?php } ?>
			<div class="row">
				<div class="col-md-6 doctor-add">
					<div class="alert alert-success" role="alert" style="margin-top: 10px; margin-bottom: 0px;padding: 8px 0px 0px 15px;">
					  		<h4 style="display: inline-block;">Appointment</h4>
						</div>
								
							
								<form style="padding-top:30px;" action="../PHP/AppointmentDB.php" method="POST">
									<input type="hidden" name="doc_id" id="doc_id" value="<?php echo $_GET['doc_id']?>">
								  <div class="form-row ">
								    <div class="col-6">
								    	<span>Full Name</span>
								      	<input type="text" name="fullname" style="padding: 5px;" class="form-control" placeholder="patient fullname">
								      	<label class="error">*<?php 
										if(isset($_SESSION["fullname_error"]))
										{
											echo $_SESSION["fullname_error"];
										}
										?> 
										</label>
								    </div>
								    <div class="col-6">
								    	<span>Phone</span>
								      	<input type="text" name="phone" style="padding: 5px;" class="form-control" placeholder="01....">
							      		<label class="error">*<?php 
										if(isset($_SESSION["phone_error"]))
										{
											echo $_SESSION["phone_error"];
										}
										?> 
										</label>
								    </div>

								    <div class="col-4 form">
								    	<span>Appointment Date</span>
								    	<?php 
								    		$date=date('Y-m-d');
								    	?>
								      	<input onchange="loadSlot(event)" name="date" type="date" style="padding: 5px;" class="form-control" placeholder="e.g 12/12/20" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d',strtotime($date.' +20 days')); ?>">
								      	<label class="error">*<?php 
										if(isset($_SESSION["date_error"]))
										{
											echo $_SESSION["date_error"];
										}
										?> 
										</label>
								    </div>
								    <div class="col-4 form">
								    	<span>Appointment Slot</span>
								      	<select id="SelectSlot" name="slot" style="padding: 6px; width: 100%;" onchange="LoadTime(event)">
								      		<option hidden disabled selected value> ---- select a Slot ---- </option>
								      		<option>select a Date first</option>
								      	</select>
								      	<label class="error">*<?php 
										if(isset($_SESSION["slot_error"]))
										{
											echo $_SESSION["slot_error"];
										}
										?> 
										</label>

								    </div>
								    <div class="col-4 form">
								    	<span>Appointment Time</span>
								      	<select id="SelectTime" name="time" style="padding: 6px; width: 100%;">
								      		<option hidden disabled selected value>----- select a Time -----</option>
								      		<option>select a slot first</option>
								      	</select>
								      	<label class="error">*<?php 
										if(isset($_SESSION["time_error"]))
										{
											echo $_SESSION["time_error"];
										}
										?> 
										</label>
								    </div>
								    <div class="col-6 form">
								    	<span>City</span>
								      	<input type="text" name="city" style="padding: 5px;" class="form-control" placeholder="e.g Dhaka">
								      	<label class="error">*<?php 
										if(isset($_SESSION["city_error"]))
										{
											echo $_SESSION["city_error"];
										}
										?> 
										</label>
								    </div>
								     <div class="col-6 form">
								    	<span>Age</span>
								      	<input type="text" name="age" style="padding: 5px;" class="form-control" placeholder="e.g 18">
								      	<label class="error">*<?php 
										if(isset($_SESSION["age_error"]))
										{
											echo $_SESSION["age_error"];
										}
										?> 
										</label>
								    </div>
								    <div class="col-6 form">
								    	<span>Patient Type </span>
								    	<input type="radio" name="p_type" value="New"> New
								    	<input type="radio" name="p_type" value="Old"> Old
								    	<input type="radio" name="p_type" value="Report"> Report
								    	<label class="error">*<?php 
										if(isset($_SESSION["p_type_error"]))
										{
											echo $_SESSION["p_type_error"];
										}
										?> 
										</label>
								    </div>
								    <div class="col-6 form">
								    	<span>Gender </span>
								    	<input type="radio" name="gen" value="Male"> Male
								    	<input type="radio" name="gen" value="Female"> Fmale
								    	<input type="radio" name="gen" value="Other"> Other
								    	<label class="error">*<?php 
										if(isset($_SESSION["gender_error"]))
										{
											echo $_SESSION["gender_error"];
										}
										?> 
										</label>
								    </div>
								    <div class="col-6 form">
								    	<span>Address </span>
								    	<textarea name="Address"></textarea>
								    	<label class="error">*<?php 
										if(isset($_SESSION["Address_error"]))
										{
											echo $_SESSION["Address_error"];
										}
										?> 
										</label>
								    </div>
								    <div class="col-6 form">
								    	<span>Problem </span>
								    	<textarea name="problem" ></textarea>
								    	<label class="error">*<?php 
										if(isset($_SESSION["problem_error"]))
										{
											echo $_SESSION["problem_error"];
										}
										?> 
										</label>
								    </div>
								    <div class="col-12 form">
								    	<span>NID</span>
								      	<input type="text" name="nid" style="padding: 5px;" class="form-control" placeholder="43392199 12-09-1999">
								      	<label class="error">*<?php 
										if(isset($_SESSION["nid_error"]))
										{
											echo $_SESSION["nid_error"];
										}
										?> 
										</label>
								    </div>
								    <div class="col-12 form" >
									<input type="submit" name="appionmentSUb"  class="btn btn-primary" style="width: 100%;border-radius: 3px;" value="Get Appointment">
								  	</div>
								  </div>
								  
								</form>
				</div>
				<div class="col-md-6" >
					<img src="../Images/DocAppointment.jpeg" style="margin-top: 100px;width: 100%; height: 83%;">
				</div>
				<?php
					unset($_SESSION['fullname_error']);
					unset($_SESSION['phone_error']);
					unset($_SESSION['date_error']);
					unset($_SESSION['slot_error']);
					unset($_SESSION['time_error']);
					unset($_SESSION['city_error']);
					unset($_SESSION['age_error']);
					unset($_SESSION['p_type_error']);
					unset($_SESSION['gender_error']);
					unset($_SESSION['Address_error']);
					unset($_SESSION['problem_error']);
					unset($_SESSION['nid_error']);
					unset($_SESSION['alert_success_appoint']);
					unset($_SESSION['alert_failed_appoint']);
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
	<script type="text/javascript" src="../Bootstrap/popper.js"></script>
	<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
	var date;
	var doc_id;
	var dateName;
	function loadSlot(e)
	{  
		var SelectSlot=document.getElementById('SelectSlot');
		doc_id=document.getElementById("doc_id").value;
		console.log(doc_id);
		var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
		date=e.target.value;
		const newdate=new Date(date);
		dateName=days[newdate.getDay()];

		const req=new XMLHttpRequest();
		req.open("POST","../PHP/retrieveSlot.php",true);
		req.responseType="json";
		req.onload=()=>{
			if(req.status===200)
			{
				var data=req.response;
			}
			else
			{
				console.log("Unknown Error Occured");
			}
			SelectSlot.innerHTML=" ";
			var option=document.createElement('option');
			option.value="";
			option.hidden="hidden";
			option.disabled="disabled";
			option.selected="selected";
			option.innerHTML=" ---- select a Slot ---- ";
			SelectSlot.appendChild(option);
			for(var i=0;i<data.length;i++)
			{
				var option=document.createElement('option');
				option.value=data[i].slot;
				option.innerHTML=data[i].slot;
				SelectSlot.appendChild(option);
			}
		};
		const data={day:dateName,doc_id:doc_id,date:date}
		const Jsondata=JSON.stringify(data);
		req.send(Jsondata);
	}

		function LoadTime(e)
		{
		var SelectTime=document.getElementById('SelectTime');
		var time=e.target.value;
		const req=new XMLHttpRequest();
		req.open("POST","../PHP/retrieveTime.php",true);
		req.responseType="json";
		req.onload=()=>{
			if(req.status===200)
			{
				console.log(req.response);
				var data=req.response;
			}
			else
			{
				console.log("Unknown Error Occured");
			}
	
				SelectTime.innerHTML=" ";
				var option=document.createElement('option');
				option.value="";
				option.hidden="hidden";
				option.disabled="disabled";
				option.selected="selected";
				option.innerHTML="----Select Slot----";
				SelectTime.appendChild(option);
				for(var i=0;i<data.length;i++)
				{

					var option=document.createElement('option');
					option.value=data[i].time;
					option.innerHTML=data[i].time;
					SelectTime.appendChild(option);
				}
			};
			const data={time:time,doc_id:doc_id,date:date,day:dateName}
			const Jsondata=JSON.stringify(data);
			req.send(Jsondata);
		}
	</script>
</body>
</html>