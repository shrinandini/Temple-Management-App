<?php
$con=mysqli_connect("localhost","root","","temple");
$user_name=$_GET["user_name"];
$password=$_GET["password"];
$sql="select * from user_signup WHERE user_name='$user_name' AND password='$password'";
$rw=mysqli_query($con,$sql);
$response=array();
if((mysqli_num_rows($rw)>0))
{
	while($rs=mysqli_fetch_row($rw))
	{
		$data["msg"]="success";
		$data["user_id"]=$rs[0];
		$data["name"]=$rs[1];
		$data["mobile_no"]=$rs[2];
		$data["address"]=$rs[3];
		$data["email_id"]=$rs[4];
		$data["user_name"]=$rs[5];
		$data["password"]=$rs[6];
		$data["conf_password"]=$rs[7];
		
		array_push($response,$data);
		echo json_encode($response);
		$data["msg"]="success";
	
	}
		
}
else
{
	$data["msg"]="failure";
	echo mysqli_error($con);
	
}

?>