<?php
include "dbconnect.php";
$date=$_POST['date'];
list($ye,$m,$d)=explode("-",$date);
$y=$ye%100;
$sql="SELECT salesnum FROM sales ORDER BY salesnum DESC";
$result=mysqli_query($con,$sql);
$last=mysqli_fetch_assoc($result);
$bmo=substr($last['salesnum'],2,2);
$bda=substr($last['salesnum'],4,2);
if($last['salesnum']==0)
{
	$billno=($y.$m.$d)*1000;
}
elseif($bmo==$m)
{
	$l=$last['salesnum']%1000;
	$l=str_pad($l+1,3,0,STR_PAD_LEFT);
	$billno=$y.$m.$d.$l;
}
else
{
	$billno=($y.$m.$d)*1000;
}
echo $billno;
foreach($_POST['myInputs'] as $a => $i)
{
	$item=$_POST['myInputs'][$a];
	$amount=$_POST['amount'][$a];
	if($item=="NULL" && $amount==NULL)
	{
		$ino=0;
		$amount=0;
	}
	else{
	$ino=$con->query("SELECT ino FROM itemlist WHERE iname='".$item."'")->fetch_object()->ino;
	}
	mysqli_query($con,"INSERT INTO sales (date,salesnum,ino,amount) VALUES('$date','$billno',$ino,$amount)");
	echo "Sales entry is added!!";
	header("refresh:2;url=billing.php");
	
}
?>