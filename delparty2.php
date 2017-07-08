<?php
include"dbconnect.php";
$pname=$_POST['pname'];
if(isset($_POST['delete']) && $pname!="NULL")
{
		$sql=$con->query("SELECT pno FROM party WHERE pname='$pname'")->fetch_object()->pno;
		$search=$con->query("SELECT pid FROM purchase WHERE pno='$sql'");
$last=mysqli_fetch_object($search);
	$query="DELETE FROM party WHERE pno=$sql";
	if($last==NULL)
	{
	if(mysqli_query($con,$query))
	{
		echo "Party name is deleted!!";
		header("refresh:2;url=delparty.php");
	}
	}
	else
	{
		echo "Item is in use";
		header("refresh:2;url=delparty.php");
	}
	
}
else
{
	echo "Please select an item";
		header("refresh:2;url=delparty.php");
}
?>

