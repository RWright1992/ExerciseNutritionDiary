<!DOCTYPE html>
<?php
session_start();        //starting the session on this page
include("connect/db.php");  //calling on the connect method in this file

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
  <title>Enter Food Intake</title>
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
       <h1><a href= "index1.php">Main Menu</a><h1>  <!--Link to the main menu-->
      </div>
      <div class = "block">

        <form>
          <input type="button" value="Unsure of Nutritional Values?" onclick="window.open('http://m.nutritionix.com/');">
        </form> <!--Link to the nutrionix search engine-->
      
      <br>

      <form action="" method="post"> <!--Form for inputting food details-->
        <div class="form-input">
          Food:
          <br>
          <input name='food' type="text" size="30" placeholder="Please include serving size">
        </div>
        <div class="form-input">
          Calories:
          <br>
          <input type="number" name="f_calories" min="0" max="500" placeholder="Calories" step="0.1">
        </div>
        <div class="form-input">
          Fat:
          <br>
          <input type="number" name="f_fat" min="0" max="500" placeholder="Grams" step="0.1">
        </div>
        <div class="form-input">
          of which saturates:
          <br>
          <input type="number" name="f_fatsat" min="0" max="500" placeholder="Grams" step="0.1">

        </div>
        <div class="form-input">
          Carbohydrate:
          <br>
          <input type="number" name="f_carb" min="0" max="500" placeholder="Grams" step="0.1">
        </div>
        <div class="form-input">
          of which sugars:
          <br>
          <input type="number" name="f_carbsug" min="0" max="500" placeholder="Grams" step="0.1">
        </div>
        <div class="form-input">
          Protien:
          <br>
          <input type="number" name="f_protien" min="0" max="500" placeholder="Grams" step="0.1">
        </div>
        <div class="form-input">
          Salt:
          <br>
          <input type="number" name="f_salt" min="0" max="500" placeholder="Milligrams" step="0.1">
        </div>
        <br>
        <div class="form-input">
          <input type="submit" value="Submit" name="submit" class= "button">
        </div>

        <?php

                    if(isset($_POST['submit'])){  //recognising the submit button has been presses
                    
                    $user = $_SESSION['user_name']; //getting the username
      
                  $get = "select user_id from user where user_name='$user'"; //sql query for getting the user_id
                  $run = mysqli_query($con, $get); //running the query
      
                  $row = mysqli_fetch_array($run); //fetching results from query
      
                  $u_id = $row['user_id']; //storing the user id as an array
                    
                  $food = mysqli_real_escape_string ($con,$_POST['food']);   //storing form inputs as arrays
                  $fcal = mysqli_real_escape_string ($con,$_POST['f_calories']);
                  $ffat = mysqli_real_escape_string ($con,$_POST['f_fat']);
                  $ffatsat = mysqli_real_escape_string ($con,$_POST['f_fatsat']);
                  $fcarb = mysqli_real_escape_string ($con,$_POST['f_carb']);
                  $fcarbsug = mysqli_real_escape_string ($con,$_POST['f_carbsug']);
                  $fprotien = mysqli_real_escape_string ($con,$_POST['f_protien']);
                  $fsalt = mysqli_real_escape_string ($con,$_POST['f_salt']);

  
                  $insert_food = "insert into foodentry (user_id, food, f_calories, f_fat, f_fatsat, f_carb, f_carbsug, f_protien, f_salt ) values ('$u_id', '$food', '$fcal', '$ffat', '$ffatsat', '$fcarb', '$fcarbsug', '$fprotien', '$fsalt')";   //sql statement inserting values into database
  
  
                  $run_query = mysqli_query($con, $insert_food); //running the previous query
  
                  if($run_query){
    
                  echo"<script>alert('Food Entry has been added')</script>";  //message informing user entry has been added into table
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