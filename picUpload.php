<?php
session_start();

$category=$_POST["category"];
$target_dir="images/";
$target_file=$target_dir.basename($_FILES["yourPic"]["name"]);
$upload=1;
$idExist=1;
$email=$_SESSION['userId'];

require'connection.php';

$query1="delete from pic where picpath='$target_file'";
$query2="INSERT INTO pic(picpath,useremail,type) VALUES ('$target_file','$email','$category')";


//check if file is real or fake
$check=getimagesize($_FILES["yourPic"]["tmp_name"]);
 
 if($check!==false){
	 
 }	else{
	 echo"Fake image";
	 $upload=0;
 }

//check if file already exist
if(file_exists($target_file)){
	echo"\nFile already exist";
}else{
      //if $upload not 0 then upload file
     if($upload==0){
	      echo"\nSorry your file was not uploaded again try";
        }else{
			    if(mysqli_query($con,$query2)){
	                 if(move_uploaded_file($_FILES["yourPic"]["tmp_name"],$target_file)){ 
                         echo"\nyour file name ".basename($_FILES["yourPic"]["name"])." is uploaded";
				        }else{
							 mysqli_query($con,$query1); 
							 echo" Error in uploading file";
						    }
				
		        }else{
					  echo" Error in uploading file";
				     }	
            }	
        
    }

?>