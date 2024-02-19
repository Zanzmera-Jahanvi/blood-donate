<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Feedback</title>
    <style>
       input[type=text],textarea,input[type=email]
       {
        display: flex;
        outline: none;
        border-bottom: 2px solid #333;
        display: block;
       }
        h1{
            /* color:rgb(227, 103, 128); */
            color: crimson;
        }
        /* h4{
            color:crimson;
        } */
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
            margin-top:3%;
        }
        body{
            /* background-color:#EADDCA; */
            background-image: url("bg.png");
        }
        .row{
            background-color:rgb(253, 227, 231);
            /* border-radius: 30px; */
            box-shadow: 12px 12px 22px rgb(188, 185, 185);
            width:80%;
        }
        img{
            /* border-top-left-radius:30px; */
            border-bottom-left-radius: 30px;
        }
        #btn{
            border:none;
            outline:none;
            height:50px;
            width:100%;
            background-color:rgb(227, 103, 128);
            color:white;
            border-radius: 4px;
            font-size: large;
            font-weight: bold;
        }
        #btn:hover{
            background-color:white;
            border:1px solid;
            color:black;
        }
        #em,#add{
            font-size: large;
        }
    </style>
  </head>
  <body>
    <center>
    <section class="Form">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="f2.jpg" alt="" height="550" width="490">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3">Feedback Form</h1>
                    <h4>You can give your feedback here</h4>
                    <form>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="email" id="em" name="email" placeholder="Enter Email" class="form-control my-4 p-4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <textarea name="msg" id="add" placeholder="Message..." class="form-control" cols="21" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="submit" name="feedback" class="mt-3 mb-5"id="btn" value="Submit">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
  </body>
</center>
</html>
 <?php
    if(isset($_REQUEST['feedback']))
    {
        $email=$_REQUEST['email'];
        $msg=$_REQUEST['msg'];
        $dor=date("Y-m-d");

        include(__DIR__."/../include/connect.php");

        $q="insert into feedback values(null,'$email','$msg','$dor')";
        $r=mysqli_query($connection,$q);

        if($r)
        {
            echo "Inserted Sucessfully...";
        }
        else
        {
            echo "Not Inserted..".mysqli_error($connection);
        }

    }

?> 