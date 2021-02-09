<!DOCTYPE html>
<?php 
session_start();   //starting the session on this page
include( "connect/db.php"); //calling on the connect method in this file


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
  <title>Enter Exercise Details</title>
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
        <a href="index1.php"><h1>Main Menu</h1><a> <!--Link to the main menu-->
      </div>

       <div class = "block">

      <br>

      <form action="" method="post">  <!--Form for inputting drink details-->
        <div class="form-input">
          Type of Excercise:<br>
          <select name='ex_type' type='text'>
            <option value="endurance">Endurance</option>
            <option value="strength">Strength</option>
            <option value="flexibility">Flexibility</option>
            <option value="balance">Balance</option>
          </select>
        </div>
        <div class="form-input">
          Excercise Name:<br>
          <input name='ex_name' type="text" size="30">
        </div>
        <div class="form-input">
          Duration:<br>
          <select name='ex_duration' type='text'>
            <option value="0_15">0-15 Mins</option>
            <option value="15_30">15-30 Mins</option>
            <option value="30_45">30-45 Mins</option>
            <option value="45_60">45-60 Mins</option>
            <option value="60_75">60-75 Mins</option>
            <option value="75_90">75-90 Mins</option>
            <option value="90_">90+ Mins</option>
          </select>
        </div>
        <div class="form-input">
          Intensity:<br>
          <select name='ex_intensity' type='text'>
            <option value="light">Light</option>
            <option value="moderate">Moderate</option>
            <option value="vigorous">Vigorous</option>
          </select>
        </div>
        <div class="form-input">
          Notes:<br>
          <textarea name='ex_notes' rows=5 cols=70></textarea>
        </div>

        <div class="form-input">
          <input type="submit" value="Submit" name="submit" class= "button">
        </div>

        <?php

                    if(isset($_POST['submit'])){    //recognising the submit button has been pressed
                    
                    $user = $_SESSION['user_name'];   //getting the username
      
                  $get = "select user_id from user where user_name='$user'"; //sql query for getting the user_id
                  $run = mysqli_query($con, $get);  //running the query
      
                  $row= mysqli_fetch_array($run);  //fetching results from query
      
                  $u_id = $row['user_id']; //storing the user id as an array
                    
                  $extype = mysqli_real_escape_string($con, $_POST['ex_type']);   //storing form inputs as arrays
                  $exname = mysqli_real_escape_string($con, $_POST['ex_name']);
                  $exdur = mysqli_real_escape_string($con, $_POST['ex_duration']);
                  $exint = mysqli_real_escape_string($con, $_POST['ex_intensity']);
                  $exnote = $_POST['ex_notes'];
                  $exnote1 = mysqli_real_escape_string($con, $exnote);
  
                  $insert_ex = "insert into excerciseentry (user_id, ex_type, ex_name, ex_duration, ex_intensity, ex_notes ) values ('$u_id', '$extype', '$exname', '$exdur', '$exint', '$exnote1' )"; //sql statement inserting values into database
  
                  $run_query = mysqli_query($con, $insert_ex); //running the previous query
  
                  if($run_query){
    
                  echo"<script>alert('Excercise Entry has been added')</script>"; //message informing user entry has been added into table
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