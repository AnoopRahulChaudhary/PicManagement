<!DOCTYPE html>
<?php
session_start();
$none='none';
$inline='inline';
$jsToAddCat="document.getElementById('addCategory').style.display='block';document.getElementById('fileUpload').style.display='none';";
$jsToAddPic="document.getElementById('fileUpload').style.display='block';document.getElementById('addCategory').style.display='none';";
$js='var x=document.getElementById("loginAnchor");
x.innerHTML="Logout";
x.href="logout.php";';
$myFun='myFun()';
$addPic='addPic()';
$addMessage='<div id="addMessage" style="position:absolute;bottom:5px;left:500px;width:200px;font-size:20px;color:red;border:1px;background-color:white;">
	    <marquee style="scrollamount:4"> Please login to add your pic or category</marquee>
	 </div>';
?>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link href="myStyle.css" rel="stylesheet" type="text/css" />
<link href="myStyle_1.css" rel="stylesheet" type="text/css" />
<script src='picAdd.js'></script>
<script>
$(document).ready(function(){
	$('#list').delegate('li','click',function(){
		catPicDownload(this);
	});
});
</script>
<script>
function userPicDownload(){
        document.getElementById("middleSection").innerHTML="Loading...";
        document.getElementById("middleSection").style.fontSize="20px";
        document.getElementById("middleSection").style.color="blue"; 
	var xhr=new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		if(this.readyState==4 && this.status==200){
			document.getElementById("middleSection").innerHTML=this.responseText;
		}
	};
	xhr.open("GET","userPicDownload.php",true);
	xhr.send();
}

function addPic(){
var ucategory=document.getElementById("categoryName").value;
if(ucategory=="" || ucategory.length<3){
	alert("This is not valid category");
    }else{
	document.getElementById("message").innerHTML="Updating list...";
        document.getElementById("message").style.fontSize="20px";
        document.getElementById("message").style.color="blue"; 	
         var obj={category:ucategory};
         var jsonObj=JSON.stringify(obj);		 
	     xhr=new XMLHttpRequest();
		 xhr.onreadystatechange=function(){
			 if(this.readyState==4 && this.status==200){
				 document.getElementById('message').innerHTML=this.response;
				 document.getElementById("categoryName").value="";
				 categoryDownload();
                                 setTimeout(clearMessage,10000);
			 }
		 };
		 xhr.open("POST","addPicCategory.php",true);
		 xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 xhr.send("x="+jsonObj);
		 
        }
}
 
function categoryDownload(){
	var xhr=new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		if(this.readyState==4 && this.status==200){
			obj=JSON.parse(this.responseText);
			txt="";
			txt +="<option>Select pic category</option>";
			for(x in obj){
			 txt +="<option>"+obj[x]["category_name"]+"</option>";
			}
			document.getElementById("category").innerHTML=txt;
			
			txt="Pic Categories";
			for(x in obj){
			 txt +="<li>"+obj[x]["category_name"]+"</li>";
			}
			document.getElementById("list").innerHTML=txt;
			var x=document.createElement("STYLE");
			var t=document.createTextNode("#list li:hover{background-color: #555;cursor: pointer;color: white;}");
			x.appendChild(t);
			document.head.appendChild(x);
		}
	};
	xhr.open("GET","categoryDownload.php",true);
	xhr.send();
} 

function catPicDownload(obj){
        document.getElementById("middleSection").innerHTML="Loading...";
        document.getElementById("middleSection").style.fontSize="20px";
        document.getElementById("middleSection").style.color="blue"; 
	var xhr=new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		if(this.readyState==4 && this.status==200){
                        if(this.responseText!='z')
			  document.getElementById("middleSection").innerHTML=this.responseText;
		}
	};
	xhr.open("GET","categoryPicDownload.php?q="+obj.innerHTML,true);
	xhr.send();
}

function clearMessage(){
document.getElementById('message').innerHTML="";
}

</script>
<style>
body{
    margin: 0;
	padding: 0;
	line-height: 1.5em;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 12px;
	color: #212c47;
	background-color: #b66a50;
}
#yourPicTag:hover{
	cursor: pointer;
        background-color: rgb(112,0,0);
}
.addBtn:hover{
	cursor: pointer;
        background-color: rgb(152,0,0);
}
#headerWrapper{
	position: fixed;
    width: 100%;
	height: 150px;
	background-color: #01786F;
	z-index: 1;
}
.footer{
	position: fixed;
	bottom: 0px;
	left: 0px;
	width: 100%;
	background-color: black;
}

