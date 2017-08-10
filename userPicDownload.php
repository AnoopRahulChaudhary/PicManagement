<?php
session_start();
$email=$_SESSION['userId'];

require 'connection.php';
$q="select * from pic where useremail='$email'";
$result=mysqli_query($con,$q);
if($result){
	while($row=mysqli_fetch_array($result)){
		$filename=$row["picpath"];
		echo'<div style="display:inline;margin:2px;"><a href="picShow.php?path='.$filename.'" target="blank"><img src="'.$filename.'" style="width:180px;height:120px;"/></a></div>';
	}
}else{
	echo"Connection prblem";
}
mysqli_close($con);
?>