<?php
include"dbconnect.php";
session_start();
$ino=$_SESSION['ino'];
$eitem=$_POST['eitem'];
if(isset($_POST['replace']) && $eitem!="NULL")
{
	$query="UPDATE itemlist SET iname='$eitem' WHERE ino=$ino";
	if(mysqli_query($con,$query))
	{
		echo "Item name is updated!!";
		header("refresh:3;url=edititem.php");
	}
}
else
{
	echo"Select item name properly!!";
	header("refresh:3;url=edititem.php");
}
?>