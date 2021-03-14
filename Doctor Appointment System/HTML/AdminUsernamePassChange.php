<?php
	include "../PHP/Connection.php";
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
	<header>
		<div class="fluid-container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<div class="icon">
			  <a class="navbar-brand" href="../HTML/AdminHome.php"><i class="fas fa-laptop-medical"></i>E HealthCareBD</a>
			</div>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
		<header >
		<div class="fluid-container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="icon" style="margin-left:0;">
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

	<main class="doc-appointment">
		<section class="container">

			<h1 style="margin-top: 100px;"></h1>
			<div class="col-lg-2 col-sm-12 text-center" style="margin-top: 30px;">

                    <a href="javascript:history.back()" style="padding: 8px 20px;border-radius: 4px;" class="btn btn-primary"><span>
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </span>Back
                    </a>
                </div>
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
			<div class="row">
				<div class="col-md-6 doctor-add">
					<div class="alert alert-success" role="alert" style="margin-top: 10px; margin-bottom: 0px;padding: 8px 0px 0px 15px;">
					  		<h4 style="display: inline-block;">Change Username And Password</h4>
						</div>
								
								<form style="padding-top:30px;" action="../PHP/AdminSettings.php" method="POST">
									<input type="hidden" name="doc_id" id="doc_id" value="<?php echo $_GET['doc_id']?>">
								  <div class="form-row ">
								  	<div class="col-12">
								    	<span>Email</span>
								      	<input type="text" name="email" style="padding: 5px;" class="form-control" placeholder="Email">
								      	<label class="error">*<?php 
										if(isset($_SESSION["email_error"]))
										{
											echo $_SESSION["email_error"];
										}
										?> 
										</label>
								    </div>
								    <div class="col-6">
								    	<span>Old Username</span>
								      	<input type="text" name="oldname" style="padding: 5px;" class="form-control" placeholder=" Old username">
								      	<label class="error">*<?php 
										if(isset($_SESSION["oldname_error"]))
										{
											echo $_SESSION["oldname_error"];
										}
										?> 
										</label>
								    </div>
								    <div class="col-6">
								    	<span>New Username</span>
								      	<input type="text" name="newname" style="padding: 5px;" class="form-control" placeholder="New Username">
							      		<label class="error">*<?php 
										if(isset($_SESSION["newname_error"]))
										{
											echo $_SESSION["newname_error"];
										}
										?> 
										</label>
								    </div>

								    <div class="col-6">
								    	<span>Old Password</span>
								      	<input type="password" name="oldpass" style="padding: 5px;" class="form-control" placeholder="Old Password">
								      	<label class="error">*<?php 
										if(isset($_SESSION["oldpass_error"]))
										{
											echo $_SESSION["oldpass_error"];
										}
										?> 
										</label>
								    </div>
								    <div class="col-6">
								    	<span>New Password</span>
								      	<input type="password" name="newpass" style="padding: 5px;" class="form-control" placeholder="New Password">
							      		<label class="error">*<?php 
										if(isset($_SESSION["newpass_error"]))
										{
											echo $_SESSION["newpass_error"];
										}
										?> 
										</label>
								    </div>


								    <div class="col-12 form" >
									<input type="submit" name="adminsetSUB"  class="btn btn-primary" style="width: 100%;border-radius: 3px;" value="Done">
								  	</div>
								  </div>
								  
								</form>
				</div>
				
				<?php
					unset($_SESSION["oldname_error"]);
					unset($_SESSION["email_error"]);
					unset($_SESSION["newname_error"]);
					unset($_SESSION['oldpass_error']);
					unset($_SESSION['newpass_error']);
					unset($_SESSION['alert_failed']);
					unset($_SESSION['alert_success']);
					
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