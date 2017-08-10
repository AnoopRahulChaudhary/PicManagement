<?php
header("Content-Type: application/json; charset=UTF-8");
$obj=json_decode($_POST["x"],false);

$email=$obj->uemail;
$name=$obj->uname;
$pass=$obj->upass;
$gender=$obj->ugender;

require'connection.php';

$q="INSERT INTO picuser(email,gender,username,userpassword) VALUES ('$email','$gender','$name','$pass')";
$result=mysqli_query($con,$q);
if($result)
{echo "Your accont has been created";}
else
{echo"error in signup again try, may be this id already exist";}
mysqli_close($con);

?>
