<?php
if(isset($_SESSION['email'])==null){
    // header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blood Buzz</title>
<style>
table{
border:3px solid black;
background-color:#FFFFFF;
}

h1{ 
    font-family:Arial, Helvetica, sans-serif;
}
body{
margin-left: 30%;
margin-right: 30%;
background-color: rgb(244, 205, 224);
}
td{
font-family:'Lucida Sans', 'Lucida Sans Regulard', 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif;
font-size:22px;height:40px;
font-weight:bold;
}

#add{
height:50px;
width:336%;
font-size:x-large;
background-color:crimson;
font-weight:bold;
color:white;
}
#name,#ut,input[type=text],input[type=number],#bgrp{
width:100%;
height:40px;
font-size:large;
padding-left:10px;
}


</style>
</head>
<body>
    
<?php
require './header2.php';
?>    
<div>
    <form method="post" enctype="multipart/form-data" autocomplete="off"><center>
        <table cellspacing=15 cellpadding=15>
            <h1>Request for Blood</h1>
        <tr> <td> Patient Name</td>
            <td><input size="40" required type="text" name="name" id="name" placeholder="Enter Name"></td> 
        </tr>
        <tr><td>Select Blood Group</td>
        <td><select  name="bgrp" id="bgrp" required>
            <option value="" selected disabled>Select Blood Group</option>
            <?php $group=array("O-","O+","A-","A+","B-","B+","AB-","AB+");
            foreach($group as $g){
            echo"<option value='$g'>$g</option>";   
            }
            ?>
            </select>
        </td> 
        </tr>
        <tr> <td>Phone Number</td>
            <td><input size="40" required type="text" name="pno" id="pno" placeholder="+91 12345 54321 "></td> 
        </tr>
        
        <tr> <td>Units</td>
            <td><input type="number" required name="unit" id="ut" placeholder="1" max="7" min="1"></td> 
        </tr>
        <tr> <td><input id="add" type="submit" value="Request" name="request"></td> 
        </tr>
        </table>
    </center> 
    </form> 
</div> 
</body> 
</html>


<?php
include '../Include/connect.php';
if(isset($_REQUEST['request']))
{
    $name=$_REQUEST['name'];
    $group=$_REQUEST['bgrp'];
    $phone=$_REQUEST['pno'];
    $unit=$_REQUEST['unit'];
    date_default_timezone_set('Asia/Kolkata');
	$datetime=date('Y/m/d h:i:s');
    $get_email=$_SESSION['email'];
    $get_member="SELECT member_id FROM members WHERE email='$get_email' LIMIT 1";
    $get_member_run=mysqli_query($connection,$get_member);
    if(mysqli_num_rows($get_member_run) > 0)
    {
        $fetch=mysqli_fetch_array($get_member_run);
        $member_id=$fetch['member_id'];
        $request="insert into requester values(null,'$member_id','$name','$group','Requested','$datetime')";
        $request_run=mysqli_query($connection,$request);
        if($request_run)
        {
        //sweetalert
        echo"<script>alert('Requested Blood!')</script>";
        header("refresh:2;url=index.php");
        }
        else
        {
            echo"Something went wrong...!".mysqli_error($connection);
        }

    }
    else{
        echo"Something went wrong...!".mysqli_error($connection);
    }
} ?> 