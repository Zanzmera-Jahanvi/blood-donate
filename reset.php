
<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blood Buzz-forgot password</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="../File/jquery.js"></script>
	<script src="../File/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="../img/logo.png" type="image/x-icon" />
	<style>
		#submit{
            background-color:crimson;
            color:white;
			font-size:large;
        }
		p
         {
            font-size:18px;
               text-align:justify;
               text-justify:inter-word;
         }
		 #back_to_login:hover
		{
			font-size:large;
			cursor: pointer;
			font-weight:bold;
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
			      			<h3 class="mb-4">Reset Password </h3>
			      		</div>
								
			      	</div>
							<form autocomplete="off" action="" method="post">
              <input type="hidden" id="action" value="login">
			      		<div class="form-group mb-3">
						  <p>Enter your email address , and we'll send you a link to get back into your account.</p>
			      			<label class="label" for="name">Email</label>
			      			<input type="email" id="email" class="form-control" placeholder="Email" name="email" required>
			      		</div>
		            
		            <div class="form-group">
		            	<button type="submit" name="reset" class="form-control" id="submit">Send Reset Password Link</button><br>
						<p class="text-center"><a id="back_to_login"data-toggle="tab" href="index.php" class="sign_up">Back To Login</a></p>
		            </div>
		          </form>
		        </div>
		      </div>
			</div>
		</div>
	</div>
</section>
</form>
</body>
</html>


<?php
include '../Include/connect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


function send_password_reset($get_email,$token)
	{
		$mail = new PHPMailer(true);
		//Server settings
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->SMTPAuth   = true;  

		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		//Enable SMTP authentication
		$mail->Username   = 'bansarisorathiya74@gmail.com';                     //SMTP username
		$mail->Password   = "ghsy vmzt rala tuuv";                               //SMTP password

		// $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
		$mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	
		//Recipients
		$mail->setFrom('bansarisorathiya74@example.com', 'Blood Buzz');
		$mail->addAddress($get_email);     //Add a recipient

		$mail->isHTML(true);    
		$mail->Subject = 'Reset Your Password';

		$email_template="
		<h3>Hello This is from Blood Buzz</h3>
		<h3>You Are Receiving this email because we received a password reset request for your account.If you haven't requested this then you can simply ignore it.</h3>
		<br/><br/>
		<h2><a href='http://localhost/Blood/Admin/password_change.php?token=$token&email=$get_email'>Reset Password</a></h2>
		";

    	$mail->Body= $email_template;
		$mail->send();
	}



if(isset($_POST['reset'])){
    $email=mysqli_real_escape_string($connection,$_POST['email']);
	$token=md5(rand());
	$check_email="SELECT email FROM admin_login WHERE email='$email' LIMIT 1";
	$check_email_run=mysqli_query($connection,$check_email);

	if(mysqli_num_rows($check_email_run) > 0)
	{
		$row=mysqli_fetch_array($check_email_run);
		$get_email=$row['email'];
		$update_token="UPDATE admin_login SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
		$update_token_run=mysqli_query($connection,$update_token);

		if($update_token_run)
		{
		send_password_reset($get_email,$token);
		$_SESSION['status']="Mail sent";
		?>
		<script>
			Swal.fire({
			title: "Check Your Inbox!",
			text: "We have sent you mail!",
			icon: "success"
			});
		</script>
		<?php
		header("refresh:2;url=reset.php");
		exit(0);
		}

		else
		{
		$_SESSION['status']="Something Went Wrong. #1";
		header("location:index.php");
		exit(0);
		}
	}
	else
	{
		$_SESSION['status']="No Email Found !";
		header("location:index.php");
		exit(0);
	}
}
?>