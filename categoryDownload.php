<?php
header("Content-Type: application/json; charset=UTF-8");

require'connection.php';

$q="select category_name from category";
$result=mysqli_query($con,$q);
$outp=array();
if($result){
	$outp=$result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($outp);
}else{
	echo"Connection prblem";
}
mysqli_close($con);
?>