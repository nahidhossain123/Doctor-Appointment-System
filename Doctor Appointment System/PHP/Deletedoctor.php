<?php
include '../PHP/Connection.php';
session_start();
$doc_id=$_GET['id'];
$sql="SELECT doc_photo from doctors where doc_id='$doc_id'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_assoc($result);
	$photoPath=$row['doc_photo'];
	unlink($photoPath);
	$sql="DELETE FROM doctors WHERE doc_id='$doc_id'";
	$result=mysqli_query($conn,$sql);
	if($result)
		{
			$_SESSION['alert_success']="Deleted Successfully!";
			header("Location:../HTML/Managedoctor.php?id=$doc_id");
		}
		else
		{
			$_SESSION['alert_failed']="Failed to Delete!";
			header("Location:../HTML/Managedoctor.php?id=$doc_id");
		}
}
else
{
	$_SESSION['alert_failed']="Failed to Delete!";
	header("Location:../HTML/Managedoctor.php?id=$doc_id");
}
?>