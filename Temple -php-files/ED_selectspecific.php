<?php
$con=mysqli_connect("localhost","root","","temple");
$eventname=$_GET["Event_name"];

$sql="select * from event_detail WHERE Event_name=".$eventname;
$rw=mysqli_query($con,$sql);
$response=array();
if((mysqli_num_rows($rw)>0))
	
{
	while($rs=mysqli_fetch_row($rw))
	{
		$data["Event_id"]=$rs[0];
		$data["Event_name"]=$rs[1];
		$data["Event_description"]=$rs[2];
		$data["Event_startdate"]=$rs[3];
		$data["Event_enddate"]=$rs[4];
		$data["Event_time"]=$rs[5];
		$data["Event_status"]=$rs[6];
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