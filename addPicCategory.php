<?php
session_start();
header("Content-type:application/json; chaset=UTF-8");
$obj=json_decode($_POST["x"],false);
$c=ucwords($obj->category);
$email=$_SESSION['userId'];

require'connection.php';

$q1="SELECT category_name FROM category WHERE category_name='$c'";
$q2="INSERT INTO category(category_name,emailid) VALUES ('$c','$email')";
if(mysqli_num_rows(mysqli_query($con,$q1))>0){
	 
	 echo"This category already exist";
	
}else{
	
	if(mysqli_query($con,$q2)){
		echo"New category added";
	}else{
		echo"Some error occur again try";
	}
}

?>