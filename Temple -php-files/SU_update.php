<?php
$con=mysqli_connect("localhost","root","","temple");
$name=$_GET["name"];
$mobile_no=$_GET["mobile_no"];
$address=$_GET["address"];
$email_id=$_GET["email_id"];
$user_name=$_GET["user_name"];
$password=$_GET["password"];
$conf_password=$_GET["conf_password"];
$sql="update user_signup SET name='$name',mobile_no='$mobile_no',
address='$address',email_id='$email_id',
user_name='$user_name',password='$password',conf_password='$conf_password'
 WHERE user_id=".$user_id;
$response=array();
if(mysqli_query($con,$sql))
{

	$data["msg"]="updated";
	
}
else
{
	$data["msg"]="failure";
	echo mysqli_error($con);
	
}
array_push($response,$data);
echo json_encode($response);

?>
