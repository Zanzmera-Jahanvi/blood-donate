<?php 
ob_start();
session_start();

//checking if session is set or not 
if(isset($_SESSION['email'])){
include(__DIR__."/../include/connect.php");
$email=$_SESSION['email'];

//fetch login id
$q1="SELECT login_id FROM admin_login WHERE email='$email'";
$res1=mysqli_query($connection,$q1);
if(mysqli_num_rows($res1)>0){
    $num=mysqli_fetch_array($res1);
    $id=$num[0];
}

//get current date
$date=date('Y/m/d',time());
    session_destroy();
    header("location:index.php");
}
else{
    echo"session not set";
}

?>