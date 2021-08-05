<?php
$con=mysqli_connect("localhost","root","","temple");
$user_id=$_GET["user_id"];
$sql="delete from user_signup where user_id=".$user_id;
if(mysqli_query($con,$sql))
{
echo "<br>data deleted";
}
else
{
echo "<br>not deleted";
}

?>