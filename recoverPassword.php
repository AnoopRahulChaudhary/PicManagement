<?php
$uemail=$_POST["uemail"];

if($uemail==""){
	echo"Enter your email";
}else{
	
require'connection.php';

$q="SELECT * FROM picuser WHERE email='$uemail'";
$result=mysqli_query($con,$q);
if($result){
	$row=mysqli_fetch_assoc($result);
      if(mysqli_num_rows($result)>0)
        {   $to=$uemail;
	        $subject="Password on YourClick";
            $message="Your password is ".$row['userpassword']; 
            $header="From: YourClick<yourclick@gmail.com>";	
           if(/*mail($to,$subject,$message,$header)*/1){			
			 echo"Your password has been send to your email";
			}else{
				echo"There some connection problem to send your password to your email ";
			}
	  }else
        {
	     echo "Email does not exist";
	    }
    }else{
		echo"Some problem in connection";
	}	
mysqli_close($con);
}
?>