<?php
//connecting to the database
$con = mysqli_connect("localhost","root","","nutritiondiary");

if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	

?>

