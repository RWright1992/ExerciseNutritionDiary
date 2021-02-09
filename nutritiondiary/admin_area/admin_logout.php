<?php



 session_start();
//destroying the session so the user is no longer logged in
 session_destroy();
//redirecting user to admin login page
 echo "<script>window.open('admin_login.php','_self')</script>";



?>