</style>
</head>
<body onload="categoryDownload();">
 
 <div id='container'>
   
   <div id='headerWrapper'>
	
	<div id='tag' style="position:absolute;top:20px;left:20px;font-size:30px;color:#f7002d;">
	  YourClick
	</div>
	
	 <div id='welcomeUser'>
	   <?php if(isset($_SESSION['user'])){echo"Welcome ".$_SESSION['user'];}?>
	 </div>
	 <div id='signUp'>
	  <ul id='SignUpList'>
	    <li style="display:<?php if(isset($_SESSION['user'])){echo$none;}else{echo$inline;} ?>;"><a href='signup.php' id="signUpAnchor" >Sign Up</a></li>
        <li><a href='signup.php' id="loginAnchor" >Login</a></li>
		<script><?php if(isset($_SESSION['user'])){echo$js;} ?> </script>
        <li style="display:<?php if(isset($_SESSION['user'])){echo$inline;}else{echo$none;} ?>;color: white;" id="yourPicTag" onclick="userPicDownload()">Your Pics</li>
        <li onclick="<?php if(isset($_SESSION['user']))
                              {echo$jsToAddCat;}
                            if(!isset($_SESSION['user']))
                              {echo"alert('first login')";}
                        ?>" style="color:white" class="addBtn">Add Pic Category</li>
        <li onclick="<?php if(isset($_SESSION['user']))
                                {echo$jsToAddPic;}
                             if(!isset($_SESSION['user']))
                                {echo"alert('first login')";} 

                          ?>" style="color:white" class="addBtn">Add Pic</li>
	  </ul>
	 </div>
	 
	     <span id='message' style="font-size:20px;position:absolute;right:5px;top:120px;"></span>
	 
	 <div id='addCategory' style="position:fixed;top:0px;right:0px;border:solid 1px;background-color:white;float:right;padding:5px;display:none;z-index=9999;width:" >
	  <label style="font-size:20px;color:blue;">Add New Pic Category</label><br/>
	  <input type='text' placeholder='Enter New Category...' name='categoryName' id='categoryName'/>
	  <button onclick="<?php if(isset($_SESSION['user'])){echo$addPic;}?>">Add</button>
          <button onclick="document.getElementById('addCategory').style.display='none';" style="color:black;margin:5px;">CLOSE</button>
	 </div>
	 
	 <div id='fileUpload' style="position:fixed;top:0px;right:0px;border:solid 1px;background-color:white;float:right;padding:5px;display:none;z-index:9999;" >
	     <label style="font-size:20px;color:blue;" >Add your pic</label><br/>
	     <input type='file' name='yourPic' id='yourPic' style="margin-top:5px;"/><br/>
	     <select  name='category' id='category' style="margin-top:5px;margin-bottom:5px;">
		    
		 </select>
	  <button onclick="<?php if(isset($_SESSION['user'])){echo$myFun;}?>">Add Pic</button>
          <button onclick="document.getElementById('fileUpload').style.display='none';" style="position;margin:5px;" >CLOSE</button> 
	 </div>
	 
	  <?php if(!isset($_SESSION['user'])){echo$addMessage;}?>
    </div>	
     
	<div id='sectionWrapper'>
	 
	 <div id='leftSection'>
	  
	  <div id='picList'>
	    <ul id='list'>Pic Categories
		 <li>Nature</li>
		 <li>Adventure</li>
		 <li>Forest</li>
		 <li>Flower</li>
		 <li>River</li>
        </ul> 
      </div> 		
	 
	 </div>
	 
	 <div id='middleSection' style="height:1000px;backgrond-color:red;" >
	      <div style="display:none" id="1234">flower</div>
               <div ><p style="font-size:20px; color:blue;">Loading Content...</p></div> 
        </div>	
         <script>
         var x=document.getElementById("1234");
         catPicDownload(x);
         </script>
	
	 <div id='rightSection'>
	 </div>
	 
    </div>	
	 
	<div id='footerWrapper' class='footer'>
      <a href='' style='color:white;text-decoration:none;margin-left:600px;'>HOME</a>|<a href='' style='color:white;text-decoration:none;'>HELP</a>    
    </div>  	
 </div>
</body>
</html>