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

        if(isset($_SESSION['Adminlog'])|| isset($_COOKIE['Adminlog']))
        {
            header("Location:../HTML/AdminHome.php");
        }
        if(isset($_POST['adminloginSUb']))
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

            $sql="SELECT * from admininfo where Username='$username' && password='$password'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {

                $row=mysqli_fetch_assoc($result);
                $username=$row['Username'];
                if(isset($_POST['Remember']))
                {
                    setcookie('Adminlog',$username,time()+ 7200,"/");
                }
                $_SESSION['Adminlog']=$row['Username'];
               
                header("Location:../HTML/Adminhome.php");
            }
            else
            {
                $error="<i class='fas fa-exclamation'></i> Username or Password Invalid!!";
            }
        }   
     ?>
    
    
    <div class="form-main">
            
            <div class="login-Form">
                <div class="title text-center">
                    Log-In
                </div>
                <form action="../HTML/Adminlogin.php" method="POST">
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
                    <button type="submit" name="adminloginSUb" class="btn btn-primary">Log-In</button>
                    <div class="footer-signup text-center">
                        <p>
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