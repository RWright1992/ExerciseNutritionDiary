<!DOCTYPE html>
<?php
//connecting to the database

session_start(); //starting the session on this page
include("connect/db.php");   //calling on the connect method in this file
 if(!isset($_SESSION['user_email'])){ //if statement making sure the user is logged into a session within the application
  
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
            <h2 align= "center">Exercise Entries</h2><br>
              <table> <!--Table containing drink details of particular student-->
                <tr>
                <th>Exercise_ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Duration(Mins)</th>
                <th>Intensity</th>
                <th>Notes</th>
                <th>Entry Time</th>
                </tr>


              


              <?php

  if (isset($_GET['search'])){ //detecting if the user_id was searched 
  $search_query = mysqli_real_escape_string($con, $_GET['user_query']);  //getting the information from the user_query text box and storing it as an array
  $get = "select * from excerciseentry where user_id like '%$search_query%'"; //Select all from user table where the user_id matches the data from the $search_query
   $run = mysqli_query($con, $get); //running the query

//Getting data from the table fields and storing them as arrays  
  while($row_order=mysqli_fetch_array($run)){
    
      $ex_id = $row_order['ex_id'];
      $ex_type = $row_order['ex_type'];
      $ex_name = $row_order['ex_name'];
      $ex_duration = $row_order['ex_duration'];
      $ex_intensity = $row_order['ex_intensity'];
      $ex_notes = $row_order['ex_notes'];
      $entry_time = $row_order['entry_time'];

    
    
  //Displaying the search results 
    echo "
         
         
      <tr align= 'center'>
      <!--echo the variables-->
      
      <td>$ex_id></td>
      <td>$ex_name</td>
      <td>$ex_type</td>
      <td>$ex_duration</td>
      <td>$ex_intensity</td>
      <td>$ex_notes</td>
      <td>$entry_time</td>

    
    </tr>



         
         
    
    
    ";
  }
  
  }
   
 
 
  ?>  
</table>
      <input type="submit" name="print" id="print" value="Print all values" onClick="window.print()"> <!--Button to print window-->
       <a href= "excel.xlsx">Open Blank Excel File</a> <!--Link to open blank excel file to copy data too-->
      </div>
    </div>
  </div>
  <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
<?php } ?>
</html>