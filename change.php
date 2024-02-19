<!-- reference -->
<?php
ob_start();
session_start();
// print_r($_SESSION);
if(isset($_SESSION['email'])==false){
    header("location:index.php");
}

if(isset($_SESSION['email']))
{
    $email=$_SESSION['email'];
    include(__DIR__."/../include/connect.php");
    $q="select sque,ans,pwd,email from login where email='$email'";
    $res=mysqli_query($connection,$q);
    $r=mysqli_fetch_array($res);

    if(isset($_REQUEST['change']))
    {
    $cur=$_REQUEST['cur'];
    $new=$_REQUEST['new'];
    $confirm=$_REQUEST['confirm'];
       if($cur==$r[2])
       {
         if($new==$confirm)
         {
            $q="update signup set pwd='$new' where email='$email'";
            $r=mysqli_query($connection,$q);
            if($r){
                echo"<center><div><h2>Password Updated Successfully</h2></div></center>";
                header("refresh:2;url=login.php");
            }
            else{
                echo"Something Went Wrong".mysqli_error($connection);
            }
            }
            else{
            echo"<center><div><h2>Confirm Password Should Match</h2></div></center>";
        }
       }
       else{
        echo"<script>alert('Please Enter Valid Password')</script>";
       }
    }
}
?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #update{
            background-color:crimson;
            color:white;
        }
        .back_to_login{
            color:rgb(227,103,128);
        }
        .back_to_login{
			color:crimson;
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
			      			<h3 class="mb-4">Update Password🔑</h3>
			      		</div>	
			      	</div>
                            <form autocomplete="off" action="" method="post">
                            <input type="hidden" id="action" value="recover">
                            <div class="form-group mb-3">
                                <input type="password" id="text" class="form-control" name="cur" required placeholder="Current Password">
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" id="text" class="form-control" name="new" required placeholder="New Password">
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" id="ans" class="form-control" name="confirm" required placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
		            	    <button type="submit" name="change" style="cursor:pointer;" class="form-control" id="update">Change Password</button>
                            </div>
                            <p class="text-center"><a data-toggle="tab" href="login.php" class="back_to_login">Back To Login</a></p>
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