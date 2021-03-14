<?php
    session_start();
    include '../php/Connection.php';
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
    <?php
        
        if(isset($_SESSION['username'])|| isset($_COOKIE['username']) || !isset($_SESSION['isSignup']) )
        {
            header("Location:../HTML/Index.php");
        }
        $username=$_SESSION['isSignup'];
        if(isset($_POST['logSub']) && isset($_SESSION['isSignup']))
        {
            if(isset($_POST['remember']))
            {
              setcookie('userid',$username,time()+ 7200,"/");
            }
            $_SESSION['username']=$_SESSION['isSignup'];
            unset($_SESSION['isSignup']);
            header("Location:../HTML/Index.php");
        }
        
    ?>

	<div class="alert alert-success container" role="alert">
  <h4 class="alert-heading">Successfully Signup!</h4>
  <hr>
  <form action="../HTML/Directlogin.php" method="POST">
      <input  type="checkbox" name="remember"> Remember Me
      <br>
      <input type="submit"  name="logSub" value="Log-In"> 
  </form>
  
</div>
	<script type="text/javascript" src="../Bootstrap/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="../Bootstrap/popper.min.css"></script>
	<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>