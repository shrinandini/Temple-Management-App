<?php
$con=mysqli_connect("localhost","root","","temple");
$event_id=$_GET["Event_id"];
$eventtypeid=$_GET["Event_type_id"];
$eventdate=$_GET["Event_date"];
$regid=$_GET["Reg_id"];
$status=$_GET["Status"];
$sql="update event_register SET Event_type_id='$eventtypeid',
Event_date='$eventdate',Reg_id='$regid',Status='$status' WHERE Event_id=".$event_id;
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
