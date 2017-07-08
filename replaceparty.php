<?php
include"dbconnect.php";
session_start();
$pno=$_SESSION['pno'];
$epname=$_POST['eparty'];
if(isset($_POST['replace']) && $epname!="NULL")
{
	$query="UPDATE party SET pname='$epname' WHERE pno=$pno";
	if(mysqli_query($con,$query))
	{
		echo "Party name is updated!!";
		header("refresh:2;url=editparty.php");
	}
}
else
{
	echo"Select party name properly!!";
	header("refresh:2;url=editparty.php");
}
?>