<?php
$con=mysqli_connect("localhost","root","","temple");
$event_id=$_GET["Event_id"];
$sql="delete from event_detail where Event_id=".$event_id;
if(mysqli_query($con,$sql))
{
echo "<br>data deleted";
}
else
{
echo "<br>not deleted";
}

?>