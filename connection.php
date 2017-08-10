<?php
$servername='localhost';
$username='root';
$db='pic_management';
$password="";
$con=mysqli_connect($servername,$username,$password,$db);
if(!$con){
	die("Connection Error ".mysqli_connect_errno);
}
?>