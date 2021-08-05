<?php
$con=mysqli_connect("localhost","root","","temple");
$eventid=$_GET["Event_id"];
$sql="select * from event_register WHERE Event_id=".$eventid;
$rw=mysqli_query($con,$sql);
$response=array();
if((mysqli_num_rows($rw)>0))
{
	while($rs=mysqli_fetch_row($rw))
	{
		$data["Event_type_id"]=$rs[0];
		$data["Event_date"]=$rs[1];
		$data["Reg_id"]=$rs[2];
		$data["Status"]=$rs[3];
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