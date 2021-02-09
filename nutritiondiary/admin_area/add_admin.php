<!DOCTYPE html>
<?php
//connecting to the database

session_start();    //starting the session on this page
  include('connect/db.php');  //calling on the connect method in this file
if(!isset($_SESSION['user_email'])){ //if statement to prevent users who havnt logged on from getting on the page
  
  echo "<script>window.open('admin_login.php?login_required','_self')</script>";
}
else{

?>

<html lang="en">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>UUJ Diet and Excercise Diary</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="css/index.css" />
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
      <div class="header">

          <h1>Admin Area</h1>

            </div>
        
            <div class="block">
        <h2 align= "center">Enter Details of new Administrator</h2><br>
                          <h1>Please store these details somewhere safe</h1>
                           <div id="register" class="form-action show"> <!-- Form for new admin details-->
                <h1>Register</h1>
                <form action="add_admin.php" method="post" enctype="multipart/form-data">
                    <ul>
                      <li>
                            <input type="text" placeholder="Email" name="user_email"/>
                        </li>
                        <li>
                            <input type="password" placeholder="Password" name="password"/>
                        </li>
                        <li>
                            <input type="password" placeholder="Retype Password" name="password2"/>
                        </li>
                        <li>
                            <input type="submit" value="Sign Up" class="button" name="register"/>
                        </li>
                    </ul>
                </form>

             <?php







if(isset($_POST['register'])){ //detecting if the register button has been pushed

  //storing the details entered as an array
    $email = mysqli_real_escape_string($con,$_POST['user_email']);
    $pass = mysqli_real_escape_string($con,$_POST['password']);
    $pass2 = mysqli_real_escape_string($con,$_POST['password2']);
    
    //inserting into the database the information filled into the sign up form 
    $insert_u = "insert into admin (user_email,  password) values ('$email','$pass')";
    
    $run = mysqli_query($con, $insert_u);
    
    
    if($run){ //if statement detecting wether a record has been added to the admin table

        echo "<script>alert('Admin Acount has been added')</script>";   //alerting user admin account has been added
        echo "<script>window.open('index.html','_self')</script>"; //taking user back to index screen
    }
    
    else{
        echo "<script>alert('Error')</script>"; //informing user of error in entering information
        
        
    }
    



    
   }

?>   
    </div>
    </div>
  </div>
  <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
<?php } ?>
</html>