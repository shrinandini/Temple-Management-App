<?php
	$con=mysqli_connect("localhost","root","","temple");
	$sql="SELECT * FROM user_registration";
	$response=array();
	$rw=mysqli_query($con,$sql);
	if((mysqli_num_rows($rw)>0)){
		while($rs=mysqli_fetch_row($rw)){
			$data["User_Id"]=$rs[0];
			$data["Name"]=$rs[1];
			$data["Email"]=$rs[2];
			$data["Address"]=$rs[3];
			$data["Mobile"]=$rs[4];
			$data["Status"]=$rs[5];
			$data["Username"]=$rs[6];
			$data["Password"]=$rs[7];
			array_push($response,$data);
			echo json_encode($response);
			$data["msg"]="Success";
		}
	}
	else{
		$data["msg"]="Failure";
		echo mysqli_error($con);
	}
?>