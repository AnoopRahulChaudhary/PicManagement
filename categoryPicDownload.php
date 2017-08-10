<?php
$category=$_GET['q'];

require'connection.php';

$q="select * from pic where type='$category'";
$result=mysqli_query($con,$q);
if($result){if(mysqli_num_rows($result)>0){
         echo'<p style="font-size:20px;color:blue;">CATEGORY:'.$category.'</p><br/>';       
	while($row=mysqli_fetch_array($result)){
		$filename=$row["picpath"];
		echo'<div style="display:inline;margin:2px;"><a href="picShow.php?path='.$filename.'" target="blank"><img src="'.$filename.'" style="width:180px;height:120px;"/></a></div>';
	}
  }else{
	  echo"Pic not available in ".$category." category";
  }
}else{
	echo"Connection prblem";
}
mysqli_close($con);

?>