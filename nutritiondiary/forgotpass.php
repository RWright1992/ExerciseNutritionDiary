<!DOCTYPE html>
<html lang="en">
<?php
//connecting to the database

session_start();  //starting the session on this page
    include('connect/db.php'); //calling on the connect method in this file
    

?>
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

        <h1>UUJ Diet and Excercise Diary</h1>

            </div>

            <table>
               <tr>
      <td colspan="1"><h2 align="center"></h2></td>
    
    </tr>
      <tr>
      <th>If you have lost any user details please email our admins on:</th>                             <!--Table Headers-->
    </tr>
    <?php 
    $get_a = "select * from admin"; 
    $run_a =  mysqli_query($con,$get_a); //running the query

    while ($row_order=mysqli_fetch_array($run_a)){  
                                                        //retrieving local variables and storing them as arrays
      $a_email = $row_order['user_email'];

      
      
    ?>

    <tr >
      <!--echo the variables-->
      <td><?php echo $a_email;?></td>
    </tr>


<?php }?> 


            </table>


    </div>
  </div>
  <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>

</html>