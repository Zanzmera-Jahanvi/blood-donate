<?php
ob_start();
session_start();
include(__DIR__."/../include/connect.php");

//recover password
if(isset($_REQUEST['reset']))
{
	header("location:reset.php");
}

//login validation
if((isset($_REQUEST['login'])) && (!empty($_REQUEST['pwd'])) && (!empty($_REQUEST['email'])))
{
	$email=mysqli_real_escape_string($connection,$_REQUEST['email']);
	$pwd=mysqli_real_escape_string($connection,$_REQUEST['pwd']);
	// $token=mysqli_real_escape_string($connection,$_REQUEST['token']);
	$updated_token=md5(rand());
	
	//first check whether user exists or not.
	$check_email="SELECT email,pwd FROM admin_login WHERE email='$email' AND pwd='$pwd'";
	$res=mysqli_query($connection,$check_email);
	if(mysqli_num_rows($res)>0)
	{
		
		//if user found than update the token
		$update_token="UPDATE admin_login SET verify_token='$updated_token' WHERE email='$email' AND pwd='$pwd'";
		$update_token_run=mysqli_query($connection,$update_token);
		if($update_token_run)
		{

		//if token is updated than maintain login history.
		$get_login_id="SELECT login_id FROM admin_login WHERE email='$email'";
		$get_login_id_run=mysqli_query($connection,$get_login_id);
		if(mysqli_num_rows($get_login_id_run) > 0)
		{
			$fetch=mysqli_fetch_array($get_login_id_run);
			$login_id=$fetch['login_id'];
			$host_address=$_SERVER['SERVER_ADDR'];
			$host_name=$_SERVER['SERVER_NAME'];
			date_default_timezone_set('Asia/Kolkata');
			$datetime=date('Y/m/d h:i:s');
			// echo $datetime;

			//update login history
			$history="INSERT INTO login_history VALUES('$login_id','$host_address','$host_name','$datetime')";
			$history_run=mysqli_query($connection,$history);

			if($history_run)
			{
				$_SESSION['email']=$_REQUEST['email'];
				header("location:new.php");
			}
			else{
				echo"Login History Not Updated...!";
			}

		}
		else
		{
			echo"<script>alert('Invalid User....! OR Check Password')</script>";
		}

		}
		else
		{
			header("location:index.php");
		}
		
	}
	else
	{
		//sweetalert
		echo"<script>alert('Invalid User....! OR Check Password')</script>";
	}
	// $r=mysqli_fetch_array($res);
	// $_SESSION['email']=$_REQUEST['email'];
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blood Buzz-Login</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="../img/logo.png" type="image/x-icon" />
	<style>
		#recover{
            text-decoration: underline;
            font-size:18px;
            /* font-weight:bold; */
            color:grey;
            background: none;
            border: none;
            cursor: pointer;
        }
		#recover:hover
		{
			font-weight:bolder;
		}
		#submit{
            background-color:crimson;
            color:white;
			font-size:large;

        }
		#submit:hover
		{
			font-weight:bolder;
		}
		.sign_up
		{
            color:rgb(227,103,128);
        }
		.sign_up:hover
		{
			color:crimson;
		}
		#sign_up
		{
			font-size:18px;
		}
	</style>

		

  </head>
  <body>
    <form autocomplete="off" action="" method="post">
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(../img/bbg.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Great to have you back! </h3>
			      		</div>
								
			      	</div>
							<form autocomplete="off" action="" method="post">
              <input type="hidden" id="action" value="login">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="email" id="email" class="form-control" placeholder="Email" name="email"   
							value="<?php
							if(!empty($_REQUEST['pwd'])){
                			if(isset($_REQUEST['login'])){
                			echo"$email";}
							 } ?>" >
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" id="password" name="pwd" class="form-control" placeholder="Password">
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="login" class="form-control" id="submit">Sign In</button>
		            </div>
		          </form>
		          <p class="text-center" id="sign_up">Not a member? <a data-toggle="tab" href="signup.php" class="sign_up">Sign Up</a></p>
				  <p class="text-center"><input type="submit" value="Forgot Password ?" name="reset" id="recover" data-toggle="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		        </div>
		      </div>
			</div>
		</div>
	</div>
</section>
</form>
</body>
</html>