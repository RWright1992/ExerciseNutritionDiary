<!DOCTYPE html>
<?php
session_start();    //starting the session on this page

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
       <a href= "index1.php"> <h1>Main Menu</h1><a> <!--Link to the main menu-->
      </div>

      <div class = "block">
      <h2 align= "center">Food Entries</h2>
                  <table align="center" width="650px" > <!--Table to contain food entries-->
    
    <tr>
      <td colspan="8"><h2 align="center"></h2></td>
    
    </tr>
      <tr>
      <th>ID</th>
      <th>Food(s)</th>
      <th>Calories</th>
      <th>Fat</th>
      <th>Saturated Fat</th>
      <th>Carbohydrates</th>
      <th>of which Sugars</th>
      <th>Protien</th>
      <th>Salt</th>
      <th>Entry Time</th>
    </tr>                                        <!--Table Headers-->
    
    
    <?php
    include("connect/db.php");    //calling on the connect method in this file
    
    //user details
      $user = $_SESSION['user_name']; //getting the username
      $get = "select * from user where user_name='$user'"; //sql query for getting the user_id
      $run = mysqli_query($con, $get);    //running the query
      $row = mysqli_fetch_array($run);    //fetching results from query
      $u_id = $row['user_id'];             //storing the user id as an array


      
    $get_food = "select * from foodentry where user_id='$u_id'"; //query getting the food entries with the users id
    
    $run_food = mysqli_query($con,$get_food);       //running the query
    
    
    
    while ($row_order=mysqli_fetch_array($run_food)){
                                           //retrieving local variables and storing them as arrays
      $food_id = $row_order['food_id'];
      $food = $row_order['food'];
      $f_calories = $row_order['f_calories'];
      $f_fat = $row_order['f_fat'];
      $f_fatsat = $row_order['f_fatsat'];
      $f_carb = $row_order['f_carb'];
      $f_carbsug = $row_order['f_carbsug'];
      $f_protien = $row_order['f_protien'];
      $f_salt = $row_order['f_salt'];
      $entry_time = $row_order['entry_time'];


      
      
    ?>
    
    
  
    
    <tr align="center">
      <!--echo the variables-->
      <td><?php echo $food_id;?></td>
      <td><?php echo $food;?></td>
      <td><?php echo $f_calories;?></td>
      <td><?php echo $f_fat;?></td>
      <td><?php echo $f_fatsat;?></td>
      <td><?php echo $f_carb;?></td>
      <td><?php echo $f_carbsug;?></td>
      <td><?php echo $f_protien;?></td>
      <td><?php echo $f_salt;?></td>
      <td><?php echo $entry_time;?></td>


    
    </tr>
    
    
    <?php }?> 
    
    
    
    </table>

    <br>
    <h2 align= "center"> Drink Entries</h2>
    <table>   <!--Table to contain drink entries-->

<tr>
      <td colspan="8"><h2 align="center"></h2></td>
    
    </tr>
      <tr>
      <th>ID</th>
      <th>Drinks(s)</th>
      <th>Calories</th>
      <th>Fat</th>
      <th>Saturated Fat</th>
      <th>Carbohydrates</th>
      <th>of which Sugars</th>
      <th>Protien</th>
      <th>Salt</th>
      <th>Entry Time</th>
    </tr>                            <!--Table Headers-->
    
    
    <?php
    
    
    //user details
      $user = $_SESSION['user_name']; //getting the username
      $get = "select * from user where user_name='$user'";  //sql query for getting the user_id
      $run = mysqli_query($con, $get);  //running the query
      $row = mysqli_fetch_array($run);  //fetching results from query
      $u_id = $row['user_id'];        //storing the user id as an array

      
    $get_drink = "select * from drinkentry where user_id='$u_id'"; //query getting the drink entries with the users id
    $run_drink = mysqli_query($con,$get_drink); //running the query
    
    
    
    while ($row_drink=mysqli_fetch_array($run_drink)){
                                                    //retrieving local variables and storing them as arrays
      $drink_id = $row_drink['drink_id'];
      $drink = $row_drink['drink'];
      $d_calories = $row_drink['d_calories'];
      $d_fat = $row_drink['d_fat'];
      $d_fatsat = $row_drink['d_fatsat'];
      $d_carb = $row_drink['d_carb'];
      $d_carbsug = $row_drink['d_carbsug'];
      $d_protien = $row_drink['d_protien'];
      $d_salt = $row_drink['d_salt'];
      $dentry_time = $row_drink['entry_time'];

      
      
    ?>
    
    
  
    
    <tr align="center">
      <!--echo the variables-->
      <td><?php echo $drink_id;?></td>
      <td><?php echo $drink;?></td>
      <td><?php echo $d_calories;?></td>
      <td><?php echo $d_fat;?></td>
      <td><?php echo $d_fatsat;?></td>
      <td><?php echo $d_carb;?></td>
      <td><?php echo $d_carbsug;?></td>
      <td><?php echo $d_protien;?></td>
      <td><?php echo $d_salt;?></td>
      <td><?php echo $dentry_time;?></td>


    
    </tr>
    
    
    <?php }?>


    </table>
      

      </div>


    </div>
  </div>
  <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
<?php } ?>
</html>