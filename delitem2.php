<?php
include"dbconnect.php";
$item=$_POST['item'];
if(isset($_POST['delete']) && $item!="NULL")
{
		$sql=$con->query("SELECT ino FROM itemlist WHERE iname='$item'")->fetch_object()->ino;
		$search=$con->query("SELECT salesnum FROM sales WHERE ino='$sql'");
$last=mysqli_fetch_object($search);
	$query="DELETE FROM itemlist WHERE ino=$sql";
	if($last==NULL)
	{
	if(mysqli_query($con,$query))
	{
		echo "Item name is deleted!!";
		header("refresh:3;url=delitem.php");
	}
	}
	else
	{
		echo "Item is in use";
		header("refresh:3;url=delitem.php");
	}
	
}
else
{
	echo "Please select an item";
		header("refresh:3;url=delitem.php");
}
?>

