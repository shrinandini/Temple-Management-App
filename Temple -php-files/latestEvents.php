<?php
	$con = mysqli_connect("localhost","root","","temple");
	$sql = "select * from event_detail order by Event_id desc";
	$rs=mysqli_query($con,$sql);
	$cnt = 0;
	$response = array();
	if(mysqli_num_rows($rs)>0)
	{
		while($rw = mysqli_fetch_row($rs))
		{
			if($cnt>=10)
				break;
			$data["eid"]=$rw[0];
			$data["eventname"]=$rw[1];
			$data["desc"]=$rw[2];
			$data["amt"]=$rw[5];
			array_push($response,$data);
			$cnt++;
		}
		echo json_encode($response);
	}
	else
		echo mysqli_error($con);
?>