
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../File/css/bootstrap.min.css">
    <script src="../File/js/bootstrap.min.js"></script>
    <script src="../File/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        html,body{
    height:100%;
}
body{
    line-height: 24px;
    font-size: 16px;
    font-style: normal;
    visibility: visible;
    font-family: sans-serif solid;
    color: #ffffff;
    /* background-color: lavenderblush; */
    /* background-image: url('./Image/16.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center; */
    
}
img{
    display:block;
    width:130px;
    margin: auto;
    padding: 8px;
}
a{
    color:inherit;
    line-height: inherit;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease 0s;
}
a.fixed{
    position: fixed;
    right :0;
    top: 0;
}

*:focus{
    outline: none !important;
}
a:focus{
    color:inherit;
    outline: none;
    text-decoration: none;
}
a:hover{
    text-decoration: none;
}
ul{
    list-style: outline none ;
    margin: 0;
    padding: 0;
}
.home{
    background-color: #EADDCA;
}

.header_area .header_black{
    border-bottom: 1px solid #ffffff;
}

.header_black .top > ul > li::before
{
    background: #2d2d2d;
}
.header_black .top > ul > li:hover > a{
    color:  #a3741a;
}
.header_black .top > ul > li > a{
    color:  #000000;
}

.header_black .dropdown_category li a:hover,
.header_black .dropdown_sub-category li a:hover{
    color:  #a3741a;
}


.top > ul > li {
    display: inline-block;
    position: relative;
    padding-left: 20px;
    margin-left: 20px;
}

.top > ul > li:hover ul.dropdown_category, 
.top > ul > li:hover .header_black  ul.dropdown_category,
.header_black .top > ul > li:hover ul.dropdown_category
.top > ul > li:hover ul.dropdown_sub-category, 
.top > ul > li:hover .header_black  ul.dropdown_sub-category,
.header_black .top > ul > li:hover ul.dropdown_sub-category 
{
    top: 100%;
    opacity: 1;
    visibility: visible;
}
.top > ul > li:first-child{
    padding-left: 0;
    margin-left: 0;
}
.top > ul > li::before{
    position: absolute;
    width: 1px;
    height: 15px;
    background: #ebebeb;
    top: 50%;
    left: 0px;
    transform: translate(-50%);
}

.top > ul > li >a {
    color: #242424;
    text-transform: capitalize;
    line-height: 26px;
    font-size: 25px;
    cursor: pointer;
    display: block;
    font-weight: 400;
    padding: 9px 0;
} 

.top  > ul > li > a i{
    margin-left: 3px;
    font-size: 10px;
}

.dropdown_currency,
.header_black .dropdown_category,
.dropdown_currency,
.header_black .dropdown_sub-category{
    position: absolute;
    background: #ffffff;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    min-width: 200px;
    text-align: center;
    top: 125%;
    transition: all 0.3s ease-out;
    overflow: hidden;
    left: -154%;
    z-index: 9999;
    padding: 0 15px;
    border-radius:  5px;
    opacity: 0;
    visibility: hidden;
}

.header_black .dropdown_category,
.header_black .dropdown_sub-category
{
    background: #242424 ;
}
.contactus{
    /* background: lavenderblush; */
    background: rgb(248, 246, 247);
    font-size: 14px;
    font-family: 'Poppins', sans-serif;

}
.container{
    width: 80%;
    margin: 50px auto;
}
.contact-box{
    background: #ffffff;
    display: flex;
}
.contact-left{
    flex-basis: 60%;
    padding: 40px 60px;
}
.contact-right{
    flex-basis: 40%;
    padding: 40px ;
    background-color:rgb(227, 103, 128);

    /* background: #C19A6B; */
    color: #ffffff;
    font-size: large;
}
h1{
    margin-bottom: 10px;
    font-weight: 600;
    /* color: crimson; */
    color:rgb(227, 103, 128);
}
textarea{
    width:100%;
    border:1px solid #cccccc;
    outline:none;
    padding: 10px;
    box-sizing: border-box;
}
label{
    margin-bottom: 6px;
    display: block;
    color: crimson;
    font-size: large;
}
button{
    background:rgb(227, 103, 128);
    width:100px;
    border:none;
    outline: none;
    color:#ffffff;
    text-align: center;
    margin-top:20px;
    padding: 6px 12px;
}
.contact-left h3{
    color:rgb(227, 103, 128);
    font-weight: 600;
    margin-bottom: 30px;
}
.contact-right h3{

    font-weight: 600;
    margin-bottom: 30px;
}
tr td{
    padding-right: 20px;
}
tr td{
    padding-top: 20px;
    padding-right: 20px;
}
    </style>
    
</head>
<body class="contactus">
    <div class="container">
        <h1 align="center"><b>Contact Us</b></h1><br/>
        <div class="contact-box">
            <div class="contact-left">
                <h3>Send Your Request</h3>
                <form method="post">
                    <div class="input-row">
                        <div class="form-group" id="nm">
                            <label for="nm">Name:</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
                            <label for="email" id="lblnm"></label>
                         </div>
                        <div class="form-group">
                            <label for="pno">Phone No:</label>
                            <input type="text" class="form-control" id="pno" name="pno" placeholder="+91 ***** *****" pattern="[0-9]{5}[0-9]{5}" required>
                            <label id="lblphoneno"></label>
                        </div>
                        <div class="form-group">
                            <label for="demo">Email:</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Email" id="eid" name="email" required>
                                <label id="lblemail"></label>
                                <div class="input-group-append">
                                    <span class="input-group-text">@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Your Description</label>
                        <textarea name="msg"  rows="5" placeholder="Message...."></textarea>
                        <label id="lbldesc"></label>
                    </div>
                    <button type="submit" name="send" style=" font-size: large ;"><b>SEND</b></button>
                </form>
            </div>
            <div class="contact-right">
                <h3>Reach us</h3>
                <table>
                    <tr>
                        <td>Email:</td>
                        <td>bloodbuzz@gmail.com</td>
                    </tr>
                    <tr>
                        <td>Phone No:</td>
                        <td>+1 012 3476 7654</td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td>Royal Street, B-149, Cristal Luxariya, Section-2, Main-Road, New Delhi, India 195 007</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</body>
</html>

<?php
if(isset($_REQUEST['send'])){
    $nm=$_REQUEST['name'];
    $pno=$_REQUEST['pno'];
    $eid=$_REQUEST['email'];
    $msg=$_REQUEST['msg'];
    $cod=date("Y-m-d");
    include(__DIR__."/../include/connect.php");
    $q="Insert into contact_us values(null,'$nm','$pno','$eid','$msg','$cod')";
    if(mysqli_query($connection,$q))
    {
        echo"<script>alert('Thank You For Showing Your Interest')</script>";
        header("refresh:1;url=demo.php");
    }
    else
    {
        die("Contact Failed".mysqli_error($connection));
    }
}

?> 