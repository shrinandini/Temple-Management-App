<?php
$con=mysqli_connect("localhost","root","","temple");
$eventid=$_GET["Event_id"];
$eventname=$_GET["Event_name"];
$eventdes=$_GET["Event_description"];
$eventsdate=$_GET["Event_startdate"];
$eventedate=$_GET["Event_enddate"];
$eventtime=$_GET["Event_time"];
$eventstatus=$_GET["Event_status"];
$sql="update event_detail SET Event_id='$eventid',Event_name='$eventname',
Event_description='$eventdes',Event_startdate='$eventsdate',
Event_enddate='$eventedate',Event_time='$eventtime',Event_status='$eventstatus'
 WHERE Event_name=".$eventname;
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
