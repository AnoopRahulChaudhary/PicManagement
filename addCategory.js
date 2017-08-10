function addPic(){
var ucategory=document.getElementById("categoryName").value;
var lelement=document.getElementById("list");
var selement=document.getElementById("category");
if(ucategory=="" || ucategory.length<3){
	alert("This is not valid category");
    }else{
		
         var obj={category:ucategory};
         var jsonObj=JSON.stringify(obj);		 
	     xhr=new XMLHttpRequest();
		 xhr.onreadystatechange=function(){
			 if(this.readyState==4 && this.status==200){
				 alert(this.response);
				 document.getElementById("categoryName").value="";
				 var txt=this.responseText;
				 if(txt=="New category added"){
					 alert("hello ");
					 var list=document.createElement("li");
		             var options=document.createElement("option");
		             var textn=document.createTextNode(""+ucategory);
		             options.appendChild(textn);
		             list.appendChild(textn);
		             lelement.appendChild(list);
		             selement.appendChild(options);
				 }
			 }
		 };
		 xhr.open("POST","addPicCategory.php",true);
		 xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 xhr.send("x="+jsonObj);
		 
        }
}