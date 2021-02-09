<!DOCTYPE html>
<?php
session_start();      //starting the session on this page
include("connect/db.php");    //calling on the connect method in this file

if(!isset($_SESSION['user_name'])){     //if statement making sure the user is logged into a session within the application 
  
  echo "<script>window.open('login.php?login_required','_self')</script>";
}
else{  

?>

<html lang="en">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Enter Liquid Intake</title>
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
       <a href= "index1.php"> <h1>Main Menu</h1><a> <!--Link to the main menu-->
      </div>
      <div class = "block">

       <form>
          <input type="button" value="Unsure of Nutritional Values?" onclick="window.open('http://m.nutritionix.com/');">
        </form> <!--Link to the nutrionix search engine-->
        
      <br>

      <form action="" method="post"> <!--Form for inputting drink details-->
        <div class="form-input">
          Drink:
          <br>
          <input name='drink' type="text" size="30" placeholder="Please include serving size">
        </div>
        <div class="form-input">
          Calories:
          <br>
          <input type="number" name="d_calories" min="0" max="500" placeholder="Calories" step="0.1">
        </div>
        <div class="form-input">
          Fat:
          <br>
          <input type="number" name="d_fat" min="0" max="500" placeholder="Grams" step="0.1">
        </div>
        <div class="form-input">
          of which saturates:
          <br>
          <input type="number" name="d_fatsat" min="0" max="500" placeholder="Grams" step="0.1">

        </div>
        <div class="form-input">
          Carbohydrate:
          <br>
          <input type="number" name="d_carb" min="0" max="500" placeholder="Grams" step="0.1">
        </div>
        <div class="form-input">
          of which sugars:
          <br>
          <input type="number" name="d_carbsug" min="0" max="500" placeholder="Grams" step="0.1">
        </div>
        <div class="form-input">
          Protien:
          <br>
          <input type="number" name="d_protien" min="0" max="500" placeholder="Grams" step="0.1">
        </div>
        <div class="form-input">
          Salt:
          <br>
          <input type="number" name="d_salt" min="0" max="500" placeholder="Milligrams" step="0.1">
        </div>
        <br>
        <div class="form-input">
          <input type="submit" value="Submit" name="submit" class= "button">
        </div>

        <?php

                    if(isset($_POST['submit'])){ //recognising the submit button has been pressed
                    
                  $user = $_SESSION['user_name']; //getting the username
      
                  $get = "select user_id from user where user_name='$user'"; //sql query for getting the user_id
                  $run = mysqli_query($con, $get); //running the query
      
                  $row = mysqli_fetch_array($run);  //fetching results from query
      
                  $u_id = $row['user_id']; //storing the user id as an array
                    
                  $drink = mysqli_real_escape_string ($con, $_POST['drink']);      //storing form inputs as arrays
                  $dcal = mysqli_real_escape_string ($con, $_POST['d_calories']);
                  $dfat = mysqli_real_escape_string ($con, $_POST['d_fat']);
                  $dfatsat = mysqli_real_escape_string ($con, $_POST['d_fatsat']);
                  $dcarb = mysqli_real_escape_string ($con, $_POST['d_carb']);
                  $dcarbsug = mysqli_real_escape_string ($con, $_POST['d_carbsug']);
                  $dprotien = mysqli_real_escape_string ($con, $_POST['d_protien']);
                  $dsalt = mysqli_real_escape_string ($con, $_POST['d_salt']);

  
                  $insert_drink = "insert into drinkentry (user_id, drink, d_calories, d_fat, d_fatsat, d_carb, d_carbsug, d_protien, d_salt ) values ('$u_id', '$drink', '$dcal', '$dfat', '$dfatsat', '$dcarb', '$dcarbsug', '$dprotien', '$dsalt')"; //sql statement inserting values into database
  
                  $run_drink = mysqli_query($con, $insert_drink); //running the previous query
  
                  if($run_drink){ 
    
                  echo"<script>alert('Drink Entry has been added')</script>";   //message informing user entry has been added into table
                  echo"<script>window.open('index1.php','_self')</script>";
  }

}





?>
        
      </form>
      </div>

    </div>
  </div>
  <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
<?php } ?>
</html>