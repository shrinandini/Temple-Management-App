<?php
	$con=mysqli_connect("localhost","root","","temple");
	$user_id=$_GET["User_Id"];
	$name=$_GET["Name"];
	$email=$_GET["Email"];
	$address=$_GET["Address"];
	$mobile=$_GET["Mobile"];
	$status=$_GET["Status"];
	$username=$_GET["Username"];
	$password=$_GET["Password"];
	$sql="update user_registration SET Name='$name',Email='$email'
	,Address='$address',Mobile='$mobile',Status='$status',
	Username='$username',Password='$password' WHERE User_id='$user_id'";
	$response=array();
	if(mysqli_query($con,$sql))
		$data["msg"]="Success";
	else{
		$data["msg"]="Failure";
		echo mysqli_error($con);
	}
	array_push($response,$data);
	echo json_encode($response);
?>