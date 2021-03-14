<?php
session_start();
$username=$_GET['user'];

if(isset($_SESSION['Adminlog']))
{
	setcookie('Adminlog',$username,time()+ 7200,"/");
}
$_SESSION['Adminlog']=$username;
header("Location:../HTML/AdminUsernamePassChange.php");

?>