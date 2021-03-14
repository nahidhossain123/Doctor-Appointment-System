<?php
	 session_start();
	 extract($_SESSION);
	 extract($_COOKIE);
	 unset($_SESSION['username']);
	 setcookie('username',$row['Username'],time() -7200, "/");
	 header("Location:../HTML/index.php");
  ?>