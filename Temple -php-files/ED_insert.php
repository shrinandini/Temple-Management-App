<?php
$con=mysqli_connect("localhost","root","","temple");
$eventname=$_GET["Event_name"];
$eventdes=$_GET["Event_description"];
$eventsdate=$_GET["Event_startdate"];
$eventedate=$_GET["Event_enddate"];
$eventtime=$_GET["Event_time"];
$eventstatus=$_GET["Event_status"];
$sql="insert into event_detail(Event_name,Event_description,
Event_startdate,Event_enddate,Event_time,Event_status)values
('$eventname','$eventdes','$eventsdate','$eventedate','$eventtime','$eventstatus')";
$response=array();
if(mysqli_query($con,$sql))
{
	$data["msg"]="inserted";
}
else
{
	$data["msg"]="failure";
	echo mysqli_error($con);
	
}
array_push($response,$data);
echo json_encode($response);


?>