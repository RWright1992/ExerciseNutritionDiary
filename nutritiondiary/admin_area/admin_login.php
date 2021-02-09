<!DOCTYPE html>
<?php
//connecting to the database

session_start(); //starting the session on this page
    include('connect/db.php'); //calling on the connect method in this file
    

?>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>UUJ Diet and Excercise Diary</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/login.css"/>
    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->

    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

    <div class="container">
        <div class="flat-form">
            <ul class="tabs">

                <li>
                    <a href="" class="active">Admin Area</a>
                </li>
            </ul>
            
            <div id="admin" class="form-action show">
                    <ul>
                <h1>Administrator Login</h1>
                <form method="post" action="">  <!--Form for capturing login details-->
                    <ul>
                        <li>
                            <input type="text" placeholder="Email Address" name="user_email"  reqired/>
                        </li>
                        <li>
                            <input type="password" placeholder="Password" name= "password" />
                        </li>
                        <li>
                            <input type="submit" value="Login" name= "login" class="button" />
                        </li>
                    </ul>
                </form>

                <?php
  
  if(isset($_POST['login'])){ //if statement recognising that the login button has been pressed
      
      $user_email = mysqli_real_escape_string($con,$_POST['user_email']); //storing the useremail entered as an array
      $pass = mysqli_real_escape_string($con,$_POST['password']);  //storing the password entered as an array
      
    
      
      //selecting the row which matches the details which were entered into the system 
      $sel = "select * from admin where password='$pass' AND user_email='$user_email'";
      $run = mysqli_query($con, $sel);
      $check_user = mysqli_num_rows($run);

     //if statement used when information entered does not match any user account in the database
      if($check_user==0){
          echo "<script>alert('Email or Password is Incorrect')</script>";
     exit();
     }
  
      //if statement used when details match those which are in the database 
      if($check_user>0){
          
        $_SESSION['user_email']=$user_email; //starting the session
        echo "<script>alert('Logged in Successfully')</script>"; //system alerting user login sucessful
        echo "<script>window.open('index.html','_self')</script>";    //opening the index page   
      }
      
      
      
      
  }
  
  
  
  
  
  ?>


            </div>
            <!--/#register.form-action-->
        </div>
    </div>
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
</html>


