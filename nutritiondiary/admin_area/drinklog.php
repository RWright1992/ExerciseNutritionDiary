<!DOCTYPE html>
<?php
//connecting to the database

session_start(); //starting the session on this page
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
 <div class="block">
            <h2 align= "center">Drink Entries</h2><br> 
               
    
                        <table align="center" width="650px" >  <!--Table to contain drink entries-->
    
    <tr>
      <td colspan="8"><h2 align="center"></h2></td>
    
    </tr>
      <tr>
      <th>User_ID</th>
      <th>Drink_ID</th>
      <th>Name</th>
      <th>Calories (G)</th>
      <th>Fat (G)</th>
      <th>which Saturates (G)</th>
      <th>Carbohydrates (G)</th>
      <th>which sugar (G)</th>
      <th>Protien (G)</th>
      <th>Salt (MG)</th>
      <th>Entry Time</th>
    </tr>                   <!--Table Headers-->
    
    
    <?php
    include("connect/db.php"); //calling on the connect method in this file
    
      
    $get = "select * from drinkentry"; // sql query getting the values from the drink table
    $run = mysqli_query($con,$get); //running the query and storing it as an array
    
    
    
    while ($row_order=mysqli_fetch_array($run)){
      //getting local varaibles
      $user_id = $row_order['user_id'];
      $food_id = $row_order['drink_id'];
      $food = $row_order['drink'];
      $f_calories = $row_order['d_calories'];
      $f_fat = $row_order['d_fat'];
      $f_fatsat = $row_order['d_fatsat'];
      $f_carb = $row_order['d_carb'];
      $f_carbsug = $row_order['d_carbsug'];
      $f_protien = $row_order['d_protien'];
      $f_salt = $row_order['d_salt'];
      $entry_time = $row_order['entry_time'];
      
      
    ?>
    
    
  
    
    <tr align="center">
      <!--echo the variables-->
      <td><?php echo $user_id;?></td>
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
    <input type="submit" name="print" id="print" value="Print all values" onClick="window.print()"> <!--Button to drink entries-->
     <a href= "excel.xlsx">Open Blank Excel File</a> <!--Button to open excel file to copy values into-->

     <form method="get" action="filter_drink.php" enctype+"multipart/form-data"> <!--Form to get drink nutritional values of one student-->
     <select name="user_query">
<?php

  $sql = "SELECT user_id FROM user GROUP BY user_id;"; //sql query for getting the user details
  $result = mysqli_query($con,$sql); //running the statement
  
    
     
    $num_results = mysqli_num_rows($result); //putting the user id in as an option value
    for ($i=0;$i<$num_results;$i++) {
      $row = mysqli_fetch_array($result);
      $name = $row['user_id'];
      echo '<option value="' .$name. '">' .$name. '</option>';
      
      

      
    }
?>
</select>
<input type="submit"  name="search"  value="Filter by User ID" /> <!--Button to sumbit form to filter by user_id-->

                        </form>


        </div>

    </div>
  </div>
  <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
<?php } ?>
</html>