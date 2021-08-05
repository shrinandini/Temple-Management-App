 <?php
	$con=mysqli_connect("localhost","root","","temple");
	$title=$_GET["title"];
	$description=$_GET["description"];
	$sql="insert into latest_updates(title,description) values('$title','$description')";
	$response=array();
	if(mysqli_query($con,$sql))
		$data["msg"]="Success";
	else{
		$data["msg"]="Failure";
		echo mysqli_error($con);
	}
	array_push($response,$data);
	echo json_encode($response);
?>