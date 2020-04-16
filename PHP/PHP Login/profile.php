<?php
session_start();
if(!isset($_SESSION['user']))
{ 

     	      header("location:login.php");
   
	 }
	 else
	 {
		    echo "<font face='verdana' size='4'><center>hello! you are logged in as ". $_SESSION['uname']."<br>";
			
 
   
}



?>
<a href="logout.php"> logout</a>
