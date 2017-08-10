<?php
$type=$_GET['path'];

require'connection.php';

$q="SELECT picuser.username FROM picuser INNER JOIN pic ON picuser.email=pic.useremail WHERE pic.picpath='$type'";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_assoc($result);
$username1=$row['username'];
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<style>
.container{
	postion:fixed;
	margin: 0px;
	padding: 0px;
}
.user{
	position:absolute;
	left:0px;
	top: 0px;
	width: 100%;
	height: 50px;
	font-size: 20px;
	background-color: #4d4dff;
}
.pic{
	position: absolute;
	left: 0px;
	top: 50px;
	width: 100%;
	}
#myImage{
	position: absolute;
	left: 450px;
	top: 100px;
}	
.icon{
	position: fixed;
	left: 0px;
	top: 642px;
	width: 100%;
	height: 30px;
	background-color: #4d4dff;
}
.myIcon{
	position:absolute;
	left:600px;
	top: 10px;
	font-size: 20 px;
}
#zoomIn:hover,#zoomOut:hover{
	background-color:red;
	cursor: pointer;
}
</style>
<script>
 function increase(){
	 var w=document.getElementById("myImage");
	 var h=document.getElementById("myImage");
	 if(w.width<700&w.height<700){
	 w.width+=10;
	 w.height+=10;
	 }
 }
 function decrease(){
	 var w=document.getElementById("myImage");
	 var h=document.getElementById("myImage");
	 if(w.width>100&&w.height>100){
	 w.width-=10;
	 w.height-=10;
	 }
 }
</script>
</head>
<body style="background-color:#99ffff">
<div class="container">

<div class="user">
 <div id="username"><p>Pic Uploaded By:<?php echo$username1 ?></p></div>
</div>

<div class="pic">
 <div id="userPic"><img id="myImage" src="<?php echo$type ?>" width="400" height="400"/></div>
</div>

<div class="icon">
  <div class="myIcon">
     <button id="zoomIn" onclick="increase();">Zoom In</button>
	 <button id="zoomOut" onclick="decrease();">Zoom Out</button>
  </div>
</div>

</div>
</body>
</html>