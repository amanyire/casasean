<?php
 
    session_start();
    include_once 'admin/class.php';
    
    $user = new db_class();
   ?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title> Admin</title>
    
    
    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="login/css/style.css">

    
    
    
  </head>

  <body style="background-image: linear-gradient(to right top, #33cae1, #62d2de, #83dadc, #a0e2dd, #bae9e0, #b9e7dc, #b9e4d9, #b8e2d5, #9dd6c7, #80c9ba, #61bdae, #38b0a3) ;">

    
<!-- Mixins-->
<!-- Pen Title-->
<P>&nbsp;</P>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h3 class="title" style="font-weight: 300;font-size: 28px">Login</h3>
    <form method="post" action="">
      <div class="input-container">
        <input type="text" id="Username" name="username" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" name="password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button class="title" style="background-color:#89cff0" type="submit" name="submit"><span style="color: #fff">Go</span></button>
      </div>
	  <div class="footer" style="color:#CC0000">
      <?php
	  if (isset($_REQUEST['submit'])) {

        extract($_REQUEST);

        $login = $user->check_login($username, $password);
        
        if ($login) {

            // Registration Success
          
           $_SESSION['aid']=$login;
           
           echo '<META http-equiv="refresh" content="0;URL=admin/"><img src="images/load.gif" />';
     header("Location:admin/");

        } else {

            // Registration Failed

            echo 'Invalid username or password';

        }

    }
	  ?></div>
	  
      <div class="footer"><a href="#">Forgot your password?</a></div>
    </form>
  </div>
</div>   <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
