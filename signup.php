<DOCTYPE html>
<html>
<head>
<link href="myStyle.css" rel="stylesheet" type="text/css" />
<link href="myStyleForSignUp.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src='signup.js'></script>
<script>
$(document).ready(function(){
 $("#btn").click(function(){
	 $.post("loginValidate.php",
	 {
		 email:$("#inputEmail").val(),
		 pass:$("#inputPassword").val()
	 },
	 function(response,status){
		 if(response=="valid"){
			 window.location.assign("index.php");
		    }else{
		         $("#message").html(response);
		         $("#inputEmail").val("");
			     $("#inputPassword").val("");
				 //setTimeout(messageClear,5000);
			}
	 });
	
 });
 
});
function goToLogin(){
	var x=document.getElementsByClassName("login");
	x[0].style.display="inline-block";
	x[1].style.display="inline-block";
	x[2].style.display="inline-block";
	x[3].style.display="none";
	x[4].style.display="none";
}
function enableGetPassword(){
	var x=document.getElementsByClassName("login");
	x[0].style.display="none";
	x[1].style.display="none";
	x[2].style.display="none";
	x[3].style.display="inline-block";
	x[4].style.display="inline-block";
}
function getPassword(){
	var uemail=document.getElementById("inputEmail").value;
	var xhr=new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		if(this.readyState==4 && this.status==200){
			document.getElementById("message").innerHTML=this.responseText;
			document.getElementById("inputEmail").value="";
			//setTimeout(messageClear,5000);
		}
	};
	xhr.open("POST","recoverPassword.php",true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send("uemail="+uemail);
}
function messageClear(){
	document.getElementById("message").innerHTML="";
}

function myLoad(){
	var x=document.forms["newUserSignUp"];
	var email=x.elements[0].value;
	var name=x.elements[1].value+" "+x.elements[2].value;
	var pass=x.elements[3].value;
	var gender=x.elements[4].value;
	if(email==""){
		document.getElementById("someText").innerHTML="Email required ";
	}else if(x.elements[1].value=="" ){
		document.getElementById("someText").innerHTML="First Name required ";
	}else if(pass.length<4){
		alert(pass.length);
		document.getElementById("someText").innerHTML="Password should have atleast 4 character";
	}
	else{
	var myObj={uemail:email, uname:name, upass:pass, ugender:gender};
	
	var dbParam=JSON.stringify(myObj);
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange= function(){
		if(this.readyState==4 && this.status==200){
			document.getElementById("someText").innerHTML=this.responseText;
		}
	};
	xmlhttp.open("POST","saveSignUpInfo.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x="+dbParam);
	}
}

</script>
<style>
body{
    margin: 0;
	padding: 0;
	line-height: 1.5em;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 12px;
	color: #555a4a;
	background-color: #a8415b;
}

#headerWrapper{
	background-color:  #2e5a88;
}
</style>
</head>
<body >


 <div id='container'>
    <div id='headerWrapper'>
     <div id='tag' style="position:absolute;top:20px;left:20px;font-size:30px; ">
	 <a href="index.php" style="text-decoration:none;color:#F633FF;"> YourClick</a>
	 </div>
	 
	 <div id='loginForm'>	 
	  <form >
	   <input type='email' placeholder='Email' name='userEmail' id='inputEmail'/>
	   <input class="login" type='password' placeholder='password' name='userPassword' id='inputPassword'/>
	  </form>
	 </div>
	 <div id='login'>
	 <span id='message' style='color:white;'></span>
	 <button id="pass" class="login" onclick="enableGetPassword();">Password?</button>
	 <button id='btn' class="login">Login</button> 
	 <button id="goToLogin" class="login" style="display:none" onclick="goToLogin();">Login</button>
	 <button id="recoverPass" class="login" style="display:none" onclick="getPassword();">Get Password</button>
	 </div>
	 
    </div>	
     
	<div id='sectionWrapper'>
	 <div id='leftSection'>
	  <span id="someText" style="color:white;font-size:20px;"></span>
	 </div>
	 
	 <div id='middleSection'>
         <div id='signUpDiv'>
       <form name='signUpForm' id='newUserSignUp'>
	     <div id='inputBox'>
	      <input type='email' name='userEmail'  placeholder=' Email'  required/><br> 
		  <input type='text' name='firstName'  placeholder='First Name'  required/><br> 
		  <input type='text' name='surname' placeholder='Surname'  /><br>   
		  <input type='password' name='password'  placeholder='Password'  required/><br>
		  <div id='gender'>Male<input type='radio' value='M' name='gender'/> Female<input type='radio' value='F' name='gender'/></div><br>
		  <input type='button' value='Create Account' onclick='myLoad()'; /><br>
		 </div> 
	   </form>
	  </div>
	 </div>
	
	 <div id='rightSection'>
	 </div>
	 
    </div>	
	 
	<div id='footerWrapper'>
    </div>  	
 </div>
</body>
</html>