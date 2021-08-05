<?php
$con=mysqli_connect("localhost","root","","temple");
$sql="";
if(isset($_GET["uid"]))
{
	$sql = "select * from event_detail as ed inner join event_register as er on ed.Event_id=er.Event_type_id where Reg_id='".$_GET["uid"]."'";
	$rs = mysqli_query($con,$sql);
	$res = array();
	if(mysqli_num_rows($rs)>0)
	{
		while($rw=mysqli_fetch_row($rs))
		{
			$data["erid"]=$rw[8];
			$data["title"]=$rw[1];
			$data["desc"] = $rw[2];
			$data["sdate"] = $rw[3];
			$data["edate"] = $rw[2];
			array_push($res,$data);
		}
		echo json_encode($res);
	}

}
else
{
if(isset($_GET["Event_name"]))
{
	$eventname=$_GET["Event_name"];
	$sql="select * from event_detail where Event_name='$eventname'";
}
else
	$sql="select * from event_detail where day_type='".$_GET["type"]."'";
	
$rw=mysqli_query($con,$sql);
echo mysqli_error($con);
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
		
		$data["msg"]="success";
	
	}
	echo json_encode($response);
		
}
else
{
	$data["msg"]="failure";
	echo mysqli_error($con);
	
}
}

?>