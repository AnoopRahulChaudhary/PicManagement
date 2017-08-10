<?php
session_start();
require'connection.php';

$email=$_POST["email"];
$password=$_POST["pass"];

$q="SELECT * FROM picuser WHERE email='$email' AND userpassword='$password'";
$result=mysqli_query($con,$q);
if($result){
	
      if(mysqli_num_rows($result)>0)
        {$row=mysqli_fetch_array($result);
		 $_SESSION['user']=$row["username"];
         $_SESSION['userId']=$email;
	     echo"valid";
	  }else
        {
	     session_destroy(); 
	     echo "user not exist";
	    }
    }else{
		echo"Some connection error occur again try";
	} 
mysqli_close($con);


?>