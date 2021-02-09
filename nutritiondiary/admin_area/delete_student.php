<!DOCTYPE html>
<?php
//connecting to the database

session_start();  //starting the session on this page
include("connect/db.php");   //calling on the connect method in this file
if(!isset($_SESSION['user_email'])){  //if statement making sure the user is logged into a session within the application 
  
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
        
             


              


              <?php

  if (isset($_GET['search'])){ //detecting if the button search has been pressed
  $search_query = mysqli_real_escape_string($con, $_GET['user_query']); //getting the information from the user_query text box and storing it as an array
  $delete = "delete from user where user_id like '%$search_query%'"; //Select all from user table where the user_id matches the data from the $search_query variable
  $run_delete = mysqli_query($con, $delete); //running the query

  
  }
   
 
 
  ?>  



    </div>
  </div>
  <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
<?php } ?>
</html>