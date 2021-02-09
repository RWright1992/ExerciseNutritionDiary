<!DOCTYPE html>
<?php
//connecting to the database

session_start();  //starting the session on this page
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
            <ul class="tabs"> <!--Links to the login and admin page-->
                <li>
                    <a href="login.php">Login</a>
                </li>
                <li>
                    <a href="" class="active">Register</a>
                </li>
                <li>
                    <a href="admin_area/admin_login.php">Admin Area</a>
                </li>
            </ul>

            <div id="register" class="form-action show"> <!--Form for new account details-->
                <h1>Register</h1>
                <form action="register.php" method="post" enctype="multipart/form-data">
                    <ul>
                        <li>
                            <input type="text" placeholder="Name" name="full_name"/>
                        </li>
                        <li>
                            <input type="text" placeholder="Username" name="user_name" />
                        </li>
                        <li>
                            <input type="password" placeholder="Password" name="password"/>
                        </li>
                        <li>
                            <input type="password" placeholder="Retype Password" name="password2"/>
                        </li>
                        <li>
                            <input type="text" placeholder="Email" name="user_email"/>
                        </li>
                        <li>
                            <input type="submit" value="Sign Up" class="button" name="register"/>
                        </li>
                    </ul>
                </form>

             <?php







if(isset($_POST['register'])){ //if statement recognising that the signup button has been pressed
    

    //storing the details entered as an array
    $name = mysqli_real_escape_string($con,$_POST['full_name']);
    $user_name = mysqli_real_escape_string($con,$_POST['user_name']);
    $pass = mysqli_real_escape_string($con,$_POST['password']);
    $pass2 = mysqli_real_escape_string($con,$_POST['password2']);
    $email = mysqli_real_escape_string($con,$_POST['user_email']);
    
    //inserting into the database the information filled into the sign up form 
    $insert_u = "INSERT INTO user ( user_name, full_name, password, user_email)
    VALUES
    ('$user_name', '$name', '$pass', '$email')";
    
    $run = mysqli_query($con, $insert_u); //running the query

    
    
    if($pass==$pass2){ //if statement detecting wether the two passwords entered are the same
        
        $_SESSION['user_name']=$user_name; //new session is started for the new user
        echo "<script>alert('Registration Successful')</script>";  //alerting user registration is sucessful
        echo "<script>window.open('index1.php','_self')</script>"; //opening up the index1 window for this user
    }
    
    else{
        echo "<script>alert('Please ensure Passwords are the same')</script>"; //if passwords are the same the system will notify the user
        
        
    }
    



    
   }

?>   


            </div>
        </div>
    </div>
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
</html>