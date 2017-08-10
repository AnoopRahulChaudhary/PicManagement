function myFun(){
var x=document.getElementById("category");
var ucategory=x.options[x.selectedIndex].text;	
var message=document.getElementById("message");
if(ucategory=="Select pic category")
 {  
   message.innerHTML=("It seems that this is not valid category"); 
   setTimeout(function(){message.innerHTML="";},300000);
    
}else{
	var xhr=new XMLHttpRequest();
    var fd=new FormData();
	var y=document.getElementById("yourPic");
	var file=y.files[0];
	fd.append("yourPic",file);
	fd.append("category",ucategory);
	xhr.onreadystatechange=function(){
		if(this.readyState==4 && this.status==200){
			message.innerHTML=(this.responseText);
			x.selectedIndex=0;
			y.value="";
			setTimeout(function(){message.innerHTML="";},10000);
		}
	};
	xhr.open('POST','picUpload.php',true);
	if(y.value==""){
		message.innerHTML=("It seems that image is not selected");
		setTimeout(function(){message.innerHTML="";},300000);
	}else{
      xhr.send(fd);
	}
	
 }
}