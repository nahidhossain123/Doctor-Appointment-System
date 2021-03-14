<?php
	session_start();
	include "../PHP/Connection.php";
	$oldname_error=$newname_error=$email_error=$oldpass_error=$newpass_error="";
	$oldname=$email=$newname=$oldpass=$newpass="";

	$username=$_SESSION['Adminlog'];
	$sql1="SELECT * from admininfo where Username='$username' ";
	$result1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result1)>0)
	{
		$row1=mysqli_fetch_assoc($result1);
		$admin_id=$row1['admin_id'];
		$username=$row1['Username'];
		$password=$row1['password'];
	}
	echo "username: ". $username;
	echo "password: ".$password;
	if(isset($_POST['adminsetSUB']))
	{
		if(empty($_POST['oldname']))
		{
			$oldname_error="Olname required!";
		}
		else
		{
			$oldname=$_POST["oldname"];
			if(!preg_match("/^[a-zA-Z\d]+$/",$oldname))
			{
				$oldname_error="Invalid old Username";

			}
			else{
				if($oldname!=$username)
				{
					$oldname_error="Not matched With previous username";
				}
			}
		}

		if(empty($_POST['newname']))
		{
			$newname_error="Newname required!";
		}
		else
		{
			$newname=$_POST["newname"];
			echo $newname;
			if(!preg_match("/^[a-zA-Z\d]+$/",$oldname))
			{
				$newname_error="Invalid new Username";
			}
		}

		if(empty($_POST['email']))
		{
			$email_error="Email required!";
		}
		else
		{
			$email=$_POST['email'];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$email_error="Invalid Email Format! e.g example@gmail.com";
			}
		}
		 if(empty($_POST['oldpass']))
        {
            $oldpass_error="!Password Required";
        }
        else
        {
            $oldpass=$_POST['oldpass'];
            if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/",$oldpass))
            {
                $oldpass_error="!Invalid Password";
            }
            else
            {
            	if($oldpass!=$password)
                {
                	$oldpass_error="!Not matched with prevous Password";
                }
            }
        }

         if(empty($_POST['newpass']))
        {
            $newpass_error="!Password Required";
        }
        else
        {
            $newpass=$_POST['newpass'];
            echo $newpass;
            if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/",$oldpass))
            {
                $newpass_error="!Invalid password";
            }
           
        }
        echo "oldname: ".$oldname;
        echo "oldpass: ".$oldpass;
		if($oldname_error==""&& $newname_error=="" && $email_error=="" && $oldpass_error=="" && $newpass_error=="" ){

			$sql="UPDATE `admininfo` SET `admin_id`='$admin_id',`Username`='$newname',`email`='$email',`password`='$newpass' WHERE admin_id='$admin_id' ";
			$result=mysqli_query($conn,$sql);
			if($result)
			{
				$_SESSION["alert_success"]="Updated Successfully";
				header("Location:../PHP/adminDirectlogin.php?user=$newname");
			}
			else{
				$_SESSION["alert_failed"]="Failed!! To Update";
				header("Location:../HTML/AdminUsernamePassChange.php");
			}
		}
		else
		{
			$_SESSION["oldname_error"]=$oldname_error;
			$_SESSION["email_error"]=$email_error;
			$_SESSION["newname_error"]=$newname_error;
			$_SESSION["oldpass_error"]=$oldpass_error;
			$_SESSION["newpass_error"]=$newpass_error;
			$_SESSION["alert_failed"]="Validation Error!!Please Follow The correct format below";
			header("Location:../HTML/AdminUsernamePassChange.php");
		}
	}
	
?>