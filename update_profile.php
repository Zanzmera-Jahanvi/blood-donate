<?php 
ob_start();
session_start(); ?>
<?php
if($_SESSION==null){
    header("location:index.php");
}

if(isset($_SESSION['email'])){
    include(__DIR__."/../include/connect.php");
    $email=$_SESSION['email'];
    $q="select * from signup where email='$email'";
    $res=mysqli_query($con,$q);
    $r=mysqli_fetch_array($res);
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blood Buzz-Update Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../File/css/bootstrap.min.css">
    <script src="../File/jquery.js"></script>
    <script src="../File/js/bootstrap.min.js"></script>
    <link rel="icon" href="../img/logo.png" type="image/x-icon" />

    <!-- <link rel="stylesheet" href="../Style/style.css"> -->
    </head>
    <body> 
        <?php include './header2.php';   ?>
    <hr>
    <form class="form"  method="post" enctype="multipart/form-data">
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10">
        <?php 
        // echo"<h1>$r[2]  $r[3]</h1>"; 
        ?>    
        </div>
    <div class="row">
        <center>
  		<div class="col-sm-3"><!--left col-->
      <div class="text-center">
        <?php if(isset($_SESSION['email'])){
            if($r[0]==null){
            echo"<img src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png' class='avatar img-circle img-thumbnail' alt='avatar' width=180 height=180>";
            }
            else{
                echo"<img src='../img/$r[0]' alt='error' width=180 height=180>";
            }
        }//session ?>

        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload" name="img">
      </div></center></hr><br>
        </div><!--/col-3-->
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h6>First name</h6></label>
                              <input type="text" class="form-control" id="first_name" placeholder="first name" title="enter your first name if any." name="fname" required
                              value="<?php 
                            if(isset($_SESSION['email'])){
                                echo"$r[2]";
                            }
                            ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h6>Last name</h6></label>
                              <input type="text" class="form-control" id="last_name" placeholder="last name" title="enter your last name if any."
                              value="<?php 
                            if(isset($_SESSION['email'])){
                                echo" $r[3]";
                            }
                            ?>" name="lname" required>
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h6>Contact Number</h6></label>
                              <input type="text" class="form-control" id="phone" placeholder="enter phone" title="enter your phone number if any."
                              value="<?php 
                            if(isset($_SESSION['email'])){
                                echo"$r[4]";
                            }
                            ?>" name="cno" required>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h6>Gender</h6></label><br>
                              <!-- <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any."> -->
                              <select name="gen" id="" class="form-control">
                                <option value="<?php 
                            if(isset($_SESSION['email'])){
                                echo"$r[5]";
                            }
                            ?>" selected disabled><?php 
                            if(isset($_SESSION['email'])){
                                echo"$r[5]";
                            }
                            ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h6>Email</h6></label>
                              <input type="email" class="form-control" id="email" placeholder="you@email.com" title="enter your email." name="email" readonly
                              value="<?php 
                            if(isset($_SESSION['email'])){
                                echo"$r[1]";
                            }
                            ?>">
                          </div>
                      </div>
                      <div class="form-group">   
                          <div class="col-xs-6">
                              <label for="email"><h6>Address</h6></label>
                              <input type="text" class="form-control" id="location" placeholder="somewhere" title="enter a location" name="add" required
                              value="<?php 
                            if(isset($_SESSION['email'])){
                                echo"$r[6]";
                            }
                            ?>">
                          </div>
                      </div>
                      <!-- for Buttons -->
                      <div class="row">
					<div class="col-6">
                <div class="form-group mb-3">
				<button class="form-control btn btn-primary rounded submit px-3 login" type="submit" name="update">
                 <i class="glyphicon glyphicon-ok-sign"></i> Update</button>
			     </div>
                 <p class="text-center"><a data-toggle="tab" href="demo.php">Back To Home</a></p>
                </div></div><!-- row -->
                      <div>
                      </div>
              	
              <hr>          
             </div><!--/tab-pane-->
          </div><!--/tab-content-->
    </div><!--/row-->
    </form>
    </body>
    </html>

<?php 
if(isset($_REQUEST['update'])){
include(__DIR__."/../include/connect.php");
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$cno=$_REQUEST['cno'];
$gen=$_REQUEST['gen'];
$email=$_REQUEST['email'];
$add=$_REQUEST['add'];
$img=$_FILES['img']['name'];
$tmp=$_FILES['img']['tmp_name'];
move_uploaded_file("$tmp","/../img".$img);
$q="update signup set img='$img',fname='$fname',lname='$lname',cno='$cno',gender='$gen',addr='$add' where email='$email'";
$res=mysqli_query($con,$q);
if($res){
    echo"<script>alert('Updated...')</script>";
}
}     
?>
