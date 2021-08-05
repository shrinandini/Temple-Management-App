 <?php
	$con=mysqli_connect("localhost","root","","temple");
	$name=$_GET["name"];
	$mobile_no=$_GET["mobile_no"];
	$address=$_GET["address"];
	$email_id=$_GET["email_id"];
	$user_name=$_GET["user_name"];
	$password=$_GET["password"];
	//$conf_password=$_GET["conf_password"];
	$sql="insert into user_signup(name,mobile_no,address,email_id,
	user_name,password,conf_password) values('$name','$mobile_no','$address',
	'$email_id','$user_name','$password','$password')";
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