<?php
	$user_id=$_GET["User_Id"];
	$con=mysqli_connect("localhost","root","","temple");
	$sql="delete from user_registration WHERE User_Id=".$user_id;
	if(mysqli_query($con,$sql)){
			echo"<br>Deleted";
		}
	else{
	
		echo"<br> Not Deleted";	
	}
?>