$(document).ready(function(){
 $("#btn").click(function(){
	 $.post("loginvalidate.php",
	 {
		 email="anoop@gmail.com";
		 pass="0000";
	 },
	 function(response,status){
		 alert.("Response:"+response+"  Status:"+status);
	 }
	 );
 });
});