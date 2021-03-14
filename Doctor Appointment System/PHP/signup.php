<?php
        include '../PHP/Connection.php';
        session_start();
        $username=$email=$password=$con_pass=$agree=$message="";
        $username_error=$email_error=$pass_error=$conpass_error=$agree_error="";

        if(isset($_POST['SignupSUb']))
        {
            if(empty($_POST['username']))
            {
                $username_error="!Username Required";
                
            }
            else
            {
                $username=$_POST['username'];
                $sql="select * from userinfo where Username='$username'";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0)
                {
                    $username_error="!Username already used";
                }
                else
                {
                    if (!preg_match("/^[a-zA-Z\d]+$/",$username))
                    {
                        $username_error="!Invalid Username";
                    }
                }
            }


            if(empty($_POST['email']))
            {
                $email_error="!Username Required";

            }
            else
            {
                $email=$_POST['email'];
                $sql="select * from userinfo where email='$email'";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0)
                {
                    $email_error="!Email already used";
                }
                else
                {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $email_error="!Invalid Username";
                    }
                }
            }


            if(empty($_POST['pass']))
            {
                $pass_error="!Password Required";
            }
            else
            {
                $password=$_POST['pass'];
                if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/",$password))
                {
                    $pass_error="!Invalid Password";
                }
               
            }

            if(empty($_POST['agree']))
            {
                $agree_error="!Check Agree to Signup";
            }
            else
            {
                $agree=$_POST['agree'];
            }

            if($username_error=="" && $pass_error=="" && $conpass_error=="" && $agree_error=="")
            {
                $sql="INSERT INTO `userinfo`(`user_id`, `Username`,email, `password`, `Agree`) VALUES ('NULL','$username','$email','$password','$agree')";
                if(mysqli_query($conn,$sql))
                {
                    $_SESSION['alert_success']="Sign-Up Successfully!!";
                    $_SESSION['isSignup']=$username;
                    header("Location:../HTML/Directlogin.php");
                }
                else
                {
                     $_SESSION['alert_failed']="Failed! Unkown error plz try again";
                     header("Location:../HTML/Signup.php");
                }
            }
            else
            {
                $_SESSION['username_error']=$username_error;
                $_SESSION['email_error']=$email_error;
                $_SESSION['pass_error']=$pass_error;
                $_SESSION['agree_error']=$agree_error;
                header("Location:../HTML/Signup.php");
            }
        }
    ?>