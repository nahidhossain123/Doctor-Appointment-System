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

    <?php
        include "../PHP/Connection.php";
        session_start();
        $username=$password="";
        $username_error=$password_error=$error="";

        if(isset($_SESSION['username'])|| isset($_COOKIE['username']))
        {
            header("Location:Home.php");
        }
        if(isset($_POST['loginSUb']))
        {

            if(empty($_POST['username']))
            {
                $username_error="<i class='fas fa-exclamation'></i> Username required";
            }
            else
            {
                $username=$_POST['username'];
            }

            if(empty($_POST['pass']))
            {
                $password_error="<i class='fas fa-exclamation'></i> Password required";
            }
            else
            {
                $password=$_POST['pass'];
            }

            $sql="SELECT * from userinfo where Username='$username' && password='$password'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {
                $row=mysqli_fetch_assoc($result);
                if(isset($_POST['Remember']))
                {
                    setcookie('username',$row['Username'],time()+ 7200,"/");
                }
                $_SESSION['username']=$row['Username'];
               
                header("Location:../HTML/index.php");
            }
            else
            {
                $error="<i class='fas fa-exclamation'></i> Username or Password Invalid!!";
            }
        }   
     ?>
    
    
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
                    Log-In
                </div>
                <form action="../HTML/Login.php" method="POST">
                    <div class="input-form username">
                    <input type="text" placeholder="username" name="username" id="username" class="input">
                    <i class="fa fa-user"></i>
                    </div>
                    <p class="message text-warning" style="color:red;"><?php echo $username_error ?></p>
                    <div class="input-form">
                        <input type="password" placeholder="password" name="pass" id="pass1" class="input">
                        <i class="fa fa-key icon"></i>
                    </div>
                    <p  class="message text-warning" style="color:white; margin-bottom: 10px;">
                     <?php echo $password_error ?></p>

                     <span style="margin-left: 10px;">
                         <input type="checkbox" name="Remember" value="Remember">
                        <label style="color: white;margin: 0;">Remember Me</label>
                     </span>
                     <div class="message text-warning" style=" font-size: 14px;margin-bottom: 10px;">
                         <?php echo $error ?></label></div>
                    <button type="submit" name="loginSUb" class="btn btn-primary">Log-In</button>
                    <div class="footer-signup text-center">
                        <p>New here? 
                            <span style="display: inline-block;"><a href="../HTML/Signup.php">Sign-Up</a></span>
                            <span style="display: block;"><a href="../HTML/ForgotPass.html">Forgot password?</a></span>
                        </p>

                    </div>  
                </form>
                
            </div>
        </div>

	<script type="text/javascript" src="../Bootstrap/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="../Bootstrap/popper.min.js"></script>
	<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>