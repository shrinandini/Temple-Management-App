<?php
	$con=mysqli_connect("localhost","root","","Temple");
	$name=$_GET["Name"];
	$email=$_GET["Email"];
	$address=$_GET["Address"];
	$mobile=$_GET["Mobile"];
	$status=$_GET["Status"];
	$username=$_GET["Username"];
	$password=$_GET["Password"];
	$sql="insert into userregins(Name,Email,Address,Mobile,
	Status,Username,Password) values('$name','$email','$address',
	'$mobile','$status','$username','$password')";
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