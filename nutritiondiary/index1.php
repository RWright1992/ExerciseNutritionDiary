<!DOCTYPE html>
<?php
session_start();   //starting the session on this page
include('connect/db.php');  //calling on the connect method in this file

if(!isset($_SESSION['user_name'])){   //if statement making sure the user is logged into a session within the application 
	
	echo "<script>window.open('login.php?login_required','_self')</script>";
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
<?php
                  //getting the customer name
                  $user = $_SESSION['user_name']; //getting the username
                  $get = "select full_name from user where user_name='$user'"; //sql query for getting the users full name
                  $run = mysqli_query($con, $get);    //running the query
                  $row = mysqli_fetch_array($run);    //fetching results from query
                  $name = $row['full_name'];         //saving the users full name as a string
                    ?>


      


              <?php
    
    
             
      
      
              echo "<h1 align= 'center'>Diet and Excercise Diary for $name</h1>"; //echoing the users name in application for a personalised welcome message
    
   
              ?>


            </div>


      <ul class="tabs"> <!--Links to other pages within the application-->
        <li>
          <a href="excerciseentry.php">Enter Excercise</a>
        </li>
        <li>
          <a href="foodentry.php">Enter Food</a>
        </li>
        <li>
          <a href="drinkentry.php">Enter Drink</a>
        </li>
        <li>
          <a href="nutritionbreakdown.php">Nutritional Breakdown</a>
        </li>
        <li>
          <a href="excercisebreakdown.php">Excercise Breakdown</a>
        </li>
        <li>
          <a href="offline.html">Offline Notes</a>
        </li>
        <li>
          <a href="logout.php">Logout</a>
        </li>
      </ul>


    </div>
  </div>
  <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
<?php } ?>
</html>