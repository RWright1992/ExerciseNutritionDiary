<!DOCTYPE html>
<?php
session_start(); //starting the session on this page

if(!isset($_SESSION['user_name'])){  //if statement making sure the user is logged into a session within the application 
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
      <h2 align= "center">Exercise Entries</h2>
      
        <br>
                  <table align="center" width="650px" > <!--Table to contain database values-->
    
    <tr>
      <td colspan="7"><h2 align="center"></h2></td>
    
    </tr>
      <tr>
      <th>Exercise_ID</th>
      <th>Name</th>
      <th>Type</th>
      <th>Duration(Mins)</th>
      <th>Intensity</th>
      <th>Notes</th>
      <th>Entry Time</th>                             <!--Table Headers-->
    </tr>
    
    
    <?php
    include("connect/db.php");    //calling on the connect method in this file
    
    //user details
      $user = $_SESSION['user_name'];   //getting the username
      $get = "select * from user where user_name='$user'"; //sql query for getting the user_id
      $run = mysqli_query($con, $get);    //running the query
      $row = mysqli_fetch_array($run);    //fetching results from query
      $u_id = $row['user_id'];          //storing the user id as an array


      
    $get_id = "select * from excerciseentry where user_id='$u_id'"; //query getting the exercise entries with the users id
    
    $run_ex = mysqli_query($con,$get_id); //running the query
    
    
    
    while ($row_order=mysqli_fetch_array($run_ex)){  
                                                        //retrieving local variables and storing them as arrays
      $ex_id = $row_order['ex_id'];
      $ex_type = $row_order['ex_type'];
      $ex_name = $row_order['ex_name'];
      $ex_duration = $row_order['ex_duration'];
      $ex_intensity = $row_order['ex_intensity'];
      $ex_notes = $row_order['ex_notes'];
      $entry_time = $row_order['entry_time'];

      
      
    ?>
    
    
  
    
    <tr align="center">
      <!--echo the variables-->
      <td><?php echo $ex_id;?></td>
      <td><?php echo $ex_name;?></td>
      <td><?php echo $ex_type;?></td>
      <td><?php echo $ex_duration;?></td>
      <td><?php echo $ex_intensity;?></td>
      <td><?php echo $ex_notes;?></td>
      <td><?php echo $entry_time;?></td>

    
    </tr>
    
    
    <?php }?> 
    
    
    
    </table>

    <br>
  </div>

      

      


    </div>
  </div>
  <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
<?php } ?>
</html>