<?php
session_start();
ob_start();
// session_start();
include(__DIR__."/../include/connect.php");

//recover password
if(isset($_REQUEST['forgot']))
{
	header("location:forgot_pwd.php");
}
//login validation
if((isset($_REQUEST['login'])) && (!empty($_REQUEST['pwd'])) && (!empty($_REQUEST['email'])))
{
	$email=mysqli_real_escape_string($connection,$_REQUEST['email']);
	$pwd=mysqli_real_escape_string($connection,$_REQUEST['pwd']);
	$updated_token=md5(rand());
	
	//first check whether user exists or not.
	$check_email="SELECT email,pwd FROM members WHERE email='$email' AND pwd='$pwd'";
	$res=mysqli_query($connection,$check_email);
	if(mysqli_num_rows($res)>0)
   {	
		//if user found than update the token
		$update_token="UPDATE members SET verify_token='$updated_token' WHERE email='$email' AND pwd='$pwd'";
		$update_token_run=mysqli_query($connection,$update_token);
		if($update_token_run)
		{
				$_SESSION['member_email']=$email;
            // echo $_SESSION['member_email'];
            //sweetalert
				header("location:index.php");
		}
		else
		{
         // Sweet alert
			echo"<script>alert('Token Not Updated...!')</script>";
		}
		
   }
      else
      {
         //sweet alert
         echo"<script>alert('Invalid User....! OR Check Password')</script>";
      }
      // $r=mysqli_fetch_array($res);
      // $_SESSION['email']=$_REQUEST['email'];
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blood Buzz-login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../ecom/css/style.css">

   <script src="../File/js/bootstrap.min.js"></script>

   <style>
      .dropdown-item
      {
         font-size:medium;
      }
      #submit
      {
         background-color:red;
         color:white;
         font-size:large;
      }
      #submit:hover
      {
         background-color:white;
         color:red;
         font-weight:bold;
         border:1px solid black;
         font-size:large;
      }
      #register:hover
      {
         background-color:white;
         color:blue;
         border:1px solid black;
         font-size:large;
         font-weight:bold;
      }
      #register
      {
         font-size:large;
      }
      #recover,#forgot{
            text-decoration: underline;
            font-size:18px;
            font-weight:bold;
            color:grey;
            background: none;
            border: none;
            cursor: pointer;
        }
        
   </style>
</head>
<?php include './header2.php'; ?>

<body>

<section class="form-container" style="margin-top:75px;">

   <form action="" method="post" autocomplete="off">
   <input type="hidden" id="action" value="login">
      <h3>login now</h3>
      <input type="email" name="email" placeholder="Enter Email" maxlength="50"  class="box" value="<?php
							if(!empty($_REQUEST['pwd'])){
                			if(isset($_REQUEST['login'])){
                			echo"$email";}
							 } ?>">
      <input type="password" name="pwd" placeholder="Enter Password" maxlength="20"  class="box">
      <input type="submit" value="login now" class="btn" id="submit" name="login">
      <p class="text-center"><input type="submit" value="Forgot Password?" name="forgot" id="recover" data-toggle="tab">
      <p>Don't have an account?</p>
      <a href="signup.php" class="option-btn" id="register">register now</a>
   </form>

</section>

