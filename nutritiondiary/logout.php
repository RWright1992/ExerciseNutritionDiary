<?php



 session_start();
//destroying the session so the user is no longer logged in
 session_destroy();
//redirecting user to homepage
 echo "<script>window.open('index.html','_self')</script>";



?>