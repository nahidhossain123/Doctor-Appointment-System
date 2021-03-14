<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css?v=<?php echo time(); ?>">
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


	<div class="form-main">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    
                </div>
                <div class="col-lg-4 col-sm-12 text-center">
                    <a href="javascript:history.back()" class="btn btn-primary">Back

                        <span>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="login-Form">
                <div class="title text-center">
                    Sign-Up
                </div>
               
                <form action="../PHP/signup.php" method="POST">
                    <div class="input-form username">
                    <input type="text" placeholder="username" name="username" id="username" class="input">
                    <i class="fa fa-user"></i>
                    </div>
                    <label class="message text-warning" style=" font-size: 14px;margin-bottom: 10px;">
                        <?php
                            if(isset($_SESSION['username_error']))
                                {
                                    echo $_SESSION['username_error'];
                                }
                         ?></label>
                    <div class="input-form email">
                        <input type="text" placeholder="email" name="email"  class="input">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <label class="message text-warning" style=" font-size: 14px; margin-bottom: 10px;"><?php
                            if(isset($_SESSION['email_error']))
                                {
                                    echo $_SESSION['email_error'];
                                }
                         ?></label>
                    <div class="input-form">
                        <input type="password" placeholder="password" name="pass"  class="input">
                        <i class="fa fa-key icon"></i>
                    </div>
                    <label class="message text-warning" style=" font-size: 14px;margin-bottom: 10px;">
                     <?php
                            if(isset($_SESSION['pass_error']))
                                {
                                    echo $_SESSION['pass_error'];
                                }
                         ?></label>
                     <br>
                     <span style="margin-left: 10px">
                         <input type="checkbox" name="agree" value="Agree">
                        <label style="color: white;margin: 0;">Agree with <a href="">terms and conditions</a></label>
                     </span>
                     <div class="message text-warning " style=" font-size: 14px;margin-bottom: 10px;">
                        
                         <?php
                            if(isset($_SESSION['agree_error']))
                                {
                                    echo $_SESSION['agree_error'];
                                }
                         ?></label></div>
                      <div class="message text-warning " style=" font-size: 14px;margin-bottom: 10px;">
                        
                         <?php
                            if(isset($_SESSION['alert_failed']))
                                {
                                    echo $_SESSION['alert_failed'];
                                }
                         ?></label></div>      

                    <button type="submit" name="SignupSUb" class="btn btn-primary">Sign-up</button>
                    <div class="footer-signup text-center">
                        <p>Already have an account? 
                            <span style="display: inline-block;"><a href="../HTML/Login.php">Log-In</a></span>
                        </p>

                    </div>  
                </form>
                
            </div>
        </div>

        <?php
            unset($_SESSION['agree_error']);
            unset($_SESSION['username_error']);
            unset($_SESSION['pass_error']);
            unset($_SESSION['email_error']);
            unset($_SESSION['alert_failed']);
        ?>
	<script type="text/javascript" src="../Bootstrap/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="../Bootstrap/popper.min.css"></script>
	<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>