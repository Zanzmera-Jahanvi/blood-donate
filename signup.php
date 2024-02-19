<?php
ob_start(); 
require '../include/connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blood Buzz-Sign up</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="../img/logo.png" type="image/x-icon" />
	<script src="../File/jquery.js"></script>
	<script src="../Style/js/bootstrap.min.js"></script>

    <style>
        #signup{
            background-color: crimson;
            color: white;
        }
        .back_to_login{
            color:rgb(227,103,128);
        }
        .back_to_login{
			color:crimson;
		}
        body{
            background-color: rgb(252, 231, 231);
        }
    </style>
        <script type="text/javascript">
            $(document).ready(function()
			{
                $(".state").change(function()
				{
                    var state_id=$(this).val();
                    $.ajax({
							url:"statecity.php",
							method:"POST",
							data:{state_id:state_id},
							success:function(data)
							{
								$(".city").html(data);
							}
                    	});
                });  
            });
        </script>

  </head>
 <body>
     <section class="ftco-section">
		<div class="container-fluid" style="height:100%;margin-top:100px;">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(../img/login.jpg);height:1100px">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">The gift of blood is a gift to someone's life.</h3>
			      		</div>
			      	</div>
			<form autocomplete="off" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" id="action" value="register">
              <div class="row">
                <div class="col-6">
                <div class="form-group mb-3">
			      			<label class="label" for="name">First Name</label>
			      			<input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required>
			      		</div></div>

                <div class="col-6"><div class="form-group mb-3">
			      			<label class="label" for="name">Last Name</label>
			      			<input type="text" id="lname"  name="lname" class="form-control" placeholder="Last Name" required>
			      		</div></div>

              </div>
			      		<div class="form-group mb-3">
			      			<label class="label">Email</label>
			      			<input type="email" id="email"  name="email" class="form-control" placeholder="email" required>
			      		</div>
						  <div class="row">
					<div class="col-6">
                <div class="form-group mb-3">
				<label class="label">Password</label>
				<input type="password" id="password"  name="pwd" class="form-control" placeholder="Password" required>
			      		</div></div>

                <div class="col-6"><div class="form-group mb-3">
				<label class="label">Confirm Password</label>
				<input type="password" id="password"  name="cpwd" class="form-control" placeholder="Confirm Password" required>
			      		</div></div></div>
                    
                    <div class="form-group mb-3">
		            	<label class="label">Profile Pic</label>
		              <input type="file" id="pfp"  name="pfp" class="form-control" accept="image/*">
		            </div>
                    
                    <div class="form-group mb-3">
		            	<label class="label">Contact Number</label>
		              <input type="text" placeholder="Contact Number" name="cno" pattern=[0-9]{10} class="form-control" required>
		            </div>

					<div class="row">
						<div class="col-6">
						<div class="form-group mb-3">
							<label class="label">Gender</label><br>
							<input type="radio" name="gen" checked value="Male">Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="gen" Value="Female">Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="gen" Value="Other">Other
						</div></div>
						<div class="col-6"><div class="form-group mb-3">
							<label class="label">Date of Birth</label>
                    	    <input type="date" name="dob" required class="form-control" placeholder="Date of Birth"/> 
						</div></div>
					  </div>

                    <div class="form-group mb-3">
		            	<label class="label">Address</label>
                        <textarea name="add" cols="30" rows="3" required class="form-control" placeholder="Address" ></textarea>
		            </div>
					<div class="row">
						<div class="col-6">
						<div class="form-group mb-3">
						<label class="label" for="name">State</label>
						<select id="state"  name="state" class="state form-control" required>
							<option selected disabled>Select State</option>
							<?php 
							$state="SELECT * FROM states ORDER BY state_name";
							$state_run=mysqli_query($connection,$state);
							while($display_state=mysqli_fetch_array($state_run))
							{ ?>
							<option value="<?php echo $display_state['state_id']; ?>"><?php echo $display_state['state_name'];  ?></option>
						<?php	
						}
							?>
						</select> 
						</div></div>
		
						<div class="col-6"><div class="form-group mb-3">
									  <label class="label" for="name">City</label>
									  <select id="city" name="city" class=" city form-control" required>
									  <option disabled selected>Select City</option>
            						<p id="place_city"></p></select>
								  </div></div>
		
					  </div>
					  <div class="row">
						<div class="col-6">
						<div class="form-group mb-3">
									  <label class="label" for="name">Landmark</label>
									  <input type="text" id="ldmk" name="ldmk" class="form-control" placeholder="Landmark" required>
								  </div></div>
		
						<div class="col-6"><div class="form-group mb-3">
									  <label class="label" for="name">Pincode</label>
									  <input type="text" id="pcode" name="pin" class="form-control" placeholder="Pincode" pattern=[0-9]{6} required>
								  </div></div>
		
					  </div>

		            <div class="form-group">
		            	<button type="submit" style="cursor:pointer;"  name="signup" class="form-control" id="signup">Sign Up</button>
		            </div>
		           
		          </form>
		          <p class="text-center"><a data-toggle="tab" href="./login.php" class="back_to_login">Alreadt have an account ? Login here.</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
  </body>
</html>  


<?php
// include_once(__DIR__."/../include/connect.php");
if(isset($_REQUEST['signup']))
{
	$img=$_FILES['pfp']['name'];
	$tmp=$_FILES['pfp']['tmp_name'];
	$fsize=$_FILES['pfp']['size'];

	$email=mysqli_real_escape_string($connection,$_REQUEST['email']);
	$pwd=mysqli_real_escape_string($connection,$_REQUEST['pwd']);
	// $hashed_pwd=password_hash($pwd,PASSWORD_DEFAULT);
	$token=md5(rand());
	$cpwd=$_REQUEST['cpwd'];
	// $hashed_cpwd=password_hash($cpwd,PASSWORD_DEFAULT);
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	//fullname
	$fullname=$fname.' '.$lname;
	$cno=$_REQUEST['cno'];
	$gen=$_REQUEST['gen'];
	$dob=$_REQUEST['dob'];
	$add=$_REQUEST['add'];
	$city=$_REQUEST['city'];
	$state=$_REQUEST['state'];
	$ldmk=$_REQUEST['ldmk'];
	$pin=$_REQUEST['pin'];
	$maxsize=2*1024*1024;

	$check_user="SELECT email FROM members WHERE email='$email'";
	$check_user_run=mysqli_query($connection,$check_user);
	if(mysqli_num_rows($check_user_run) > 0)
	{
		//sweetalert
		echo"<script>alert('User Already Exists...Please Choose Different Email Address')</script>";
	}
	else
	{
		if($pwd!==$cpwd)
		{
		//sweetalert
		echo"<script>alert('Password Not Match')</script>";
		}
		else
		{
			$insert_user="INSERT INTO members VALUES(null,'$img','$email','$pwd','$token','$fullname','$cno','$gen','$dob','$add','$city','$state','$ldmk','$pin')";
			$insert_user_run=mysqli_query($connection,$insert_user);
			if($insert_user_run)
			{
				if(move_uploaded_file("$tmp","../img/".$img))
				{
					//sweetalert
					header("refresh:2;url=index.php");
				}
				//sweetalert
				header("location:login.php");
			}
			else
			{
				echo"Something Went Wrong..!!!".mysqli_error($connection);
			}
		}
	}
}
?>