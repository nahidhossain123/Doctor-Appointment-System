<?php
	 session_start();
	 extract($_SESSION);
	 extract($_COOKIE);
	 unset($_SESSION['Adminlog']);
	 setcookie('Adminlog',$row['Username'],time()+ 7200,"/");
	 header("Location:../HTML/Adminlogin.php");
  ?>