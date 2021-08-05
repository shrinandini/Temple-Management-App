<?php
$con=mysqli_connect("localhost","root","","temple");
//$eventid=$_GET["Event_id"];
$eventtypeid=$_GET["Event_type_id"];
$eventdate=$_GET["Event_date"];
$regid=$_GET["Reg_id"];
$status=$_GET["Status"];
$sql="insert into event_register(Event_type_id,Event_date,Reg_id,Status)values
('$eventtypeid','$eventdate','$regid','$status')";
$response=array();
if(mysqli_query($con,$sql))
{
	$data["msg"]="success";
	
}
else
{
	$data["msg"]="failure";
	echo mysqli_error($con);
	
}
array_push($response,$data);
echo json_encode($response);

?>
