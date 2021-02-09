<!DOCTYPE html>
<?php
//connecting to the database

session_start();  //starting the session on this page
if(!isset($_SESSION['user_email'])){  //if statement to prevent users who havnt logged on from getting on the page
  
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
            <h2 align= "center">Choose User Profile to Delete</h2><br>
                        <table align="center" width="650px" > <!--Table used to show student details-->
    
    <tr>
      <td colspan="8"><h2 align="center"></h2></td>
    
    </tr>
      <tr>
      <th>User_ID</th>
      <th>User_Name</th>
      <th>Full_Name</th>
      <th>Password</th>
      <th>Email</th>
    </tr>             <!--Table headers-->
    
    
    <?php
    include("connect/db.php"); //calling on the connect method in this file
  
      
    $get = "select * from user"; //sql query for getting the user details
    $run = mysqli_query($con,$get); //getting the details
    
    
    
    while ($row_order=mysqli_fetch_array($run)){ 
       //retrieving local variables and storing them as arrays
      $user_id = $row_order['user_id'];
      $user_name = $row_order['user_name'];
      $full_name = $row_order['full_name'];
      $password = $row_order['password'];
      $user_email = $row_order['user_email'];
      
      
    ?>
    
    
  
    
    <tr align="center">
      <!--echo the variables-->
      <td><?php echo $user_id;?></td>
      <td><?php echo $user_name;?></td>
      <td><?php echo $full_name;?></td>
      <td><?php echo $password;?></td>
      <td><?php echo $user_email;?></td>

    
    </tr>
    
    
    <?php }?> 
    
    
    
    </table>


             <form method="get" action="delete_student.php" enctype+"multipart/form-data"> <!--Form for choosing student to delete linked to the delete_student.php function-->
     <select name="user_query"> <!--List containing user id's to delete-->
<?php

  $sql = "SELECT user_id FROM user GROUP BY user_id;"; //sql statement for getting the user id's
  $result = mysqli_query($con,$sql); //running the statement
  
    
     
    $num_results = mysqli_num_rows($result);  //putting the user id in as an option value
    for ($i=0;$i<$num_results;$i++) {
      $row = mysqli_fetch_array($result);
      $name = $row['user_id'];
      echo '<option value="' .$name. '">' .$name. '</option>';
      
      

      
    }
     
    
  


  
  


?>
</select>
<input type="submit"  name="search"  value="Delete Student" /> <!--Button for submitting delete form-->

                        </form>
     
        
      </div>
    </div>
  </div>
  <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
<?php } ?>
</html>