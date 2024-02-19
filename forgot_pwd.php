<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blood Buzz-forgot password</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../ecom/css/style.css">

   <script src="../File/js/bootstrap.min.js"></script>

   <style>
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
      #back_to_login
      {
         font-size:large;
      }
      #back_to_login:hover
      {
         font-size:large;
         cursor: pointer;
         font-weight:bold;
      }
      p
      {
			font-size:20px;
            text-align:justify;
            text-justify:inter-word;
      }
   </style>
</head>

<body>

<section class="form-container" id="form" style="margin-top:160px;width:600px;">

   <form action="" method="post">
   <input type="hidden" id="action" value="">
      <h3>Reset Password</h3><br>
      <p>Enter your email address, and we'll send you a link to get back into your account.</p><br>
      <input type="email" name="email" placeholder="Enter Email Address" maxlength="50"  class="box">
      <input type="submit" value="send password link" class="btn" id="submit" name="forgot"><br><br>
      <a href="login.php" id="back_to_login">Back To Login</a>
   </form>

</section>